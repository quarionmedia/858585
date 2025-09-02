<?php
// English: File updated at: app/Models/ReportModel.php

namespace App\Models;

// Import the required classes
use PDO;
use PDOException;

// The ReportModel now extends BaseModel to inherit the stable PDO connection.
class ReportModel extends BaseModel
{
    /**
     * Creates a new report in the database, linked to a user and profile.
     *
     * @param array $data The report data.
     * @return bool True on success, false on failure.
     */
    public function create($data)
    {
        try {
            $sql = "INSERT INTO reports (user_id, profile_id, content_id, content_type, reason, additional_info, status) 
                    VALUES (?, ?, ?, ?, ?, ?, 'pending')";
            
            $stmt = $this->pdo->prepare($sql);
            
            return $stmt->execute([
                $data['user_id'],
                $data['profile_id'],
                $data['content_id'],
                $data['content_type'],
                $data['reason'],
                $data['additional_info']
            ]);
        } catch (PDOException $e) {
            // --- TEMPORARY DEBUGGING CODE ---
            // This will show the exact database error instead of a generic message.
            die("Database Error: " . $e->getMessage());
        }
    }
    
    // --- Existing Admin Panel Functions (Now using stable PDO connection) ---

/**
     * Gets all reports with user, profile, and content details for the admin panel.
     * @return array
     */
/**
     * Gets all reports with user, profile, and content details for the admin panel.
     * @return array
     */
    public function getAllReportsWithDetails()
    {
        try {
            // This query now joins reports with users, profiles, movies, and tv_shows
            // to gather all necessary information for the admin panel.
            $sql = "
                SELECT 
                    r.*, 
                    u.username, 
                    p.name as profile_name,
                    CASE
                        WHEN r.content_type = 'movie' THEN m.title
                        WHEN r.content_type = 'tv_show' THEN tv.title
                        ELSE 'N/A'
                    END AS content_title,
                    CASE
                        WHEN r.content_type = 'movie' THEN m.poster_path
                        WHEN r.content_type = 'tv_show' THEN tv.poster_path
                        ELSE NULL
                    END AS content_poster
                FROM reports r
                LEFT JOIN users u ON r.user_id = u.id
                LEFT JOIN profiles p ON r.profile_id = p.id
                LEFT JOIN movies m ON r.content_id = m.id AND r.content_type = 'movie'
                LEFT JOIN tv_shows tv ON r.content_id = tv.id AND r.content_type = 'tv_show'
                ORDER BY r.created_at DESC
            ";
            
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            return [];
        }
    }

    public function updateStatus($id, $status)
    {
        try {
            $stmt = $this->pdo->prepare("UPDATE reports SET status = ? WHERE id = ?");
            return $stmt->execute([$status, $id]);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function deleteById($id)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM reports WHERE id = ?");
            return $stmt->execute([$id]);
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Finds a single report by its ID and joins user/content data.
     *
     * @param int $id The ID of the report.
     * @return array|null The report data or null if not found.
     */
    public function findReportDetailsById($id)
    {
        try {
            // This query is similar to getAllReportsWithDetails but for a single report.
            $sql = "
                SELECT 
                    r.*, 
                    u.email as user_email,
                    u.username, 
                    p.name as profile_name,
                    CASE
                        WHEN r.content_type = 'movie' THEN m.title
                        WHEN r.content_type = 'tv_show' THEN tv.title
                        ELSE 'N/A'
                    END AS content_title
                FROM reports r
                LEFT JOIN users u ON r.user_id = u.id
                LEFT JOIN profiles p ON r.profile_id = p.id
                LEFT JOIN movies m ON r.content_id = m.id AND r.content_type = 'movie'
                LEFT JOIN tv_shows tv ON r.content_id = tv.id AND r.content_type = 'tv_show'
                WHERE r.id = ?
            ";
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            return null;
        }
    }
}