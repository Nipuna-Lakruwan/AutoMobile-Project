// Function to handle row clicks and trigger the corresponding "View Activity" link
document.querySelectorAll('.clickable-row').forEach(function(row) {
    row.addEventListener('click', function() {
        const activityId = this.getAttribute('data-bill-id');
        event.preventDefault();
        fetchActivityStatus(activityId);
        //startPeriodicRefresh(activityId);

        // Hide the meetings table and show the ongoing activities container
        document.querySelector('.activity-container').style.display = 'none';
        document.getElementById('ongoingActivitiesContainer').style.display = 'block';
  });
});

// Back button to return to the previous container
function goBack() {
    document.getElementById('ongoingActivitiesContainer').style.display = 'none';
    document.querySelector('.activity-container').style.display = 'block';
}

// Add event listeners for each "More Details" button
document.querySelectorAll('.viewActivityBtn').forEach(function(button) {
    button.addEventListener('click', function() {
        const activityId = this.getAttribute('data-bill-id');
        event.preventDefault();
        fetchActivityStatus(activityId);
        //startPeriodicRefresh(activityId);
        // Hide the meetings table and show the ongoing activities container
        document.querySelector('.activity-container').style.display = 'none';
        document.getElementById('ongoingActivitiesContainer').style.display = 'block';
    });
});

// Add event listener for back button
document.getElementById('backButton').addEventListener('click', goBack);

function fetchActivityStatus(activityId) {
    // Perform AJAX call to fetch bill details
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "/AutoMobile Project/User/functions/activity_status.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            try {
                const response = JSON.parse(xhr.responseText);
                
                // Validate that the response contains the required fields
                if (response && response.license_no && response.activity_type && response.app_date && response.start_time) {
                    // Update the UI with the activity status
                    document.querySelector('.container-h2').innerText = `${response.license_no} - ${response.activity_type}`;
                    document.querySelector('.date-time1').innerText = `Start Date - ${response.app_date}`;
                    document.querySelector('.date-time2').innerText = `Start Time - ${response.start_time}`;
                    
                    // Handle the status (you can add more timeline items dynamically if needed)
                    const timelineItems = document.querySelectorAll('.timeline-item');
                    timelineItems.forEach((item, index) => {
                        item.classList.remove('active'); // Clear previous active classes
                        if (index === 0 && response.status === 'Started') {
                            item.classList.add('active');
                        } else if (index === 1 && response.status === 'Preparing Quotation') {
                            item.classList.add('active');
                        } else if (index === 2 && response.status === 'Quotation Sent') {
                            item.classList.add('active');
                        } else if (index === 3 && response.status === 'Service Scheduled') {
                            item.classList.add('active');
                        } else if (index === 4 && response.status === 'Service Completed') {
                            item.classList.add('active');
                        }
                    });
                } else {
                    console.error("Missing data in the response", response);
                }
            } catch (error) {
                console.error("Error parsing JSON:", error);
            }
        }
    };
    xhr.send("activity_id=" + activityId);
}

/*let currentActivityId = null;
// Function to start the periodic refresh
function startPeriodicRefresh(activityId) {
    currentActivityId = activityId; // Set the current activity ID
    fetchActivityStatus(currentActivityId); // Fetch the status immediately
    setInterval(() => {
        if (currentActivityId) {
            fetchActivityStatus(currentActivityId); // Fetch the updated status periodically
        }
    }, 5000); // Refresh every 5 seconds
}*/