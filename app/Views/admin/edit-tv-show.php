<?php require_once __DIR__ . '/partials/header.php'; ?>

<style>
    /* Enhanced Modern TV Show Edit Page with Rich Black-Gray Colors */
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
    .edit-header {
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

    .edit-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-5);
        border-radius: 20px 20px 0 0;
    }

    .edit-header::after {
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

    .edit-header-content {
        position: relative;
        z-index: 1;
    }

    .edit-title {
        font-size: 32px;
        font-weight: 800;
        color: var(--text-primary);
        margin: 0 0 16px 0;
        display: flex;
        align-items: center;
        gap: 16px;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    }

    .edit-title-icon {
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

    .back-link {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        color: var(--accent-gold);
        text-decoration: none;
        font-size: 16px;
        font-weight: 600;
        transition: all 0.3s ease;
        padding: 12px 20px;
        background: rgba(255, 215, 0, 0.1);
        border-radius: 12px;
        border: 1px solid rgba(255, 215, 0, 0.2);
    }

    .back-link:hover {
        color: var(--accent-white);
        background: rgba(255, 215, 0, 0.2);
        border-color: rgba(255, 215, 0, 0.4);
        transform: translateX(-4px);
    }

    /* Enhanced Layout Container */
    .edit-layout {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 32px;
        margin-bottom: 32px;
    }

    /* Enhanced Card Styles */
    .enhanced-card {
        background: var(--secondary-bg);
        border: 1px solid var(--border-color);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.2);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        margin-bottom: 28px;
        position: relative;
    }

    .enhanced-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.3);
        border-color: var(--border-hover);
    }

    .enhanced-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--card-gradient, var(--gradient-1));
        opacity: 0;
        transition: all 0.4s ease;
    }

    .enhanced-card:hover::before {
        opacity: 1;
    }

    .enhanced-card.main-info {
        --card-gradient: var(--gradient-5);
    }

    .enhanced-card.media-card {
        --card-gradient: var(--gradient-3);
    }

    .enhanced-card-header {
        padding: 28px 32px 0 32px;
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 28px;
    }

    .card-icon {
        width: 48px;
        height: 48px;
        background: var(--card-gradient, var(--gradient-1));
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        color: white;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
        transition: all 0.4s ease;
    }

    .enhanced-card:hover .card-icon {
        transform: rotate(15deg) scale(1.1);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
    }

    .card-title {
        font-size: 22px;
        font-weight: 700;
        color: var(--text-primary);
        margin: 0;
    }

    .enhanced-card-content {
        padding: 0 32px 32px 32px;
    }

    /* Enhanced Form Groups */
    .enhanced-form-group {
        margin-bottom: 28px;
        position: relative;
    }

    .enhanced-form-group label {
        display: block;
        margin-bottom: 12px;
        font-weight: 700;
        color: var(--text-primary);
        font-size: 15px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .enhanced-form-input,
    .enhanced-form-textarea,
    .enhanced-form-select {
        width: 100%;
        box-sizing: border-box;
        padding: 16px 20px;
        background: var(--tertiary-bg);
        border: 2px solid var(--border-color);
        color: var(--text-primary);
        border-radius: 12px;
        font-size: 15px;
        font-weight: 500;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        outline: none;
    }

    .enhanced-form-input:focus,
    .enhanced-form-textarea:focus,
    .enhanced-form-select:focus {
        border-color: var(--accent-gold);
        background: var(--quaternary-bg);
        box-shadow: 0 0 0 4px rgba(255, 215, 0, 0.1);
        transform: translateY(-2px);
    }

    .enhanced-form-textarea {
        min-height: 160px;
        resize: vertical;
        line-height: 1.6;
    }

    /* Enhanced Custom Select Containers */
    .enhanced-select-container {
        position: relative;
    }

    .enhanced-selected-items {
        background: var(--tertiary-bg);
        border: 2px solid var(--border-color);
        border-radius: 12px;
        padding: 12px 16px;
        min-height: 52px;
        cursor: pointer;
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        align-items: center;
        transition: all 0.3s ease;
    }

    .enhanced-selected-items:hover {
        border-color: var(--border-hover);
        background: var(--quaternary-bg);
    }

    .enhanced-selected-items.active {
        border-color: var(--accent-gold);
        box-shadow: 0 0 0 4px rgba(255, 215, 0, 0.1);
    }

    .enhanced-item-tag {
        background: var(--accent-green);
        color: var(--primary-bg);
        padding: 8px 14px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(0, 255, 136, 0.2);
    }

    .enhanced-item-tag:hover {
        background: var(--accent-gold);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 255, 136, 0.3);
    }

    .enhanced-item-tag .remove-tag {
        cursor: pointer;
        font-weight: 900;
        font-size: 16px;
        width: 20px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        transition: all 0.2s ease;
    }

    .enhanced-item-tag .remove-tag:hover {
        background: rgba(0, 0, 0, 0.2);
        transform: scale(1.2);
    }

    .enhanced-dropdown {
        display: none;
        position: absolute;
        top: calc(100% + 8px);
        left: 0;
        right: 0;
        background: var(--tertiary-bg);
        border: 2px solid var(--border-color);
        border-radius: 12px;
        z-index: 1000;
        max-height: 200px;
        overflow-y: auto;
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.4);
    }

    .enhanced-dropdown div {
        padding: 16px 20px;
        cursor: pointer;
        font-size: 14px;
        font-weight: 600;
        color: var(--text-secondary);
        transition: all 0.2s ease;
        border-bottom: 1px solid var(--border-color);
    }

    .enhanced-dropdown div:last-child {
        border-bottom: none;
    }

    .enhanced-dropdown div:hover {
        background: var(--quaternary-bg);
        color: var(--accent-gold);
        transform: translateX(4px);
    }

    /* Enhanced Cast List */
    .enhanced-cast-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 20px;
        margin-top: 16px;
    }

    .enhanced-cast-member {
        display: flex;
        align-items: center;
        gap: 12px;
        background: var(--tertiary-bg);
        padding: 16px;
        border-radius: 12px;
        border: 1px solid var(--border-color);
        transition: all 0.3s ease;
    }

    .enhanced-cast-member:hover {
        background: var(--quaternary-bg);
        border-color: var(--border-hover);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    .enhanced-cast-member img {
        width: 50px;
        height: 75px;
        object-fit: cover;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }

    .cast-member-info {
        flex: 1;
        min-width: 0;
    }

    .cast-member-name {
        font-size: 14px;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 4px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .cast-member-character {
        font-size: 12px;
        color: var(--text-muted);
        font-style: italic;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* Enhanced Media Management */
    .enhanced-media-grid {
        display: grid;
        gap: 24px;
    }

    .enhanced-media-item {
        background: var(--tertiary-bg);
        border: 1px solid var(--border-color);
        border-radius: 16px;
        padding: 20px;
        transition: all 0.3s ease;
    }

    .enhanced-media-item:hover {
        background: var(--quaternary-bg);
        border-color: var(--border-hover);
        transform: translateY(-2px);
    }

    .media-item-header {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 16px;
    }

    .media-item-icon {
        width: 36px;
        height: 36px;
        background: var(--gradient-1);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        color: white;
    }

    .media-item-title {
        font-size: 16px;
        font-weight: 700;
        color: var(--text-primary);
        margin: 0;
    }

    .enhanced-media-preview {
        background: var(--primary-bg);
        border: 2px dashed var(--border-color);
        border-radius: 12px;
        padding: 12px;
        margin-bottom: 16px;
        text-align: center;
        transition: all 0.3s ease;
    }

    .enhanced-media-preview:hover {
        border-color: var(--accent-gold);
    }

    .enhanced-media-preview img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.3);
    }

    .enhanced-media-controls {
        display: flex;
        gap: 12px;
        align-items: stretch;
    }

    .enhanced-media-controls input {
        flex: 1;
        padding: 12px 16px;
        background: var(--secondary-bg);
        border: 1px solid var(--border-color);
        color: var(--text-primary);
        border-radius: 8px;
        font-size: 13px;
        outline: none;
        transition: all 0.3s ease;
    }

    .enhanced-media-controls input:focus {
        border-color: var(--accent-gold);
        background: var(--tertiary-bg);
    }

    .enhanced-media-btn {
        background: var(--accent-gold);
        color: var(--primary-bg);
        border: none;
        padding: 12px 20px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .enhanced-media-btn:hover {
        background: var(--accent-white);
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(255, 215, 0, 0.3);
    }

    /* Enhanced Action Buttons */
    .enhanced-action-section {
        background: var(--tertiary-bg);
        border: 1px solid var(--border-color);
        border-radius: 16px;
        padding: 24px;
        margin-top: 20px;
    }

    .action-buttons-grid {
        display: grid;
        gap: 16px;
    }

    .enhanced-action-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        padding: 16px 24px;
        border: none;
        border-radius: 12px;
        font-size: 16px;
        font-weight: 700;
        text-decoration: none;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .enhanced-action-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }

    .enhanced-action-btn:hover::before {
        left: 100%;
    }

    .enhanced-action-btn.primary {
        background: var(--accent-green);
        color: var(--primary-bg);
        box-shadow: 0 4px 16px rgba(0, 255, 136, 0.3);
    }

    .enhanced-action-btn.primary:hover {
        background: var(--accent-white);
        transform: translateY(-4px) scale(1.02);
        box-shadow: 0 12px 32px rgba(0, 255, 136, 0.4);
    }

    .enhanced-action-btn.secondary {
        background: var(--accent-gold);
        color: var(--primary-bg);
        box-shadow: 0 4px 16px rgba(255, 215, 0, 0.3);
    }

    .enhanced-action-btn.secondary:hover {
        background: var(--accent-white);
        transform: translateY(-4px) scale(1.02);
        box-shadow: 0 12px 32px rgba(255, 215, 0, 0.4);
    }

    /* Responsive Design */
    @media (max-width: 1200px) {
        .edit-layout {
            grid-template-columns: 1fr;
        }
        
        .enhanced-cast-grid {
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
        }
    }

    @media (max-width: 768px) {
        .main-content {
            padding: 20px;
        }
        
        .edit-header,
        .enhanced-card-header,
        .enhanced-card-content {
            padding: 20px;
        }
        
        .edit-title {
            font-size: 24px;
            flex-direction: column;
            align-items: flex-start;
            gap: 12px;
        }
        
        .enhanced-cast-grid {
            grid-template-columns: 1fr;
        }
        
        .enhanced-media-controls {
            flex-direction: column;
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

    .enhanced-card {
        animation: slideInUp 0.6s ease-out;
    }

    .enhanced-card:nth-child(1) { animation-delay: 0.1s; }
    .enhanced-card:nth-child(2) { animation-delay: 0.2s; }
    .enhanced-card:nth-child(3) { animation-delay: 0.3s; }

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
</style>

<main class="main-content">
    <!-- Enhanced Header Section -->
    <div class="edit-header">
        <div class="edit-header-content">
            <h1 class="edit-title">
                <div class="edit-title-icon">
                    <i class="fas fa-tv"></i>
                </div>
                Edit TV Show: <?php echo htmlspecialchars($tvShow['title']); ?>
            </h1>
            <a href="/admin/tv-shows" class="back-link">
                <i class="fas fa-arrow-left"></i>
                Back to TV Show List
            </a>
        </div>
    </div>
    
    <form action="/admin/tv-shows/edit/<?php echo $tvShow['id']; ?>" method="POST">
        <div class="edit-layout">
            <!-- Main Information Column -->
            <div class="main-column">
                <div class="enhanced-card main-info">
                    <div class="enhanced-card-header">
                        <div class="card-icon">
                            <i class="fas fa-info-circle"></i>
                        </div>
                        <h3 class="card-title">TV Show Information</h3>
                    </div>
                    <div class="enhanced-card-content">
                        <div class="enhanced-form-group">
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title" required value="<?php echo htmlspecialchars($tvShow['title']); ?>" class="enhanced-form-input">
                        </div>
                        
                        <div class="enhanced-form-group">
                            <label for="overview">Description</label>
                            <textarea id="overview" name="overview" class="enhanced-form-textarea"><?php echo htmlspecialchars($tvShow['overview']); ?></textarea>
                        </div>
                        
                        <div class="enhanced-form-group">
                            <label for="genres">Genres</label>
                            <div class="enhanced-select-container" id="genres-container">
                                <div class="enhanced-selected-items" id="selected-genres">
                                    <?php 
                                    $selectedGenreIds = array_map(fn($g) => $g['id'], $genres);
                                    foreach ($genres as $genre): ?>
                                        <span class="enhanced-item-tag" data-id="<?php echo $genre['id']; ?>">
                                            <?php echo htmlspecialchars($genre['name']); ?>
                                            <span class="remove-tag" data-id="<?php echo $genre['id']; ?>">&times;</span>
                                        </span>
                                    <?php endforeach; ?>
                                </div>
                                <div class="enhanced-dropdown" id="genre-dropdown">
                                    <?php foreach ($allGenres as $genre): ?>
                                        <div data-id="<?php echo $genre['id']; ?>" data-name="<?php echo htmlspecialchars($genre['name']); ?>"><?php echo htmlspecialchars($genre['name']); ?></div>
                                    <?php endforeach; ?>
                                </div>
                                <div id="hidden-genre-inputs">
                                    <?php foreach ($selectedGenreIds as $id): ?>
                                        <input type="hidden" name="genre_ids[]" value="<?php echo $id; ?>">
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="enhanced-form-group">
                            <label for="first_air_date">First Air Date</label>
                            <input type="date" id="first_air_date" name="first_air_date" value="<?php echo $tvShow['first_air_date']; ?>" class="enhanced-form-input">
                        </div>
                        
                        <div class="enhanced-form-group">
                            <label for="status">Status</label>
                            <select id="status" name="status" class="enhanced-form-select">
                                <?php
                                $statuses = ['Returning Series', 'Ended', 'Canceled', 'In Production', 'Planned'];
                                foreach ($statuses as $statusOption) {
                                    $selected = ($statusOption == $tvShow['status']) ? 'selected' : '';
                                    echo "<option value=\"{$statusOption}\" {$selected}>{$statusOption}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        
                        <div class="enhanced-form-group">
                            <label for="platforms">Content Networks</label>
                            <div class="enhanced-select-container" id="platforms-container">
                                <div class="enhanced-selected-items" id="selected-platforms">
                                    <?php 
                                    $selectedPlatformIds = array_map(fn($p) => $p['id'], $tvShowPlatforms);
                                    foreach ($tvShowPlatforms as $platform): ?>
                                        <span class="enhanced-item-tag" data-id="<?php echo $platform['id']; ?>">
                                            <?php echo htmlspecialchars($platform['name']); ?>
                                            <span class="remove-tag" data-id="<?php echo $platform['id']; ?>">&times;</span>
                                        </span>
                                    <?php endforeach; ?>
                                </div>
                                <div class="enhanced-dropdown" id="platform-dropdown">
                                    <?php foreach ($allPlatforms as $platform): ?>
                                        <div data-id="<?php echo $platform['id']; ?>" data-name="<?php echo htmlspecialchars($platform['name']); ?>"><?php echo htmlspecialchars($platform['name']); ?></div>
                                    <?php endforeach; ?>
                                </div>
                                <div id="hidden-platform-inputs">
                                    <?php foreach ($selectedPlatformIds as $id): ?>
                                        <input type="hidden" name="platform_ids[]" value="<?php echo $id; ?>">
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="enhanced-form-group">
                            <label>Cast Members</label>
                            <div class="enhanced-cast-grid">
                                <?php if (!empty($cast)): ?>
                                    <?php foreach (array_slice($cast, 0, 12) as $person): ?>
                                        <div class="enhanced-cast-member">
                                            <img src="<?php echo !empty($person['profile_path']) ? 'https://image.tmdb.org/t/p/w92'.$person['profile_path'] : 'https://via.placeholder.com/50x75.png?text=N/A' ?>" alt="<?php echo htmlspecialchars($person['name']); ?>">
                                            <div class="cast-member-info">
                                                <div class="cast-member-name"><?php echo htmlspecialchars($person['name']); ?></div>
                                                <div class="cast-member-character">as <?php echo htmlspecialchars($person['character_name']); ?></div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="enhanced-cast-member">
                                        <img src="https://via.placeholder.com/50x75.png?text=N/A" alt="No cast">
                                        <div class="cast-member-info">
                                            <div class="cast-member-name">No cast information available</div>
                                            <div class="cast-member-character">Please add cast members</div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Media Management Sidebar -->
            <div class="side-column">
                <div class="enhanced-card media-card">
                    <div class="enhanced-card-header">
                        <div class="card-icon">
                            <i class="fas fa-images"></i>
                        </div>
                        <h3 class="card-title">Media Management</h3>
                    </div>
                    <div class="enhanced-card-content">
                        <div class="enhanced-media-grid">
                            <!-- Poster -->
                            <div class="enhanced-media-item">
                                <div class="media-item-header">
                                    <div class="media-item-icon">
                                        <i class="fas fa-image"></i>
                                    </div>
                                    <h4 class="media-item-title">Poster</h4>
                                </div>
                                <div class="enhanced-media-preview" id="poster-preview">
                                    <img src="https://image.tmdb.org/t/p/w300<?php echo htmlspecialchars($tvShow['poster_path']); ?>" alt="Poster">
                                </div>
                                <div class="enhanced-media-controls">
                                    <input type="text" id="manual_poster_path" placeholder="Enter image URL..." value="https://image.tmdb.org/t/p/original<?php echo htmlspecialchars($tvShow['poster_path']); ?>">
                                    <button type="button" onclick="updatePreview('poster')" class="enhanced-media-btn">Set</button>
                                </div>
                            </div>

                            <!-- Texted Backdrop -->
                            <div class="enhanced-media-item">
                                <div class="media-item-header">
                                    <div class="media-item-icon">
                                        <i class="fas fa-panorama"></i>
                                    </div>
                                    <h4 class="media-item-title">Texted Backdrop</h4>
                                </div>
                                <div class="enhanced-media-preview" id="logo_backdrop-preview">
                                    <img src="https://image.tmdb.org/t/p/w300<?php echo htmlspecialchars($tvShow['logo_backdrop_path'] ?? $tvShow['backdrop_path']); ?>" alt="Texted Backdrop">
                                </div>
                                <div class="enhanced-media-controls">
                                    <input type="text" id="manual_logo_backdrop_path" placeholder="Enter backdrop URL..." value="https://image.tmdb.org/t/p/original<?php echo htmlspecialchars($tvShow['logo_backdrop_path'] ?? ''); ?>">
                                    <button type="button" onclick="updatePreview('logo_backdrop')" class="enhanced-media-btn">Set</button>
                                </div>
                            </div>

                            <!-- Backdrop -->
                            <div class="enhanced-media-item">
                                <div class="media-item-header">
                                    <div class="media-item-icon">
                                        <i class="fas fa-mountain"></i>
                                    </div>
                                    <h4 class="media-item-title">Backdrop</h4>
                                </div>
                                <div class="enhanced-media-preview" id="backdrop-preview">
                                    <img src="https://image.tmdb.org/t/p/w300<?php echo htmlspecialchars($tvShow['backdrop_path']); ?>" alt="Backdrop">
                                </div>
                                <div class="enhanced-media-controls">
                                    <input type="text" id="manual_backdrop_path" placeholder="Enter backdrop URL..." value="https://image.tmdb.org/t/p/original<?php echo htmlspecialchars($tvShow['backdrop_path']); ?>">
                                    <button type="button" onclick="updatePreview('backdrop')" class="enhanced-media-btn">Set</button>
                                </div>
                            </div>

                            <!-- Logo -->
                            <div class="enhanced-media-item">
                                <div class="media-item-header">
                                    <div class="media-item-icon">
                                        <i class="fas fa-trademark"></i>
                                    </div>
                                    <h4 class="media-item-title">Logo</h4>
                                </div>
                                <div class="enhanced-media-preview" id="logo-preview" style="background: var(--primary-bg); padding: 20px;">
                                    <?php if (!empty($tvShow['logo_path'])): ?>
                                        <img src="https://image.tmdb.org/t/p/w300<?php echo htmlspecialchars($tvShow['logo_path']); ?>" alt="Logo">
                                    <?php else: ?>
                                        <div style="color: var(--text-muted); text-align: center; padding: 20px;">
                                            <i class="fas fa-image" style="font-size: 24px; margin-bottom: 8px;"></i>
                                            <p>No logo available</p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="enhanced-media-controls">
                                    <input type="text" id="manual_logo_path" placeholder="Enter logo URL..." value="https://image.tmdb.org/t/p/original<?php echo htmlspecialchars($tvShow['logo_path'] ?? ''); ?>">
                                    <button type="button" onclick="updatePreview('logo')" class="enhanced-media-btn">Set</button>
                                </div>
                            </div>

                            <!-- Trailer -->
                            <div class="enhanced-media-item">
                                <div class="media-item-header">
                                    <div class="media-item-icon">
                                        <i class="fas fa-play"></i>
                                    </div>
                                    <h4 class="media-item-title">Trailer</h4>
                                </div>
                                <div class="enhanced-media-preview" id="trailer-preview" style="background: var(--primary-bg); padding: 20px;">
                                    <?php if (!empty($tvShow['trailer_key'])): ?>
                                        <div style="text-align: center;">
                                            <i class="fas fa-play-circle" style="font-size: 48px; color: var(--accent-red); margin-bottom: 12px;"></i>
                                            <p style="color: var(--text-primary); margin: 0;">
                                                <a href="https://www.youtube.com/watch?v=<?php echo htmlspecialchars($tvShow['trailer_key']); ?>" target="_blank" style="color: var(--accent-gold); text-decoration: none;">Watch Current Trailer</a>
                                            </p>
                                        </div>
                                    <?php else: ?>
                                        <div style="color: var(--text-muted); text-align: center;">
                                            <i class="fas fa-video" style="font-size: 24px; margin-bottom: 8px;"></i>
                                            <p>No trailer available</p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="enhanced-media-controls">
                                    <input type="text" id="manual_trailer_key" placeholder="YouTube URL or video ID..." value="<?php echo !empty($tvShow['trailer_key']) ? 'https://www.youtube.com/watch?v=' . htmlspecialchars($tvShow['trailer_key']) : ''; ?>">
                                    <button type="button" onclick="updatePreview('trailer')" class="enhanced-media-btn">Set</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="enhanced-action-section">
                    <div class="action-buttons-grid">
                        <a href="/admin/manage-seasons/<?php echo $tvShow['id']; ?>" class="enhanced-action-btn secondary">
                            <i class="fas fa-list"></i>
                            Manage Seasons & Episodes
                        </a>
                        <button type="submit" class="enhanced-action-btn primary">
                            <i class="fas fa-save"></i>
                            Update TV Show
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Hidden Form Fields -->
        <input type="hidden" id="poster_path" name="poster_path" value="<?php echo htmlspecialchars($tvShow['poster_path']); ?>">
        <input type="hidden" id="logo_backdrop_path" name="logo_backdrop_path" value="<?php echo htmlspecialchars($tvShow['logo_backdrop_path'] ?? ''); ?>">
        <input type="hidden" id="backdrop_path" name="backdrop_path" value="<?php echo htmlspecialchars($tvShow['backdrop_path']); ?>">
        <input type="hidden" id="logo_path" name="logo_path" value="<?php echo htmlspecialchars($tvShow['logo_path'] ?? ''); ?>">
        <input type="hidden" id="trailer_key" name="trailer_key" value="<?php echo htmlspecialchars($tvShow['trailer_key'] ?? ''); ?>">
    </form>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Enhanced Custom Select functionality
    function initializeEnhancedSelect(containerId, selectedContainerId, dropdownId, hiddenInputContainerId, initialSelectedIds, inputName) {
        const container = document.getElementById(containerId);
        const selectedContainer = document.getElementById(selectedContainerId);
        const dropdown = document.getElementById(dropdownId);
        const hiddenInputsContainer = document.getElementById(hiddenInputContainerId);
        let selectedIds = initialSelectedIds.map(String);

        function updateHiddenInputs() {
            hiddenInputsContainer.innerHTML = '';
            selectedIds.forEach(id => {
                const newInput = document.createElement('input');
                newInput.type = 'hidden';
                newInput.name = inputName;
                newInput.value = id;
                hiddenInputsContainer.appendChild(newInput);
            });
        }

        selectedContainer.addEventListener('click', (e) => {
            e.stopPropagation();
            const isActive = dropdown.style.display === 'block';
            
            // Close all other dropdowns
            document.querySelectorAll('.enhanced-dropdown').forEach(d => d.style.display = 'none');
            document.querySelectorAll('.enhanced-selected-items').forEach(s => s.classList.remove('active'));
            
            if (!isActive) {
                dropdown.style.display = 'block';
                selectedContainer.classList.add('active');
            }
        });

        dropdown.addEventListener('click', (e) => {
            const target = e.target;
            if (target.dataset.id) {
                const id = target.dataset.id;
                const name = target.dataset.name;
                
                if (!selectedIds.includes(id)) {
                    selectedIds.push(id);
                    const tag = document.createElement('span');
                    tag.className = 'enhanced-item-tag';
                    tag.dataset.id = id;
                    tag.innerHTML = `${name} <span class="remove-tag" data-id="${id}">&times;</span>`;
                    selectedContainer.appendChild(tag);
                    updateHiddenInputs();
                    
                    // Add animation
                    tag.style.opacity = '0';
                    tag.style.transform = 'scale(0.8)';
                    setTimeout(() => {
                        tag.style.transition = 'all 0.3s ease';
                        tag.style.opacity = '1';
                        tag.style.transform = 'scale(1)';
                    }, 10);
                }
                
                dropdown.style.display = 'none';
                selectedContainer.classList.remove('active');
            }
        });

        selectedContainer.addEventListener('click', (e) => {
            if (e.target.classList.contains('remove-tag')) {
                e.stopPropagation();
                const id = e.target.dataset.id;
                const index = selectedIds.indexOf(id);
                const tagElement = e.target.parentElement;
                
                if (index > -1) {
                    selectedIds.splice(index, 1);
                }
                
                // Animate removal
                tagElement.style.transform = 'scale(0.8)';
                tagElement.style.opacity = '0';
                setTimeout(() => {
                    tagElement.remove();
                    updateHiddenInputs();
                }, 200);
            }
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (container && !container.contains(e.target)) {
                dropdown.style.display = 'none';
                selectedContainer.classList.remove('active');
            }
        });
    }

    // Initialize both selects
    initializeEnhancedSelect('platforms-container', 'selected-platforms', 'platform-dropdown', 'hidden-platform-inputs', <?php echo json_encode($selectedPlatformIds); ?>, 'platform_ids[]');
    initializeEnhancedSelect('genres-container', 'selected-genres', 'genre-dropdown', 'hidden-genre-inputs', <?php echo json_encode($selectedGenreIds); ?>, 'genre_ids[]');

    // Enhanced form interactions
    document.querySelectorAll('.enhanced-form-input, .enhanced-form-textarea, .enhanced-form-select').forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.style.transform = 'translateY(-2px)';
        });
        
        input.addEventListener('blur', function() {
            this.parentElement.style.transform = 'translateY(0)';
        });
    });

    // Enhanced card hover effects
    document.querySelectorAll('.enhanced-card').forEach(card => {
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
    document.querySelectorAll('.enhanced-action-btn').forEach(btn => {
        btn.addEventListener('mouseenter', function() {
            this.style.boxShadow = this.classList.contains('primary') 
                ? '0 16px 40px rgba(0, 255, 136, 0.5)' 
                : '0 16px 40px rgba(255, 215, 0, 0.5)';
        });
        
        btn.addEventListener('mouseleave', function() {
            this.style.boxShadow = this.classList.contains('primary') 
                ? '0 4px 16px rgba(0, 255, 136, 0.3)' 
                : '0 4px 16px rgba(255, 215, 0, 0.3)';
        });
        
        btn.addEventListener('click', function(e) {
            this.style.transform = 'translateY(0px) scale(0.95)';
            setTimeout(() => {
                this.style.transform = '';
            }, 150);
        });
    });
});

