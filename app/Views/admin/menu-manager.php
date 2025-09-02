<?php require_once __DIR__ . '/partials/header.php'; ?>

<style>
    /* Enhanced Modern Menu Manager Page with Rich Black-Gray Colors */
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
        content: '🗂️';
        width: 48px;
        height: 48px;
        background: var(--gradient-4);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        box-shadow: 0 4px 16px rgba(255, 215, 0, 0.3);
    }

    main > p {
        color: var(--text-secondary);
        font-size: 16px;
        margin: 0 0 24px 0;
        position: relative;
        z-index: 1;
    }

    /* Enhanced Action Link */
    main > a {
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
        position: relative;
        z-index: 1;
        overflow: hidden;
        margin-bottom: 32px;
    }

    main > a::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }

    main > a:hover::before {
        left: 100%;
    }

    main > a:hover {
        background: var(--accent-white);
        transform: translateY(-4px) scale(1.02);
        box-shadow: 0 12px 32px rgba(0, 255, 136, 0.4);
    }

    main > a::after {
        content: '➕';
        font-size: 14px;
    }

    main hr {
        border: none;
        height: 2px;
        background: var(--gradient-4);
        margin: 32px 0;
        border-radius: 2px;
        box-shadow: 0 2px 8px rgba(255, 215, 0, 0.2);
        position: relative;
        z-index: 1;
    }

    /* Enhanced Table Styles */
    .admin-table {
        border-collapse: collapse;
        width: 100%;
        background: var(--secondary-bg);
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        border: 1px solid var(--border-color);
        position: relative;
        z-index: 1;
        margin-top: 0;
    }

    .admin-table::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-4);
        border-radius: 16px 16px 0 0;
    }

    .admin-table th {
        background: var(--tertiary-bg);
        background-image: var(--gradient-1);
        color: var(--text-primary);
        padding: 20px 16px;
        text-align: left;
        font-weight: 700;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border-bottom: 2px solid var(--border-color);
        position: relative;
        border: none;
    }

    .admin-table th::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: var(--gradient-4);
        opacity: 0.6;
    }

    .admin-table td {
        padding: 16px;
        text-align: left;
        vertical-align: middle;
        border-bottom: 1px solid var(--border-color);
        color: var(--text-secondary);
        font-size: 14px;
        transition: all 0.3s ease;
        border: none;
        border-bottom: 1px solid var(--border-color);
    }

    .admin-table tr:hover td {
        background: var(--tertiary-bg);
        color: var(--text-primary);
    }

    .admin-table tr:last-child td {
        border-bottom: none;
    }

    /* Enhanced Menu Order Badge */
    .admin-table td:first-child {
        font-weight: 700;
        color: var(--accent-gold);
        text-align: center;
        font-size: 16px;
    }

    /* Enhanced Status Badge */
    .status-badge {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        display: inline-block;
    }

    .status-active {
        background: var(--accent-green);
        color: var(--primary-bg);
        box-shadow: 0 2px 8px rgba(0, 255, 136, 0.3);
    }

    .status-inactive {
        background: var(--accent-red);
        color: var(--accent-white);
        box-shadow: 0 2px 8px rgba(255, 68, 68, 0.3);
    }

    /* Enhanced Action Links */
    .admin-table td a {
        color: var(--accent-blue);
        text-decoration: none;
        font-weight: 600;
        padding: 8px 12px;
        border-radius: 8px;
        background: var(--tertiary-bg);
        border: 1px solid var(--border-color);
        transition: all 0.3s ease;
        display: inline-block;
        margin: 2px;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .admin-table td a:hover {
        background: var(--accent-blue);
        color: var(--accent-white);
        transform: translateY(-2px);
        box-shadow: 0 4px 16px rgba(59, 130, 246, 0.3);
    }

    .admin-table td a:last-child {
        color: var(--accent-red);
    }

    .admin-table td a:last-child:hover {
        background: var(--accent-red);
        color: var(--accent-white);
        box-shadow: 0 4px 16px rgba(255, 68, 68, 0.3);
    }

    /* URL Display Enhancement */
    .url-display {
        font-family: 'Monaco', 'Menlo', monospace;
        background: var(--tertiary-bg);
        padding: 8px 12px;
        border-radius: 8px;
        border: 1px solid var(--border-color);
        color: var(--accent-silver);
        font-size: 12px;
        max-width: 200px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        display: block;
    }

    /* No Data State */
    .admin-table tbody tr td[colspan] {
        text-align: center;
        padding: 60px 32px;
        background: var(--tertiary-bg);
        color: var(--text-muted);
        font-size: 18px;
        font-weight: 600;
        position: relative;
    }

    .admin-table tbody tr td[colspan]::before {
        content: '📋';
        display: block;
        font-size: 48px;
        margin-bottom: 16px;
        opacity: 0.5;
        animation: float 3s ease-in-out infinite alternate;
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .admin-table {
            font-size: 12px;
        }
        
        .admin-table th, .admin-table td {
            padding: 12px 8px;
        }
        
        .url-display {
            max-width: 150px;
        }
    }

    @media (max-width: 768px) {
        main {
            padding: 20px;
        }
        
        main h1 {
            font-size: 24px;
            flex-direction: column;
            text-align: center;
        }
        
        .admin-table {
            display: block;
            overflow-x: auto;
            white-space: nowrap;
        }
        
        .admin-table td a {
            padding: 6px 10px;
            font-size: 11px;
            margin: 1px;
        }
        
        .url-display {
            max-width: 120px;
            font-size: 11px;
            padding: 6px 10px;
        }
    }

    @media (max-width: 480px) {
        .admin-table th, .admin-table td {
            padding: 8px 6px;
        }
        
        .status-badge {
            padding: 4px 8px;
            font-size: 10px;
        }
        
        .admin-table td a {
            padding: 4px 8px;
            font-size: 10px;
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

    .admin-table {
        animation: slideInUp 0.6s ease-out;
    }

    .admin-table tbody tr {
        animation: slideInUp 0.4s ease-out;
    }

    .admin-table tbody tr:nth-child(1) { animation-delay: 0.1s; }
    .admin-table tbody tr:nth-child(2) { animation-delay: 0.2s; }
    .admin-table tbody tr:nth-child(3) { animation-delay: 0.3s; }
    .admin-table tbody tr:nth-child(4) { animation-delay: 0.4s; }
    .admin-table tbody tr:nth-child(5) { animation-delay: 0.5s; }

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

    /* Action separator enhancement */
    .action-separator {
        color: var(--text-muted);
        margin: 0 8px;
        font-weight: 300;
    }
</style>

<main>
    <h1>Menu Manager</h1>
    <p>Manage the main navigation menu for your site.</p>
    <a href="/admin/menu/add">Add New Menu Item</a>
    <hr>
    <table class="admin-table">
        <thead>
            <tr>
                <th>Order</th>
                <th>Title</th>
                <th>URL</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($menuItems)): ?>
                <?php foreach ($menuItems as $item): ?>
                    <tr>
                        <td><?php echo $item['menu_order']; ?></td>
                        <td><strong><?php echo htmlspecialchars($item['title']); ?></strong></td>
                        <td>
                            <span class="url-display"><?php echo htmlspecialchars($item['url']); ?></span>
                        </td>
                        <td>
                            <span class="status-badge <?php echo $item['is_active'] ? 'status-active' : 'status-inactive'; ?>">
                                <?php echo $item['is_active'] ? 'Active' : 'Inactive'; ?>
                            </span>
                        </td>
                        <td>
                            <a href="/admin/menu/edit/<?php echo $item['id']; ?>">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <span class="action-separator">|</span>
                            <a href="/admin/menu/delete/<?php echo $item['id']; ?>" onclick="return confirm('Are you sure you want to delete this menu item?');">
                                <i class="fas fa-trash"></i> Delete
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No menu items found. Create your first menu item to get started!</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Enhanced table row interactions
    document.querySelectorAll('.admin-table tbody tr').forEach(row => {
        row.addEventListener('mouseenter', function() {
            // Create subtle ripple effect
            const ripple = document.createElement('div');
            ripple.style.cssText = `
                position: absolute;
                top: 50%;
                left: 0;
                width: 0;
                height: 1px;
                background: linear-gradient(90deg, transparent, rgba(255, 215, 0, 0.4), transparent);
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

    // Enhanced action link interactions
    document.querySelectorAll('.admin-table td a').forEach(link => {
        link.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px) scale(1.05)';
        });
        
        link.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
        
        link.addEventListener('mousedown', function() {
            this.style.transform = 'translateY(0) scale(0.95)';
        });
        
        link.addEventListener('mouseup', function() {
            this.style.transform = 'translateY(-2px) scale(1.05)';
        });
    });

    // Enhanced add menu item link interaction
    document.querySelectorAll('main > a').forEach(link => {
        link.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-4px) scale(1.02)';
        });
        
        link.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
        
        link.addEventListener('mousedown', function() {
            this.style.transform = 'translateY(0) scale(0.98)';
        });
        
        link.addEventListener('mouseup', function() {
            this.style.transform = 'translateY(-4px) scale(1.02)';
        });
    });

    // Enhanced confirmation dialog
    document.querySelectorAll('a[onclick*="confirm"]').forEach(deleteLink => {
        deleteLink.addEventListener('click', function(e) {
            e.preventDefault();
            const href = this.getAttribute('href');
            const menuTitle = this.closest('tr').querySelector('td:nth-child(2) strong').textContent;
            const confirmDelete = confirm(`⚠️ Are you sure you want to delete "${menuTitle}"?\n\nThis action cannot be undone and will remove the menu item from the navigation.`);
            if (confirmDelete) {
                // Add loading animation
                this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Deleting...';
                this.style.pointerEvents = 'none';
                this.style.opacity = '0.6';
                window.location.href = href;
            }
            return false;
        });
    });

    // Status badge animation on load
    document.querySelectorAll('.status-badge').forEach((badge, index) => {
        setTimeout(() => {
            badge.style.opacity = '0';
            badge.style.transform = 'scale(0.8)';
            badge.style.transition = 'all 0.3s ease-out';
            
            setTimeout(() => {
                badge.style.opacity = '1';
                badge.style.transform = 'scale(1)';
            }, 50);
        }, index * 100);
    });

    // URL display tooltip functionality
    document.querySelectorAll('.url-display').forEach(urlElement => {
        urlElement.addEventListener('mouseenter', function() {
            const fullUrl = this.textContent;
            if (fullUrl.length > 25) {
                this.setAttribute('title', fullUrl);
            }
            this.style.transform = 'scale(1.05)';
            this.style.zIndex = '10';
        });
        
        urlElement.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
            this.style.zIndex = '1';
        });
    });

    // Menu order badge enhancement
    document.querySelectorAll('.admin-table td:first-child').forEach(orderCell => {
        orderCell.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.2)';
            this.style.textShadow = '0 2px 8px rgba(255, 215, 0, 0.5)';
        });
        
        orderCell.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
            this.style.textShadow = 'none';
        });
    });

    // Floating particles effect
    function createFloatingParticles() {
        const container = document.querySelector('main');
        const particlesCount = 6;
        
        for (let i = 0; i < particlesCount; i++) {
            const particle = document.createElement('div');
            particle.style.cssText = `
                position: absolute;
                width: 3px;
                height: 3px;
                background: radial-gradient(circle, rgba(255, 215, 0, 0.5), transparent);
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

    // Table rows staggered animation
    document.querySelectorAll('.admin-table tbody tr').forEach((row, index) => {
        setTimeout(() => {
            row.style.opacity = '0';
            row.style.transform = 'translateX(-20px)';
            row.style.transition = 'all 0.4s ease-out';
            
            setTimeout(() => {
                row.style.opacity = '1';
                row.style.transform = 'translateX(0)';
            }, 50);
        }, index * 100);
    });

    // Enhanced table header animation
    document.querySelectorAll('.admin-table th').forEach((header, index) => {
        setTimeout(() => {
            header.style.opacity = '0';
            header.style.transform = 'translateY(-10px)';
            header.style.transition = 'all 0.3s ease-out';
            
            setTimeout(() => {
                header.style.opacity = '1';
                header.style.transform = 'translateY(0)';
            }, 50);
        }, index * 50);
    });
});
</script>
    
<?php require_once __DIR__ . '/partials/footer.php'; ?>