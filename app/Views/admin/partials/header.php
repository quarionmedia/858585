<?php
// TarayÄ±cÄ±nÄ±n admin sayfalarÄ±nÄ± cache'lemesini (Ã¶nbelleÄŸe almasÄ±nÄ±) engelle
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Session baÅŸlatma (eÄŸer zaten baÅŸlatÄ±lmadÄ±ysa)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title><?php echo isset($title) ? $title . ' | ' . htmlspecialchars(setting('site_name', 'MuvixTV')) . ' Admin' : htmlspecialchars(setting('site_name', 'MuvixTV')) . ' Admin'; ?></title>
    <link rel="icon" type="image/png" href="/assets/images/<?php echo htmlspecialchars(setting('favicon_path', 'favicon.png')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/admin-style.css">
    
    <style>
        /* Premium Admin Dashboard - Ultra Modern Design */
        :root {
            --primary-bg: #0a0a0a;
            --secondary-bg: #111111;
            --tertiary-bg: #1a1a1a;
            --quaternary-bg: #222222;
            --surface-elevated: #2a2a2a;
            --accent-white: #ffffff;
            --accent-gold: #f59e0b;
            --accent-gold-light: #fbbf24;
            --accent-gold-dark: #d97706;
            --accent-red: #ef4444;
            --accent-green: #10b981;
            --accent-blue: #3b82f6;
            --accent-purple: #8b5cf6;
            --text-primary: #ffffff;
            --text-secondary: #e5e5e5;
            --text-muted: #a3a3a3;
            --text-subtle: #737373;
            --border-primary: #333333;
            --border-secondary: #404040;
            --border-accent: #525252;
            --shadow-subtle: 0 1px 3px rgba(0, 0, 0, 0.1);
            --shadow-medium: 0 4px 6px rgba(0, 0, 0, 0.1);
            --shadow-large: 0 10px 15px rgba(0, 0, 0, 0.1);
            --shadow-xl: 0 20px 25px rgba(0, 0, 0, 0.1);
            --blur-backdrop: blur(12px);
            --radius-sm: 6px;
            --radius-md: 8px;
            --radius-lg: 12px;
            --radius-xl: 16px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', sans-serif;
            background: var(--primary-bg);
            color: var(--text-primary);
            overflow-x: hidden;
            line-height: 1.5;
            font-weight: 400;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .admin-wrapper {
            display: flex;
            min-height: 100vh;
            background: var(--primary-bg);
            position: relative;
        }

        /* Premium Sidebar */
        .sidebar {
            width: 280px;
            background: var(--secondary-bg);
            background-image: 
                linear-gradient(135deg, rgba(17, 17, 17, 0.8) 0%, rgba(26, 26, 26, 0.9) 100%),
                radial-gradient(circle at 20% 80%, rgba(245, 158, 11, 0.03) 0%, transparent 60%);
            border-right: 1px solid var(--border-primary);
            position: fixed;
            left: 0;
            top: 0;
            height: 100vh;
            overflow-y: auto;
            z-index: 1000;
            transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
            backdrop-filter: var(--blur-backdrop);
        }

        .sidebar::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 1px;
            height: 100%;
            background: linear-gradient(180deg, transparent, rgba(245, 158, 11, 0.2), transparent);
            opacity: 0.6;
        }

        .sidebar::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, var(--accent-gold), var(--accent-gold-dark));
            border-radius: 2px;
        }

        /* Premium Sidebar Logo */
        .sidebar-logo {
            padding: 28px 24px;
            border-bottom: 1px solid var(--border-primary);
            background: linear-gradient(135deg, var(--tertiary-bg) 0%, var(--secondary-bg) 100%);
            position: relative;
            overflow: hidden;
        }

        .sidebar-logo::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 24px;
            right: 24px;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--accent-gold), transparent);
            opacity: 0.4;
        }

        .sidebar-logo a {
            color: var(--text-primary);
            text-decoration: none;
            font-size: 20px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 14px;
            transition: all 0.3s cubic-bezier(0.23, 1, 0.32, 1);
            letter-spacing: -0.02em;
        }

        .sidebar-logo a:hover {
            color: var(--accent-gold);
            transform: translateX(2px);
        }

        .sidebar-logo a i {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--accent-gold), var(--accent-gold-light));
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-bg);
            font-size: 18px;
            box-shadow: 0 4px 12px rgba(245, 158, 11, 0.25);
        }

        /* Premium Navigation */
        .sidebar-nav {
            padding: 32px 0;
        }

        .sidebar-nav > p {
            color: var(--text-subtle);
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            padding: 0 24px 16px 24px;
            margin-top: 32px;
            position: relative;
        }

        .sidebar-nav > p:first-child {
            margin-top: 0;
        }

        .sidebar-nav > p::after {
            content: '';
            position: absolute;
            bottom: 8px;
            left: 24px;
            width: 24px;
            height: 1px;
            background: linear-gradient(90deg, var(--accent-gold), transparent);
            opacity: 0.6;
        }

        .sidebar-nav ul {
            list-style: none;
            margin-bottom: 24px;
        }

        /* Premium Menu Items */
        .sidebar-nav > ul > li > a {
            display: flex;
            align-items: center;
            padding: 14px 24px;
            color: var(--text-secondary);
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
            transition: all 0.3s cubic-bezier(0.23, 1, 0.32, 1);
            border-left: 2px solid transparent;
            position: relative;
            margin: 2px 0;
        }

        .sidebar-nav > ul > li > a::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 0;
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.1), rgba(245, 158, 11, 0.05));
            transition: width 0.4s cubic-bezier(0.23, 1, 0.32, 1);
            border-radius: 0 var(--radius-md) var(--radius-md) 0;
        }

        .sidebar-nav > ul > li > a:hover::before {
            width: 100%;
        }

        .sidebar-nav > ul > li > a:hover {
            color: var(--text-primary);
            background: rgba(245, 158, 11, 0.05);
            border-left-color: var(--accent-gold);
            transform: translateX(6px);
        }

        .sidebar-nav > ul > li > a i {
            width: 18px;
            text-align: center;
            margin-right: 12px;
            transition: all 0.3s cubic-bezier(0.23, 1, 0.32, 1);
            opacity: 0.8;
        }

        .sidebar-nav > ul > li > a:hover i {
            color: var(--accent-gold);
            opacity: 1;
            transform: scale(1.1);
        }

        /* Menu with Children */
        .menu-item-has-children > a::after {
            content: '';
            width: 6px;
            height: 6px;
            border-right: 1.5px solid var(--text-muted);
            border-bottom: 1.5px solid var(--text-muted);
            transform: rotate(-45deg);
            margin-left: auto;
            transition: all 0.3s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .menu-item-has-children.active > a::after {
            transform: rotate(45deg);
            border-color: var(--accent-gold);
        }

        .menu-item-has-children.active > a {
            color: var(--text-primary);
            background: rgba(245, 158, 11, 0.08);
            border-left-color: var(--accent-gold);
        }

        /* Premium Submenu - Completely Redesigned */
        .sub-menu {
            max-height: 0;
            overflow: hidden;
            background: linear-gradient(135deg, rgba(26, 26, 26, 0.95) 0%, rgba(34, 34, 34, 0.98) 100%);
            transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
            margin: 8px 16px 0 20px;
            border-radius: var(--radius-lg);
            backdrop-filter: blur(12px);
            border: 1px solid var(--border-primary);
            position: relative;
            box-shadow: var(--shadow-large);
        }

        .sub-menu::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, rgba(245, 158, 11, 0.4), transparent);
            border-radius: var(--radius-lg) var(--radius-lg) 0 0;
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .sub-menu::after {
            content: '';
            position: absolute;
            top: -8px;
            left: 28px;
            width: 0;
            height: 0;
            border-left: 6px solid transparent;
            border-right: 6px solid transparent;
            border-bottom: 8px solid rgba(26, 26, 26, 0.95);
            opacity: 0;
            transition: opacity 0.4s ease 0.2s;
        }

        .menu-item-has-children.active .sub-menu {
            max-height: 400px;
            padding: 12px 8px;
            margin-top: 12px;
            box-shadow: 
                var(--shadow-xl),
                inset 0 1px 0 rgba(245, 158, 11, 0.15),
                0 0 0 1px rgba(245, 158, 11, 0.1);
        }

        .menu-item-has-children.active .sub-menu::before,
        .menu-item-has-children.active .sub-menu::after {
            opacity: 1;
        }

        .sub-menu li {
            margin: 3px 0;
            transform: translateX(-20px);
            opacity: 0;
            transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .menu-item-has-children.active .sub-menu li {
            transform: translateX(0);
            opacity: 1;
        }

        .menu-item-has-children.active .sub-menu li:nth-child(1) {
            transition-delay: 0.1s;
        }

        .menu-item-has-children.active .sub-menu li:nth-child(2) {
            transition-delay: 0.15s;
        }

        .menu-item-has-children.active .sub-menu li:nth-child(3) {
            transition-delay: 0.2s;
        }

        .menu-item-has-children.active .sub-menu li:nth-child(4) {
            transition-delay: 0.25s;
        }

        .sub-menu li a {
            display: flex;
            align-items: center;
            padding: 12px 16px;
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            transition: all 0.3s cubic-bezier(0.23, 1, 0.32, 1);
            border-radius: var(--radius-md);
            margin: 0 4px;
            position: relative;
            overflow: hidden;
            background: transparent;
            border: 1px solid transparent;
        }

        .sub-menu li a::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 0;
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.15), rgba(245, 158, 11, 0.08));
            transition: width 0.4s cubic-bezier(0.23, 1, 0.32, 1);
            border-radius: var(--radius-md) 0 0 var(--radius-md);
        }

        .sub-menu li a::after {
            content: '';
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 4px;
            background: var(--accent-gold);
            border-radius: 50%;
            opacity: 0;
            transition: all 0.3s cubic-bezier(0.23, 1, 0.32, 1);
            box-shadow: 0 0 6px rgba(245, 158, 11, 0.4);
        }

        .sub-menu li a:hover {
            color: var(--text-primary);
            background: rgba(245, 158, 11, 0.08);
            border-color: rgba(245, 158, 11, 0.2);
            transform: translateX(8px) scale(1.02);
            box-shadow: 
                0 4px 12px rgba(0, 0, 0, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            padding-left: 28px;
        }

        .sub-menu li a:hover::before {
            width: 100%;
        }

        .sub-menu li a:hover::after {
            opacity: 1;
            transform: translateY(-50%) scale(1.2);
            left: 16px;
        }

        .sub-menu li a:active {
            transform: translateX(8px) scale(0.98);
            background: rgba(245, 158, 11, 0.12);
        }

        /* Add subtle glow effect on hover */
        .menu-item-has-children.active:hover .sub-menu {
            box-shadow: 
                var(--shadow-xl),
                0 0 20px rgba(245, 158, 11, 0.1),
                inset 0 1px 0 rgba(245, 158, 11, 0.2);
        }

        /* Enhanced parent menu item when submenu is active */
        .menu-item-has-children.active > a {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.12), rgba(245, 158, 11, 0.08));
            border-left-color: var(--accent-gold);
            box-shadow: inset 0 1px 0 rgba(245, 158, 11, 0.2);
        }

        .menu-item-has-children.active > a i {
            color: var(--accent-gold);
            filter: drop-shadow(0 0 4px rgba(245, 158, 11, 0.3));
        }

        /* Content Wrapper */
        .content-wrapper {
            flex: 1;
            margin-left: 280px;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Premium Top Header */
        .top-header {
            background: rgba(17, 17, 17, 0.95);
            backdrop-filter: var(--blur-backdrop);
            border-bottom: 1px solid var(--border-primary);
            padding: 0 32px;
            height: 72px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 999;
            box-shadow: var(--shadow-medium);
        }

        .top-header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(245, 158, 11, 0.3), transparent);
        }

        .header-left,
        .header-right {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        /* Premium Buttons */
        .header-dropdown-button {
            background: linear-gradient(135deg, var(--tertiary-bg), var(--quaternary-bg));
            border: 1px solid var(--border-secondary);
            color: var(--text-secondary);
            padding: 12px 20px;
            border-radius: var(--radius-md);
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.23, 1, 0.32, 1);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow-subtle);
            letter-spacing: -0.01em;
        }

        .header-dropdown-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.08), transparent);
            transition: left 0.6s ease;
        }

        .header-dropdown-button:hover::before {
            left: 100%;
        }

        .header-dropdown-button:hover {
            background: linear-gradient(135deg, var(--quaternary-bg), var(--surface-elevated));
            border-color: var(--border-accent);
            color: var(--text-primary);
            transform: translateY(-1px);
            box-shadow: var(--shadow-large);
        }

        .header-dropdown-button:active {
            transform: translateY(0);
            box-shadow: var(--shadow-subtle);
        }

        /* Premium Dropdowns */
        .header-dropdown {
            position: relative;
        }

        .header-dropdown-content {
            position: absolute;
            top: calc(100% + 12px);
            left: 0;
            background: var(--tertiary-bg);
            background-image: linear-gradient(135deg, var(--tertiary-bg) 0%, var(--quaternary-bg) 100%);
            border: 1px solid var(--border-secondary);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-xl);
            z-index: 1001;
            min-width: 180px;
            padding: 8px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-12px) scale(0.95);
            transition: all 0.3s cubic-bezier(0.23, 1, 0.32, 1);
            backdrop-filter: var(--blur-backdrop);
        }

        .header-dropdown:hover .header-dropdown-content {
            opacity: 1;
            visibility: visible;
            transform: translateY(0) scale(1);
        }

        .header-dropdown-content::before {
            content: '';
            position: absolute;
            top: -6px;
            left: 20px;
            width: 12px;
            height: 12px;
            background: var(--tertiary-bg);
            border: 1px solid var(--border-secondary);
            border-bottom: none;
            border-right: none;
            transform: rotate(45deg);
            border-radius: 2px 0 0 0;
        }

        .header-dropdown-content a {
            display: block;
            padding: 10px 16px;
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 13px;
            font-weight: 400;
            border-radius: var(--radius-sm);
            transition: all 0.3s cubic-bezier(0.23, 1, 0.32, 1);
            position: relative;
            overflow: hidden;
        }

        .header-dropdown-content a::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 0;
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.15), rgba(245, 158, 11, 0.05));
            transition: width 0.3s cubic-bezier(0.23, 1, 0.32, 1);
            border-radius: 0 var(--radius-sm) var(--radius-sm) 0;
        }

        .header-dropdown-content a:hover::before {
            width: 100%;
        }

        .header-dropdown-content a:hover {
            background: rgba(245, 158, 11, 0.08);
            color: var(--text-primary);
            transform: translateX(6px);
        }

        .header-dropdown-content a[style*="color: #ff4d4d"] {
            color: var(--accent-red) !important;
        }

        .header-dropdown-content a[style*="color: #ff4d4d"]:hover {
            background: rgba(239, 68, 68, 0.1);
        }

        .header-dropdown-content a[style*="color: #ff4d4d"]:hover::before {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.15), rgba(239, 68, 68, 0.05));
        }

        /* Premium Icon Buttons */
        .search-icon,
        .header-icon {
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, var(--tertiary-bg), var(--quaternary-bg));
            border: 1px solid var(--border-secondary);
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-secondary);
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.23, 1, 0.32, 1);
            cursor: pointer;
            font-size: 15px;
            box-shadow: var(--shadow-subtle);
            position: relative;
            overflow: hidden;
        }

        .search-icon::before,
        .header-icon::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.08), transparent);
            transition: left 0.6s ease;
        }

        .search-icon:hover::before,
        .header-icon:hover::before {
            left: 100%;
        }

        .search-icon:hover,
        .header-icon:hover {
            background: linear-gradient(135deg, var(--quaternary-bg), var(--surface-elevated));
            border-color: var(--border-accent);
            color: var(--text-primary);
            transform: translateY(-2px);
            box-shadow: var(--shadow-large);
        }

        .search-icon:active,
        .header-icon:active {
            transform: translateY(0);
            box-shadow: var(--shadow-subtle);
        }

        /* Premium User Dropdown */
        #user-dropdown .header-dropdown-button {
            padding: 6px;
            background: linear-gradient(135deg, var(--accent-gold), var(--accent-gold-light));
            border-color: var(--accent-gold-dark);
            box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
        }

        #user-dropdown .header-dropdown-button:hover {
            background: linear-gradient(135deg, var(--accent-gold-light), var(--accent-gold));
            box-shadow: 0 8px 20px rgba(245, 158, 11, 0.4);
        }

        #user-dropdown .header-dropdown-button img {
            width: 32px;
            height: 32px;
            border-radius: var(--radius-sm);
            border: 2px solid rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        #user-dropdown .header-dropdown-content {
            right: 0;
            left: auto;
        }

        #user-dropdown .header-dropdown-content::before {
            left: auto;
            right: 20px;
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .sidebar {
                width: 260px;
            }
            .content-wrapper {
                margin-left: 260px;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                width: 280px;
                box-shadow: none;
            }
            
            .content-wrapper {
                margin-left: 0;
            }
            
            .top-header {
                padding: 0 16px;
                height: 64px;
            }
            
            .header-left,
            .header-right {
                gap: 12px;
            }
            
            .header-dropdown-button {
                padding: 10px 16px;
                font-size: 12px;
            }
            
            .search-icon,
            .header-icon {
                width: 40px;
                height: 40px;
                font-size: 14px;
            }
        }

        /* Focus States */
        .header-dropdown-button:focus-visible,
        .search-icon:focus-visible,
        .header-icon:focus-visible,
        .sidebar-nav a:focus-visible {
            outline: 2px solid var(--accent-gold);
            outline-offset: 2px;
        }

        /* Loading Animation */
        .loading {
            position: relative;
            pointer-events: none;
            opacity: 0.7;
        }

        .loading::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 14px;
            height: 14px;
            border: 2px solid transparent;
            border-top: 2px solid var(--accent-gold);
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin {
            to { transform: translate(-50%, -50%) rotate(360deg); }
        }

        /* Entrance Animations */
        .sidebar {
            animation: slideInLeft 0.6s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .top-header {
            animation: slideInDown 0.6s cubic-bezier(0.23, 1, 0.32, 1) 0.2s both;
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-100%);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-100%);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>

