<?php require_once __DIR__ . '/partials/header.php'; ?>

<style>
    /* Enhanced Modern Episode Links Page with Rich Black-Gray Colors */
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

    .list-title-section h1 em {
        color: var(--accent-gold);
        font-style: normal;
        text-shadow: 0 0 8px rgba(255, 215, 0, 0.3);
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

    .back-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: var(--accent-blue);
        text-decoration: none;
        font-weight: 600;
        margin-bottom: 20px;
        padding: 8px 16px;
        background: var(--secondary-bg);
        border-radius: 8px;
        border: 1px solid var(--border-color);
        transition: all 0.3s ease;
    }

    .back-link:hover {
        background: var(--tertiary-bg);
        color: var(--accent-white);
        transform: translateX(-4px);
    }

    .action-bar {
        margin-bottom: 32px;
        padding: 0;
    }

    .button, .add-new-link {
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
    }

    .button:hover, .add-new-link:hover {
        background: var(--accent-white);
        transform: translateY(-4px) scale(1.02);
        box-shadow: 0 12px 32px rgba(0, 255, 136, 0.4);
    }

    .list-divider {
        border: none;
        height: 2px;
        background: var(--gradient-6);
        margin: 32px 0;
        border-radius: 2px;
        box-shadow: 0 2px 8px rgba(59, 130, 246, 0.2);
    }

    /* Enhanced Table Design */
    .table-container {
        background: var(--secondary-bg);
        border-radius: 20px;
        border: 1px solid var(--border-color);
        overflow: hidden;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        position: relative;
    }

    .table-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-6);
    }

    .admin-table {
        border-collapse: collapse;
        width: 100%;
        background: transparent;
        font-family: inherit;
    }

    .admin-table th {
        background: var(--tertiary-bg);
        background-image: var(--gradient-2);
        color: var(--text-primary);
        padding: 20px 24px;
        text-align: left;
        vertical-align: middle;
        font-weight: 700;
        font-size: 14px;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        border: none;
        border-bottom: 2px solid var(--border-color);
        position: relative;
    }

    .admin-table th:first-child {
        border-radius: 0;
    }

    .admin-table th:last-child {
        border-radius: 0;
    }

    .admin-table td {
        background: var(--secondary-bg);
        color: var(--text-secondary);
        padding: 20px 24px;
        text-align: left;
        vertical-align: middle;
        border: none;
        border-bottom: 1px solid rgba(64, 64, 64, 0.3);
        font-size: 14px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .admin-table tr:hover td {
        background: var(--tertiary-bg);
        color: var(--text-primary);
    }

    .admin-table tr:last-child td {
        border-bottom: none;
    }

    /* Enhanced Options Button and Dropdown */
    .options-btn {
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
        font-family: inherit;
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
        min-width: 200px;
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
        background: var(--gradient-6);
        border-radius: 12px 12px 0 0;
    }

    .options-dropdown a, .options-dropdown button {
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
        background: none;
        border-top: none;
        border-left: none;
        border-right: none;
        width: 100%;
        text-align: left;
        cursor: pointer;
        font-family: inherit;
    }

    .options-dropdown a:last-child, .options-dropdown button:last-child {
        border-bottom: none;
    }

    .options-dropdown a:hover, .options-dropdown button:hover {
        background: var(--quaternary-bg);
        color: var(--accent-gold);
        transform: translateX(4px);
    }

    .options-dropdown a[style*="color: #ff4d4d"] {
        color: var(--accent-red) !important;
    }

    .options-dropdown a[style*="color: #ff4d4d"]:hover {
        color: var(--accent-white) !important;
        background: var(--accent-red);
    }

    /* No Data State */
    .no-data-state {
        text-align: center;
        padding: 80px 32px;
        background: var(--secondary-bg);
        border: 1px solid var(--border-color);
        border-radius: 20px;
        margin-top: 32px;
        position: relative;
        overflow: hidden;
    }

    .no-data-state::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-6);
        opacity: 0.6;
    }

    .no-data-state i {
        font-size: 64px;
        margin-bottom: 24px;
        color: var(--accent-blue);
        opacity: 0.8;
        animation: float 3s ease-in-out infinite alternate;
    }

    .no-data-state h3 {
        font-size: 28px;
        font-weight: 700;
        color: var(--text-primary);
        margin: 0 0 16px 0;
    }

    .no-data-state p {
        font-size: 16px;
        color: var(--text-muted);
        margin: 0;
        max-width: 400px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* Enhanced Modal Styles */
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
        margin: 5% auto;
        padding: 32px;
        border: 2px solid var(--border-color);
        width: 80%;
        max-width: 700px;
        border-radius: 20px;
        position: relative;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
        animation: modalSlideIn 0.3s ease-out;
    }

    @keyframes modalSlideIn {
        from {
            opacity: 0;
            transform: translateY(-50px) scale(0.95);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    .modal-content::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-6);
        border-radius: 20px 20px 0 0;
    }

    .modal-content h2 {
        color: var(--text-primary);
        font-size: 24px;
        font-weight: 700;
        margin: 0 0 24px 0;
        text-align: center;
    }

    .modal-close {
        color: var(--text-muted);
        position: absolute;
        top: 20px;
        right: 28px;
        font-size: 32px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .modal-close:hover {
        color: var(--accent-red);
        transform: scale(1.2);
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 24px;
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
        letter-spacing: 0.5px;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 14px 16px;
        box-sizing: border-box;
        background-color: var(--tertiary-bg);
        border: 2px solid var(--border-color);
        color: var(--text-primary);
        border-radius: 12px;
        font-size: 14px;
        font-family: inherit;
        transition: all 0.3s ease;
    }

    .form-group input:focus,
    .form-group select:focus {
        outline: none;
        border-color: var(--accent-blue);
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        background-color: var(--quaternary-bg);
    }

    .form-group.full-width {
        grid-column: 1 / -1;
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .list-header-content {
            flex-direction: column;
            align-items: stretch;
        }
        
        .list-title-section h1 {
            font-size: 24px;
            justify-content: center;
        }
        
        .admin-table th,
        .admin-table td {
            padding: 16px 20px;
        }
        
        .form-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {
        .main-content {
            padding: 20px;
        }
        
        .list-header {
            padding: 20px;
        }
        
        .modal-content {
            margin: 10% auto;
            width: 95%;
            padding: 24px;
        }
        
        .admin-table th,
        .admin-table td {
            padding: 12px 16px;
            font-size: 12px;
        }
        
        .options-btn {
            padding: 8px 12px;
            font-size: 12px;
        }
    }

    @media (max-width: 480px) {
        .admin-table {
            font-size: 11px;
        }
        
        .admin-table th,
        .admin-table td {
            padding: 8px 12px;
        }
        
        .list-title-section h1 {
            font-size: 20px;
        }
        
        .modal-content h2 {
            font-size: 20px;
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

    .admin-table tr {
        animation: slideInUp 0.6s ease-out;
    }

    .admin-table tr:nth-child(1) { animation-delay: 0.1s; }
    .admin-table tr:nth-child(2) { animation-delay: 0.2s; }
    .admin-table tr:nth-child(3) { animation-delay: 0.3s; }
    .admin-table tr:nth-child(4) { animation-delay: 0.4s; }
    .admin-table tr:nth-child(5) { animation-delay: 0.5s; }

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
    <!-- Back Link -->
    <a href="/admin/manage-episodes/<?php echo $season['id']; ?>" class="back-link">
        <i class="fas fa-arrow-left"></i>
        Back to Episodes List
    </a>

    <!-- Enhanced Header Section -->
    <div class="list-header">
        <div class="list-header-content">
            <div class="list-title-section">
                <h1>
                    <div class="list-title-icon">
                        <i class="fas fa-link"></i>
                    </div>
                    Manage Links for: <em><?php echo htmlspecialchars($episode['name']); ?></em>
                </h1>
            </div>
            <div class="action-bar">
                <button type="button" class="button" id="addLinkBtn">
                    <i class="fas fa-plus"></i>
                    Add Stream Link
                </button>
            </div>
        </div>
    </div>
    
    <hr class="list-divider">
    
    <!-- Enhanced Table -->
    <?php if (!empty($links)): ?>
        <div class="table-container">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Label</th>
                        <th>Quality</th>
                        <th>Size</th>
                        <th>Source</th>
                        <th>Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($links as $link): ?>
                        <tr>
                            <td><?php echo $link['id']; ?></td>
                            <td><?php echo htmlspecialchars($link['label'] ?? 'N/A'); ?></td>
                            <td><?php echo htmlspecialchars($link['quality'] ?? 'N/A'); ?></td>
                            <td><?php echo htmlspecialchars($link['size'] ?? 'N/A'); ?></td>
                            <td><?php echo htmlspecialchars($link['source']); ?></td>
                            <td><?php echo htmlspecialchars($link['link_type']); ?></td>
                            <td class="content-actions">
                                <button type="button" class="options-btn" onclick="toggleDropdown(this, event)">
                                    <i class="fas fa-cog"></i>
                                    Options
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="options-dropdown">
                                    <button type="button" class="edit-link-btn" data-link-info='<?php echo htmlspecialchars(json_encode($link)); ?>'>
                                        <i class="fas fa-edit"></i>
                                        Edit Link
                                    </button>
                                    <a href="/admin/manage_subtitles/<?php echo $link['id']; ?>">
                                        <i class="fas fa-closed-captioning"></i>
                                        Manage Subtitle
                                    </a>
                                    <a href="#">
                                        <i class="fas fa-envelope"></i>
                                        Send Email Notification
                                    </a>
                                    <a href="/admin/manage-episode-links/delete/<?php echo $link['id']; ?>/<?php echo $episode['id']; ?>" onclick="return confirm('Are you sure?');" style="color: #ff4d4d;">
                                        <i class="fas fa-trash"></i>
                                        Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="no-data-state">
            <i class="fas fa-link"></i>
            <h3>No Video Links Found</h3>
            <p>No video links found for this episode. Start by adding your first stream link to make this episode available for viewing.</p>
        </div>
    <?php endif; ?>
</main>

<!-- Add Link Modal -->
<div id="addLinkModal" class="modal-overlay">
    <div class="modal-content">
        <span class="modal-close" id="closeAddModalBtn">&times;</span>
        <h2>Add Stream Link (<?php echo htmlspecialchars($episode['name']); ?>)</h2>
        <hr class="list-divider">
        <form action="/admin/manage-episode-links/<?php echo $episode['id']; ?>" method="POST">
            <div class="form-grid">
                <div class="form-group">
                    <label for="label">Label</label>
                    <input type="text" id="label" name="label" placeholder="e.g., Server #1, Google Drive">
                </div>
                <div class="form-group">
                    <label for="quality">Quality</label>
                    <input type="text" id="quality" name="quality" placeholder="e.g., 1080p, 720p">
                </div>
                <div class="form-group">
                    <label for="size">Size</label>
                    <input type="text" id="size" name="size" placeholder="e.g., 1.0GB">
                </div>
                <div class="form-group">
                    <label for="source">Source</label>
                    <select id="source" name="source">
                        <option value="Youtube">Youtube</option>
                        <option value="Vimeo">Vimeo</option>
                        <option value="Dailymotion">Dailymotion</option>
                        <option value="Mp4_From_Url">Mp4 From Url</option>
                        <option value="Mkv_From_Url">Mkv From Url</option>
                        <option value="M3u8_From_Url">M3u8 From Url</option>
                        <option value="Dash_From_Url">Dash From Url</option>
                        <option value="Embed_Url">Embed Url</option>
                        <option value="DoodStream">DoodStream</option>
                        <option value="Dropbox">Dropbox</option>
                        <option value="Facebook">Facebook</option>
                        <option value="Fembed">Fembed</option>
                        <option value="GogoAnime">GogoAnime</option>
                        <option value="GoogleDrive">GoogleDrive</option>
                        <option value="MixDrop">MixDrop</option>
                        <option value="OK.ru">OK.ru</option>
                        <option value="Onedrive">Onedrive</option>
                        <option value="Streamtape">Streamtape</option>
                        <option value="Streamwish">Streamwish</option>
                        <option value="Torrent">Torrent</option>
                        <option value="Twitter">Twitter</option>
                        <option value="VK">VK</option>
                        <option value="Yandex">Yandex</option>
                    </select>
                </div>
                <div class="form-group full-width">
                    <label for="url">URL</label>
                    <input type="text" id="url" name="url" required>
                </div>
                <div class="form-group">
                    <label for="link_type">Type</label>
                    <select id="link_type" name="link_type">
                        <option value="stream">Stream</option>
                        <option value="download">Download</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" name="status">
                        <option value="publish">Publish</option>
                        <option value="draft">Draft</option>
                    </select>
                </div>
            </div>
            <hr class="list-divider">
            <button type="submit" class="button">
                <i class="fas fa-save"></i>
                Add Link
            </button>
        </form>
    </div>
</div>

<!-- Edit Link Modal -->
<div id="editLinkModal" class="modal-overlay">
    <div class="modal-content">
        <span class="modal-close" id="closeEditModalBtn">&times;</span>
        <h2>Edit Stream Link</h2>
        <hr class="list-divider">
        <form id="editLinkForm" action="" method="POST">
            <div class="form-grid">
                <div class="form-group">
                    <label for="edit_label">Label</label>
                    <input type="text" id="edit_label" name="label">
                </div>
                <div class="form-group">
                    <label for="edit_quality">Quality</label>
                    <input type="text" id="edit_quality" name="quality">
                </div>
                <div class="form-group">
                    <label for="edit_size">Size</label>
                    <input type="text" id="edit_size" name="size">
                </div>
                <div class="form-group">
                    <label for="edit_source">Source</label>
                    <select id="edit_source" name="source">
                        <option value="Youtube">Youtube</option>
                        <option value="Vimeo">Vimeo</option>
                        <option value="Dailymotion">Dailymotion</option>
                        <option value="Mp4_From_Url">Mp4 From Url</option>
                        <option value="Mkv_From_Url">Mkv From Url</option>
                        <option value="M3u8_From_Url">M3u8 From Url</option>
                        <option value="Dash_From_Url">Dash From Url</option>
                        <option value="Embed_Url">Embed Url</option>
                        <option value="DoodStream">DoodStream</option>
                        <option value="Dropbox">Dropbox</option>
                        <option value="Facebook">Facebook</option>
                        <option value="Fembed">Fembed</option>
                        <option value="GogoAnime">GogoAnime</option>
                        <option value="GoogleDrive">GoogleDrive</option>
                        <option value="MixDrop">MixDrop</option>
                        <option value="OK.ru">OK.ru</option>
                        <option value="Onedrive">Onedrive</option>
                        <option value="Streamtape">Streamtape</option>
                        <option value="Streamwish">Streamwish</option>
                        <option value="Torrent">Torrent</option>
                        <option value="Twitter">Twitter</option>
                        <option value="VK">VK</option>
                        <option value="Yandex">Yandex</option>
                    </select>
                </div>
                <div class="form-group full-width">
                    <label for="edit_url">URL</label>
                    <input type="text" id="edit_url" name="url" required>
                </div>
                <div class="form-group">
                    <label for="edit_link_type">Type</label>
                    <select id="edit_link_type" name="link_type">
                        <option value="stream">Stream</option>
                        <option value="download">Download</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="edit_status">Status</label>
                    <select id="edit_status" name="status">
                        <option value="publish">Publish</option>
                        <option value="draft">Draft</option>
                    </select>
                </div>
            </div>
            <hr class="list-divider">
            <button type="submit" class="button">
                <i class="fas fa-save"></i>
                Save Changes
            </button>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Enhanced dropdown functionality (preserving original logic)
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
        if (!event.target.matches('.options-btn') && !event.target.closest('.options-btn')) {
            document.querySelectorAll('.options-dropdown').forEach(function(d) {
                d.style.display = 'none';
            });
        }
    });

    // Add Modal JS (preserving original functionality)
    var addModal = document.getElementById("addLinkModal");
    var addBtn = document.getElementById("addLinkBtn");
    var closeAddBtn = document.getElementById("closeAddModalBtn");
    if(addBtn) { addBtn.onclick = function() { addModal.style.display = "block"; } }
    if(closeAddBtn) { closeAddBtn.onclick = function() { addModal.style.display = "none"; } }

    // Edit Modal JS (preserving original functionality)
    var editModal = document.getElementById("editLinkModal");
    var closeEditBtn = document.getElementById("closeEditModalBtn");
    document.querySelectorAll('.edit-link-btn').forEach(function(button) {
        button.addEventListener('click', function() {
            var linkData = JSON.parse(this.getAttribute('data-link-info'));
            
            var editForm = document.getElementById('editLinkForm');
            editForm.action = '/admin/manage-episode-links/edit/' + linkData.id;
            
            document.getElementById('edit_label').value = linkData.label;
            document.getElementById('edit_quality').value = linkData.quality;
            document.getElementById('edit_size').value = linkData.size;
            document.getElementById('edit_source').value = linkData.source;
            document.getElementById('edit_url').value = linkData.url;
            document.getElementById('edit_link_type').value = linkData.link_type;
            document.getElementById('edit_status').value = linkData.status;

            editModal.style.display = "block";
        });
    });
    if(closeEditBtn) { closeEditBtn.onclick = function() { editModal.style.display = "none"; } }
    
    // Close modals if clicking outside
    window.addEventListener('click', function(event) {
        if (event.target == addModal) {
            addModal.style.display = "none";
        }
        if (event.target == editModal) {
            editModal.style.display = "none";
        }
    });

    // Enhanced button interactions
    document.querySelectorAll('.options-btn, .button, .back-link').forEach(btn => {
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

    // Enhanced table row interactions
    document.querySelectorAll('.admin-table tr').forEach((row, index) => {
        if (index > 0) { // Skip header row
            row.addEventListener('mouseenter', function() {
                // Create subtle ripple effect
                const ripple = document.createElement('div');
                ripple.style.cssText = `
                    position: absolute;
                    top: 50%;
                    left: 0;
                    width: 0;
                    height: 2px;
                    background: linear-gradient(90deg, transparent, rgba(59, 130, 246, 0.3), transparent);
                    pointer-events: none;
                    animation: tableRipple 0.6s ease-out;
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
        }
    });

    // Enhanced dropdown menu interactions
    document.querySelectorAll('.options-dropdown a, .options-dropdown button').forEach(link => {
        link.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(8px)';
        });
        
        link.addEventListener('mouseleave', function() {
            this.style.transform = 'translateX(4px)';
        });
    });

    // Enhanced confirmation dialogs
    document.querySelectorAll('.options-dropdown a[style*="color: #ff4d4d"]').forEach(deleteBtn => {
        deleteBtn.addEventListener('click', function(e) {
            const confirmDelete = confirm(`⚠️ Are you sure you want to delete this link?\n\nThis action cannot be undone.`);
            if (!confirmDelete) {
                e.preventDefault();
                return false;
            }
            
            // Add loading animation
            this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Deleting...';
            this.style.pointerEvents = 'none';
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
            @keyframes tableRipple {
                0% {
                    width: 0;
                    opacity: 1;
                }
                100% {
                    width: 100%;
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    }

    // Form input enhancements
    document.querySelectorAll('input, select').forEach(input => {
        input.addEventListener('focus', function() {
            this.style.transform = 'scale(1.02)';
            this.style.boxShadow = '0 0 0 3px rgba(59, 130, 246, 0.1), 0 4px 12px rgba(0, 0, 0, 0.15)';
        });
        
        input.addEventListener('blur', function() {
            this.style.transform = 'scale(1)';
            this.style.boxShadow = '';
        });
    });
});
</script>
    
<?php require_once __DIR__ . '/partials/footer.php'; ?>