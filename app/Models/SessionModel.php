<?php
// English: File created at: app/Models/SessionModel.php

namespace App\Models;

use PDO;
use PDOException;

class SessionModel
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
     * Creates a new session record for a user upon login.
     *
     * @param int    $userId      The ID of the user logging in.
     * @param string $sessionId   The unique PHP session ID.
     * @param string $ipAddress   The user's IP address.
     * @param string $userAgent   The user's browser/device information.
     * @return bool True on success, false on failure.
     */
    public function create($userId, $sessionId, $ipAddress, $userAgent)
    {
        try {
            $stmt = $this->pdo->prepare(
                "INSERT INTO user_sessions (user_id, session_id, ip_address, user_agent) VALUES (?, ?, ?, ?)"
            );
            return $stmt->execute([$userId, $sessionId, $ipAddress, $userAgent]);
        } catch (PDOException $e) {
            // Log error in a real application
            return false;
        }
    }

    /**
     * Finds all active sessions for a given user.
     *
     * @param int $userId The ID of the user.
     * @return array An array of session records.
     */
    public function findByUserId($userId)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM user_sessions WHERE user_id = ? ORDER BY last_activity DESC");
            $stmt->execute([$userId]);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            return [];
        }
    }

    /**
     * Deletes all sessions for a user, except for the current one.
     *
     * @param int    $userId         The ID of the user.
     * @param string $currentSessionId The session ID to exclude from deletion.
     * @return bool True on success, false on failure.
     */
    public function deleteAllForUserExceptCurrent($userId, $currentSessionId)
    {
        try {
            $stmt = $this->pdo->prepare(
                "DELETE FROM user_sessions WHERE user_id = ? AND session_id != ?"
            );
            return $stmt->execute([$userId, $currentSessionId]);
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Deletes a single session by its primary key (ID).
     * An additional check for the user ID is included for security.
     *
     * @param int $sessionId The ID of the session to delete.
     * @param int $userId    The ID of the user who owns the session.
     * @return bool True on success, false on failure.
     */
    public function deleteById($sessionId, $userId)
    {
        try {
            $stmt = $this->pdo->prepare(
                "DELETE FROM user_sessions WHERE id = ? AND user_id = ?"
            );
            return $stmt->execute([$sessionId, $userId]);
        } catch (PDOException $e) {
            return false;
        }
    }
}