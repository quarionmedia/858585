<?php
// English: File created at: app/Models/WatchHistoryModel.php

namespace App\Models;

use PDO;
use PDOException;

class WatchHistoryModel
{
    /** @var PDO */
    private $pdo;

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
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->pdo = new PDO($dsn, $user, $password, $options);
        } catch (PDOException $e) {
            die("Database connection error: " . $e->getMessage());
        }
    }

    /**
     * Gets the watch history for a specific profile, joined with content details.
     *
     * @param int $profileId The ID of the profile.
     * @return array The watch history items.
     */
    public function getHistoryByProfileId($profileId)
    {
        try {
            // This is a complex query that joins the history with movies and tv_shows tables
            // to get the title and slug for each history item.
            $sql = "
                SELECT 
                    h.*,
                    CASE
                        WHEN h.content_type = 'movie' THEN m.title
                        WHEN h.content_type = 'tv_show' THEN tv.title
                    END AS title,
                    CASE
                        WHEN h.content_type = 'movie' THEN m.slug
                        WHEN h.content_type = 'tv_show' THEN tv.slug
                    END AS slug,
                    CASE
                        WHEN h.content_type = 'movie' THEN m.poster_path
                        WHEN h.content_type = 'tv_show' THEN tv.poster_path
                    END AS poster_path
                FROM profile_watch_history h
                LEFT JOIN movies m ON h.content_id = m.id AND h.content_type = 'movie'
                LEFT JOIN tv_shows tv ON h.content_id = tv.id AND h.content_type = 'tv_show'
                WHERE h.profile_id = ?
                ORDER BY h.last_watched_at DESC
            ";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$profileId]);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            return [];
        }
    }
}