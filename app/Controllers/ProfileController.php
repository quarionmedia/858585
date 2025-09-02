<?php
// English: File updated at: app/Controllers/ProfileController.php

namespace App\Controllers;

use App\Models\ProfileModel;

class ProfileController
{
    /**
     * Displays the "Who's Watching?" profile selection screen.
     */
    public function index()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        $profileModel = new ProfileModel();
        $profiles = $profileModel->findByUserId($_SESSION['user_id']);

        if (empty($profiles)) {
            header('Location: /profiles/manage');
            exit;
        }

        view('profiles/index', [
            'title' => 'Who\'s Watching?',
            'profiles' => $profiles
        ]);
    }

    /**
     * Selects a profile and stores it in the session.
     */
    public function select($profileId)
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        $profileModel = new ProfileModel();
        $profile = $profileModel->findById($profileId, $_SESSION['user_id']);

        if ($profile) {
            $_SESSION['profile_id'] = $profile['id'];
            $_SESSION['profile_name'] = $profile['name'];
            $_SESSION['profile_avatar'] = $profile['avatar'];
            
            header('Location: /');
            exit;
        }

        header('Location: /profiles');
        exit;
    }

    /**
     * Displays the "Manage Profiles" screen with existing profiles.
     */
    public function manage()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }
        
        $profileModel = new \App\Models\ProfileModel();
        $profiles = $profileModel->findByUserId($_SESSION['user_id']);
        
        // --- NEW ---
        // Get the list of local avatars to pass to the view.
        $avatars = get_available_avatars();

        view('profiles/manage', [
            'title' => 'Manage Profiles',
            'profiles' => $profiles,
            'avatars' => $avatars // Pass the avatar list to the view
        ]);
    }

    /**
     * Handles the creation of a new profile.
     */
    public function store()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        $profileModel = new \App\Models\ProfileModel();
        $profileCount = count($profileModel->findByUserId($_SESSION['user_id']));

        if ($profileCount >= 5) {
            header('Location: /profiles/manage');
            exit;
        }

        // --- UPDATED ---
        // If no avatar is selected, pick a random one from the local folder.
        $selectedAvatar = $_POST['avatar'] ?? null;
        if (empty($selectedAvatar)) {
            $avatars = get_available_avatars();
            if (!empty($avatars)) {
                $selectedAvatar = '/assets/images/avatars/' . $avatars[array_rand($avatars)];
            }
        }

        $data = [
            'user_id' => $_SESSION['user_id'],
            'name' => $_POST['name'] ?? 'New Profile',
            'is_child' => isset($_POST['is_child']) ? 1 : 0,
            'avatar' => $selectedAvatar
        ];

        $profileModel->create($data);
        header('Location: /profiles/manage');
        exit;
    }
}