<?php require_once __DIR__ . '/partials/header.php'; ?>

<style>
    /* Enhanced Modern API Settings Page with Rich Black-Gray Colors */
    :root {
        --primary-bg: #0a0a0a;
        --secondary-bg: #1a1a1a;
        --tertiary-bg: #2a2a2a;
        --quaternary-bg: #3a3a3a;
        --accent-white: #ffffff;
        --accent-silver: #c0c0c0;
        --accent-gold: #ffd700;
        --accent-red: #ff4444;
        --accent-green: #00ff88;
        --accent-blue: #3b82f6;
        --accent-purple: #8b5cf6;
        --text-primary: #ffffff;
        --text-secondary: #e0e0e0;
        --text-muted: #a0a0a0;
        --border-color: #404040;
        --border-hover: #606060;
        --success: #00ff88;
        --warning: #ffd700;
        --error: #ff4444;
        --gradient-1: linear-gradient(135deg, #404040, #606060);
        --gradient-2: linear-gradient(135deg, #2a2a2a, #404040);
        --gradient-3: linear-gradient(135deg, #ff4444, #ff6666);
        --gradient-4: linear-gradient(135deg, #ffd700, #ffed4e);
        --gradient-5: linear-gradient(135deg, #8b5cf6, #a78bfa);
        --gradient-6: linear-gradient(135deg, #3b82f6, #60a5fa);
    }

    main {
        background: var(--primary-bg);
        background-image: 
            radial-gradient(circle at 20% 30%, rgba(255, 255, 255, 0.02) 0%, transparent 60%),
            radial-gradient(circle at 80% 70%, rgba(192, 192, 192, 0.01) 0%, transparent 60%),
            radial-gradient(circle at 50% 50%, rgba(64, 64, 64, 0.03) 0%, transparent 70%);
        min-height: calc(100vh - 60px);
        padding: 32px;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        color: var(--text-primary);
        position: relative;
    }

    main::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" patternUnits="userSpaceOnUse" width="100" height="100"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.01)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.01)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>') repeat;
        pointer-events: none;
        opacity: 0.3;
    }

    /* Enhanced Header Section */
    main h1 {
        font-size: 32px;
        font-weight: 800;
        color: var(--text-primary);
        margin: 0 0 16px 0;
        display: flex;
        align-items: center;
        gap: 16px;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
        position: relative;
        z-index: 1;
    }

    main h1::before {
        content: '🔧';
        width: 48px;
        height: 48px;
        background: var(--gradient-6);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        box-shadow: 0 4px 16px rgba(59, 130, 246, 0.3);
    }

    main > p {
        color: var(--text-secondary);
        font-size: 16px;
        margin: 0 0 32px 0;
        position: relative;
        z-index: 1;
    }

    main hr {
        border: none;
        height: 2px;
        background: var(--gradient-6);
        margin: 32px 0 40px 0;
        border-radius: 2px;
        box-shadow: 0 2px 8px rgba(59, 130, 246, 0.2);
        position: relative;
        z-index: 1;
    }

    /* Enhanced Form Container */
    form {
        background: var(--secondary-bg);
        background-image: var(--gradient-6);
        background-blend-mode: overlay;
        border: 1px solid var(--border-color);
        border-radius: 20px;
        padding: 40px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        z-index: 1;
        max-width: 800px;
    }

    form::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-6);
        border-radius: 20px 20px 0 0;
    }

    form::after {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(59, 130, 246, 0.08), transparent);
        border-radius: 50%;
        pointer-events: none;
    }

    /* Enhanced Form Group Styles */
    .form-group {
        margin-bottom: 32px;
        position: relative;
        z-index: 1;
    }

    .form-group label {
        display: block;
        margin-bottom: 12px;
        font-weight: 700;
        color: var(--text-primary);
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        position: relative;
    }

    .form-group label::before {
        content: '🔑';
        margin-right: 8px;
        font-size: 16px;
    }

    .form-group input {
        width: 100%;
        max-width: 600px;
        padding: 16px 20px;
        background: var(--tertiary-bg);
        border: 2px solid var(--border-color);
        color: var(--text-primary);
        border-radius: 12px;
        font-size: 14px;
        font-family: 'Monaco', 'Menlo', monospace;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-sizing: border-box;
        position: relative;
    }

    .form-group input:focus {
        outline: none;
        border-color: var(--accent-blue);
        box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1), 0 4px 20px rgba(59, 130, 246, 0.2);
        background: var(--quaternary-bg);
        transform: translateY(-2px);
    }

    .form-group input:hover {
        border-color: var(--border-hover);
        transform: translateY(-1px);
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.2);
    }

    /* API Key Input Specific Styling */
    #tmdb_api_key {
        background-image: linear-gradient(135deg, var(--tertiary-bg), var(--quaternary-bg));
        position: relative;
    }

    #tmdb_api_key::placeholder {
        color: var(--text-muted);
        font-style: italic;
    }

    /* Enhanced Save Button */
    .save-button {
        padding: 16px 32px;
        background: var(--accent-green);
        color: var(--primary-bg);
        border: none;
        border-radius: 12px;
        cursor: pointer;
        margin-top: 24px;
        font-family: 'Inter', sans-serif;
        font-size: 16px;
        font-weight: 700;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 4px 16px rgba(0, 255, 136, 0.3);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        position: relative;
        overflow: hidden;
        z-index: 1;
    }

    .save-button::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }

    .save-button:hover::before {
        left: 100%;
    }

    .save-button:hover {
        background: var(--accent-white);
        transform: translateY(-4px) scale(1.02);
        box-shadow: 0 12px 32px rgba(0, 255, 136, 0.4);
    }

    .save-button:active {
        transform: translateY(-2px) scale(0.98);
    }

    .save-button::after {
        content: '💾';
        margin-left: 8px;
        font-size: 16px;
    }

    /* API Status Indicator */
    .api-status {
        margin-top: 16px;
        padding: 12px 16px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
    }

    .api-status.connected {
        background: rgba(0, 255, 136, 0.1);
        border: 1px solid var(--accent-green);
        color: var(--accent-green);
    }

    .api-status.disconnected {
        background: rgba(255, 68, 68, 0.1);
        border: 1px solid var(--accent-red);
        color: var(--accent-red);
    }

    .api-status.unknown {
        background: rgba(255, 215, 0, 0.1);
        border: 1px solid var(--accent-gold);
        color: var(--accent-gold);
    }

    /* Helper Text */
    .helper-text {
        margin-top: 8px;
        color: var(--text-muted);
        font-size: 12px;
        line-height: 1.4;
        position: relative;
        z-index: 1;
    }

    .helper-text a {
        color: var(--accent-blue);
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .helper-text a:hover {
        color: var(--accent-white);
        text-shadow: 0 0 8px rgba(59, 130, 246, 0.5);
    }

    /* Security Notice */
    .security-notice {
        background: rgba(255, 68, 68, 0.05);
        border: 1px solid var(--accent-red);
        border-radius: 12px;
        padding: 16px 20px;
        margin-top: 24px;
        position: relative;
        z-index: 1;
    }

    .security-notice::before {
        content: '🛡️';
        margin-right: 8px;
        font-size: 16px;
    }

    .security-notice h4 {
        color: var(--accent-red);
        margin: 0 0 8px 0;
        font-size: 14px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .security-notice p {
        color: var(--text-secondary);
        margin: 0;
        font-size: 13px;
        line-height: 1.4;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        main {
            padding: 20px;
        }
        
        form {
            padding: 24px;
        }
        
        main h1 {
            font-size: 24px;
            flex-direction: column;
            text-align: center;
        }
        
        .form-group input {
            max-width: 100%;
            font-size: 16px; /* Prevent zoom on iOS */
        }
        
        .save-button {
            width: 100%;
            padding: 14px 24px;
        }
    }

    @media (max-width: 480px) {
        form {
            padding: 20px;
            border-radius: 16px;
        }
        
        .form-group input {
            padding: 12px 16px;
        }
        
        .save-button {
            padding: 12px 20px;
            font-size: 14px;
        }
    }

    /* Loading and Animation Effects */
    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    form {
        animation: slideInUp 0.6s ease-out;
    }

    /* Floating particles for premium feel */
    @keyframes float {
        0%, 100% {
            transform: translateY(0px) rotate(0deg);
            opacity: 0.4;
        }
        50% {
            transform: translateY(-15px) rotate(180deg);
            opacity: 0.8;
        }
    }

    /* Form submission loading state */
    .save-button.loading {
        background: var(--text-muted);
        pointer-events: none;
        transform: none;
    }

    .save-button.loading::after {
        content: '⏳';
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
</style>

<main>
    <h1>API Settings</h1>
    <p>Manage API keys for external services like TMDb.</p>
    <hr>

    <form action="/admin/settings/api" method="POST" id="apiForm">
        <div class="form-group">
            <label for="tmdb_api_key">TMDb API Key</label>
            <input type="text" id="tmdb_api_key" name="tmdb_api_key" 
                   value="<?php echo htmlspecialchars($settings['tmdb_api_key'] ?? ''); ?>"
                   placeholder="Enter your TMDb API key here...">
            
            <div class="helper-text">
                Get your free API key from <a href="https://www.themoviedb.org/settings/api" target="_blank">TMDb API Settings</a>. 
                This key is required to fetch movie data, posters, and metadata.
            </div>
            
            <div class="api-status <?php echo !empty($settings['tmdb_api_key']) ? 'connected' : 'unknown'; ?>" id="apiStatus">
                <span class="status-icon"><?php echo !empty($settings['tmdb_api_key']) ? '✅' : '❓'; ?></span>
                <span class="status-text">
                    <?php echo !empty($settings['tmdb_api_key']) ? 'API Key Configured' : 'API Key Not Set'; ?>
                </span>
            </div>
        </div>
        
        <div class="security-notice">
            <h4>Security Notice</h4>
            <p>Keep your API keys secure and never share them publicly. These keys provide access to your TMDb account and usage quotas.</p>
        </div>
        
        <button type="submit" class="save-button" id="saveButton">
            Save API Settings
        </button>
    </form>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('apiForm');
    const saveButton = document.getElementById('saveButton');
    const apiKeyInput = document.getElementById('tmdb_api_key');
    const apiStatus = document.getElementById('apiStatus');

    // Enhanced form input interactions
    apiKeyInput.addEventListener('focus', function() {
        this.style.transform = 'translateY(-2px) scale(1.01)';
        this.style.boxShadow = '0 8px 24px rgba(59, 130, 246, 0.2)';
    });

    apiKeyInput.addEventListener('blur', function() {
        this.style.transform = 'translateY(0) scale(1)';
        this.style.boxShadow = '';
    });

    // API Key validation and status update
    apiKeyInput.addEventListener('input', function() {
        const value = this.value.trim();
        const statusIcon = apiStatus.querySelector('.status-icon');
        const statusText = apiStatus.querySelector('.status-text');
        
        // Remove existing status classes
        apiStatus.classList.remove('connected', 'disconnected', 'unknown');
        
        if (value.length === 0) {
            apiStatus.classList.add('unknown');
            statusIcon.textContent = '❓';
            statusText.textContent = 'API Key Not Set';
        } else if (value.length < 32) {
            apiStatus.classList.add('disconnected');
            statusIcon.textContent = '❌';
            statusText.textContent = 'Invalid API Key Format';
        } else {
            apiStatus.classList.add('connected');
            statusIcon.textContent = '✅';
            statusText.textContent = 'API Key Format Valid';
        }
    });

    // Enhanced save button interactions
    saveButton.addEventListener('mouseenter', function() {
        if (!this.classList.contains('loading')) {
            this.style.transform = 'translateY(-4px) scale(1.02)';
        }
    });

    saveButton.addEventListener('mouseleave', function() {
        if (!this.classList.contains('loading')) {
            this.style.transform = 'translateY(0) scale(1)';
        }
    });

    saveButton.addEventListener('mousedown', function() {
        if (!this.classList.contains('loading')) {
            this.style.transform = 'translateY(-2px) scale(0.98)';
        }
    });

    saveButton.addEventListener('mouseup', function() {
        if (!this.classList.contains('loading')) {
            this.style.transform = 'translateY(-4px) scale(1.02)';
        }
    });

    // Enhanced form submission
    form.addEventListener('submit', function(e) {
        const apiKey = apiKeyInput.value.trim();
        
        // Basic validation
        if (apiKey && apiKey.length < 32) {
            e.preventDefault();
            alert('Please enter a valid TMDb API key. API keys are typically 32 characters long.');
            apiKeyInput.focus();
            return false;
        }
        
        // Add loading state
        saveButton.classList.add('loading');
        saveButton.innerHTML = 'Saving Settings...';
        saveButton.disabled = true;
        
        // Visual feedback
        form.style.opacity = '0.7';
        form.style.pointerEvents = 'none';
    });

    // Enhanced typing animation for API key
    let typingTimer;
    apiKeyInput.addEventListener('keyup', function() {
        clearTimeout(typingTimer);
        this.style.background = 'linear-gradient(135deg, var(--quaternary-bg), var(--tertiary-bg))';
        
        typingTimer = setTimeout(() => {
            this.style.background = 'var(--tertiary-bg)';
        }, 500);
    });

    // Copy API key functionality (if needed for testing)
    apiKeyInput.addEventListener('dblclick', function() {
        this.select();
        this.setSelectionRange(0, 99999); // For mobile devices
        
        // Visual feedback
        this.style.background = 'rgba(0, 255, 136, 0.1)';
        setTimeout(() => {
            this.style.background = 'var(--tertiary-bg)';
        }, 300);
    });

    // Floating particles effect
    function createFloatingParticles() {
        const container = document.querySelector('main');
        const particlesCount = 6;
        
        for (let i = 0; i < particlesCount; i++) {
            const particle = document.createElement('div');
            particle.style.cssText = `
                position: absolute;
                width: 3px;
                height: 3px;
                background: radial-gradient(circle, rgba(59, 130, 246, 0.5), transparent);
                border-radius: 50%;
                pointer-events: none;
                z-index: 0;
                animation: float ${6 + Math.random() * 3}s ease-in-out infinite;
                animation-delay: ${Math.random() * 3}s;
                left: ${Math.random() * 100}%;
                top: ${Math.random() * 100}%;
            `;
            container.appendChild(particle);
        }
    }

    createFloatingParticles();

    // Enhanced API status animation on load
    setTimeout(() => {
        apiStatus.style.opacity = '0';
        apiStatus.style.transform = 'translateY(10px)';
        apiStatus.style.transition = 'all 0.4s ease-out';
        
        setTimeout(() => {
            apiStatus.style.opacity = '1';
            apiStatus.style.transform = 'translateY(0)';
        }, 100);
    }, 300);

    // Security notice animation
    const securityNotice = document.querySelector('.security-notice');
    setTimeout(() => {
        securityNotice.style.opacity = '0';
        securityNotice.style.transform = 'translateX(-20px)';
        securityNotice.style.transition = 'all 0.4s ease-out';
        
        setTimeout(() => {
            securityNotice.style.opacity = '1';
            securityNotice.style.transform = 'translateX(0)';
        }, 100);
    }, 500);

    // Form elements sequential animation
    const formElements = document.querySelectorAll('.form-group, .security-notice, .save-button');
    formElements.forEach((element, index) => {
        setTimeout(() => {
            element.style.opacity = '0';
            element.style.transform = 'translateY(20px)';
            element.style.transition = 'all 0.4s ease-out';
            
            setTimeout(() => {
                element.style.opacity = '1';
                element.style.transform = 'translateY(0)';
            }, 50);
        }, index * 150);
    });

    // Auto-focus on input for better UX
    setTimeout(() => {
        if (!apiKeyInput.value) {
            apiKeyInput.focus();
        }
    }, 800);
});
</script>

<?php require_once __DIR__ . '/partials/footer.php'; ?>