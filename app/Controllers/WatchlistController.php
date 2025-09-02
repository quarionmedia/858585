<?php
// English: File updated at: app/Controllers/WatchlistController.php

namespace App\Controllers;

use App\Models\WatchlistModel;

class WatchlistController
{
    /**
     * Handles the AJAX request to add or remove an item from a profile's watchlist.
     */
    public function toggle()
    {
        header('Content-Type: application/json');

        try {
            // Check if a user is logged in AND a profile has been selected.
            if (!isset($_SESSION['user_id']) || !isset($_SESSION['profile_id'])) {
                throw new \Exception('A profile must be selected to use the watchlist.');
            }

            // UPDATED: Use the profile_id from the session.
            $profileId = $_SESSION['profile_id'];
            $contentId = $_POST['content_id'] ?? null;
            $contentType = $_POST['content_type'] ?? null;

            if (!$contentId || !$contentType) {
                throw new \Exception('Missing content information.');
            }

            $watchlistModel = new WatchlistModel();
            
            // UPDATED: Pass the profileId to the model function.
            $result = $watchlistModel->toggleWatchlist($profileId, $contentId, $contentType);
            
            echo json_encode($result);

        } catch (\Throwable $e) {
            // Return a proper error response if something goes wrong.
            echo json_encode([
                'status' => 'error', 
                'message' => 'Server Error: ' . $e->getMessage()
            ]);
        }
        exit;
    }
}
