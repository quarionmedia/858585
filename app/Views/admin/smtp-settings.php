<?php require_once __DIR__ . '/partials/header.php'; ?>

<style>
    /* Enhanced Modern SMTP Settings Page with Rich Black-Gray Colors - Matching List Movies Design */
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

    .main-content {
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

    .main-content::before {
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

    /* Enhanced Header Section - Matching List Movies */
    .smtp-header {
        margin-bottom: 40px;
        padding: 32px;
        background: var(--secondary-bg);
        background-image: var(--gradient-4);
        background-blend-mode: overlay;
        border: 1px solid var(--border-color);
        border-radius: 20px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    }

    .smtp-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-4);
        border-radius: 20px 20px 0 0;
    }

    .smtp-header::after {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(255, 215, 0, 0.08), transparent);
        border-radius: 50%;
        pointer-events: none;
    }

    .smtp-header-content {
        position: relative;
        z-index: 1;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
    }

    .smtp-title-section h1 {
        font-size: 32px;
        font-weight: 800;
        color: var(--text-primary);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 16px;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    }

    .smtp-title-icon {
        width: 48px;
        height: 48px;
        background: var(--gradient-4);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        color: var(--primary-bg);
        box-shadow: 0 4px 16px rgba(255, 215, 0, 0.3);
    }

    .smtp-header p {
        color: var(--text-secondary);
        font-size: 16px;
        margin: 16px 0 0 0;
        position: relative;
        z-index: 1;
    }

    .smtp-divider {
        border: none;
        height: 2px;
        background: var(--gradient-4);
        margin: 32px 0;
        border-radius: 2px;
        box-shadow: 0 2px 8px rgba(255, 215, 0, 0.2);
    }

    /* Enhanced Flash Message */
    .flash-message {
        background: rgba(0, 255, 136, 0.1);
        border: 1px solid rgba(0, 255, 136, 0.3);
        border-left: 4px solid var(--accent-green);
        color: var(--text-primary);
        padding: 16px 20px;
        margin-bottom: 24px;
        border-radius: 12px;
        font-size: 14px;
        position: relative;
        z-index: 1;
        animation: slideInUp 0.6s ease-out;
    }

    /* Enhanced Test Email Button - Matching Add New Link Style */
    .test-email-btn {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        background: var(--accent-green);
        color: var(--primary-bg);
        padding: 16px 24px;
        text-decoration: none;
        border-radius: 12px;
        font-size: 16px;
        font-weight: 700;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 4px 16px rgba(0, 255, 136, 0.3);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 32px;
        position: relative;
        z-index: 1;
    }

    .test-email-btn:hover {
        background: var(--accent-white);
        box-shadow: 0 12px 32px rgba(0, 255, 136, 0.4);
    }

    .test-email-btn::before {
        content: '📧';
        margin-right: 4px;
    }

    /* Enhanced Form Container - Matching List Movies Item Style */
    .smtp-form-container {
        display: flex;
        flex-direction: column;
        background: var(--secondary-bg);
        background-image: var(--gradient-2);
        padding: 32px;
        border-radius: 16px;
        border: 1px solid var(--border-color);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
        max-width: 800px;
        margin: 0 auto 32px auto;
        animation: slideInUp 0.6s ease-out;
    }

    .smtp-form-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        background: var(--gradient-4);
        opacity: 0;
        transition: all 0.4s ease;
    }

    .smtp-form-container:hover {
        background: var(--tertiary-bg);
        box-shadow: 0 12px 32px rgba(0, 0, 0, 0.3);
        border-color: var(--border-hover);
    }

    .smtp-form-container:hover::before {
        opacity: 1;
    }

    /* Enhanced Form Group Styles - Matching List Movies */
    .form-group {
        margin-bottom: 28px;
        position: relative;
        z-index: 1;
    }

    .form-group label {
        display: block;
        margin-bottom: 12px;
        font-weight: 700;
        color: var(--text-primary);
        font-size: 15px;
        line-height: 1.3;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        box-sizing: border-box;
        padding: 16px 18px;
        background: var(--tertiary-bg);
        border: 1px solid var(--border-color);
        color: var(--text-primary);
        border-radius: 12px;
        font-size: 15px;
        font-family: 'Inter', sans-serif;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        line-height: 1.5;
    }

    .form-group select {
        cursor: pointer;
        appearance: none;
        background-image: url('data:image/svg+xml;charset=US-ASCII,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 4 5"><path fill="%23ffffff" d="M2 0L0 2h4zm0 5L0 3h4z"/></svg>');
        background-repeat: no-repeat;
        background-position: right 16px center;
        background-size: 12px;
        border-left: 4px solid var(--accent-gold);
    }

    .form-group input:focus,
    .form-group select:focus {
        outline: none;
        border-color: var(--accent-gold);
        box-shadow: 0 0 0 4px rgba(255, 215, 0, 0.1);
        background: var(--quaternary-bg);
    }

    .form-group input:hover,
    .form-group select:hover {
        border-color: var(--border-hover);
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.2);
    }

    .form-group select option {
        background: var(--tertiary-bg);
        color: var(--text-primary);
        padding: 12px;
    }

    /* Enhanced Form Field Icons */
    .form-group label[for="site_email"]::before {
        content: '📧 ';
        margin-right: 4px;
    }

    .form-group label[for="smtp_host"]::before {
        content: '🌐 ';
        margin-right: 4px;
    }

    .form-group label[for="smtp_port"]::before {
        content: '🔌 ';
        margin-right: 4px;
    }

    .form-group label[for="smtp_secure"]::before {
        content: '🔐 ';
        margin-right: 4px;
    }

    .form-group label[for="smtp_user"]::before {
        content: '👤 ';
        margin-right: 4px;
    }

    .form-group label[for="smtp_pass"]::before {
        content: '🔑 ';
        margin-right: 4px;
    }

    /* Enhanced Password Field */
    .form-group small {
        display: block;
        margin-top: 8px;
        color: var(--text-muted);
        font-size: 13px;
        font-style: italic;
    }

    .form-group input[type="password"] {
        border-left: 4px solid var(--accent-red);
    }

    /* Enhanced Save Button - Matching List Movies Add New Link */
    .save-button {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        background: var(--accent-green);
        color: var(--primary-bg);
        padding: 16px 24px;
        text-decoration: none;
        border: none;
        border-radius: 12px;
        font-size: 16px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 4px 16px rgba(0, 255, 136, 0.3);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-family: 'Inter', sans-serif;
        margin-top: 24px;
        position: relative;
        z-index: 1;
    }

    .save-button:hover {
        background: var(--accent-white);
        box-shadow: 0 12px 32px rgba(0, 255, 136, 0.4);
    }

    .save-button:active {
        transform: scale(0.98);
    }

    /* Form Grid Layout for Better Organization */
    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-bottom: 20px;
    }

    .form-grid .form-group {
        margin-bottom: 0;
    }

    .form-group.full-width {
        grid-column: 1 / -1;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .main-content {
            padding: 20px;
        }
        
        .smtp-header {
            padding: 20px;
        }
        
        .smtp-header-content {
            flex-direction: column;
            align-items: stretch;
        }
        
        .smtp-title-section h1 {
            font-size: 24px;
            justify-content: center;
        }
        
        .smtp-form-container {
            padding: 20px;
            max-width: 100%;
        }
        
        .form-grid {
            grid-template-columns: 1fr;
            gap: 16px;
        }
        
        .form-group input,
        .form-group select {
            font-size: 16px; /* Prevent zoom on iOS */
        }
        
        .save-button,
        .test-email-btn {
            width: 100%;
            justify-content: center;
        }
    }

    @media (max-width: 480px) {
        .smtp-form-container {
            padding: 16px;
            border-radius: 12px;
        }
        
        .form-group input,
        .form-group select {
            padding: 12px 16px;
        }
        
        .save-button,
        .test-email-btn {
            padding: 14px 20px;
            font-size: 14px;
        }
        
        .smtp-title-section h1 {
            font-size: 20px;
        }
    }

    /* Loading and Animation Effects - Matching List Movies */
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

    /* Enhanced placeholder styling */
    .form-group input::placeholder {
        color: var(--text-muted);
        font-style: italic;
    }

    /* Connection status indicator */
    .connection-status {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-top: 16px;
        padding: 12px 16px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        background: rgba(255, 215, 0, 0.1);
        border: 1px solid rgba(255, 215, 0, 0.2);
        color: var(--accent-gold);
    }
