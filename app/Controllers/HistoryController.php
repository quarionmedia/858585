<?php
// English: File created at: app/Controllers/HistoryController.php

namespace App\Controllers;

// We will add the models here in the next step
// use App\Models\WatchHistoryModel;
// use App\Models\SearchHistoryModel;
// use App\Models\CommentModel;

class HistoryController
{
    /**
     * A private helper to ensure the user is logged in and has selected a profile.
     * If not, it redirects them away.
     */
    private function enforceProfileSelection()
    {
        if (!isset($_SESSION['user_id']) || !isset($_SESSION['profile_id'])) {
            header('Location: /login');
            exit;
        }
    }

    /**
     * Displays the watch history for the current profile.
     * (This is a placeholder for now, we will complete it in the next steps)
     */
    public function showWatchHistory()
    {
        $this->enforceProfileSelection();

        // TODO: Fetch watch history from the model and pass to the view.
        
        view('history/watch', [
            'title' => 'Watch History',
            'pageTitle' => 'My Watch History',
            'historyItems' => [] // Placeholder
        ]);
    }

    /**
     * Displays the search history for the current profile.
     * (This is a placeholder for now)
     */
    public function showSearchHistory()
    {
        $this->enforceProfileSelection();

        // TODO: Fetch search history from the model.

        view('history/search', [
            'title' => 'Search History',
            'pageTitle' => 'My Search History',
            'historyItems' => [] // Placeholder
        ]);
    }

    /**
     * Displays the comment history for the current profile.
     * (This is a placeholder for now)
     */
    public function showCommentHistory()
    {
        $this->enforceProfileSelection();

        // TODO: Fetch comment history from the model.
        
        view('history/comments', [
            'title' => 'Comment History',
            'pageTitle' => 'My Comment History',
            'historyItems' => [] // Placeholder
        ]);
    }
}