<?php require_once __DIR__ . '/partials/header.php'; ?>

<style>
    /* Enhanced Modern Genre Management with Rich Black-Gray Colors */
    :root {
        --primary-bg: #0a0a0a;
        --secondary-bg: #1a1a1a;
        --tertiary-bg: #2a2a2a;
        --quaternary-bg: #3a3a3a;
        --accent-white: #000000ff;
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
    .enhanced-header {
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
        animation: slideInUp 0.6s ease-out;
    }

    .enhanced-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-5);
        border-radius: 20px 20px 0 0;
    }

    .enhanced-header::after {
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

    .enhanced-header-content {
        position: relative;
        z-index: 1;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 20px;
    }

    .header-info {
        flex: 1;
    }

    .enhanced-title {
        font-size: 32px;
        font-weight: 800;
        color: var(--text-primary);
        margin: 0 0 16px 0;
        display: flex;
        align-items: center;
        gap: 16px;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    }

    .enhanced-title-icon {
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

    .enhanced-subtitle {
        color: var(--text-secondary);
        font-size: 16px;
        font-weight: 500;
        margin: 0;
        opacity: 0.9;
    }

    /* Enhanced Action Bar */
    .action-bar {
        margin-bottom: 0;
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }

    .button {
        background: var(--accent-green);
        background-image: var(--gradient-4);
        color: var(--primary-bg);
        padding: 12px 24px;
        text-decoration: none;
        border-radius: 12px;
        border: none;
        cursor: pointer;
        font-size: 14px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 4px 16px rgba(255, 215, 0, 0.3);
        position: relative;
        overflow: hidden;
    }

    .button::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }

    .button:hover::before {
        left: 100%;
    }

    .button:hover {
        background: var(--accent-white);
        transform: translateY(-4px) scale(1.02);
        box-shadow: 0 12px 32px rgba(255, 215, 0, 0.4);
    }

    /* Enhanced Table Container */
    .enhanced-table-container {
        background: var(--secondary-bg);
        border: 1px solid var(--border-color);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.2);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        animation: slideInUp 0.6s ease-out 0.2s both;
    }

    .enhanced-table-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-1);
        opacity: 0;
        transition: all 0.4s ease;
    }

    .enhanced-table-container:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.3);
        border-color: var(--border-hover);
    }

    .enhanced-table-container:hover::before {
        opacity: 1;
    }

    .admin-table {
        border-collapse: collapse;
        width: 100%;
        margin: 0;
        background: transparent;
    }

    .admin-table th,
    .admin-table td {
        padding: 20px;
        text-align: left;
        vertical-align: middle;
        border: none;
        border-bottom: 1px solid var(--border-color);
        position: relative;
    }

    .admin-table th {
        background: var(--tertiary-bg);
        background-image: var(--gradient-1);
        color: var(--text-primary);
        font-size: 14px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        position: sticky;
        top: 0;
        z-index: 10;
    }

    .admin-table tbody tr {
        transition: all 0.3s ease;
        background: var(--secondary-bg);
    }