<div class="admin-wrapper">
    <aside class="sidebar">
        <div class="sidebar-logo">
            <a href="/admin">
                <i class="fas fa-film"></i>
                <?php echo htmlspecialchars(setting('site_name', 'MuvixTV')); ?>
            </a>
        </div>
        <nav class="sidebar-nav">
            <p>Management</p>
            <ul>
                <li><a href="/admin"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
                <li class="menu-item-has-children">
                    <a href="#"><i class="fas fa-film"></i>Movies</a>
                    <ul class="sub-menu">
                        <li><a href="/admin/movies">All Movies</a></li>
                        <li><a href="/admin/movies/add">Add Movie</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#"><i class="fas fa-tv"></i>TV Shows</a>
                    <ul class="sub-menu">
                        <li><a href="/admin/tv-shows">All TV Shows</a></li>
                        <li><a href="/admin/tv-shows/add">Add TV Show</a></li>
                    </ul>
                </li>
                <li><a href="/admin/genres"><i class="fas fa-tags"></i>Genres</a></li>
                <li><a href="/admin/platforms"><i class="fas fa-stream"></i>Content Platforms</a></li>
            </ul>
            <p>Community</p>
            <ul>
                <li><a href="/admin/users"><i class="fas fa-users"></i>Users</a></li>
                <li><a href="/admin/comments"><i class="fas fa-comments"></i>Comments</a></li>
                <li><a href="/admin/reports"><i class="fas fa-flag"></i>Reports</a></li>
                <li><a href="/admin/requests"><i class="fas fa-inbox"></i>Requests</a></li>
            </ul>
            <p>System</p>
            <ul>
                <li><a href="/admin/pages" class="<?php echo ($currentPage === 'pages') ? 'active' : ''; ?>"><i class="fas fa-file-alt"></i>Page Manager</a></li>
                <li class="menu-item-has-children">
                    <a href="#"><i class="fas fa-cog"></i>General Settings</a>
                    <ul class="sub-menu">
                        <li><a href="/admin/settings/general">Site Settings</a></li>
                        <li><a href="/admin/settings/api">API Settings</a></li>
                        <li><a href="/admin/settings/security">Security</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#"><i class="fas fa-envelope"></i>Email Settings</a>
                    <ul class="sub-menu">
                        <li><a href="/admin/smtp-settings">SMTP Settings</a></li>
                        <li><a href="/admin/settings/email-templates">Email Templates</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#"><i class="fas fa-ad"></i>Ads Settings</a>
                    <ul class="sub-menu">
                        <li><a href="/admin/ads-settings">Main Ads</a></li>
                        <li><a href="/admin/video-ads">Video Ads</a></li>
                    </ul>
                </li>
                <li><a href="/admin/menu"><i class="fas fa-bars"></i>Menu Manager</a></li>
                <li><a href="/admin/content-networks"><i class="fas fa-network-wired"></i>Content Networks</a></li>
                <li><a href="/logout"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
            </ul>
        </nav>
    </aside>

    <div class="content-wrapper">
        <header class="top-header">
            <div class="header-left">
                <a href="/" target="_blank" class="header-dropdown-button">
                    <i class="fas fa-external-link-alt"></i>
                    Back to Site
                </a>
                <div class="header-dropdown" id="create-dropdown">
                    <button type="button" class="header-dropdown-button">
                        <i class="fas fa-plus"></i>
                        Create New
                        <i class="fas fa-chevron-down" style="font-size: 10px; opacity: 0.7;"></i>
                    </button>
                    <div class="header-dropdown-content">
                        <a href="/admin/movies/add"><i class="fas fa-film" style="width: 14px; margin-right: 8px; opacity: 0.7;"></i>Add Movie</a>
                        <a href="/admin/tv-shows/add"><i class="fas fa-tv" style="width: 14px; margin-right: 8px; opacity: 0.7;"></i>Add TV Show</a>
                    </div>
                </div>
            </div>
            <div class="header-right">
                <a href="/search" class="search-icon" title="Search">
                    <i class="fas fa-search"></i>
                </a>
                <button class="header-icon" id="fullscreen-toggle" title="Toggle Fullscreen">
                    <i class="fas fa-expand"></i>
                </button>
                <div class="header-dropdown" id="user-dropdown">
                    <button type="button" class="header-dropdown-button">
                        <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($_SESSION['user_email'] ?? 'Admin'); ?>&background=f59e0b&color=0a0a0a&bold=true&format=svg" alt="User Avatar">
                    </button>
                    <div class="header-dropdown-content">
                        <a href="#"><i class="fas fa-user-circle" style="width: 14px; margin-right: 8px; opacity: 0.7;"></i>Profile</a>
                        <a href="/admin/settings/general"><i class="fas fa-cog" style="width: 14px; margin-right: 8px; opacity: 0.7;"></i>Settings</a>
                        <a href="/logout" style="color: #ef4444;"><i class="fas fa-sign-out-alt" style="width: 14px; margin-right: 8px; opacity: 0.7;"></i>Logout</a>
                    </div>
                </div>
            </div>
        </header>

        <main class="main-content">

