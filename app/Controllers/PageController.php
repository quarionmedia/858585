<?php
// English: File created at: app/Controllers/PageController.php

namespace App\Controllers;

use App\Models\PageModel;

class PageController
{
    /**
     * Displays a single custom page on the front-end.
     * @param string $slug The URL slug of the page.
     */
    public function show($slug)
    {
        $pageModel = new PageModel();
        $page = $pageModel->findBySlug($slug);

        if (!$page) {
            // If the page doesn't exist or is not active, show a 404 error.
            http_response_code(404);
            return view('404');
        }

        return view('page', [
            'title' => $page['title'],
            'page' => $page
        ]);
    }
}