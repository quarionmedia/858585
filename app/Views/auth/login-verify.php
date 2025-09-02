<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verify Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 50%, #0f0f0f 100%);
            color: #d1d5db;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }

        .verification-container {
            background: rgba(26, 26, 26, 0.95);
            backdrop-filter: blur(10px);
            padding: 48px;
            border-radius: 16px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.8);
            width: 100%;
            max-width: 420px;
            text-align: center;
            border: 1px solid rgba(64, 64, 64, 0.3);
            position: relative;
            overflow: hidden;
        }

        .verification-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, #42ca1a, transparent);
        }

        .icon-container {
            width: 64px;
            height: 64px;
            background: rgba(66, 202, 26, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
            border: 2px solid rgba(66, 202, 26, 0.2);
        }

        .shield-icon {
            width: 28px;
            height: 28px;
            fill: #42ca1a;
        }

        h1 {
            color: #ffffff;
            margin-bottom: 12px;
            font-size: 28px;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        p {
            color: #9ca3af;
            margin-bottom: 32px;
            font-size: 15px;
            line-height: 1.5;
        }

        .form-group {
            margin-bottom: 24px;
        }

        input[type="text"] {
            width: 100%;
            padding: 20px;
            background-color: #262626;
            border: 2px solid #404040;
            color: #ffffff;
            border-radius: 12px;
            font-size: 24px;
            text-align: center;
            letter-spacing: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            outline: none;
            font-family: 'Courier New', monospace;
        }

        input[type="text"]:focus {
            border-color: #42ca1a;
            box-shadow: 0 0 0 3px rgba(66, 202, 26, 0.1);
        }

        input[type="text"]::placeholder {
            color: #6b7280;
            letter-spacing: 4px;
        }

        .btn-submit {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #42ca1a 0%, #38b017 100%);
            color: #ffffff;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 24px;
            box-shadow: 0 4px 15px rgba(66, 202, 26, 0.2);
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(66, 202, 26, 0.3);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        .message.error {
            padding: 16px;
            border-radius: 12px;
            margin-bottom: 24px;
            font-weight: 500;
            background: rgba(239, 68, 68, 0.1);
            color: #ef4444;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        .security-note {
            margin-top: 24px;
            padding: 16px;
            background: rgba(59, 130, 246, 0.1);
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: 12px;
            font-size: 13px;
            color: #93c5fd;
        }

        @media (max-width: 480px) {
            .verification-container {
                padding: 32px 24px;
            }
            
            h1 {
                font-size: 24px;
            }
            
            input[type="text"] {
                font-size: 20px;
                letter-spacing: 6px;
                padding: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="verification-container">
        <div class="icon-container">
            <svg class="shield-icon" viewBox="0 0 24 24">
                <path d="M12 1l9 3v7c0 5.55-3.84 10.74-9 12-5.16-1.26-9-6.45-9-12V4l9-3z"/>
                <path d="M9 12l2 2 4-4"/>
            </svg>
        </div>
        
        <h1>Verify Your Login</h1>
        <p>We sent a 6-digit code to your email to secure your account.</p>

        <?php
            // Display error messages from session if any
            if (session_status() === PHP_SESSION_NONE) { session_start(); }
            if (isset($_SESSION['error_message'])) {
                echo '<div class="message error">' . $_SESSION['error_message'] . '</div>';
                unset($_SESSION['error_message']);
            }
        ?>

        <form action="/login/verify" method="POST">
            <div class="form-group">
                <input type="text" name="verification_code" placeholder="------" maxlength="6" required>
            </div>
            <button type="submit" class="btn-submit">Verify</button>
        </form>
        
        <div class="security-note">
            🔒 This extra step helps keep your account secure
        </div>
    </div>
</body>
</html>