<?php
// English: File updated at: app/Controllers/AuthController.php

namespace App\Controllers;

// Import all necessary models and services at the top
use App\Models\UserModel;
use App\Models\SessionModel;
use App\Services\MailService;

class AuthController 
{
    // --- The registration-related methods remain unchanged ---

    public function showRegisterForm() 
    {
        return view('auth/register', ['title' => 'Register']);
    }

    public function register() 
    {
        if (session_status() === PHP_SESSION_NONE) { session_start(); }
        
        $email = $_POST['email'] ?? null;
        $username = $_POST['username'] ?? null;
        $password = $_POST['password'] ?? null;

        $userModel = new UserModel();
        if ($userModel->findByEmail($email) || $userModel->findByUsername($username)) {
            die('An account with this email or username already exists.');
        }
        
        $userData = ['email' => $email, 'username' => $username, 'password' => $password];
        $result = $userModel->createWithVerificationCode($userData);

        if ($result) {
            $mailService = new MailService();
            $context = [
                'user_id' => $result['id'],
                'verification_code' => $result['code']
            ];
            $mailService->sendTemplateEmail('account_verification_code', $email, $context);

            $_SESSION['verification_email'] = $email;
            header("Location: /register/verify");
            exit();
        } else {
            die("An error occurred during registration.");
        }
    }
    
    public function showVerificationForm()
    {
        if (session_status() === PHP_SESSION_NONE) { session_start(); }
        if (!isset($_SESSION['verification_email'])) {
            header('Location: /register');
            exit;
        }
        return view('auth/verify', [
            'title' => 'Verify Your Account',
            'email' => $_SESSION['verification_email']
        ]);
    }

    public function processVerification()
    {
        if (session_status() === PHP_SESSION_NONE) { session_start(); }

        if (!isset($_SESSION['verification_email'])) {
            header('Location: /register');
            exit;
        }

        $email = $_SESSION['verification_email'];
        $submittedCode = $_POST['verification_code'] ?? '';

        $userModel = new UserModel();
        
        if ($userModel->verifyCode($email, $submittedCode)) {
            $user = $userModel->findByEmail($email);
            unset($_SESSION['verification_email']);

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['is_admin'] = $user['is_admin'];

            $sessionModel = new SessionModel();
            $sessionModel->create($user['id'], session_id(), $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT']);
                        // --- YENİ KODU BURAYA EKLEYİN ---
            // Doğrulama başarılı olduğunda "Hoş Geldin" e-postasını gönder
            $mailService = new \App\Services\MailService();
            $welcomeContext = [
                'username' => $user['username'],
                'user_email' => $user['email']
            ];
            $mailService->sendTemplateEmail('welcome_email', $user['email'], $welcomeContext);
            // --- YENİ KOD BİTİŞ ---

            header('Location: /profiles');
            exit;
        } else {
            $_SESSION['error_message'] = 'Invalid or expired verification code. Please try again.';
            header('Location: /register/verify');
            exit;
        }
    }

    public function resendVerificationCode()
    {
        if (session_status() === PHP_SESSION_NONE) { session_start(); }

        if (!isset($_SESSION['verification_email'])) {
            header('Location: /register');
            exit;
        }

        $email = $_SESSION['verification_email'];
        $userModel = new UserModel();
        $user = $userModel->findByEmail($email);

        if ($user && !$user['is_verified']) {
            $newCodeResult = $userModel->updateVerificationCode($user['id']);

            if ($newCodeResult) {
                $mailService = new MailService();
                $context = [
                    'user_id' => $user['id'],
                    'verification_code' => $newCodeResult['code']
                ];
                $mailService->sendTemplateEmail('account_verification_code', $email, $context);
                $_SESSION['success_message'] = 'A new verification code has been sent to your email.';
            } else {
                $_SESSION['error_message'] = 'Failed to generate a new code.';
            }
        } else {
            $_SESSION['error_message'] = 'This account is already verified or does not exist.';
        }
        
        header('Location: /register/verify');
        exit;
    }

    // --- The login process is now split into multiple steps ---

    public function showLoginForm() 
    {
        return view('auth/login', ['title' => 'Login']);
    }

    /**
     * Step 1: Handles the initial username/password submission.
     * If correct, it sends an OTP code instead of logging the user in directly.
     */
        /**
     * Step 1: Handles the initial username/password submission.
     * If correct, it sends an OTP code instead of logging the user in directly.
     */
        /**
     * Step 1: Handles the initial username/password submission.
     * If correct, it sends an OTP code instead of logging the user in directly.
     */
    public function login() 
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($email) || empty($password)) {
            die('Email and password are required.');
        }

