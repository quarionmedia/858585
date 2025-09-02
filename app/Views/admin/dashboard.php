<?php require_once __DIR__ . '/partials/header.php'; ?>

<style>
    /* Enhanced Dashboard with Rich Black-Gray Colors */
    :root {
        --primary-bg: #0a0a0a;
        --secondary-bg: #1a1a1a;
        --tertiary-bg: #2a2a2a;
        --accent-white: #ffffff;
        --accent-silver: #c0c0c0;
        --accent-gold: #ffd700;
        --accent-red: #ff4444;
        --accent-green: #00ff88;
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

    /* Dashboard Welcome Section */
    .dashboard-welcome {
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
    }

    .dashboard-welcome::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-1);
        border-radius: 20px 20px 0 0;
    }

    .dashboard-welcome::after {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.03), transparent);
        border-radius: 50%;
        pointer-events: none;
    }

    .welcome-header {
        display: flex;
        align-items: center;
        justify-content: between;
        margin-bottom: 16px;
        position: relative;
        z-index: 1;
    }

    .welcome-title {
        font-size: 32px;
        font-weight: 800;
        color: var(--text-primary);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 16px;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    }

    .welcome-subtitle {
        font-size: 18px;
        color: var(--text-secondary);
        margin: 0;
        line-height: 1.6;
        position: relative;
        z-index: 1;
    }

    .dashboard-time {
        font-size: 15px;
        color: var(--accent-silver);
        font-weight: 600;
        margin-top: 12px;
        position: relative;
        z-index: 1;
        text-shadow: 0 1px 4px rgba(0, 0, 0, 0.3);
    }

    /* Enhanced Stats Grid */
    .enhanced-stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 28px;
        margin-bottom: 44px;
    }

    .enhanced-stat-card {
        background: var(--secondary-bg);
        border: 1px solid var(--border-color);
        border-radius: 20px;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    }

    .enhanced-stat-card:hover {
        transform: translateY(-12px) scale(1.02);
        border-color: var(--border-hover);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
    }

    .enhanced-stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--card-gradient);
        opacity: 0;
        transition: all 0.4s ease;
    }

    .enhanced-stat-card:hover::before {
        opacity: 1;
        height: 6px;
    }

    .enhanced-stat-card.movies {
        --card-gradient: var(--gradient-3);
    }

    .enhanced-stat-card.series {
        --card-gradient: var(--gradient-1);
    }

    .stat-card-header {
        padding: 28px 28px 0 28px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .stat-icon-wrapper {
        width: 64px;
        height: 64px;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        color: white;
        background: var(--card-gradient);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
    }

    .enhanced-stat-card:hover .stat-icon-wrapper {
        transform: rotate(15deg) scale(1.1);
        box-shadow: 0 12px 32px rgba(0, 0, 0, 0.4);
    }

    .stat-trend {
        font-size: 13px;
        color: var(--success);
        font-weight: 700;
        background: rgba(16, 185, 129, 0.15);
        padding: 6px 12px;
        border-radius: 8px;
        border: 1px solid rgba(16, 185, 129, 0.3);
    }

    .stat-card-body {
        padding: 20px 28px 28px 28px;
    }

    .stat-category {
        font-size: 14px;
        color: var(--text-muted);
        text-transform: uppercase;
        letter-spacing: 1.2px;
        font-weight: 700;
        margin-bottom: 12px;
    }

    .stat-value {
        font-size: 44px;
        font-weight: 900;
        color: var(--text-primary);
        margin-bottom: 16px;
        line-height: 1;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    }

    .stat-description {
        font-size: 15px;
        color: var(--text-secondary);
        margin-bottom: 20px;
        line-height: 1.5;
    }

    .stat-action-link {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        color: var(--accent-gold);
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        transition: all 0.3s ease;
        padding: 10px 0;
        position: relative;
    }

    .stat-action-link::after {
        content: '';
        position: absolute;
        bottom: 8px;
        left: 0;
        width: 0;
        height: 2px;
        background: var(--accent-gold);
        transition: width 0.3s ease;
    }

    .stat-action-link:hover {
        gap: 16px;
        color: var(--accent-white);
    }

    .stat-action-link:hover::after {
        width: 100%;
        background: var(--accent-white);
    }

    /* Dashboard Content Grid */
    .dashboard-content-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 28px;
        margin-bottom: 32px;
    }

    /* Enhanced Chart Card */
    .enhanced-chart-card {
        background: var(--secondary-bg);
        border: 1px solid var(--border-color);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }

    .enhanced-chart-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.3);
    }

    .enhanced-chart-header {
        padding: 28px;
        border-bottom: 1px solid var(--border-color);
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: linear-gradient(135deg, var(--tertiary-bg), var(--secondary-bg));
    }

    .chart-title-section {
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .chart-icon {
        width: 48px;
        height: 48px;
        background: var(--gradient-2);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        color: white;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
    }

    .chart-title {
        font-size: 20px;
        font-weight: 700;
        color: var(--text-primary);
    }

    .chart-period {
        font-size: 13px;
        color: var(--accent-silver);
        background: rgba(192, 192, 192, 0.1);
        padding: 6px 12px;
        border-radius: 8px;
        border: 1px solid rgba(192, 192, 192, 0.2);
        font-weight: 600;
    }

    .enhanced-chart-content {
        padding: 28px;
        height: 340px;
        background: var(--secondary-bg);
    }

    /* Enhanced Sidebar Panels */
    .sidebar-panels {
        display: grid;
        gap: 28px;
    }

    .enhanced-panel {
        background: var(--secondary-bg);
        border: 1px solid var(--border-color);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }

    .enhanced-panel:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.3);
    }

    .enhanced-panel-header {
        padding: 24px 28px;
        border-bottom: 1px solid var(--border-color);
        display: flex;
        align-items: center;
        gap: 14px;
        background: linear-gradient(135deg, var(--tertiary-bg), var(--secondary-bg));
    }

    .panel-icon {
        width: 40px;
        height: 40px;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--accent-silver);
        font-size: 16px;
        transition: all 0.3s ease;
    }

    .enhanced-panel:hover .panel-icon {
        background: rgba(255, 255, 255, 0.1);
        transform: scale(1.1);
    }

    .panel-title {
        font-size: 18px;
        font-weight: 700;
        color: var(--text-primary);
    }

    .enhanced-panel-content {
        padding: 20px 28px 28px 28px;
        background: var(--secondary-bg);
    }

    /* Activity Items */
    .activity-list {
        display: grid;
        gap: 16px;
    }

    .activity-item {
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 16px;
        border-radius: 12px;
        transition: all 0.3s ease;
        border: 1px solid transparent;
    }

    .activity-item:hover {
        background: rgba(255, 255, 255, 0.05);
        border-color: rgba(255, 255, 255, 0.1);
        transform: translateX(4px);
    }

    .activity-item-icon {
        width: 40px;
        height: 40px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        color: white;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }

    .activity-item:hover .activity-item-icon {
        transform: scale(1.1);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.3);
    }

    .activity-item.movie .activity-item-icon {
        background: var(--gradient-3);
    }

    .activity-item.series .activity-item-icon {
        background: var(--gradient-1);
    }

    .activity-item.user .activity-item-icon {
        background: var(--gradient-2);
    }

    .activity-item-content {
        flex: 1;
    }

    .activity-item-title {
        font-size: 15px;
        color: var(--text-primary);
        font-weight: 600;
        margin-bottom: 4px;
    }

    .activity-item-time {
        font-size: 13px;
        color: var(--text-muted);
    }

    /* Quick Actions Grid */
    .quick-actions-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
    }

    .quick-action-btn {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        color: var(--accent-silver);
        padding: 20px 16px;
        border-radius: 16px;
        text-decoration: none;
        text-align: center;
        font-size: 14px;
        font-weight: 600;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 12px;
        position: relative;
        overflow: hidden;
    }

    .quick-action-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
        transition: left 0.5s ease;
    }

    .quick-action-btn:hover::before {
        left: 100%;
    }

    .quick-action-btn:hover {
        background: rgba(255, 255, 255, 0.1);
        transform: translateY(-4px) scale(1.02);
        border-color: rgba(255, 255, 255, 0.2);
        color: var(--accent-white);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.4);
    }

    .quick-action-btn i {
        font-size: 20px;
        transition: transform 0.3s ease;
    }

    .quick-action-btn:hover i {
        transform: scale(1.2);
    }

    /* Responsive Design */
    @media (max-width: 1200px) {
        .dashboard-content-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {
        .main-content {
            padding: 24px;
        }
        
        .enhanced-stats-grid {
            grid-template-columns: 1fr;
        }
        
        .welcome-title {
            font-size: 28px;
        }
        
        .quick-actions-grid {
            grid-template-columns: 1fr;
        }
        
        .dashboard-welcome {
            padding: 24px;
        }
        
        .stat-card-header,
        .stat-card-body,
        .enhanced-chart-header,
        .enhanced-chart-content,
        .enhanced-panel-header,
        .enhanced-panel-content {
            padding: 20px;
        }
    }

    /* Loading Animation */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .enhanced-stat-card,
    .enhanced-chart-card,
    .enhanced-panel {
        animation: fadeInUp 0.6s ease-out;
    }

    .enhanced-stat-card:nth-child(1) { animation-delay: 0.1s; }
    .enhanced-stat-card:nth-child(2) { animation-delay: 0.2s; }
    .enhanced-chart-card { animation-delay: 0.3s; }
    .enhanced-panel:nth-child(1) { animation-delay: 0.4s; }
    .enhanced-panel:nth-child(2) { animation-delay: 0.5s; }
</style>

<!-- Dashboard Welcome -->
<div class="dashboard-welcome">
    <div class="welcome-header">
        <h1 class="welcome-title">
            <i class="fas fa-film" style="color: var(--accent-silver);"></i>
            Welcome back Admin
        </h1>
    </div>
    <p class="welcome-subtitle">
        Monitor your movie and TV series platform performance, manage content, and track user engagement from your modern admin dashboard.
    </p>
    <div class="dashboard-time" id="currentTime">
        Loading...
    </div>
</div>

<!-- Enhanced Stats Grid -->
<div class="enhanced-stats-grid">
    <div class="enhanced-stat-card movies">
        <div class="stat-card-header">
            <div class="stat-icon-wrapper">
                <i class="fas fa-film"></i>
            </div>
            <div class="stat-trend">+12%</div>
        </div>
        <div class="stat-card-body">
            <div class="stat-category">Total Movies</div>
            <div class="stat-value"><?php echo $stats['movies'] ?? 0; ?></div>
            <div class="stat-description">Active movies in your library with premium quality</div>
            <a href="/admin/movies" class="stat-action-link">
                Manage Movies
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>

    <div class="enhanced-stat-card series">
        <div class="stat-card-header">
            <div class="stat-icon-wrapper">
                <i class="fas fa-tv"></i>
            </div>
            <div class="stat-trend">+8%</div>
        </div>
        <div class="stat-card-body">
            <div class="stat-category">Total Series</div>
            <div class="stat-value"><?php echo $stats['tv_shows'] ?? 0; ?></div>
            <div class="stat-description">TV series and web shows with latest episodes</div>
            <a href="/admin/tv-shows" class="stat-action-link">
                Manage Series
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</div>

<!-- Dashboard Content Grid -->
<div class="dashboard-content-grid">
    <!-- Chart Section -->
    <div class="enhanced-chart-card">
        <div class="enhanced-chart-header">
            <div class="chart-title-section">
                <div class="chart-icon">
                    <i class="fas fa-chart-pie"></i>
                </div>
                <div>
                    <div class="chart-title">User Analytics Overview</div>
                </div>
            </div>
            <div class="chart-period">Last 30 days</div>
        </div>
        <div class="enhanced-chart-content">
            <canvas id="userChartContainer"></canvas>
        </div>
    </div>

    <!-- Sidebar Panels -->
    <div class="sidebar-panels">
        <!-- Recent Activity -->
        <div class="enhanced-panel">
            <div class="enhanced-panel-header">
                <div class="panel-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="panel-title">Recent Activity</div>
            </div>
            <div class="enhanced-panel-content">
                <div class="activity-list">
                    <div class="activity-item movie">
                        <div class="activity-item-icon">
                            <i class="fas fa-plus"></i>
                        </div>
                        <div class="activity-item-content">
                            <div class="activity-item-title">New movie added to library</div>
                            <div class="activity-item-time">2 hours ago</div>
                        </div>
                    </div>
                    <div class="activity-item series">
                        <div class="activity-item-icon">
                            <i class="fas fa-edit"></i>
                        </div>
                        <div class="activity-item-content">
                            <div class="activity-item-title">TV series metadata updated</div>
                            <div class="activity-item-time">4 hours ago</div>
                        </div>
                    </div>
                    <div class="activity-item user">
                        <div class="activity-item-icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <div class="activity-item-content">
                            <div class="activity-item-title">New user registration</div>
                            <div class="activity-item-time">6 hours ago</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="enhanced-panel">
            <div class="enhanced-panel-header">
                <div class="panel-icon">
                    <i class="fas fa-bolt"></i>
                </div>
                <div class="panel-title">Quick Actions</div>
            </div>
            <div class="enhanced-panel-content">
                <div class="quick-actions-grid">
                    <a href="/admin/movies/add" class="quick-action-btn">
                        <i class="fas fa-plus"></i>
                        Add Movie
                    </a>
                    <a href="/admin/tv-shows/add" class="quick-action-btn">
                        <i class="fas fa-tv"></i>
                        Add Series
                    </a>
                    <a href="/admin/users" class="quick-action-btn">
                        <i class="fas fa-users"></i>
                        Manage Users
                    </a>
                    <a href="/admin/settings/general" class="quick-action-btn">
                        <i class="fas fa-cog"></i>
                        Settings
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Update current time
        function updateTime() {
            const now = new Date();
            const options = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            };
            document.getElementById('currentTime').textContent = now.toLocaleDateString('en-US', options);
        }
        
        updateTime();
        setInterval(updateTime, 60000);

        // Enhanced User Chart with new colors
        const ctx = document.getElementById('userChartContainer').getContext('2d');
        
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Registered Users', 'Guest Sessions', 'Active Today'],
                datasets: [{
                    data: [
                        <?php echo $stats['users'] ?? 0; ?>, 
                        Math.floor(Math.random() * 150) + 100,
                        Math.floor(Math.random() * 80) + 20
                    ],
                    backgroundColor: [
                        'rgba(255, 68, 68, 0.8)',
                        'rgba(255, 215, 0, 0.8)',
                        'rgba(0, 255, 136, 0.8)'
                    ],
                    borderColor: [
                        'rgba(255, 68, 68, 1)',
                        'rgba(255, 215, 0, 1)',
                        'rgba(0, 255, 136, 1)'
                    ],
                    borderWidth: 3,
                    hoverOffset: 15,
                    hoverBorderWidth: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            color: '#ffffff',
                            font: {
                                size: 14,
                                family: 'Inter',
                                weight: '600'
                            },
                            padding: 25,
                            usePointStyle: true,
                            pointStyle: 'circle'
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.95)',
                        titleColor: '#ffffff',
                        bodyColor: '#e0e0e0',
                        borderColor: '#404040',
                        borderWidth: 1,
                        cornerRadius: 12,
                        padding: 16,
                        titleFont: {
                            size: 15,
                            weight: '700'
                        },
                        bodyFont: {
                            size: 14,
                            weight: '500'
                        }
                    }
                },
                cutout: '68%',
                animation: {
                    animateRotate: true,
                    duration: 1500,
                    easing: 'easeOutCubic'
                }
            }
        });

        // Enhanced interaction effects
        document.querySelectorAll('.enhanced-stat-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.boxShadow = '0 25px 50px rgba(255, 255, 255, 0.1)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.2)';
            });
        });

        // Enhanced quick action effects
        document.querySelectorAll('.quick-action-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                this.style.transform = 'translateY(0px) scale(0.95)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 200);
            });
        });

        // Smooth scroll reveal animation
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe all animated elements
        document.querySelectorAll('.enhanced-stat-card, .enhanced-chart-card, .enhanced-panel').forEach(el => {
            observer.observe(el);
        });

        // Add floating particles effect
        function createFloatingParticles() {
            const container = document.querySelector('.main-content');
            const particlesCount = 8;
            
            for (let i = 0; i < particlesCount; i++) {
                const particle = document.createElement('div');
                particle.style.cssText = `
                    position: absolute;
                    width: 4px;
                    height: 4px;
                    background: radial-gradient(circle, rgba(255, 255, 255, 0.3), transparent);
                    border-radius: 50%;
                    pointer-events: none;
                    z-index: 0;
                    animation: float ${8 + Math.random() * 4}s ease-in-out infinite;
                    animation-delay: ${Math.random() * 4}s;
                    left: ${Math.random() * 100}%;
                    top: ${Math.random() * 100}%;
                `;
                container.appendChild(particle);
            }
        }

        // Add CSS animation for floating particles
        const style = document.createElement('style');
        style.textContent = `
            @keyframes float {
                0%, 100% {
                    transform: translateY(0px) rotate(0deg);
                    opacity: 0.4;
                }
                50% {
                    transform: translateY(-20px) rotate(180deg);
                    opacity: 0.8;
                }
            }
        `;
        document.head.appendChild(style);

        createFloatingParticles();

        // Enhanced card hover effects with sound-like visual feedback
        document.querySelectorAll('.enhanced-stat-card, .enhanced-panel, .enhanced-chart-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                // Create ripple effect
                const ripple = document.createElement('div');
                ripple.style.cssText = `
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    width: 0;
                    height: 0;
                    background: radial-gradient(circle, rgba(255, 255, 255, 0.1), transparent);
                    border-radius: 50%;
                    transform: translate(-50%, -50%);
                    pointer-events: none;
                    animation: ripple 0.6s ease-out;
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

        // Add ripple animation
        const rippleStyle = document.createElement('style');
        rippleStyle.textContent = `
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
        document.head.appendChild(rippleStyle);

        // Dynamic gradient rotation
        let gradientAngle = 0;
        setInterval(() => {
            gradientAngle += 1;
            document.querySelectorAll('.stat-icon-wrapper').forEach(icon => {
                icon.style.background = `conic-gradient(from ${gradientAngle}deg, var(--card-gradient))`;
            });
        }, 100);

        // Smooth counter animation for stat values
        function animateCounter(element, target) {
            let current = 0;
            const increment = target / 100;
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                element.textContent = Math.floor(current);
            }, 20);
        }

        // Initialize counter animations when elements come into view
        const statValues = document.querySelectorAll('.stat-value');
        statValues.forEach(stat => {
            const target = parseInt(stat.textContent) || 0;
            stat.textContent = '0';
            
            const statObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animateCounter(entry.target, target);
                        statObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });
            
            statObserver.observe(stat);
        });
    });
</script>

<?php require_once __DIR__ . '/partials/footer.php'; ?>