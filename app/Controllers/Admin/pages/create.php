<?php require_once __DIR__ . '/../partials/header.php'; ?>

<!-- Include Ace Editor library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/ace.js"></script>

<style>
    /* Styles for the code editor */
    #editor {
        width: 100%;
        height: 500px;
        border-radius: 4px;
    }
</style>

<div class="page-container">
    <div class="page-header">
        <h1>Create New Page</h1>
    </div>

    <form action="/admin/pages/store" method="POST">
        <div class="form-group">
            <label for="title">Page Title</label>
            <input type="text" id="title" name="title" required>
        </div>

        <div class="form-group">
            <label for="editor">Content (HTML, CSS, JS, and PHP are allowed)</label>
            <!-- This div will be turned into the Ace code editor -->
            <div id="editor"></div>
            <!-- The actual content will be stored in this hidden textarea -->
            <textarea name="content" id="content-textarea" style="display: none;"></textarea>
        </div>
        
        <div class="form-group">
            <label>
                <input type="checkbox" name="is_active" value="1" checked>
                Publish this page
            </label>
        </div>

        <button type="submit" class="btn btn-primary">Save Page</button>
        <a href="/admin/pages" class="btn">Cancel</a>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize the Ace Editor
        var editor = ace.edit("editor");
        editor.setTheme("ace/theme/monokai"); // Dark theme
        editor.session.setMode("ace/mode/php"); // Set language mode to PHP (supports HTML/CSS/JS inside)
        
        // Sync the editor's content with the hidden textarea on form submit
        var form = document.querySelector('form');
        var textarea = document.getElementById('content-textarea');
        form.addEventListener('submit', function() {
            textarea.value = editor.getValue();
        });
    });
</script>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>