</style>

<main class="main-content">
    <!-- Enhanced Header Section -->
    <div class="smtp-header">
        <div class="smtp-header-content">
            <div class="smtp-title-section">
                <h1>
                    <div class="smtp-title-icon">
                        <i class="fas fa-envelope-open-text"></i>
                    </div>
                    SMTP Settings
                </h1>
                <p>Configure your site's email sending settings.</p>
            </div>
        </div>
    </div>

    <?php if ($flashMessage): ?>
        <div class="flash-message"><?php echo htmlspecialchars($flashMessage); ?></div>
    <?php endif; ?>

    <a href="/admin/smtp-settings/test-mail" onclick="return confirm('This will send a test email to your logged-in admin email address. Continue?');" class="test-email-btn">
        <i class="fas fa-paper-plane"></i>
        Send Test Email
    </a>
    
    <hr class="smtp-divider">

    <form action="/admin/smtp-settings" method="POST" class="settings-form" id="smtpSettingsForm">
        <div class="smtp-form-container">
            <div class="form-group full-width">
                <label for="site_email">Site "From" Email</label>
                <input type="email" id="site_email" name="site_email" placeholder="e.g., noreply@yourdomain.com" value="<?php echo htmlspecialchars($settings['site_email'] ?? ''); ?>">
            </div>
            
            <div class="form-grid">
                <div class="form-group">
                    <label for="smtp_host">SMTP Host</label>
                    <input type="text" id="smtp_host" name="smtp_host" placeholder="e.g., smtp.gmail.com" value="<?php echo htmlspecialchars($settings['smtp_host'] ?? ''); ?>">
                </div>
                
                <div class="form-group">
                    <label for="smtp_port">SMTP Port</label>
                    <input type="number" id="smtp_port" name="smtp_port" placeholder="e.g., 587" value="<?php echo htmlspecialchars($settings['smtp_port'] ?? ''); ?>">
                </div>
            </div>
            
            <div class="form-group">
                <label for="smtp_secure">SMTP Security</label>
                <select name="smtp_secure" id="smtp_secure">
                    <option value="tls" <?php echo ($settings['smtp_secure'] ?? '') == 'tls' ? 'selected' : ''; ?>>TLS (Recommended)</option>
                    <option value="ssl" <?php echo ($settings['smtp_secure'] ?? '') == 'ssl' ? 'selected' : ''; ?>>SSL</option>
                    <option value="" <?php echo ($settings['smtp_secure'] ?? '') == '' ? 'selected' : ''; ?>>None (Not Recommended)</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="smtp_user">SMTP Username</label>
                <input type="text" id="smtp_user" name="smtp_user" placeholder="Your SMTP username" value="<?php echo htmlspecialchars($settings['smtp_user'] ?? ''); ?>">
            </div>
            
            <div class="form-group">
                <label for="smtp_pass">SMTP Password</label>
                <input type="password" id="smtp_pass" name="smtp_pass" placeholder="Enter new password to update">
                <small>Leave blank to keep the current password.</small>
            </div>
            
            <div class="connection-status">
                <i class="fas fa-info-circle"></i>
                <span>Make sure to test your email settings after saving changes.</span>
            </div>
            
            <button type="submit" class="save-button" id="saveButton">
                <i class="fas fa-save"></i>
                Save SMTP Settings
            </button>
        </div>
    </form>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('smtpSettingsForm');
    const saveButton = document.getElementById('saveButton');

    // Enhanced form input interactions
    document.querySelectorAll('input, select').forEach(input => {
        input.addEventListener('focus', function() {
            this.style.boxShadow = '0 8px 24px rgba(255, 215, 0, 0.15)';
        });

        input.addEventListener('blur', function() {
            this.style.boxShadow = '';
        });

        // Typing animation
        input.addEventListener('input', function() {
            this.style.background = 'linear-gradient(135deg, var(--quaternary-bg), var(--tertiary-bg))';
            
            clearTimeout(this.typingTimer);
            this.typingTimer = setTimeout(() => {
                this.style.background = 'var(--tertiary-bg)';
            }, 500);
        });
    });

    // Enhanced form validation
    form.addEventListener('submit', function(e) {
        const siteEmail = document.getElementById('site_email').value.trim();
        const smtpHost = document.getElementById('smtp_host').value.trim();
        const smtpPort = document.getElementById('smtp_port').value.trim();
        const smtpUser = document.getElementById('smtp_user').value.trim();
        
        // Email validation
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(siteEmail)) {
            e.preventDefault();
            alert('Please enter a valid email address for the "From" email field.');
            document.getElementById('site_email').focus();
            return false;
        }
        
        // Port validation
        const port = parseInt(smtpPort);
        if (isNaN(port) || port < 1 || port > 65535) {
            e.preventDefault();
            alert('Please enter a valid port number (1-65535).');
            document.getElementById('smtp_port').focus();
            return false;
        }
        
        // Add loading state
        saveButton.classList.add('loading');
        saveButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Saving SMTP Settings...';
        saveButton.disabled = true;
        
        // Visual feedback
        document.querySelector('.smtp-form-container').style.opacity = '0.7';
        document.querySelector('.smtp-form-container').style.pointerEvents = 'none';
    });

    // Enhanced form container interactions
    document.querySelector('.smtp-form-container').addEventListener('mouseenter', function() {
        // Create ripple effect
        const ripple = document.createElement('div');
        ripple.style.cssText = `
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: radial-gradient(circle, rgba(255, 215, 0, 0.1), transparent);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            pointer-events: none;
            animation: ripple 0.6s ease-out;
            z-index: 0;
        `;
        
        this.style.position = 'relative';
        this.appendChild(ripple);
        
        setTimeout(() => {
            if (ripple.parentNode) {
                ripple.remove();
            }
        }, 600);
    });

    // Enhanced port suggestions
    const smtpPortInput = document.getElementById('smtp_port');
    const smtpSecureSelect = document.getElementById('smtp_secure');
    
    smtpSecureSelect.addEventListener('change', function() {
        if (this.value === 'tls' && !smtpPortInput.value) {
            smtpPortInput.value = '587';
            smtpPortInput.style.borderLeftColor = 'var(--accent-green)';
        } else if (this.value === 'ssl' && !smtpPortInput.value) {
            smtpPortInput.value = '465';
            smtpPortInput.style.borderLeftColor = 'var(--accent-green)';
        } else if (this.value === '' && !smtpPortInput.value) {
            smtpPortInput.value = '25';
            smtpPortInput.style.borderLeftColor = 'var(--accent-red)';
        }
        
        setTimeout(() => {
            smtpPortInput.style.borderLeftColor = 'var(--accent-gold)';
        }, 2000);
    });

    // Floating particles effect
    function createFloatingParticles() {
        const container = document.querySelector('.main-content');
        const particlesCount = 6;
        
        for (let i = 0; i < particlesCount; i++) {
            const particle = document.createElement('div');
            particle.style.cssText = `
                position: absolute;
                width: 3px;
                height: 3px;
                background: radial-gradient(circle, rgba(255, 215, 0, 0.4), transparent);
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

    // Add ripple animation keyframes
    if (!document.querySelector('#rippleAnimation')) {
        const style = document.createElement('style');
        style.id = 'rippleAnimation';
        style.textContent = `
            @keyframes ripple {
                0% {
                    width: 0;
                    height: 0;
                    opacity: 1;
                }
                100% {
                    width: 200px;
                    height: 200px;
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    }

    // Form elements sequential animation
    const formElements = document.querySelectorAll('.form-group, .save-button');
    formElements.forEach((element, index) => {
        setTimeout(() => {
            element.style.opacity = '0';
            element.style.transform = 'translateY(20px)';
            element.style.transition = 'all 0.4s ease-out';
            
            setTimeout(() => {
                element.style.opacity = '1';
                element.style.transform = 'translateY(0)';
            }, 50);
        }, index * 100);
    });

    // Password visibility toggle (optional enhancement)
    const passwordInput = document.getElementById('smtp_pass');
    const passwordWrapper = passwordInput.parentNode;
    
    const toggleButton = document.createElement('button');
    toggleButton.type = 'button';
    toggleButton.innerHTML = '<i class="fas fa-eye"></i>';
    toggleButton.style.cssText = `
        position: absolute;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: var(--text-muted);
        cursor: pointer;
        z-index: 2;
    `;
    
    passwordWrapper.style.position = 'relative';
    passwordWrapper.appendChild(toggleButton);
    
    toggleButton.addEventListener('click', function() {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            this.innerHTML = '<i class="fas fa-eye-slash"></i>';
        } else {
            passwordInput.type = 'password';
            this.innerHTML = '<i class="fas fa-eye"></i>';
        }
    });
});
</script>

<?php require_once __DIR__ . '/partials/footer.php'; ?>