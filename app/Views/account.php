<?php require_once __DIR__ . '/partials/header.php'; ?>

<style>
    body {
        background: #000000ff;
        color: #e6edf3;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        background-image: radial-gradient(circle at 25% 25%, #000000ff 0%, transparent 50%),
                          radial-gradient(circle at 75% 75%, #000000ff 0%, transparent 50%);
        min-height: 100vh;
    }

    .account-container {
        max-width: 850px;
        margin: 100px auto 60px;
        padding: 0 25px;
    }

    .account-header {
        text-align: center;
        margin-bottom: 50px;
    }

    .account-header h1 {
        font-size: 2.8rem;
        color: #ffffff;
        margin-bottom: 12px;
        font-weight: 600;
        background: linear-gradient(135deg, #ffffff, #a5a5a5);
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .account-header p {
        font-size: 1.1rem;
        color: #7d8590;
        margin: 0;
    }

    .account-card {
        background: linear-gradient(145deg, #21262d, #161b22);
        border-radius: 12px;
        padding: 35px;
        margin-bottom: 28px;
        border: 1px solid #30363d;
        box-shadow: 0 6px 24px rgba(0, 0, 0, 0.3);
        position: relative;
    }

    .account-card::after {
        content: '';
        position: absolute;
        top: 0;
        left: 20px;
        right: 20px;
        height: 1px;
        background: linear-gradient(90deg, transparent, #22c55e, transparent);
        opacity: 0.5;
    }

    .account-card:hover {
        border-color: #16a34a;
        transform: translateY(-1px);
        box-shadow: 0 8px 32px rgba(34, 197, 94, 0.08);
        transition: all 0.2s ease;
    }

    .account-card h2 {
        font-size: 1.5rem;
        color: #e6edf3;
        margin: 0 0 25px 0;
        padding-bottom: 15px;
        border-bottom: 1px solid #30363d;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .account-card h2::before {
        content: '';
        width: 4px;
        height: 20px;
        background: linear-gradient(180deg, #16a34a, #15803d);
        border-radius: 2px;
    }

    .form-group {
        margin-bottom: 24px;
    }

    .form-group label {
        display: block;
        color: #f0f6fc;
        margin-bottom: 8px;
        font-weight: 500;
        font-size: 0.9rem;
    }

    .form-group input {
        width: 100%;
        padding: 14px 16px;
        background: #0d1117;
        border: 1px solid #30363d;
        border-radius: 8px;
        color: #e6edf3;
        font-size: 1rem;
        outline: none;
        transition: all 0.2s ease;
    }

    .form-group input:focus {
        border-color: #16a34a;
        background: #161b22;
        box-shadow: 0 0 0 2px rgba(22, 163, 74, 0.08);
    }

    .btn-submit {
        background: linear-gradient(135deg, #15803d, #16a34a);
        color: #ffffff;
        border: none;
        padding: 12px 24px;
        border-radius: 8px;
        font-size: 0.95rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .btn-submit:hover {
        background: linear-gradient(135deg, #16a34a, #22c55e);
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(21, 128, 61, 0.2);
    }

    .alert {
        padding: 16px 20px;
        margin-bottom: 25px;
        border-radius: 8px;
        font-weight: 500;
        border-left: 3px solid;
    }

    .alert-success {
        background: rgba(21, 128, 61, 0.08);
        color: #22c55e;
        border-left-color: #16a34a;
        border: 1px solid rgba(21, 128, 61, 0.15);
    }

    .alert-error {
        background: rgba(248, 81, 73, 0.1);
        color: #f85149;
        border-left-color: #f85149;
        border: 1px solid rgba(248, 81, 73, 0.2);
    }

    /* Session Management */
    .session-description {
        color: #7d8590;
        margin-bottom: 25px;
        line-height: 1.5;
    }

    .session-list {
        margin-bottom: 25px;
    }

    .session-item {
        display: flex;
        align-items: center;
        padding: 20px;
        background: #0d1117;
        border: 1px solid #21262d;
        border-radius: 10px;
        margin-bottom: 12px;
        transition: all 0.2s ease;
    }

    .session-item:hover {
        background: #161b22;
        border-color: #30363d;
    }

    .session-icon {
        margin-right: 16px;
        color: #22c55e;
        font-size: 1.2rem;
        width: 20px;
    }

    .session-details {
        flex: 1;
    }

    .session-device {
        color: #e6edf3;
        font-weight: 500;
        margin-bottom: 4px;
        display: block;
    }

    .session-ip {
        color: #7d8590;
        font-size: 0.85rem;
        font-family: 'SF Mono', 'Monaco', 'Consolas', monospace;
    }

    .session-status {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .status-tag {
        padding: 6px 12px;
        border-radius: 12px;
        font-size: 0.8rem;
        font-weight: 500;
        white-space: nowrap;
    }

    .status-tag.active {
        background: rgba(21, 128, 61, 0.12);
        color: #22c55e;
        border: 1px solid rgba(21, 128, 61, 0.25);
    }

    .status-tag:not(.active) {
        background: rgba(125, 133, 144, 0.15);
        color: #7d8590;
        border: 1px solid rgba(125, 133, 144, 0.2);
    }

    .btn-logout-single {
        background: transparent;
        border: 1px solid #b91c1c;
        color: #dc2626;
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 0.8rem;
        cursor: pointer;
        transition: all 0.2s ease;
        font-weight: 500;
    }

    .btn-logout-single:hover {
        background: #b91c1c;
        color: #ffffff;
    }

    /* Danger Zone */
    .danger-zone {
        background: linear-gradient(145deg, #2d1b1b, #1c1212) !important;
        border-color: #b91c1c !important;
    }

    .danger-zone::after {
        background: linear-gradient(90deg, transparent, #b91c1c, transparent) !important;
    }

    .danger-zone h2 {
        color: #dc2626;
    }

    .danger-zone h2::before {
        background: linear-gradient(180deg, #b91c1c, #dc2626) !important;
    }

    .danger-zone p {
        color: #e6edf3;
        margin-bottom: 20px;
    }

    .btn-danger {
        background: linear-gradient(135deg, #b91c1c, #dc2626);
        color: #ffffff;
        border: none;
        padding: 12px 24px;
        border-radius: 8px;
        font-size: 0.95rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .btn-danger:hover {
        background: linear-gradient(135deg, #dc2626, #ef4444);
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(185, 28, 28, 0.2);
    }

    /* Modal */
    .modal {
        display: none; 
        position: fixed; 
        z-index: 1001; 
        left: 0;
        top: 0;
        width: 100%; 
        height: 100%; 
        overflow: auto; 
        background: rgba(0, 0, 0, 0.75);
        backdrop-filter: blur(4px);
    }

    .modal-content {
        background: linear-gradient(145deg, #21262d, #161b22);
        margin: 12% auto;
        padding: 35px;
        border: 1px solid #b91c1c;
        width: 90%;
        max-width: 480px;
        border-radius: 12px;
        position: relative;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
    }

    .modal-content h2 {
        color: #dc2626;
        margin-top: 0;
        margin-bottom: 16px;
        font-size: 1.4rem;
    }

    .modal-content p {
        color: #7d8590;
        margin-bottom: 25px;
        line-height: 1.5;
    }

    .close-btn {
        color: #7d8590;
        position: absolute;
        top: 15px;
        right: 20px;
        font-size: 24px;
        font-weight: bold;
        cursor: pointer;
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 6px;
        transition: all 0.2s ease;
    }

    .close-btn:hover {
        color: #e6edf3;
        background: #30363d;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .account-container {
            margin: 60px auto 40px;
            padding: 0 20px;
        }

        .account-header h1 {
            font-size: 2.2rem;
        }

        .account-card {
            padding: 25px;
        }

        .session-item {
            flex-direction: column;
            align-items: flex-start;
            gap: 12px;
        }

        .session-status {
            width: 100%;
            justify-content: space-between;
        }
    }

    /* Focus states */
    .btn-submit:focus,
    .btn-danger:focus,
    .btn-logout-single:focus {
        outline: 2px solid #16a34a;
        outline-offset: 2px;
    }
</style>

<div class="account-container">
    <div class="account-header">
        <h1>Account Settings</h1>
        <p>Manage your profile details and password.</p>
    </div>

    <?php
    // Display success or error messages
    if (isset($_SESSION['success_message'])) {
        echo '<div class="alert alert-success">' . htmlspecialchars($_SESSION['success_message']) . '</div>';
        unset($_SESSION['success_message']);
    }
    if (isset($_SESSION['error_message'])) {
        echo '<div class="alert alert-error">' . htmlspecialchars($_SESSION['error_message']) . '</div>';
        unset($_SESSION['error_message']);
    }
    ?>

    <!-- Profile Details Form -->
    <div class="account-card">
        <h2>Profile Details</h2>
        <form action="/account/update" method="POST">
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email'] ?? ''); ?>" required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['username'] ?? ''); ?>" required>
            </div>
            <button type="submit" class="btn-submit">Save Changes</button>
        </form>
    </div>

    <!-- Change Password Form -->
    <div class="account-card">
        <h2>Change Password</h2>
        <form action="/account/change-password" method="POST">
            <div class="form-group">
                <label for="current_password">Current Password</label>
                <input type="password" id="current_password" name="current_password" required>
            </div>
            <div class="form-group">
                <label for="new_password">New Password</label>
                <input type="password" id="new_password" name="new_password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm New Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit" class="btn-submit">Change Password</button>
        </form>
    </div>

    <!-- Session Management Card -->
    <div class="account-card">
        <h2>Login Activity</h2>
        <p class="session-description">This is a list of devices that have logged into your account. Revoke any sessions that you do not recognize.</p>
        
        <div class="session-list">
            <?php if (!empty($sessions)): ?>
                <?php foreach ($sessions as $session): ?>
                    <div class="session-item">
                        <div class="session-icon">
                            <i class="fas fa-laptop"></i>
                        </div>
                        <div class="session-details">
                            <span class="session-device"><?php echo htmlspecialchars($session['user_agent']); ?></span>
                            <span class="session-ip"><?php echo htmlspecialchars($session['ip_address']); ?></span>
                        </div>
                        <div class="session-status">
                            <?php if ($session['session_id'] === session_id()): ?>
                                <span class="status-tag active">Active Now</span>
                            <?php else: ?>
                                <span class="status-tag">Last active <?php echo date('M d, Y', strtotime($session['last_activity'])); ?></span>
                                <!-- NEW LOGOUT BUTTON FORM -->
                                <form action="/account/logout-session/<?php echo $session['id']; ?>" method="POST" style="display: inline-block; margin-left: 10px;">
                                    <button type="submit" class="btn-logout-single">Log Out</button>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <form action="/account/logout-others" method="POST" style="margin-top: 20px;">
            <button type="submit" class="btn-submit">Log Out From All Other Devices</button>
        </form>
    </div>

    <!-- Danger Zone -->
    <div class="account-card danger-zone">
        <h2>Danger Zone</h2>
        <p>Once you delete your account, there is no going back. Please be certain.</p>
        <button id="delete-account-btn" class="btn-danger">Delete My Account</button>
    </div>
</div>

<!-- Delete Account Confirmation Modal -->
<div id="delete-modal" class="modal">
    <div class="modal-content">
        <span class="close-btn">&times;</span>
        <h2>Confirm Account Deletion</h2>
        <p>This action is irreversible. To confirm, please enter your password.</p>
        <form action="/account/delete" method="POST">
            <div class="form-group">
                <label for="delete_password">Password</label>
                <input type="password" id="delete_password" name="password" required>
            </div>
            <button type="submit" class="btn-danger">Delete Account Permanently</button>
        </form>
    </div>
</div>

<script>
// Simple and effective modal functionality
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById("delete-modal");
    const btn = document.getElementById("delete-account-btn");
    const span = document.getElementsByClassName("close-btn")[0];

    // Open modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // Close modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // Close when clicking outside
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    // ESC key support
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape' && modal.style.display === 'block') {
            modal.style.display = 'none';
        }
    });
});
</script>

<?php require_once __DIR__ . '/partials/footer.php'; ?>