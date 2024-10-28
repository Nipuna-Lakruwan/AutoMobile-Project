    <?php
        include '../middleware/usermiddleware.php';
        include 'includes/header.php';
        include 'includes/subheader.php';
        include 'includes/sidebar.php';
        include '../functions/alert.php';
    ?>
    <link rel="stylesheet" href="/AutoMobile Project/User/assets/css/notification.css">


    <div class="col-md-9 flex-grow-1 p-3">
        <div class="text-center">
            <div class="container">
                <div class="notifications-container">
                    <div class="actions">
                        <span id="mark-all-read">Mark all as Read</span>
                        <span id="delete-read">Delete Read</span>
                    </div>

                    <div id="notification-list">
                        <!-- Notifications will be displayed here -->
                    </div>
                </div>
                <!-- Add space after the table -->
                <div class="table-footer">
                    <!-- Horizontal line -->
                    <hr class="footer-line">
                </div>

            </div>
        </div>
    </div>

    <!-- Modal Structure -->
    <div id="message-modal" class="message-modal" style="display: none;">
        <div class="message-modal-content">
            <h2>Message</h2>
            <div class="message-modal-details">
                <div class="message-modal-info">
                    <p><strong>Date:</strong> <span id="message-modal-date">19/08/2024</span></p>
                    <p><strong>Time:</strong> <span id="message-modal-time">19:24</span></p>
                    <p><strong>Subject:</strong> <span id="message-modal-subject">New message has arrived!</span></p>
                </div>
                <div class="message-modal-message">
                    <p id="message-modal-message-text">New message has arrived! Please check it out.</p>
                </div>
            </div>
            <button id="close-message-modal">Close</button>
        </div>
    </div>
    <!-- Closing the row , container divs opened in the sidebar -->
    </div>
</div>
    
    <script src="/AutoMobile Project/User/assets/js/index.js"></script>
    <script src="/AutoMobile Project/User/assets/js/notification.js"></script>
    <script>
    // Call fetchNotifications on page load
    document.addEventListener('DOMContentLoaded', fetchNotifications);
    </script>
</body>
</html>