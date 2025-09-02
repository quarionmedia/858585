<?php
// English: File created at: app/Models/SearchHistoryModel.php

namespace App\Models;

use PDO;
use PDOException;

class SearchHistoryModel
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
     * Gets the search history for a specific profile.
     *
     * @param int $profileId The ID of the profile.
     * @return array The search history items.
     */
    public function getHistoryByProfileId($profileId)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM profile_search_history WHERE profile_id = ? ORDER BY searched_at DESC");
            $stmt->execute([$profileId]);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            return [];
        }
    }
}