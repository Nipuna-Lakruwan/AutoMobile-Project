document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById("addVehicleModal");
    const btn = document.getElementById("newMeetingBtn");
    const closeButton = document.getElementById("closeAddVehicleModal");

    // Ensure modal is hidden on page load
    modal.style.display = "none";

    // Event listener to open the modal
    btn.addEventListener('click', function() {
        modal.style.display = "block";
    });

    // Event listener to close the modal
    closeButton.addEventListener('click', function() {
        modal.style.display = "none";
    });

    // Close the modal when clicking outside of it
    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });

    // View Customer Modal
    const viewCustomerModal = document.getElementById("viewCustomerModal1");
    const closeCustomerModalButton = document.getElementById("closeCustomerModal1");
    const closeCustomerDetailsBtn = document.getElementById("closeCustomerDetailsBtn1");

    // Ensure view customer modal is hidden on page load
    viewCustomerModal.style.display = "none";

    // Event listener to open the view customer modal
    document.querySelectorAll('.customer-link').forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            viewCustomerModal.style.display = "block";
            // Populate customer details here if needed
        });
    });

    // Event listener to close the view customer modal
    closeCustomerModalButton.addEventListener('click', function() {
        viewCustomerModal.style.display = "none";
    });

    closeCustomerDetailsBtn.addEventListener('click', function() {
        viewCustomerModal.style.display = "none";
    });

    // Close the view customer modal when clicking outside of it
    window.addEventListener('click', function(event) {
        if (event.target === viewCustomerModal) {
            viewCustomerModal.style.display = "none";
        }
    });
});