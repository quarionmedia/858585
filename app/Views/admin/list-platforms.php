<?php require_once __DIR__ . '/partials/header.php'; ?>

<style>
    /* Enhanced Modern Platforms List Page with Rich Black-Gray Colors */
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
    .list-header {
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

    .list-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-4);
        border-radius: 20px 20px 0 0;
    }

    .list-header::after {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(255, 215, 0, 0.08), transparent);
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
        margin: 0 0 8px 0;
        display: flex;
        align-items: center;
        gap: 16px;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    }

    .list-title-icon {
        width: 48px;
        height: 48px;
        background: var(--gradient-4);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        color: var(--primary-bg);
        box-shadow: 0 4px 16px rgba(255, 215, 0, 0.3);
    }

    .list-subtitle {
        color: var(--text-muted);
        font-size: 16px;
        margin: 0;
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
        border: none;
        cursor: pointer;
        font-size: 16px;
        font-weight: 700;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 4px 16px rgba(0, 255, 136, 0.3);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .action-bar .button:hover {
        background: var(--accent-white);
        transform: translateY(-4px) scale(1.02);
        box-shadow: 0 12px 32px rgba(0, 255, 136, 0.4);
    }

    /* Enhanced Table Styles */
    .enhanced-table-container {
        background: var(--secondary-bg);
        border: 1px solid var(--border-color);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.2);
        margin-top: 32px;
        position: relative;
    }

    .enhanced-table-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-1);
        opacity: 0.8;
    }

    .admin-table {
        border-collapse: collapse;
        width: 100%;
        background: transparent;
    }

    .admin-table th {
        background: var(--tertiary-bg);
        background-image: var(--gradient-1);
        padding: 20px 24px;
        text-align: left;
        vertical-align: middle;
        font-size: 14px;
        text-transform: uppercase;
        color: var(--text-primary);
        font-weight: 700;
        letter-spacing: 1px;
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
        background: var(--gradient-4);
        opacity: 0.6;
    }

    .admin-table td {
        padding: 20px 24px;
        text-align: left;
        vertical-align: middle;
        border-bottom: 1px solid var(--border-color);
        color: var(--text-secondary);
        font-size: 15px;
        font-weight: 500;
        position: relative;
    }

    .admin-table tbody tr {
        transition: all 0.3s ease;
        background: transparent;
    }

