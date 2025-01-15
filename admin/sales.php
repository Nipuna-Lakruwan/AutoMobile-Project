<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="/AutoMobile Project/admin/assets/css/style.css">
  <link rel="stylesheet" href="/AutoMobile Project/admin/assets/css/meeting.css">
  <link rel="stylesheet" href="/AutoMobile Project/admin/assets/css/vehicle.css">
  <title>Dashboard - Sales</title>
</head>

<body>

  <!-- Wrapper for sidebar and main content -->
  <div class="dashboard-wrapper">
    <!-- import sideMenu.php -->
    <?php include 'includes/sideMenu.php'; ?>

    <!-- Main Content -->
    <div class="content">
      <!-- Navbar -->
      <?php include 'includes/navbar.php'; ?>

      <main>
        <div class="header">
          <div class="left">
            <h1>Sales</h1>
          </div>
        </div>

        <div class="container">
          <div class="toolbar">
            <input type="text" id="searchBox" placeholder="search..." />
            <button id="newMeetingBtn">+ New Sale</button>
          </div>
          <div class="filters">
            <select id="itemName">
              <option value="" disabled selected>Sale ID</option>
              <option value="SALE0001">SALE0001</option>
              <option value="SALE0002">SALE0002</option>
              <option value="SALE0003">SALE0003</option>
              <!-- Add more options as needed -->
            </select>
          </div>
          <table id="meetingsTable">
            <thead>
              <tr>
                <th>Sale ID</th>
                <th>Vehicle Registration</th>
                <th>Customer Name</th>
                <th>Service Type</th>
                <th>Service Date</th>
                <th>Cost</th>
                <th>Status</th>
                <th>Mechanic Assigned</th>
              </tr>
            </thead>
            <tbody>
              <!-- Data populated dynamically from PHP -->
              <?php
              // Example row (Replace with dynamic data)
              echo "
                  <tr>
                    <td>SALE0001</td>
                    <td><a href='#' class='customer-link' data-id='1'>ABC 1234</a></td>
                    <td>John Doe</td>
                    <td>Car Wash</td>
                    <td>2024-01-01</td>
                    <td>Rs. 5000</td>
                    <td>Completed</td>
                    <td>John Doe</td>
                  </tr>
                ";
              ?>
            </tbody>
          </table>
        </div>
        <div class="pagination">
          <span>Showing 1 to 1 of 1 total records</span>
          <select id="rowsPerPage">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="50">50</option>
            <option value="100">100</option>
            <!-- Add more options as needed -->
          </select>
          <div class="pagination-controls">
            <button>&laquo;</button>
            <button>1</button>
            <button>&raquo;</button>
          </div>
        </div>
    </div>
    </main>
  </div><br><br>

  <!-- Add New Vehicle Modal -->
  <div id="addVehicleModal" class="modal add-vehicle-modal">
    <div class="modal-content">
      <span class="close-button" id="closeAddVehicleModal">&times;</span>
      <h2>Add New Sale</h2>
      <form id="addVehicleForm">
        <div class="form-group">
          <label for="vehicleRegistration">Vehicle Registration:</label>
          <input type="text" id="vehicleRegistration" name="vehicleRegistration" required>
        </div>
        <div class="form-group">
          <label for="vehicleCustomerName">Customer Name:</label>
          <input type="text" id="vehicleCustomerName" name="vehicleCustomerName" required>
        </div>
        <div class="form-group">
          <label for="serviceType">Service Type:</label>
          <input type="text" id="vehicleManufacturer" name="serviceType" required>
        </div>
        <div class="form-group">
          <label for="serviceDate">Service Date:</label>
          <input type="date" id="vehicleModel" name="serviceDate" required>
        </div>
        <div class="form-group">
          <label for="cost">Cost:</label>
          <input type="number" id="vehicleFuelType" name="cost" required>
        </div>
        <div class="form-group">
          <label for="status">Status:</label>
          <select id="status" name="status" required>
            <option value="Pending">Pending</option>
            <option value="Completed">Completed</option>
            <option value="Cancelled">Cancelled</option>
          </select>
        </div>
        <div class="form-group">
          <label for="mechanicAssigned">Mechanic Assigned:</label>
          <select id="status" name="mechanicAssigned" required>
            <option value="John Doe">John Doe</option>
            <option value="Jane Doe">Jane Doe</option>
            <option value="John Smith">John Smith</option>
          </select>
        </div>
        <button type="submit" id="submitAddVehicleForm">Add Sale</button>
      </form>
    </div>
  </div>

  <!-- Customer Details Modal -->
  <div id="viewCustomerModal1" class="modal customer-details-modal-1">
    <div class="modal-content">
      <span class="close-button" id="closeCustomerModal1">&times;</span>
      <h2>Sale Details</h2>
      <div class="customer-table-container-1">
        <table class="customer-details-table-1" id="meetingsTable1">
          <thead>
            <tr>
              <th>Detail</th>
              <th>Information</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Sale ID</td>
              <td id="customerName1">-</td>
            </tr>
            <tr>
              <td>Vehicle Registration</td>
              <td id="customerName1">-</td>
            </tr>
            <tr>
              <td>Customer Name</td>
              <td id="customerName1">-</td>
            </tr>
            <tr>
              <td>Service Type</td>
              <td id="customerName1">-</td>
            </tr>
            <tr>
              <td>Cost</td>
              <td id="customerName1">-</td>
            </tr>
            <tr>
              <td>Status</td>
              <td id="customerName1">-</td>
            </tr>
            <tr>
              <td>Mechanic Assigned</td>
              <td id="customerName1">-</td>
            </tr>
          </tbody>
        </table>
      </div>
      <button class="close-modal-btn-1" id="closeCustomerDetailsBtn1">Close</button>
    </div>
  </div>

  <?php include 'includes/footer.php'; ?> <!-- Include the footer -->

  <script src="/AutoMobile Project/admin/assets/js/index.js"></script>
  <script src="/AutoMobile Project/admin/assets/js/vehicle.js"></script>
  <script src="/AutoMobile Project/admin/assets/js/modals.js"></script>
</body>

</html>