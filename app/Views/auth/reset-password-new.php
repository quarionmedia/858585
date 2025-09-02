<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 50%, #0f0f0f 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .auth-container {
        max-width: 420px;
        margin: 0 auto;
        padding: 48px;
        background: rgba(26, 26, 26, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 16px;
        border: 1px solid rgba(64, 64, 64, 0.3);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.8);
        position: relative;
        overflow: hidden;
    }

    .auth-container::before {
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

    .lock-icon {
        width: 28px;
        height: 28px;
        fill: #42ca1a;
    }

    .auth-container h1 {
        text-align: center;
        margin-bottom: 32px;
        color: #ffffff;
        font-size: 28px;
        font-weight: 700;
        letter-spacing: -0.5px;
    }

    .form-group {
        margin-bottom: 24px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: #e5e7eb;
        font-weight: 500;
        font-size: 14px;
    }

    .form-group input {
        width: 100%;
        padding: 16px;
        background: #262626;
        border: 2px solid #404040;
        color: #ffffff;
        border-radius: 12px;
        font-size: 16px;
        transition: all 0.3s ease;
        outline: none;
    }

    .form-group input:focus {
        border-color: #42ca1a;
        box-shadow: 0 0 0 3px rgba(66, 202, 26, 0.1);
    }

    .form-group input::placeholder {
        color: #6b7280;
    }

    .password-strength {
        margin-top: 8px;
        font-size: 12px;
        color: #6b7280;
    }

    .btn-submit {
        width: 100%;
        padding: 16px;
        background: linear-gradient(135deg, #42ca1a 0%, #38b017 100%);
        border: none;
        color: #ffffff;
        font-weight: 600;
        cursor: pointer;
        border-radius: 12px;
        font-size: 16px;
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
        .auth-container {
            padding: 32px 24px;
        }
        
        .auth-container h1 {
            font-size: 24px;
        }
    }
</style>

<div class="auth-container">
    <div class="icon-container">
        <svg class="lock-icon" viewBox="0 0 24 24">
            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
            <circle cx="12" cy="16" r="1"/>
            <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
        </svg>
    </div>
    
    <h1>Set New Password</h1>
    <form action="/reset-password/new" method="POST">
        <div class="form-group">
            <label for="password">New Password</label>
            <input type="password" id="password" name="password" placeholder="••••••••" required>
            <div class="password-strength">At least 8 characters with uppercase, lowercase and numbers</div>
        </div>
        <div class="form-group">
            <label for="password_confirm">Confirm Password</label>
            <input type="password" id="password_confirm" name="password_confirm" placeholder="••••••••" required>
        </div>
        <button type="submit" class="btn-submit">Reset Password</button>
    </form>
    
    <div class="security-note">
        💡 We recommend changing your password regularly for security
    </div>
</div>