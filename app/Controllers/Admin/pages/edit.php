<?php require_once __DIR__ . '/../partials/header.php'; ?>

<!-- Include Ace Editor library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/ace.js"></script>

<style>
    /* English: Styles for the code editor are the same as the create page */
    #editor {
        width: 100%;
        height: 500px;
        border-radius: 4px;
    }
</style>

<div class="page-container">
    <div class="page-header">
        <h1>Edit Page: <?php echo htmlspecialchars($page['title']); ?></h1>
    </div>

    <form action="/admin/pages/update" method="POST">
        <!-- Hidden input to send the page ID for the update query -->
        <input type="hidden" name="id" value="<?php echo $page['id']; ?>">

        <div class="form-group">
            <label for="title">Page Title</label>
            <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($page['title']); ?>" required>
        </div>

        <div class="form-group">
            <label for="editor">Content (HTML, CSS, JS, and PHP are allowed)</label>
            <!-- This div will be turned into the Ace code editor -->
            <div id="editor"><?php echo htmlspecialchars($page['content']); ?></div>
            <!-- The actual content will be stored in this hidden textarea -->
            <textarea name="content" id="content-textarea" style="display: none;"></textarea>
        </div>
        
        <div class="form-group">
            <label>
                <input type="checkbox" name="is_active" value="1" <?php echo $page['is_active'] ? 'checked' : ''; ?>>
                Publish this page
            </label>
        </div>

        <button type="submit" class="btn btn-primary">Update Page</button>
        <a href="/admin/pages" class="btn">Cancel</a>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize the Ace Editor
        var editor = ace.edit("editor");
        editor.setTheme("ace/theme/monokai"); // Dark theme
        editor.session.setMode("ace/mode/php"); // Set language mode
        
        // The editor's content is pre-filled directly from the PHP echo in the div.
        
        // Sync the editor's content with the hidden textarea on form submit
        var form = document.querySelector('form');
        var textarea = document.getElementById('content-textarea');
        form.addEventListener('submit', function() {
            textarea.value = editor.getValue();
        });
    });
</script>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>