/* BU ŞEKİLDE DEĞİŞTİRİN */
.admin-table tbody tr:hover {
    background: var(--tertiary-bg);
    /* transform: translateY(-2px); */ /* BU SATIRI SİLİN */
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
}

    .admin-table tbody tr:hover td {
        color: var(--text-primary);
    }

    .platform-logo {
        max-width: 120px;
        max-height: 50px;
        background: var(--quaternary-bg);
        padding: 8px 12px;
        border-radius: 8px;
        border: 1px solid var(--border-color);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }

    .platform-logo:hover {
        transform: scale(1.1);
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.3);
    }

    /* Enhanced Options Menu */
    .options-btn {
        background: var(--tertiary-bg);
        background-image: var(--gradient-1);
        color: var(--text-primary);
        border: 1px solid var(--border-color);
        padding: 10px 16px;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 600;
        font-size: 14px;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .options-btn:hover {
        background: var(--quaternary-bg);
        border-color: var(--border-hover);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    .options-dropdown {
        display: none;
        position: fixed;
        background: var(--tertiary-bg);
        border: 2px solid var(--border-color);
        border-radius: 12px;
        z-index: 1000;
        min-width: 160px;
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
        background: var(--gradient-4);
        border-radius: 12px 12px 0 0;
    }

    .options-dropdown button,
    .options-dropdown a {
        display: block;
        padding: 12px 20px;
        text-decoration: none;
        color: var(--text-secondary);
        background: none;
        border: none;
        width: 100%;
        text-align: left;
        cursor: pointer;
        font-size: 14px;
        font-weight: 600;
        font-family: inherit;
        box-sizing: border-box;
        transition: all 0.2s ease;
        border-bottom: 1px solid rgba(64, 64, 64, 0.3);
    }

    .options-dropdown button:last-child,
    .options-dropdown a:last-child {
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

    /* Enhanced Modal Styles */
    .modal-overlay {
        display: none;
        position: fixed;
        z-index: 10000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background: rgba(0, 0, 0, 0.8);
        backdrop-filter: blur(10px);
        animation: fadeIn 0.3s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    .modal-content {
        background: var(--secondary-bg);
        background-image: var(--gradient-2);
        margin: 5% auto;
        padding: 32px;
        border: 2px solid var(--border-color);
        width: 90%;
        max-width: 500px;
        border-radius: 20px;
        position: relative;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
        animation: slideInUp 0.4s ease;
        overflow: hidden;
    }

    .modal-content::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-4);
        border-radius: 20px 20px 0 0;
    }

    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(30px) scale(0.95);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    .modal-content h2 {
        color: var(--text-primary);
        font-size: 24px;
        font-weight: 700;
        margin: 0 0 20px 0;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .modal-content h2::before {
        content: '⚡';
        font-size: 20px;
        padding: 8px;
        background: var(--gradient-4);
        border-radius: 8px;
        color: var(--primary-bg);
    }

    .modal-close {
        color: var(--text-muted);
        position: absolute;
        top: 20px;
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
        background: rgba(64, 64, 64, 0.2);
    }

    .modal-close:hover {
        color: var(--accent-red);
        background: rgba(255, 68, 68, 0.2);
        transform: rotate(90deg) scale(1.1);
    }

    .form-group {
        margin-bottom: 24px;
        position: relative;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 700;
        color: var(--text-primary);
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .form-group input[type="text"],
    .form-group input[type="file"] {
        width: 100%;
        padding: 16px 20px;
        box-sizing: border-box;
        background: var(--tertiary-bg);
        border: 2px solid var(--border-color);
        color: var(--text-primary);
        border-radius: 12px;
        font-size: 15px;
        font-weight: 500;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        outline: none;
    }

    .form-group input:focus {
        border-color: var(--accent-gold);
        background: var(--quaternary-bg);
        box-shadow: 0 0 0 4px rgba(255, 215, 0, 0.1);
        transform: translateY(-2px);
    }

    .modal-content .button {
        background: var(--accent-green);
        color: var(--primary-bg);
        padding: 16px 32px;
        text-decoration: none;
        border-radius: 12px;
        border: none;
        cursor: pointer;
        font-size: 16px;
        font-weight: 700;
        transition: all 0.3s ease;
        box-shadow: 0 4px 16px rgba(0, 255, 136, 0.3);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        width: 100%;
        margin-top: 16px;
    }

    .modal-content .button:hover {
        background: var(--accent-white);
        transform: translateY(-4px);
        box-shadow: 0 12px 32px rgba(0, 255, 136, 0.4);
    }

    /* No Data State */
    .no-data-state {
        text-align: center;
        padding: 60px 32px;
        color: var(--text-muted);
    }

    .no-data-state i {
        font-size: 48px;
        margin-bottom: 20px;
        color: var(--accent-gold);
        opacity: 0.6;
    }

    .no-data-state h3 {
        font-size: 24px;
        font-weight: 700;
        color: var(--text-secondary);
        margin: 0 0 12px 0;
    }

    .no-data-state p {
        font-size: 16px;
        margin: 0;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .main-content {
            padding: 20px;
        }
        
        .list-header,
        .modal-content {
            padding: 20px;
        }
        
        .list-header-content {
            flex-direction: column;
            align-items: stretch;
        }
        
        .list-title-section h1 {
            font-size: 24px;
        }
        
        .admin-table th,
        .admin-table td {
            padding: 12px 16px;
        }
        
        .platform-logo {
            max-width: 80px;
            max-height: 35px;
        }
    }

    @media (max-width: 480px) {
        .admin-table {
            font-size: 12px;
        }
        
        .admin-table th,
        .admin-table td {
            padding: 8px 12px;
        }
    }

    /* Loading and Animation Effects */
    .enhanced-table-container {
        animation: slideInUp 0.6s ease-out;
    }

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
                        <i class="fas fa-play-circle"></i>
                    </div>
                    Content Platforms
                </h1>
                <p class="list-subtitle">Manage content platforms like Netflix, Disney+, etc.</p>
            </div>
            <div class="action-bar">
                <button type="button" class="button" id="addPlatformBtn">
                    <i class="fas fa-plus"></i>
                    Add New Platform
                </button>
            </div>
        </div>
    </div>

    <!-- Enhanced Table Container -->
    <div class="enhanced-table-container">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Logo</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($platforms)): ?>
                    <?php foreach ($platforms as $platform): ?>
                        <tr>
                            <td><?php echo $platform['id']; ?></td>
                            <td>
                                <?php if (!empty($platform['logo_path'])): ?>
                                    <img class="platform-logo" src="/assets/images/platforms/<?php echo $platform['logo_path']; ?>" alt="<?php echo htmlspecialchars($platform['name']); ?>">
                                <?php else: ?>
                                    <div style="width: 120px; height: 50px; background: var(--tertiary-bg); border: 1px dashed var(--border-color); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: var(--text-muted); font-size: 12px;">
                                        No Logo
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td><?php echo htmlspecialchars($platform['name']); ?></td>
                            <td><code style="background: var(--tertiary-bg); padding: 4px 8px; border-radius: 4px; font-family: monospace; color: var(--accent-gold);"><?php echo htmlspecialchars($platform['slug']); ?></code></td>
                            <td class="content-actions">
                                <button type="button" class="options-btn" onclick="toggleDropdown(this, event)">
                                    <i class="fas fa-cog"></i>
                                    Options
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="options-dropdown">
                                    <button type="button" class="edit-platform-btn" data-platform-info='<?php echo json_encode($platform); ?>'>
                                        <i class="fas fa-edit"></i>
                                        Edit
                                    </button>
                                    <a href="/admin/platforms/delete/<?php echo $platform['id']; ?>" onclick="return confirm('Are you sure?');" style="color: #ff4d4d;">
                                        <i class="fas fa-trash"></i>
                                        Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">
                            <div class="no-data-state">
                                <i class="fas fa-play-circle"></i>
                                <h3>No Platforms Found</h3>
                                <p>Start by adding your first content platform.</p>
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>

<!-- Enhanced Add Platform Modal -->
<div id="addPlatformModal" class="modal-overlay">
    <div class="modal-content">
        <span class="modal-close" id="closeAddModalBtn">&times;</span>
        <h2>Add New Platform</h2>
        <hr style="border: none; height: 2px; background: var(--gradient-4); margin: 20px 0; border-radius: 2px;">
        <form action="/admin/platforms" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Platform Name</label>
                <input type="text" id="name" name="name" required placeholder="e.g., Netflix">
            </div>
            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" id="slug" name="slug" required placeholder="e.g., netflix, disney-plus">
            </div>
            <div class="form-group">
                <label for="logo_path">Logo Image</label>
                <input type="file" id="logo_path" name="logo_path" accept="image/*">
            </div>
            <div class="form-group">
                <label for="background_path">Background Image</label>
                <input type="file" id="background_path" name="background_path" accept="image/*">
            </div>
            <button type="submit" class="button">
                <i class="fas fa-plus"></i>
                Create Platform
            </button>
        </form>
    </div>
</div>

<!-- Enhanced Edit Platform Modal -->
<div id="editPlatformModal" class="modal-overlay">
    <div class="modal-content">
        <span class="modal-close" id="closeEditModalBtn">&times;</span>
        <h2>Edit Platform</h2>
        <hr style="border: none; height: 2px; background: var(--gradient-4); margin: 20px 0; border-radius: 2px;">
        <form id="editPlatformForm" action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="edit_name">Platform Name</label>
                <input type="text" id="edit_name" name="name" required>
            </div>
             <div class="form-group">
                <label for="edit_slug">Slug</label>
                <input type="text" id="edit_slug" name="slug" required>
            </div>
            <div class="form-group">
                <label for="edit_logo_path">New Logo (Optional)</label>
                <input type="file" id="edit_logo_path" name="logo_path" accept="image/*">
            </div>
            <div class="form-group">
                <label for="edit_background_path">New Background (Optional)</label>
                <input type="file" id="edit_background_path" name="background_path" accept="image/*">
            </div>
            <button type="submit" class="button">
                <i class="fas fa-save"></i>
                Save Changes
            </button>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {

    // ======================================================
    // YARDIMCI FONKSİYONLAR: MODAL (POP-UP) AÇMA/KAPATMA
    // Kodu tekrar etmemek için yardımcı fonksiyonlar oluşturdum.
    // ======================================================
    function openModal(modalElement) {
        if (!modalElement) return;
        modalElement.style.display = "block";
        // Akıcı bir animasyonla görünmesini sağla
        setTimeout(() => {
            modalElement.style.opacity = "1";
        }, 10);
    }

    function closeModal(modalElement) {
        if (!modalElement) return;
        modalElement.style.opacity = "0";
        // Animasyon bittikten sonra gizle
        setTimeout(() => {
            modalElement.style.display = "none";
        }, 300);
    }

    // ======================================================
    // AÇILIR "OPTIONS" MENÜSÜ İŞLEVİ
    // ======================================================
    window.toggleDropdown = function(button, event) {
        event.stopPropagation();
        const dropdown = button.nextElementSibling;
        if (!dropdown) return;

        const wasOpen = dropdown.style.display === 'block';

        // Diğer tüm açık menüleri hemen kapat
        document.querySelectorAll('.options-dropdown').forEach(d => {
            d.style.display = 'none';
        });

        if (!wasOpen) {
            dropdown.style.display = 'block';
            const btnRect = button.getBoundingClientRect();
            
            dropdown.style.position = 'fixed';
            dropdown.style.top = (btnRect.bottom + 5) + 'px';
            dropdown.style.left = (btnRect.right - dropdown.offsetWidth) + 'px';

            // Animasyonla görünmesini sağla
            dropdown.style.opacity = '0';
            dropdown.style.transform = 'translateY(-10px)';
            setTimeout(() => {
                dropdown.style.transition = 'all 0.3s ease';
                dropdown.style.opacity = '1';
                dropdown.style.transform = 'translateY(0)';
            }, 10);
        }
    }

    // ======================================================
    // MODAL (POP-UP) PENCERELERİNİN TANIMLANMASI VE KONTROLÜ
    // ======================================================
    // --- Add Modal ---
    const addModal = document.getElementById("addPlatformModal");
    const addBtn = document.getElementById("addPlatformBtn");
    const closeAddBtn = document.getElementById("closeAddModalBtn");

    if (addBtn && addModal) {
        addBtn.onclick = () => openModal(addModal);
    }
    if (closeAddBtn && addModal) {
        closeAddBtn.onclick = () => closeModal(addModal);
    }

    // --- Edit Modal ---
    const editModal = document.getElementById("editPlatformModal");
    const closeEditBtn = document.getElementById("closeEditModalBtn");
    const editForm = document.getElementById("editPlatformForm");

    document.querySelectorAll('.edit-platform-btn').forEach(button => {
        button.addEventListener('click', function() {
            try {
                const platformData = JSON.parse(this.getAttribute('data-platform-info'));
                if (editForm) {
                    editForm.action = '/admin/platforms/edit/' + platformData.id;
                }
                const editNameInput = document.getElementById('edit_name');
                if (editNameInput) {
                    editNameInput.value = platformData.name;
                }
                const editSlugInput = document.getElementById('edit_slug');
                if (editSlugInput) {
                    editSlugInput.value = platformData.slug;
                }
                openModal(editModal);
            } catch (e) {
                console.error("Platform verisi okunurken hata oluştu:", e);
                alert("Veri okunurken bir hata oluştu. Lütfen konsolu kontrol edin.");
            }
        });
    });

    if (closeEditBtn && editModal) {
        closeEditBtn.onclick = () => closeModal(editModal);
    }

    // ======================================================
    // DIŞARIYA TIKLANDIĞINDA MENÜLERİ VE MODALLARI KAPATMA
    // Tek bir event listener ile tüm kontrolleri yapıyoruz.
    // ======================================================
    window.addEventListener('click', function(event) {
        // Options menüsünü kapatma (menünün veya butonun dışına tıklandıysa)
        if (!event.target.closest('.options-btn') && !event.target.closest('.options-dropdown')) {
            document.querySelectorAll('.options-dropdown').forEach(d => {
                d.style.display = 'none';
            });
        }

        // Modal'ların dışındaki gri alana tıklandıysa kapatma
        if (event.target === addModal) {
            closeModal(addModal);
        }
        if (event.target === editModal) {
            closeModal(editModal);
        }
    });

    // ======================================================
    // GÖRSEL EFEKTLER (FORM, TABLO, BUTON)
    // ======================================================
    // --- Form inputlarına focus efekti ---
    document.querySelectorAll('input[type="text"], input[type="file"]').forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.style.transform = 'translateY(-2px)';
        });
        input.addEventListener('blur', function() {
            this.parentElement.style.transform = 'translateY(0)';
        });
    });

    // --- Tablo satırlarına hover efekti (Menü sorununu önlemek için transform kaldırıldı) ---
    document.querySelectorAll('.admin-table tbody tr').forEach(row => {
        row.addEventListener('mouseenter', () => row.style.background = 'var(--tertiary-bg)');
        row.addEventListener('mouseleave', () => row.style.background = 'transparent');
    });

    // --- Butonlara tıklama ve hover efekti ---
    document.querySelectorAll('.button, .options-btn').forEach(btn => {
        btn.addEventListener('mouseenter', () => btn.style.transform = 'translateY(-2px) scale(1.02)');
        btn.addEventListener('mouseleave', () => btn.style.transform = 'translateY(0) scale(1)');
        btn.addEventListener('mousedown', () => btn.style.transform = 'translateY(0) scale(0.98)');
        btn.addEventListener('mouseup', () => btn.style.transform = 'translateY(-2px) scale(1.02)');
    });

    // ======================================================
    // ARKA PLAN PARÇACIK EFEKTİ
    // ======================================================
    function createFloatingParticles() {
        const container = document.querySelector('.main-content');
        if (!container) return; // Eğer container bulunamazsa hatayı engelle

        const particlesCount = 6;
        for (let i = 0; i < particlesCount; i++) {
            const particle = document.createElement('div');
            particle.style.cssText = `
                position: absolute; width: 3px; height: 3px;
                background: radial-gradient(circle, rgba(255, 215, 0, 0.4), transparent);
                border-radius: 50%; pointer-events: none; z-index: 0;
                animation: float ${6 + Math.random() * 3}s ease-in-out infinite;
                animation-delay: ${Math.random() * 3}s;
                left: ${Math.random() * 100}%; top: ${Math.random() * 100}%;
            `;
            container.appendChild(particle);
        }
    }
    createFloatingParticles();

});
</script>
    
<?php require_once __DIR__ . '/partials/footer.php'; ?>