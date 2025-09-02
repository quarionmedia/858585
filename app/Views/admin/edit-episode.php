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
        line-height: 1.2;
    }

    h1::before {
        content: "🎬";
        font-size: 24px;
    }

    h1 small {
        color: var(--text-muted);
        font-weight: 400;
        font-size: 18px;
    }

    .back-link {
        color: var(--accent-gold);
        text-decoration: none;
        font-size: 14px;
        font-weight: 500;
        margin-bottom: 32px;
        display: inline-block;
        transition: color 0.2s ease;
    }

    .back-link:hover {
        color: #ffed4e;
        text-decoration: underline;
    }

    .back-link::before {
        content: "←";
        margin-right: 8px;
    }

    /* Form Layout */
    .form-container {
        max-width: 800px;
        margin: 0 auto;
    }

    .form-main {
        background: var(--secondary-bg);
        border: 1px solid var(--border-color);
        border-radius: 16px;
        padding: 32px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
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
        line-height: 1.5;
    }

    /* Submit Button */
    .submit-btn {
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
        margin-top: 8px;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    .submit-btn:hover {
        background: #ffed4e;
        transform: translateY(-1px);
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

    /* Helper Text */
    .helper-text {
        color: var(--text-muted);
        font-size: 13px;
        margin-top: 6px;
        line-height: 1.4;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        main {
            padding: 16px;
        }
        
        .form-main {
            padding: 20px;
        }
        
        h1 {
            font-size: 24px;
            flex-direction: column;
            align-items: flex-start;
            gap: 8px;
        }

        .submit-btn {
            max-width: 100%;
        }
    }
</style>

<main>
    <h1>
        Edit Episode
        <small><?php echo htmlspecialchars($episode['name']); ?></small>
    </h1>

    <a href="/admin/tv-shows/edit/<?php echo $tvShowId; ?>" class="back-link">Back to TV Show</a>

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

    <div class="form-container">
        <div class="form-main">
            <form action="/admin/episodes/edit/<?php echo $episode['id']; ?>" method="POST">
                
                <div class="form-group">
                    <label for="name">Episode Title:</label>
                    <input type="text" id="name" name="name" required value="<?php echo htmlspecialchars($episode['name']); ?>" placeholder="Enter episode title...">
                </div>
                
                <div class="form-group">
                    <label for="overview">Overview:</label>
                    <textarea id="overview" name="overview" rows="5" placeholder="Enter episode description..."><?php echo htmlspecialchars($episode['overview']); ?></textarea>
                    <p class="helper-text">Provide a brief description of this episode.</p>
                </div>

                <div class="form-group">
                    <label for="video_url">Video URL:</label>
                    <input type="text" id="video_url" name="video_url" value="<?php echo htmlspecialchars($episode['video_url'] ?? ''); ?>" placeholder="https://example.com/video.m3u8">
                    <p class="helper-text">Supported formats: .m3u8, .mpd, .mp4, and other streaming URLs.</p>
                </div>
                
                <button type="submit" class="submit-btn">Save Episode Changes</button>
            </form>
        </div>
    </div>
</main>

<?php require_once __DIR__ . '/partials/footer.php'; ?>