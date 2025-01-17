<?php
include 'includes/header.php';
include 'includes/navbar.php';
?>

<link rel="stylesheet" href="/AutoMobile Project/Employee/assets/css/inventory.css">
<link rel="preload" href="https://unpkg.com/boxicons@2.1.4/fonts/boxicons.woff2" as="font" type="font/woff2" crossorigin="anonymous">

<div class="navcontainer">
  <div class="item back">
    <h2 class="clickable" onclick="redirectTo('home.php')">
      <i class="fa-solid fa-chevron-left fa-lg" style="color: #952B1A;"></i>
      Back
    </h2>
  </div>
  <div class="item home">
    <h2 class="clickable" onclick="redirectTo('home.php')">Home</h2>
  </div>
  <div class="item name">
    <h1>Inventory System</h1>
    <hr>
  </div>
</div>

<div class="invenContainer">
  <?php include 'includes/inventorynav.php' ?>

  <div class="line"></div>

  <div class="table">
    <h2>Inventory Requests</h2>
    <hr class="topicLine">
    <table>
      <thead>
        <tr>
          <th>Request ID</th>
          <th>Mechanic User Name</th>
          <th>Date</th>
          <th>Time</th>
          <th>Item Code</th>
          <th>Item Name</th>
          <th>Quantity</th>
          <th>Availability</th>
        </tr>
      </thead>
      <tbody id="inventoryRequestsTableBody">
        <!-- Rows will be added dynamically here -->
      </tbody>
    </table>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/AutoMobile Project/Employee/assets/js/script.js"></script>
<script>
  $(document).ready(function() {
    fetchInventoryRequests();
  });

  function fetchInventoryRequests() {
    $.get("/AutoMobile Project/Employee/fetch_inventory_requests.php", function(response) {
      const data = JSON.parse(response);
      if (data.status === "success") {
        let rows = "";
        data.data.forEach((request, index) => {
          rows += `
            <tr>
              <td>${request.request_id}</td>
              <td>${request.mechanic_username}</td>
              <td>${request.request_date}</td>
              <td>${request.request_time}</td>
              <td>${request.item_code}</td>
              <td>${request.item_name}</td>
              <td>${request.quantity}</td>
              <td>${request.availability ? '<i class="fa-solid fa-circle-check fa-lg" style="color: #06a306;"></i>' : '<i class="fa-solid fa-circle-xmark fa-lg" style="color: #a30606;"></i>'}</td>
            </tr>
          `;
        });
        $("#inventoryRequestsTableBody").html(rows);
      } else {
        $("#inventoryRequestsTableBody").html("<tr><td colspan='8'>No requests found</td></tr>");
      }
    });
  }
</script>
</body>
</html>