<script>
// Premium Admin Dashboard JavaScript - Ultra Modern
document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    // Initialize all components
    initSidebarNavigation();
    initHeaderInteractions();
    initFullscreenToggle();
    initDropdowns();
    initPageTransitions();
    initKeyboardShortcuts();
    initActiveStates();

    // Premium Sidebar Navigation
    function initSidebarNavigation() {
        const menuItems = document.querySelectorAll('.menu-item-has-children');
        
        menuItems.forEach(item => {
            const link = item.querySelector('a');
            const submenu = item.querySelector('.sub-menu');
            
            if (link && submenu) {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    // Close other submenus with stagger animation
                    menuItems.forEach((otherItem, index) => {
                        if (otherItem !== item && otherItem.classList.contains('active')) {
                            setTimeout(() => {
                                otherItem.classList.remove('active');
                            }, index * 50);
                        }
                    });
                    
                    // Toggle current submenu
                    item.classList.toggle('active');
                    
                    // Add haptic feedback simulation
                    addHapticFeedback(this);
                });
            }
        });
    }

    // Enhanced Header Interactions
    function initHeaderInteractions() {
        const buttons = document.querySelectorAll('.header-dropdown-button, .search-icon, .header-icon');
        
        buttons.forEach(button => {
            // Enhanced click feedback
            button.addEventListener('mousedown', function(e) {
                this.style.transform = 'translateY(1px) scale(0.98)';
                addRippleEffect(this, e);
            });
            
            button.addEventListener('mouseup', function() {
                this.style.transform = '';
            });
            
            button.addEventListener('mouseleave', function() {
                this.style.transform = '';
            });
            
            // Enhanced hover states
            button.addEventListener('mouseenter', function() {
                if (!this.classList.contains('loading')) {
                    this.style.filter = 'brightness(1.1)';
                }
            });
            
            button.addEventListener('mouseleave', function() {
                this.style.filter = '';
            });
        });
    }

    // Premium Fullscreen Toggle
    function initFullscreenToggle() {
        const fullscreenBtn = document.getElementById('fullscreen-toggle');
        if (!fullscreenBtn) return;

        fullscreenBtn.addEventListener('click', function() {
            if (this.classList.contains('loading')) return;
            
            this.classList.add('loading');
            
            if (!document.fullscreenElement) {
                document.documentElement.requestFullscreen()
                    .then(() => {
                        this.querySelector('i').className = 'fas fa-compress';
                        showNotification('Fullscreen mode enabled', 'success');
                    })
                    .catch(err => {
                        console.error('Fullscreen error:', err);
                        showNotification('Fullscreen not supported', 'error');
                    })
                    .finally(() => {
                        this.classList.remove('loading');
                    });
            } else {
                document.exitFullscreen()
                    .then(() => {
                        this.querySelector('i').className = 'fas fa-expand';
                        showNotification('Fullscreen mode disabled', 'info');
                    })
                    .finally(() => {
                        this.classList.remove('loading');
                    });
            }
        });

        // Listen for fullscreen changes from other sources (F11, ESC)
        document.addEventListener('fullscreenchange', () => {
            const icon = fullscreenBtn.querySelector('i');
            if (document.fullscreenElement) {
                icon.className = 'fas fa-compress';
            } else {
                icon.className = 'fas fa-expand';
            }
        });
    }

    // Premium Dropdown System
    function initDropdowns() {
        const dropdowns = document.querySelectorAll('.header-dropdown');
        let activeDropdown = null;

        dropdowns.forEach(dropdown => {
            const button = dropdown.querySelector('.header-dropdown-button');
            const content = dropdown.querySelector('.header-dropdown-content');
            
            if (!button || !content) return;

            button.addEventListener('click', function(e) {
                e.stopPropagation();
                
                // Close other dropdowns
                if (activeDropdown && activeDropdown !== dropdown) {
                    hideDropdown(activeDropdown);
                }
                
                // Toggle current dropdown
                if (activeDropdown === dropdown) {
                    hideDropdown(dropdown);
                    activeDropdown = null;
                } else {
                    showDropdown(dropdown);
                    activeDropdown = dropdown;
                }
            });

            // Enhanced dropdown item interactions
            const dropdownLinks = content.querySelectorAll('a');
            dropdownLinks.forEach(link => {
                link.addEventListener('click', function() {
                    addHapticFeedback(this);
                    // Add loading state for navigation
                    if (!this.getAttribute('href').startsWith('#')) {
                        this.style.opacity = '0.7';
                        this.style.pointerEvents = 'none';
                    }
                });
            });
        });

        // Close dropdowns on outside click
        document.addEventListener('click', function(e) {
            if (activeDropdown && !activeDropdown.contains(e.target)) {
                hideDropdown(activeDropdown);
                activeDropdown = null;
            }
        });

        function showDropdown(dropdown) {
            const content = dropdown.querySelector('.header-dropdown-content');
            content.style.opacity = '1';
            content.style.visibility = 'visible';
            content.style.transform = 'translateY(0) scale(1)';
        }

        function hideDropdown(dropdown) {
            const content = dropdown.querySelector('.header-dropdown-content');
            content.style.opacity = '0';
            content.style.visibility = 'hidden';
            content.style.transform = 'translateY(-12px) scale(0.95)';
        }
    }

    // Page Transition Effects
    function initPageTransitions() {
        const navLinks = document.querySelectorAll('.sidebar-nav a[href]:not([href="#"])');
        
        navLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                if (!this.classList.contains('loading')) {
                    this.classList.add('loading');
                    
                    // Create page transition overlay
                    const overlay = document.createElement('div');
                    overlay.style.cssText = `
                        position: fixed;
                        top: 0;
                        left: 0;
                        right: 0;
                        bottom: 0;
                        background: linear-gradient(45deg, rgba(10, 10, 10, 0.95), rgba(17, 17, 17, 0.98));
                        z-index: 9999;
                        opacity: 0;
                        transition: opacity 0.3s ease;
                        backdrop-filter: blur(8px);
                        pointer-events: none;
                    `;
                    
                    document.body.appendChild(overlay);
                    
                    requestAnimationFrame(() => {
                        overlay.style.opacity = '1';
                    });
                }
            });
        });
    }

    // Keyboard Shortcuts
    function initKeyboardShortcuts() {
        document.addEventListener('keydown', function(e) {
            // ESC - Close dropdowns and modals
            if (e.key === 'Escape') {
                const dropdowns = document.querySelectorAll('.header-dropdown-content');
                dropdowns.forEach(dropdown => {
                    dropdown.style.opacity = '0';
                    dropdown.style.visibility = 'hidden';
                    dropdown.style.transform = 'translateY(-12px) scale(0.95)';
                });
            }
            
            // Ctrl/Cmd + K - Focus search (if available)
            if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
                e.preventDefault();
                const searchBtn = document.querySelector('.search-icon');
                if (searchBtn) {
                    searchBtn.click();
                    showNotification('Search shortcut activated', 'info');
                }
            }
            
            // F11 - Toggle fullscreen
            if (e.key === 'F11') {
                e.preventDefault();
                const fullscreenBtn = document.getElementById('fullscreen-toggle');
                if (fullscreenBtn) {
                    fullscreenBtn.click();
                }
            }
            
            // Alt + H - Go to home/dashboard
            if (e.altKey && e.key === 'h') {
                e.preventDefault();
                const homeLink = document.querySelector('.sidebar-nav a[href="/admin"]');
                if (homeLink && !homeLink.classList.contains('loading')) {
                    homeLink.click();
                }
            }
        });
    }

    // Active State Management
    function initActiveStates() {
        const currentPath = window.location.pathname;
        const menuLinks = document.querySelectorAll('.sidebar-nav a[href]');
        
        menuLinks.forEach(link => {
            const href = link.getAttribute('href');
            
            if (href === currentPath || (currentPath.startsWith(href) && href !== '/admin' && href !== '#')) {
                // Mark as active
                link.style.cssText = `
                    color: var(--text-primary) !important;
                    background: rgba(245, 158, 11, 0.12) !important;
                    border-left-color: var(--accent-gold) !important;
                    transform: translateX(6px);
                `;
                
                link.querySelector('i').style.color = 'var(--accent-gold)';
                
                // Open parent menu if this is a submenu item
                const parentMenuItem = link.closest('.menu-item-has-children');
                if (parentMenuItem) {
                    parentMenuItem.classList.add('active');
                }
            }
        });
    }

    // Utility Functions
    function addHapticFeedback(element) {
        element.style.transform = 'scale(0.95)';
        setTimeout(() => {
            element.style.transform = '';
        }, 150);
    }

    function addRippleEffect(element, event) {
        const rect = element.getBoundingClientRect();
        const ripple = document.createElement('div');
        const size = Math.max(rect.width, rect.height);
        const x = event.clientX - rect.left - size / 2;
        const y = event.clientY - rect.top - size / 2;
        
        ripple.style.cssText = `
            position: absolute;
            width: ${size}px;
            height: ${size}px;
            left: ${x}px;
            top: ${y}px;
            background: radial-gradient(circle, rgba(245, 158, 11, 0.3) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
            animation: ripple 0.6s ease-out;
            z-index: 0;
        `;
        
        element.style.position = 'relative';
        element.appendChild(ripple);
        
        setTimeout(() => {
            ripple.remove();
        }, 600);
    }

    function showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        const colors = {
            success: '#10b981',
            error: '#ef4444',
            info: '#3b82f6',
            warning: '#f59e0b'
        };
        
        notification.style.cssText = `
            position: fixed;
            top: 24px;
            right: 24px;
            background: var(--tertiary-bg);
            border: 1px solid var(--border-secondary);
            border-left: 4px solid ${colors[type]};
            color: var(--text-primary);
            padding: 12px 20px;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-xl);
            z-index: 10000;
            font-size: 13px;
            font-weight: 500;
            backdrop-filter: var(--blur-backdrop);
            transform: translateX(100%);
            transition: transform 0.3s cubic-bezier(0.23, 1, 0.32, 1);
        `;
        
        notification.textContent = message;
        document.body.appendChild(notification);
        
        requestAnimationFrame(() => {
            notification.style.transform = 'translateX(0)';
        });
        
        setTimeout(() => {
            notification.style.transform = 'translateX(100%)';
            setTimeout(() => notification.remove(), 300);
        }, 3000);
    }

    // Add CSS for ripple animation
    if (!document.querySelector('#ripple-styles')) {
        const style = document.createElement('style');
        style.id = 'ripple-styles';
        style.textContent = `
            @keyframes ripple {
                from {
                    transform: scale(0);
                    opacity: 1;
                }
                to {
                    transform: scale(1);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    }

    // Performance optimizations
    let ticking = false;
    window.addEventListener('scroll', function() {
        if (!ticking) {
            requestAnimationFrame(function() {
                // Add scroll-based effects here if needed
                ticking = false;
            });
            ticking = true;
        }
    });

    // Theme persistence (if needed)
    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)');
    prefersDark.addEventListener('change', function(e) {
        // Handle theme changes if needed
        console.log('Theme preference changed:', e.matches ? 'dark' : 'light');
    });
});
</script>