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
        content: "🏗️";
        font-size: 24px;
    }

    .page-description {
        color: var(--text-muted);
        font-size: 16px;
        margin: 0 0 32px 0;
        line-height: 1.5;
    }

    /* Form Layout */
    .form-container {
        max-width: 900px;
        margin: 0 auto;
    }

    .sections-wrapper {
        background: var(--secondary-bg);
        border: 1px solid var(--border-color);
        border-radius: 16px;
        padding: 32px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
        margin-bottom: 24px;
    }

    /* Section List */
    .section-list {
        list-style: none;
        padding: 0;
        margin: 0;
        display: grid;
        gap: 12px;
    }

    .section-item {
        background: var(--tertiary-bg);
        border: 1px solid var(--border-color);
        border-radius: 12px;
        padding: 20px;
        display: flex;
        align-items: center;
        gap: 16px;
        transition: all 0.2s ease;
        cursor: move;
    }

    .section-item:hover {
        border-color: var(--accent-gold);
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
    }

    .drag-handle {
        color: var(--text-muted);
        font-size: 18px;
        cursor: grab;
        user-select: none;
        transition: color 0.2s ease;
    }

    .drag-handle:hover {
        color: var(--accent-gold);
    }

    .drag-handle:active {
        cursor: grabbing;
    }

    .section-title {
        flex-grow: 1;
        font-weight: 600;
        font-size: 16px;
        color: var(--text-primary);
    }

    /* Modern Toggle Switch */
    .toggle-switch {
        width: 48px;
        height: 24px;
        background: var(--error);
        border-radius: 12px;
        position: relative;
        cursor: pointer;
        transition: background-color 0.3s ease;
        border: 2px solid transparent;
    }

    .toggle-switch:hover {
        border-color: var(--border-color);
    }

    .toggle-switch.toggled {
        background: var(--success);
    }

    .toggle-switch::after {
        content: '';
        position: absolute;
        width: 18px;
        height: 18px;
        background: #ffffff;
        border-radius: 50%;
        top: 1px;
        left: 1px;
        transition: left 0.3s ease;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .toggle-switch.toggled::after {
        left: 25px;
    }

    /* Status Indicators */
    .section-item .status-indicator {
        font-size: 12px;
        font-weight: 500;
        padding: 4px 8px;
        border-radius: 6px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .status-active {
        background: rgba(0, 255, 136, 0.2);
        color: var(--success);
    }

    .status-inactive {
        background: rgba(255, 68, 68, 0.2);
        color: var(--error);
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
        display: block;
        margin: 0 auto;
    }

    .save-button:hover {
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
        max-width: 900px;
        margin-left: auto;
        margin-right: auto;
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

    /* Sortable Animation */
    .sortable-ghost {
        opacity: 0.5;
    }

    .sortable-chosen {
        background: var(--accent-gold);
        color: #000;
    }

    .sortable-chosen .section-title,
    .sortable-chosen .drag-handle {
        color: #000;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        main {
            padding: 16px;
        }
        
        .sections-wrapper {
            padding: 20px;
        }
        
        h1 {
            font-size: 24px;
        }

        .section-item {
            padding: 16px;
        }

        .section-title {
            font-size: 15px;
        }

        .toggle-switch {
            width: 44px;
            height: 22px;
        }

        .toggle-switch::after {
            width: 16px;
            height: 16px;
        }

        .toggle-switch.toggled::after {
            left: 24px;
        }

        .save-button {
            max-width: 100%;
        }
    }
</style>

<main>
    <h1>Content Networks</h1>
    <p class="page-description">Manage the sections that appear on your homepage. Drag and drop to reorder.</p>

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
        <div class="sections-wrapper">
            <form action="/admin/content-networks" method="POST" id="sectionsForm">
                <ul id="sortable-sections" class="section-list">
                    <?php foreach ($sections as $index => $section): ?>
                        <li class="section-item" data-id="<?php echo $section['id']; ?>">
                            <span class="drag-handle">☰</span>
                            <span class="section-title"><?php echo htmlspecialchars($section['section_title']); ?></span>
                            <div class="toggle-switch <?php echo $section['is_active'] ? 'toggled' : ''; ?>"></div>
                            
                            <input type="hidden" name="sections[<?php echo $section['id']; ?>][is_active]" value="<?php echo $section['is_active']; ?>">
                            <input type="hidden" name="sections[<?php echo $section['id']; ?>][display_order]" value="<?php echo $section['display_order']; ?>">
                        </li>
                    <?php endforeach; ?>
                </ul>

                <button type="submit" class="save-button">Save Changes</button>
            </form>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var sortableList = document.getElementById('sortable-sections');
    new Sortable(sortableList, {
        animation: 150,
        handle: '.drag-handle',
        ghostClass: 'sortable-ghost',
        chosenClass: 'sortable-chosen'
    });

    // Toggle switch'lere tıklama olayı ekle
    document.querySelectorAll('.toggle-switch').forEach(function(toggle) {
        toggle.addEventListener('click', function() {
            this.classList.toggle('toggled');
            var isActiveInput = this.parentElement.querySelector('input[name*="[is_active]"]');
            isActiveInput.value = this.classList.contains('toggled') ? '1' : '0';
        });
    });

    // Form gönderilmeden önce sıralamayı güncelle
    var form = document.getElementById('sectionsForm');
    form.addEventListener('submit', function() {
        var items = sortableList.querySelectorAll('.section-item');
        items.forEach(function(item, index) {
            var orderInput = item.querySelector('input[name*="[display_order]"]');
            orderInput.value = index + 1;
        });
    });
});
</script>
    
<?php require_once __DIR__ . '/partials/footer.php'; ?>