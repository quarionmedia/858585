<?php
// Session başlatma (eğer zaten başlatılmadıysa)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// helpers.php'deki view() fonksiyonu menüyü otomatik olarak çekecek
// English: This block acts as a "profile gate".
// It checks if a user is logged in but has not selected a profile yet.

// The pages that do NOT require a profile to be selected.
$allowed_uris = ['/login', '/register', '/logout', '/profiles', '/profiles/manage'];

// Check if the user is logged in AND has NOT selected a profile.
if (isset($_SESSION['user_id']) && !isset($_SESSION['profile_id'])) {
    
    // Check if the current page is NOT one of the allowed pages.
    $current_uri = strtok($_SERVER["REQUEST_URI"], '?');
    if (!in_array($current_uri, $allowed_uris) && strpos($current_uri, '/profiles/select') === false) {
        
        // If all conditions are met, redirect to the profile selection screen.
        header('Location: /profiles');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title><?php echo isset($title) ? $title . ' | ' . htmlspecialchars(setting('site_name', 'MuvixTV')) : htmlspecialchars(setting('site_name', 'MuvixTV')); ?></title>
    <link rel="icon" type="image/png" href="/assets/images/<?php echo htmlspecialchars(setting('favicon_path', 'favicon.png')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <style>
        /* Genel Resetleme ve Temel Stiller */
        body { margin: 0; font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; background-color: #070707; color: #d1d5db; }
        * { box-sizing: border-box; }
        a { color: #42ca1a; text-decoration: none; }
        a:hover { color: #86efac; }

        /* GÜNCELLENMIŞ: Ön Yüz Header Stilleri */
        .site-header {
            position: absolute; /* Yapışkan değil, sayfanın üstünde duracak */
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            padding: 20px 0;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0,0,0,0) 100%); /* Üstte hafif bir gölge */
        }
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 150%;
            max-width: 1700px;
            margin: 0 auto;
        }
        .header-left, .header-right {
            display: flex;
            align-items: center;
            gap: 30px;
        }
        .site-header .logo {
            font-size: 35px;
            font-weight: bold;
            text-decoration: none;
        }
        .main-nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 25px;
        }
        .main-nav a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
        }
        .header-actions {
            display: flex;
            align-items: center;
            gap: 25px;
        }
        
        /* YENİ: Tıklanabilir Arama Kutusu Stili */
        .search-box-link {
            display: flex;
            align-items: center;
            background: rgba(50, 50, 50, 0);
            border: 1px solid #555;
            border-radius: 20px;
            padding: 8px 15px;
            color: #aaa;
            text-decoration: none;
            transition: border-color 0.2s;
        }
        .search-box-link:hover {
            border-color: #42ca1a;
        }
        .search-box-link .fa-search {
            margin-right: 10px;
        }

        .header-actions .user-profile img {
            width: 32px;
            height: 32px;
            border-radius: 50%;
        }
        .sign-in-btn {
            background: linear-gradient(135deg, #42ca1a 0%, #36a715 100%);
            color: #fff;
            padding: 12px 25px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(66, 202, 26, 0.3);
            position: relative;
            overflow: hidden;
        }
        .sign-in-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        .sign-in-btn:hover::before {
            left: 100%;
        }
        .sign-in-btn:hover {
            background: linear-gradient(135deg, #36a715 0%, #2d8f12 100%);
            box-shadow: 0 6px 20px rgba(66, 202, 26, 0.4);
            transform: translateY(-2px);
            color: #fff;
        }
        .header-actions > a[href="/register"] {
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
            padding: 12px 20px;
            border-radius: 25px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.1);
        }
        .header-actions > a[href="/register"]:hover {
            color: #42ca1a;
            border-color: #42ca1a;
            background: rgba(66, 202, 26, 0.1);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(66, 202, 26, 0.2);
        }

        /* YENİ TASARIM: Discord/Slack Tarzı Modern Dropdown */
        .profile-dropdown {
            position: relative;
        }

        .profile-avatar {
            display: flex;
            align-items: center;
            cursor: pointer;
            padding: 4px;
            border-radius: 50px;
            transition: all 0.2s ease;
            background: linear-gradient(45deg, rgba(66, 202, 26, 0.1), rgba(66, 202, 26, 0.05));
            border: 2px solid transparent;
        }

        .profile-avatar:hover {
            border-color: rgba(66, 202, 26, 0.5);
            background: linear-gradient(45deg, rgba(66, 202, 26, 0.2), rgba(66, 202, 26, 0.1));
            box-shadow: 0 0 20px rgba(66, 202, 26, 0.3);
        }

        .profile-avatar img {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            transition: all 0.2s ease;
        }

        .profile-avatar:hover img {
            transform: scale(1.05);
        }

        .profile-avatar .fa-caret-down {
            color: #fff;
            font-size: 10px;
            margin-left: 8px;
            background: rgba(0,0,0,0.3);
            padding: 4px;
            border-radius: 50%;
            transition: all 0.2s ease;
        }

        .profile-dropdown.open .profile-avatar .fa-caret-down {
            transform: rotate(180deg);
            background: rgba(66, 202, 26, 0.8);
        }

        .dropdown-menu {
            position: absolute;
            top: calc(100% + 15px);
            right: 0;
            width: 260px;
            background: #1e1e1e;
            border-radius: 16px;
            box-shadow: 
                0 4px 6px -1px rgba(0, 0, 0, 0.1),
                0 2px 4px -1px rgba(0, 0, 0, 0.06),
                0 0 0 1px rgba(66, 202, 26, 0.1);
            opacity: 0;
            visibility: hidden;
            transform: translateY(-20px) scale(0.95);
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            z-index: 1001;
            overflow: hidden;
        }

        .profile-dropdown.open .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0) scale(1);
        }

        .dropdown-header {
            padding: 20px 20px 15px 20px;
            background: linear-gradient(135deg, rgba(66, 202, 26, 0.1) 0%, rgba(66, 202, 26, 0.05) 100%);
            border-bottom: 1px solid rgba(66, 202, 26, 0.2);
            display: flex;
            align-items: center;
            gap: 12px;
            position: relative;
        }

        .dropdown-header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 20px;
            right: 20px;
            height: 2px;
            background: linear-gradient(90deg, transparent, #42ca1a, transparent);
            border-radius: 1px;
        }

        .dropdown-header img {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            border: 3px solid rgba(66, 202, 26, 0.4);
        }

        .dropdown-header .user-info {
            flex: 1;
        }

        .dropdown-header .username {
            color: #fff;
            font-weight: 700;
            font-size: 15px;
            margin: 0 0 2px 0;
        }

        .dropdown-header .status {
            color: #42ca1a;
            font-size: 12px;
            font-weight: 500;
            opacity: 0.8;
        }

        .dropdown-section {
            padding: 8px 0;
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 20px;
            color: #b0b3b8;
            text-decoration: none;
            transition: all 0.2s ease;
            font-size: 14px;
            font-weight: 500;
            position: relative;
        }

        .dropdown-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            width: 4px;
            height: 0;
            background: #42ca1a;
            border-radius: 0 2px 2px 0;
            transition: height 0.2s ease;
            transform: translateY(-50%);
        }

        .dropdown-item:hover {
            background: rgba(66, 202, 26, 0.08);
            color: #42ca1a;
            padding-left: 30px;
        }

        .dropdown-item:hover::before {
            height: 20px;
        }

        .dropdown-item i {
            width: 20px;
            font-size: 15px;
            text-align: center;
            color: #6b7280;
            transition: all 0.2s ease;
        }

        .dropdown-item:hover i {
            color: #42ca1a;
            transform: scale(1.1);
        }

        .admin-link:hover {
            background: rgba(59, 130, 246, 0.08);
            color: #3b82f6;
        }

        .admin-link:hover::before {
            background: #3b82f6;
        }

        .admin-link:hover i {
            color: #3b82f6;
        }

        .logout-link {
            border-top: 1px solid rgba(75, 85, 99, 0.3);
            margin-top: 8px;
        }

        .logout-link:hover {
            background: rgba(239, 68, 68, 0.08);
            color: #ef4444;
        }

        .logout-link:hover::before {
            background: #ef4444;
        }

        .logout-link:hover i {
            color: #ef4444;
        }

        /* Online Status Indicator */
        .status-indicator {
            width: 12px;
            height: 12px;
            background: #42ca1a;
            border-radius: 50%;
            border: 2px solid #1e1e1e;
            position: absolute;
            bottom: 2px;
            right: 2px;
            animation: pulse-status 2s infinite;
        }

        @keyframes pulse-status {
            0% { box-shadow: 0 0 0 0 rgba(66, 202, 26, 0.4); }
            70% { box-shadow: 0 0 0 6px rgba(66, 202, 26, 0); }
            100% { box-shadow: 0 0 0 0 rgba(66, 202, 26, 0); }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .dropdown-menu {
                width: 240px;
                right: -5px;
            }
            
            .profile-avatar img {
                width: 38px;
                height: 38px;
            }
        }
    </style>
