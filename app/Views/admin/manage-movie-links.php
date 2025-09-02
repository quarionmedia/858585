<?php require_once __DIR__ . '/partials/footer.php'; ?><?php require_once __DIR__ . '/partials/header.php'; ?>

<style>
    /* Enhanced Modern Movies Links Management Page with Rich Black-Gray Colors */
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
    main h1 {
        font-size: 32px;
        font-weight: 800;
        color: var(--text-primary);
        margin: 0 0 20px 0;
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
        background: var(--gradient-6);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        box-shadow: 0 4px 16px rgba(59, 130, 246, 0.3);
    }

    main p {
        margin: 0 0 20px 0;
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
        background: var(--secondary-bg);
        border: 1px solid var(--border-color);
    }

    main p a:hover {
        color: var(--accent-white);
        background: var(--accent-blue);
        transform: translateY(-2px);
        box-shadow: 0 4px 16px rgba(59, 130, 246, 0.3);
    }

    main hr {
        border: none;
        height: 2px;
        background: var(--gradient-6);
        margin: 32px 0;
        border-radius: 2px;
        box-shadow: 0 2px 8px rgba(59, 130, 246, 0.2);
        position: relative;
        z-index: 1;
    }

    /* Enhanced Action Bar */
    .action-bar {
        margin: 32px 0;
        padding: 24px;
        background: var(--secondary-bg);
        background-image: var(--gradient-6);
        background-blend-mode: overlay;
        border: 1px solid var(--border-color);
        border-radius: 16px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        z-index: 1;
    }

    .action-bar::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-6);
        border-radius: 16px 16px 0 0;
    }

    .action-bar .button, .modal-content .button {
        background: var(--accent-green);
        color: var(--primary-bg);
        padding: 16px 24px;
        text-decoration: none;
        border-radius: 12px;
        cursor: pointer;
        border: none;
        font-family: 'Inter', sans-serif;
        font-size: 16px;
        font-weight: 700;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 4px 16px rgba(0, 255, 136, 0.3);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        position: relative;
        z-index: 1;
    }

    .action-bar .button:hover, .modal-content .button:hover {
        background: var(--accent-white);
        transform: translateY(-4px) scale(1.02);
        box-shadow: 0 12px 32px rgba(0, 255, 136, 0.4);
    }

    /* Enhanced Table Styles */
    .admin-table {
        border-collapse: collapse;
        width: 100%;
        background: var(--secondary-bg);
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        border: 1px solid var(--border-color);
        position: relative;
        z-index: 1;
    }

    .admin-table th {
        background: var(--tertiary-bg);
        background-image: var(--gradient-1);
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

    .admin-table th::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: var(--gradient-6);
        opacity: 0.6;
    }

    .admin-table td {
        padding: 16px;
        text-align: left;
        vertical-align: middle;
        border-bottom: 1px solid var(--border-color);
        color: var(--text-secondary);
        font-size: 14px;
        transition: all 0.3s ease;
    }

    .admin-table tr:hover td {
        background: var(--tertiary-bg);
        color: var(--text-primary);
    }

    .admin-table tr:last-child td {
        border-bottom: none;
    }

    /* Enhanced Options Button */
    .options-btn {
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
        display: flex;
        align-items: center;
        gap: 8px;
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

    /* Enhanced Dropdown */
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
        background: none;
        border: none;
        width: 100%;
        text-align: left;
        cursor: pointer;
        font-family: 'Inter', sans-serif;
        font-size: 14px;
        font-weight: 600;
        transition: all 0.2s ease;
        border-bottom: 1px solid rgba(64, 64, 64, 0.3);
    }

    .options-dropdown a:last-child, .options-dropdown button:last-child {
        border-bottom: none;
    }

    .options-dropdown a:hover, .options-dropdown button:hover {
        background: var(--quaternary-bg);
        color: var(--accent-gold);
        transform: translateX(4px);
    }

    .options-dropdown a[style*="color: #ff4d4d"], 
    .options-dropdown a:hover[style*="color: #ff4d4d"] {
        color: var(--accent-red) !important;
    }

    .options-dropdown a[style*="color: #ff4d4d"]:hover {
        color: var(--accent-white) !important;
        background: var(--accent-red) !important;
        transform: translateX(4px);
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
        margin: 2% auto;
        padding: 32px;
        border: 2px solid var(--border-color);
        width: 90%;
        max-width: 800px;
        border-radius: 20px;
        position: relative;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
        animation: modalSlideIn 0.3s ease-out;
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

    .modal-close {
        color: var(--text-muted);
        position: absolute;
        top: 16px;
        right: 24px;
        font-size: 32px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: var(--tertiary-bg);
    }

    .modal-close:hover {
        color: var(--accent-red);
        background: var(--quaternary-bg);
        transform: scale(1.1);
    }

    .modal-content h2 {
        font-size: 24px;
        font-weight: 700;
        color: var(--text-primary);
        margin: 0 0 24px 0;
        padding-right: 60px;
    }

    .modal-content hr {
        border: none;
        height: 1px;
        background: var(--border-color);
        margin: 24px 0;
    }

    /* Enhanced Form Styles */
    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin: 24px 0;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: var(--text-primary);
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .form-group input, .form-group select {
        width: 100%;
        padding: 12px 16px;
        box-sizing: border-box;
        background: var(--tertiary-bg);
        border: 2px solid var(--border-color);
        color: var(--text-primary);
        border-radius: 12px;
        font-size: 14px;
        font-family: 'Inter', sans-serif;
        transition: all 0.3s ease;
    }

    .form-group input:focus, .form-group select:focus {
        outline: none;
        border-color: var(--accent-blue);
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        background: var(--quaternary-bg);
    }

    .form-group.full-width {
        grid-column: 1 / -1;
    }

    /* Content Actions Positioning */
    .content-actions {
        position: relative;
    }

    /* No Data State */
    .admin-table tbody tr td[colspan] {
        text-align: center;
        padding: 60px 32px;
        background: var(--tertiary-bg);
        color: var(--text-muted);
        font-size: 18px;
        font-weight: 600;
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .form-grid {
            grid-template-columns: 1fr;
        }
        
        .admin-table {
            font-size: 12px;
        }
        
        .admin-table th, .admin-table td {
            padding: 12px 8px;
        }
    }

    @media (max-width: 768px) {
        main {
            padding: 20px;
        }
        
        main h1 {
            font-size: 24px;
            flex-direction: column;
            text-align: center;
        }
        
        .action-bar {
            padding: 16px;
        }
        
        .modal-content {
            margin: 5% auto;
            width: 95%;
            padding: 20px;
        }
        
        .admin-table {
            display: block;
            overflow-x: auto;
            white-space: nowrap;
        }
    }

    @media (max-width: 480px) {
        .options-dropdown {
            min-width: 160px;
        }
        
        .modal-content h2 {
            font-size: 20px;
        }
        
        .form-group input, .form-group select {
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

    .admin-table tbody tr {
        animation: slideInUp 0.6s ease-out;
    }

    .admin-table tbody tr:nth-child(1) { animation-delay: 0.1s; }
    .admin-table tbody tr:nth-child(2) { animation-delay: 0.2s; }
    .admin-table tbody tr:nth-child(3) { animation-delay: 0.3s; }
    .admin-table tbody tr:nth-child(4) { animation-delay: 0.4s; }
    .admin-table tbody tr:nth-child(5) { animation-delay: 0.5s; }

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

<main>
    <h1>Manage Links for: <em style="color: #ccc;"><?php echo htmlspecialchars($movie['title']); ?></em></h1>
    <p><a href="/admin/movies/edit/<?php echo $movie['id']; ?>">&larr; Back to Movie Edit</a></p>
    <hr>

    <div class="action-bar">
        <button type="button" class="button" id="addLinkBtn">
            <i class="fas fa-plus"></i>
            Add Stream Link
        </button>
    </div>

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
            <?php if (!empty($links)): ?>
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
                                    Send Notification
                                </a>
                                <a href="/admin/manage-movie-links/delete/<?php echo $link['id']; ?>/<?php echo $movie['id']; ?>" onclick="return confirm('Are you sure?');" style="color: #ff4d4d;">
                                    <i class="fas fa-trash"></i>
                                    Delete
                                </a>
                             </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">No video links found for this movie.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</main>

<div id="addLinkModal" class="modal-overlay">
    <div class="modal-content">
        <span class="modal-close" id="closeModalBtn">&times;</span>
        <h2>Add Stream Link (<?php echo htmlspecialchars($movie['title']); ?>)</h2>
        <hr>
        <form action="/admin/manage-movie-links/<?php echo $movie['id']; ?>" method="POST">
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
                        <option value="Youtube">Youtube</option><option value="Vimeo">Vimeo</option><option value="Dailymotion">Dailymotion</option><option value="Mp4_From_Url">Mp4 From Url</option><option value="Mkv_From_Url">Mkv From Url</option><option value="M3u8_From_Url">M3u8 From Url</option><option value="Dash_From_Url">Dash From Url</option><option value="Embed_Url">Embed Url</option><option value="DoodStream">DoodStream</option><option value="Dropbox">Dropbox</option><option value="Facebook">Facebook</option><option value="Fembed">Fembed</option><option value="GogoAnime">GogoAnime</option><option value="GoogleDrive">GoogleDrive</option><option value="MixDrop">MixDrop</option><option value="OK.ru">OK.ru</option><option value="Onedrive">Onedrive</option><option value="Streamtape">Streamtape</option><option value="Streamwish">Streamwish</option><option value="Torrent">Torrent</option><option value="Twitter">Twitter</option><option value="VK">VK</option><option value="Yandex">Yandex</option>
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
            <hr>
            <button type="submit" class="button">
                <i class="fas fa-save"></i>
                Add Link
            </button>
        </form>
    </div>
</div>

<div id="editLinkModal" class="modal-overlay">
    <div class="modal-content">
        <span class="modal-close" id="closeEditModalBtn">&times;</span>
        <h2>Edit Stream Link</h2>
        <hr>
        <form id="editLinkForm" action="" method="POST">
            <div class="form-grid">
                 <div class="form-group"><label for="edit_label">Label</label><input type="text" id="edit_label" name="label"></div>
                <div class="form-group"><label for="edit_quality">Quality</label><input type="text" id="edit_quality" name="quality"></div>
                <div class="form-group"><label for="edit_size">Size</label><input type="text" id="edit_size" name="size"></div>
                <div class="form-group">
                    <label for="edit_source">Source</label>
                    <select id="edit_source" name="source">
                         <option value="Youtube">Youtube</option><option value="Vimeo">Vimeo</option><option value="Dailymotion">Dailymotion</option><option value="Mp4_From_Url">Mp4 From Url</option><option value="Mkv_From_Url">Mkv From Url</option><option value="M3u8_From_Url">M3u8 From Url</option><option value="Dash_From_Url">Dash From Url</option><option value="Embed_Url">Embed Url</option><option value="DoodStream">DoodStream</option><option value="Dropbox">Dropbox</option><option value="Facebook">Facebook</option><option value="Fembed">Fembed</option><option value="GogoAnime">GogoAnime</option><option value="GoogleDrive">GoogleDrive</option><option value="MixDrop">MixDrop</option><option value="OK.ru">OK.ru</option><option value="Onedrive">Onedrive</option><option value="Streamtape">Streamtape</option><option value="Streamwish">Streamwish</option><option value="Torrent">Torrent</option><option value="Twitter">Twitter</option><option value="VK">VK</option><option value="Yandex">Yandex</option>
                    </select>
                </div>
                <div class="form-group full-width"><label for="edit_url">URL</label><input type="text" id="edit_url" name="url" required></div>
                <div class="form-group"><label for="edit_link_type">Type</label><select id="edit_link_type" name="link_type"><option value="stream">Stream</option><option value="download">Download</option></select></div>
                <div class="form-group"><label for="edit_status">Status</label><select id="edit_status" name="status"><option value="publish">Publish</option><option value="draft">Draft</option></select></div>
            </div>
            <hr>
            <button type="submit" class="button">
                <i class="fas fa-save"></i>
                Save Changes
            </button>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
   // Enhanced dropdown functionality
   function toggleDropdown(button, event) {
       event.stopPropagation();
       var parent = button.parentElement;
       var dropdown = button.nextElementSibling;
       var wasOpen = dropdown.style.display === 'block';
       
       // Close all other open dropdowns
       document.querySelectorAll('.content-actions').forEach(function(action) {
           if (action !== parent) {
               action.querySelector('.options-dropdown').style.display = 'none';
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
       if (!event.target.matches('.options-btn') && !event.target.closest('.options-btn')) {
           document.querySelectorAll('.options-dropdown').forEach(function(dropdown) {
               dropdown.style.display = 'none';
           });
       }
   }

   // Add Modal JavaScript with enhanced animations
   var addModal = document.getElementById("addLinkModal");
   var addBtn = document.getElementById("addLinkBtn");
   var closeAddBtn = document.getElementById("closeModalBtn");
   
   addBtn.onclick = function() { 
       addModal.style.display = "block";
       document.body.style.overflow = 'hidden';
   }
   
   closeAddBtn.onclick = function() { 
       addModal.style.display = "none";
       document.body.style.overflow = 'auto';
   }

   // Edit Modal JavaScript with enhanced animations
   var editModal = document.getElementById("editLinkModal");
   var closeEditBtn = document.getElementById("closeEditModalBtn");
   
   document.querySelectorAll('.edit-link-btn').forEach(function(button) {
       button.addEventListener('click', function() {
           var linkData = JSON.parse(this.getAttribute('data-link-info'));
           
           var editForm = document.getElementById('editLinkForm');
           editForm.action = '/admin/manage-movie-links/edit/' + linkData.id;
           
           document.getElementById('edit_label').value = linkData.label || '';
           document.getElementById('edit_quality').value = linkData.quality || '';
           document.getElementById('edit_size').value = linkData.size || '';
           document.getElementById('edit_source').value = linkData.source || '';
           document.getElementById('edit_url').value = linkData.url || '';
           document.getElementById('edit_link_type').value = linkData.link_type || '';
           document.getElementById('edit_status').value = linkData.status || '';

           editModal.style.display = "block";
           document.body.style.overflow = 'hidden';
       });
   });
   
   closeEditBtn.onclick = function() { 
       editModal.style.display = "none";
       document.body.style.overflow = 'auto';
   }
   
   // Close modals if clicking outside with enhanced UX
   window.addEventListener('click', function(event) {
       if (event.target == addModal) {
           addModal.style.display = "none";
           document.body.style.overflow = 'auto';
       }
       if (event.target == editModal) {
           editModal.style.display = "none";
           document.body.style.overflow = 'auto';
       }
   });

   // Enhanced button interactions
   document.querySelectorAll('.options-btn, .button').forEach(btn => {
       btn.addEventListener('mouseenter', function() {
           if (!this.classList.contains('options-btn')) {
               this.style.transform = 'translateY(-2px) scale(1.02)';
           }
       });
       
       btn.addEventListener('mouseleave', function() {
           if (!this.classList.contains('options-btn')) {
               this.style.transform = 'translateY(0) scale(1)';
           }
       });
       
       btn.addEventListener('mousedown', function() {
           this.style.transform = 'translateY(0) scale(0.98)';
       });
       
       btn.addEventListener('mouseup', function() {
           if (!this.classList.contains('options-btn')) {
               this.style.transform = 'translateY(-2px) scale(1.02)';
           } else {
               this.style.transform = 'translateY(0) scale(1)';
           }
       });
   });

   // Enhanced table row interactions
   document.querySelectorAll('.admin-table tbody tr').forEach(row => {
       row.addEventListener('mouseenter', function() {
           // Create subtle ripple effect
           const ripple = document.createElement('div');
           ripple.style.cssText = `
               position: absolute;
               top: 50%;
               left: 0;
               width: 0;
               height: 1px;
               background: linear-gradient(90deg, transparent, rgba(59, 130, 246, 0.3), transparent);
               pointer-events: none;
               animation: rowRipple 0.6s ease-out;
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
   document.querySelectorAll('.options-dropdown a[onclick*="confirm"]').forEach(deleteBtn => {
       deleteBtn.addEventListener('click', function(e) {
           e.preventDefault();
           const href = this.getAttribute('href');
           const confirmDelete = confirm(`⚠️ Are you sure you want to delete this link?\n\nThis action cannot be undone and will remove all associated data.`);
           if (confirmDelete) {
               // Add loading animation
               this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Deleting...';
               this.style.pointerEvents = 'none';
               window.location.href = href;
           }
           return false;
       });
   });

   // Floating particles effect
   function createFloatingParticles() {
       const container = document.querySelector('main');
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

   // Add row ripple animation keyframes
   if (!document.querySelector('#rowRippleAnimation')) {
       const style = document.createElement('style');
       style.id = 'rowRippleAnimation';
       style.textContent = `
           @keyframes rowRipple {
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

   // Keyboard navigation support
   document.addEventListener('keydown', function(e) {
       if (e.key === 'Escape') {
           document.querySelectorAll('.options-dropdown').forEach(d => d.style.display = 'none');
           if (addModal && addModal.style.display === 'block') {
               addModal.style.display = 'none';
               document.body.style.overflow = 'auto';
           }
           if (editModal && editModal.style.display === 'block') {
               editModal.style.display = 'none';
               document.body.style.overflow = 'auto';
           }
       }
   });
});
</script>