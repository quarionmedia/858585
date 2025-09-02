<?php require_once __DIR__ . '/partials/header.php'; ?>

<style>
    /* Enhanced Modern Requests List Page with Rich Black-Gray Colors */
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
        --accent-orange: #f97316;
        --text-primary: #ffffff;
        --text-secondary: #e0e0e0;
        --text-muted: #a0a0a0;
        --border-color: #404040;
        --border-hover: #606060;
        --success: #00ff88;
        --warning: #ffd700;
        --error: #ff4444;
        --pending: #f97316;
        --gradient-1: linear-gradient(135deg, #404040, #606060);
        --gradient-2: linear-gradient(135deg, #2a2a2a, #404040);
        --gradient-3: linear-gradient(135deg, #ff4444, #ff6666);
        --gradient-4: linear-gradient(135deg, #ffd700, #ffed4e);
        --gradient-5: linear-gradient(135deg, #8b5cf6, #a78bfa);
        --gradient-6: linear-gradient(135deg, #3b82f6, #60a5fa);
        --gradient-orange: linear-gradient(135deg, #f97316, #fb923c);
    }

    body {
        background: var(--primary-bg);
        background-image: 
            radial-gradient(circle at 20% 30%, rgba(249, 115, 22, 0.03) 0%, transparent 60%),
            radial-gradient(circle at 80% 70%, rgba(255, 215, 0, 0.02) 0%, transparent 60%),
            radial-gradient(circle at 50% 50%, rgba(64, 64, 64, 0.03) 0%, transparent 70%);
        min-height: 100vh;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        color: var(--text-primary);
        position: relative;
        overflow-x: hidden;
    }

    body::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" patternUnits="userSpaceOnUse" width="100" height="100"><circle cx="25" cy="25" r="1" fill="rgba(249,115,22,0.02)"/><circle cx="75" cy="75" r="1" fill="rgba(255,215,0,0.01)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>') repeat;
        pointer-events: none;
        opacity: 0.4;
        z-index: 0;
    }

    .page-container {
        padding: 32px;
        position: relative;
        z-index: 1;
    }

    /* Enhanced Header Section - Reports tarzında */
    .list-header {
        margin-bottom: 40px;
        padding: 32px;
        background: var(--secondary-bg);
        background-image: var(--gradient-orange);
        background-blend-mode: overlay;
        border: 1px solid var(--border-color);
        border-radius: 20px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    }

    .list-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-orange);
        border-radius: 20px 20px 0 0;
    }

    .list-header::after {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(249, 115, 22, 0.08), transparent);
        border-radius: 50%;
        pointer-events: none;
    }

    .list-header-content {
        position: relative;
        z-index: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
    }

    .page-title {
        font-size: 32px;
        font-weight: 800;
        color: var(--text-primary);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 16px;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    }

    .list-title-icon {
        width: 48px;
        height: 48px;
        background: var(--gradient-orange);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        color: white;
        box-shadow: 0 4px 16px rgba(249, 115, 22, 0.3);
    }

    .list-divider {
        border: none;
        height: 2px;
        background: var(--gradient-orange);
        margin: 32px 0;
        border-radius: 2px;
        box-shadow: 0 2px 8px rgba(249, 115, 22, 0.2);
    }

    /* Enhanced Table Container - Reports tarzında */
    .enhanced-table-container {
        display: flex;
        flex-direction: column;
        gap: 20px;
        position: relative;
        z-index: 1;
    }

    /* Enhanced Request Row - Reports layout'u gibi */
    .enhanced-row {
        display: flex;
        align-items: center;
        background: var(--secondary-bg);
        background-image: var(--gradient-2);
        padding: 20px;
        border-radius: 16px;
        border: 1px solid var(--border-color);
        gap: 20px;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
    }

    .enhanced-row::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        background: var(--gradient-orange);
        opacity: 0;
        transition: all 0.4s ease;
    }

    .enhanced-row:hover {
        background: var(--tertiary-bg);
        box-shadow: 0 12px 32px rgba(0, 0, 0, 0.3);
        border-color: var(--border-hover);
    }

    .enhanced-row:hover::before {
        opacity: 1;
    }

    /* Request Details Section - Reports gibi */
    .enhanced-request-details {
        flex: 3;
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .enhanced-request-poster {
        width: 80px;
        height: 120px;
        object-fit: cover;
        border-radius: 12px;
        flex-shrink: 0;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4);
        border: 2px solid var(--border-color);
        transition: all 0.3s ease;
    }

    .enhanced-row:hover .enhanced-request-poster {
        transform: scale(1.05) rotate(-2deg);
        box-shadow: 0 12px 32px rgba(0, 0, 0, 0.5);
    }

    .enhanced-request-info {
        flex-grow: 1;
        min-width: 0;
    }

    .request-title {
        margin: 0 0 12px 0;
        font-size: 20px;
        font-weight: 700;
        color: var(--text-primary);
        line-height: 1.3;
    }

    .request-type {
        font-size: 0.8rem;
        color: var(--text-muted);
        margin-left: 0.5rem;
        background: var(--tertiary-bg);
        padding: 2px 8px;
        border-radius: 12px;
        border: 1px solid var(--border-color);
    }

    .requester-info {
        font-size: 14px;
        color: var(--text-muted);
        margin-top: 8px;
        padding: 12px 16px;
        background: var(--tertiary-bg);
        border-radius: 8px;
        border-left: 4px solid var(--accent-orange);
        line-height: 1.4;
    }

    .requester-info strong {
        color: var(--accent-silver);
    }

    .requester-info small {
        color: var(--text-muted);
        font-size: 12px;
    }

    /* Status and Date Info - Reports gibi */
    .date-info, .status-info {
        flex: 1;
        text-align: center;
        padding: 0 10px;
    }

    .date-info {
        font-size: 14px;
        color: var(--text-secondary);
        background: var(--tertiary-bg);
        padding: 12px;
        border-radius: 8px;
        border: 1px solid var(--border-color);
    }

    .enhanced-status-badge {
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 700;
        text-transform: capitalize;
        display: inline-block;
        min-width: 80px;
        text-align: center;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    }

    .status-pending {
        background: linear-gradient(135deg, var(--pending), #fb923c);
        color: #000;
    }

    .status-approved {
        background: linear-gradient(135deg, var(--success), #4ade80);
        color: #000;
    }

    .status-rejected {
        background: linear-gradient(135deg, var(--error), #f87171);
        color: #fff;
    }

    /* Actions Section - Reports gibi */
    .actions-info {
        flex: 1;
        display: flex;
        justify-content: center;
        position: relative;
    }

    .action-buttons {
        display: flex;
        gap: 8px;
        justify-content: center;
    }

    .btn-action {
        padding: 10px 16px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        position: relative;
        overflow: hidden;
        color: #fff;
    }

    .btn-action::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }

    .btn-action:hover::before {
        left: 100%;
    }

    .btn-complete {
        background: linear-gradient(135deg, var(--success), #4ade80);
        box-shadow: 0 4px 12px rgba(0, 255, 136, 0.3);
    }

    .btn-complete:hover {
        transform: translateY(-2px) scale(1.05);
        box-shadow: 0 6px 20px rgba(0, 255, 136, 0.4);
    }

    .btn-reject {
        background: linear-gradient(135deg, var(--accent-orange), #fb923c);
        box-shadow: 0 4px 12px rgba(249, 115, 22, 0.3);
    }

    .btn-reject:hover {
        transform: translateY(-2px) scale(1.05);
        box-shadow: 0 6px 20px rgba(249, 115, 22, 0.4);
    }

    .btn-delete {
        background: linear-gradient(135deg, var(--accent-red), #f87171);
        box-shadow: 0 4px 12px rgba(255, 68, 68, 0.3);
    }

    .btn-delete:hover {
        transform: translateY(-2px) scale(1.05);
        box-shadow: 0 6px 20px rgba(255, 68, 68, 0.4);
    }

    /* No Results State - Reports gibi */
    .no-results {
        text-align: center;
        padding: 80px 32px;
        background: var(--secondary-bg);
        border: 1px solid var(--border-color);
        border-radius: 20px;
        position: relative;
        overflow: hidden;
    }

    .no-results::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-orange);
        opacity: 0.6;
    }

    .no-results::after {
        content: '📋';
        font-size: 64px;
        margin-bottom: 24px;
        color: var(--accent-orange);
        opacity: 0.8;
        animation: float 3s ease-in-out infinite alternate;
        display: block;
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .enhanced-row {
            flex-direction: column;
            align-items: stretch;
            text-align: center;
            gap: 16px;
        }
        
        .enhanced-request-details {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        
        .enhanced-request-poster {
            width: 120px;
            height: 180px;
            align-self: center;
        }
        
        .date-info, .status-info, .actions-info {
            flex: none;
            text-align: center;
        }
    }

    @media (max-width: 768px) {
        .page-container {
            padding: 20px;
        }
        
        .list-header {
            padding: 20px;
        }
        
        .page-title {
            font-size: 24px;
            justify-content: center;
        }
        
        .enhanced-row {
            padding: 16px;
            gap: 12px;
        }
        
        .action-buttons {
            flex-direction: column;
            gap: 8px;
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

    .enhanced-row {
        animation: slideInUp 0.6s ease-out;
    }

    .enhanced-row:nth-child(1) { animation-delay: 0.1s; }
    .enhanced-row:nth-child(2) { animation-delay: 0.2s; }
    .enhanced-row:nth-child(3) { animation-delay: 0.3s; }
    .enhanced-row:nth-child(4) { animation-delay: 0.4s; }
    .enhanced-row:nth-child(5) { animation-delay: 0.5s; }
</style>

<main class="page-container">
    <!-- Enhanced Header Section -->
    <div class="list-header">
        <div class="list-header-content">
            <h1 class="page-title">
                <div class="list-title-icon">
                    <i class="fas fa-inbox"></i>
                </div>
                Request Management
            </h1>
        </div>
    </div>
    
    <hr class="list-divider">

    <div class="enhanced-table-container">
        <?php if (!empty($requests)): ?>
            <?php foreach ($requests as $request): ?>
                <div class="enhanced-row">
                    <div class="enhanced-request-details">
                        <img src="<?php echo !empty($request['poster_path']) ? 'https://image.tmdb.org/t/p/w200' . $request['poster_path'] : '/assets/images/placeholder.png'; ?>" 
                             alt="Content Poster" 
                             class="enhanced-request-poster">
                        <div class="enhanced-request-info">
                            <div class="request-title">
                                <?php echo htmlspecialchars($request['title']); ?>
                                <span class="request-type"><?php echo htmlspecialchars($request['type']); ?></span>
                            </div>
                            
                            <div class="requester-info">
                                Requested by:
                                <strong>
                                    <?php echo htmlspecialchars($request['username'] ?? 'N/A'); ?> 
                                    <small>(Profile: <?php echo htmlspecialchars($request['profile_name'] ?? 'N/A'); ?>)</small>
                                </strong>
                            </div>
                        </div>
                    </div>
                    <div class="status-info">
                        <span class="enhanced-status-badge status-<?php echo strtolower($request['status']); ?>">
                            <?php echo ucfirst($request['status']); ?>
                        </span>
                    </div>
                    <div class="date-info">
                        <?php echo date('M d, Y, H:i', strtotime($request['created_at'])); ?>
                    </div>
                    <div class="actions-info">
                        <div class="action-buttons">
                            <?php if ($request['status'] === 'pending'): ?>
                                <a href="/admin/requests/update-status/<?php echo $request['id']; ?>/completed" class="btn-action btn-complete">
                                    <i class="fas fa-check"></i>
                                    Complete
                                </a>
                                <a href="/admin/requests/update-status/<?php echo $request['id']; ?>/rejected" class="btn-action btn-reject">
                                    <i class="fas fa-times"></i>
                                    Reject
                                </a>
                            <?php endif; ?>
                            <a href="/admin/requests/delete/<?php echo $request['id']; ?>" class="btn-action btn-delete" onclick="return confirm('Are you sure?');">
                                <i class="fas fa-trash"></i>
                                Delete
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="no-results">No requests found.</div>
        <?php endif; ?>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Enhanced request item interactions
    document.querySelectorAll('.enhanced-row').forEach(item => {
        item.addEventListener('mouseenter', function() {
            // Create ripple effect
            const ripple = document.createElement('div');
            ripple.style.cssText = `
                position: absolute;
                top: 50%;
                left: 50%;
                width: 0;
                height: 0;
                background: radial-gradient(circle, rgba(249, 115, 22, 0.1), transparent);
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

    // Enhanced button interactions
    document.querySelectorAll('.btn-action').forEach(btn => {
        btn.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px) scale(1.05)';
        });
        
        btn.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
        
        btn.addEventListener('mousedown', function() {
            this.style.transform = 'translateY(0) scale(0.98)';
        });
        
        btn.addEventListener('mouseup', function() {
            this.style.transform = 'translateY(-2px) scale(1.05)';
        });
    });

    // Enhanced confirmation dialogs
    document.querySelectorAll('.btn-delete').forEach(deleteBtn => {
        deleteBtn.addEventListener('click', function(e) {
            const requestTitle = this.closest('.enhanced-row').querySelector('.request-title').textContent.trim();
            const confirmDelete = confirm(`⚠️ Are you sure you want to delete this request for "${requestTitle}"?\n\nThis action cannot be undone.`);
            if (!confirmDelete) {
                e.preventDefault();
                return false;
            }
            
            // Add loading animation
            this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Deleting...';
            this.style.pointerEvents = 'none';
        });
    });

    // Enhanced complete/reject button interactions
    document.querySelectorAll('.btn-complete, .btn-reject').forEach(actionBtn => {
        actionBtn.addEventListener('click', function(e) {
            const action = this.classList.contains('btn-complete') ? 'completed' : 'rejected';
            const icon = this.classList.contains('btn-complete') ? '✅' : '❌';
            
            // Add loading animation
            this.innerHTML = `<i class="fas fa-spinner fa-spin"></i> ${action.charAt(0).toUpperCase() + action.slice(1)}...`;
            this.style.pointerEvents = 'none';
        });
    });

    // Floating particles effect
    function createFloatingParticles() {
        const container = document.querySelector('.page-container');
        const particlesCount = 6;
        
        for (let i = 0; i < particlesCount; i++) {
            const particle = document.createElement('div');
            particle.style.cssText = `
                position: absolute;
                width: 3px;
                height: 3px;
                background: radial-gradient(circle, rgba(249, 115, 22, 0.4), transparent);
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

    // Enhanced status badge interactions
    document.querySelectorAll('.enhanced-status-badge').forEach(badge => {
        badge.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.1)';
        });
        
        badge.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    });

    // Enhanced poster image interactions
    document.querySelectorAll('.enhanced-request-poster').forEach(poster => {
        poster.addEventListener('error', function() {
            this.src = 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iODAiIGhlaWdodD0iMTIwIiB2aWV3Qm94PSIwIDAgODAgMTIwIiBmaWxsPSJub25lIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8cmVjdCB3aWR0aD0iODAiIGhlaWdodD0iMTIwIiBmaWxsPSIjMmEyYTJhIi8+CjxwYXRoIGQ9Ik00MCA2MEM0My4zMTM3IDYwIDQ2IDU3LjMxMzcgNDYgNTRDNDYgNTAuNjg2MyA0My4zMTM3IDQ4IDQwIDQ4QzM2LjY4NjMgNDggMzQgNTAuNjg2MyAzNCA1NEMzNCA1Ny4zMTM3IDM2LjY4NjMgNjAgNDAgNjBaIiBmaWxsPSIjNDA0MDQwIi8+CjxwYXRoIGQ9Ik0yOCA3MkgyOEM1Mi4yNzc4IDcyIDUyIDU5LjMxMzcgNTIgNTZINTJDNTIgNTkuMzEzNyA0OS4zMTM3IDYyIDQ2IDYySDM0QzMwLjY4NjMgNjIgMjggNTkuMzEzNyAyOCA1NlY3MloiIGZpbGw9IiM0MDQwNDAiLz4KPC9zdmc+';
            this.style.opacity = '0.5';
        });
    });

    console.log('Enhanced Requests Management interface loaded successfully! 🚀');
});
</script>
    
<?php require_once __DIR__ . '/partials/footer.php'; ?>