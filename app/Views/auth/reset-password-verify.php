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
        padding: 20px;
    }

    .verification-container { 
        background: rgba(26, 26, 26, 0.95);
        backdrop-filter: blur(10px);
        padding: 48px; 
        border-radius: 16px; 
        text-align: center; 
        width: 100%; 
        max-width: 420px;
        border: 1px solid rgba(64, 64, 64, 0.3);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.8);
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
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 12px;
        letter-spacing: -0.5px;
    }

    p { 
        color: #9ca3af; 
        margin-bottom: 32px;
        font-size: 15px;
        line-height: 1.5;
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
        font-weight: 600;
        letter-spacing: 8px;
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
        cursor: pointer; 
        margin-top: 24px;
        font-weight: 600;
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

    .message { 
        color: #ef4444; 
        background: rgba(239, 68, 68, 0.1); 
        padding: 16px; 
        border-radius: 12px; 
        margin-bottom: 24px;
        border: 1px solid rgba(239, 68, 68, 0.3);
        font-weight: 500;
    }

    .resend-link {
        margin-top: 24px;
        padding-top: 24px;
        border-top: 1px solid rgba(64, 64, 64, 0.3);
    }

    .resend-link a {
        color: #42ca1a;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s ease;
    }

    .resend-link a:hover {
        color: #38b017;
        text-decoration: underline;
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
        }
    }
</style>

<div class="verification-container">
    <div class="icon-container">
        <svg class="mail-icon" viewBox="0 0 24 24">
            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
            <polyline points="22,6 12,13 2,6"/>
        </svg>
    </div>
    
    <h1>Enter Code</h1>

    <?php
        // Hata mesajı varsa göster
        if (session_status() === PHP_SESSION_NONE) { session_start(); }
        if (isset($_SESSION['error_message'])) {
            echo '<div class="message">' . $_SESSION['error_message'] . '</div>';
            unset($_SESSION['error_message']);
        }
    ?>

    <p>Enter the 6-digit code sent to your email address.</p>
    <form action="/reset-password/verify" method="POST">
        <div class="form-group">
            <input type="text" name="verification_code" placeholder="------" maxlength="6" class="verification-input" required>
        </div>
        <button type="submit" class="btn-submit">Verify</button>
    </form>
    
    <div class="resend-link">
        <a href="/forgot-password">Resend code</a>
    </div>
</div>