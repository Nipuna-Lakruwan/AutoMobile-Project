function fetchNotifications() {
    fetch('/AutoMobile Project/Mechanic/functions/notification_actions.php?action=fetch')
    .then(response => response.json())
    .then(notifications => {
        const notificationList = document.getElementById('notification-list');
        notificationList.innerHTML = ''; // Clear existing notifications
        
        notifications.forEach(notification => {
            const notificationDiv = document.createElement('div');
            notificationDiv.classList.add('notification');
            notificationDiv.setAttribute('data-id', notification.notify_id); // Use notify_id
            if (notification.status == 0) {
                notificationDiv.classList.add('unread');
            }
            
            notificationDiv.innerHTML = `
                <div class="notification-text">${notification.description}</div>
                <div class="notification-info">
                    <span>${new Date(notification.date).toLocaleTimeString()}</span>
                    <span>${new Date(notification.date).toLocaleDateString()}</span>
                    ${notification.status == 0 ? '<span class="unread-dot"></span>' : ''}
                </div>
            `;

            // Add click event listener to mark notification as read
            notificationDiv.addEventListener('click', function() {
                const notificationId = this.getAttribute('data-id');
                markAsRead(notificationId, notificationDiv);
            });

            notificationList.appendChild(notificationDiv);
        });
    });
}

setInterval(fetchNotifications, 10000);


// Function to mark a specific notification as read
function markAsRead(notificationId, notificationDiv) {
    fetch(`/AutoMobile Project/Mechanic/functions/notification_actions.php?action=mark_as_read&id=${notificationId}`, { method: 'POST' })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            notificationDiv.classList.remove('unread');
            const unreadDot = notificationDiv.querySelector('.unread-dot');
            if (unreadDot) {
                unreadDot.remove();
            }
        }
    });
}
  
  // Function to mark all notifications as read
function markAllAsRead() {
    const unreadNotifications = document.querySelectorAll('.notification.unread');
    unreadNotifications.forEach(notification => {
        notification.classList.remove('unread');
        const unreadDot = notification.querySelector('.unread-dot');
        if (unreadDot) {
            unreadDot.remove();
        }
    });
}
  
  // Function to delete all read notifications
function deleteReadMessages() {
    const readNotifications = document.querySelectorAll('.notification:not(.unread)');
    readNotifications.forEach(notification => {
        notification.remove();
    });
}
  
// Event listeners for buttons
document.getElementById('mark-all-read').addEventListener('click', function() {
    fetch('/AutoMobile Project/Mechanic/functions/notification_actions.php?action=mark_all_read', { method: 'POST' })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            markAllAsRead();
        }
    });
});

document.getElementById('delete-read').addEventListener('click', function() {
    fetch('/AutoMobile Project/Mechanic/functions/notification_actions.php?action=delete_read', { method: 'POST' })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            deleteReadMessages();
        }
    });
});