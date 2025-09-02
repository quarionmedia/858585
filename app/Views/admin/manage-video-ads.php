<?php require_once __DIR__ . '/partials/header.php'; ?>

<style>
    /* Enhanced Modern Video Ads Management Page with Rich Black-Gray Colors */
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
        content: '📺';
        width: 48px;
        height: 48px;
        background: var(--gradient-5);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        box-shadow: 0 4px 16px rgba(139, 92, 246, 0.3);
    }

    main > p {
        color: var(--text-secondary);
        font-size: 16px;
        margin: 0 0 32px 0;
        position: relative;
        z-index: 1;
    }

    /* Enhanced Main Content */
    .main-content {
        position: relative;
        z-index: 1;
    }

    /* Enhanced Form Container */
    .form-container {
        background: var(--secondary-bg);
        background-image: var(--gradient-5);
        background-blend-mode: overlay;
        border: 1px solid var(--border-color);
        border-radius: 20px;
        padding: 32px;
        margin-bottom: 40px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    }

    .form-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-5);
        border-radius: 20px 20px 0 0;
    }

    .form-container::after {
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

    .form-container h2 {
        font-size: 24px;
        font-weight: 700;
        color: var(--text-primary);
        margin: 0 0 24px 0;
        position: relative;
        z-index: 1;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .form-container h2::before {
        content: '➕';
        width: 32px;
        height: 32px;
        background: var(--gradient-5);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        box-shadow: 0 2px 8px rgba(139, 92, 246, 0.3);
    }

    /* Enhanced Form Styles */
    .form-group {
        margin-bottom: 24px;
        position: relative;
        z-index: 1;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: var(--text-primary);
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .form-group input, .form-group select, .form-group textarea {
        width: 100%;
        padding: 12px 16px;
        box-sizing: border-box;
        background: var(--tertiary-bg);
        border: 2px solid var(--border-color);
        color: var(--text-primary);
        border-radius: 12px;
        font-size: 14px;
        font-family: 'Inter', sans-serif;
        transition: all 0.3s ease;
        resize: vertical;
    }

    .form-group input:focus, .form-group select:focus, .form-group textarea:focus {
        outline: none;
        border-color: var(--accent-purple);
        box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.1);
        background: var(--quaternary-bg);
    }

    .form-group small {
        display: block;
        margin-top: 6px;
        color: var(--text-muted);
        font-size: 12px;
        font-style: italic;
    }

    /* Enhanced Button Styles */
    .button {
        background: var(--accent-green);
        color: var(--primary-bg);
        padding: 14px 24px;
        text-decoration: none;
        border-radius: 12px;
        cursor: pointer;
        border: none;
        font-family: 'Inter', sans-serif;
        font-size: 14px;
        font-weight: 700;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 4px 16px rgba(0, 255, 136, 0.3);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        position: relative;
        overflow: hidden;
    }

    .button::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }

    .button:hover::before {
        left: 100%;
    }

    .button:hover {
        background: var(--accent-white);
        transform: translateY(-2px) scale(1.02);
        box-shadow: 0 8px 24px rgba(0, 255, 136, 0.4);
    }

    .button-secondary {
        background: var(--accent-blue);
        box-shadow: 0 4px 16px rgba(59, 130, 246, 0.3);
    }

    .button-secondary:hover {
        background: var(--accent-white);
        box-shadow: 0 8px 24px rgba(59, 130, 246, 0.4);
    }

    .button-danger {
        background: var(--accent-red);
        box-shadow: 0 4px 16px rgba(255, 68, 68, 0.3);
    }

    .button-danger:hover {
        background: var(--accent-white);
        box-shadow: 0 8px 24px rgba(255, 68, 68, 0.4);
    }

    /* Enhanced Table Container */
    .table-container {
        background: var(--secondary-bg);
        background-image: var(--gradient-6);
        background-blend-mode: overlay;
        border: 1px solid var(--border-color);
        border-radius: 20px;
        padding: 32px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    }

    .table-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-6);
        border-radius: 20px 20px 0 0;
    }

    .table-container::after {
        content: '';
        position: absolute;
        top: -50%;
        left: -20%;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(59, 130, 246, 0.08), transparent);
        border-radius: 50%;
        pointer-events: none;
    }

    .table-container h2 {
        font-size: 24px;
        font-weight: 700;
        color: var(--text-primary);
        margin: 0 0 24px 0;
        position: relative;
        z-index: 1;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .table-container h2::before {
        content: '📋';
        width: 32px;
        height: 32px;
        background: var(--gradient-6);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        box-shadow: 0 2px 8px rgba(59, 130, 246, 0.3);
    }

    /* Enhanced Table Styles */
    table {
        width: 100%;
        border-collapse: collapse;
        background: var(--tertiary-bg);
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
        position: relative;
        z-index: 1;
    }

    table thead th {
        background: var(--quaternary-bg);
        background-image: var(--gradient-1);
        color: var(--text-primary);
        padding: 16px 12px;
        text-align: left;
        font-weight: 700;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border-bottom: 2px solid var(--border-color);
        position: relative;
    }

    table thead th::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: var(--gradient-6);
        opacity: 0.6;
    }

    table tbody td {
        padding: 16px 12px;
        border-bottom: 1px solid var(--border-color);
        color: var(--text-secondary);
        font-size: 14px;
        vertical-align: middle;
        transition: all 0.3s ease;
    }

    table tbody tr:hover td {
        background: var(--quaternary-bg);
        color: var(--text-primary);
    }

    table tbody tr:last-child td {
        border-bottom: none;
    }

    table tbody td small {
        font-size: 11px;
        color: var(--text-muted);
        display: block;
        max-width: 200px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    /* Enhanced Action Buttons in Table */
    table .button {
        padding: 8px 16px;
        font-size: 12px;
        margin-right: 8px;
        margin-bottom: 4px;
    }

    /* No Data State */
    table tbody tr td[colspan] {
        text-align: center;
        padding: 40px 20px;
        color: var(--text-muted);
        font-size: 16px;
        font-weight: 600;
        background: var(--quaternary-bg);
    }

    /* Enhanced Offset Group Animation */
    #offset-group {
        opacity: 0;
        max-height: 0;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        transform: translateY(-10px);
    }

    #offset-group.show {
        opacity: 1;
        max-height: 200px;
        transform: translateY(0);
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        table {
            font-size: 12px;
        }
        
        table thead th, table tbody td {
            padding: 12px 8px;
        }
        
        table .button {
            padding: 6px 12px;
            font-size: 11px;
            margin-right: 4px;
        }
    }

    @media (max-width: 768px) {
        main {
            padding: 20px;
        }
        
        .form-container, .table-container {
            padding: 20px;
        }
        
        main h1 {
            font-size: 24px;
            flex-direction: column;
            text-align: center;
        }
        
        table {
            display: block;
            overflow-x: auto;
            white-space: nowrap;
        }
        
        .form-container h2, .table-container h2 {
            font-size: 20px;
            justify-content: center;
        }
    }

    @media (max-width: 480px) {
        table tbody td small {
            max-width: 120px;
        }
        
        table .button {
            padding: 4px 8px;
            font-size: 10px;
        }
        
        .form-group input, .form-group select, .form-group textarea {
            padding: 10px 12px;
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

    .form-container, .table-container {
        animation: slideInUp 0.6s ease-out;
    }

    .table-container {
        animation-delay: 0.2s;
    }

    table tbody tr {
        animation: slideInUp 0.4s ease-out;
    }

    table tbody tr:nth-child(1) { animation-delay: 0.1s; }
    table tbody tr:nth-child(2) { animation-delay: 0.2s; }
    table tbody tr:nth-child(3) { animation-delay: 0.3s; }
    table tbody tr:nth-child(4) { animation-delay: 0.4s; }
    table tbody tr:nth-child(5) { animation-delay: 0.5s; }

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
</style>

<main>
    <h1>Manage Video Ads (VAST)</h1>
    <p>Manage Pre-roll, Mid-roll, and Post-roll video ads for the player.</p>

    <div class="main-content">
        <div class="form-container">
            <h2>Add New VAST Ad</h2>
            <form action="/admin/video-ads/add" method="POST">
                <div class="form-group">
                    <label for="name">Ad Name (e.g., Main Preroll):</label>
                    <input type="text" id="name" name="name" required placeholder="Enter descriptive ad name">
                </div>
                <div class="form-group">
                    <label for="type">Ad Type:</label>
                    <select id="type" name="type">
                        <option value="preroll">Pre-roll (Before Video)</option>
                        <option value="midroll">Mid-roll (During Video)</option>
                        <option value="postroll">Post-roll (After Video)</option>
                        <option value="pauseroll">Pause-roll (On Pause)</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="vast_url">VAST Tag URL:</label>
                    <textarea id="vast_url" name="vast_url" rows="3" required placeholder="Enter your VAST .xml URL here"></textarea>
                </div>
                <div class="form-group" id="offset-group">
                    <label for="offset_time">Offset (for Mid-roll only):</label>
                    <input type="text" id="offset_time" name="offset_time" placeholder="e.g., 600 (for seconds) or 25%">
                    <small>Enter time in seconds (e.g., 300) or as a percentage (e.g., 50%).</small>
                </div>
                <button type="submit" class="button">
                    <i class="fas fa-plus"></i>
                    Add Ad
                </button>
            </form>
        </div>

        <div class="table-container">
            <h2>Active Video Ads</h2>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>VAST URL</th>
                        <th>Offset</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($ads)): ?>
                        <?php foreach ($ads as $ad): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($ad['name']); ?></td>
                                <td>
                                    <span style="padding: 4px 8px; background: var(--accent-blue); color: white; border-radius: 6px; font-size: 11px; text-transform: uppercase;">
                                        <?php echo ucfirst($ad['type']); ?>
                                    </span>
                                </td>
                                <td><small><?php echo htmlspecialchars($ad['vast_url']); ?></small></td>
                                <td><?php echo htmlspecialchars($ad['offset_time'] ?? 'N/A'); ?></td>
                                <td>
                                    <span style="padding: 4px 8px; background: <?php echo $ad['is_active'] ? 'var(--accent-green)' : 'var(--accent-red)'; ?>; color: white; border-radius: 6px; font-size: 11px; font-weight: 600;">
                                        <?php echo $ad['is_active'] ? 'Active' : 'Inactive'; ?>
                                    </span>
                                </td>
                                <td>
                                    <a href="/admin/video-ads/toggle/<?php echo $ad['id']; ?>" class="button button-secondary">
                                        <i class="fas fa-<?php echo $ad['is_active'] ? 'pause' : 'play'; ?>"></i>
                                        <?php echo $ad['is_active'] ? 'Deactivate' : 'Activate'; ?>
                                    </a>
                                    <a href="/admin/video-ads/delete/<?php echo $ad['id']; ?>" class="button button-danger" onclick="return confirm('Are you sure you want to delete this ad?')">
                                        <i class="fas fa-trash"></i>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6">No video ads found. Create your first ad to get started!</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Enhanced offset field toggle with smooth animation
    const typeSelect = document.getElementById('type');
    const offsetGroup = document.getElementById('offset-group');
    
    function toggleOffsetField() {
        if (typeSelect.value === 'midroll') {
            offsetGroup.classList.add('show');
            document.getElementById('offset_time').setAttribute('required', 'required');
        } else {
            offsetGroup.classList.remove('show');
            document.getElementById('offset_time').removeAttribute('required');
        }
    }
    
    // Initial check
    toggleOffsetField();
    
    // Listen for changes
    typeSelect.addEventListener('change', toggleOffsetField);

    // Enhanced button interactions
    document.querySelectorAll('.button').forEach(btn => {
        btn.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px) scale(1.02)';
        });
        
        btn.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
        
        btn.addEventListener('mousedown', function() {
            this.style.transform = 'translateY(0) scale(0.98)';
        });
        
        btn.addEventListener('mouseup', function() {
            this.style.transform = 'translateY(-2px) scale(1.02)';
        });
    });

    // Enhanced table row interactions
    document.querySelectorAll('table tbody tr').forEach(row => {
        row.addEventListener('mouseenter', function() {
            // Create subtle ripple effect
            const ripple = document.createElement('div');
            ripple.style.cssText = `
                position: absolute;
                top: 50%;
                left: 0;
                width: 0;
                height: 1px;
                background: linear-gradient(90deg, transparent, rgba(59, 130, 246, 0.3), transparent);
                pointer-events: none;
                animation: rowRipple 0.6s ease-out;
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

    // Enhanced confirmation dialogs
    document.querySelectorAll('.button-danger').forEach(deleteBtn => {
        deleteBtn.addEventListener('click', function(e) {
            e.preventDefault();
            const href = this.getAttribute('href');
            const adName = this.closest('tr').querySelector('td:first-child').textContent;
            const confirmDelete = confirm(`⚠️ Are you sure you want to delete "${adName}"?\n\nThis action cannot be undone and will remove the ad from all video players.`);
            if (confirmDelete) {
                // Add loading animation
                this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Deleting...';
                this.style.pointerEvents = 'none';
                window.location.href = href;
            }
            return false;
        });
    });

    // Form validation enhancement
    const form = document.querySelector('form');
    const vastUrlField = document.getElementById('vast_url');
    
    form.addEventListener('submit', function(e) {
        const vastUrl = vastUrlField.value.trim();
        
        // Basic VAST URL validation
        if (!vastUrl.toLowerCase().includes('.xml') && !vastUrl.toLowerCase().includes('vast')) {
            e.preventDefault();
            alert('⚠️ Please enter a valid VAST XML URL.\n\nVAST URLs typically end with .xml or contain "vast" in the URL.');
            vastUrlField.focus();
            return false;
        }
        
        // Add loading state to submit button
        const submitBtn = this.querySelector('button[type="submit"]');
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Adding Ad...';
        submitBtn.disabled = true;
    });

    // Enhanced form interactions
    document.querySelectorAll('input, select, textarea').forEach(field => {
        field.addEventListener('focus', function() {
            this.style.transform = 'scale(1.02)';
            this.style.boxShadow = '0 4px 20px rgba(139, 92, 246, 0.2)';
        });
        
        field.addEventListener('blur', function() {
            this.style.transform = 'scale(1)';
            this.style.boxShadow = '';
        });
    });

    // Floating particles effect
    function createFloatingParticles() {
        const container = document.querySelector('main');
        const particlesCount = 8;
        
        for (let i = 0; i < particlesCount; i++) {
            const particle = document.createElement('div');
            particle.style.cssText = `
                position: absolute;
                width: 3px;
                height: 3px;
                background: radial-gradient(circle, rgba(139, 92, 246, 0.6), transparent);
                border-radius: 50%;
                pointer-events: none;
                z-index: 0;
                animation: float ${6 + Math.random() * 4}s ease-in-out infinite;
                animation-delay: ${Math.random() * 4}s;
                left: ${Math.random() * 100}%;
                top: ${Math.random() * 100}%;
            `;
            container.appendChild(particle);
        }
    }

    createFloatingParticles();

    // Add row ripple animation keyframes
    if (!document.querySelector('#rowRippleAnimation')) {
        const style = document.createElement('style');
        style.id = 'rowRippleAnimation';
        style.textContent = `
            @keyframes rowRipple {
                0% {
                    width: 0;
                    opacity: 1;
                }
                100% {
                    width: 100%;
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    }

    // Auto-focus on form load for better UX
    setTimeout(() => {
        document.getElementById('name').focus();
    }, 500);

    // Enhanced status badges animation
    document.querySelectorAll('table tbody tr').forEach((row, index) => {
        setTimeout(() => {
            row.style.opacity = '0';
            row.style.transform = 'translateY(20px)';
            row.style.transition = 'all 0.4s ease-out';
            
            setTimeout(() => {
                row.style.opacity = '1';
                row.style.transform = 'translateY(0)';
            }, 50);
        }, index * 100);
    });
});
</script>

<?php require_once __DIR__ . '/partials/footer.php'; ?>