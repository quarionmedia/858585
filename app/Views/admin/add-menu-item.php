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

    /* Page Header */
    .page-header {
        background: var(--secondary-bg);
        border: 1px solid var(--border-color);
        border-radius: 16px;
        padding: 32px;
        margin-bottom: 32px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
    }

    .page-title {
        font-size: 28px;
        font-weight: 700;
        color: var(--text-primary);
        margin: 0 0 12px 0;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .page-title i {
        color: var(--accent-gold);
    }

    .breadcrumb {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: var(--text-secondary);
        text-decoration: none;
        font-size: 14px;
        padding: 8px 16px;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 8px;
        border: 1px solid var(--border-color);
        transition: all 0.2s ease;
    }

    .breadcrumb:hover {
        background: rgba(255, 255, 255, 0.1);
        color: var(--text-primary);
    }

    /* Form Container */
    .form-container {
        max-width: 600px;
        margin: 0 auto;
    }

    .form-card {
        background: var(--secondary-bg);
        border: 1px solid var(--border-color);
        border-radius: 16px;
        padding: 32px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
    }

    .form-header {
        margin-bottom: 32px;
        padding-bottom: 24px;
        border-bottom: 1px solid var(--border-color);
    }

    .form-header h2 {
        font-size: 20px;
        font-weight: 600;
        color: var(--text-primary);
        margin: 0 0 8px 0;
    }

    .form-header p {
        font-size: 14px;
        color: var(--text-secondary);
        margin: 0;
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

    /* Select styling */
    select {
        cursor: pointer;
        appearance: none;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%23a0a0a0' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
        background-position: right 12px center;
        background-repeat: no-repeat;
        background-size: 16px;
        padding-right: 40px;
    }

    select option {
        background: var(--secondary-bg);
        color: var(--text-primary);
    }

    /* Submit Button */
    .submit-btn {
        width: 100%;
        padding: 14px;
        background: var(--accent-gold);
        border: none;
        border-radius: 8px;
        color: #000;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s ease;
        margin-top: 8px;
    }

    .submit-btn:hover {
        background: #ffed4e;
        transform: translateY(-1px);
    }

    .submit-btn:active {
        transform: translateY(0);
    }

    /* Help Text */
    .help-text {
        font-size: 12px;
        color: var(--text-muted);
        margin-top: 4px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        main {
            padding: 16px;
        }
        
        .page-header,
        .form-card {
            padding: 24px;
        }
        
        .page-title {
            font-size: 24px;
        }
    }
</style>

<main>
    <!-- Page Header -->
    <div class="page-header">
        <h1 class="page-title">
            <i class="fas fa-plus"></i>
            Add New Menu Item
        </h1>
        <a href="/admin/menu" class="breadcrumb">
            <i class="fas fa-arrow-left"></i>
            Back to Menu Manager
        </a>
    </div>

    <!-- Form Container -->
    <div class="form-container">
        <div class="form-card">
            <div class="form-header">
                <h2>Menu Item Details</h2>
                <p>Fill in the information below to create a new menu item</p>
            </div>

            <form action="/admin/menu/add" method="POST">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" required placeholder="Enter menu item title">
                    <div class="help-text">This will be displayed in the navigation menu</div>
                </div>

                <div class="form-group">
                    <label for="url">URL</label>
                    <input type="text" id="url" name="url" required placeholder="e.g., /movies or https://external.com">
                    <div class="help-text">Internal links start with "/" or use full URLs for external links</div>
                </div>

                <div class="form-group">
                    <label for="menu_order">Order</label>
                    <input type="number" id="menu_order" name="menu_order" value="0" min="0">
                    <div class="help-text">Lower numbers appear first (0 = top position)</div>
                </div>

                <div class="form-group">
                    <label for="is_active">Status</label>
                    <select name="is_active" id="is_active">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                    <div class="help-text">Only active items will be shown in the menu</div>
                </div>

                <button type="submit" class="submit-btn">Save Menu Item</button>
            </form>
        </div>
    </div>
</main>

<?php require_once __DIR__ . '/partials/footer.php'; ?>