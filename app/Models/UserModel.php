<?php
// English: File updated at: app/Models/UserModel.php

namespace App\Models;

use PDO;
use PDOException;

class UserModel 
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
     * Creates a new user in the database.
     * @param array $data User data including 'email', 'username', and 'password'.
     * @return int|false The ID of the new user, or false on failure.
     */
    public function create($data) 
    {
        $passwordHash = password_hash($data['password'], PASSWORD_DEFAULT);
        try {
            $stmt = $this->pdo->prepare("INSERT INTO users (email, username, password_hash) VALUES (?, ?, ?)");
            $success = $stmt->execute([$data['email'], $data['username'], $passwordHash]);
            return $success ? $this->pdo->lastInsertId() : false;
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Finds a single user by their ID. Fetches all columns.
     * @param int $id The user's ID.
     * @return array|null The user data as an array, or null if not found.
     */
    public function findById($id) 
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
            $stmt->execute([$id]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            return null;
        }
    }

    /**
     * Finds a single user by their email address.
     * @param string $email The user's email.
     * @return array|null The user data as an array, or null if not found.
     */
    public function findByEmail($email) 
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->execute([$email]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            return null;
        }
    }

    /**
     * Finds a single user by their username.
     * @param string $username The user's username.
     * @return array|null The user data as an array, or null if not found.
     */
    public function findByUsername($username) 
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->execute([$username]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            return null;
        }
    }

    // --- NEW FUNCTIONS FOR ACCOUNT SETTINGS ---

    /**
     * Updates a user's profile information (email and username).
     * @param int $userId The ID of the user to update.
     * @param array $data An associative array with 'email' and 'username'.
     * @return bool True on success, false on failure.
     */
    public function updateProfile($userId, $data)
    {
        try {
            $stmt = $this->pdo->prepare("UPDATE users SET email = ?, username = ? WHERE id = ?");
            return $stmt->execute([$data['email'], $data['username'], $userId]);
        } catch (PDOException $e) {
            // This can fail if the email or username is not unique.
            return false;
        }
    }

    /**
     * Updates a user's password.
     * @param int $userId The ID of the user to update.
     * @param string $newPassword The new plain text password.
     * @return bool True on success, false on failure.
     */
    public function updatePassword($userId, $newPassword)
    {
        try {
            $passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);
            $stmt = $this->pdo->prepare("UPDATE users SET password_hash = ? WHERE id = ?");
            return $stmt->execute([$passwordHash, $userId]);
        } catch (PDOException $e) {
            return false;
        }
    }
    
    // --- ADMIN PANEL FUNCTIONS ---

    /**
     * --- THIS FUNCTION WAS MISSING ---
     * Counts the total number of users.
     * @return int The total number of users.
     */
    public function countAllUsers() {
        try {
            $stmt = $this->pdo->query("SELECT COUNT(*) FROM users");
            return $stmt->fetchColumn();
        } catch (PDOException $e) {
            return 0;
        }
    }

    /**
     * Gets all users for the admin panel.
     * @return array
     */
    public function getAllUsers() {
        try {
            $stmt = $this->pdo->query("SELECT id, username, email, is_admin, created_at FROM users ORDER BY id DESC");
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            return [];
        }
    }

    /**
     * Updates a user's details from the admin panel.
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update($id, $data) {
        try {
            $sql = "UPDATE users SET email = :email, username = :username, is_admin = :is_admin";
            $params = [
                ':id' => $id,
                ':email' => $data['email'],
                ':username' => $data['username'],
                ':is_admin' => $data['is_admin']
            ];

            if (!empty($data['password'])) {
                $sql .= ", password_hash = :password_hash";
                $params[':password_hash'] = password_hash($data['password'], PASSWORD_DEFAULT);
            }

            $sql .= " WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute($params);
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Deletes a user by their ID.
     * @param int $id
     * @return bool
     */
    public function deleteById($id) {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = ?");
            return $stmt->execute([$id]);
        } catch (PDOException $e) {
            return false;
        }
    }

        public function verifyAccount($userId)
    {
        try {
            $stmt = $this->pdo->prepare(
                "UPDATE users SET is_verified = 1, verification_token = NULL, token_expires_at = NULL WHERE id = ?"
            );
            return $stmt->execute([$userId]);
        } catch (PDOException $e) {
            return false;
        }
    }

        public function findByVerificationCodeAndEmail($email, $code)
    {
        try {
            $stmt = $this->pdo->prepare(
                "SELECT * FROM users WHERE email = ? AND verification_token = ? AND is_verified = 0"
            );
            $stmt->execute([$email, $code]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            return null;
        }
    }

    public function createWithVerificationCode($data) 
    {
        $passwordHash = password_hash($data['password'], PASSWORD_DEFAULT);
        $verificationCode = random_int(100000, 999999); // 6 haneli kod üret
        $tokenExpiresAt = date('Y-m-d H:i:s', strtotime('+1 minute'));

        try {
            $stmt = $this->pdo->prepare(
                "INSERT INTO users (email, username, password_hash, verification_token, token_expires_at) 
                 VALUES (?, ?, ?, ?, ?)"
            );
            $success = $stmt->execute([
                $data['email'], 
                $data['username'], 
                $passwordHash,
                $verificationCode,
                $tokenExpiresAt
            ]);
            
            // --- DÜZELTME BURADA ---
            // Önceki kod sadece ID'yi döndürüyordu. 
            // Bu yeni kod, hem ID'yi hem de kodu bir dizi içinde döndürüyor.
            if ($success) {
                return [
                    'id'   => $this->pdo->lastInsertId(),
                    'code' => $verificationCode
                ];
            } else {
                return false;
            }

        } catch (PDOException $e) {
            return false;
        }
    }

        public function regenerateVerificationCode($userId)
    {
        $newCode = random_int(100000, 999999);
        $newExpiresAt = date('Y-m-d H:i:s', strtotime('+1 minute'));

        try {
            $stmt = $this->pdo->prepare(
                "UPDATE users SET verification_token = ?, token_expires_at = ? WHERE id = ?"
            );
            $success = $stmt->execute([$newCode, $newExpiresAt, $userId]);
            return $success ? $newCode : false;
        } catch (PDOException $e) {
            return false;
        }
    }

        public function verifyCode($email, $code)
    {
        try {
            $user = $this->findByEmail($email);

            if (!$user || $user['verification_token'] !== $code) {
                return 'invalid';
            }

            if (strtotime($user['token_expires_at']) < time()) {
                return 'expired';
            }

            // Code is correct and not expired, verify the account
            $this->verifyAccount($user['id']);
            return 'success';

        } catch (PDOException $e) {
            return 'invalid';
        }
    }

    /**
     * --- NEW FUNCTION FOR LOGIN OTP ---
     * Verifies a login attempt by checking the provided code.
     * It does NOT change the verification status, only checks the code.
     *
     * @param string $email The user's email.
     * @param string $submittedCode The 6-digit code submitted by the user.
     * @return bool True if the code is correct and not expired, false otherwise.
     */
    public function verifyLoginCode($email, $submittedCode)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ? AND is_verified = 1");
            $stmt->execute([$email]);
            $user = $stmt->fetch();

            if (!$user) { 
                return false; // User not found or not verified
            }

            // Check if the code matches and has not expired
            if ($user['verification_token'] == $submittedCode && strtotime($user['token_expires_at']) > time()) {
                // Code is correct for login, clear the token for security
                $updateStmt = $this->pdo->prepare(
                    "UPDATE users SET verification_token = NULL, token_expires_at = NULL WHERE id = ?"
                );
                $updateStmt->execute([$user['id']]);
                return true;
            }
            
            return false; // Code is incorrect or expired
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * --- NEW FUNCTION FOR LOGIN & RESEND OTP ---
     * Generates and updates a new verification code for an existing user.
     *
     * @param int $userId The ID of the user.
     * @return array|false An array with the user's ID and new code, or false on failure.
     */
    public function updateVerificationCode($userId)
    {
        try {
            $verificationCode = random_int(100000, 999999); // Generate a new 6-digit code
            $tokenExpiresAt = date('Y-m-d H:i:s', strtotime('+1 minute')); // Set a new 1-minute expiry

            $stmt = $this->pdo->prepare(
                "UPDATE users SET verification_token = ?, token_expires_at = ? WHERE id = ?"
            );
            $success = $stmt->execute([$verificationCode, $tokenExpiresAt, $userId]);
            
            // Return the new code if the update was successful
            return $success ? ['id' => $userId, 'code' => $verificationCode] : false;

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * --- NEW FUNCTIONS FOR PASSWORD RESET ---
     */

    /**
     * Generates a password reset token for a user.
     *
     * @param string $email The email of the user requesting the reset.
     * @return string|false The generated token on success, false on failure.
     */
    public function generatePasswordResetToken($email)
    {
        try {
            $user = $this->findByEmail($email);
            if (!$user) {
                // For security, don't reveal that the user doesn't exist.
                return false; 
            }

            $token = bin2hex(random_bytes(32)); // Generate a secure random token
            $expiresAt = date('Y-m-d H:i:s', strtotime('+1 hour')); // Token is valid for 1 hour

            $stmt = $this->pdo->prepare(
                "UPDATE users SET password_reset_token = ?, reset_token_expires_at = ? WHERE id = ?"
            );
            
            if ($stmt->execute([$token, $expiresAt, $user['id']])) {
                return $token;
            }
            
            return false;

        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Finds a user by a valid (non-expired) password reset token.
     *
     * @param string $token The password reset token.
     * @return array|null The user data or null if the token is invalid or expired.
     */
    public function findUserByResetToken($token)
    {
        try {
            $stmt = $this->pdo->prepare(
                "SELECT * FROM users WHERE password_reset_token = ? AND reset_token_expires_at > NOW()"
            );
            $stmt->execute([$token]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            return null;
        }
    }

    /**
     * Resets a user's password using a valid token.
     *
     * @param string $token The password reset token.
     * @param string $newPassword The new plain text password.
     * @return bool True on success, false on failure.
     */
    public function resetPassword($token, $newPassword)
    {
        try {
            $user = $this->findUserByResetToken($token);
            if (!$user) {
                return false; // Token is invalid or expired
            }

            $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);

            $stmt = $this->pdo->prepare(
                "UPDATE users SET password_hash = ?, password_reset_token = NULL, reset_token_expires_at = NULL WHERE id = ?"
            );

            return $stmt->execute([$newPasswordHash, $user['id']]);

        } catch (PDOException $e) {
            return false;
        }
    }

public function generatePasswordResetCode($email)
    {
        try {
            $user = $this->findByEmail($email);
            if (!$user) {
                return false; 
            }

            $resetCode = random_int(100000, 999999);

            // ZAMANLAMA SORUNUNU ÇÖZEN DEĞİŞİKLİK BURADA:
            // Zamanı PHP'de değil, doğrudan SQL sorgusunda hesaplıyoruz.
            $stmt = $this->pdo->prepare(
                "UPDATE users SET password_reset_token = ?, reset_token_expires_at = DATE_ADD(NOW(), INTERVAL 10 MINUTE) WHERE id = ?"
            );
            
            if ($stmt->execute([$resetCode, $user['id']])) {
                return $resetCode;
            }
            
            return false;

        } catch (PDOException $e) {
            return false;
        }
    }

public function verifyPasswordResetCode($email, $code)
    {
        try {
            $stmt = $this->pdo->prepare(
                "SELECT * FROM users WHERE email = ? AND password_reset_token = ? AND reset_token_expires_at > NOW()"
            );
            $stmt->execute([$email, $code]);
            return $stmt->fetch() ? true : false;
        } catch (PDOException $e) {
            return false;
        }
    }

        public function resetPasswordByEmail($email, $newPassword)
    {
        try {
            $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);

            $stmt = $this->pdo->prepare(
                "UPDATE users SET password_hash = ?, password_reset_token = NULL, reset_token_expires_at = NULL WHERE email = ?"
            );

            return $stmt->execute([$newPasswordHash, $email]);

        } catch (PDOException $e) {
            return false;
        }
    }
}
