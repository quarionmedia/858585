<?php require_once __DIR__ . '/partials/header.php'; ?>

<style>
    /* Dark Theme Email Templates Design */
    :root {
        --bg-primary: #000000ff;
        --bg-secondary: #1d1d1dff;
        --bg-tertiary: #334155;
        --bg-accent: #475569;
        --text-primary: #f8fafc;
        --text-secondary: #cbd5e1;
        --text-muted: #94a3b8;
        --accent-blue: #60a5fa;
        --accent-purple: #a78bfa;
        --accent-green: #34d399;
        --accent-orange: #fbbf24;
        --accent-red: #f87171;
        --border-light: #334155;
        --border-medium: #475569;
        --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.3);
        --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.4);
        --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.5);
        --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.6);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background: var(--bg-primary);
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', sans-serif;
        color: var(--text-primary);
    }

    main {
        background-color: var(--bg-primary);
        min-height: 100vh;
        padding: 2rem;
        color: var(--text-primary);
    }

    /* Header Section */
    .page-header {
        text-align: center;
        margin-bottom: 3rem;
        padding: 2rem;
        background: var(--bg-secondary);
        border-radius: 1rem;
        box-shadow: var(--shadow-md);
        border: 1px solid var(--border-light);
    }

    main h1 {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--text-primary);
        margin: 0 0 0.5rem 0;
        letter-spacing: -0.025em;
    }

    main p {
        color: var(--text-secondary);
        font-size: 1.125rem;
        margin: 0;
        max-width: 600px;
        margin: 0 auto;
    }

    main hr {
        display: none;
    }

    /* Clean Tab Design */
    .tabs {
        display: flex;
        background: var(--bg-secondary);
        border-radius: 0.75rem;
        padding: 0.25rem;
        margin-bottom: 2rem;
        box-shadow: var(--shadow-sm);
        border: 1px solid var(--border-light);
        flex-wrap: wrap;
        gap: 0.25rem;
    }

    .tab-link {
        flex: 1;
        padding: 0.75rem 1.5rem;
        cursor: pointer;
        color: var(--text-secondary);
        transition: all 0.2s ease;
        border-radius: 0.5rem;
        font-weight: 500;
        text-align: center;
        border: none;
        background: transparent;
        min-width: 120px;
    }

    .tab-link:hover {
        color: var(--text-primary);
        background: var(--bg-tertiary);
    }

    .tab-link.active {
        background: var(--accent-blue);
        color: var(--bg-primary);
        font-weight: 600;
        box-shadow: var(--shadow-sm);
    }

    /* Clean Tab Content */
    .tab-content {
        display: none;
        background: var(--bg-secondary);
        padding: 2rem;
        border-radius: 1rem;
        box-shadow: var(--shadow-md);
        border: 1px solid var(--border-light);
    }

    .tab-content.active {
        display: block;
        animation: fadeIn 0.3s ease;
    }

    .tab-content h3 {
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--text-primary);
        margin: 0 0 1.5rem 0;
        padding-bottom: 0.75rem;
        border-bottom: 1px solid var(--border-light);
    }

    /* Clean Form Styling */
    .template-form .form-group {
        margin-bottom: 1.5rem;
    }

    .template-form label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
        color: var(--text-primary);
        font-size: 0.875rem;
    }

    .template-form input,
    .template-form textarea {
        width: 100%;
        max-width: 100%;
        padding: 0.75rem 1rem;
        background: var(--bg-tertiary);
        border: 2px solid var(--border-light);
        color: var(--text-primary);
        border-radius: 0.5rem;
        font-size: 0.875rem;
        transition: all 0.2s ease;
        font-family: inherit;
    }

    .template-form input:focus,
    .template-form textarea:focus {
        outline: none;
        border-color: var(--accent-blue);
        box-shadow: 0 0 0 3px rgb(96 165 250 / 0.2);
        background: var(--bg-accent);
    }

    .template-form input::placeholder,
    .template-form textarea::placeholder {
        color: var(--text-muted);
    }

    .template-form textarea {
        min-height: 200px;
        font-family: 'SF Mono', 'Monaco', 'Inconsolata', monospace;
        resize: vertical;
        line-height: 1.5;
    }

    .template-form button {
        background: var(--accent-blue);
        color: var(--bg-primary);
        border: none;
        padding: 0.75rem 2rem;
        border-radius: 0.5rem;
        font-weight: 600;
        font-size: 0.875rem;
        cursor: pointer;
        transition: all 0.2s ease;
        margin-top: 1rem;
    }

    .template-form button:hover {
        background: #3b82f6;
        transform: translateY(-1px);
        box-shadow: var(--shadow-md);
    }

    .template-form button:active {
        transform: translateY(0);
    }

    /* Compact Short Codes Section */
    .short-codes {
        background: var(--bg-secondary);
        padding: 1.5rem;
        border-radius: 1rem;
        margin-top: 2rem;
        box-shadow: var(--shadow-md);
        border: 1px solid var(--border-light);
    }

    .short-codes h4 {
        margin: 0 0 0.75rem 0;
        color: var(--text-primary);
        font-size: 1.25rem;
        font-weight: 600;
        padding-bottom: 0.5rem;
        border-bottom: 1px solid var(--border-light);
    }

    .short-codes > p {
        color: var(--text-secondary);
        font-size: 0.875rem;
        margin-bottom: 1.5rem;
        line-height: 1.5;
    }

    .category-title {
        color: var(--text-primary);
        display: block;
        margin-top: 1.5rem;
        margin-bottom: 0.75rem;
        font-size: 1rem;
        font-weight: 600;
        padding-bottom: 0.25rem;
        border-bottom: 1px solid var(--border-light);
    }

    .category-title:first-of-type {
        margin-top: 0;
    }

    .short-codes ul {
        list-style: none;
        padding: 0;
        margin: 0;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 0.5rem;
    }

    .short-codes li {
        margin: 0;
        break-inside: avoid;
    }

    .short-codes code {
        display: inline-block;
        background: var(--bg-tertiary);
        padding: 0.375rem 0.75rem;
        border-radius: 0.375rem;
        font-family: 'SF Mono', 'Monaco', 'Inconsolata', monospace;
        color: var(--text-primary);
        font-size: 0.8rem;
        font-weight: 500;
        border: 1px solid var(--border-light);
        transition: all 0.2s ease;
        cursor: pointer;
        width: 100%;
        text-align: left;
    }

    .short-codes code:hover {
        background: var(--accent-blue);
        color: var(--bg-primary);
        border-color: var(--accent-blue);
        transform: translateY(-1px);
        box-shadow: var(--shadow-sm);
    }

    /* Color variations for different categories */
    .short-codes ul:nth-of-type(1) code:hover { background: var(--accent-blue); border-color: var(--accent-blue); }
    .short-codes ul:nth-of-type(2) code:hover { background: var(--accent-purple); border-color: var(--accent-purple); }
    .short-codes ul:nth-of-type(3) code:hover { background: var(--accent-green); border-color: var(--accent-green); }
    .short-codes ul:nth-of-type(4) code:hover { background: var(--accent-orange); border-color: var(--accent-orange); }
    .short-codes ul:nth-of-type(5) code:hover { background: var(--accent-red); border-color: var(--accent-red); }
    .short-codes ul:nth-of-type(6) code:hover { background: var(--accent-purple); border-color: var(--accent-purple); }
    .short-codes ul:nth-of-type(7) code:hover { background: var(--accent-green); border-color: var(--accent-green); }

    /* Animations */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.02); }
    }

    .short-codes code.copied {
        animation: pulse 0.3s ease;
        background: var(--accent-green) !important;
        color: var(--bg-primary) !important;
    }

    /* Scrollbar Styling for Dark Theme */
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: var(--bg-primary);
    }

    ::-webkit-scrollbar-thumb {
        background: var(--bg-accent);
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: var(--border-medium);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        main {
            padding: 1rem;
        }
        
        .page-header {
            padding: 1.5rem;
            margin-bottom: 2rem;
        }
        
        main h1 {
            font-size: 2rem;
        }
        
        .tabs {
            flex-direction: column;
        }
        
        .tab-link {
            flex: none;
        }
        
        .tab-content {
            padding: 1.5rem;
        }
        
        .short-codes {
            padding: 1rem;
        }
        
        .short-codes ul {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 480px) {
        .template-form button {
            width: 100%;
        }
        
        main h1 {
            font-size: 1.75rem;
        }
    }
</style>

<main>
    <div class="page-header">
        <h1>Email Templates</h1>
        <p>Customize the emails sent from your site. Use the short codes provided for dynamic content.</p>
    </div>

    <div class="tabs">
        <?php foreach ($templates as $template): ?>
            <div class="tab-link <?php echo $template === reset($templates) ? 'active' : ''; ?>" onclick="openTab(event, '<?php echo $template['template_name']; ?>')">
                <?php echo ucwords(str_replace('_', ' ', $template['template_name'])); ?>
            </div>
        <?php endforeach; ?>
    </div>

    <form action="/admin/settings/email-templates" method="POST" class="template-form">
        <?php foreach ($templates as $template): ?>
            <div id="<?php echo $template['template_name']; ?>" class="tab-content <?php echo $template === reset($templates) ? 'active' : ''; ?>">
                <h3>Editing: <?php echo ucwords(str_replace('_', ' ', $template['template_name'])); ?></h3>
                <input type="hidden" name="templates[<?php echo $template['id']; ?>][id]" value="<?php echo $template['id']; ?>">
                
                <div class="form-group">
                    <label for="subject_<?php echo $template['id']; ?>">Subject</label>
                    <input type="text" id="subject_<?php echo $template['id']; ?>" name="templates[<?php echo $template['id']; ?>][subject]" value="<?php echo htmlspecialchars($template['subject']); ?>">
                </div>
                <div class="form-group">
                    <label for="body_<?php echo $template['id']; ?>">Body (HTML is allowed)</label>
                    <textarea id="body_<?php echo $template['id']; ?>" name="templates[<?php echo $template['id']; ?>][body]"><?php echo htmlspecialchars($template['body']); ?></textarea>
                </div>
            </div>
        <?php endforeach; ?>

        <button type="submit">Save All Templates</button>
    </form>

    <div class="short-codes">
        <h4>Available Short Codes</h4>
        <p>Use these developer-friendly short codes in your templates. They will be replaced with dynamic data before sending.</p>
        
        <strong class="category-title">General & Site Information</strong>
        <ul>
            <li><code>{{site_name}}</code></li>
            <li><code>{{site_url}}</code></li>
            <li><code>{{site_tagline}}</code></li>
            <li><code>{{site_logo_url}}</code></li>
            <li><code>{{site_email}}</code></li>
            <li><code>{{current_date_full}}</code></li>
            <li><code>{{current_date_short}}</code></li>
            <li><code>{{current_time_12hr}}</code></li>
            <li><code>{{current_time_24hr}}</code></li>
            <li><code>{{current_year}}</code></li>
            <li><code>{{current_day_name}}</code></li>
            <li><code>{{current_month_name}}</code></li>
            <li><code>{{copyright_notice}}</code></li>
        </ul>

        <strong class="category-title">Recipient User & Profile Data</strong>
        <ul>
            <li><code>{{user_id}}</code></li>
            <li><code>{{username}}</code></li>
            <li><code>{{user_email}}</code></li>
            <li><code>{{user_first_name}}</code></li>
            <li><code>{{user_last_name}}</code></li>
            <li><code>{{user_full_name}}</code></li>
            <li><code>{{user_registration_date}}</code></li>
            <li><code>{{user_last_login_date}}</code></li>
            <li><code>{{profile_id}}</code></li>
            <li><code>{{profile_name}}</code></li>
            <li><code>{{profile_avatar_url}}</code></li>
            <li><code>{{profile_is_child}}</code></li>
            <li><code>{{profile_creation_date}}</code></li>
            <li><code>{{profile_count}}</code></li>
        </ul>
        
        <strong class="category-title">Content (Movies, TV Shows, Episodes)</strong>
        <ul>
            <li><code>{{content_id}}</code></li>
            <li><code>{{content_tmdb_id}}</code></li>
            <li><code>{{content_type}}</code></li>
            <li><code>{{content_title}}</code></li>
            <li><code>{{content_slug}}</code></li>
            <li><code>{{content_url}}</code></li>
            <li><code>{{content_release_date}}</code></li>
            <li><code>{{content_overview_short}}</code></li>
            <li><code>{{content_overview_full}}</code></li>
            <li><code>{{content_poster_url_small}}</code></li>
            <li><code>{{content_poster_url_large}}</code></li>
            <li><code>{{content_backdrop_url_small}}</code></li>
            <li><code>{{content_backdrop_url_large}}</code></li>
            <li><code>{{content_rating}}</code></li>
            <li><code>{{content_runtime}}</code></li>
            <li><code>{{content_trailer_url}}</code></li>
            <li><code>{{content_genres_list}}</code></li>
        </ul>

        <strong class="category-title">Comments & Community Interactions</strong>
        <ul>
            <li><code>{{comment_id}}</code></li>
            <li><code>{{comment_url}}</code></li>
            <li><code>{{comment_text}}</code></li>
            <li><code>{{comment_date_time}}</code></li>
            <li><code>{{comment_author_profile_name}}</code></li>
            <li><code>{{comment_author_avatar_url}}</code></li>
            <li><code>{{comment_like_count}}</code></li>
            <li><code>{{parent_comment_text}}</code></li>
            <li><code>{{parent_comment_author_name}}</code></li>
            <li><code>{{parent_comment_url}}</code></li>
        </ul>
        
        <strong class="category-title">Reports & Moderation</strong>
        <ul>
            <li><code>{{report_id}}</code></li>
            <li><code>{{report_reason}}</code></li>
            <li><code>{{report_additional_info}}</code></li>
            <li><code>{{report_status}}</code></li>
            <li><code>{{report_date}}</code></li>
            <li><code>{{reporter_profile_name}}</code></li>
            <li><code>{{reporter_username}}</code></li>
            <li><code>{{reported_content_title}}</code></li>
            <li><code>{{reported_content_url}}</code></li>
            <li><code>{{moderator_name}}</code></li>
        </ul>
        
        <strong class="category-title">Content Requests</strong>
        <ul>
            <li><code>{{request_id}}</code></li>
            <li><code>{{request_title}}</code></li>
            <li><code>{{request_type}}</code></li>
            <li><code>{{request_status}}</code></li>
            <li><code>{{request_date}}</code></li>
            <li><code>{{requester_profile_name}}</code></li>
            <li><code>{{requester_username}}</code></li>
            <li><code>{{admin_notes}}</code></li>
            <li><code>{{request_approval_date}}</code></li>
            <li><code>{{request_rejection_reason}}</code></li>
        </ul>

        <strong class="category-title">Security & Account Actions</strong>
        <ul>
            <li><code>{{activation_link}}</code></li>
            <li><code>{{activation_button_html}}</code></li>
            <li><code>{{password_reset_link}}</code></li>
            <li><code>{{password_reset_button_html}}</code></li>
            <li><code>{{change_email_link}}</code></li>
            <li><code>{{user_ip_address}}</code></li>
            <li><code>{{login_time}}</code></li>
            <li><code>{{login_device_os}}</code></li>
            <li><code>{{login_device_browser}}</code></li>
            <li><code>{{login_location_city}}</code></li>
            <li><code>{{login_location_country}}</code></li>
        </ul>

        <strong class="category-title">Subscription & Billing (Future Proof)</strong>
        <ul>
            <li><code>{{subscription_plan_name}}</code></li>
            <li><code>{{subscription_status}}</code></li>
            <li><code>{{subscription_start_date}}</code></li>
            <li><code>{{subscription_end_date}}</code></li>
            <li><code>{{subscription_trial_end_date}}</code></li>
            <li><code>{{billing_amount}}</code></li>
            <li><code>{{billing_currency}}</code></li>
            <li><code>{{billing_next_date}}</code></li>
            <li><code>{{invoice_id}}</code></li>
            <li><code>{{invoice_date}}</code></li>
            <li><code>{{invoice_url}}</code></li>
            <li><code>{{invoice_download_link}}</code></li>
            <li><code>{{payment_method_last4}}</code></li>
            <li><code>{{update_payment_method_link}}</code></li>
        </ul>
    </div>

</main>

<script>
    // Simple and clean tab functionality
    function openTab(evt, tabName) {
        let i, tabcontent, tablinks;
        
        // Hide all tab contents
        tabcontent = document.getElementsByClassName("tab-content");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        
        // Remove active class from all tabs
        tablinks = document.getElementsByClassName("tab-link");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].classList.remove("active");
        }
        
        // Show selected tab and add active class
        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.classList.add("active");
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Initialize first tab
        if (document.querySelector('.tab-link')) {
            document.querySelector('.tab-link').click();
        }

        // Copy to clipboard for short codes
        document.querySelectorAll('.short-codes code').forEach(code => {
            code.addEventListener('click', function() {
                const text = this.textContent;
                navigator.clipboard.writeText(text).then(() => {
                    this.classList.add('copied');
                    setTimeout(() => {
                        this.classList.remove('copied');
                    }, 300);
                }).catch(() => {
                    // Fallback selection
                    const selection = window.getSelection();
                    const range = document.createRange();
                    range.selectNodeContents(this);
                    selection.removeAllRanges();
                    selection.addRange(range);
                });
            });
        });

        // Form enhancement
        const form = document.querySelector('.template-form');
        if (form) {
            form.addEventListener('submit', function(e) {
                const button = this.querySelector('button[type="submit"]');
                button.innerHTML = 'Saving...';
                button.style.opacity = '0.7';
            });
        }

        // Auto-resize textareas
        document.querySelectorAll('textarea').forEach(textarea => {
            function autoResize() {
                this.style.height = 'auto';
                this.style.height = Math.max(200, this.scrollHeight) + 'px';
            }
            
            textarea.addEventListener('input', autoResize);
            autoResize.call(textarea);
        });
    });
</script>

<?php require_once __DIR__ . '/partials/footer.php'; ?>