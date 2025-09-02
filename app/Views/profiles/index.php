<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Select Profile</title>
    <style>
        /* Modern profil seçimi tasarımı */
        body {
            background-color: #141414;
            color: #fff;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            text-align: center;
            position: relative;
            overflow-x: hidden;
        }
        
        /* Animasyonlu arka plan efekti */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 80%, rgba(255, 255, 255, 0.02) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.01) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(255, 255, 255, 0.015) 0%, transparent 50%);
            z-index: -1;
            animation: float 20s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateX(0) translateY(0); }
            33% { transform: translateX(20px) translateY(-20px); }
            66% { transform: translateX(-20px) translateY(10px); }
        }
        
        .profile-gate-container {
            max-width: 85%;
            background: rgba(255, 255, 255, 0.03);
            border-radius: 20px;
            padding: 3rem 2rem;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
            transition: all 0.6s ease;
        }
        
        h1 {
            font-size: 3.2vw;
            font-weight: 600;
            margin-bottom: 2.5em;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            letter-spacing: -0.02em;
        }
        
        .profile-list {
            display: flex;
            gap: 3vw;
            list-style: none;
            padding: 0;
            margin: 0;
            flex-wrap: wrap;
            justify-content: center;
        }
        
        .profile-item {
            transform: translateY(0);
            transition: transform 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }
        
        .profile-item:hover {
            transform: translateY(-8px);
        }
        
        .profile-item a {
            text-decoration: none;
            color: #808080;
            display: block;
            transition: all 0.3s ease;
        }
        
        .profile-item a:hover .profile-avatar {
            border-color: #fff;
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.4);
            transform: scale(1.05);
        }
        
        .profile-item a:hover .profile-name {
            color: #fff;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.5);
        }
        
        .profile-avatar {
            width: 11vw;
            height: 11vw;
            max-width: 180px;
            max-height: 180px;
            min-width: 90px;
            min-height: 90px;
            border-radius: 4px;
            border: 3px solid rgba(255, 255, 255, 0.2);
            overflow: hidden;
            position: relative;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.25);
        }
        
        .profile-avatar::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent 30%, rgba(255, 255, 255, 0.1) 50%, transparent 70%);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 1;
        }
        
        .profile-item:hover .profile-avatar::before {
            opacity: 1;
        }
        
        .profile-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }
        
        .profile-item:hover .profile-avatar img {
            transform: scale(1.1);
        }
        
        .profile-name {
            display: block;
            margin-top: 1.2em;
            font-size: 1.4vw;
            font-weight: 500;
            transition: all 0.3s ease;
            letter-spacing: 0.02em;
        }
        
        .manage-profiles-btn {
            display: inline-block;
            margin-top: 3em;
            padding: 1em 2.5em;
            background: rgba(255, 255, 255, 0.05);
            border: 2px solid #808080;
            border-radius: 50px;
            color: #808080;
            font-size: 1.1vw;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            backdrop-filter: blur(10px);
            text-decoration: none;
            letter-spacing: 0.02em;
        }
        
        .manage-profiles-btn:hover {
            background: rgba(255, 255, 255, 0.08);
            border-color: #fff;
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }

        /* Netflix Style Zoom Animation */
        .zoom-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #141414;
            z-index: 1000;
            display: none;
            align-items: center;
            justify-content: center;
        }

        .zoomed-avatar {
            width: 220px;
            height: 220px;
            border-radius: 4px;
            border: 3px solid #fff;
            overflow: hidden;
            position: relative;
            transform: scale(0);
            animation: zoomIn 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards;
        }

        .zoomed-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        @keyframes zoomIn {
            0% {
                transform: scale(0);
                opacity: 0;
            }
            70% {
                transform: scale(1.1);
                opacity: 1;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        /* Loading Spinner */
        .loading-spinner {
            position: absolute;
            top: 50%;
            left: 35%;
            transform: translate(-50%, -50%);
            width: 80px;
            height: 80px;
            opacity: 0;
            animation: showSpinner 0.3s ease-in 0.6s forwards;
        }

        .loading-spinner::after {
            content: '';
            position: absolute;
            width: 60px;
            height: 60px;
            border: 4px solid rgba(255, 255, 255, 0.2);
            border-top: 4px solid #fff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes showSpinner {
            to { opacity: 1; }
        }

        /* Hide container when zooming */
        .profile-gate-container.zooming {
            transform: scale(0.8);
            opacity: 0;
        }
        
        /* Responsivlik için medya sorguları */
        @media (max-width: 768px) {
            .profile-list {
                gap: 4vw;
            }
            
            .profile-avatar {
                width: 20vw;
                height: 20vw;
                min-width: 80px;
                min-height: 80px;
            }
            
            h1 {
                font-size: 6vw;
            }
            
            .profile-name {
                font-size: 3.5vw;
            }
            
            .manage-profiles-btn {
                font-size: 3vw;
                padding: 0.8em 2em;
            }

            .zoomed-avatar {
                width: 150px;
                height: 150px;
            }
        }
        
        /* Giriş animasyonu */
        .profile-gate-container {
            animation: slideInUp 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }
        
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
        
        .profile-item {
            animation: fadeInScale 0.6s ease-out;
            animation-fill-mode: both;
        }
        
        .profile-item:nth-child(1) { animation-delay: 0.1s; }
        .profile-item:nth-child(2) { animation-delay: 0.2s; }
        .profile-item:nth-child(3) { animation-delay: 0.3s; }
        .profile-item:nth-child(4) { animation-delay: 0.4s; }
        .profile-item:nth-child(5) { animation-delay: 0.5s; }
        
        @keyframes fadeInScale {
            from {
                opacity: 0;
                transform: scale(0.8) translateY(20px);
            }
            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="profile-gate-container">
        <h1>Who's Watching?</h1>
        <ul class="profile-list">
            <?php if (!empty($profiles)): ?>
                <?php foreach ($profiles as $profile): ?>
                    <li class="profile-item">
                        <a href="/profiles/select/<?php echo $profile['id']; ?>" class="profile-link" data-profile-id="<?php echo $profile['id']; ?>">
                            <div class="profile-avatar">
                                <img src="<?php echo htmlspecialchars($profile['avatar'] ?? 'https://ui-avatars.com/api/?name=' . urlencode($profile['name']) . '&size=200&background=random'); ?>" alt="<?php echo htmlspecialchars($profile['name']); ?>">
                            </div>
                            <span class="profile-name"><?php echo htmlspecialchars($profile['name']); ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
        <a href="/profiles/manage" class="manage-profiles-btn">Manage Profiles</a>
    </div>

    <!-- Zoom Overlay -->
    <div class="zoom-overlay" id="zoomOverlay">
        <div class="zoomed-avatar" id="zoomedAvatar">
            <img src="" alt="" id="zoomedImg">
            <div class="loading-spinner"></div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const profileLinks = document.querySelectorAll('.profile-link');
            const zoomOverlay = document.getElementById('zoomOverlay');
            const zoomedImg = document.getElementById('zoomedImg');
            const container = document.querySelector('.profile-gate-container');

            profileLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Get the avatar image source
                    const imgSrc = this.querySelector('.profile-avatar img').src;
                    const profileName = this.querySelector('.profile-name').textContent;
                    
                    // Set the zoomed image
                    zoomedImg.src = imgSrc;
                    zoomedImg.alt = profileName;
                    
                    // Get profile data
                    const profileId = this.dataset.profileId;
                    const profileUrl = this.href;
                    
                    // Start the animation sequence
                    container.classList.add('zooming');
                    zoomOverlay.style.display = 'flex';
                    
                    // Redirect to actual profile page after animation
                    setTimeout(() => {
                        window.location.href = profileUrl;
                    }, 2200);
                });
            });
        });
    </script>
</body>
</html>