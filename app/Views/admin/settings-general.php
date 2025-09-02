<?php require_once __DIR__ . '/partials/header.php'; ?>

<style>
    /* Enhanced Modern General Settings Page with Rich Black-Gray Colors - Matching List Movies Design */
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
    .settings-header {
        margin-bottom: 40px;
        padding: 32px;
        background: var(--secondary-bg);
        background-image: var(--gradient-5);
        background-blend-mode: overlay;
        border: 1px solid var(--border-color);
        border-radius: 20px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    }

    .settings-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-5);
        border-radius: 20px 20px 0 0;
    }

    .settings-header::after {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(139, 92, 246, 0.08), transparent);
        border-radius: 50%;
        pointer-events: none;
    }

    .settings-header-content {
        position: relative;
        z-index: 1;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
    }

    .settings-title-section h1 {
        font-size: 32px;
        font-weight: 800;
        color: var(--text-primary);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 16px;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    }

    .settings-title-icon {
        width: 48px;
        height: 48px;
        background: var(--gradient-5);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        color: white;
        box-shadow: 0 4px 16px rgba(139, 92, 246, 0.3);
    }

    .settings-header p {
        color: var(--text-secondary);
        font-size: 16px;
        margin: 16px 0 0 0;
        position: relative;
        z-index: 1;
    }

    .settings-divider {
        border: none;
        height: 2px;
        background: var(--gradient-5);
        margin: 32px 0;
        border-radius: 2px;
        box-shadow: 0 2px 8px rgba(139, 92, 246, 0.2);
    }

    /* Enhanced Form Container - Matching List Movies Item Style */
    .settings-container {
        display: flex;
        flex-wrap: wrap;
        gap: 32px;
        margin-bottom: 32px;
    }

    .settings-form-main,
    .settings-form-side {
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
    }

    .settings-form-main::before,
    .settings-form-side::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        background: var(--gradient-5);
        opacity: 0;
        transition: all 0.4s ease;
    }

    .settings-form-side::before {
        background: var(--gradient-6);
    }

    .settings-form-main:hover,
    .settings-form-side:hover {
        background: var(--tertiary-bg);
        box-shadow: 0 12px 32px rgba(0, 0, 0, 0.3);
        border-color: var(--border-hover);
    }

    .settings-form-main:hover::before,
    .settings-form-side:hover::before {
        opacity: 1;
    }

    .settings-form-main {
        flex: 2;
        min-width: 400px;
    }

    .settings-form-side {
        flex: 1;
        min-width: 300px;
        height: fit-content;
    }

    .settings-form-side h3 {
        font-size: 20px;
        font-weight: 700;
        color: var(--text-primary);
        margin: 0 0 24px 0;
        position: relative;
        z-index: 1;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .branding-icon {
        width: 32px;
        height: 32px;
        background: var(--gradient-6);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        color: white;
        box-shadow: 0 2px 8px rgba(59, 130, 246, 0.3);
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
    .form-group textarea {
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

    .form-group textarea {
        min-height: 120px;
        resize: vertical;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
        padding: 16px 18px;
        border-left: 4px solid var(--accent-blue);
    }

    .form-group input:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: var(--accent-purple);
        box-shadow: 0 0 0 4px rgba(139, 92, 246, 0.1);
        background: var(--quaternary-bg);
    }

    .form-group input:hover,
    .form-group textarea:hover {
        border-color: var(--border-hover);
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.2);
    }

    /* Enhanced Image Preview - Matching List Movies Poster Style */
    .form-group .image-preview {
        width: 200px;
        height: 100px;
        object-fit: cover;
        border-radius: 12px;
        flex-shrink: 0;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4);
        border: 2px solid var(--border-color);
        transition: all 0.3s ease;
        margin-bottom: 16px;
        display: block;
    }

    .form-group .favicon-preview {
        width: 80px;
        height: 80px;
    }

    .form-group:hover .image-preview {
        transform: scale(1.05) rotate(-1deg);
        box-shadow: 0 12px 32px rgba(0, 0, 0, 0.5);
    }

    /* Enhanced File Input - Matching List Movies Options Button Style */
    .form-group input[type="file"] {
        display: none;
    }

    .file-input-wrapper {
        position: relative;
        overflow: hidden;
        display: block;
        width: 100%;
    }

    .file-input-label {
        display: flex;
        align-items: center;
        gap: 12px;
        background: var(--tertiary-bg);
        background-image: var(--gradient-1);
        color: var(--text-primary);
        border: 1px solid var(--border-color);
        padding: 16px 20px;
        border-radius: 12px;
        cursor: pointer;
        font-weight: 600;
        font-size: 14px;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        justify-content: center;
    }

    .file-input-label::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }

    .file-input-label:hover::before {
        left: 100%;
    }

    .file-input-label:hover {
        background: var(--quaternary-bg);
        border-color: var(--border-hover);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
    }

    .file-input-label i {
        width: 16px;
        text-align: center;
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

    /* Form Labels Enhancement */
    .form-group label[for="site_name"]::before {
        content: '🌐 ';
        margin-right: 4px;
    }

    .form-group label[for="site_description"]::before {
        content: '📝 ';
        margin-right: 4px;
    }

    .form-group label[for="logo"]::before {
        content: '🖼️ ';
        margin-right: 4px;
    }

    .form-group label[for="favicon"]::before {
        content: '⭐ ';
        margin-right: 4px;
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .settings-container {
            flex-direction: column;
            gap: 20px;
        }
        
        .settings-form-main,
        .settings-form-side {
            min-width: auto;
        }
    }

    @media (max-width: 768px) {
        .main-content {
            padding: 20px;
        }
        
        .settings-header {
            padding: 20px;
        }
        
        .settings-header-content {
            flex-direction: column;
            align-items: stretch;
        }
        
        .settings-title-section h1 {
            font-size: 24px;
            justify-content: center;
        }
        
        .settings-form-main,
        .settings-form-side {
            padding: 20px;
        }
        
        .form-group input,
        .form-group textarea {
            font-size: 16px; /* Prevent zoom on iOS */
        }
        
        .save-button {
            width: 100%;
            justify-content: center;
        }
    }

    @media (max-width: 480px) {
        .settings-form-main,
        .settings-form-side {
            padding: 16px;
            border-radius: 12px;
        }
        
        .form-group input,
        .form-group textarea {
            padding: 12px 16px;
        }
        
        .save-button {
            padding: 14px 20px;
            font-size: 14px;
        }
        
        .settings-title-section h1 {
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

    .settings-form-main,
    .settings-form-side {
        animation: slideInUp 0.6s ease-out;
    }

    .settings-form-side {
        animation-delay: 0.2s;
    }

    .settings-form-main:nth-child(1) { animation-delay: 0.1s; }
    .settings-form-main:nth-child(2) { animation-delay: 0.2s; }

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
    .form-group input::placeholder,
    .form-group textarea::placeholder {
        color: var(--text-muted);
        font-style: italic;
    }

    /* Character counter */
    .char-counter {
        font-size: 12px;
        color: var(--text-muted);
        text-align: right;
        margin-top: 4px;
        transition: color 0.3s ease;
    }
</style>

<main class="main-content">
    <!-- Enhanced Header Section -->
    <div class="settings-header">
        <div class="settings-header-content">
            <div class="settings-title-section">
                <h1>
                    <div class="settings-title-icon">
                        <i class="fas fa-cog"></i>
                    </div>
                    General Settings
                </h1>
                <p>Manage your site's general settings like name, description, and branding.</p>
            </div>
        </div>
    </div>
    
    <hr class="settings-divider">

    <form action="/admin/settings/general" method="POST" enctype="multipart/form-data" id="generalSettingsForm">
        <div class="settings-container">
            <div class="settings-form-main">
                <div class="form-group">
                    <label for="site_name">Site Name</label>
                    <input type="text" id="site_name" name="site_name" 
                           value="<?php echo htmlspecialchars($settings['site_name'] ?? ''); ?>"
                           placeholder="Enter your site name">
                </div>
                <div class="form-group">
                    <label for="site_description">Site Description</label>
                    <textarea id="site_description" name="site_description" 
                              placeholder="Enter a brief description of your site"><?php echo htmlspecialchars($settings['site_description'] ?? ''); ?></textarea>
                </div>
            </div>

            <div class="settings-form-side">
                <h3>
                    <div class="branding-icon">
                        <i class="fas fa-palette"></i>
                    </div>
                    Branding
                </h3>
                <div class="form-group">
                    <label for="logo">Site Logo</label>
                    <?php if (!empty($settings['logo_path'])): ?>
                        <img class="image-preview" src="/assets/images/<?php echo htmlspecialchars($settings['logo_path']); ?>" alt="Current Logo" id="logoPreview">
                    <?php endif; ?>
                    <div class="file-input-wrapper">
                        <label for="logo" class="file-input-label">
                            <i class="fas fa-upload"></i>
                            Choose Logo File
                        </label>
                        <input type="file" id="logo" name="logo" accept="image/*">
                    </div>
                </div>
                <div class="form-group">
                    <label for="favicon">Site Favicon</label>
                    <?php if (!empty($settings['favicon_path'])): ?>
                        <img class="image-preview favicon-preview" src="/assets/images/<?php echo htmlspecialchars($settings['favicon_path']); ?>" alt="Current Favicon" id="faviconPreview">
                    <?php endif; ?>
                    <div class="file-input-wrapper">
                        <label for="favicon" class="file-input-label">
                            <i class="fas fa-upload"></i>
                            Choose Favicon File
                        </label>
                        <input type="file" id="favicon" name="favicon" accept="image/x-icon,image/png,image/gif,image/jpeg">
                    </div>
                </div>
            </div>
        </div>
        
        <hr class="settings-divider">
        <button type="submit" class="save-button" id="saveButton">
            <i class="fas fa-save"></i>
            Save General Settings
        </button>
    </form>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('generalSettingsForm');
    const saveButton = document.getElementById('saveButton');
    const logoInput = document.getElementById('logo');
    const faviconInput = document.getElementById('favicon');

    // Enhanced form input interactions
    document.querySelectorAll('input, textarea').forEach(input => {
        input.addEventListener('focus', function() {
            this.style.boxShadow = '0 8px 24px rgba(139, 92, 246, 0.15)';
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

    // File input preview functionality
    function handleFilePreview(input, previewId) {
        input.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    let preview = document.getElementById(previewId);
                    if (!preview) {
                        preview = document.createElement('img');
                        preview.id = previewId;
                        preview.className = previewId === 'faviconPreview' ? 'image-preview favicon-preview' : 'image-preview';
                        input.closest('.form-group').insertBefore(preview, input.closest('.file-input-wrapper'));
                    }
                    preview.src = e.target.result;
                    preview.alt = 'Preview';
                    
                    // Add upload animation
                    preview.style.opacity = '0';
                    preview.style.transform = 'scale(0.8)';
                    preview.style.transition = 'all 0.3s ease';
                    
                    setTimeout(() => {
                        preview.style.opacity = '1';
                        preview.style.transform = 'scale(1)';
                    }, 100);
                };
                reader.readAsDataURL(file);
                
                // Visual feedback for file input
                input.nextElementSibling.style.borderColor = 'var(--accent-green)';
                input.nextElementSibling.style.background = 'rgba(0, 255, 136, 0.05)';
                
                setTimeout(() => {
                    input.nextElementSibling.style.borderColor = 'var(--border-color)';
                    input.nextElementSibling.style.background = '';
                }, 2000);
            }
        });
    }

    // Initialize file preview handlers
    handleFilePreview(logoInput, 'logoPreview');
    handleFilePreview(faviconInput, 'faviconPreview');

    // Enhanced form submission
    form.addEventListener('submit', function(e) {
        const siteName = document.getElementById('site_name').value.trim();
        
        // Basic validation
        if (!siteName) {
            e.preventDefault();
            alert('Please enter a site name before saving.');
            document.getElementById('site_name').focus();
            return false;
        }
        
        // Add loading state
        saveButton.classList.add('loading');
        saveButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Saving Settings...';
        saveButton.disabled = true;
        
        // Visual feedback
        document.querySelectorAll('.settings-form-main, .settings-form-side').forEach(section => {
            section.style.opacity = '0.7';
            section.style.pointerEvents = 'none';
        });
    });

    // Enhanced file input interactions
    document.querySelectorAll('.file-input-label').forEach(label => {
        label.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.style.borderColor = 'var(--accent-green)';
            this.style.background = 'rgba(0, 255, 136, 0.1)';
        });
        
        label.addEventListener('dragleave', function(e) {
            this.style.borderColor = 'var(--border-color)';
            this.style.background = '';
        });
        
        label.addEventListener('drop', function(e) {
            e.preventDefault();
            const fileInput = this.nextElementSibling;
            const files = e.dataTransfer.files;
            if (files.length > 0) {
                fileInput.files = files;
                fileInput.dispatchEvent(new Event('change'));
            }
            this.style.borderColor = 'var(--border-color)';
            this.style.background = '';
        });
    });

    // Character counter for textarea
    const descriptionTextarea = document.getElementById('site_description');
    const maxLength = 500;
    
    function updateCharacterCount() {
        const currentLength = descriptionTextarea.value.length;
        let counter = descriptionTextarea.parentNode.querySelector('.char-counter');
        
        if (!counter) {
            counter = document.createElement('div');
            counter.className = 'char-counter';
            descriptionTextarea.parentNode.appendChild(counter);
        }
        
        counter.textContent = `${currentLength}/${maxLength} characters`;
        
        if (currentLength > maxLength * 0.9) {
            counter.style.color = 'var(--accent-red)';
        } else if (currentLength > maxLength * 0.7) {
            counter.style.color = 'var(--accent-gold)';
        } else {
            counter.style.color = 'var(--text-muted)';
        }
    }
    
    descriptionTextarea.addEventListener('input', updateCharacterCount);
    updateCharacterCount(); // Initial count

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
                background: radial-gradient(circle, rgba(139, 92, 246, 0.4), transparent);
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

    // Enhanced form container interactions
    document.querySelectorAll('.settings-form-main, .settings-form-side').forEach(container => {
        container.addEventListener('mouseenter', function() {
            // Create ripple effect
            const ripple = document.createElement('div');
            ripple.style.cssText = `
                position: absolute;
                top: 50%;
                left: 50%;
                width: 0;
                height: 0;
                background: radial-gradient(circle, rgba(139, 92, 246, 0.1), transparent);
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
    });

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

    // Auto-save draft functionality (optional)
    let autoSaveTimer;
    document.querySelectorAll('input, textarea').forEach(input => {
        input.addEventListener('input', function() {
            clearTimeout(autoSaveTimer);
            autoSaveTimer = setTimeout(() => {
                // Could implement auto-save to localStorage here
                console.log('Auto-saving draft...');
            }, 2000);
        });
    });

    // Form elements sequential animation
    const formElements = document.querySelectorAll('.form-group, .settings-form-side h3');
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
});
</script>

<?php require_once __DIR__ . '/partials/footer.php'; ?>