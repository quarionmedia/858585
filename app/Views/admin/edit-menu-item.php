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
        content: "📋";
        font-size: 24px;
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
        max-width: 600px;
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
    input[type="number"],
    select {
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
    }

    input[type="text"]:focus,
    input[type="number"]:focus,
    select:focus {
        outline: none;
        border-color: var(--accent-gold);
    }

    input::placeholder {
        color: var(--text-muted);
    }

    select {
        cursor: pointer;
    }

    select option {
        background: var(--tertiary-bg);
        color: var(--text-primary);
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

    /* Status Badge */
    .status-badge {
        font-size: 12px;
        font-weight: 500;
        padding: 4px 8px;
        border-radius: 6px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-left: 8px;
    }

    .status-active {
        background: rgba(0, 255, 136, 0.2);
        color: var(--success);
    }

    .status-inactive {
        background: rgba(255, 68, 68, 0.2);
        color: var(--error);
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
        }

        .submit-btn {
            max-width: 100%;
        }
    }
</style>

<main>
    <h1>Edit Menu Item</h1>
    
    <a href="/admin/menu" class="back-link">Back to Menu Manager</a>

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
            <form action="/admin/menu/edit/<?php echo $menuItem['id']; ?>" method="POST">
                
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" required value="<?php echo htmlspecialchars($menuItem['title']); ?>" placeholder="Enter menu title...">
                    <p class="helper-text">The display name for this menu item.</p>
                </div>
                
                <div class="form-group">
                    <label for="url">URL</label>
                    <input type="text" id="url" name="url" required placeholder="e.g., /movies" value="<?php echo htmlspecialchars($menuItem['url']); ?>">
                    <p class="helper-text">The URL path this menu item should link to.</p>
                </div>
                
                <div class="form-group">
                    <label for="menu_order">Display Order</label>
                    <input type="number" id="menu_order" name="menu_order" value="<?php echo $menuItem['menu_order']; ?>" placeholder="1" min="1">
                    <p class="helper-text">Lower numbers appear first in the menu.</p>
                </div>
                
                <div class="form-group">
                    <label for="is_active">Status</label>
                    <select name="is_active" id="is_active">
                        <option value="1" <?php echo $menuItem['is_active'] ? 'selected' : ''; ?>>Active</option>
                        <option value="0" <?php echo !$menuItem['is_active'] ? 'selected' : ''; ?>>Inactive</option>
                    </select>
                    <p class="helper-text">Only active menu items will be displayed on the website.</p>
                </div>
                
                <button type="submit" class="submit-btn">Save Changes</button>
            </form>
        </div>
    </div>
</main>
    
<?php require_once __DIR__ . '/partials/footer.php'; ?>