</head>
<body>

<header class="site-header" id="site-header">
    <div class="header-content">
        <div class="header-left">
            <a href="/" class="logo">
                <?php if (!empty(setting('logo_path'))): ?>
                    <img src="/assets/images/<?php echo htmlspecialchars(setting('logo_path')); ?>" alt="<?php echo htmlspecialchars(setting('site_name')); ?>" style="max-height: 40px;">
                <?php else: ?>
                    <?php echo htmlspecialchars(setting('site_name', 'MuvixTV')); ?>
                <?php endif; ?>
            </a>
            <nav class="main-nav">
                <ul>
                    <?php if (!empty($menuItems)): ?>
                        <?php foreach ($menuItems as $item): ?>
                            <li><a href="<?php echo htmlspecialchars($item['url']); ?>"><?php echo htmlspecialchars($item['title']); ?></a></li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li><a href="/">Home</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
        <div class="header-right">
            <div class="header-actions">
                <a href="/search" class="search-box-link">
                    <i class="fas fa-search"></i>
                    <span>Search Movies, Series...</span>
                </a>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <!-- Discord Tarzı Modern Profile Dropdown -->
<!-- Logged-in User Profile Dropdown -->
                    <div class="profile-dropdown">
                        <div class="profile-avatar" id="profile-avatar">
                            <div style="position: relative;">
                                <?php
                                    // English: Determine the avatar URL. Use the selected profile's avatar if available,
                                    // otherwise fall back to a generic avatar based on the main account username.
                                    $avatarUrl = isset($_SESSION['profile_avatar']) && !empty($_SESSION['profile_avatar'])
                                        ? htmlspecialchars($_SESSION['profile_avatar'])
                                        : 'https://ui-avatars.com/api/?name=' . urlencode($_SESSION['username'] ?? 'U') . '&background=random&color=fff';
                                ?>
                                <img src="<?php echo $avatarUrl; ?>" alt="User Avatar">
                                <div class="status-indicator"></div>
                            </div>
                            <i class="fas fa-caret-down"></i>
                        </div>
                        <div class="dropdown-menu" id="dropdown-menu">
                            <div class="dropdown-header">
                                <img src="<?php echo $avatarUrl; ?>" alt="User Avatar">
                                <div class="user-info">
                                    <div class="username"><?php echo htmlspecialchars($_SESSION['profile_name'] ?? $_SESSION['username'] ?? 'User'); ?></div>
                                    <div class="status">● Online</div>
                                </div>
                            </div>
                            
                            <div class="dropdown-section">
                                <?php if (!empty($_SESSION['is_admin'])): ?>
                                    <a href="/admin" class="dropdown-item admin-link">
                                        <i class="fas fa-crown"></i>
                                        <span>Admin Panel</span>
                                    </a>
                                <?php endif; ?>
                                <a href="/profiles" class="dropdown-item">
                                    <i class="fas fa-users"></i>
                                    <span>Switch Profile</span>
                                </a>
                                <a href="/watchlist" class="dropdown-item">
                                    <i class="fas fa-bookmark"></i>
                                    <span>My Watchlist</span>
                                </a>
                                <a href="/account" class="dropdown-item">
                                    <i class="fas fa-user-cog"></i>
                                    <span>Account Settings</span>
                                </a>
                            </div>
                            
                            <a href="/logout" class="dropdown-item logout-link">
                                <i class="fas fa-power-off"></i>
                                <span>Log Out</span>
                            </a>
                        </div>
                    </div>
                <?php else: ?>
                    <!-- Guest User Buttons (Original design preserved) -->
                    <a href="/login" class="sign-in-btn">Sign In</a>
                    <a href="/register">Register</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>

<!-- Modern JavaScript with Smooth Animations -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const avatar = document.getElementById('profile-avatar');
    const menu = document.getElementById('dropdown-menu');
    const dropdown = document.querySelector('.profile-dropdown');

    if (avatar && menu && dropdown) {
        // Smooth toggle with sound-like feedback
        avatar.addEventListener('click', function(event) {
            event.stopPropagation();
            
            // Add click feedback
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = 'scale(1)';
            }, 100);
            
            dropdown.classList.toggle('open');
        });

        // Close when clicking outside
        document.addEventListener('click', function(event) {
            if (!dropdown.contains(event.target)) {
                dropdown.classList.remove('open');
            }
        });

        // Close with Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                dropdown.classList.remove('open');
            }
        });

        // Add hover sound-like effect to dropdown items
        const items = dropdown.querySelectorAll('.dropdown-item');
        items.forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.style.transform = 'translateX(5px)';
            });
            
            item.addEventListener('mouseleave', function() {
                this.style.transform = 'translateX(0)';
            });
        });
    }
});
</script>