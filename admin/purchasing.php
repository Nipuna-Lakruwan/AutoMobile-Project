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
  <title>Dashboard - Purchasing</title>
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
            <h1>Purchasing</h1>
          </div>
        </div>

        <div class="container">
          <div class="toolbar">
            <input type="text" id="searchBox" placeholder="search..." />
            <button id="newMeetingBtn">+ New Purchase</button>
          </div>
          <div class="filters">
            <select id="itemName">
              <option value="" disabled selected>P ID</option>
              <option value="P0001">P0001</option>
              <option value="P0002">P0002</option>
              <option value="P0003">P0003</option>
              <!-- Add more options as needed -->
            </select>
            <select id="supplier">
              <option value="" disabled selected>Supplier</option>
              <option value="Supplier 1">Supplier 1</option>
              <option value="Supplier 2">Supplier 2</option>
              <!-- Add more options as needed -->
            </select>
            <input type="text" placeholder="Location Name" />
            <select id="purchasedBy">
              <option value="" disabled selected>Purchased By</option>
              <option value="John Doe">John Doe</option>
              <option value="Jane Smith">Jane Smith</option>
              <!-- Add more options as needed -->
            </select>
            <select id="approvedBy">
              <option value="" disabled selected>Approved By</option>
              <option value="Approver 1">Approver 1</option>
              <option value="Approver 2">Approver 2</option>
              <!-- Add more options as needed -->
            </select>
          </div>
          <table id="meetingsTable">
            <thead>
              <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Supplier</th>
                <th>Purchase Date</th>
                <th>Delivery Date</th>
                <th>Cost</th>
                <th>Status</th>
                <th>Purchased By</th>
                <th>Approved By</th>
              </tr>
            </thead>
            <tbody>
              <!-- Data populated dynamically from PHP -->
              <?php
              // Example row (Replace with dynamic data)
              echo "
                  <tr>
                    <td>P0001</td>
                    <td><a href='#' class='customer-link' data-id='1'>Product 1</a></td>
                    <td>Supplier 1</td>
                    <td>2022-01-01</td>
                    <td>2022-01-02</td>
                    <td>Rs. 1000</td>
                    <td>Approved</td>
                    <td>John Doe</td>
                    <td>Approver 1</td>
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

  <!-- Add New Purchase Modal -->
  <div id="addVehicleModal" class="modal add-vehicle-modal">
    <div class="modal-content">
      <span class="close-button" id="closeAddVehicleModal">&times;</span>
      <h2>Add New Purchase</h2>
      <form id="addVehicleForm">
      <div class="form-group">
          <label for="itemName">Product Name:</label>
          <input type="text" id="serviceType" name="serviceType" required>
        </div>
        <div class="form-group">
          <label for="category">Supplier:</label>
          <input type="text" id="customerName" name="customerName" required>
        </div>
        <div class="form-group">
          <label for="date">Purchase Date:</label>
          <input type="date" id="date" name="date" required>
        </div>
        <div class="form-group">
          <label for="date">Delivery Date:</label>
          <input type="date" id="date" name="date" required>
        </div>
        <div class="form-group">
          <label for="quantity">Cost:</label>
          <input type="text" id="vehicleRegistration" name="vehicleRegistration" required>
        </div>
        <div class="form-group">
          <label for="status">Purchased By:</label>
          <select id="status" name="status" required>
            <option value="Completed">John Doe</option>
            <option value="NotCompleted">Jane Smith</option>
          </select>
        </div>
        <div class="form-group">
          <label for="status">Approved By:</label>
          <select id="status" name="status" required>
            <option value="Nipuna1">Approver 1</option>
            <option value="Nipuna2">Approver 2</option>
          </select>
        </div>
        <button type="submit" id="submitAddVehicleForm">Add Purchase</button>
      </form>
    </div>
  </div>

  <!-- Invoice Details Modal -->
  <div id="viewCustomerModal1" class="modal customer-details-modal-1">
    <div class="modal-content">
      <span class="close-button" id="closeCustomerModal1">&times;</span>
      <h2>Sales Details</h2>
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
              <td>ID</td>
              <td id="itemId">1</td>
            </tr>
            <tr>
              <td>Product Name</td>
              <td id="itemName">Product 1</td>
            </tr>
            <tr>
              <td>Supplier</td>
              <td id="customerName">Supplier 1</td>
            </tr>
            <tr>
              <td>Purchase Date</td>
              <td id="serviceType">2022-01-01</td>
            </tr>
            <tr>
              <td>Delivery Date</td>
              <td id="cost">2022-01-02</td>
            </tr>
            <tr>
              <td>Cost</td>
              <td id="status">Rs.50000</td>
            </tr>
            <tr>
              <td>Status</td>
              <td id="price">Approved</td>
            </tr>
            <tr>
              <td>Purchased By</td>
              <td id="price">John Doe</td>
            </tr>
            <tr>
              <td>Approved By</td>
              <td id="price">Approver 1</td>
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
</body>

</html>