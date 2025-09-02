<?php require_once __DIR__ . '/partials/header.php'; ?>

<style>
    /* Enhanced Modern Users List Page with Rich Black-Gray Colors */
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
        --accent-orange: #e67e22;
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

    /* Enhanced Header */
    main h1 {
        font-size: 32px;
        font-weight: 800;
        color: var(--text-primary);
        margin: 0 0 40px 0;
        display: flex;
        align-items: center;
        gap: 16px;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
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

    main h1::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-6);
        border-radius: 20px 20px 0 0;
    }

    main h1::after {
        content: '👥';
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
        margin-right: 16px;
        order: -1;
    }

    /* Enhanced Action Bar */
    .action-bar {
        margin-bottom: 30px;
        padding: 24px 32px;
        background: var(--secondary-bg);
        background-image: var(--gradient-2);
        border: 1px solid var(--border-color);
        border-radius: 16px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
    }

    .action-bar .button,
    .modal-content .button {
        background: var(--accent-green);
        background-image: linear-gradient(135deg, #00ff88, #00cc6a);
        color: var(--primary-bg);
        padding: 14px 28px;
        text-decoration: none;
        border-radius: 10px;
        border: none;
        cursor: pointer;
        font-size: 16px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 16px rgba(0, 255, 136, 0.3);
    }

    .action-bar .button:hover,
    .modal-content .button:hover {
        background: var(--accent-white);
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(0, 255, 136, 0.4);
    }

    .table-controls {
        display: flex;
        gap: 16px;
        align-items: center;
        font-size: 14px;
        color: var(--text-secondary);
        font-weight: 600;
    }

    .table-controls select,
    .table-controls input {
        background: var(--tertiary-bg);
        border: 2px solid var(--border-color);
        color: var(--text-primary);
        border-radius: 8px;
        padding: 8px 12px;
        font-size: 14px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .table-controls select:focus,
    .table-controls input:focus {
        outline: none;
        border-color: var(--accent-blue);
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    .table-controls input[type="search"] {
        width: 200px;
        background-image: url('data:image/svg+xml;charset=UTF-8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="%23888" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>');
        background-repeat: no-repeat;
        background-position: right 10px center;
        background-size: 16px;
        padding-right: 35px;
    }

    /* Enhanced Table */
    .admin-table {
        border-collapse: collapse;
        width: 100%;
        background: var(--secondary-bg);
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        border: 1px solid var(--border-color);
    }

    .admin-table th {
        background: var(--tertiary-bg);
        background-image: var(--gradient-1);
        padding: 20px 16px;
        text-align: left;
        vertical-align: middle;
        font-size: 14px;
        text-transform: uppercase;
        color: var(--text-secondary);
        font-weight: 700;
        letter-spacing: 0.5px;
        border-bottom: 2px solid var(--border-color);
        position: relative;
    }

    .admin-table th::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background: var(--gradient-6);
        opacity: 0.6;
    }

    .admin-table td {
        padding: 16px;
        text-align: left;
        vertical-align: middle;
        border-bottom: 1px solid var(--border-color);
        color: var(--text-primary);
        font-size: 15px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .admin-table tbody tr {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
    }

    .admin-table tbody tr::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        width: 4px;
        height: 100%;
        background: var(--gradient-6);
        opacity: 0;
        transition: all 0.3s ease;
    }

    .admin-table tbody tr:hover {
        background: var(--tertiary-bg);
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
    }

    .admin-table tbody tr:hover::before {
        opacity: 1;
    }

    .admin-table tbody tr:last-child td {
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
        padding: 10px 16px;
        border-radius: 10px;
        cursor: pointer;
        font-weight: 600;
        font-size: 13px;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        text-transform: uppercase;
        letter-spacing: 0.5px;
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

    .options-dropdown a,
    .options-dropdown button {
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
        border: none;
        width: 100%;
        text-align: left;
        cursor: pointer;
        font-family: inherit;
        box-sizing: border-box;
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

    /* Role Badges */
    .role-admin,
    .role-user {
        padding: 6px 12px;
        border-radius: 8px;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.3s ease;
    }

    .role-admin {
        background: var(--accent-orange);
        background-image: linear-gradient(135deg, #e67e22, #f39c12);
        color: white;
        box-shadow: 0 2px 8px rgba(230, 126, 34, 0.3);
    }

    .role-user {
        background: var(--accent-blue);
        background-image: linear-gradient(135deg, #3498db, #5dade2);
        color: white;
        box-shadow: 0 2px 8px rgba(52, 152, 219, 0.3);
    }

    .role-admin::before {
        content: '👑';
    }

    .role-user::before {
        content: '👤';
    }

    /* Modal Styles */
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
        width: 90%;
        max-width: 500px;
        border-radius: 20px;
        position: relative;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
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

    .modal-close {
        color: var(--text-muted);
        position: absolute;
        top: 20px;
        right: 25px;
        font-size: 32px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.2s ease;
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
        transform: scale(1.1);
    }

    .modal-content h2 {
        color: var(--text-primary);
        margin-bottom: 24px;
        font-size: 24px;
        font-weight: 700;
    }

    .modal-content hr {
        border: none;
        height: 2px;
        background: var(--gradient-6);
        margin-bottom: 24px;
        border-radius: 2px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: var(--text-secondary);
        font-weight: 600;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 12px 16px;
        box-sizing: border-box;
        background: var(--tertiary-bg);
        border: 2px solid var(--border-color);
        color: var(--text-primary);
        border-radius: 10px;
        font-size: 15px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .form-group input:focus,
    .form-group select:focus {
        outline: none;
        border-color: var(--accent-blue);
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        transform: translateY(-2px);
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .admin-table {
            font-size: 14px;
        }
        
        .admin-table th,
        .admin-table td {
            padding: 12px 10px;
        }
    }

    @media (max-width: 768px) {
        main {
            padding: 20px;
        }
        
        main h1 {
            padding: 20px;
            font-size: 24px;
        }
        
        .action-bar {
            padding: 16px 20px;
            flex-direction: column;
            align-items: stretch;
        }
        
        .table-controls {
            justify-content: center;
            flex-wrap: wrap;
        }
        
        .table-controls input[type="search"] {
            width: 150px;
        }
        
        .admin-table {
            font-size: 13px;
        }
        
        .options-dropdown {
            min-width: 160px;
        }
    }

    @media (max-width: 480px) {
        .modal-content {
            margin: 10% auto;
            padding: 20px;
        }
        
        .admin-table th,
        .admin-table td {
            padding: 8px 6px;
        }
        
        .options-btn {
            padding: 8px 12px;
            font-size: 12px;
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
    <h1>User Management</h1>
    
    <div class="action-bar">
        <div class="table-controls">
            <span>Show</span><select><option>10</option><option>25</option><option>50</option></select><span>entries</span>
            <span style="margin-left: 20px;">Search:</span><input type="search">
        </div>
    </div>

    <table class="admin-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Options</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Subscription</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users)): ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td class="content-actions">
                            <button type="button" class="options-btn" onclick="toggleDropdown(this, event)">Options ▼</button>
                            <div class="options-dropdown">
                                <a href="#">Add Subscription</a>
                                <a href="#">Send Notification</a>
                                <button type="button" class="edit-user-btn" data-user-info='<?php echo htmlspecialchars(json_encode($user)); ?>'>Edit User</button>
                                <?php if ($_SESSION['user_id'] != $user['id']): ?>
                                    <a href="/admin/users/delete/<?php echo $user['id']; ?>" onclick="return confirm('Are you sure?');" style="color: #ff4d4d;">Delete User</a>
                                <?php endif; ?>
                            </div>
                        </td>
                        <td>N/A</td>
                        <td><?php echo htmlspecialchars($user['email']); ?></td>
                        <td><span class="role-<?php echo $user['is_admin'] ? 'admin' : 'user'; ?>"><?php echo $user['is_admin'] ? 'Admin' : 'User'; ?></span></td>
                        <td>Free</td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="6">No users found.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</main>

<div id="editUserModal" class="modal-overlay">
    <div class="modal-content">
        <span class="modal-close" id="closeEditModalBtn">&times;</span>
        <h2>Edit User</h2>
        <hr>
        <form id="editUserForm" action="" method="POST">
            <div class="form-group">
                <label for="edit_email">Email</label>
                <input type="email" id="edit_email" name="email" required>
            </div>
            <div class="form-group">
                <label for="edit_is_admin">Role</label>
                <select id="edit_is_admin" name="is_admin">
                    <option value="0">User</option>
                    <option value="1">Admin</option>
                </select>
            </div>
            <div class="form-group">
                <label for="edit_password">New Password</label>
                <input type="password" id="edit_password" name="password" placeholder="Leave blank to keep current password">
            </div>
            <button type="submit" class="button">Save Changes</button>
        </form>
    </div>
</div>

<script>
    function toggleDropdown(button, event) {
        event.stopPropagation();
        var dropdown = button.nextElementSibling;
        var wasOpen = dropdown.style.display === 'block';
        document.querySelectorAll('.options-dropdown').forEach(function(d) { d.style.display = 'none'; });
        if (!wasOpen) {
            var btnRect = button.getBoundingClientRect();
            dropdown.style.display = 'block';
            dropdown.style.position = 'fixed';
            dropdown.style.top = (btnRect.bottom + 2) + 'px';
            dropdown.style.left = (btnRect.right - dropdown.offsetWidth) + 'px';
        }
    }
    window.addEventListener('click', function(event) {
        if (!event.target.matches('.options-btn')) {
            document.querySelectorAll('.options-dropdown').forEach(function(d) { d.style.display = 'none'; });
        }
    });
    // Edit User Modal JS
    var editModal = document.getElementById("editUserModal");
    var closeEditBtn = document.getElementById("closeEditModalBtn");
    var editForm = document.getElementById("editUserForm");

    document.querySelectorAll('.edit-user-btn').forEach(function(button) {
        button.addEventListener('click', function() {
            var userData = JSON.parse(this.getAttribute('data-user-info'));
            editForm.action = '/admin/users/edit/' + userData.id;
            document.getElementById('edit_email').value = userData.email;
            document.getElementById('edit_is_admin').value = userData.is_admin;
            document.getElementById('edit_password').value = '';
            editModal.style.display = "block";
        });
    });
    
    if(closeEditBtn) { closeEditBtn.onclick = function() { editModal.style.display = "none"; } }
    
    window.addEventListener('click', function(event) {
        if (event.target == addModal) { addModal.style.display = "none"; }
        if (event.target == editModal) { editModal.style.display = "none"; }
    });
</script>
    
<?php require_once __DIR__ . '/partials/footer.php'; ?>