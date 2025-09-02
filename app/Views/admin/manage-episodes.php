<?php require_once __DIR__ . '/partials/header.php'; ?>

<style>
    /* Enhanced Modern Episodes List Page with Rich Black-Gray Colors */
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
        --accent-orange: #f39c12;
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
        --gradient-7: linear-gradient(135deg, #f39c12, #f1c40f);
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
    .episodes-header {
        margin-bottom: 40px;
        padding: 32px;
        background: var(--secondary-bg);
        background-image: var(--gradient-7);
        background-blend-mode: overlay;
        border: 1px solid var(--border-color);
        border-radius: 20px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    }

    .episodes-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-7);
        border-radius: 20px 20px 0 0;
    }

    .episodes-header::after {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(243, 156, 18, 0.08), transparent);
        border-radius: 50%;
        pointer-events: none;
    }

    main h1 {
        font-size: 32px;
        font-weight: 800;
        color: var(--text-primary);
        margin: 0 0 16px 0;
        display: flex;
        align-items: center;
        gap: 16px;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
        position: relative;
        z-index: 1;
    }

    main h1::before {
        content: '🎬';
        width: 48px;
        height: 48px;
        background: var(--gradient-7);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        color: white;
        box-shadow: 0 4px 16px rgba(243, 156, 18, 0.3);
    }

    main p {
        margin: 0 0 24px 0;
        position: relative;
        z-index: 1;
    }

    main p a {
        color: var(--accent-blue);
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        padding: 8px 16px;
        border-radius: 8px;
        background: rgba(59, 130, 246, 0.1);
        border: 1px solid rgba(59, 130, 246, 0.3);
    }

    main p a:hover {
        background: var(--accent-blue);
        color: var(--primary-bg);
        transform: translateX(-4px);
    }

    .action-bar {
        margin: 20px 0;
        display: flex;
        justify-content: flex-end;
        gap: 16px;
        flex-wrap: wrap;
        position: relative;
        z-index: 1;
    }

    .action-bar .button {
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
        border: none;
        cursor: pointer;
        font-family: inherit;
    }

    .action-bar .button:hover {
        background: var(--accent-white);
        transform: translateY(-4px) scale(1.02);
        box-shadow: 0 12px 32px rgba(0, 255, 136, 0.4);
    }

    .action-bar .button:nth-child(2) {
        background: var(--accent-orange);
        box-shadow: 0 4px 16px rgba(243, 156, 18, 0.3);
    }

    .action-bar .button:nth-child(2):hover {
        background: var(--accent-white);
        box-shadow: 0 12px 32px rgba(243, 156, 18, 0.4);
    }

    /* Enhanced Table */
    .admin-table {
        border-collapse: separate;
        border-spacing: 0;
        width: 100%;
        background: var(--secondary-bg);
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        border: 1px solid var(--border-color);
        position: relative;
        z-index: 1;
    }

    .admin-table::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-7);
        border-radius: 16px 16px 0 0;
    }

    .admin-table th {
        background: var(--tertiary-bg);
        background-image: var(--gradient-2);
        color: var(--text-primary);
        padding: 20px 16px;
        text-align: left;
        font-weight: 700;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border-bottom: 2px solid var(--border-color);
        position: relative;
    }

    .admin-table th:first-child {
        border-top-left-radius: 16px;
    }

    .admin-table th:last-child {
        border-top-right-radius: 16px;
    }

    .admin-table td {
        padding: 20px 16px;
        border-bottom: 1px solid rgba(64, 64, 64, 0.3);
        background: var(--secondary-bg);
        color: var(--text-secondary);
        font-size: 15px;
        transition: all 0.3s ease;
        vertical-align: middle;
    }

    .admin-table tbody tr {
        transition: all 0.3s ease;
    }

    .admin-table tbody tr:hover {
        background: var(--tertiary-bg);
        box-shadow: 0 4px 16px rgba(243, 156, 18, 0.1);
    }

    .admin-table tbody tr:hover td {
        background: var(--tertiary-bg);
        color: var(--text-primary);
    }

    .admin-table tbody tr:last-child td:first-child {
        border-bottom-left-radius: 16px;
    }

    .admin-table tbody tr:last-child td:last-child {
        border-bottom-right-radius: 16px;
    }

    /* Enhanced Episode Still */
    .episode-still {
        width: 120px;
        height: 68px;
        object-fit: cover;
        border-radius: 8px;
        border: 2px solid var(--border-color);
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }

    .episode-still:hover {
        transform: scale(1.05);
        border-color: var(--accent-orange);
        box-shadow: 0 8px 24px rgba(243, 156, 18, 0.3);
    }

    /* Enhanced Badges */
    .badge {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        display: inline-block;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }

    .badge-published {
        background: var(--gradient-4);
        color: var(--primary-bg);
    }

    .badge-free {
        background: var(--gradient-6);
        color: var(--text-primary);
    }

    .badge-premium {
        background: var(--gradient-7);
        color: var(--primary-bg);
    }

    .badge:hover {
        transform: translateY(-2px) scale(1.05);
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.3);
    }

    /* Enhanced Toggle Switch */
    .toggle-switch {
        width: 50px;
        height: 26px;
        background: var(--accent-red);
        border-radius: 13px;
        position: relative;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        border: 2px solid var(--border-color);
    }

    .toggle-switch.toggled {
        background: var(--accent-green);
        border-color: var(--accent-green);
    }

    .toggle-switch::after {
        content: '';
        position: absolute;
        width: 18px;
        height: 18px;
        background: var(--text-primary);
        border-radius: 50%;
        top: 2px;
        left: 2px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
    }

    .toggle-switch.toggled::after {
        left: 26px;
        background: var(--primary-bg);
    }

    .toggle-switch:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }

    /* Enhanced Action Buttons */
    .content-actions {
        position: relative;
    }

    .options-btn {
        display: flex;
        align-items: center;
        gap: 8px;
        background: var(--tertiary-bg);
        background-image: var(--gradient-1);
        color: var(--text-primary);
        border: 1px solid var(--border-color);
        padding: 10px 16px;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 600;
        font-size: 13px;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .options-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }

    .options-btn:hover::before {
        left: 100%;
    }

    .options-btn:hover {
        background: var(--quaternary-bg);
        border-color: var(--border-hover);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
    }

    .options-dropdown {
        display: none;
        position: fixed;
        background: var(--tertiary-bg);
        border: 2px solid var(--border-color);
        border-radius: 12px;
        z-index: 1000;
        min-width: 180px;
        padding: 8px 0;
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.4);
        backdrop-filter: blur(10px);
    }

    .options-dropdown::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: var(--gradient-7);
        border-radius: 12px 12px 0 0;
    }

    .options-dropdown a,
    .options-dropdown button {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 16px;
        text-decoration: none;
        color: var(--text-secondary);
        font-size: 13px;
        font-weight: 600;
        transition: all 0.2s ease;
        border-bottom: 1px solid rgba(64, 64, 64, 0.3);
        background: none;
        border-left: none;
        border-right: none;
        border-top: none;
        width: 100%;
        text-align: left;
        cursor: pointer;
        font-family: inherit;
    }

    .options-dropdown a:last-child,
    .options-dropdown button:last-child {
        border-bottom: none;
    }

    .options-dropdown a:hover,
    .options-dropdown button:hover {
        background: var(--quaternary-bg);
        color: var(--accent-gold);
        transform: translateX(4px);
    }

    .options-dropdown a[style*="color: #ff4d4d"] {
        color: var(--accent-red) !important;
    }

    .options-dropdown a[style*="color: #ff4d4d"]:hover {
        color: var(--accent-white) !important;
        background: var(--accent-red) !important;
    }

    /* Modal Enhancements */
    .modal-overlay {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.8);
        backdrop-filter: blur(5px);
    }

    .modal-content {
        background: var(--secondary-bg);
        background-image: var(--gradient-2);
        margin: 10% auto;
        padding: 32px;
        border: 2px solid var(--border-color);
        width: 80%;
        max-width: 500px;
        border-radius: 16px;
        position: relative;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
        animation: slideInFromTop 0.3s ease-out;
    }

    .modal-content::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-7);
        border-radius: 16px 16px 0 0;
    }

    .modal-content h2 {
        color: var(--text-primary);
        margin: 0 0 20px 0;
        font-size: 24px;
        font-weight: 700;
    }

    .modal-content hr {
        border: none;
        height: 1px;
        background: var(--gradient-7);
        margin: 20px 0;
        opacity: 0.6;
    }

    .modal-close {
        color: var(--text-muted);
        position: absolute;
        top: 16px;
        right: 20px;
        font-size: 24px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
        padding: 8px;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .modal-close:hover {
        color: var(--accent-red);
        background: rgba(255, 68, 68, 0.1);
        transform: rotate(90deg);
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: var(--text-primary);
        font-weight: 600;
        font-size: 14px;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 12px 16px;
        box-sizing: border-box;
        background: var(--tertiary-bg);
        border: 2px solid var(--border-color);
        color: var(--text-primary);
        border-radius: 8px;
        font-size: 15px;
        transition: all 0.3s ease;
        font-family: inherit;
        resize: vertical;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: var(--accent-orange);
        box-shadow: 0 0 0 3px rgba(243, 156, 18, 0.1);
        background: var(--quaternary-bg);
    }

    .modal-content .button {
        background: var(--accent-orange);
        color: var(--primary-bg);
        padding: 12px 24px;
        text-decoration: none;
        border-radius: 8px;
        cursor: pointer;
        border: none;
        font-family: inherit;
        font-size: 15px;
        font-weight: 600;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .modal-content .button:hover {
        background: var(--accent-white);
        color: var(--primary-bg);
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(243, 156, 18, 0.4);
    }

    /* No Data State */
    .no-episodes-state {
        text-align: center;
        padding: 80px 32px;
        background: var(--secondary-bg);
        border: 1px solid var(--border-color);
        border-radius: 20px;
        margin-top: 32px;
        position: relative;
        overflow: hidden;
    }

    .no-episodes-state::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-7);
        opacity: 0.6;
    }

    .no-episodes-state h3 {
        font-size: 28px;
        font-weight: 700;
        color: var(--text-primary);
        margin: 0 0 16px 0;
    }

    .no-episodes-state p {
        font-size: 16px;
        color: var(--text-muted);
        margin: 0;
        max-width: 400px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* Animations */
    @keyframes slideInFromTop {
        from {
            opacity: 0;
            transform: translateY(-30px) scale(0.9);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .admin-table tbody tr {
        animation: slideInUp 0.4s ease-out;
    }

    .admin-table tbody tr:nth-child(1) { animation-delay: 0.1s; }
    .admin-table tbody tr:nth-child(2) { animation-delay: 0.2s; }
    .admin-table tbody tr:nth-child(3) { animation-delay: 0.3s; }
    .admin-table tbody tr:nth-child(4) { animation-delay: 0.4s; }
    .admin-table tbody tr:nth-child(5) { animation-delay: 0.5s; }

    /* Responsive Design */
    @media (max-width: 768px) {
        main {
            padding: 20px;
        }
        
        .episodes-header {
            padding: 20px;
        }
        
        main h1 {
            font-size: 24px;
            flex-direction: column;
            text-align: center;
        }
        
        .action-bar {
            flex-direction: column;
        }
        
        .admin-table {
            font-size: 14px;
        }
        
        .admin-table th,
        .admin-table td {
            padding: 12px 8px;
        }
        
        .episode-still {
            width: 80px;
            height: 45px;
        }
        
        .modal-content {
            margin: 20% auto;
            width: 95%;
            padding: 24px;
        }
    }
</style>

<main>
    <div class="episodes-header">
        <h1>Manage Episodes: <em style="color: #ccc;"><?php echo htmlspecialchars($tvShow['title']); ?> - <?php echo htmlspecialchars($season['name']); ?></em></h1>
        <p><a href="/admin/manage-seasons/<?php echo $tvShow['id']; ?>">&larr; Back to Seasons List</a></p>
        
        <div class="action-bar">
            <button type="button" class="button" id="addEpisodeBtn">Add Episode</button>
            <a href="/admin/manage-episodes/fetch/<?php echo $season['id']; ?>" class="button" onclick="return confirm('Are you sure? This will fetch all episode data for this season from TMDb.');">Fetch All Episodes</a>
        </div>
    </div>

    <?php if (!empty($episodes)): ?>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Thumbnail</th>
                    <th>Episode Name</th>
                    <th>Downloadable</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($episodes as $episode): ?>
                    <tr>
                        <td><?php echo $episode['episode_number']; ?></td>
                        <td><img class="episode-still" src="<?php echo !empty($episode['still_path']) ? 'https://image.tmdb.org/t/p/w300'.$episode['still_path'] : 'https://via.placeholder.com/120x68.png?text=N/A'; ?>" alt=""></td>
                        <td><?php echo htmlspecialchars($episode['name']); ?></td>
                        <td><div class="toggle-switch <?php echo $episode['is_downloadable'] ? 'toggled' : ''; ?>"></div></td>
                        <td><span class="badge <?php echo $episode['type'] == 'premium' ? 'badge-premium' : 'badge-free'; ?>"><?php echo htmlspecialchars($episode['type']); ?></span></td>
                        <td><span class="badge badge-published"><?php echo htmlspecialchars($episode['status']); ?></span></td>
                        <td class="content-actions">
                            <button type="button" class="options-btn" onclick="toggleDropdown(this, event)">Options ▼</button>
                            <div class="options-dropdown">
                                <button type="button" class="edit-episode-btn" data-episode-info='<?php echo htmlspecialchars(json_encode($episode)); ?>'>Edit Episode</button>
                                <a href="/admin/manage-episode-links/<?php echo $episode['id']; ?>">Manage Links</a>
                                <a href="/admin/manage-episodes/delete/<?php echo $episode['id']; ?>" onclick="return confirm('Are you sure? This will delete the episode and all its associated data!');" style="color: #ff4d4d;">Delete</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="no-episodes-state">
            <h3>No Episodes Found</h3>
            <p>No episodes found for this season in the database. Start by adding your first episode.</p>
        </div>
    <?php endif; ?>
</main>

<div id="addEpisodeModal" class="modal-overlay">
    <div class="modal-content">
        <span class="modal-close" id="closeAddModalBtn">&times;</span>
        <h2>Add New Episode</h2>
        <hr>
        <form action="/admin/manage-episodes/add/<?php echo $season['id']; ?>" method="POST">
            <div class="form-group">
                <label for="episode_number">Episode Number</label>
                <input type="number" id="episode_number" name="episode_number" placeholder="e.g., 1" required>
            </div>
            <div class="form-group">
                <label for="name">Episode Title</label>
                <input type="text" id="name" name="name" placeholder="e.g., Pilot" required>
            </div>
            <div class="form-group">
                <label for="overview">Overview</label>
                <textarea id="overview" name="overview" rows="4"></textarea>
            </div>
            <button type="submit" class="button">Create Episode</button>
        </form>
    </div>
</div>

<div id="editEpisodeModal" class="modal-overlay">
    <div class="modal-content">
        <span class="modal-close" id="closeEditModalBtn">&times;</span>
        <h2>Edit Episode</h2>
        <hr>
        <form id="editEpisodeForm" action="" method="POST">
            <div class="form-group">
                <label for="edit_episode_number">Episode Number</label>
                <input type="number" id="edit_episode_number" name="episode_number" required>
            </div>
            <div class="form-group">
                <label for="edit_name">Episode Title</label>
                <input type="text" id="edit_name" name="name" required>
            </div>
            <div class="form-group">
                <label for="edit_overview">Overview</label>
                <textarea id="edit_overview" name="overview" rows="4"></textarea>
            </div>
            <div class="form-group">
                <label for="edit_air_date">Air Date</label>
                <input type="date" id="edit_air_date" name="air_date">
            </div>
            <button type="submit" class="button">Save Changes</button>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Enhanced dropdown functionality - Keep original working code
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
            
            // Add animation
            dropdown.style.opacity = '0';
            dropdown.style.transform = 'translateY(-10px)';
            setTimeout(() => {
                dropdown.style.transition = 'all 0.3s ease';
                dropdown.style.opacity = '1';
                dropdown.style.transform = 'translateY(0)';
            }, 10);
        }
    }

    // Make toggleDropdown globally available
    window.toggleDropdown = toggleDropdown;

    // Close dropdowns when clicking anywhere else
    window.addEventListener('click', function(event) {
        if (!event.target.matches('.options-btn')) {
            document.querySelectorAll('.options-dropdown').forEach(function(d) {
                d.style.display = 'none';
            });
        }
    });

    // Add Modal JS
    var addModal = document.getElementById("addEpisodeModal");
    var addBtn = document.getElementById("addEpisodeBtn");
    var closeAddBtn = document.getElementById("closeAddModalBtn");
    addBtn.onclick = function() { 
        addModal.style.display = "block";
        document.body.style.overflow = "hidden";
    }
    closeAddBtn.onclick = function() { 
        addModal.style.display = "none";
        document.body.style.overflow = "auto";
    }

    // Edit Modal JS
    var editModal = document.getElementById("editEpisodeModal");
    var closeEditBtn = document.getElementById("closeEditModalBtn");
    var editForm = document.getElementById("editEpisodeForm");

    document.querySelectorAll('.edit-episode-btn').forEach(function(button) {
        button.addEventListener('click', function() {
            var episodeData = JSON.parse(this.getAttribute('data-episode-info'));
            
            editForm.action = '/admin/manage-episodes/edit/' + episodeData.id;
            
            document.getElementById('edit_episode_number').value = episodeData.episode_number;
            document.getElementById('edit_name').value = episodeData.name;
            document.getElementById('edit_overview').value = episodeData.overview;
            document.getElementById('edit_air_date').value = episodeData.air_date;

            editModal.style.display = "block";
            document.body.style.overflow = "hidden";
        });
    });
    
    closeEditBtn.onclick = function() { 
        editModal.style.display = "none";
        document.body.style.overflow = "auto";
    }

    // Close modals when clicking outside
    window.addEventListener('click', function(event) {
        if (event.target == addModal) {
            addModal.style.display = "none";
            document.body.style.overflow = "auto";
        }
        if (event.target == editModal) {
            editModal.style.display = "none";
            document.body.style.overflow = "auto";
        }
    });

    // Enhanced button interactions
    document.querySelectorAll('.button, .options-btn').forEach(btn => {
        btn.addEventListener('mouseenter', function() {
            if (!this.classList.contains('options-btn')) {
                this.style.transform = 'translateY(-2px) scale(1.02)';
            } else {
                this.style.transform = 'translateY(-1px)';
            }
        });
        
        btn.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
        
        btn.addEventListener('mousedown', function() {
            this.style.transform = 'translateY(0) scale(0.98)';
        });
        
        btn.addEventListener('mouseup', function() {
            if (!this.classList.contains('options-btn')) {
                this.style.transform = 'translateY(-2px) scale(1.02)';
            } else {
                this.style.transform = 'translateY(-1px)';
            }
        });
    });

    // Enhanced dropdown menu interactions
    document.querySelectorAll('.options-dropdown a, .options-dropdown button').forEach(link => {
        link.addEventListener('mouseenter', function() {
            this.style.paddingLeft = '20px';
        });
        
        link.addEventListener('mouseleave', function() {
            this.style.paddingLeft = '16px';
        });
    });

    // Enhanced form input interactions
    document.querySelectorAll('.form-group input, .form-group textarea').forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.style.transform = 'translateY(-2px)';
        });
        
        input.addEventListener('blur', function() {
            this.parentElement.style.transform = 'translateY(0)';
        });
    });

    // Create floating particles effect
    function createFloatingParticles() {
        const container = document.querySelector('main');
        const particlesCount = 5;
        
        for (let i = 0; i < particlesCount; i++) {
            const particle = document.createElement('div');
            particle.style.cssText = `
                position: absolute;
                width: 3px;
                height: 3px;
                background: radial-gradient(circle, rgba(243, 156, 18, 0.4), transparent);
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

    // Add floating animation keyframes
    if (!document.querySelector('#floatAnimation')) {
        const style = document.createElement('style');
        style.id = 'floatAnimation';
        style.textContent = `
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
        `;
        document.head.appendChild(style);
    }

    // Add ripple effect to buttons
    document.querySelectorAll('.button').forEach(button => {
        button.addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;
            
            ripple.style.cssText = `
                position: absolute;
                width: ${size}px;
                height: ${size}px;
                left: ${x}px;
                top: ${y}px;
                background: rgba(255, 255, 255, 0.3);
                border-radius: 50%;
                transform: scale(0);
                animation: ripple 0.6s ease-out;
                pointer-events: none;
            `;
            
            this.style.position = 'relative';
            this.style.overflow = 'hidden';
            this.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });

    // Add ripple animation keyframes
    if (!document.querySelector('#rippleAnimation')) {
        const style = document.createElement('style');
        style.id = 'rippleAnimation';
        style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(2);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    }
});
</script>
    
<?php require_once __DIR__ . '/partials/footer.php'; ?>