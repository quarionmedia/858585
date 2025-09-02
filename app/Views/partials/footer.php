<main></main>
</body>
<!-- =============================================== -->
<!-- ============ Watchlist AJAX Script ============ -->
<!-- =============================================== -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.body.addEventListener('click', function(e) {
        const button = e.target.closest('.toggle-watchlist-btn');

        if (button) {
            e.preventDefault();

            const contentId = button.dataset.contentId;
            const contentType = button.dataset.contentType;
            const icon = button.querySelector('.icon');
            const text = button.querySelector('.btn-text');

            const formData = new FormData();
            formData.append('content_id', contentId);
            formData.append('content_type', contentType);

            fetch('/watchlist/toggle', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    button.classList.toggle('in-watchlist');
                    
                    if (data.action === 'added') {
                        icon.classList.remove('fa-plus');
                        icon.classList.add('fa-check');
                        if(text) text.textContent = 'Added to Watchlist';
                    } else {
                        icon.classList.remove('fa-check');
                        icon.classList.add('fa-plus');
                        if(text) text.textContent = 'Add Watchlist';
                    }
                } else {
                    console.error('Watchlist Error:', data.message);
                    alert(data.message || 'An error occurred.');
                }
            })
            .catch(error => {
                console.error('Network Error:', error);
                alert('A network error occurred. Please try again.');
            });
        }
    });
});
</script>
<!-- =============================================== -->
<!-- ============ REPORT MODAL SCRIPT ============ -->
<!-- =============================================== -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get all the necessary elements from the DOM
    const reportModal = document.getElementById('report-modal');
    const openBtn = document.getElementById('report-content-btn');
    const closeBtn = document.querySelector('.report-close-btn');
    const reportForm = document.getElementById('report-form');
    const feedbackDiv = document.getElementById('report-feedback');

    // Check if the elements exist on the page to prevent errors
    if (reportModal && openBtn && closeBtn && reportForm) {

        // Function to open the modal
        const openModal = () => {
            // Get content details from the button that was clicked
            const contentId = openBtn.dataset.contentId;
            const contentType = openBtn.dataset.contentType;
            
            // Populate the hidden form fields
            document.getElementById('report-content-id').value = contentId;
            document.getElementById('report-content-type').value = contentType;
            
            reportModal.style.display = 'block';
        };

        // Function to close the modal
        const closeModal = () => {
            reportModal.style.display = 'none';
            // Reset the form and feedback message when closing
            reportForm.reset();
            feedbackDiv.style.display = 'none';
            feedbackDiv.textContent = '';
        };

        // Event listener to open the modal
        openBtn.addEventListener('click', function(e) {
            e.preventDefault();
            openModal();
        });

        // Event listener to close the modal via the 'x' button
        closeBtn.addEventListener('click', closeModal);

        // Event listener to close the modal by clicking outside of it
        window.addEventListener('click', function(e) {
            if (e.target === reportModal) {
                closeModal();
            }
        });

        // Event listener for the form submission
        reportForm.addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission

            const formData = new FormData(this);
            const submitBtn = this.querySelector('.report-submit-btn');
            
            // Disable the button and show a loading message
            submitBtn.disabled = true;
            submitBtn.textContent = 'Submitting...';

            fetch('/report/submit', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                // Display the feedback message
                feedbackDiv.textContent = data.message;
                feedbackDiv.className = `report-feedback ${data.status}`; // 'success' or 'error'
                feedbackDiv.style.display = 'block';

                if (data.status === 'success') {
                    // If successful, close the modal after a short delay
                    setTimeout(() => {
                        closeModal();
                        submitBtn.disabled = false;
                        submitBtn.textContent = 'Submit Report';
                    }, 3000); // 3 seconds
                } else {
                    // If there was an error, re-enable the button immediately
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Submit Report';
                }
            })
            .catch(error => {
                // Handle network errors
                feedbackDiv.textContent = 'A network error occurred. Please try again.';
                feedbackDiv.className = 'report-feedback error';
                feedbackDiv.style.display = 'block';
                submitBtn.disabled = false;
                submitBtn.textContent = 'Submit Report';
            });
        });
    }
});
</script>
</html>