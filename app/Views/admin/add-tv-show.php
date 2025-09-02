<?php require_once __DIR__ . '/partials/header.php'; ?>

<style>
    /* Enhanced Modern Add TV Show Page with Rich Black-Gray Colors - Matching Add Movie Design */
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

    /* Enhanced Header Section - Matching Add Movie */
    .add-tv-header {
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

    .add-tv-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-5);
        border-radius: 20px 20px 0 0;
    }

    .add-tv-header::after {
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

    .add-tv-header-content {
        position: relative;
        z-index: 1;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
    }

    .add-tv-title-section h1 {
        font-size: 32px;
        font-weight: 800;
        color: var(--text-primary);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 16px;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    }

    .add-tv-title-icon {
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

    .add-tv-divider {
        border: none;
        height: 2px;
        background: var(--gradient-5);
        margin: 32px 0;
        border-radius: 2px;
        box-shadow: 0 2px 8px rgba(139, 92, 246, 0.2);
    }

    /* Enhanced TMDb Import Section - Matching Add Movie Item Style */
    .tmdb-import-section {
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
        margin-bottom: 32px;
        animation: slideInUp 0.6s ease-out;
    }

    .tmdb-import-section::before {
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

    .tmdb-import-section:hover {
        background: var(--tertiary-bg);
        box-shadow: 0 12px 32px rgba(0, 0, 0, 0.3);
        border-color: var(--border-hover);
    }

    .tmdb-import-section:hover::before {
        opacity: 1;
    }

    .tmdb-import-section h3 {
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

    .tmdb-import-icon {
        width: 32px;
        height: 32px;
        background: var(--gradient-4);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        color: var(--primary-bg);
        box-shadow: 0 2px 8px rgba(255, 215, 0, 0.3);
    }

    .tmdb-input-group {
        display: flex;
        gap: 16px;
        align-items: flex-end;
        margin-bottom: 16px;
        position: relative;
        z-index: 1;
    }

    .tmdb-input-wrapper {
        flex: 1;
    }

    .tmdb-input-wrapper label {
        display: block;
        font-size: 15px;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 12px;
    }

    .tmdb-input-wrapper label::before {
        content: '📺 ';
        margin-right: 4px;
    }

    #tmdb_id {
        width: 100%;
        padding: 16px 18px;
        background: var(--tertiary-bg);
        border: 1px solid var(--border-color);
        border-left: 4px solid var(--accent-gold);
        border-radius: 12px;
        color: var(--text-primary);
        font-size: 15px;
        font-family: inherit;
        box-sizing: border-box;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    #tmdb_id:focus {
        outline: none;
        border-color: var(--accent-gold);
        box-shadow: 0 0 0 4px rgba(255, 215, 0, 0.1);
        background: var(--quaternary-bg);
    }

    #tmdb_id:hover {
        border-color: var(--border-hover);
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.2);
    }

    #tmdb_id::placeholder {
        color: var(--text-muted);
        font-style: italic;
    }

    /* Enhanced Fetch Button - Matching Options Button Style */
    #fetch-tmdb-btn {
        display: flex;
        align-items: center;
        gap: 8px;
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
        white-space: nowrap;
    }

    #fetch-tmdb-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }

    #fetch-tmdb-btn:hover::before {
        left: 100%;
    }

    #fetch-tmdb-btn:hover {
        background: var(--quaternary-bg);
        border-color: var(--border-hover);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
    }

    #fetch-tmdb-btn:disabled {
        background: var(--text-muted);
        pointer-events: none;
        opacity: 0.7;
    }

    #tmdb-status {
        color: var(--accent-gold);
        font-size: 14px;
        margin: 0;
        min-height: 20px;
        position: relative;
        z-index: 1;
        font-weight: 500;
    }

    /* Enhanced Form Layout */
    .form-layout {
        display: grid;
        grid-template-columns: 1fr 350px;
        gap: 32px;
        animation: slideInUp 0.6s ease-out 0.2s both;
    }

    .form-main {
        background: var(--secondary-bg);
        background-image: var(--gradient-2);
        border: 1px solid var(--border-color);
        border-radius: 16px;
        padding: 32px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
        position: relative;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .form-main::before {
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

    .form-main:hover {
        background: var(--tertiary-bg);
        box-shadow: 0 12px 32px rgba(0, 0, 0, 0.3);
        border-color: var(--border-hover);
    }

    .form-main:hover::before {
        opacity: 1;
    }

    /* Enhanced Form Elements */
    .form-group {
        margin-bottom: 28px;
        position: relative;
        z-index: 1;
    }

    .form-group:last-child {
        margin-bottom: 0;
    }

    .form-group label {
        display: block;
        font-size: 15px;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 12px;
        line-height: 1.3;
    }

    .form-group label[for="title"]::before {
        content: '🎯 ';
        margin-right: 4px;
    }

    .form-group label[for="overview"]::before {
        content: '📝 ';
        margin-right: 4px;
    }

    .form-group label[for="first_air_date"]::before {
        content: '📅 ';
        margin-right: 4px;
    }

    input[type="text"],
    input[type="date"],
    input[type="number"],
    textarea {
        width: 100%;
        padding: 16px 18px;
        background: var(--tertiary-bg);
        border: 1px solid var(--border-color);
        border-radius: 12px;
        color: var(--text-primary);
        font-size: 15px;
        font-family: inherit;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-sizing: border-box;
        resize: vertical;
        line-height: 1.5;
    }

    textarea {
        min-height: 120px;
        border-left: 4px solid var(--accent-purple);
    }

    input[type="text"]:focus,
    input[type="date"]:focus,
    input[type="number"]:focus,
    textarea:focus {
        outline: none;
        border-color: var(--accent-purple);
        box-shadow: 0 0 0 4px rgba(139, 92, 246, 0.1);
        background: var(--quaternary-bg);
    }

    input[type="text"]:hover,
    input[type="date"]:hover,
    input[type="number"]:hover,
    textarea:hover {
        border-color: var(--border-hover);
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.2);
    }

    input::placeholder,
    textarea::placeholder {
        color: var(--text-muted);
        font-style: italic;
    }

    /* Enhanced Submit Button - Matching Add New Link */
    .submit-btn {
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
        font-family: inherit;
        margin-top: 24px;
        width: 100%;
        justify-content: center;
    }

    .submit-btn:hover {
        background: var(--accent-white);
        box-shadow: 0 12px 32px rgba(0, 255, 136, 0.4);
    }

    .submit-btn:active {
        transform: scale(0.98);
    }

    /* Enhanced Preview Sidebar */
    .image-previews {
        display: grid;
        gap: 24px;
        height: fit-content;
    }

    .preview-box {
        background: var(--secondary-bg);
        background-image: var(--gradient-2);
        border: 1px solid var(--border-color);
        border-radius: 16px;
        padding: 24px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
        text-align: center;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .preview-box::before {
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

    .preview-box:hover {
        background: var(--tertiary-bg);
        box-shadow: 0 12px 32px rgba(0, 0, 0, 0.3);
        border-color: var(--border-hover);
    }

    .preview-box:hover::before {
        opacity: 1;
    }

    .preview-box h4 {
        font-size: 16px;
        font-weight: 700;
        color: var(--text-primary);
        margin: 0 0 16px 0;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        position: relative;
        z-index: 1;
    }

    .preview-box img {
        max-width: 100%;
        height: auto;
        border-radius: 12px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4);
        border: 2px solid var(--border-color);
        transition: all 0.3s ease;
        position: relative;
        z-index: 1;
    }

    .preview-box:hover img {
        transform: scale(1.05);
        box-shadow: 0 12px 32px rgba(0, 0, 0, 0.5);
    }

    .logo-preview-bg {
        background: var(--secondary-bg);
        background-image: var(--gradient-4);
        background-blend-mode: overlay;
    }

    .logo-preview-bg::before {
        background: var(--gradient-4);
    }

    /* Enhanced Content Preview Sections */
    .content-preview {
        background: var(--tertiary-bg);
        border: 1px solid var(--border-color);
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 24px;
        border-left: 4px solid var(--accent-purple);
        position: relative;
        z-index: 1;
        animation: slideInUp 0.6s ease-out;
    }

    .content-preview strong {
        color: var(--text-primary);
        font-size: 15px;
        font-weight: 700;
        display: block;
        margin-bottom: 12px;
    }

    .content-preview a {
        color: var(--accent-gold);
        text-decoration: none;
        font-weight: 600;
        transition: all 0.2s ease;
    }

    .content-preview a:hover {
        color: var(--accent-white);
        text-decoration: underline;
    }

    /* Enhanced Cast List Styling */
    .cast-list {
        display: grid;
        gap: 12px;
        margin-top: 16px;
    }

    .cast-member {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px;
        background: var(--secondary-bg);
        border-radius: 12px;
        border: 1px solid var(--border-color);
        transition: all 0.3s ease;
    }

    .cast-member:hover {
        background: var(--quaternary-bg);
        border-color: var(--border-hover);
        transform: translateX(4px);
    }

    .cast-member img {
        width: 48px;
        height: 72px;
        object-fit: cover;
        border-radius: 8px;
        flex-shrink: 0;
        border: 2px solid var(--border-color);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    }

    .cast-member span {
        color: var(--text-secondary);
        font-size: 14px;
        line-height: 1.4;
        font-weight: 600;
    }

    .cast-member em {
        color: var(--text-muted);
        font-style: normal;
        display: block;
        font-size: 13px;
        font-weight: 400;
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .form-layout {
            grid-template-columns: 1fr;
            gap: 24px;
        }

        .image-previews {
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        }
    }

    @media (max-width: 768px) {
        .main-content {
            padding: 20px;
        }
        
        .add-tv-header {
            padding: 20px;
        }
        
        .add-tv-header-content {
            flex-direction: column;
            align-items: stretch;
        }
        
        .add-tv-title-section h1 {
            font-size: 24px;
            justify-content: center;
        }
        
        .tmdb-import-section,
        .form-main {
            padding: 20px;
        }

        .tmdb-input-group {
            flex-direction: column;
            align-items: stretch;
        }

        .image-previews {
            grid-template-columns: 1fr;
        }
        
        input, textarea, select {
            font-size: 16px; /* Prevent zoom on iOS */
        }
    }

    @media (max-width: 480px) {
        .tmdb-import-section,
        .form-main,
        .preview-box {
            padding: 16px;
            border-radius: 12px;
        }
        
        input, textarea {
            padding: 12px 16px;
        }
        
        .submit-btn,
        #fetch-tmdb-btn {
            padding: 14px 20px;
            font-size: 14px;
        }
        
        .add-tv-title-section h1 {
            font-size: 20px;
        }
    }

    /* Loading and Animation Effects - Matching Add Movie */
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

    /* Loading spinner */
    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
</style>

<main class="main-content">
    <!-- Enhanced Header Section -->
    <div class="add-tv-header">
        <div class="add-tv-header-content">
            <div class="add-tv-title-section">
                <h1>
                    <div class="add-tv-title-icon">
                        <i class="fas fa-plus"></i>
                    </div>
                    Add New TV Show
                </h1>
            </div>
        </div>
    </div>

    <!-- Enhanced TMDb Import Section -->
    <div class="tmdb-import-section">
        <h3>
            <div class="tmdb-import-icon">
                <i class="fas fa-download"></i>
            </div>
            Import from TMDb
        </h3>
        <div class="tmdb-input-group">
            <div class="tmdb-input-wrapper">
                <label for="tmdb_id">TMDb TV Show ID</label>
                <input type="text" id="tmdb_id" name="tmdb_id" placeholder="e.g., 1396 for Breaking Bad">
            </div>
            <button type="button" id="fetch-tmdb-btn">
                <i class="fas fa-search"></i>
                Fetch Info
            </button>
        </div>
        <p id="tmdb-status"></p>
    </div>

    <hr class="add-tv-divider">

    <div class="form-layout">
        <!-- Enhanced Main Form -->
        <div class="form-main">
            <form action="/admin/tv-shows/add" method="POST">
                <input type="hidden" id="tmdb_id_hidden" name="tmdb_id">
                <input type="hidden" id="logo_backdrop_path" name="logo_backdrop_path">
                <input type="hidden" id="poster_path" name="poster_path">
                <input type="hidden" id="backdrop_path" name="backdrop_path">
                <input type="hidden" id="logo_path" name="logo_path">
                <input type="hidden" id="trailer_key" name="trailer_key">
                <input type="hidden" id="status" name="status">
                <input type="hidden" id="genres" name="genres">
                <input type="hidden" id="cast" name="cast">
                
                <div class="form-group">
                    <label for="title">TV Show Title</label>
                    <input type="text" id="title" name="title" placeholder="Enter TV show title" required>
                </div>
                
                <div class="form-group">
                    <label for="overview">TV Show Overview</label>
                    <textarea id="overview" name="overview" rows="5" placeholder="Enter a detailed description of the TV show..."></textarea>
                </div>

                <div class="form-group">
                    <label for="first_air_date">First Air Date</label>
                    <input type="date" id="first_air_date" name="first_air_date">
                </div>
                
                <div id="trailer-preview"></div>
                <div id="genres-preview"></div>
                <div id="cast-preview"></div>
                
                <button type="submit" class="submit-btn">
                    <i class="fas fa-save"></i>
                    Save TV Show
                </button>
            </form>
        </div>

        <!-- Enhanced Image Previews Sidebar -->
        <div class="image-previews">
            <div id="poster-preview" class="preview-box"></div>
            <div id="logo-preview" class="preview-box logo-preview-bg"></div>
            <div id="backdrop-preview" class="preview-box"></div>
        </div>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const fetchBtn = document.getElementById('fetch-tmdb-btn');
    const form = document.querySelector('form');

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

    // Enhanced form container interactions
    document.querySelectorAll('.tmdb-import-section, .form-main, .preview-box').forEach(container => {
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

    // Enhanced TMDb fetch functionality - KEEPING ALL ORIGINAL FUNCTIONALITY
    fetchBtn.addEventListener('click', function() {
        const tmdbId = document.getElementById('tmdb_id').value;
        const statusP = document.getElementById('tmdb-status');
        
        if (!tmdbId) { 
            statusP.textContent = 'Please enter a TMDb ID.'; 
            statusP.style.color = 'var(--error)';
            return; 
        }
        
        statusP.textContent = 'Fetching data...';
        statusP.style.color = 'var(--accent-gold)';
        
        // Enhanced loading state
        this.disabled = true;
        this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Loading...';

        fetch('/admin/tv-shows/tmdb-import', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'tmdb_id=' + encodeURIComponent(tmdbId)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success === false || data.error) {
                statusP.textContent = 'Error: ' + (data.status_message || data.error || 'TV show not found.');
                statusP.style.color = 'var(--error)';
            } else {
                // Populate form fields - DÃœZELTILDI: 'name' field'Ä± iÃ§in hem name hem title kontrol et
                document.getElementById('title').value = data.name || data.title || '';
                document.getElementById('overview').value = data.overview || '';
                document.getElementById('first_air_date').value = data.first_air_date || '';
                
                // Hidden fields - DÃœZELTILDI: DoÄŸru field isimleri
                document.getElementById('tmdb_id_hidden').value = tmdbId;
                document.getElementById('status').value = data.status || '';
                
                // POSTER - DÃœZELTILDI: Poster path'i doÄŸru ÅŸekilde set et
                if (data.poster_path) {
                    document.getElementById('poster_path').value = data.poster_path;
                    const posterPreview = document.getElementById('poster-preview');
                    posterPreview.innerHTML = '<h4>Poster</h4><img src="https://image.tmdb.org/t/p/w200' + data.poster_path + '" alt="Poster">';
                }
                
                // BACKDROP - DÃœZELTILDI: Backdrop path'i doÄŸru ÅŸekilde set et  
                if (data.backdrop_path) {
                    document.getElementById('backdrop_path').value = data.backdrop_path;
                    const backdropPreview = document.getElementById('backdrop-preview');
                    backdropPreview.innerHTML = '<h4>Backdrop</h4><img src="https://image.tmdb.org/t/p/w200' + data.backdrop_path + '" alt="Backdrop">';
                }

                // LOGO - DÃœZELTILDI: Logo'yu TMDb'den doÄŸru ÅŸekilde al
                const logoPreview = document.getElementById('logo-preview');
                if (data.logo_path) {
                    // TMDbService zaten en iyi logoyu bulup logo_path'e koymuÅŸ
                    document.getElementById('logo_path').value = data.logo_path;
                    logoPreview.innerHTML = '<h4>Logo</h4><img src="https://image.tmdb.org/t/p/w200' + data.logo_path + '" alt="Logo">';
                } else {
                    // Fallback: Manuel olarak images array'inden logo ara
                    if (data.images && data.images.logos && data.images.logos.length > 0) {
                        const bestLogo = data.images.logos.find(logo => logo.iso_639_1 === 'en') || data.images.logos[0];
                        if (bestLogo) {
                            document.getElementById('logo_path').value = bestLogo.file_path;
                            logoPreview.innerHTML = '<h4>Logo</h4><img src="https://image.tmdb.org/t/p/w200' + bestLogo.file_path + '" alt="Logo">';
                        }
                    } else {
                        logoPreview.innerHTML = '<p>No logo available</p>';
                        document.getElementById('logo_path').value = '';
                    }
                }

                // LOGO BACKDROP - DÃœZELTILDI: Logo backdrop'i doÄŸru ÅŸekilde set et
                if (data.logo_backdrop_path) {
                    document.getElementById('logo_backdrop_path').value = data.logo_backdrop_path;
                } else {
                    // Fallback: images array'inden logo backdrop ara
                    if (data.images && data.images.backdrops && data.images.backdrops.length > 0) {
                        const loggedBackdrop = data.images.backdrops.find(backdrop => backdrop.iso_639_1 === 'en');
                        if (loggedBackdrop) {
                            document.getElementById('logo_backdrop_path').value = loggedBackdrop.file_path;
                        }
                    }
                }

                // TRAILER - DÃœZELTILDI: Trailer'Ä± doÄŸru ÅŸekilde bul ve set et
                const trailerPreview = document.getElementById('trailer-preview');
                if (data.videos && data.videos.results && data.videos.results.length > 0) {
                    const officialTrailer = data.videos.results.find(video => 
                        video.type === 'Trailer' && video.official === true && video.site === 'YouTube'
                    ) || data.videos.results.find(video => 
                        video.type === 'Trailer' && video.site === 'YouTube'
                    ) || data.videos.results.find(video => 
                        video.site === 'YouTube'
                    );
                    
                    if (officialTrailer) {
                        document.getElementById('trailer_key').value = officialTrailer.key;
                        trailerPreview.innerHTML = '<div class="content-preview"><strong>Trailer Found:</strong> <a href="https://www.youtube.com/watch?v=' + officialTrailer.key + '" target="_blank">Watch on YouTube</a></div>';
                    } else {
                        trailerPreview.innerHTML = '<div class="content-preview"><p>No YouTube trailer found</p></div>';
                        document.getElementById('trailer_key').value = '';
                    }
                } else {
                    trailerPreview.innerHTML = '<div class="content-preview"><p>No trailer available</p></div>';
                    document.getElementById('trailer_key').value = '';
                }

                // GENRES - Mevcut kod dÃ¼zgÃ¼n Ã§alÄ±ÅŸÄ±yor
                const genresPreview = document.getElementById('genres-preview');
                if (data.genres && data.genres.length > 0) {
                    document.getElementById('genres').value = JSON.stringify(data.genres);
                    genresPreview.innerHTML = '<div class="content-preview"><strong>Genres:</strong> ' + data.genres.map(g => g.name).join(', ') + '</div>';
                } else { 
                    genresPreview.innerHTML = ''; 
                    document.getElementById('genres').value = ''; 
                }

                // CAST - Mevcut kod dÃ¼zgÃ¼n Ã§alÄ±ÅŸÄ±yor
                const castPreview = document.getElementById('cast-preview');
                if (data.credits && data.credits.cast && data.credits.cast.length > 0) {
                    const cast = data.credits.cast.slice(0, 5);
                    document.getElementById('cast').value = JSON.stringify(cast);
                    let castHtml = '<div class="content-preview"><strong>Cast:</strong><div class="cast-list">';
                    cast.forEach(person => {
                        const photoUrl = person.profile_path ? `https://image.tmdb.org/t/p/w45${person.profile_path}` : 'https://via.placeholder.com/40x60.png?text=N/A';
                        castHtml += `<div class="cast-member"><img src="${photoUrl}" alt="${person.name}"><span>${person.name} <em>as ${person.character}</em></span></div>`;
                    });
                    castHtml += '</div></div>';
                    castPreview.innerHTML = castHtml;
                } else { 
                    castPreview.innerHTML = '<div class="content-preview"><p>No cast information available</p></div>'; 
                    document.getElementById('cast').value = ''; 
                }

                statusP.textContent = 'Success! Data has been filled below.';
                statusP.style.color = 'var(--success)';
            }
        })
        .catch(error => {
            statusP.textContent = 'A network error occurred.';
            statusP.style.color = 'var(--error)';
            console.error('Error:', error);
        })
        .finally(() => {
            // Re-enable button
            this.disabled = false;
            this.innerHTML = '<i class="fas fa-search"></i> Fetch Info';
        });
    });

    // Enhanced form submission
    form.addEventListener('submit', function(e) {
        const title = document.getElementById('title').value.trim();
        
        // Basic validation
        if (!title) {
            e.preventDefault();
            alert('Please enter a TV show title before saving.');
            document.getElementById('title').focus();
            return false;
        }
        
        // Visual feedback
        const submitBtn = document.querySelector('.submit-btn');
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Saving TV Show...';
        submitBtn.disabled = true;
        
        document.querySelectorAll('.form-main, .tmdb-import-section').forEach(section => {
            section.style.opacity = '0.7';
            section.style.pointerEvents = 'none';
        });
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
    const formElements = document.querySelectorAll('.form-group');
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

    // Enhanced Enter key handling for TMDb input
    document.getElementById('tmdb_id').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            fetchBtn.click();
        }
    });
});
</script>

<?php require_once __DIR__ . '/partials/footer.php'; ?>