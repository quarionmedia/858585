<?php require_once __DIR__ . '/partials/header.php'; ?>

<style>
    /* Styles are copied from list-all-movies.php for a consistent look. */
    .results-container {
        padding: 100px 5%;
    }
    .page-header h1 {
        font-size: 28px;
        margin-bottom: 30px;
    }
    .results-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 50px 20px;
        padding-bottom: 150px; 
    }
    .no-items-message {
        text-align: center;
        font-size: 18px;
        color: #888;
        padding: 50px;
        border: 2px dashed #333;
        border-radius: 10px;
    }

    /* Netflix Hover Animation Styles */
    .poster-container {
        position: relative;
        z-index: 5;
    }
    .poster-container:hover {
        z-index: 10;
    }
    .poster-container a {
        display: block;
        text-decoration: none;
        color: #fff;
        position: relative;
        border-radius: 8px;
        overflow: hidden;
        transition: all 0.3s ease;
    }
    .poster-container .backdrop-img {
        width: 100%;
        height: 180px;
        object-fit: cover;
        transition: transform 0.3s ease;
        border-radius: 8px;
    }
    .hover-preview {
        position: absolute;
        top: -30px;
        left: -50px;
        width: 420px;
        background: #141414;
        border-radius: 8px;
        box-shadow: 0 20px 50px rgba(0,0,0,0.8);
        opacity: 0;
        visibility: hidden;
        transform: scale(0.8) translateY(20px);
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        z-index: 20;
        pointer-events: none;
        overflow: hidden;
        border: 2px solid #444;
    }
    .poster-container:hover .hover-preview {
        opacity: 1;
        visibility: visible;
        transform: scale(1) translateY(0);
        pointer-events: all;
        transition-delay: 0.4s;
    }
    .poster-container:hover {
        transform: scale(1.05);
    }
    .hover-preview .preview-image {
        width: 100%;
        height: 220px;
        object-fit: cover;
        position: relative;
    }
    .hover-info {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(transparent, rgba(0,0,0,0.8));
        padding: 60px 20px 20px 20px;
        color: #fff;
    }
    .hover-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 12px;
        line-height: 1.2;
        color: #fff;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.8);
    }
    .hover-meta {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 12px;
        font-size: 14px;
    }
    .age-rating, .seasons, .quality {
        background: rgba(255,255,255,0.2);
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 12px;
        color: #fff;
        font-weight: bold;
        border: 1px solid rgba(255,255,255,0.3);
    }
    .hover-genres { margin-bottom: 15px; }
    .genre-tag {
        display: inline-block;
        background: rgba(255,255,255,0.1);
        padding: 4px 10px;
        border-radius: 15px;
        font-size: 12px;
        margin-right: 6px;
        margin-bottom: 4px;
        color: #fff;
        border: 1px solid rgba(255,255,255,0.2);
    }
    .hover-actions {
        display: flex;
        gap: 8px;
        justify-content: flex-start;
    }
    .action-btn {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        border: 2px solid rgba(255, 255, 255, 0.5);
        background: rgba(42, 42, 42, 0.8);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.2s ease;
        text-decoration: none;
        font-size: 18px;
        backdrop-filter: blur(5px);
    }
    .action-btn:hover {
        background: rgba(255, 255, 255, 0.9);
        color: #000;
        transform: scale(1.1);
        border-color: #fff;
    }
    .action-btn .fas {
    font-size: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 100%;
}

.action-btn.play-btn .fas {
    font-size: 18px;
    margin-left: 0; /* margin-left: 2px; yerine 0 */
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 100%;
}
</style>

<div class="results-container">
    <div class="page-header">
        <h1><?php echo htmlspecialchars($pageTitle); ?></h1>
    </div>

    <div class="results-grid">
        <?php if (!empty($items)): ?>
            <?php foreach ($items as $item): ?>
                <?php
                    // Determine if the item is a movie or a TV show
                    $isTvShow = isset($item['first_air_date']);
                    $urlType = $isTvShow ? 'tv-show' : 'movie';
                ?>
                <div class="poster-container">
                    <a href="/<?php echo $urlType; ?>/<?php echo $item['slug']; ?>">
                        <img class="backdrop-img" src="https://image.tmdb.org/t/p/w500<?php echo $item['logo_backdrop_path'] ?? $item['backdrop_path']; ?>" alt="<?php echo htmlspecialchars($item['title']); ?>">
                        
                        <div class="hover-preview">
                            <img class="preview-image" src="https://image.tmdb.org/t/p/w500<?php echo $item['logo_backdrop_path'] ?? $item['backdrop_path']; ?>" alt="<?php echo htmlspecialchars($item['title']); ?>">
                            <div class="hover-info">
                                <div class="hover-title"><?php echo htmlspecialchars($item['title']); ?></div>
                                <div class="hover-meta">
                                    <span class="age-rating"><?php echo !empty($item['certification']) ? htmlspecialchars($item['certification']) : '13+'; ?></span>
                                    <?php if ($isTvShow): ?>
                                        <?php if (isset($item['number_of_seasons']) && $item['number_of_seasons'] > 0): ?>
                                        <span class="seasons"><?php echo $item['number_of_seasons']; ?> Season(s)</span>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <span><?php echo isset($item['runtime']) ? $item['runtime'] . 'm' : 'N/A'; ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="hover-genres">
                                    <?php if (!empty($item['genres'])): ?>
                                        <?php foreach (array_slice($item['genres'], 0, 3) as $genre): ?>
                                            <span class="genre-tag"><?php echo htmlspecialchars($genre['name']); ?></span>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                                <div class="hover-actions">
                                    <?php
                                        // --- WATCHLIST LOGIC for hover card ---
                                        $type = $isTvShow ? 'tv_show' : 'movie';
                                        $id = $item['id'];

                                        $isInWatchlist = false;
                                        if (isset($userWatchlist) && is_array($userWatchlist)) {
                                            foreach ($userWatchlist as $watchlistItem) {
                                                if ($watchlistItem['content_id'] == $id && $watchlistItem['content_type'] == $type) {
                                                    $isInWatchlist = true;
                                                    break;
                                                }
                                            }
                                        }
                                        $watchUrl = $item['watch_url'] ?? ($isTvShow ? '#' : '/movie/' . $item['slug'] . '/watch');
                                        $detailUrl = '/' . $urlType . '/' . $item['slug'];
                                    ?>
                                    <a href="<?php echo $watchUrl; ?>" class="action-btn play-btn" title="Watch Now"><i class="fas fa-play"></i></a>
                                    <a href="#" 
                                       class="action-btn toggle-watchlist-btn <?php echo $isInWatchlist ? 'in-watchlist' : ''; ?>"
                                       data-content-id="<?php echo $id; ?>"
                                       data-content-type="<?php echo $type; ?>"
                                       title="Add to Watchlist">
                                        <i class="icon fas <?php echo $isInWatchlist ? 'fa-check' : 'fa-plus'; ?>"></i>
                                    </a>
                                    <a href="#" class="action-btn" title="Like"><i class="fas fa-thumbs-up"></i></a>
                                    <a href="<?php echo $detailUrl; ?>" class="action-btn" title="More Info"><i class="fas fa-chevron-down"></i></a>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="no-items-message">Your watchlist is empty. Add some movies and TV shows!</p>
        <?php endif; ?>
    </div>
</div>

<?php require_once __DIR__ . '/partials/footer.php'; ?>