/* BU ŞEKİLDE DEĞİŞTİRİN */
.admin-table tbody tr:hover {
    background: var(--tertiary-bg);
    /* transform: translateX(4px); */ /* Bu satırı silebilirsiniz */
}

    .admin-table tbody tr:last-child td {
        border-bottom: none;
    }

    /* Enhanced Options Dropdown */
    .options-btn {
        background: var(--tertiary-bg);
        background-image: var(--gradient-1);
        color: var(--text-primary);
        border: 1px solid var(--border-color);
        padding: 10px 20px;
        border-radius: 10px;
        cursor: pointer;
        font-size: 13px;
        font-weight: 600;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .options-btn:hover {
        background: var(--quaternary-bg);
        border-color: var(--border-hover);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

.options-dropdown {
    display: none;
    position: absolute;
    top: 100%; /* Bu, sarmalayıcının hemen altında başlamasını sağlar */
    right: 0;  /* Bu, sağa hizalı kalmasını sağlar */
    background: var(--tertiary-bg);
    border: 1px solid var(--border-color);
    border-radius: 12px;
    z-index: 1000;
    min-width: 180px;
    padding: 8px 0;
    box-shadow: 0 12px 40px rgba(0, 0, 0, 0.4);
    backdrop-filter: blur(10px);
}

    /* Make sure action cells have relative positioning */
    .admin-table td:last-child {
        position: relative;
    }

    .options-dropdown a,
    .options-dropdown button {
        display: block;
        padding: 12px 16px;
        text-decoration: none;
        color: var(--text-secondary);
        background: none;
        border: none;
        width: 100%;
        text-align: left;
        cursor: pointer;
        font-size: 14px;
        font-weight: 600;
        font-family: sans-serif;
        box-sizing: border-box;
        transition: all 0.2s ease;
        border-bottom: 1px solid var(--border-color);
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

    .options-dropdown a[style*="color: #ff4d4d"]:hover {
        color: var(--accent-red) !important;
    }

    /* Enhanced Modal Styles */
    .modal-overlay {
        display: none;
        position: fixed;
        z-index: 100;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.8);
        backdrop-filter: blur(4px);
        animation: fadeIn 0.3s ease-out;
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
        border: 1px solid var(--border-color);
        width: 90%;
        max-width: 500px;
        border-radius: 20px;
        position: relative;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
        animation: slideInUp 0.4s ease-out 0.1s both;
    }

    .modal-content::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-5);
        border-radius: 20px 20px 0 0;
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
    }

    .modal-close:hover {
        color: var(--accent-red);
        background: rgba(255, 68, 68, 0.1);
        transform: rotate(90deg);
    }

    .modal-content h2 {
        color: var(--text-primary);
        font-size: 24px;
        font-weight: 700;
        margin: 0 0 8px 0;
        padding-right: 60px;
    }

    .modal-content hr {
        border: none;
        height: 1px;
        background: var(--border-color);
        margin: 16px 0 24px 0;
    }

    .form-group {
        margin-bottom: 24px;
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

    .form-group input {
        width: 100%;
        padding: 16px 20px;
        box-sizing: border-box;
        background-color: var(--tertiary-bg);
        border: 2px solid var(--border-color);
        color: var(--text-primary);
        border-radius: 12px;
        font-size: 15px;
        font-weight: 500;
        transition: all 0.3s ease;
        outline: none;
    }

    .form-group input:focus {
        border-color: var(--accent-gold);
        background: var(--quaternary-bg);
        box-shadow: 0 0 0 4px rgba(255, 215, 0, 0.1);
        transform: translateY(-2px);
    }

    /* Genre ID styling */
    .genre-id {
        font-family: 'Monaco', 'Menlo', monospace;
        font-weight: 700;
        color: var(--accent-gold);
        background: rgba(255, 215, 0, 0.1);
        padding: 4px 8px;
        border-radius: 6px;
        font-size: 12px;
    }

    .genre-name {
        font-weight: 600;
        color: var(--text-primary);
        font-size: 15px;
    }

    /* Empty state */
    .empty-state {
        text-align: center;
        padding: 40px 20px;
        color: var(--text-muted);
    }

    .empty-state i {
        font-size: 48px;
        margin-bottom: 16px;
        opacity: 0.5;
    }

    /* Responsive Design */
    @media (max-width: 1200px) {
        main {
            padding: 20px;
        }
        
        .enhanced-header,
        .enhanced-table-container {
            margin: 0 -10px;
            border-radius: 16px;
        }
    }

    @media (max-width: 768px) {
        .enhanced-header-content {
            flex-direction: column;
            gap: 16px;
        }
        
        .enhanced-title {
            font-size: 24px;
        }
        
        .admin-table {
            font-size: 12px;
        }
        
        .admin-table th,
        .admin-table td {
            padding: 12px 8px;
        }
        
        .modal-content {
            margin: 2% auto;
            padding: 20px;
            width: 95%;
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
    <!-- Enhanced Header Section -->
    <div class="enhanced-header">
        <div class="enhanced-header-content">
            <div class="header-info">
                <h1 class="enhanced-title">
                    <div class="enhanced-title-icon">
                        <i class="fas fa-tags"></i>
                    </div>
                    Genre Management
                </h1>
                <p class="enhanced-subtitle">Manage all genres. Genres are also added automatically when importing content from TMDb.</p>
            </div>
            <div class="action-bar">
                <button type="button" class="button" id="addGenreBtn">
                    <i class="fas fa-plus"></i>
                    Add New Genre
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
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($genres)): ?>
                    <?php foreach ($genres as $genre): ?>
                        <tr>
                            <td>
                                <span class="genre-id"><?php echo $genre['id']; ?></span>
                            </td>
                            <td>
                                <span class="genre-name"><?php echo htmlspecialchars($genre['name']); ?></span>
                            </td>
<td class="content-actions">
    <div style="position: relative; display: inline-block;"> <button type="button" class="options-btn" onclick="toggleDropdown(this, event)">
            <i class="fas fa-cog"></i>
            Options
        </button>
        <div class="options-dropdown">
            <button type="button" class="edit-genre-btn" data-genre-info='<?php echo htmlspecialchars(json_encode($genre)); ?>'>
                <i class="fas fa-edit"></i>
                Edit
            </button>
            <a href="/admin/genres/delete/<?php echo $genre['id']; ?>" onclick="return confirm('Are you sure? Deleting a genre might affect existing content.');" style="color: #ff4d4d;">
                <i class="fas fa-trash"></i>
                Delete
            </a>
        </div>
    </div>
</td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="empty-state">
                            <i class="fas fa-folder-open"></i>
                            <p>No genres found.</p>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>

<!-- Enhanced Add Genre Modal -->
<div id="addGenreModal" class="modal-overlay">
    <div class="modal-content">
        <span class="modal-close" id="closeAddModalBtn">&times;</span>
        <h2><i class="fas fa-plus-circle"></i> Add New Genre</h2>
        <hr>
        <form action="/admin/genres/add" method="POST">
            <div class="form-group">
                <label for="name">Genre Name</label>
                <input type="text" id="name" name="name" required placeholder="Enter genre name...">
            </div>
            <button type="submit" class="button">
                <i class="fas fa-save"></i>
                Create Genre
            </button>
        </form>
    </div>
</div>

<!-- Enhanced Edit Genre Modal -->
<div id="editGenreModal" class="modal-overlay">
    <div class="modal-content">
        <span class="modal-close" id="closeEditModalBtn">&times;</span>
        <h2><i class="fas fa-edit"></i> Edit Genre</h2>
        <hr>
        <form id="editGenreForm" action="" method="POST">
            <div class="form-group">
                <label for="edit_name">Genre Name</label>
                <input type="text" id="edit_name" name="name" required placeholder="Enter genre name...">
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
        document.querySelectorAll('.button').forEach(btn => {
            btn.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-4px) scale(1.02)';
                this.style.boxShadow = '0 12px 32px rgba(255, 215, 0, 0.4)';
            });
            
            btn.addEventListener('mouseleave', function() {
                this.style.transform = '';
                this.style.boxShadow = '0 4px 16px rgba(255, 215, 0, 0.3)';
            });
            
            btn.addEventListener('click', function(e) {
                this.style.transform = 'translateY(0px) scale(0.95)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 150);
            });
        });

        // Enhanced table row interactions
        document.querySelectorAll('.admin-table tbody tr').forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.boxShadow = '0 4px 16px rgba(0, 0, 0, 0.2)';
            });
            
            row.addEventListener('mouseleave', function() {
                this.style.boxShadow = '';
            });
        });

        // Enhanced modal animations
        const modals = document.querySelectorAll('.modal-overlay');
        modals.forEach(modal => {
            modal.addEventListener('click', function(e) {
                if (e.target === this) {
                    this.style.animation = 'fadeOut 0.3s ease-out forwards';
                    setTimeout(() => {
                        this.style.display = 'none';
                        this.style.animation = '';
                    }, 300);
                }
            });
        });
    });

