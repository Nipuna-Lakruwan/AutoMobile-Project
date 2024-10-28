// Ensure the DOM is fully loaded before running the script
$(document).ready(function() {
    console.log("Details Report page is ready!");
  
    // Get the modal
    var detailsReportModal = document.getElementById('detailsReportModal');
  
    // Get the close button
    var closeDetailsReportModal = document.getElementById('closeDetailsReportModal');
  
    // Function to open the modal
    function openModal(modal) {
        modal.style.display = 'flex'; // Display as flex to center it properly
    }
  
    // Function to close the modal
    function closeModal(modal) {
        modal.style.display = 'none';
    }
  
    // Add event listeners for each "More Details" button
    document.querySelectorAll('.detailsReportBtn').forEach(function(button) {
        button.onclick = function() {
            openModal(detailsReportModal);
        }
    });
  
    // When the user clicks the close button, close the modal
    closeDetailsReportModal.onclick = function() {
        closeModal(detailsReportModal);
    }
  
    // When the user clicks anywhere outside the modal, close it
    window.onclick = function(event) {
        if (event.target == detailsReportModal) {
            closeModal(detailsReportModal);
        }
    }
});

const detailsButtons = document.querySelectorAll('.detailsReportBtn');

// Add click event listener for each "More Details" button
detailsButtons.forEach(button => {
    button.addEventListener('click', function (event) {
        event.preventDefault();
        const serviceRecordId = this.getAttribute('data-id');

        // AJAX request to fetch vehicle details
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/AutoMobile Project/User/functions/get_service_info.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log(xhr.responseText); // Log the raw response text
                try {
                    var data = JSON.parse(xhr.responseText);
        
                    // Find specific table rows and target their second <td> element
                    var rows = document.querySelectorAll('.detailsReportModal-content table tr');
        
                    // Make sure rows exist before attempting to populate them
                    if (rows.length >= 7) { // Assuming 7 rows for all your data
                        rows[0].querySelector('td:nth-child(2)').textContent = data.service_record_id;
                        rows[1].querySelector('td:nth-child(2)').textContent = data.date;
                        rows[2].querySelector('td:nth-child(2)').textContent = data.time;
                        rows[3].querySelector('td:nth-child(2)').textContent = data.category;
                        rows[4].querySelector('td:nth-child(2)').textContent = data.license_no;
                        rows[5].querySelector('td:nth-child(2)').textContent = `${data.fname} ${data.lname}`;
                        rows[6].querySelector('td:nth-child(2)').textContent = data.description;
                    } else {
                        console.error("Not enough rows found in the modal table.");
                    }
        
                } catch (e) {
                    console.error("Parsing error: ", e);
                    console.error("Response received: ", xhr.responseText);
                }
            }
        };        
        xhr.send("service_record_id=" + serviceRecordId);
        
    });
});