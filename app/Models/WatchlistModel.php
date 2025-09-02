<?php
// English: File updated at: app/Models/WatchlistModel.php

namespace App\Models;

use PDO;
use PDOException;

class WatchlistModel
{
    /** @var PDO */
    protected $pdo;

    public function __construct()
    {
        // Using a direct PDO connection for stability.
        $host = 'localhost';
        $dbname = 'muvixtvdb';
        $user = 'root';
        $password = '';
        $charset = 'utf8mb4';
        
        $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Use ASSOC for arrays
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->pdo = new PDO($dsn, $user, $password, $options);
        } catch (PDOException $e) {
            die("Database connection error: " . $e->getMessage());
        }
    }

    /**
     * Get all watchlist items for a specific profile.
     * @param int $profileId The ID of the profile.
     * @return array An array of watchlist items.
     */
    public function getWatchlistByProfileId($profileId)
    {
        // UPDATED: Now fetches based on profile_id instead of user_id.
        $stmt = $this->pdo->prepare("SELECT * FROM user_watchlist WHERE profile_id = ?");
        $stmt->execute([$profileId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Toggles an item's status in a profile's watchlist.
     * @param int $profileId The profile's ID.
     * @param int $contentId The content's ID.
     * @param string $contentType The content's type ('movie' or 'tv_show').
     * @return array An array indicating the status and action performed.
     */
    public function toggleWatchlist($profileId, $contentId, $contentType)
    {
        try {
            // UPDATED: Now checks based on profile_id.
            $stmt = $this->pdo->prepare("SELECT id FROM user_watchlist WHERE profile_id = ? AND content_id = ? AND content_type = ?");
            $stmt->execute([$profileId, $contentId, $contentType]);
            $existing = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($existing) {
                // If it exists, remove it.
                $deleteStmt = $this->pdo->prepare("DELETE FROM user_watchlist WHERE id = ?");
                $deleteStmt->execute([$existing['id']]);
                return ['status' => 'success', 'action' => 'removed'];
            } else {
                // If it does not exist, add it.
                // UPDATED: Now inserts with profile_id.
                $insertStmt = $this->pdo->prepare(
                    "INSERT INTO user_watchlist (user_id, profile_id, content_id, content_type) VALUES (?, ?, ?, ?)"
                );
                // We still store user_id for reference, but the main logic uses profile_id.
                $insertStmt->execute([$_SESSION['user_id'], $profileId, $contentId, $contentType]);
                return ['status' => 'success', 'action' => 'added'];
            }
        } catch (PDOException $e) {
            return ['status' => 'error', 'message' => 'Database Error: ' . $e->getMessage()];
        }
    }
    
    // NOTE: The getWatchlistByUserId and isInWatchlist functions are no longer needed
    // as their logic is now handled by getWatchlistByProfileId and the controllers.
    // Keeping the model clean with only necessary functions.
}