// Enhanced Media Preview Functionality
function updatePreview(type) {
    const inputElement = document.getElementById('manual_' + type + '_path') || document.getElementById('manual_' + type + '_key');
    const hiddenInputElement = document.getElementById(type + '_path') || document.getElementById(type + '_key');
    const previewElement = document.getElementById(type + '-preview');
    
    let newValue = inputElement.value.trim();

    // Add loading animation
    previewElement.style.opacity = '0.5';
    previewElement.style.transform = 'scale(0.95)';

    setTimeout(() => {
        if (type === 'trailer') {
            let videoId = '';
            if (newValue.includes('youtube.com/watch?v=')) { 
                videoId = newValue.split('v=')[1].split('&')[0]; 
            } else if (newValue.includes('youtu.be/')) { 
                videoId = newValue.split('youtu.be/')[1].split('?')[0]; 
            } else { 
                videoId = newValue; 
            }
            
            hiddenInputElement.value = videoId;
            
            if (videoId) {
                previewElement.innerHTML = `
                    <div style="text-align: center;">
                        <i class="fas fa-play-circle" style="font-size: 48px; color: var(--accent-red); margin-bottom: 12px;"></i>
                        <p style="color: var(--text-primary); margin: 0;">
                            <a href="https://www.youtube.com/watch?v=${videoId}" target="_blank" style="color: var(--accent-gold); text-decoration: none;">Watch New Trailer</a>
                        </p>
                    </div>
                `;
            } else {
                previewElement.innerHTML = `
                    <div style="color: var(--text-muted); text-align: center;">
                        <i class="fas fa-video" style="font-size: 24px; margin-bottom: 8px;"></i>
                        <p>No trailer available</p>
                    </div>
                `;
            }
        } else {
            let imagePath = newValue;
            let fullImageUrl = newValue;
            
            if (newValue.startsWith('http')) {
                if (newValue.includes('themoviedb.org')) {
                    imagePath = '/' + newValue.split('/').slice(5).join('/');
                }
            } else {
                fullImageUrl = 'https://image.tmdb.org/t/p/w300' + newValue;
            }
            
            hiddenInputElement.value = imagePath;

            const img = new Image();
            img.onload = function() {
                if (previewElement.querySelector('img')) {
                    previewElement.querySelector('img').src = fullImageUrl;
                } else {
                    previewElement.innerHTML = `<img src="${fullImageUrl}" alt="${type}" style="border-radius: 8px; box-shadow: 0 4px 16px rgba(0, 0, 0, 0.3);">`;
                }
            };
            img.onerror = function() {
                previewElement.innerHTML = `
                    <div style="color: var(--text-muted); text-align: center; padding: 20px;">
                        <i class="fas fa-exclamation-triangle" style="font-size: 24px; margin-bottom: 8px; color: var(--accent-red);"></i>
                        <p>Failed to load image</p>
                    </div>
                `;
            };
            img.src = fullImageUrl;
        }
        
        // Restore preview animation
        previewElement.style.opacity = '1';
        previewElement.style.transform = 'scale(1)';
    }, 300);
}
</script>

<?php require_once __DIR__ . '/partials/footer.php'; ?>