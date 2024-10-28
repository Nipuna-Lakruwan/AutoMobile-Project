// Get the modals
var addVehicleModal = document.getElementById('addVehicleModal');
var editVehicleModal = document.getElementById('editVehicleModal');

// Get the buttons that open the modals
var addVehicleBtn = document.getElementById('addVehicleBtn');
var editVehicleBtn = document.getElementById('editVehicleBtn');

// Get the <span> elements that close the modals
var closeAddModal = document.getElementById('closeAddModal');
var closeEditModal = document.getElementById('closeEditModal');

// Get the submit button
var submitModalBtn = document.getElementById('submitModalBtn');

// Function to open the specified modal
function openModal(modal) {
    modal.style.display = 'flex'; // Display as flex to center it properly
}

// Function to close the specified modal
function closeModal(modal) {
    modal.style.display = 'none';
}

// When the user clicks the respective button, open the corresponding modal
addVehicleBtn.onclick = function() {
    event.preventDefault(); // Prevent default link behavior
    openModal(addVehicleModal);
}

editVehicleBtn.onclick = function() {
    event.preventDefault(); // Prevent default link behavior
    openModal(editVehicleModal);
}

// When the user clicks the close button, close the respective modal
closeAddModal.onclick = function() {
    closeModal(addVehicleModal);
}

closeEditModal.onclick = function() {
    closeModal(editVehicleModal);
}

// When the user clicks anywhere outside of the modal content, close it
window.onclick = function(event) {
    if (event.target == addVehicleModal) {
        closeModal(addVehicleModal);
    } else if (event.target == editVehicleModal) {
        closeModal(editVehicleModal);
    }
}

// Add event listener for the submit button
submitModalBtn.onclick = function() {
    var form = document.querySelector('#addVehicleModal form');
    // Perform form validation or processing here
    if (form.checkValidity()) {
        // Form is valid; you can submit the form or handle it as needed
        form.submit();
        closeModal(addVehicleModal); // Close the modal after submission
    } else {
        // Handle invalid form case (e.g., show a message to the user)
        alert('Please fill in all required fields.');
    }
}

document.getElementById('selectVehicle').addEventListener('change', function() {
    var vehicleId = this.value;
    
    // AJAX request to fetch vehicle details
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/AutoMobile Project/User/functions/addvehicle.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr.responseText); // Log the raw response text
            try {
                var vehicleData = JSON.parse(xhr.responseText);
                // Continue with your code to populate form fields
                document.getElementById('editCompany').value = vehicleData.company;
                document.getElementById('editModel').value = vehicleData.model;
                document.getElementById('editManufacturedYear').value = vehicleData.year;
                document.getElementById('editCategory').value = vehicleData.category;
                document.getElementById('editLicensePlateNo').value = vehicleData.license_no;
                document.getElementById('editEngineNo').value = vehicleData.engine_no;
                document.getElementById('editChassisNo').value = vehicleData.chasis_no;
            } catch (e) {
                console.error("Parsing error: ", e);
                console.error("Response received: ", xhr.responseText);
            }
        }
    };
    
    xhr.send("vehicle_id=" + vehicleId);
});