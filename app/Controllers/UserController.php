<?php
// English: File updated at: app/Controllers/UserController.php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\SessionModel; // <-- Import the new SessionModel

class UserController
{
    /**
     * Displays the main account settings page.
     * Fetches user details and their active sessions.
     */
    public function showAccountPage()
    {
        // Ensure the user is logged in
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        $userModel = new UserModel();
        $sessionModel = new SessionModel(); // <-- Instantiate SessionModel

        $user = $userModel->findById($_SESSION['user_id']);
        $sessions = $sessionModel->findByUserId($_SESSION['user_id']); // <-- Fetch user sessions

        // Pass both user and session data to the view
        view('account', [
            'title' => 'Account Settings',
            'user' => $user,
            'sessions' => $sessions // <-- Pass sessions to the view
        ]);
    }

    /**
     * Handles the form submission for updating user profile details.
     */
    public function updateProfile()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        $userId = $_SESSION['user_id'];
        $email = $_POST['email'] ?? '';
        $username = $_POST['username'] ?? '';

        $userModel = new UserModel();
        
        $data = [
            'email' => $email,
            'username' => $username,
        ];

        if ($userModel->updateProfile($userId, $data)) {
            // Update session variables to reflect changes immediately
            $_SESSION['user_email'] = $email;
            $_SESSION['username'] = $username;
            $_SESSION['success_message'] = 'Profile updated successfully.';
        } else {
            $_SESSION['error_message'] = 'Failed to update profile. The username or email may already be in use.';
        }

        header('Location: /account');
        exit;
    }

    /**
     * Handles the form submission for changing the user's password.
     */
    public function changePassword()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        $userId = $_SESSION['user_id'];
        $currentPassword = $_POST['current_password'] ?? '';
        $newPassword = $_POST['new_password'] ?? '';
        $confirmPassword = $_POST['confirm_password'] ?? '';

        if ($newPassword !== $confirmPassword) {
            $_SESSION['error_message'] = 'New passwords do not match.';
            header('Location: /account');
            exit;
        }

        $userModel = new UserModel();
        $user = $userModel->findById($userId);

        // Verify the current password for security
        if ($user && password_verify($currentPassword, $user['password_hash'])) {
            if ($userModel->updatePassword($userId, $newPassword)) {
                $_SESSION['success_message'] = 'Password changed successfully.';
            } else {
                $_SESSION['error_message'] = 'Failed to change password.';
            }
        } else {
            $_SESSION['error_message'] = 'Incorrect current password.';
        }

        header('Location: /account');
        exit;
    }

    /**
     * Handles the form submission for deleting the user's account.
     */
    public function deleteAccount()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        $userId = $_SESSION['user_id'];
        $password = $_POST['password'] ?? '';

        $userModel = new \App\Models\UserModel();
        $user = $userModel->findById($userId);

        // Verify the user's password for security
        if ($user && password_verify($password, $user['password_hash'])) {
            if ($userModel->deleteById($userId)) {
                // Deletion successful, log the user out completely
                session_unset();
                session_destroy();
                header('Location: /'); // Redirect to homepage
                exit;
            } else {
                $_SESSION['error_message'] = 'Failed to delete account. Please try again.';
            }
        } else {
            $_SESSION['error_message'] = 'Incorrect password. Account deletion failed.';
        }

        header('Location: /account');
        exit;
    }

    /**
     * --- NEW FUNCTION for Session Management ---
     * Handles the request to log out from all other devices.
     */
    public function logoutOtherSessions()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        $userId = $_SESSION['user_id'];
        $currentSessionId = session_id();

        $sessionModel = new SessionModel();
        
        if ($sessionModel->deleteAllForUserExceptCurrent($userId, $currentSessionId)) {
            $_SESSION['success_message'] = 'Successfully logged out from all other devices.';
        } else {
            $_SESSION['error_message'] = 'Failed to log out from other devices.';
        }

        header('Location: /account');
        exit;
    }

    /**
     * --- NEW FUNCTION ---
     * Handles the request to log out from a single, specific device.
     * @param int $sessionId The ID of the session to be terminated.
     */
    public function logoutSingleSession($sessionId)
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        $userId = $_SESSION['user_id'];

        $sessionModel = new \App\Models\SessionModel();
        
        // The model's deleteById includes a check for the userId for security
        if ($sessionModel->deleteById($sessionId, $userId)) {
            $_SESSION['success_message'] = 'Successfully logged out from the selected device.';
        } else {
            $_SESSION['error_message'] = 'Failed to log out from the selected device. It might have already been removed.';
        }

        header('Location: /account');
        exit;
    }
}
