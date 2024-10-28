// Get the modals
var editAppointmentsModal = document.getElementById('editAppointmentsModal');
const cancelConfirmationModal = document.getElementById('cancelConfirmationModal');

// Get the buttons that open the modals
var editAppointmentBtn = document.getElementById('editAppointmentBtn');
const cancelBtns = document.querySelectorAll('.cancel-btn');

// Get the <span> elements that close the modals
var closeEditModal = document.getElementById('closeEditModal');
const closeCancelModal = document.getElementById('closeCancelModal');

// Get the submit button
var submitModalBtn = document.getElementById('doneAppointmentBtn');

// Function to open the specified modal
function openModal(modal) {
    modal.style.display = 'flex'; // Display as flex to center it properly
}

// Function to close the specified modal
function closeModal(modal) {
    modal.style.display = 'none';
}

// When the user clicks on the cancel button, open the modal
cancelBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        cancelConfirmationModal.style.display = "block";
    });
});

// When the user clicks the respective button, open the corresponding modal
editAppointmentBtn.onclick = function() {
    openModal(editAppointmentsModal);
}

// When the user clicks the close button, close the respective modal
closeEditModal.onclick = function() {
    closeModal(editAppointmentsModal);
}

// When the user clicks anywhere outside of the modal content, close it
window.onclick = function(event) {
    if (event.target == editAppointmentsModal) {
        closeModal(editAppointmentsModal);
    }
}

// Add event listener for the submit button
submitModalBtn.onclick = function() {
    closeModal(editAppointmentsModal); // Close the modal
}

// When the user clicks on <span> (x), close the modal
closeCancelModal.onclick = function() {
    cancelConfirmationModal.style.display = "none";
}

document.addEventListener('DOMContentLoaded', function() {
    // Get all cancel buttons
    const cancelButtons = document.querySelectorAll('.cancel-btn');
    const cancelModal = document.getElementById('cancelConfirmationModal');
    const closeCancelModal = document.getElementById('closeCancelModal');
    const yesCancelBtn = document.getElementById('yesCancelBtn');
    const noCancelBtn = document.getElementById('noCancelBtn');

    let formToSubmit = null;

    // Show modal on cancel button click
    cancelButtons.forEach(function(button) {
        button.addEventListener('click', function(e) {
            e.preventDefault(); // Prevent form from submitting

            // Store the form that needs to be submitted if confirmed
            formToSubmit = this.closest('form');

            // Show the confirmation modal
            cancelModal.style.display = 'block';
        });
    });

    // Close modal when "NO" button or close icon is clicked
    closeCancelModal.addEventListener('click', function() {
        cancelModal.style.display = 'none';
    });

    noCancelBtn.addEventListener('click', function() {
        cancelModal.style.display = 'none';
    });

    // Submit form if "YES" is clicked
    yesCancelBtn.addEventListener('click', function() {
        if (formToSubmit) {
            formToSubmit.submit();
        }
    });

    // Close the modal if clicked outside the content area
    window.addEventListener('click', function(e) {
        if (e.target == cancelModal) {
            cancelModal.style.display = 'none';
        }
    });
});
