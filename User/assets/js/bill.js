// Ensure the DOM is fully loaded before running the script
$(document).ready(function() {
    console.log("Bill page is ready!");
  
    // Get the modal
    var invoiceModal = document.getElementById('invoiceModal');
  
    // Get the close button
    var closeBillModal = document.getElementById('closeBillModal');
  
    // Function to open the modal
    function openModal(modal) {
        modal.style.display = 'flex'; // Display as flex to center it properly
    }
  
    // Function to close the modal
    function closeModal(modal) {
        modal.style.display = 'none';
    }
  
    // Add event listeners for each "More Details" button
    document.querySelectorAll('.viewBillBtn').forEach(function(button) {
        button.addEventListener('click', function() {
            const billId = this.getAttribute('data-bill-id');
            event.preventDefault(); // Prevent default link behavior
            viewBill(billId); // Call the viewBill function with the bill ID
            openModal(invoiceModal); // Open the modal
        });
    });

    // When the user clicks the close button, close the modal
    closeBillModal.onclick = function() {
        closeModal(invoiceModal);
    }
  
    // When the user clicks anywhere outside the modal, close it
    window.onclick = function(event) {
        if (event.target == invoiceModal) {
            closeModal(invoiceModal);
        }
    }
});


function viewBill(billNo) {
    // Perform AJAX call to fetch bill details
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "/AutoMobile Project/User/functions/get_bill_info.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            const response = JSON.parse(xhr.responseText);
            document.getElementById("customerNo").value = response.customerNo;
            document.getElementById("customerName").value = response.customerName;
            document.getElementById("billNo").value = response.billNo;
            document.getElementById("vehicleNo").value = response.licensePlateNo;
            document.getElementById("billingDate").value = response.billingDate;

            // Update charges in modal
            let chargesHTML = "";
            response.charges.forEach(charge => {
                chargesHTML += `<tr><td>${charge.description}</td><td>${charge.amount}</td></tr>`;
            });
            document.querySelector(".charges-details tbody").innerHTML = chargesHTML;
            document.querySelector(".charges-details tfoot td:last-child").innerText = response.total;

            // Update the payable-box with the total amount
            document.querySelector(".payable-box strong").innerText = `Rs.${response.total}`; // Update the value dynamically
            
            document.getElementById("invoiceModal").style.display = "flex";
        }
    };
    xhr.send("invoice_id=" + billNo);
}