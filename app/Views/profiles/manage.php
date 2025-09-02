<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($title ?? 'Manage Profiles'); ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <style>
        /* Modern profil yönetim tasarımı */
        body {
            background-color: #141414;
            color: #fff;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            margin: 0;
            text-align: center;
            padding: 2em;
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
        
        .manage-container {
            max-width: 85%;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.03);
            border-radius: 20px;
            padding: 3rem 2rem;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
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
            justify-content: center;
            flex-wrap: wrap;
        }
        
        .profile-item {
            transform: translateY(0);
            transition: transform 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            animation: fadeInScale 0.6s ease-out;
            animation-fill-mode: both;
        }
        
        .profile-item:nth-child(1) { animation-delay: 0.1s; }
        .profile-item:nth-child(2) { animation-delay: 0.2s; }
        .profile-item:nth-child(3) { animation-delay: 0.3s; }
        .profile-item:nth-child(4) { animation-delay: 0.4s; }
        .profile-item:nth-child(5) { animation-delay: 0.5s; }
        .profile-item:nth-child(6) { animation-delay: 0.6s; }
        
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
        
        .profile-item:hover {
            transform: translateY(-8px);
        }
        
        .profile-item a {
            text-decoration: none;
            color: #808080;
            display: block;
            position: relative;
            transition: all 0.3s ease;
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
        
        .profile-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }
        
        .profile-avatar .edit-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
            backdrop-filter: blur(5px);
        }
        
        .profile-item a:hover .profile-avatar {
            border-color: #fff;
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.4);
            transform: scale(1.05);
        }
        
        .profile-item a:hover .edit-overlay {
            opacity: 1;
        }
        
        .profile-item a:hover .profile-avatar img {
            transform: scale(1.1);
        }
        
        .edit-overlay .fa-pencil-alt {
            font-size: 2.5vw;
            color: #fff;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
        }
        
        .profile-name {
            display: block;
            margin-top: 1.2em;
            font-size: 1.4vw;
            font-weight: 500;
            transition: all 0.3s ease;
            letter-spacing: 0.02em;
        }
        
        .profile-item a:hover .profile-name {
            color: #fff;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.5);
        }
        
        .add-profile-item .profile-avatar {
            border-style: dashed;
            border-color: #808080;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.02);
        }
        
        .add-profile-item a:hover .profile-avatar {
            border-color: #fff;
            background: rgba(255, 255, 255, 0.05);
        }
        
        .add-profile-item .fa-plus-circle {
            font-size: 2.5vw;
            color: #808080;
            transition: color 0.3s ease;
        }
        
        .add-profile-item a:hover .fa-plus-circle {
            color: #fff;
        }
        
        .action-buttons {
            margin-top: 3em;
        }
        
        .done-btn {
            display: inline-block;
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
        
        .done-btn:hover {
            background: rgba(255, 255, 255, 0.08);
            border-color: #fff;
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }
        
        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.8);
            backdrop-filter: blur(5px);
        }
        
        .modal-content {
            background: rgba(20, 20, 20, 0.95);
            margin: 5% auto;
            padding: 40px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            width: 80%;
            max-width: 500px;
            text-align: left;
            backdrop-filter: blur(20px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.6);
            animation: modalSlideIn 0.3s ease-out;
        }
        
        @keyframes modalSlideIn {
            from {
                opacity: 0;
                transform: translateY(-50px) scale(0.9);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }
        
        .modal-content h2 {
            margin-top: 0;
            font-size: 1.8em;
            font-weight: 600;
            margin-bottom: 1.5em;
            text-align: center;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 10px;
            font-weight: 500;
            color: #fff;
        }
        
        .form-group input[type="text"] {
            width: 100%;
            padding: 12px 15px;
            background: rgba(255, 255, 255, 0.05);
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            color: #fff;
            font-size: 1em;
            transition: all 0.3s ease;
            backdrop-filter: blur(5px);
        }
        
        .form-group input[type="text"]:focus {
            outline: none;
            border-color: rgba(255, 255, 255, 0.3);
            background: rgba(255, 255, 255, 0.08);
        }
        
        .form-group .checkbox-container {
            display: flex;
            align-items: center;
            gap: 10px;
            background: rgba(255, 255, 255, 0.03);
            padding: 15px;
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .form-group input[type="checkbox"] {
            width: 20px;
            height: 20px;
            accent-color: #fff;
        }
        
        .avatar-selection {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(80px, 1fr));
            gap: 10px;
            margin-top: 20px;
            max-height: 300px;
            overflow-y: auto;
            padding: 10px;
            background: rgba(255, 255, 255, 0.02);
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .avatar-option {
            cursor: pointer;
            border: 2px solid transparent;
            border-radius: 8px;
            transition: all 0.3s ease;
            overflow: hidden;
        }
        
        .avatar-option:hover {
            border-color: rgba(255, 255, 255, 0.3);
            transform: scale(1.05);
        }
        
        .avatar-option.selected {
            border-color: #fff;
            box-shadow: 0 4px 15px rgba(255, 255, 255, 0.2);
        }
        
        .avatar-option img {
            width: 100%;
            border-radius: 6px;
            transition: transform 0.3s ease;
        }
        
        .avatar-option:hover img {
            transform: scale(1.1);
        }
        
        .modal-actions {
            margin-top: 30px;
            display: flex;
            gap: 20px;
            justify-content: center;
        }
        
        .modal-actions button {
            padding: 12px 25px;
            border: none;
            font-size: 1em;
            font-weight: 500;
            cursor: pointer;
            border-radius: 25px;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            letter-spacing: 0.5px;
        }
        
        .btn-save {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            border: 2px solid rgba(255, 255, 255, 0.3);
        }
        
        .btn-save:hover {
            background: rgba(255, 255, 255, 0.15);
            border-color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }
        
        .btn-cancel {
            background: rgba(255, 255, 255, 0.05);
            color: #808080;
            border: 2px solid rgba(255, 255, 255, 0.1);
        }
        
        .btn-cancel:hover {
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(255, 255, 255, 0.2);
            color: #fff;
        }
        
        /* Scrollbar styling */
        .avatar-selection::-webkit-scrollbar {
            width: 8px;
        }
        
        .avatar-selection::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
        }
        
        .avatar-selection::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
        }
        
        .avatar-selection::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.3);
        }
        
        /* Responsive */
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
            
            .done-btn {
                font-size: 3vw;
                padding: 0.8em 2em;
            }
            
            .edit-overlay .fa-pencil-alt {
                font-size: 5vw;
            }
            
            .add-profile-item .fa-plus-circle {
                font-size: 5vw;
            }
        }
    </style>
