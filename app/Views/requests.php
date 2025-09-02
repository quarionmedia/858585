<?php require_once __DIR__ . '/partials/header.php'; ?>

<style>
    body {
        background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 100%);
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        min-height: 100vh;
    }

    .requests-container {
        max-width: 1100px;
        margin: 120px auto;
        padding: 50px;
        background: linear-gradient(135deg, #1e1e1e 0%, #2a2a2a 100%);
        border-radius: 16px;
        border: 1px solid #404040;
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.4);
        position: relative;
        overflow: hidden;
    }

    .requests-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #42ca1a, #66ff66, #42ca1a);
        background-size: 200% 100%;
        animation: topGlow 3s ease-in-out infinite;
    }

    @keyframes topGlow {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }

    .requests-container h1 {
        text-align: center;
        margin-bottom: 12px;
        color: #fff;
        font-size: 2.8rem;
        font-weight: 700;
        text-shadow: 0 2px 15px rgba(66, 202, 26, 0.4);
        letter-spacing: -1px;
    }

    .requests-container .sub-text {
        text-align: center;
        color: #aaa;
        margin-bottom: 50px;
        font-size: 1.1rem;
        font-weight: 300;
    }

    /* Search Bar */
    .search-bar-container {
        position: relative;
        margin-bottom: 50px;
    }

    #tmdb-search-input {
        width: 100%;
        padding: 20px 25px;
        background: linear-gradient(145deg, #2a2a2a, #333333);
        border: 2px solid #444;
        color: #fff;
        border-radius: 12px;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        box-shadow: inset 0 2px 8px rgba(0, 0, 0, 0.3);
    }

    #tmdb-search-input:focus {
        outline: none;
        border-color: #42ca1a;
        box-shadow: 
            inset 0 2px 8px rgba(0, 0, 0, 0.3),
            0 0 0 3px rgba(66, 202, 26, 0.15);
    }

    #tmdb-search-input::placeholder {
        color: #777;
    }

    #search-spinner {
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        display: none;
        border: 3px solid rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        border-top: 3px solid #42ca1a;
        width: 22px;
        height: 22px;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: translateY(-50%) rotate(0deg); }
        100% { transform: translateY(-50%) rotate(360deg); }
    }

    /* Search Results */
    #search-results {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(170px, 1fr));
        gap: 25px;
        margin-bottom: 60px;
    }

    .result-item {
        position: relative;
        background: linear-gradient(145deg, #2a2a2a, #333333);
        border-radius: 12px;
        overflow: hidden;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
        border: 1px solid transparent;
    }

    .result-item:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4);
        border-color: rgba(66, 202, 26, 0.4);
    }

    .result-item img {
        width: 100%;
        height: auto;
        display: block;
        transition: transform 0.3s ease;
    }

    .result-item:hover img {
        transform: scale(1.05);
    }

    .result-item::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(66, 202, 26, 0.1), transparent);
        opacity: 0;
        transition: opacity 0.3s ease;
        pointer-events: none;
    }

    .result-item:hover::after {
        opacity: 1;
    }

    .request-btn {
        position: absolute;
        top: 12px;
        right: 12px;
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: rgba(0, 0, 0, 0.85);
        color: #fff;
        border: 2px solid rgba(255, 255, 255, 0.3);
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
    }

    .request-btn:hover {
        background: #42ca1a;
        border-color: #42ca1a;
        transform: scale(1.15);
        box-shadow: 0 6px 18px rgba(66, 202, 26, 0.4);
    }

    .request-btn.requested {
        background: #42ca1a;
        border-color: #42ca1a;
        cursor: not-allowed;
        transform: scale(1.05);
    }

    /* Past Requests */
    .past-requests h2 {
        color: #fff;
        font-size: 1.8rem;
        font-weight: 600;
        margin-bottom: 30px;
        padding-bottom: 15px;
        border-bottom: 2px solid #404040;
        position: relative;
    }

    .past-requests h2::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 80px;
        height: 2px;
        background: linear-gradient(90deg, #42ca1a, #66ff66);
    }

    .request-list-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px 25px;
        margin-bottom: 15px;
        background: linear-gradient(145deg, #2a2a2a, #333333);
        border-radius: 10px;
        transition: all 0.3s ease;
        border: 1px solid transparent;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .request-list-item:hover {
        background: linear-gradient(145deg, #333333, #3a3a3a);
        border-color: rgba(66, 202, 26, 0.3);
        transform: translateX(8px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
    }

    .request-list-item:last-child {
        margin-bottom: 0;
    }

    .request-list-item span:first-child {
        color: #fff;
        font-weight: 500;
        font-size: 1.05rem;
    }

    .status-badge {
        padding: 8px 14px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        text-transform: capitalize;
        letter-spacing: 0.5px;
        position: relative;
        overflow: hidden;
    }

    .status-pending { 
        background: linear-gradient(135deg, #f0ad4e, #f4c98b);
        color: #000; 
        box-shadow: 0 3px 10px rgba(240, 173, 78, 0.3);
    }
    .status-approved { 
        background: linear-gradient(135deg, #5cb85c, #7ed67e);
        color: #fff;
        box-shadow: 0 3px 10px rgba(92, 184, 92, 0.3);
    }
    .status-rejected { 
        background: linear-gradient(135deg, #d9534f, #e57373);
        color: #fff;
        box-shadow: 0 3px 10px rgba(217, 83, 79, 0.3);
    }

    /* Toast */
    #toast-notification {
        position: fixed;
        bottom: -80px;
        left: 50%;
        transform: translateX(-50%);
        background: linear-gradient(135deg, #42ca1a, #66ff66);
        color: #fff;
        padding: 18px 28px;
        border-radius: 12px;
        font-size: 15px;
        font-weight: 600;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        z-index: 1000;
        box-shadow: 0 8px 25px rgba(66, 202, 26, 0.3);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    #toast-notification.show {
        bottom: 30px;
    }

    /* No requests message */
    #no-requests-message {
        text-align: center;
        color: #777;
        padding: 40px;
        font-size: 1rem;
        font-style: italic;
        background: rgba(255, 255, 255, 0.02);
        border-radius: 8px;
        border: 1px dashed #444;
    }

    /* Mobile */
    @media (max-width: 768px) {
        .requests-container {
            margin: 20px;
            padding: 40px 25px;
        }

        .requests-container h1 {
            font-size: 2.2rem;
        }

        #search-results {
            grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
            gap: 20px;
        }

        .request-list-item {
            padding: 18px 20px;
        }
    }
</style>

<div class="requests-container">
    <h1>Request Content</h1>
    <p class="sub-text">Can't find what you're looking for? Search below to request a new movie or TV show.</p>

    <div class="search-bar-container">
        <input type="text" id="tmdb-search-input" placeholder="Search for a movie or TV show...">
        <div id="search-spinner"></div>
    </div>

    <div id="search-results"></div>

    <div class="past-requests">
        <h2>Your Past Requests</h2>
        <div id="request-list">
            <?php if (!empty($requests)): ?>
                <?php foreach ($requests as $request): ?>
                    <div class="request-list-item" data-title="<?php echo htmlspecialchars($request['title']); ?>">
                        <span><?php echo htmlspecialchars($request['title']); ?></span>
                        <span class="status-badge status-<?php echo strtolower($request['status']); ?>">
                            <?php echo htmlspecialchars($request['status']); ?>
                        </span>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p id="no-requests-message">You haven't made any requests yet.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<div id="toast-notification"></div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('tmdb-search-input');
    const resultsContainer = document.getElementById('search-results');
    const spinner = document.getElementById('search-spinner');
    const requestList = document.getElementById('request-list');
    const noRequestsMessage = document.getElementById('no-requests-message');
    const toast = document.getElementById('toast-notification');
    let searchTimeout;

    // --- Live Search from TMDb ---
    searchInput.addEventListener('keyup', function() {
        clearTimeout(searchTimeout);
        const query = this.value;

        if (query.length < 3) {
            resultsContainer.innerHTML = '';
            return;
        }

        spinner.style.display = 'block';

        searchTimeout = setTimeout(() => {
            fetch(`/api/tmdb/search?q=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(data => {
                    spinner.style.display = 'none';
                    resultsContainer.innerHTML = ''; // Clear previous results
                    if (data.results && data.results.length > 0) {
                        data.results.forEach(item => {
                            // ================== DEÄžÄ°ÅžÄ°KLÄ°K BURADA ==================
                            // Butona poster yolu ve tmdb id'si iÃ§in data Ã¶znitelikleri eklendi
                            const resultItem = `
                                <div class="result-item">
                                    <img src="https://image.tmdb.org/t/p/w500${item.poster_path}" alt="${item.title}">
                                    <button class="request-btn" 
                                            data-title="${item.title}" 
                                            data-type="${item.type}"
                                            data-poster-path="${item.poster_path}"
                                            title="Request this content">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            `;
                            // ========================================================
                            resultsContainer.innerHTML += resultItem;
                        });
                    } else {
                        resultsContainer.innerHTML = '<p>No results found.</p>';
                    }
                })
                .catch(error => {
                    spinner.style.display = 'none';
                    console.error('Search Error:', error);
                });
        }, 500);
    });

    // --- Handle Request Button Click ---
    resultsContainer.addEventListener('click', function(e) {
        const targetButton = e.target.closest('.request-btn');
        if (targetButton && !targetButton.disabled) {
            e.preventDefault();

            // ================== DEÄžÄ°ÅžÄ°KLÄ°K BURADA ==================
            // Butondaki data Ã¶zniteliklerinden yeni veriler okundu
            const title = targetButton.dataset.title;
            const type = targetButton.dataset.type;
            const posterPath = targetButton.dataset.posterPath;

            targetButton.disabled = true;
            targetButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';

            // Form datasÄ±na yeni veriler eklendi
            const formData = new FormData();
            formData.append('title', title);
            formData.append('type', type);
            formData.append('poster_path', posterPath);
            // ========================================================

            // Send the request in the background using fetch
            fetch('/requests/store', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (response.redirected) {
                    return { status: 'success' };
                }
                return response.json();
            })
            .then(data => {
                targetButton.innerHTML = '<i class="fas fa-check"></i>';
                targetButton.classList.add('requested');
                showToast(`'${title}' has been requested!`);

                if (noRequestsMessage) {
                    noRequestsMessage.remove();
                }
                const newRequestItem = `
                    <div class="request-list-item" data-title="${title}">
                        <span>${title}</span>
                        <span class="status-badge status-pending">pending</span>
                    </div>
                `;
                requestList.insertAdjacentHTML('afterbegin', newRequestItem);

            })
            .catch(error => {
                console.error('Request Error:', error);
                showToast('An error occurred. Please try again.');
                targetButton.disabled = false;
                targetButton.innerHTML = '<i class="fas fa-plus"></i>';
            });
        }
    });

    // --- Toast Popup Function ---
    function showToast(message) {
        toast.textContent = message;
        toast.classList.add('show');
        setTimeout(() => {
            toast.classList.remove('show');
        }, 3000);
    }
});
</script>

<?php require_once __DIR__ . '/partials/footer.php'; ?>