// YENİ KOD
function toggleDropdown(button, event) {
    event.stopPropagation();
    // Butonun yeni sarmalayıcı div'inin içindeki dropdown'ı buluyoruz.
    var dropdown = button.nextElementSibling; 
    var wasOpen = dropdown.style.display === 'block';

    // Önce tüm açık dropdown'ları kapat
    document.querySelectorAll('.options-dropdown').forEach(function(d) {
        d.style.display = 'none';
    });

    // Eğer kapalıysa, bizimkini aç
    if (!wasOpen) {
        dropdown.style.display = 'block';
    }
}

    window.addEventListener('click', function(event) {
        if (!event.target.matches('.options-btn')) {
            document.querySelectorAll('.options-dropdown').forEach(function(d) {
                d.style.display = 'none';
            });
        }
    });

    // Add Modal JS
    var addModal = document.getElementById("addGenreModal");
    var addBtn = document.getElementById("addGenreBtn");
    var closeAddBtn = document.getElementById("closeAddModalBtn");
    
    addBtn.onclick = function() { 
        addModal.style.display = "block"; 
        setTimeout(() => {
            addModal.style.animation = 'fadeIn 0.3s ease-out';
        }, 10);
    }
    
    closeAddBtn.onclick = function() { 
        addModal.style.animation = 'fadeOut 0.3s ease-out forwards';
        setTimeout(() => {
            addModal.style.display = "none";
            addModal.style.animation = '';
        }, 300);
    }

    // Edit Modal JS
    var editModal = document.getElementById("editGenreModal");
    var closeEditBtn = document.getElementById("closeEditModalBtn");
    var editForm = document.getElementById("editGenreForm");

    document.querySelectorAll('.edit-genre-btn').forEach(function(button) {
        button.addEventListener('click', function() {
            var genreData = JSON.parse(this.getAttribute('data-genre-info'));
            editForm.action = '/admin/genres/edit/' + genreData.id;
            document.getElementById('edit_name').value = genreData.name;
            editModal.style.display = "block";
            setTimeout(() => {
                editModal.style.animation = 'fadeIn 0.3s ease-out';
            }, 10);
        });
    });
    
    if(closeEditBtn) { 
        closeEditBtn.onclick = function() { 
            editModal.style.animation = 'fadeOut 0.3s ease-out forwards';
            setTimeout(() => {
                editModal.style.display = "none";
                editModal.style.animation = '';
            }, 300);
        } 
    }

    // Add fadeOut keyframes
    const style = document.createElement('style');
    style.textContent = `
        @keyframes fadeOut {
            from { opacity: 1; }
            to { opacity: 0; }
        }
    `;
    document.head.appendChild(style);
</script>
    
<?php require_once __DIR__ . '/partials/footer.php'; ?>