</head>
<body>
    <div class="manage-container">
        <h1>Manage Profiles</h1>
        <ul class="profile-list">
            <?php if (!empty($profiles)): ?>
                <?php foreach ($profiles as $profile): ?>
                    <li class="profile-item">
                        <a href="#"> <!-- This will be for editing in the future -->
                            <div class="profile-avatar">
                                <img src="<?php echo htmlspecialchars($profile['avatar'] ?? 'https://ui-avatars.com/api/?name=' . urlencode($profile['name']) . '&size=200&background=random'); ?>" alt="<?php echo htmlspecialchars($profile['name']); ?>">
                                <div class="edit-overlay"><i class="fas fa-pencil-alt"></i></div>
                            </div>
                            <span class="profile-name"><?php echo htmlspecialchars($profile['name']); ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if (count($profiles) < 5): // Show "Add Profile" button if there are less than 5 profiles ?>
            <li class="profile-item add-profile-item">
                <a href="#" id="add-profile-btn">
                    <div class="profile-avatar">
                        <i class="fas fa-plus-circle"></i>
                    </div>
                    <span class="profile-name">Add Profile</span>
                </a>
            </li>
            <?php endif; ?>
        </ul>
        <div class="action-buttons">
            <a href="/profiles" class="done-btn">Done</a>
        </div>
    </div>

    <!-- Add/Edit Profile Modal -->
    <div id="profile-modal" class="modal">
        <div class="modal-content">
            <h2 id="modal-title">Add Profile</h2>
            <form id="profile-form" action="/profiles/store" method="POST">
                <input type="hidden" name="avatar" id="selected-avatar">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label>Choose an avatar:</label>
                    <div class="avatar-selection">
                        <?php if (!empty($avatars)): ?>
                            <?php foreach ($avatars as $avatar): ?>
                                <div class="avatar-option">
                                    <?php
                                        // Create the full path for the avatar
                                        $avatarUrl = '/assets/images/avatars/' . htmlspecialchars($avatar);
                                    ?>
                                    <img src="<?php echo $avatarUrl; ?>" data-avatar-url="<?php echo $avatarUrl; ?>">
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>No avatars found in the directory.</p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="modal-actions">
                    <button type="submit" class="btn-save">Save</button>
                    <button type="button" id="cancel-btn" class="btn-cancel">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // English: JavaScript for the "Manage Profiles" page
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('profile-modal');
            const addBtn = document.getElementById('add-profile-btn');
            const cancelBtn = document.getElementById('cancel-btn');
            const avatarOptions = document.querySelectorAll('.avatar-option');
            const selectedAvatarInput = document.getElementById('selected-avatar');

            // Open the modal when "Add Profile" is clicked
            if (addBtn) {
                addBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    modal.style.display = 'block';
                });
            }

            // Close the modal when "Cancel" is clicked
            cancelBtn.addEventListener('click', function() {
                modal.style.display = 'none';
            });

            // Handle avatar selection
            avatarOptions.forEach(option => {
                option.addEventListener('click', function() {
                    // Remove 'selected' class from all options
                    avatarOptions.forEach(opt => opt.classList.remove('selected'));
                    // Add 'selected' class to the clicked option
                    this.classList.add('selected');
                    // Set the hidden input value to the full-size avatar URL
                    selectedAvatarInput.value = this.querySelector('img').dataset.avatarUrl;
                });
            });
        });
    </script>
</body>
</html>