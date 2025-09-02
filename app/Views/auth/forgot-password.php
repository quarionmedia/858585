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

    .auth-container h1 {
        text-align: center;
        margin-bottom: 12px;
        color: #ffffff;
        font-size: 28px;
        font-weight: 700;
        letter-spacing: -0.5px;
    }

    .auth-container .sub-text {
        text-align: center;
        color: #9ca3af;
        margin-bottom: 32px;
        font-size: 15px;
        line-height: 1.5;
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

    .auth-links {
        text-align: center;
        margin-top: 28px;
    }

    .auth-links a {
        color: #42ca1a;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s ease;
    }

    .auth-links a:hover {
        color: #38b017;
        text-decoration: underline;
    }

    .message {
        padding: 16px;
        margin-bottom: 24px;
        border-radius: 12px;
        text-align: center;
        font-weight: 500;
    }

    .success {
        background: rgba(66, 202, 26, 0.1);
        color: #42ca1a;
        border: 1px solid rgba(66, 202, 26, 0.3);
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
    <h1>Forgot Password</h1>
    <p class="sub-text">Enter your email address to reset your password</p>
    <form action="/forgot-password" method="POST">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="example@email.com" required>
        </div>
        <button type="submit" class="btn-submit">Send Code</button>
    </form>
    <div class="auth-links">
        <a href="/login">Back to login</a>
    </div>
</div>