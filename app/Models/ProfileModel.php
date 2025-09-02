<?php
// English: File created at: app/Models/ProfileModel.php

namespace App\Models;

use PDO;
use PDOException;

class ProfileModel
{
    /** @var PDO */
    private $pdo;

    public function __construct()
    {
        // Use the direct PDO connection method that we know is stable.
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
     * Finds all profiles associated with a specific user ID.
     *
     * @param int $userId The ID of the user.
     * @return array An array of profiles.
     */
    public function findByUserId($userId)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM profiles WHERE user_id = ? ORDER BY created_at ASC");
            $stmt->execute([$userId]);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            return [];
        }
    }

    /**
     * Finds a single profile by its ID, ensuring it belongs to the correct user.
     *
     * @param int $profileId The ID of the profile.
     * @param int $userId The ID of the owner user for security verification.
     * @return array|null The profile data or null if not found or not owned by the user.
     */
    public function findById($profileId, $userId)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM profiles WHERE id = ? AND user_id = ?");
            $stmt->execute([$profileId, $userId]);
            $result = $stmt->fetch();
            return $result ?: null;
        } catch (PDOException $e) {
            return null;
        }
    }

    /**
     * Creates a new profile for a user.
     *
     * @param array $data An associative array containing 'user_id', 'name', 'avatar', 'is_child'.
     * @return int|false The ID of the newly created profile, or false on failure.
     */
    public function create($data)
    {
        try {
            $stmt = $this->pdo->prepare(
                "INSERT INTO profiles (user_id, name, avatar, is_child) VALUES (?, ?, ?, ?)"
            );
            $success = $stmt->execute([
                $data['user_id'],
                $data['name'],
                $data['avatar'] ?? null,
                $data['is_child'] ?? 0
            ]);
            return $success ? $this->pdo->lastInsertId() : false;
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Updates an existing profile.
     *
     * @param int   $profileId The ID of the profile to update.
     * @param array $data      An associative array containing 'name', 'avatar', 'is_child'.
     * @return bool True on success, false on failure.
     */
    public function update($profileId, $data)
    {
        try {
            $stmt = $this->pdo->prepare(
                "UPDATE profiles SET name = ?, avatar = ?, is_child = ? WHERE id = ?"
            );
            return $stmt->execute([
                $data['name'],
                $data['avatar'] ?? null,
                $data['is_child'] ?? 0,
                $profileId
            ]);
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Deletes a profile.
     *
     * @param int $profileId The ID of the profile to delete.
     * @param int $userId    The ID of the owner user for security verification.
     * @return bool True on success, false on failure.
     */
    public function delete($profileId, $userId)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM profiles WHERE id = ? AND user_id = ?");
            return $stmt->execute([$profileId, $userId]);
        } catch (PDOException $e) {
            return false;
        }
    }
}