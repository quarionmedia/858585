<?php require_once __DIR__ . '/partials/header.php'; ?>

<style>
    /* Simple Dashboard Style - Clean Version */
    :root {
        --primary-bg: #0a0a0a;
        --secondary-bg: #1a1a1a;
        --tertiary-bg: #2a2a2a;
        --text-primary: #ffffff;
        --text-secondary: #e0e0e0;
        --text-muted: #a0a0a0;
        --border-color: #404040;
        --accent-gold: #ffd700;
        --success: #00ff88;
        --error: #ff4444;
    }

    main {
        background: var(--primary-bg);
        min-height: calc(100vh - 60px);
        padding: 32px;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        color: var(--text-primary);
    }

    /* Page Title */
    h1 {
        font-size: 28px;
        font-weight: 700;
        color: var(--text-primary);
        margin: 0 0 8px 0;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    h1::before {
        content: "📊";
        font-size: 24px;
    }

    .page-description {
        color: var(--text-muted);
        font-size: 16px;
        margin: 0 0 32px 0;
        line-height: 1.5;
    }

    /* Form Layout */
    .form-layout {
        display: grid;
        grid-template-columns: 1fr;
        gap: 32px;
        max-width: 1200px;
        margin: 0 auto;
    }

    /* Form Sections */
    .form-section {
        background: var(--secondary-bg);
        border: 1px solid var(--border-color);
        border-radius: 16px;
        padding: 32px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
    }

    .form-section h3 {
        font-size: 20px;
        font-weight: 600;
        color: var(--text-primary);
        margin: 0 0 24px 0;
        display: flex;
        align-items: center;
        gap: 12px;
        padding-bottom: 16px;
        border-bottom: 1px solid var(--border-color);
    }

    .web-ad-section h3::before {
        content: "🌐";
        font-size: 18px;
    }

    .mobile-ad-section h3::before {
        content: "📱";
        font-size: 18px;
    }

    /* Form Elements */
    .form-group {
        margin-bottom: 24px;
    }

    .form-group:last-child {
        margin-bottom: 0;
    }

    label {
        display: block;
        font-size: 14px;
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 8px;
    }

    input[type="text"],
    textarea {
        width: 100%;
        padding: 12px 16px;
        background: var(--tertiary-bg);
        border: 1px solid var(--border-color);
        border-radius: 8px;
        color: var(--text-primary);
        font-size: 14px;
        font-family: inherit;
        transition: border-color 0.2s ease;
        box-sizing: border-box;
        resize: vertical;
    }

    input[type="text"]:focus,
    textarea:focus {
        outline: none;
        border-color: var(--accent-gold);
    }

    input::placeholder,
    textarea::placeholder {
        color: var(--text-muted);
    }

    textarea {
        min-height: 120px;
        font-family: 'Fira Code', 'Monaco', 'Consolas', monospace;
        line-height: 1.5;
    }

    /* Submit Button */
    .save-button {
        width: 100%;
        max-width: 300px;
        padding: 14px 24px;
        background: var(--accent-gold);
        border: none;
        border-radius: 8px;
        color: #000;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s ease;
        margin-top: 32px;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    .save-button:hover {
        background: #ffed4e;
        transform: translateY(-1px);
    }

    /* Grid Layout for Form Groups */
    .form-grid {
        display: grid;
        gap: 24px;
    }

    .mobile-ad-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 24px;
    }

    /* Helper Text */
    .helper-text {
        color: var(--text-muted);
        font-size: 13px;
        margin-top: 6px;
        line-height: 1.4;
    }

    /* Success/Error Messages */
    .message {
        padding: 12px 16px;
        border-radius: 8px;
        margin-bottom: 24px;
        font-size: 14px;
        font-weight: 500;
    }

    .message.success {
        background: rgba(0, 255, 136, 0.1);
        border: 1px solid var(--success);
        color: var(--success);
    }

    .message.error {
        background: rgba(255, 68, 68, 0.1);
        border: 1px solid var(--error);
        color: var(--error);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        main {
            padding: 16px;
        }
        
        .form-section {
            padding: 20px;
        }
        
        h1 {
            font-size: 24px;
        }

        .mobile-ad-grid {
            grid-template-columns: 1fr;
        }

        .save-button {
            max-width: 100%;
        }
    }
</style>

<main>
    <h1>ADS Settings</h1>
    <p class="page-description">Manage advertisement settings for your website and mobile applications.</p>

    <?php if (isset($_SESSION['success_message'])): ?>
        <div class="message success">
            <?php 
            echo htmlspecialchars($_SESSION['success_message']); 
            unset($_SESSION['success_message']);
            ?>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['error_message'])): ?>
        <div class="message error">
            <?php 
            echo htmlspecialchars($_SESSION['error_message']); 
            unset($_SESSION['error_message']);
            ?>
        </div>
    <?php endif; ?>

    <form action="/admin/ads-settings" method="POST" class="form-layout">
        
        <!-- Web Advertisement Section -->
        <div class="form-section web-ad-section">
            <h3>Web Advertisement</h3>
            <div class="form-grid">
                <div class="form-group">
                    <label for="web_ad_header">Header Ad Code</label>
                    <textarea id="web_ad_header" name="web_ad_header" placeholder="Enter your header advertisement code here..."><?php echo htmlspecialchars($settings['web_ad_header'] ?? ''); ?></textarea>
                    <p class="helper-text">This ad will be displayed at the top of your website pages.</p>
                </div>
                
                <div class="form-group">
                    <label for="web_ad_footer">Footer Ad Code</label>
                    <textarea id="web_ad_footer" name="web_ad_footer" placeholder="Enter your footer advertisement code here..."><?php echo htmlspecialchars($settings['web_ad_footer'] ?? ''); ?></textarea>
                    <p class="helper-text">This ad will be displayed at the bottom of your website pages.</p>
                </div>
                
                <div class="form-group">
                    <label for="web_ad_movie_player_top">Ad Before Movie Player</label>
                    <textarea id="web_ad_movie_player_top" name="web_ad_movie_player_top" placeholder="Enter advertisement code to show before video player..."><?php echo htmlspecialchars($settings['web_ad_movie_player_top'] ?? ''); ?></textarea>
                    <p class="helper-text">This ad will be displayed before the movie/TV show player loads.</p>
                </div>
                
                <div class="form-group">
                    <label for="web_ad_movie_player_bottom">Ad After Movie Player</label>
                    <textarea id="web_ad_movie_player_bottom" name="web_ad_movie_player_bottom" placeholder="Enter advertisement code to show after video player..."><?php echo htmlspecialchars($settings['web_ad_movie_player_bottom'] ?? ''); ?></textarea>
                    <p class="helper-text">This ad will be displayed after the movie/TV show player.</p>
                </div>
            </div>
        </div>

        <!-- Mobile Advertisement Section -->
        <div class="form-section mobile-ad-section">
            <h3>Mobile Advertisement (AdMob)</h3>
            <div class="mobile-ad-grid">
                <div class="form-group">
                    <label for="admob_app_id">AdMob App ID</label>
                    <input type="text" id="admob_app_id" name="admob_app_id" value="<?php echo htmlspecialchars($settings['admob_app_id'] ?? ''); ?>" placeholder="ca-app-pub-xxxxxxxxxxxxxxxx~yyyyyyyyyy">
                    <p class="helper-text">Your unique AdMob application ID from Google AdMob console.</p>
                </div>
                
                <div class="form-group">
                    <label for="admob_banner_ad_id">AdMob Banner Ad ID</label>
                    <input type="text" id="admob_banner_ad_id" name="admob_banner_ad_id" value="<?php echo htmlspecialchars($settings['admob_banner_ad_id'] ?? ''); ?>" placeholder="ca-app-pub-xxxxxxxxxxxxxxxx/yyyyyyyyyy">
                    <p class="helper-text">Ad unit ID for banner advertisements in your mobile app.</p>
                </div>
                
                <div class="form-group">
                    <label for="admob_interstitial_ad_id">AdMob Interstitial Ad ID</label>
                    <input type="text" id="admob_interstitial_ad_id" name="admob_interstitial_ad_id" value="<?php echo htmlspecialchars($settings['admob_interstitial_ad_id'] ?? ''); ?>" placeholder="ca-app-pub-xxxxxxxxxxxxxxxx/zzzzzzzzzz">
                    <p class="helper-text">Ad unit ID for full-screen interstitial advertisements in your mobile app.</p>
                </div>
            </div>
        </div>

        <button type="submit" class="save-button">Save ADS Settings</button>
    </form>
</main>
    
<?php require_once __DIR__ . '/partials/footer.php'; ?>