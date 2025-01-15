document.addEventListener('DOMContentLoaded', function() {
  const viewCustomerModal = document.getElementById("viewCustomerModal1");
  const closeCustomerModal = document.getElementById("closeCustomerModal1");
  const closeCustomerDetailsBtn = document.getElementById("closeCustomerDetailsBtn1");

  // Open View Customer Modal
  document.querySelectorAll('.customer-link').forEach(function(link) {
    link.addEventListener('click', function(event) {
      event.preventDefault();

      const row = event.target.closest('tr');
      const columns = row.querySelectorAll('td');
      
      // Populate modal with the row data dynamically
      document.getElementById("customerName1").innerText = columns[0].innerText; // Customer Name
      document.getElementById("customerEmail1").innerText = columns[1].innerText; // Email
      document.getElementById("customerPhone1").innerText = columns[2].innerText; // Phone Number
      document.getElementById("customerAddress1").innerText = columns[3].innerText; // Address
      document.getElementById("customerRegistrationDate1").innerText = columns[4].innerText; // Registration Date

      // Populate Registered Vehicles dynamically if available in a specific column
      const vehiclesList = document.getElementById("vehiclesList");
      vehiclesList.innerHTML = ''; // Clear any previous data
      const vehicles = columns[5].innerText.split(","); // Assuming vehicles are in the 6th column
      vehicles.forEach(vehicle => {
        const li = document.createElement("li");
        li.innerText = vehicle.trim();
        vehiclesList.appendChild(li);
      });

      // Display the modal
      viewCustomerModal.style.display = "block";
    });
  });

  // Close View Customer Modal
  closeCustomerModal.addEventListener('click', function() {
    viewCustomerModal.style.display = "none";
  });

  closeCustomerDetailsBtn.addEventListener('click', function() {
    viewCustomerModal.style.display = "none";
  });

  // Close modals when clicking outside
  window.addEventListener('click', function(event) {
    if (event.target === viewCustomerModal) {
      viewCustomerModal.style.display = "none";
    }
  });
});