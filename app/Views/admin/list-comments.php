<?php require_once __DIR__ . '/partials/header.php'; ?>

<style>
    /* Enhanced Modern Comment Management with Rich Black-Gray Colors */
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
    .enhanced-header {
        margin-bottom: 40px;
        padding: 32px;
        background: var(--secondary-bg);
        background-image: var(--gradient-2);
        background-blend-mode: overlay;
        border: 1px solid var(--border-color);
        border-radius: 20px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        animation: slideInUp 0.6s ease-out;
    }

    .enhanced-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-5);
        border-radius: 20px 20px 0 0;
    }

    .enhanced-header::after {
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

    .enhanced-header-content {
        position: relative;
        z-index: 1;
    }

    .enhanced-title {
        font-size: 32px;
        font-weight: 800;
        color: var(--text-primary);
        margin: 0 0 16px 0;
        display: flex;
        align-items: center;
        gap: 16px;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    }

    .enhanced-title-icon {
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

    .enhanced-subtitle {
        color: var(--text-secondary);
        font-size: 16px;
        font-weight: 500;
        margin: 0;
        opacity: 0.9;
    }

    /* Enhanced Table Container */
    .enhanced-table-container {
        background: var(--secondary-bg);
        border: 1px solid var(--border-color);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.2);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        animation: slideInUp 0.6s ease-out 0.2s both;
    }

    .enhanced-table-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-1);
        opacity: 0;
        transition: all 0.4s ease;
    }

    .enhanced-table-container:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.3);
        border-color: var(--border-hover);
    }

    .enhanced-table-container:hover::before {
        opacity: 1;
    }

    .admin-table {
        border-collapse: collapse;
        width: 100%;
        margin: 0;
        background: transparent;
    }

    .admin-table th,
    .admin-table td {
        padding: 16px 20px;
        text-align: left;
        vertical-align: middle;
        border: none;
        border-bottom: 1px solid var(--border-color);
        position: relative;
    }

    .admin-table th {
        background: var(--tertiary-bg);
        background-image: var(--gradient-1);
        color: var(--text-primary);
        font-size: 14px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        position: sticky;
        top: 0;
        z-index: 10;
    }

    .admin-table tbody tr {
        transition: all 0.3s ease;
        background: var(--secondary-bg);
    }

    .admin-table tbody tr:hover {
        background: var(--tertiary-bg);
        transform: translateX(4px);
    }

    .admin-table tbody tr:last-child td {
        border-bottom: none;
    }

    /* Enhanced Status Badges */
    .status-badge {
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    }

    .status-approved {
        background: var(--success);
        color: var(--primary-bg);
        box-shadow: 0 2px 12px rgba(0, 255, 136, 0.3);
    }

    .status-pending {
        background: var(--warning);
        color: var(--primary-bg);
        box-shadow: 0 2px 12px rgba(255, 215, 0, 0.3);
    }

    .status-badge:hover {
        transform: translateY(-2px) scale(1.05);
    }

    /* Enhanced Action Buttons */
    .action-buttons {
        display: flex;
        gap: 8px;
        align-items: center;
    }

    .btn {
        padding: 8px 16px;
        border: none;
        border-radius: 8px;
        font-size: 12px;
        font-weight: 700;
        text-decoration: none;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        display: inline-flex;
        align-items: center;
        gap: 6px;
        position: relative;
        overflow: hidden;
    }

    .btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }

    .btn:hover::before {
        left: 100%;
    }

    .btn-approve {
        background: var(--success);
        color: var(--primary-bg);
        box-shadow: 0 4px 12px rgba(0, 255, 136, 0.3);
    }

    .btn-approve:hover {
        background: var(--accent-white);
        transform: translateY(-2px) scale(1.05);
        box-shadow: 0 8px 20px rgba(0, 255, 136, 0.4);
    }

    .btn-unapprove {
        background: var(--warning);
        color: var(--primary-bg);
        box-shadow: 0 4px 12px rgba(255, 215, 0, 0.3);
    }

    .btn-unapprove:hover {
        background: var(--accent-white);
        transform: translateY(-2px) scale(1.05);
        box-shadow: 0 8px 20px rgba(255, 215, 0, 0.4);
    }

    .btn-delete {
        background: var(--error);
        color: var(--accent-white);
        box-shadow: 0 4px 12px rgba(255, 68, 68, 0.3);
    }

    .btn-delete:hover {
        background: #ff6666;
        transform: translateY(-2px) scale(1.05);
        box-shadow: 0 8px 20px rgba(255, 68, 68, 0.4);
    }

    /* Enhanced User Info */
    .user-info {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .username {
        font-weight: 700;
        color: var(--text-primary);
        font-size: 14px;
    }

    .profile-name {
        font-size: 12px;
        color: var(--text-muted);
        background: var(--tertiary-bg);
        padding: 4px 8px;
        border-radius: 6px;
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }

    /* Enhanced Comment Preview */
    .comment-preview {
        max-width: 200px;
        position: relative;
    }

    .comment-text {
        cursor: help;
        transition: all 0.3s ease;
    }

    .comment-text:hover {
        color: var(--accent-gold);
    }

    /* Enhanced Content Info */
    .content-title {
        font-weight: 600;
        color: var(--text-primary);
        max-width: 150px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    /* Date Styling */
    .date-info {
        color: var(--text-secondary);
        font-size: 13px;
        font-weight: 500;
    }

    /* Responsive Design */
    @media (max-width: 1200px) {
        main {
            padding: 20px;
        }
        
        .enhanced-header,
        .enhanced-table-container {
            margin: 0 -10px;
            border-radius: 16px;
        }
    }

    @media (max-width: 768px) {
        .enhanced-title {
            font-size: 24px;
            flex-direction: column;
            align-items: flex-start;
            gap: 12px;
        }
        
        .admin-table {
            font-size: 12px;
        }
        
        .admin-table th,
        .admin-table td {
            padding: 12px 8px;
        }
        
        .action-buttons {
            flex-direction: column;
            gap: 4px;
        }
        
        .btn {
            font-size: 10px;
            padding: 6px 12px;
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

    /* Options Dropdown Enhanced */
    .options-btn {
        background: var(--tertiary-bg);
        background-image: var(--gradient-1);
        color: var(--text-primary);
        border: 1px solid var(--border-color);
        padding: 8px 16px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 12px;
        font-weight: 600;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .options-btn:hover {
        background: var(--quaternary-bg);
        border-color: var(--border-hover);
        transform: translateY(-2px);
    }

    .options-dropdown {
        display: none;
        position: absolute;
        background: var(--tertiary-bg);
        border: 1px solid var(--border-color);
        border-radius: 12px;
        z-index: 1000;
        min-width: 160px;
        padding: 8px 0;
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.4);
        backdrop-filter: blur(10px);
    }

    .options-dropdown a {
        display: block;
        padding: 12px 16px;
        text-decoration: none;
        color: var(--text-secondary);
        font-size: 14px;
        font-weight: 600;
        transition: all 0.2s ease;
        border-bottom: 1px solid var(--border-color);
    }

    .options-dropdown a:last-child {
        border-bottom: none;
    }

    .options-dropdown a:hover {
        background: var(--quaternary-bg);
        color: var(--accent-gold);
        transform: translateX(4px);
    }
</style>

<main>
    <!-- Enhanced Header Section -->
    <div class="enhanced-header">
        <div class="enhanced-header-content">
            <h1 class="enhanced-title">
                <div class="enhanced-title-icon">
                    <i class="fas fa-comments"></i>
                </div>
                Comment Management
            </h1>
            <p class="enhanced-subtitle">Approve, unapprove, or delete user comments.</p>
        </div>
    </div>

    <!-- Enhanced Table Container -->
    <div class="enhanced-table-container">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Author</th>
                    <th>Comment</th>
                    <th>On Content</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($comments as $comment): ?>
                    <tr>
                        <td><?php echo $comment['id']; ?></td>
                        <td>
                            <div class="user-info">
                                <span class="username"><?php echo htmlspecialchars($comment['username'] ?? 'N/A'); ?></span>
                                <span class="profile-name">
                                    <i class="fas fa-user-circle"></i>
                                    <?php echo htmlspecialchars($comment['profile_name'] ?? 'N/A'); ?>
                                </span>
                            </div>
                        </td>
                        <td class="comment-preview">
                            <span class="comment-text" title="<?php echo htmlspecialchars($comment['comment']); ?>">
                                <?php 
                                    echo htmlspecialchars(substr($comment['comment'], 0, 50));
                                    if (strlen($comment['comment']) > 50) {
                                        echo '...';
                                    }
                                ?>
                            </span>
                        </td>
                        <td>
                            <span class="content-title" title="<?php echo htmlspecialchars($comment['content_title'] ?? 'N/A'); ?>">
                                <?php echo htmlspecialchars($comment['content_title'] ?? 'N/A'); ?>
                            </span>
                        </td>
                        <td>
                            <span class="status-badge status-<?php echo strtolower($comment['status']); ?>">
                                <i class="fas fa-<?php echo $comment['status'] == 'approved' ? 'check-circle' : 'clock'; ?>"></i>
                                <?php echo ucfirst($comment['status']); ?>
                            </span>
                        </td>
                        <td>
                            <span class="date-info">
                                <?php echo date('M d, Y', strtotime($comment['created_at'])); ?>
                            </span>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <?php if ($comment['status'] == 'pending'): ?>
                                    <a href="/admin/comments/approve/<?php echo $comment['id']; ?>" class="btn btn-approve">
                                        <i class="fas fa-check"></i>
                                        Approve
                                    </a>
                                <?php else: ?>
                                    <a href="/admin/comments/unapprove/<?php echo $comment['id']; ?>" class="btn btn-unapprove">
                                        <i class="fas fa-times"></i>
                                        Unapprove
                                    </a>
                                <?php endif; ?>
                                <a href="/admin/comments/delete/<?php echo $comment['id']; ?>" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this comment?');">
                                    <i class="fas fa-trash"></i>
                                    Delete
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
    
<script>
    document.addEventListener('DOMContentLoaded', function() {
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
                    background: radial-gradient(circle, rgba(255, 215, 0, 0.4), transparent);
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

        // Enhanced button interactions
        document.querySelectorAll('.btn').forEach(btn => {
            btn.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px) scale(1.05)';
            });
            
            btn.addEventListener('mouseleave', function() {
                this.style.transform = '';
            });
            
            btn.addEventListener('click', function(e) {
                this.style.transform = 'translateY(0px) scale(0.95)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 150);
            });
        });

        // Enhanced table row interactions
        document.querySelectorAll('.admin-table tbody tr').forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.boxShadow = '0 4px 16px rgba(0, 0, 0, 0.2)';
            });
            
            row.addEventListener('mouseleave', function() {
                this.style.boxShadow = '';
            });
        });

        // Status badge hover effects
        document.querySelectorAll('.status-badge').forEach(badge => {
            badge.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px) scale(1.05)';
                this.style.boxShadow = this.classList.contains('status-approved') 
                    ? '0 6px 20px rgba(0, 255, 136, 0.4)' 
                    : '0 6px 20px rgba(255, 215, 0, 0.4)';
            });
            
            badge.addEventListener('mouseleave', function() {
                this.style.transform = '';
                this.style.boxShadow = this.classList.contains('status-approved') 
                    ? '0 2px 12px rgba(0, 255, 136, 0.3)' 
                    : '0 2px 12px rgba(255, 215, 0, 0.3)';
            });
        });
    });

    function toggleDropdown(button, event) {
        event.stopPropagation();
        var dropdown = button.nextElementSibling;
        var wasOpen = dropdown.style.display === 'block';

        // Close all other dropdowns
        document.querySelectorAll('.options-dropdown').forEach(function(d) {
            d.style.display = 'none';
        });

        // If it was closed, open it and set its position
        if (!wasOpen) {
            var btnRect = button.getBoundingClientRect();
            dropdown.style.display = 'block';
            dropdown.style.position = 'fixed';
            dropdown.style.top = (btnRect.bottom + 2) + 'px';
            dropdown.style.left = (btnRect.right - dropdown.offsetWidth) + 'px';
        }
    }

    // Close dropdowns when clicking anywhere else
    window.addEventListener('click', function(event) {
        if (!event.target.matches('.options-btn')) {
            document.querySelectorAll('.options-dropdown').forEach(function(d) {
                d.style.display = 'none';
            });
        }
    });
</script>

<?php require_once __DIR__ . '/partials/footer.php'; ?>