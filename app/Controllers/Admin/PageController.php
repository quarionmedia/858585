<?php
// English: File updated at: app/Controllers/Admin/PageController.php
// --- START: DEBUGGING CODE ---
// This code will force PHP to display any fatal errors on the screen.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// --- END: DEBUGGING CODE ---
namespace App\Controllers\Admin;


use App\Models\PageModel;

class PageController
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) { session_start(); }
        if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
            header('Location: /login');
            exit;
        }
    }

    public function index()
    {
        $pageModel = new PageModel();
        $pages = $pageModel->findAll();

        return view('admin/pages/index', [
            'title' => 'Manage Custom Pages',
            'pages' => $pages
        ]);
    }

    public function create()
    {
        return view('admin/pages/create', [
            'title' => 'Create New Page'
        ]);
    }

    public function store()
    {
        $slug = $this->slugify($_POST['title']);
        $data = [
            'title' => $_POST['title'],
            'slug' => $slug,
            'content' => $_POST['content'],
            'is_active' => isset($_POST['is_active']) ? 1 : 0
        ];

        $pageModel = new PageModel();
        $pageModel->create($data);

        header('Location: /admin/pages');
        exit;
    }

    /**
     * --- NEWLY COMPLETED FUNCTIONS ---
     */

    public function edit($id)
    {
        $pageModel = new PageModel();
        $page = $pageModel->findById($id);

        if (!$page) {
            header('Location: /admin/pages');
            exit;
        }

        // We will create this view file in the next step
        return view('admin/pages/edit', [
            'title' => 'Edit Page',
            'page' => $page
        ]);
    }

    public function update()
    {
        $id = $_POST['id'];
        $slug = $this->slugify($_POST['title']);
        $data = [
            'title' => $_POST['title'],
            'slug' => $slug,
            'content' => $_POST['content'],
            'is_active' => isset($_POST['is_active']) ? 1 : 0
        ];

        $pageModel = new PageModel();
        $pageModel->update($id, $data);

        header('Location: /admin/pages');
        exit;
    }

    public function delete($id)
    {
        $pageModel = new PageModel();
        $pageModel->deleteById($id);

        header('Location: /admin/pages');
        exit;
    }

    private function slugify($text)
    {
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        $text = trim($text, '-');
        $text = preg_replace('~-+~', '-', $text);
        $text = strtolower($text);
        return empty($text) ? 'n-a' : $text;
    }
}