        $userModel = new \App\Models\UserModel();
        $user = $userModel->findByEmail($email);

        if ($user && password_verify($password, $user['password_hash'])) {
            // Correct password, proceed to OTP verification.
            
            if (!$user['is_verified']) {
                $_SESSION['verification_email'] = $user['email'];
                header('Location: /register/verify');
                exit;
            }

            // --- THE FIX IS HERE ---
            // We now call the correct function from the correct model (UserModel).
            $codeResult = $userModel->updateVerificationCode($user['id']);

            if ($codeResult) {
                // Send the login verification code email.
                $mailService = new \App\Services\MailService();
                $context = [
                    'user_id' => $user['id'],
                    'verification_code' => $codeResult['code'],
                    'login_ip_address' => $_SERVER['REMOTE_ADDR'],
                    'login_user_agent' => $_SERVER['HTTP_USER_AGENT']
                ];
                $mailService->sendTemplateEmail('login_verification_code', $user['email'], $context);

                // Store the email in the session to remember who is trying to log in.
                $_SESSION['login_verification_email'] = $user['email'];

                // Redirect to the OTP entry form.
                header("Location: /login/verify");
                exit();
            } else {
                die('Could not generate a verification code. Please try again.');
            }
        } else {
            // Incorrect email or password.
            die('Invalid email or password.');
        }
    }





    /**
     * Step 2: Shows the form where the user enters the OTP code for login.
     */
    public function showLoginVerificationForm()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // If the user hasn't completed the first step, redirect them back to the login page.
        if (!isset($_SESSION['login_verification_email'])) {
            header('Location: /login');
            exit;
        }

        return view('auth/login-verify', [
            'title' => 'Verify Your Login',
            'email' => $_SESSION['login_verification_email']
        ]);
    }

    /**
     * Step 3: Processes the submitted OTP code for login.
     */
    public function processLoginVerification()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['login_verification_email'])) {
            header('Location: /login');
            exit;
        }

        $email = $_SESSION['login_verification_email'];
        $submittedCode = $_POST['verification_code'] ?? '';

        $userModel = new UserModel();
        
        // The 'verifyCode' function now needs to be adapted to not clear the token on login
        if ($userModel->verifyLoginCode($email, $submittedCode)) {
            // Verification successful.
            $user = $userModel->findByEmail($email);
            
            // Clean up the temporary session variable.
            unset($_SESSION['login_verification_email']);

            // --- COMPLETE THE LOGIN PROCESS ---
            session_regenerate_id(true); // Security measure

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['is_admin'] = $user['is_admin'];

            // Record this new, verified session in the database.
            $sessionModel = new SessionModel();
            $sessionModel->create(
                $user['id'],
                session_id(),
                $_SERVER['REMOTE_ADDR'],
                $_SERVER['HTTP_USER_AGENT']
            );

            // Redirect to the profile selection screen.
            header('Location: /profiles');
            exit;

        } else {
            // Verification failed.
            $_SESSION['error_message'] = 'Invalid or expired verification code. Please try again.';
            header('Location: /login/verify'); // Redirect back to the OTP form.
            exit;
        }
    }

    /**
     * Handles the logout process.
     */
    public function logout() 
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_unset();
        session_destroy();
        header("Location: /");
        exit();
    }

    /**
     * --- NEW FUNCTIONS FOR PASSWORD RESET ---
     */

    /**
     * Shows the "Forgot Password" form.
     */
    public function showForgotPasswordForm()
    {
        return view('auth/forgot-password', ['title' => 'Reset Password']);
    }

    /**
     * Handles the "Forgot Password" form submission by sending a reset email.
     */
        public function handleForgotPasswordRequest()
    {
        if (session_status() === PHP_SESSION_NONE) { session_start(); }

        $email = $_POST['email'] ?? '';
        $userModel = new UserModel();
        $code = $userModel->generatePasswordResetCode($email);

        if ($code) {
            $user = $userModel->findByEmail($email);
            $mailService = new MailService();
            $context = [
                'user_id' => $user['id'],
                'verification_code' => $code
            ];
            $mailService->sendTemplateEmail('password_reset_code', $email, $context);
        }
        
        // For security, store the email in the session and redirect to the code entry form.
        $_SESSION['password_reset_email'] = $email;
        header('Location: /reset-password/verify');
        exit;
    }

    public function showResetCodeForm()
    {
        if (session_status() === PHP_SESSION_NONE) { session_start(); }
        if (empty($_SESSION['password_reset_email'])) {
            header('Location: /forgot-password');
            exit;
        }
        return view('auth/reset-password-verify', ['title' => 'Enter Code']);
    }

    /**
     * --- CORRECTED FUNCTION ---
     * Handles the submission of the password reset OTP code.
     */
    /**
     * --- DEBUGGING VERSION ---
     * Handles the submission of the password reset OTP code.
     */
    /**
     * --- CLEANED UP FUNCTION ---
     * Handles the submission of the password reset OTP code.
     */
    public function handleResetCodeVerification()
    {
        if (session_status() === PHP_SESSION_NONE) { session_start(); }
        
        $email = $_SESSION['password_reset_email'] ?? null;
        $code = $_POST['verification_code'] ?? null;

        if (!$email || !$code) {
            header('Location: /forgot-password');
            exit;
        }

        $userModel = new \App\Models\UserModel();
        if ($userModel->verifyPasswordResetCode($email, $code)) {
            // Code is correct, set a session flag to grant access to the next step.
            $_SESSION['password_reset_verified'] = true;
            
            // Redirect to the form where the user can set a new password.
            header('Location: /reset-password/new');
            exit;
        } else {
            // Code is incorrect, redirect back with an error message.
            $_SESSION['error_message'] = 'Invalid or expired verification code.';
            header('Location: /reset-password/verify');
            exit;
        }
    }

    public function showNewPasswordForm()
    {
        if (session_status() === PHP_SESSION_NONE) { session_start(); }
        if (empty($_SESSION['password_reset_verified'])) {
            header('Location: /forgot-password');
            exit;
        }
        return view('auth/reset-password-new', ['title' => 'Set New Password']);
    }

    /**
     * Shows the form to enter a new password, validating the token from the URL.
     * @param string $token The password reset token from the URL.
     */
    public function showResetPasswordForm($token)
    {
        $userModel = new UserModel();
        $user = $userModel->findUserByResetToken($token);

        if (!$user) {
            die('This password reset link is invalid or has expired.');
        }

        return view('auth/reset-password', [
            'title' => 'Set New Password',
            'token' => $token
        ]);
    }

    /**
     * Handles the new password form submission.
     */
    public function handleResetPassword()
    {
        if (session_status() === PHP_SESSION_NONE) { session_start(); }

        $email = $_SESSION['password_reset_email'] ?? null;
        $newPassword = $_POST['password'] ?? '';
        $confirmPassword = $_POST['password_confirm'] ?? '';

        if (!$email || empty($_SESSION['password_reset_verified']) || $newPassword !== $confirmPassword) {
            die('Invalid request or passwords do not match.');
        }

        $userModel = new UserModel();
        if ($userModel->resetPasswordByEmail($email, $newPassword)) {
            // Clean up session and redirect to login with a success message.
            unset($_SESSION['password_reset_email'], $_SESSION['password_reset_verified']);
            $_SESSION['success_message'] = 'Your password has been reset successfully.';
            header('Location: /login');
            exit;
        } else {
            die('Failed to reset password.');
        }
    }
}

