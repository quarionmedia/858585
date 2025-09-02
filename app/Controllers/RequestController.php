<?php
// app/Controllers/RequestController.php

namespace App\Controllers;

use App\Models\RequestModel;
use App\Models\UserModel;
use App\Services\MailService;
use App\Services\TMDbService;

class RequestController
{
    /**
     * İstek yapma sayfasını ve kullanıcının geçmiş isteklerini gösterir.
     */
    public function index()
    {
        if (session_status() === PHP_SESSION_NONE) { session_start(); }
        if (!isset($_SESSION['user_id']) || !isset($_SESSION['profile_id'])) {
            header('Location: /login');
            exit;
        }

        $requestModel = new RequestModel();
        $requests = $requestModel->findByProfileId($_SESSION['profile_id']);

        view('requests', [
            'title' => 'Make a Request',
            'pageTitle' => 'Request Content',
            'requests' => $requests
        ]);
    }

    /**
     * Kullanıcının AJAX ile gönderdiği yeni içeriği veritabanına kaydeder
     * ve kullanıcıya bilgilendirme e-postası gönderir.
     */
    public function store()
    {
        header('Content-Type: application/json');

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user_id']) || !isset($_SESSION['profile_id'])) {
            echo json_encode(['status' => 'error', 'message' => 'You must be logged in to make a request.']);
            exit;
        }

        $data = [
            'user_id'    => $_SESSION['user_id'],
            'profile_id' => $_SESSION['profile_id'],
            'title'      => $_POST['title'] ?? null,
            'type'       => $_POST['type'] ?? null,
            'poster_path'=> $_POST['poster_path'] ?? null
        ];

        if (empty($data['title']) || empty($data['type'])) {
            echo json_encode(['status' => 'error', 'message' => 'Invalid data provided.']);
            exit;
        }

        $requestModel = new \App\Models\RequestModel();
        if ($requestModel->create($data)) {
            
            // --- E-POSTA GÖNDERME KISMI ---
            $userModel = new \App\Models\UserModel();
            $user = $userModel->findById($_SESSION['user_id']);

            if ($user) {
                $mailService = new \App\Services\MailService();
                $context = [
                    'username' => $user['username'],
                    'request_title' => $data['title']
                ];
                // 'request_submitted' isimli e-posta şablonunu kullanır
                $mailService->sendTemplateEmail('request_submitted', $user['email'], $context);
            }
            // --- E-POSTA GÖNDERME SONU ---

            echo json_encode(['status' => 'success', 'message' => 'Request submitted successfully!']);
        
        } else {
            // Hata mesajını daha spesifik hale getirelim
            echo json_encode(['status' => 'error', 'message' => 'Database error: Could not save the request.']);
        }
        exit;
    }

    /**
     * TMDb API'sinde canlı arama yapar.
     */
    public function searchTMDb()
    {
        header('Content-Type: application/json');
        $query = $_GET['q'] ?? '';

        if (empty($query)) {
            echo json_encode(['results' => []]);
            exit;
        }

        $tmdbService = new TMDbService();
        $results = $tmdbService->searchMulti($query);

        $filteredResults = [];
        if (!empty($results['results'])) {
            foreach ($results['results'] as $item) {
                if (($item['media_type'] === 'movie' || $item['media_type'] === 'tv') && !empty($item['poster_path'])) {
                    $filteredResults[] = [
                        'id' => $item['id'],
                        'title' => $item['title'] ?? $item['name'],
                        'poster_path' => $item['poster_path'],
                        'type' => $item['media_type']
                    ];
                }
            }
        }
        echo json_encode(['results' => $filteredResults]);
        exit;
    }
}