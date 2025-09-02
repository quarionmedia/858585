<?php
// English: File updated at: app/Models/CommentModel.php

namespace App\Models;

// Import the required classes
use PDO;
use PDOException;

// The CommentModel now extends BaseModel to inherit the stable PDO connection.
class CommentModel extends BaseModel
{
    /**
     * Creates a new comment, now linked to a specific profile.
     * This version is corrected to use the correct database schema (movie_id, tv_show_id).
     *
     * @param array $data The comment data, including profile_id.
     * @return bool True on success, false on failure.
     */
    public function create($data)
    {
        try {
            // Determine the correct column name based on content_type
            $idColumn = null;
            if ($data['content_type'] === 'movie') {
                $idColumn = 'movie_id';
            } elseif ($data['content_type'] === 'tv_show') {
                $idColumn = 'tv_show_id';
            } else {
                // Invalid content type, cannot proceed.
                return false;
            }

            $sql = "INSERT INTO comments (user_id, profile_id, {$idColumn}, rating, comment, is_spoiler, parent_id) 
                    VALUES (:user_id, :profile_id, :content_id, :rating, :comment, :is_spoiler, :parent_id)";
            
            $stmt = $this->pdo->prepare($sql);
            
            return $stmt->execute([
                ':user_id'      => $data['user_id'],
                ':profile_id'   => $data['profile_id'],
                ':content_id'   => $data['content_id'],
                ':rating'       => $data['rating'] ?? null,
                ':comment'      => $data['comment'],
                ':is_spoiler'   => $data['is_spoiler'] ?? 0,
                ':parent_id'    => $data['parent_id'] ?? null
            ]);
        } catch (PDOException $e) {
            // For debugging, you can uncomment the line below. For production, just return false.
            // die("Database Error in create(): " . $e->getMessage());
            return false;
        }
    }

    /**
     * Finds all comments for a specific piece of content, now profile-aware.
     * Corrected to use the correct database schema.
     *
     * @param int $contentId The ID of the content.
     * @param string $contentType The type of the content ('movie' or 'tv_show').
     * @param int|null $profileId The ID of the current profile to check for likes.
     * @return array An array of comments structured in a tree.
     */
    public function findAllByContentId($contentId, $contentType, $profileId = null) 
    {
        // Determine the correct column name based on content_type
        $idColumn = null;
        if ($contentType === 'movie') {
            $idColumn = 'movie_id';
        } elseif ($contentType === 'tv_show') {
            $idColumn = 'tv_show_id';
        } else {
            return [];
        }

        try {
            $sql = "SELECT c.*, p.name as author_username, p.avatar as author_avatar
                    FROM comments c
                    LEFT JOIN profiles p ON c.profile_id = p.id
                    WHERE c.{$idColumn} = ? AND c.status = 'approved'
                    ORDER BY c.created_at ASC";
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$contentId]);
            $flatComments = $stmt->fetchAll();

            if (empty($flatComments)) {
                return [];
            }

            if ($profileId) {
                $commentIds = array_column($flatComments, 'id');
                if(empty($commentIds)) return $flatComments;
                
                $placeholders = implode(',', array_fill(0, count($commentIds), '?'));

                $sqlLikes = "SELECT comment_id FROM comment_likes WHERE profile_id = ? AND comment_id IN ($placeholders)";
                $params = array_merge([$profileId], $commentIds);
                
                $stmtLikes = $this->pdo->prepare($sqlLikes);
                $stmtLikes->execute($params);
                $likedCommentIds = $stmtLikes->fetchAll(PDO::FETCH_COLUMN);

                foreach ($flatComments as &$comment) {
                    $comment['is_liked_by_user'] = in_array($comment['id'], $likedCommentIds);
                }
                unset($comment);
            }

            // Build the reply tree structure
            $commentTree = [];
            $commentsById = [];
            foreach ($flatComments as $comment) {
                $commentsById[$comment['id']] = $comment;
                $commentsById[$comment['id']]['replies'] = [];
            }

            foreach ($commentsById as $id => &$comment) {
                if ($comment['parent_id'] && isset($commentsById[$comment['parent_id']])) {
                    $commentsById[$comment['parent_id']]['replies'][] = &$comment;
                } else {
                    $commentTree[] = &$comment;
                }
            }
            unset($comment);

            return $commentTree;
        } catch (PDOException $e) {
            return [];
        }
    }

    /**
     * Toggles a like on a comment for a specific profile.
     *
     * @param int $profileId The ID of the profile liking the comment.
     * @param int $commentId The ID of the comment being liked.
     * @return array The result of the operation.
     */
    public function toggleLike($profileId, $commentId) 
    {
        $this->pdo->beginTransaction();
        try {
            $stmt = $this->pdo->prepare("SELECT id FROM comment_likes WHERE profile_id = ? AND comment_id = ?");
            $stmt->execute([$profileId, $commentId]);
            $existingLike = $stmt->fetch();

            if ($existingLike) {
                $stmt = $this->pdo->prepare("DELETE FROM comment_likes WHERE id = ?");
                $stmt->execute([$existingLike['id']]);
                $stmt = $this->pdo->prepare("UPDATE comments SET like_count = GREATEST(0, like_count - 1) WHERE id = ?");
                $stmt->execute([$commentId]);
                $userLikes = false;
            } else {
                $stmt = $this->pdo->prepare("INSERT INTO comment_likes (profile_id, comment_id) VALUES (?, ?)");
                $stmt->execute([$profileId, $commentId]);
                $stmt = $this->pdo->prepare("UPDATE comments SET like_count = like_count + 1 WHERE id = ?");
                $stmt->execute([$commentId]);
                $userLikes = true;
            }

            $stmt = $this->pdo->prepare("SELECT like_count FROM comments WHERE id = ?");
            $stmt->execute([$commentId]);
            $newLikeCount = $stmt->fetchColumn();

            $this->pdo->commit();
            return ['success' => true, 'newLikeCount' => $newLikeCount, 'userLikes' => $userLikes];
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    // --- ADMIN PANEL FUNCTIONS ---

/**
     * Gets all comments with user, profile, and content details for the admin panel.
     * @return array
     */
    public function getAllCommentsWithUsers() 
    {
        try {
            // This complex query joins comments with users, profiles, movies, and tv_shows
            // to gather all necessary information in a single database call.
            $sql = "SELECT 
                        c.*, 
                        u.username, 
                        p.name as profile_name,
                        CASE
                            WHEN c.movie_id IS NOT NULL THEN m.title
                            WHEN c.tv_show_id IS NOT NULL THEN tv.title
                            ELSE 'N/A'
                        END AS content_title
                    FROM comments c 
                    LEFT JOIN users u ON c.user_id = u.id 
                    LEFT JOIN profiles p ON c.profile_id = p.id
                    LEFT JOIN movies m ON c.movie_id = m.id
                    LEFT JOIN tv_shows tv ON c.tv_show_id = tv.id
                    ORDER BY c.created_at DESC";
            
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            return [];
        }
    }

    public function updateStatus($id, $status) 
    {
        try {
            $stmt = $this->pdo->prepare("UPDATE comments SET status = ? WHERE id = ?");
            return $stmt->execute([$status, $id]);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function deleteById($id) 
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM comments WHERE id = ?");
            return $stmt->execute([$id]);
        } catch (PDOException $e) {
            return false;
        }
    }
}
