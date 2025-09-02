<?php require_once __DIR__ . '/partials/header.php'; ?>

<style>
    /* Enhanced Modern Reports List Page with Rich Black-Gray Colors */
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

    .page-container {
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
        overflow: hidden;
    }

    .page-container::before {
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
    .list-header {
        margin-bottom: 40px;
        padding: 32px;
        background: var(--secondary-bg);
        background-image: var(--gradient-6);
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
        background: var(--gradient-6);
        border-radius: 20px 20px 0 0;
    }

    .list-header::after {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(59, 130, 246, 0.08), transparent);
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
        background: var(--gradient-6);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        color: white;
        box-shadow: 0 4px 16px rgba(59, 130, 246, 0.3);
    }

    .list-divider {
        border: none;
        height: 2px;
        background: var(--gradient-6);
        margin: 32px 0;
        border-radius: 2px;
        box-shadow: 0 2px 8px rgba(59, 130, 246, 0.2);
    }

    /* Enhanced Table Container */
    .enhanced-table-container {
        display: flex;
        flex-direction: column;
        gap: 20px;
        position: relative;
        z-index: 1;
    }

    /* Enhanced Report Item */
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
        border-bottom: none;
    }

    .enhanced-row::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        background: var(--gradient-6);
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

    .enhanced-row:last-child {
        border-bottom: none;
    }

    /* Report Details Section */
    .enhanced-report-details {
        flex: 3;
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .enhanced-report-poster {
        width: 80px;
        height: 120px;
        object-fit: cover;
        border-radius: 12px;
        flex-shrink: 0;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4);
        border: 2px solid var(--border-color);
        transition: all 0.3s ease;
    }

    .enhanced-row:hover .enhanced-report-poster {
        transform: scale(1.05) rotate(-2deg);
        box-shadow: 0 12px 32px rgba(0, 0, 0, 0.5);
    }

    .enhanced-report-info {
        flex-grow: 1;
        min-width: 0;
    }

    .content-title {
        margin: 0 0 12px 0;
        font-size: 20px;
        font-weight: 700;
        color: var(--text-primary);
        line-height: 1.3;
    }

    .content-type {
        font-size: 0.8rem;
        color: var(--text-muted);
        margin-left: 0.5rem;
        background: var(--tertiary-bg);
        padding: 2px 8px;
        border-radius: 12px;
        border: 1px solid var(--border-color);
    }

    .reason {
        margin: 8px 0;
        font-size: 15px;
        color: var(--text-secondary);
        padding: 8px 12px;
        background: var(--tertiary-bg);
        border-radius: 8px;
        border-left: 4px solid var(--accent-red);
    }

    .reason strong {
        color: var(--accent-red);
    }

    .additional-info {
        font-size: 0.85rem;
        color: var(--text-muted);
        margin: 8px 0;
        background: var(--tertiary-bg);
        padding: 12px 16px;
        border-radius: 8px;
        border-left: 4px solid var(--accent-blue);
        line-height: 1.4;
    }

    .reporter-info {
        font-size: 14px;
        color: var(--text-muted);
        margin-top: 8px;
        padding: 8px 12px;
        background: var(--quaternary-bg);
        border-radius: 6px;
    }

    .reporter-info strong {
        color: var(--accent-silver);
    }

    .reporter-info small {
        color: var(--text-muted);
        font-size: 12px;
    }

    /* Status and Date Info */
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
        background: linear-gradient(135deg, var(--warning), #ffed4e);
        color: #000;
    }

    .status-resolved {
        background: linear-gradient(135deg, var(--success), #4ade80);
        color: #000;
    }

    /* Actions Section */
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

    .btn-resolve {
        background: linear-gradient(135deg, var(--accent-blue), #60a5fa);
        color: #fff;
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
    }

    .btn-resolve:hover {
        transform: translateY(-2px) scale(1.05);
        box-shadow: 0 6px 20px rgba(59, 130, 246, 0.4);
    }

    .btn-delete {
        background: linear-gradient(135deg, var(--accent-red), #f87171);
        color: #fff;
        box-shadow: 0 4px 12px rgba(255, 68, 68, 0.3);
    }

    .btn-delete:hover {
        transform: translateY(-2px) scale(1.05);
        box-shadow: 0 6px 20px rgba(255, 68, 68, 0.4);
    }

    /* No Results State */
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
        background: var(--gradient-6);
        opacity: 0.6;
    }

    .no-results::after {
        content: '📊';
        font-size: 64px;
        margin-bottom: 24px;
        color: var(--accent-blue);
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
        
        .enhanced-report-details {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        
        .enhanced-report-poster {
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

    @media (max-width: 480px) {
        .enhanced-report-poster {
            width: 100px;
            height: 150px;
        }
        
        .content-title {
            font-size: 18px;
        }
        
        .btn-action {
            padding: 8px 12px;
            font-size: 12px;
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

    .enhanced-row {
        animation: slideInUp 0.6s ease-out;
    }

    .enhanced-row:nth-child(1) { animation-delay: 0.1s; }
    .enhanced-row:nth-child(2) { animation-delay: 0.2s; }
    .enhanced-row:nth-child(3) { animation-delay: 0.3s; }
    .enhanced-row:nth-child(4) { animation-delay: 0.4s; }
    .enhanced-row:nth-child(5) { animation-delay: 0.5s; }

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

<main class="page-container">
    <!-- Enhanced Header Section -->
    <div class="list-header">
        <div class="list-header-content">
            <h1 class="page-title">
                <div class="list-title-icon">
                    <i class="fas fa-flag"></i>
                </div>
                Manage Reports
            </h1>
        </div>
    </div>
    
    <hr class="list-divider">

    <div class="enhanced-table-container">
        <?php if (!empty($reports)): ?>
            <?php foreach ($reports as $report): ?>
                <div class="enhanced-row">
                    <div class="enhanced-report-details">
                        <img src="https://image.tmdb.org/t/p/w200<?php echo htmlspecialchars($report['content_poster'] ?? ''); ?>" alt="Content Poster" class="enhanced-report-poster">
                        <div class="enhanced-report-info">
                            <div class="content-title">
                                <?php echo htmlspecialchars($report['content_title'] ?? 'Content not found'); ?>
                                <span class="content-type"><?php echo htmlspecialchars($report['content_type']); ?></span>
                            </div>
                            <div class="reason">Reason: <strong><?php echo htmlspecialchars($report['reason']); ?></strong></div>
                            
                            <!-- THE FIX IS HERE: Display the additional_info if it exists -->
                            <?php if (!empty($report['additional_info'])): ?>
                                <div class="additional-info">
                                    <?php echo htmlspecialchars($report['additional_info']); ?>
                                </div>
                            <?php endif; ?>

                            <div class="reporter-info">
                                Reported by:
                                <strong>
                                    <?php echo htmlspecialchars($report['username'] ?? 'N/A'); ?> 
                                    <small>(Profile: <?php echo htmlspecialchars($report['profile_name'] ?? 'N/A'); ?>)</small>
                                </strong>
                            </div>
                        </div>
                    </div>
                    <div class="status-info">
                        <span class="enhanced-status-badge status-<?php echo strtolower($report['status']); ?>">
                            <?php echo ucfirst($report['status']); ?>
                        </span>
                    </div>
                    <div class="date-info">
                        <?php echo date('M d, Y, H:i', strtotime($report['created_at'])); ?>
                    </div>
                    <div class="actions-info">
                        <div class="action-buttons">
                            <?php if ($report['status'] === 'pending'): ?>
                                <a href="/admin/reports/resolve/<?php echo $report['id']; ?>" class="btn-action btn-resolve">
                                    <i class="fas fa-check"></i>
                                    Resolve
                                </a>
                            <?php endif; ?>
                            <a href="/admin/reports/delete/<?php echo $report['id']; ?>" class="btn-action btn-delete" onclick="return confirm('Are you sure?');">
                                <i class="fas fa-trash"></i>
                                Delete
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="no-results">No reports found.</div>
        <?php endif; ?>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Enhanced report item interactions
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
                background: radial-gradient(circle, rgba(59, 130, 246, 0.1), transparent);
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
            const reportTitle = this.closest('.enhanced-row').querySelector('.content-title').textContent.trim();
            const confirmDelete = confirm(`⚠️ Are you sure you want to delete this report for "${reportTitle}"?\n\nThis action cannot be undone.`);
            if (!confirmDelete) {
                e.preventDefault();
                return false;
            }
            
            // Add loading animation
            this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Deleting...';
            this.style.pointerEvents = 'none';
        });
    });

    // Enhanced resolve button interactions
    document.querySelectorAll('.btn-resolve').forEach(resolveBtn => {
        resolveBtn.addEventListener('click', function(e) {
            // Add loading animation
            this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Resolving...';
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
                background: radial-gradient(circle, rgba(59, 130, 246, 0.4), transparent);
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
    document.querySelectorAll('.enhanced-report-poster').forEach(poster => {
        poster.addEventListener('error', function() {
            this.src = 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iODAiIGhlaWdodD0iMTIwIiB2aWV3Qm94PSIwIDAgODAgMTIwIiBmaWxsPSJub25lIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8cmVjdCB3aWR0aD0iODAiIGhlaWdodD0iMTIwIiBmaWxsPSIjMmEyYTJhIi8+CjxwYXRoIGQ9Ik00MCA2MEM0My4zMTM3IDYwIDQ2IDU3LjMxMzcgNDYgNTRDNDYgNTAuNjg2MyA0My4zMTM3IDQ4IDQwIDQ4QzM2LjY4NjMgNDggMzQgNTAuNjg2MyAzNCA1NEMzNCA1Ny4zMTM3IDM2LjY4NjMgNjAgNDAgNjBaIiBmaWxsPSIjNDA0MDQwIi8+CjxwYXRoIGQ9Ik0yOCA3MkgyOEM1Mi4yNzc4IDcyIDUyIDU5LjMxMzcgNTIgNTZINTJDNTIgNTkuMzEzNyA0OS4zMTM3IDYyIDQ2IDYySDM0QzMwLjY4NjMgNjIgMjggNTkuMzEzNyAyOCA1NlY3MloiIGZpbGw9IiM0MDQwNDAiLz4KPC9zdmc+';
            this.style.opacity = '0.5';
        });
    });
});
</script>
    
<?php require_once __DIR__ . '/partials/footer.php'; ?>