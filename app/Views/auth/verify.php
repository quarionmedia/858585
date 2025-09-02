<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($title ?? 'Verify Account'); ?></title>
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

        .mail-icon {
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

        p strong {
            color: #42ca1a;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 24px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #e5e7eb;
            font-weight: 500;
            font-size: 14px;
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
            box-shadow: 0 4px 15px rgba(66, 202, 26, 0.2);
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(66, 202, 26, 0.3);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        .resend-container {
            margin-top: 32px;
            padding-top: 24px;
            border-top: 1px solid rgba(64, 64, 64, 0.3);
            font-size: 14px;
            color: #9ca3af;
        }

        .resend-btn {
            background: none;
            border: none;
            color: #42ca1a;
            cursor: pointer;
            font-weight: 600;
            font-size: 14px;
            transition: color 0.3s ease;
            text-decoration: underline;
        }

        .resend-btn:hover:not(:disabled) {
            color: #38b017;
        }

        .resend-btn:disabled {
            color: #6b7280;
            cursor: not-allowed;
            text-decoration: none;
        }

        .message {
            padding: 16px;
            border-radius: 12px;
            margin-bottom: 24px;
            font-weight: 500;
            font-size: 14px;
        }

        .message.error {
            background: rgba(239, 68, 68, 0.1);
            color: #ef4444;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        .message.success {
            background: rgba(66, 202, 26, 0.1);
            color: #42ca1a;
            border: 1px solid rgba(66, 202, 26, 0.3);
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
            <svg class="mail-icon" viewBox="0 0 24 24">
                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                <polyline points="22,6 12,13 2,6"/>
            </svg>
        </div>
        
        <h1>Check your email</h1>
        <p>We've sent a 6-digit verification code to <strong><?php echo htmlspecialchars($email ?? ''); ?></strong></p>

        <?php
            // Display success or error messages from session
            if (isset($_SESSION['success_message'])) {
                echo '<div class="message success">' . $_SESSION['success_message'] . '</div>';
                unset($_SESSION['success_message']);
            }
            if (isset($_SESSION['error_message'])) {
                echo '<div class="message error">' . $_SESSION['error_message'] . '</div>';
                unset($_SESSION['error_message']);
            }
        ?>

        <form action="/register/verify/process" method="POST">
            <div class="form-group">
                <label for="verification_code">Enter Code</label>
                <input type="text" id="verification_code" name="verification_code" placeholder="------" maxlength="6" required>
            </div>
            <button type="submit" class="btn-submit">Verify</button>
        </form>

        <div class="resend-container">
            Didn't receive a code? 
            <form action="/register/resend" method="POST" style="display: inline;">
                <button type="submit" id="resend-btn" class="resend-btn">
                    Resend Code <span id="countdown">(60)</span>
                </button>
            </form>
        </div>
    </div>

    <script>
        // English: JavaScript for the resend button countdown
        document.addEventListener('DOMContentLoaded', function() {
            const resendBtn = document.getElementById('resend-btn');
            const countdownSpan = document.getElementById('countdown');
            let timeLeft = 60;

            function startCountdown() {
                resendBtn.disabled = true;
                countdownSpan.style.display = 'inline';

                const timer = setInterval(function() {
                    timeLeft--;
                    countdownSpan.textContent = `(${timeLeft})`;
                    if (timeLeft <= 0) {
                        clearInterval(timer);
                        resendBtn.disabled = false;
                        countdownSpan.style.display = 'none';
                        timeLeft = 60; // Reset for the next time
                    }
                }, 1000);
            }

            startCountdown(); // Start countdown on page load
        });
    </script>
</body>
</html>