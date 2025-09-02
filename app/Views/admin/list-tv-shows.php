<?php require_once __DIR__ . '/partials/header.php'; ?>

<style>
    /* Enhanced Modern TV Shows List Page with Rich Black-Gray Colors */
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

    .main-content {
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

    .main-content::before {
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
        background-image: var(--gradient-5);
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
        background: var(--gradient-5);
        border-radius: 20px 20px 0 0;
    }

    .list-header::after {
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

    .list-header-content {
        position: relative;
        z-index: 1;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
    }

    .list-title-section h1 {
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
        background: var(--gradient-5);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        color: white;
        box-shadow: 0 4px 16px rgba(139, 92, 246, 0.3);
    }

    .add-new-link {
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
    }

    .add-new-link:hover {
        background: var(--accent-white);
        transform: translateY(-4px) scale(1.02);
        box-shadow: 0 12px 32px rgba(0, 255, 136, 0.4);
    }

    .list-divider {
        border: none;
        height: 2px;
        background: var(--gradient-5);
        margin: 32px 0;
        border-radius: 2px;
        box-shadow: 0 2px 8px rgba(139, 92, 246, 0.2);
    }

    /* Enhanced Content List */
    .enhanced-content-list {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .enhanced-content-item {
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

    .enhanced-content-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        background: var(--gradient-5);
        opacity: 0;
        transition: all 0.4s ease;
    }

    .enhanced-content-item:hover {
        background: var(--tertiary-bg);
        box-shadow: 0 12px 32px rgba(0, 0, 0, 0.3);
        border-color: var(--border-hover);
    }

    .enhanced-content-item:hover::before {
        opacity: 1;
    }

    .enhanced-content-poster {
        width: 80px;
        height: 120px;
        object-fit: cover;
        border-radius: 12px;
        flex-shrink: 0;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4);
        border: 2px solid var(--border-color);
        transition: all 0.3s ease;
    }

    .enhanced-content-item:hover .enhanced-content-poster {
        transform: scale(1.05) rotate(-2deg);
        box-shadow: 0 12px 32px rgba(0, 0, 0, 0.5);
    }

    .enhanced-content-info {
        flex-grow: 1;
        min-width: 0;
    }

    .enhanced-content-title {
        margin: 0 0 12px 0;
        font-size: 20px;
        font-weight: 700;
        color: var(--text-primary);
        line-height: 1.3;
        display: flex;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
    }

    .enhanced-content-description {
        margin: 0;
        font-size: 15px;
        color: var(--text-secondary);
        line-height: 1.5;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        padding: 12px 16px;
        background: var(--tertiary-bg);
        border-radius: 8px;
        border-left: 4px solid var(--accent-purple);
    }

    .enhanced-content-actions {
        position: relative;
        flex-shrink: 0;
    }

    .enhanced-options-btn {
        display: flex;
        align-items: center;
        gap: 8px;
        background: var(--tertiary-bg);
        background-image: var(--gradient-1);
        color: var(--text-primary);
        border: 1px solid var(--border-color);
        padding: 12px 20px;
        border-radius: 12px;
        cursor: pointer;
        font-weight: 600;
        font-size: 14px;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .enhanced-options-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }

    .enhanced-options-btn:hover::before {
        left: 100%;
    }

    .enhanced-options-btn:hover {
        background: var(--quaternary-bg);
        border-color: var(--border-hover);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
    }

    .enhanced-options-dropdown {
        display: none;
        position: fixed;
        background: var(--tertiary-bg);
        border: 2px solid var(--border-color);
        border-radius: 12px;
        z-index: 1000;
        min-width: 200px;
        padding: 8px 0;
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.4);
        backdrop-filter: blur(10px);
    }

    .enhanced-options-dropdown::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: var(--gradient-5);
        border-radius: 12px 12px 0 0;
    }

    .enhanced-options-dropdown a {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 20px;
        text-decoration: none;
        color: var(--text-secondary);
        font-size: 14px;
        font-weight: 600;
        transition: all 0.2s ease;
        border-bottom: 1px solid rgba(64, 64, 64, 0.3);
    }

    .enhanced-options-dropdown a:last-child {
        border-bottom: none;
    }

    .enhanced-options-dropdown a:hover {
        background: var(--quaternary-bg);
        color: var(--accent-gold);
        transform: translateX(4px);
    }

    .enhanced-options-dropdown a.delete {
        color: var(--accent-red);
    }

    .enhanced-options-dropdown a.delete:hover {
        color: var(--accent-white);
        background: var(--accent-red);
    }

    .enhanced-options-dropdown a i {
        width: 16px;
        text-align: center;
    }

    /* Enhanced Status Badge */
    .enhanced-status-badge {
        display: inline-block;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }

    .enhanced-status-badge.status-returning-series {
        background: var(--accent-green);
        color: var(--primary-bg);
        box-shadow: 0 2px 8px rgba(0, 255, 136, 0.3);
    }

    .enhanced-status-badge.status-ended,
    .enhanced-status-badge.status-canceled {
        background: var(--accent-red);
        color: var(--accent-white);
        box-shadow: 0 2px 8px rgba(255, 68, 68, 0.3);
    }

    .enhanced-status-badge.status-default {
        background: var(--accent-silver);
        color: var(--primary-bg);
        box-shadow: 0 2px 8px rgba(192, 192, 192, 0.3);
    }

    /* No Data State */
    .no-shows-state {
        text-align: center;
        padding: 80px 32px;
        background: var(--secondary-bg);
        border: 1px solid var(--border-color);
        border-radius: 20px;
        margin-top: 32px;
        position: relative;
        overflow: hidden;
    }

    .no-shows-state::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-5);
        opacity: 0.6;
    }

    .no-shows-state i {
        font-size: 64px;
        margin-bottom: 24px;
        color: var(--accent-purple);
        opacity: 0.8;
        animation: float 3s ease-in-out infinite alternate;
    }

    .no-shows-state h3 {
        font-size: 28px;
        font-weight: 700;
        color: var(--text-primary);
        margin: 0 0 16px 0;
    }

    .no-shows-state p {
        font-size: 16px;
        color: var(--text-muted);
        margin: 0;
        max-width: 400px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .enhanced-content-item {
            flex-direction: column;
            align-items: stretch;
            text-align: center;
        }
        
        .enhanced-content-poster {
            width: 120px;
            height: 180px;
            align-self: center;
        }
        
        .enhanced-content-actions {
            margin-top: 16px;
            align-self: center;
        }
    }

    @media (max-width: 768px) {
        .main-content {
            padding: 20px;
        }
        
        .list-header {
            padding: 20px;
        }
        
        .list-header-content {
            flex-direction: column;
            align-items: stretch;
        }
        
        .list-title-section h1 {
            font-size: 24px;
            justify-content: center;
        }
        
        .enhanced-content-item {
            padding: 16px;
            gap: 16px;
        }
        
        .enhanced-content-description {
            -webkit-line-clamp: 2;
        }
        
        .enhanced-content-title {
            flex-direction: column;
            align-items: flex-start;
            gap: 8px;
        }
    }

    @media (max-width: 480px) {
        .enhanced-options-dropdown {
            min-width: 160px;
        }
        
        .enhanced-content-poster {
            width: 100px;
            height: 150px;
        }
        
        .enhanced-content-title {
            font-size: 18px;
        }
        
        .enhanced-content-description {
            font-size: 14px;
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

    .enhanced-content-item {
        animation: slideInUp 0.6s ease-out;
    }

    .enhanced-content-item:nth-child(1) { animation-delay: 0.1s; }
    .enhanced-content-item:nth-child(2) { animation-delay: 0.2s; }
    .enhanced-content-item:nth-child(3) { animation-delay: 0.3s; }
    .enhanced-content-item:nth-child(4) { animation-delay: 0.4s; }
    .enhanced-content-item:nth-child(5) { animation-delay: 0.5s; }

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

<main class="main-content">
    <!-- Enhanced Header Section -->
    <div class="list-header">
        <div class="list-header-content">
            <div class="list-title-section">
                <h1>
                    <div class="list-title-icon">
                        <i class="fas fa-tv"></i>
                    </div>
                    Manage TV Shows
                </h1>
            </div>
            <a href="/admin/tv-shows/add" class="add-new-link">
                <i class="fas fa-plus"></i>
                Add New TV Show
            </a>
        </div>
    </div>
    
    <hr class="list-divider">
    
    <!-- Enhanced Content List -->
    <div class="enhanced-content-list">
        <?php if (!empty($tvShows)): ?>
            <?php foreach ($tvShows as $show): ?>
                <div class="enhanced-content-item">
                    <img src="https://image.tmdb.org/t/p/w200<?php echo $show['poster_path']; ?>" alt="TV Show Poster" class="enhanced-content-poster">
                    
                    <div class="enhanced-content-info">
                        <h3 class="enhanced-content-title">
                            <?php echo htmlspecialchars($show['title']); ?>
                            
                            <?php 
                            $status = strtolower(str_replace(' ', '-', $show['status'] ?? ''));
                            $statusClass = 'status-default';
                            if ($status == 'returning-series') { $statusClass = 'status-returning-series'; }
                            elseif ($status == 'ended' || $status == 'canceled') { $statusClass = 'status-ended'; }
                            ?>
                            <span class="enhanced-status-badge <?php echo $statusClass; ?>"><?php echo htmlspecialchars($show['status']); ?></span>
                        </h3>
                        <p class="enhanced-content-description"><?php echo htmlspecialchars(substr($show['overview'], 0, 200)); ?>...</p>
                    </div>
                    
                    <div class="enhanced-content-actions">
                        <button type="button" class="enhanced-options-btn" onclick="toggleDropdown(this)">
                            <i class="fas fa-cog"></i>
                            Options
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="enhanced-options-dropdown">
                            <a href="/admin/tv-shows/edit/<?php echo $show['id']; ?>">
                                <i class="fas fa-edit"></i>
                                Edit TV Show
                            </a>
                            <a href="/admin/manage-seasons/<?php echo $show['id']; ?>">
                                <i class="fas fa-list"></i>
                                Manage Seasons
                            </a>
                            <a href="#">
                                <i class="fas fa-envelope"></i>
                                Send Email Notification
                            </a>
                            <a href="/admin/tv-shows/delete/<?php echo $show['id']; ?>" onclick="return confirm('Are you sure you want to delete this TV show?');" class="delete">
                                <i class="fas fa-trash"></i>
                                Delete
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="no-shows-state">
                <i class="fas fa-tv"></i>
                <h3>No TV Shows Found</h3>
                <p>Start building your TV show collection by adding your first series to the platform.</p>
            </div>
        <?php endif; ?>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Enhanced dropdown functionality
    function toggleDropdown(button) {
        var parent = button.parentElement;
        var dropdown = button.nextElementSibling;
        var wasOpen = dropdown.style.display === 'block';
        
        // Close all other open dropdowns
        document.querySelectorAll('.enhanced-content-actions').forEach(function(action) {
            if (action !== parent) {
                action.querySelector('.enhanced-options-dropdown').style.display = 'none';
            }
        });
        
        if (!wasOpen) {
            var btnRect = button.getBoundingClientRect();
            dropdown.style.display = 'block';
            dropdown.style.position = 'fixed';
            dropdown.style.top = (btnRect.bottom + 5) + 'px';
            dropdown.style.left = (btnRect.right - dropdown.offsetWidth) + 'px';
            
            // Add animation
            dropdown.style.opacity = '0';
            dropdown.style.transform = 'translateY(-10px)';
            setTimeout(() => {
                dropdown.style.transition = 'all 0.3s ease';
                dropdown.style.opacity = '1';
                dropdown.style.transform = 'translateY(0)';
            }, 10);
        } else {
            dropdown.style.display = 'none';
        }
    }
    
    // Make toggleDropdown globally available
    window.toggleDropdown = toggleDropdown;

    // Close dropdowns if clicking outside
    window.onclick = function(event) {
        if (!event.target.matches('.enhanced-options-btn') && !event.target.closest('.enhanced-options-btn')) {
            document.querySelectorAll('.enhanced-options-dropdown').forEach(function(dropdown) {
                dropdown.style.display = 'none';
            });
        }
    }

    // Enhanced content item interactions
    document.querySelectorAll('.enhanced-content-item').forEach(item => {
        item.addEventListener('mouseenter', function() {
            // Create ripple effect
            const ripple = document.createElement('div');
            ripple.style.cssText = `
                position: absolute;
                top: 50%;
                left: 50%;
                width: 0;
                height: 0;
                background: radial-gradient(circle, rgba(139, 92, 246, 0.1), transparent);
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
    document.querySelectorAll('.enhanced-options-btn, .add-new-link').forEach(btn => {
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

    // Enhanced confirmation dialogs
    document.querySelectorAll('.enhanced-options-dropdown a.delete').forEach(deleteBtn => {
        deleteBtn.addEventListener('click', function(e) {
            const showTitle = this.closest('.enhanced-content-item').querySelector('.enhanced-content-title').textContent.trim();
            const confirmDelete = confirm(`⚠️ Are you sure you want to delete "${showTitle}"?\n\nThis action cannot be undone and will remove all associated data including seasons and episodes.`);
            if (!confirmDelete) {
                e.preventDefault();
                return false;
            }
            
            // Add loading animation
            this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Deleting...';
            this.style.pointerEvents = 'none';
        });
    });

    // Enhanced status badge hover effects
    document.querySelectorAll('.enhanced-status-badge').forEach(badge => {
        badge.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.1) translateY(-2px)';
        });
        
        badge.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1) translateY(0)';
        });
    });

    // Floating particles effect
    function createFloatingParticles() {
        const container = document.querySelector('.main-content');
        const particlesCount = 6;
        
        for (let i = 0; i < particlesCount; i++) {
            const particle = document.createElement('div');
            particle.style.cssText = `
                position: absolute;
                width: 3px;
                height: 3px;
                background: radial-gradient(circle, rgba(139, 92, 246, 0.4), transparent);
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

    // Enhanced dropdown menu interactions
    document.querySelectorAll('.enhanced-options-dropdown a').forEach(link => {
        link.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(8px)';
        });
        
        link.addEventListener('mouseleave', function() {
            this.style.transform = 'translateX(4px)';
        });
    });
});
</script>
    
<?php require_once __DIR__ . '/partials/footer.php'; ?>