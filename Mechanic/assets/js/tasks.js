document.addEventListener("DOMContentLoaded", function () {
    // Initially, show only the task container
    const taskContainer = document.querySelector(".activity-container:first-child"); // First activity container (Task)
    const ongoingActivitiesContainer = document.getElementById("ongoingActivitiesContainer");
    const addQuotationModal = document.getElementById("addQuotation-modal");

    // Hide the second and third containers initially
    ongoingActivitiesContainer.style.display = "none";
    addQuotationModal.style.display = "none";

    // Handle click on the task table row to show second container
    document.querySelectorAll(".clickable-row").forEach(row => {
        row.addEventListener("click", function () {
            // Show second container and hide first
            taskContainer.style.display = "none";
            ongoingActivitiesContainer.style.display = "block";
            const activityId = this.getAttribute('data-id');
            fetchActivityStatus(activityId);
        });
    });

    // When the click on the back button in the second container it goes back to the first container 'backBtn'
    function addBackButton(currentContainer, previousContainer) {
        const backButton = document.createElement("button");
        backButton.innerText = "Back";
        backButton.classList.add("backBtn");
        backButton.addEventListener("click", function () {
            currentContainer.style.display = "none";
            previousContainer.style.display = "block";
        });
        currentContainer.appendChild(backButton);
    }

    // Handle click on the Back button in the second container
    document.getElementById("backBtn").addEventListener("click", function () {
        // Show first container and hide second
        taskContainer.style.display = "block";
        ongoingActivitiesContainer.style.display = "none";
    });


    // Handle click on the Add Quotation button to show third container
    document.getElementById("quotationBtn").addEventListener("click", function () {
        // Show third container and hide second
        ongoingActivitiesContainer.style.display = "none";
        addQuotationModal.style.display = "block";

        // Add Back button to return to second container
        addBackButton(addQuotationModal, ongoingActivitiesContainer);
    });

        // Handle click on the Send Quotation button in the Add Quotation modal
        document.getElementById("sendQuotationBtn").addEventListener("click", function () {
        alert("Quotation sent successfully!");
    });

    // update js for when click on this btn '<button class="qty-btn">-</button>' it will decrease the value of the input, when the click on this btn '<button class="qty-btn">+</button>' it will increase the value of the input only decrease can to 0
    document.querySelectorAll(".qty-btn").forEach(btn => {
        btn.addEventListener("click", function () {
            const input = this.parentElement.querySelector("input");
            if (this.innerText === "-") {
                input.value = Math.max(0, parseInt(input.value) - 1);
            } else {
                input.value = parseInt(input.value) + 1;
            }
        });
    });

});

function fetchActivityStatus(activityId) {
    // Perform AJAX call to fetch bill details
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "/AutoMobile Project/Mechanic/functions/task_actions.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            try {
                const response = JSON.parse(xhr.responseText);
                
                // Validate that the response contains the required fields
                if (response && response.activity_id && response.message && response.status) {
                    // Update the UI with the activity status
                    document.querySelector('.container-h2').innerText = ` Task ID - ${response.activity_id}`;
                    document.querySelector('.description').innerText = `${response.message}`;
                    
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