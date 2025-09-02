<?php
use App\Controllers\HomeController;
use App\Controllers\AuthController;
use App\Controllers\AdminController;
use App\Controllers\UserController;
use App\Controllers\ProfileController;
use App\Controllers\WatchlistController;
use App\Controllers\HistoryController;

class Router {
    public static function route($url) {
        $urlParts = explode('/', $url);

        // Home Page Route
        if ($url == '') {
            $controller = new HomeController();
            $controller->index();
        }

        // Platform sayfasÄ± rotasÄ±: /platforms/{slug}
        elseif ($urlParts[0] == 'platforms' && isset($urlParts[1])) {
            $slug = $urlParts[1];
            $controller = new HomeController();
            $controller->showPlatformPage($slug);
        }
        
        // Register Route
        elseif ($url == 'register') {
            $controller = new AuthController();
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $controller->register();
            } else {
                $controller->showRegisterForm();
            }
        } 
        // Login Route
        elseif ($url == 'login') {
            $controller = new AuthController();
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $controller->login();
            } else {
                $controller->showLoginForm();
            }
        }
        // Logout Route
        elseif ($url == 'logout') {
            $controller = new AuthController();
            $controller->logout();
        }
        // Watchlist API Route
        elseif ($urlParts[0] == 'watchlist' && isset($urlParts[1]) && $urlParts[1] == 'toggle') {
           $controller = new WatchlistController();
           $controller->toggle();
        }
        // Admin Routes
        elseif ($urlParts[0] == 'admin') {
            $controller = new AdminController();
            
            // /admin
            if (!isset($urlParts[1])) {
                $controller->index();
            } 
            // /admin/movies/...
            elseif ($urlParts[1] == 'movies') {
                if (!isset($urlParts[2])) {
                    $controller->listMovies();
                } 
                elseif ($urlParts[2] == 'add') {
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $controller->storeMovie();
                    } else {
                        $controller->showAddMovieForm();
                    }
                }
                elseif ($urlParts[2] == 'tmdb-import') {
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $controller->importFromTMDb();
                    }
                }
                elseif ($urlParts[2] == 'delete' && isset($urlParts[3])) {
                    $id = (int)$urlParts[3];
                    $controller->deleteMovie($id);
                }
                elseif ($urlParts[2] == 'edit' && isset($urlParts[3])) {
                    $id = (int)$urlParts[3];
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $controller->updateMovie($id);
                    } else {
                        $controller->showEditMovieForm($id);
                    }
                }
            }
            // /admin/tv-shows/...
            elseif ($urlParts[1] == 'tv-shows') {
                if (!isset($urlParts[2])) {
                    $controller->listTvShows();
                }
                elseif ($urlParts[2] == 'add') {
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $controller->storeTvShow();
                    } else {
                        $controller->showAddTvShowForm();
                    }
                }
                elseif ($urlParts[2] == 'tmdb-import') {
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $controller->importTvShowFromTMDb();
                    }
                }
                elseif ($urlParts[2] == 'import-seasons' && isset($urlParts[3]) && isset($urlParts[4])) {
                    $tvShowDbId = (int)$urlParts[3];
                    $tvShowTmdbId = (int)$urlParts[4];
                    $controller->importSeasons($tvShowDbId, $tvShowTmdbId);
                }
                elseif ($urlParts[2] == 'edit' && isset($urlParts[3])) {
                    $id = (int)$urlParts[3];
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $controller->updateTvShow($id);
                    } else {
                        $controller->showEditTvShowForm($id);
                    }
                }
                elseif ($urlParts[2] == 'delete' && isset($urlParts[3])) {
                    $id = (int)$urlParts[3];
                    $controller->deleteTvShow($id);
                }
            }

            // /admin/users/...
            elseif ($urlParts[1] == 'users') {
                // Edit and Update: /admin/users/edit/{id}
                if (isset($urlParts[2]) && $urlParts[2] == 'edit' && isset($urlParts[3])) {
                    $id = (int)$urlParts[3];
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $controller->updateUser($id);
                    } else {
                        $controller->showEditUserForm($id);
                    }
                }
                // Delete: /admin/users/delete/{id}
                elseif (isset($urlParts[2]) && $urlParts[2] == 'delete' && isset($urlParts[3])) {
                    $id = (int)$urlParts[3];
                    $controller->deleteUser($id);
                }
                // List: /admin/users
                else {
                    $controller->listUsers();
                }
            }

            // /admin/manage-seasons/{id}
            elseif ($urlParts[1] == 'manage-seasons') {
                // DÃ¼zenleme rotasÄ±: GET|POST /admin/manage-seasons/edit/{seasonId}
                if (isset($urlParts[2]) && $urlParts[2] == 'edit' && isset($urlParts[3])) {
                    $seasonId = (int)$urlParts[3];
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $controller->updateSeason($seasonId);
                    } else {
                        $controller->showEditSeasonForm($seasonId);
                    }
                }
                // Silme rotasÄ±: GET /admin/manage-seasons/delete/{seasonId}
                elseif (isset($urlParts[2]) && $urlParts[2] == 'delete' && isset($urlParts[3])) {
                    $seasonId = (int)$urlParts[3];
                    $controller->deleteSeason($seasonId);
                }
                // Manuel sezon ekleme rotasÄ±: POST /admin/manage-seasons/add/{tvShowId}
                elseif (isset($urlParts[2]) && $urlParts[2] == 'add' && isset($urlParts[3])) {
                    $tvShowId = (int)$urlParts[3];
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $controller->storeManualSeason($tvShowId);
                    }
                }
                // Sezon listeleme sayfasÄ±: GET /admin/manage-seasons/{tvShowId}
                elseif (isset($urlParts[2])) {
                    $id = (int)$urlParts[2];
                    $controller->manageSeasons($id);
                }
            }

            // /admin/manage-episodes/{seasonId}
            elseif ($urlParts[1] == 'manage-episodes') {
                // DÃ¼zenleme rotasÄ±: POST /admin/manage-episodes/edit/{episodeId}
                if (isset($urlParts[2]) && $urlParts[2] == 'edit' && isset($urlParts[3])) {
                    $episodeId = (int)$urlParts[3];
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $controller->updateEpisodeDetails($episodeId);
                    }
                }
                // Silme rotasÄ±: GET /admin/manage-episodes/delete/{episodeId}
                elseif (isset($urlParts[2]) && $urlParts[2] == 'delete' && isset($urlParts[3])) {
                    $episodeId = (int)$urlParts[3];
                    $controller->deleteEpisode($episodeId);
                }
                // Manuel bÃ¶lÃ¼m ekleme rotasÄ±: POST /admin/manage-episodes/add/{seasonId}
                elseif (isset($urlParts[2]) && $urlParts[2] == 'add' && isset($urlParts[3])) {
                    $seasonId = (int)$urlParts[3];
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $controller->storeManualEpisode($seasonId);
                    }
                }
                // BÃ¶lÃ¼mleri Ã§ekme rotasÄ±: GET /admin/manage-episodes/fetch/{seasonId}
                elseif (isset($urlParts[2]) && $urlParts[2] == 'fetch' && isset($urlParts[3])) {
                    $seasonId = (int)$urlParts[3];
                    $controller->fetchEpisodesForSeason($seasonId);
                }
                // BÃ¶lÃ¼m listeleme sayfasÄ±: GET /admin/manage-episodes/{seasonId}
                elseif (isset($urlParts[2])) {
                    $seasonId = (int)$urlParts[2];
                    $controller->manageEpisodes($seasonId);
                }
            }

            // /admin/manage-episode-links/...
            elseif ($urlParts[1] == 'manage-episode-links') {
                // Silme rotasÄ±: /admin/manage-episode-links/delete/{linkId}/{episodeId}
                if (isset($urlParts[2]) && $urlParts[2] == 'delete' && isset($urlParts[3]) && isset($urlParts[4])) {
                    $linkId = (int)$urlParts[3];
                    $episodeId = (int)$urlParts[4];
                    $controller->deleteEpisodeLink($linkId, $episodeId);
                }
                // Listeleme ve Ekleme rotasÄ±: /admin/manage-episode-links/{episodeId}
                elseif (isset($urlParts[2])) {
                    $episodeId = (int)$urlParts[2];
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $controller->storeEpisodeLink($episodeId);
                    } else {
                        $controller->showEpisodeLinksManager($episodeId);
                    }
                }
            }

            // /admin/manage_subtitles/... (Unified for both movies and episodes)
            elseif ($urlParts[1] == 'manage_subtitles') {
                // Delete route: /admin/manage_subtitles/delete/{subtitleId}/{linkId}
                if (isset($urlParts[2]) && $urlParts[2] == 'delete' && isset($urlParts[3]) && isset($urlParts[4])) {
                    $subtitleId = (int)$urlParts[3];
                    $linkId = (int)$urlParts[4];
                    $controller->deleteSubtitle($subtitleId, $linkId);
                }
                // List and Add routes: /admin/manage_subtitles/{linkId}
                elseif (isset($urlParts[2])) {
                    $linkId = (int)$urlParts[2];
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $controller->storeSubtitle($linkId);
                    } else {
                        $controller->showSubtitleManager($linkId);
                    }
                }
            }
            
            // /admin/episodes/...
            elseif ($urlParts[1] == 'episodes') {
                if ($urlParts[2] == 'edit' && isset($urlParts[3])) {
                    $id = (int)$urlParts[3];
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $controller->updateEpisode($id);
                    } else {
                        $controller->showEditEpisodeForm($id);
                    }
                }
            }

            // /admin/manage-movie-links/...
            elseif ($urlParts[1] == 'manage-movie-links') {
                // Edit rotasÄ±: /admin/manage-movie-links/edit/{linkId}
                if (isset($urlParts[2]) && $urlParts[2] == 'edit' && isset($urlParts[3])) {
                    $linkId = (int)$urlParts[3];
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $controller->updateMovieLink($linkId);
                    } else {
                        $controller->showEditMovieLinkForm($linkId);
                    }
                }
                // Silme rotasÄ±: /admin/manage-movie-links/delete/{linkId}/{movieId}
                elseif (isset($urlParts[2]) && $urlParts[2] == 'delete' && isset($urlParts[3]) && isset($urlParts[4])) {
                    $linkId = (int)$urlParts[3];
                    $movieId = (int)$urlParts[4];
                    $controller->deleteMovieLink($linkId, $movieId);
                }
                // Listeleme ve Ekleme rotasÄ±: /admin/manage-movie-links/{movieId}
                elseif (isset($urlParts[2])) {
                    $movieId = (int)$urlParts[2];
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $controller->storeMovieLink($movieId);
                    } else {
                        $controller->showMovieLinksManager($movieId);
                    }
                }
            }

            // /admin/menu routing logic
            elseif ($urlParts[1] == 'menu') {
                if (isset($urlParts[2])) {
                    if ($urlParts[2] == 'add') {
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $controller->storeMenuItem();
                        } else {
                            $controller->showAddMenuItemForm();
                        }
                    }
                    elseif ($urlParts[2] == 'delete' && isset($urlParts[3])) {
                        $controller->deleteMenuItem((int)$urlParts[3]);
                    }
                    elseif ($urlParts[2] == 'edit' && isset($urlParts[3])) {
                        $id = (int)$urlParts[3];
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $controller->updateMenuItem($id);
                        } else {
                            $controller->showEditMenuItemForm($id);
                        }
                    }
                } else {
                    $controller->listMenuItems();
                }
            }

            // /admin/video-ads routing logic
            elseif ($urlParts[1] == 'video-ads') {
                if (isset($urlParts[2]) && $urlParts[2] == 'add' && $_SERVER['REQUEST_METHOD'] === 'POST') {
                    $controller->storeVideoAd();
                }
                elseif (isset($urlParts[2]) && $urlParts[2] == 'delete' && isset($urlParts[3])) {
                    $controller->deleteVideoAd((int)$urlParts[3]);
                }
                elseif (isset($urlParts[2]) && $urlParts[2] == 'toggle' && isset($urlParts[3])) {
                    $controller->toggleVideoAdStatus((int)$urlParts[3]);
                }
                else {
                    $controller->listVideoAds();
                }
            }

            // /admin/comments/...
            elseif ($urlParts[1] == 'comments') {
                // Approve: /admin/comments/approve/{id}
                if (isset($urlParts[2]) && $urlParts[2] == 'approve' && isset($urlParts[3])) {
                    $controller->approveComment((int)$urlParts[3]);
                }
                // Unapprove: /admin/comments/unapprove/{id}
                elseif (isset($urlParts[2]) && $urlParts[2] == 'unapprove' && isset($urlParts[3])) {
                    $controller->unapproveComment((int)$urlParts[3]);
                }
                // Delete: /admin/comments/delete/{id}
                elseif (isset($urlParts[2]) && $urlParts[2] == 'delete' && isset($urlParts[3])) {
                    $controller->deleteComment((int)$urlParts[3]);
                }
                // List: /admin/comments
                else {
                    $controller->listComments();
                }
            }

            // /admin/reports/...
            elseif ($urlParts[1] == 'reports') {
                // Mark as resolved: /admin/reports/resolve/{id}
                if (isset($urlParts[2]) && $urlParts[2] == 'resolve' && isset($urlParts[3])) {
                    $controller->resolveReport((int)$urlParts[3]);
                }
                // Delete: /admin/reports/delete/{id}
                elseif (isset($urlParts[2]) && $urlParts[2] == 'delete' && isset($urlParts[3])) {
                    $controller->deleteReport((int)$urlParts[3]);
                }
                // List: /admin/reports
                else {
                    $controller->listReports();
                }
            }

            // /admin/requests/...
            elseif ($urlParts[1] == 'requests') {
                // Durumu gÃ¼ncelleme rotasÄ±: /admin/requests/update-status/{id}/{status}
                if (isset($urlParts[2]) && $urlParts[2] == 'update-status' && isset($urlParts[3]) && isset($urlParts[4])) {
                    $requestId = (int)$urlParts[3];
                    $status = $urlParts[4]; // status bir string olduÄŸu iÃ§in int'e Ã§evirmiyoruz
                    $controller->updateRequestStatus($requestId, $status);
                }
                // Silme rotasÄ±: /admin/requests/delete/{id}
                elseif (isset($urlParts[2]) && $urlParts[2] == 'delete' && isset($urlParts[3])) {
                    $controller->deleteRequest((int)$urlParts[3]);
                }
                // Listeleme rotasÄ±: /admin/requests
                else {
                    $controller->listRequests();
                }
            }
            
            // /admin/settings/...
            elseif ($urlParts[1] == 'settings') {
                $page = $urlParts[2] ?? 'general'; // VarsayÄ±lan sayfa 'general' olsun

                if ($page == 'general') {
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $controller->updateGeneralSettings();
                    } else {
                        $controller->showGeneralSettingsForm();
                    }
                }
                elseif ($page == 'api') {
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $controller->updateApiSettings();
                    } else {
                        $controller->showApiSettingsForm();
                    }
                }
                elseif ($page == 'security') {
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $controller->updateSecuritySettings();
                    } else {
                        $controller->showSecuritySettingsForm();
                    }
                }
                // Eski rotalarÄ± koruyalÄ±m
                elseif ($page == 'test-mail') {
                    $controller->sendTestEmail();
                }
                elseif ($page == 'email-templates') {
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $controller->updateEmailTemplates();
                    } else {
                        $controller->showEmailTemplatesForm();
                    }
                }
            }

            // /admin/ads-settings
            elseif ($urlParts[1] == 'ads-settings') {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $controller->updateAdsSettings();
                } else {
                    $controller->showAdsSettingsForm();
                }
            }

            // /admin/content-networks
            elseif ($urlParts[1] == 'content-networks') {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $controller->updateContentNetworks();
                } else {
                    $controller->showContentNetworksForm();
                }
            }

            // /admin/platforms/...
            elseif ($urlParts[1] == 'platforms') {
                // Edit and Update: /admin/platforms/edit/{id}
                if (isset($urlParts[2]) && $urlParts[2] === 'edit' && isset($urlParts[3])) {
                    $id = (int)$urlParts[3];
                    // This route will handle the POST request from the edit modal
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $controller->updatePlatform($id);
                    }
                }
                // Delete: /admin/platforms/delete/{id}
                elseif (isset($urlParts[2]) && $urlParts[2] === 'delete' && isset($urlParts[3])) {
                    $controller->deletePlatform((int)$urlParts[3]);
                } 
                // List & Store routes are combined on the base URL
                else {
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $controller->storePlatform();
                    } else {
                        $controller->listPlatforms();
                    }
                }
            }

            // /admin/genres/...
            elseif ($urlParts[1] == 'genres') {
                // Add Genre: /admin/genres/add
                if (isset($urlParts[2]) && $urlParts[2] == 'add') {
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $controller->storeGenre();
                    } else {
                        $controller->showAddGenreForm();
                    }
                }
                // Edit and Update Genre: /admin/genres/edit/{id}
                elseif (isset($urlParts[2]) && $urlParts[2] == 'edit' && isset($urlParts[3])) {
                    $id = (int)$urlParts[3];
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $controller->updateGenre($id);
                    } else {
                        $controller->showEditGenreForm($id);
                    }
                }
                // Delete Genre: /admin/genres/delete/{id}
                elseif (isset($urlParts[2]) && $urlParts[2] == 'delete' && isset($urlParts[3])) {
                    $id = (int)$urlParts[3];
                    $controller->deleteGenre($id);
                }
                // List Genres: /admin/genres
                else {
                    $controller->listGenres();
                }
            }

            // /admin/smtp-settings
            elseif ($urlParts[1] == 'smtp-settings') {
                if (isset($urlParts[2]) && $urlParts[2] == 'test-mail') {
                    $controller->sendTestEmail();
                } else {
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $controller->updateSmtpSettings();
                    } else {
                        $controller->showSmtpSettingsForm();
                    }
                }
            }
        }

        // Arama RotasÄ±
        elseif ($urlParts[0] == 'search') {
            $controller = new HomeController();
            if (isset($_GET['q'])) {
                $controller->search();
            } else {
                $controller->showSearchPage();
            }
        }

        // CanlÄ± Arama API RotasÄ±: /api/search?q=...
        elseif ($urlParts[0] == 'api' && isset($urlParts[1]) && $urlParts[1] == 'search') {
            $controller = new HomeController();
            $controller->liveSearch();
        }

        // Add this route to your Router file
        elseif ($urlParts[0] == 'comments' && isset($urlParts[1]) && $urlParts[1] == 'store') {
            $controller = new HomeController();
            $controller->storeComment();
        }
        // Add this route for the AJAX like functionality
        elseif ($urlParts[0] == 'api' && isset($urlParts[1]) && $urlParts[1] == 'comments' && isset($urlParts[2]) && $urlParts[2] == 'toggle-like') {
            $controller = new HomeController();
            $controller->toggleCommentLike();
        }

        // =======================================================
        // MOVIE ROUTES (Most specific to most general)
        // =======================================================

        // 1. Movie Watch Page (MOST SPECIFIC)
        elseif ($urlParts[0] == 'movie' && isset($urlParts[1]) && isset($urlParts[2]) && $urlParts[2] == 'watch') {
            $slug = $urlParts[1];
            $controller = new HomeController();
            $controller->showMovieWatchPage($slug);
        }

        // 2. Movie Detail Page (More general)
        elseif ($urlParts[0] == 'movie' && isset($urlParts[1])) {
            $slug = $urlParts[1];
            $controller = new HomeController();
            $controller->showMovieDetail($slug);
        }

        // 3. All Movies List Page (MOST GENERAL)
        elseif ($urlParts[0] == 'movies') {
            $controller = new HomeController();
            $controller->showMoviesPage();
        }

        // =======================================================
        // TV SHOW ROUTES (Most specific to most general)
        // =======================================================

        // 1. TV Show Episode Watch Page (MOST SPECIFIC)
        elseif ($urlParts[0] == 'tv-show' && isset($urlParts[1]) && isset($urlParts[2]) && strpos($urlParts[2], 'x') !== false) {
            $slug = $urlParts[1];
            $seasonEpisode = $urlParts[2];
            $controller = new HomeController();
            $controller->showEpisodeWatchPageByNumber($slug, $seasonEpisode);
        }

        // 2. TV Show Detail Page (More general)
        elseif ($urlParts[0] == 'tv-show' && isset($urlParts[1])) {
            $slug = $urlParts[1];
            $controller = new HomeController();
            $controller->showTvShowDetail($slug);
        }

        // 3. All TV Shows List Page (MOST GENERAL)
        elseif ($urlParts[0] == 'tv-shows') {
            $controller = new HomeController();
            $controller->showTvShowsPage();
        }

        // Watchlist Page Route
        elseif ($url == 'watchlist') {
            $controller = new HomeController();
            $controller->showWatchlistPage();
        }

        // User account routes
        // Handles GET request to show the account page
        elseif ($url == 'account' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $controller = new UserController();
            $controller->showAccountPage();
        }
        // Handles POST request to update profile details
        elseif ($url == 'account/update' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller = new UserController();
            $controller->updateProfile();
        }
        // Handles POST request to change password
        elseif ($url == 'account/change-password' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller = new UserController();
            $controller->changePassword();
        }
        // Handles POST request to delete the user's account
        elseif ($url == 'account/delete' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller = new UserController();
            $controller->deleteAccount();
        }
        // Handles POST request to log out from all other devices
        elseif ($url == 'account/logout-others' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller = new UserController();
            $controller->logoutOtherSessions();
        }
        // Handles POST request to log out a specific session by its ID
        elseif ($urlParts[0] == 'account' && $urlParts[1] == 'logout-session' && isset($urlParts[2]) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $sessionId = (int)$urlParts[2];
            $controller = new UserController();
            $controller->logoutSingleSession($sessionId);
        }

        // Profile management routes
        // Shows the "Who's Watching?" profile selection screen.
        elseif ($url == 'profiles' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $controller = new ProfileController();
            $controller->index();
        }
        // Shows the "Manage Profiles" screen.
        elseif ($url == 'profiles/manage' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $controller = new ProfileController();
            $controller->manage();
        }
        // Handles the creation of a new profile.
        elseif ($url == 'profiles/store' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller = new ProfileController();
            $controller->store();
        }
        // Handles selecting a profile to start watching.
        elseif ($urlParts[0] == 'profiles' && $urlParts[1] == 'select' && isset($urlParts[2])) {
            $profileId = (int)$urlParts[2];
            $controller = new ProfileController();
            $controller->select($profileId);
        }

        // History pages routes
        // Handles all /history/... routes
        elseif ($urlParts[0] == 'history' && isset($urlParts[1])) {
            $controller = new HistoryController();
            $page = $urlParts[1];

            if ($page == 'watch') {
                $controller->showWatchHistory();
            } elseif ($page == 'search') {
                $controller->showSearchHistory();
            } elseif ($page == 'comments') {
                $controller->showCommentHistory();
            } else {
                // If the history page doesn't exist, show 404
                http_response_code(404);
                view('404');
            }
        }

        // --- ADD THIS NEW ROUTE FOR SUBMITTING REPORTS ---
        elseif ($url == 'report/submit' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller = new \App\Controllers\HomeController();
            $controller->submitReport();
        }

        // --- ADD THIS NEW BLOCK FOR CODE VERIFICATION ---
        // Shows the verification code entry form
        elseif ($url == 'register/verify' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $controller = new \App\Controllers\AuthController();
            $controller->showVerificationForm();
        }
        // Handles the submission of the verification code
        elseif ($url == 'register/verify' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller = new \App\Controllers\AuthController();
            $controller->processVerification();
        }
        // --- ADD THIS NEW ROUTE FOR PROCESSING THE VERIFICATION CODE ---
        // Handles the form submission from the verify.php page
        elseif ($url == 'register/verify/process' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller = new \App\Controllers\AuthController();
            $controller->processVerification();
        }
        // --- ADD THIS NEW ROUTE FOR RESENDING THE VERIFICATION CODE ---
        // Handles the POST request from the "Resend Code" button
        elseif ($url == 'register/resend' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller = new \App\Controllers\AuthController();
            $controller->resendVerificationCode();
        }
        // --- DOĞRU KODU BURAYA EKLEYİN ---

         // Handles both GET and POST for login verification
        elseif ($url == 'login/verify') {
            $controller = new \App\Controllers\AuthController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handles the form submission
            $controller->processLoginVerification();
        } else {
        // Shows the verification form
        $controller->showLoginVerificationForm();
        }
        }

        // --- UPDATED AND CORRECTED BLOCK FOR PASSWORD RESET OTP ---
        // Step 1: Show the form to request a code
        elseif ($url == 'forgot-password') {
            $controller = new \App\Controllers\AuthController();
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $controller->handleForgotPasswordRequest();
            } else {
                $controller->showForgotPasswordForm();
            }
        }
        // Step 2: Show the form to enter the verification code
        elseif ($url == 'reset-password/verify') {
            $controller = new \App\Controllers\AuthController();
            // This route handles both showing the form (GET) and processing the code (POST)
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $controller->handleResetCodeVerification();
            } else {
                $controller->showResetCodeForm();
            }
        }
        // Step 3: Show the form to enter a new password (after code is verified)
        elseif ($url == 'reset-password/new') {
            $controller = new \App\Controllers\AuthController();
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $controller->handleResetPassword();
            } else {
                $controller->showNewPasswordForm();
            }
        }
        // --- ADD THIS NEW BLOCK FOR USER REQUESTS ---
        // Shows the request page
        elseif ($url == 'requests' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $controller = new \App\Controllers\RequestController();
            $controller->index();
        }
        // Handles the new request form submission
        elseif ($url == 'requests/store' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller = new \App\Controllers\RequestController();
            $controller->store();
        }
        // --- ADD THIS NEW ROUTE FOR LIVE TMDB SEARCH ---
        // Handles live search requests from the "Requests" page.
        elseif ($url == 'api/tmdb/search' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $controller = new \App\Controllers\RequestController();
            $controller->searchTMDb();
        }
        // --- ADD THIS NEW BLOCK FOR CUSTOM PAGES ---
        // Front-end: Displays a single custom page
        elseif ($urlParts[0] == 'page' && isset($urlParts[1])) {
            $slug = $urlParts[1];
            $controller = new \App\Controllers\PageController(); // We will create this controller next
            $controller->show($slug);
        }
        // Admin: List all custom pages
        elseif ($url == 'admin/pages') {
            $controller = new \App\Controllers\Admin\PageController(); // This will be a new admin controller
            $controller->index();
        }
        // Admin: Show form to create a new page
        elseif ($url == 'admin/pages/create') {
            $controller = new \App\Controllers\Admin\PageController();
            $controller->create();
        }
        // Admin: Handle form submission for creating a page
        elseif ($url == 'admin/pages/store' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller = new \App\Controllers\Admin\PageController();
            $controller->store();
        }
        // Admin: Show form to edit an existing page
        elseif ($urlParts[0] == 'admin' && $urlParts[1] == 'pages' && $urlParts[2] == 'edit' && isset($urlParts[3])) {
            $id = (int)$urlParts[3];
            $controller = new \App\Controllers\Admin\PageController();
            $controller->edit($id);
        }
        // Admin: Handle form submission for updating a page
        elseif ($urlParts[0] == 'admin' && $urlParts[1] == 'pages' && $urlParts[2] == 'update' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller = new \App\Controllers\Admin\PageController();
            $controller->update();
        }
        // Admin: Handle deleting a page
        elseif ($urlParts[0] == 'admin' && $urlParts[1] == 'pages' && $urlParts[2] == 'delete' && isset($urlParts[3])) {
            $id = (int)$urlParts[3];
            $controller = new \App\Controllers\Admin\PageController();
            $controller->delete($id);
        }
        // --- END OF NEW BLOCK ---
        

        // 404 Not Found
        else {
            // Set the HTTP response code to 404 Not Found
            http_response_code(404);

            // Call your helper function to render the 404 view
            // Your HomeController already uses this, so it should work.
            view('404');
        }
    }
}