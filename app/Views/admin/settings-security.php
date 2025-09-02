<?php require_once __DIR__ . '/partials/header.php'; ?>

<style>
    /* Enhanced Modern Security Settings Page with Rich Black-Gray Colors - Matching List Movies Design */
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
    .security-header {
        margin-bottom: 40px;
        padding: 32px;
        background: var(--secondary-bg);
        background-image: var(--gradient-3);
        background-blend-mode: overlay;
        border: 1px solid var(--border-color);
        border-radius: 20px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    }

    .security-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-3);
        border-radius: 20px 20px 0 0;
    }

    .security-header::after {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(255, 68, 68, 0.08), transparent);
        border-radius: 50%;
        pointer-events: none;
    }

    .security-header-content {
        position: relative;
        z-index: 1;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
    }

    .security-title-section h1 {
        font-size: 32px;
        font-weight: 800;
        color: var(--text-primary);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 16px;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    }

    .security-title-icon {
        width: 48px;
        height: 48px;
        background: var(--gradient-3);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        color: white;
        box-shadow: 0 4px 16px rgba(255, 68, 68, 0.3);
    }

    .security-header p {
        color: var(--text-secondary);
        font-size: 16px;
        margin: 16px 0 0 0;
        position: relative;
        z-index: 1;
    }

    .security-divider {
        border: none;
        height: 2px;
        background: var(--gradient-3);
        margin: 32px 0;
        border-radius: 2px;
        box-shadow: 0 2px 8px rgba(255, 68, 68, 0.2);
    }

    /* Enhanced Form Container - Matching List Movies Item Style */
    .security-form-container {
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
        max-width: 600px;
        margin: 0 auto 32px auto;
        animation: slideInUp 0.6s ease-out;
    }

    .security-form-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        background: var(--gradient-3);
        opacity: 0;
        transition: all 0.4s ease;
    }

    .security-form-container:hover {
        background: var(--tertiary-bg);
        box-shadow: 0 12px 32px rgba(0, 0, 0, 0.3);
        border-color: var(--border-hover);
    }

    .security-form-container:hover::before {
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

    .form-group label[for="login_required"]::before {
        content: '🔒 ';
        margin-right: 4px;
    }

    .form-group select {
        width: 100%;
        box-sizing: border-box;
        padding: 16px 18px;
        background: var(--tertiary-bg);
        border: 1px solid var(--border-color);
        border-left: 4px solid var(--accent-red);
        color: var(--text-primary);
        border-radius: 12px;
        font-size: 15px;
        font-family: 'Inter', sans-serif;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        line-height: 1.5;
        cursor: pointer;
        appearance: none;
        background-image: url('data:image/svg+xml;charset=US-ASCII,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 4 5"><path fill="%23ffffff" d="M2 0L0 2h4zm0 5L0 3h4z"/></svg>');
        background-repeat: no-repeat;
        background-position: right 16px center;
        background-size: 12px;
    }

    .form-group select:focus {
        outline: none;
        border-color: var(--accent-red);
        border-left-color: var(--accent-red);
        box-shadow: 0 0 0 4px rgba(255, 68, 68, 0.1);
        background: var(--quaternary-bg);
    }

    .form-group select:hover {
        border-color: var(--border-hover);
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.2);
    }

    .form-group select option {
        background: var(--tertiary-bg);
        color: var(--text-primary);
        padding: 12px;
    }

    .form-group select option[value="1"] {
        color: var(--accent-red);
        font-weight: 600;
    }

    .form-group select option[value="0"] {
        color: var(--accent-green);
        font-weight: 600;
    }

    /* Security Status Indicator */
    .security-status {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-top: 8px;
        padding: 8px 12px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .security-status.private {
        background: rgba(255, 68, 68, 0.1);
        color: var(--accent-red);
        border: 1px solid rgba(255, 68, 68, 0.2);
    }

    .security-status.public {
        background: rgba(0, 255, 136, 0.1);
        color: var(--accent-green);
        border: 1px solid rgba(0, 255, 136, 0.2);
    }

    .security-status i {
        font-size: 12px;
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

    /* Responsive Design */
    @media (max-width: 768px) {
        .main-content {
            padding: 20px;
        }
        
        .security-header {
            padding: 20px;
        }
        
        .security-header-content {
            flex-direction: column;
            align-items: stretch;
        }
        
        .security-title-section h1 {
            font-size: 24px;
            justify-content: center;
        }
        
        .security-form-container {
            padding: 20px;
            max-width: 100%;
        }
        
        .form-group select {
            font-size: 16px; /* Prevent zoom on iOS */
        }
        
        .save-button {
            width: 100%;
            justify-content: center;
        }
    }

    @media (max-width: 480px) {
        .security-form-container {
            padding: 16px;
            border-radius: 12px;
        }
        
        .form-group select {
            padding: 12px 16px;
        }
        
        .save-button {
            padding: 14px 20px;
            font-size: 14px;
        }
        
        .security-title-section h1 {
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

    /* Enhanced Security Description */
    .security-description {
        margin-top: 16px;
        padding: 16px 20px;
        background: var(--tertiary-bg);
        border-radius: 12px;
        border-left: 4px solid var(--accent-blue);
        color: var(--text-secondary);
        font-size: 14px;
        line-height: 1.6;
    }

    .security-description.private {
        border-left-color: var(--accent-red);
        background: rgba(255, 68, 68, 0.05);
    }

    .security-description.public {
        border-left-color: var(--accent-green);
        background: rgba(0, 255, 136, 0.05);
    }
</style>

<main class="main-content">
    <!-- Enhanced Header Section -->
    <div class="security-header">
        <div class="security-header-content">
            <div class="security-title-section">
                <h1>
                    <div class="security-title-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    Security Settings
                </h1>
                <p>Manage security and access settings for your site.</p>
            </div>
        </div>
    </div>
    
    <hr class="security-divider">

    <form action="/admin/settings/security" method="POST" id="securitySettingsForm">
        <div class="security-form-container">
            <div class="form-group">
                <label for="login_required">Login Required to View Content?</label>
                <select name="login_required" id="login_required">
                    <option value="1" <?php echo ($settings['login_required'] ?? 0) == 1 ? 'selected' : ''; ?>>Yes (Site is private)</option>
                    <option value="0" <?php echo ($settings['login_required'] ?? 0) == 0 ? 'selected' : ''; ?>>No (Site is public)</option>
                </select>
                
                <!-- Security Status Indicator -->
                <div class="security-status" id="securityStatus">
                    <i class="fas fa-info-circle"></i>
                    <span id="statusText">Loading...</span>
                </div>
                
                <!-- Dynamic Description -->
                <div class="security-description" id="securityDescription">
                    <span id="descriptionText">Loading...</span>
                </div>
            </div>
            
            <button type="submit" class="save-button" id="saveButton">
                <i class="fas fa-save"></i>
                Save Security Settings
            </button>
        </div>
    </form>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('securitySettingsForm');
    const saveButton = document.getElementById('saveButton');
    const loginRequiredSelect = document.getElementById('login_required');
    const securityStatus = document.getElementById('securityStatus');
    const statusText = document.getElementById('statusText');
    const securityDescription = document.getElementById('securityDescription');
    const descriptionText = document.getElementById('descriptionText');

    // Update security status and description based on selection
    function updateSecurityInfo() {
        const isPrivate = loginRequiredSelect.value === '1';
        
        // Update status indicator
        securityStatus.className = 'security-status ' + (isPrivate ? 'private' : 'public');
        statusText.innerHTML = isPrivate 
            ? '<i class="fas fa-lock"></i> Site is Private' 
            : '<i class="fas fa-globe"></i> Site is Public';
        
        // Update description
        securityDescription.className = 'security-description ' + (isPrivate ? 'private' : 'public');
        descriptionText.textContent = isPrivate 
            ? 'Users must log in to view any content on your site. This provides maximum security and privacy.'
            : 'Anyone can view your site content without logging in. Only admin functions require authentication.';
    }

    // Initialize security info
    updateSecurityInfo();

    // Update on select change
    loginRequiredSelect.addEventListener('change', updateSecurityInfo);

    // Enhanced select interactions
    loginRequiredSelect.addEventListener('focus', function() {
        this.style.boxShadow = '0 8px 24px rgba(255, 68, 68, 0.15)';
    });

    loginRequiredSelect.addEventListener('blur', function() {
        this.style.boxShadow = '';
    });

    // Enhanced form submission
    form.addEventListener('submit', function(e) {
        // Add loading state
        saveButton.classList.add('loading');
        saveButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Saving Security Settings...';
        saveButton.disabled = true;
        
        // Visual feedback
        document.querySelector('.security-form-container').style.opacity = '0.7';
        document.querySelector('.security-form-container').style.pointerEvents = 'none';
        
        // Show confirmation message
        const isPrivate = loginRequiredSelect.value === '1';
        const confirmMessage = isPrivate 
            ? 'You are about to make your site private. Users will need to log in to view content. Continue?' 
            : 'You are about to make your site public. Anyone can view content without logging in. Continue?';
            
        if (!confirm(confirmMessage)) {
            e.preventDefault();
            
            // Reset loading state
            saveButton.classList.remove('loading');
            saveButton.innerHTML = '<i class="fas fa-save"></i> Save Security Settings';
            saveButton.disabled = false;
            document.querySelector('.security-form-container').style.opacity = '1';
            document.querySelector('.security-form-container').style.pointerEvents = 'auto';
            
            return false;
        }
    });

    // Enhanced form container interactions
    document.querySelector('.security-form-container').addEventListener('mouseenter', function() {
        // Create ripple effect
        const ripple = document.createElement('div');
        ripple.style.cssText = `
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: radial-gradient(circle, rgba(255, 68, 68, 0.1), transparent);
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
                background: radial-gradient(circle, rgba(255, 68, 68, 0.4), transparent);
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

    // Enhanced select styling for better UX
    loginRequiredSelect.addEventListener('change', function() {
        // Add visual feedback for selection change
        this.style.background = 'linear-gradient(135deg, var(--quaternary-bg), var(--tertiary-bg))';
        this.style.borderLeftColor = this.value === '1' ? 'var(--accent-red)' : 'var(--accent-green)';
        
        setTimeout(() => {
            this.style.background = 'var(--tertiary-bg)';
        }, 500);
    });
});
</script>

<?php require_once __DIR__ . '/partials/footer.php'; ?>