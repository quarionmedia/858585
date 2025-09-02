<?php require_once __DIR__ . '/../partials/header.php'; ?>

<div class="page-container">
    <div class="page-header">
        <h1>Manage Custom Pages</h1>
        <a href="/admin/pages/create" class="btn btn-primary">Create New Page</a>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($pages)): ?>
                    <?php foreach ($pages as $page): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($page['title']); ?></td>
                            <td>/page/<?php echo htmlspecialchars($page['slug']); ?></td>
                            <td>
                                <?php if ($page['is_active']): ?>
                                    <span style="color: #28a745;">Active</span>
                                <?php else: ?>
                                    <span style="color: #dc3545;">Inactive</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="/admin/pages/edit/<?php echo $page['id']; ?>" class="btn btn-sm">Edit</a>
                                <a href="/admin/pages/delete/<?php echo $page['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" style="text-align: center;">No custom pages found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>