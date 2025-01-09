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
  <title>Dashboard - Inventory</title>
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
            <h1>Inventory</h1>
          </div>
        </div>

        <div class="container">
          <div class="toolbar">
            <input type="text" id="searchBox" placeholder="search..." />
            <button id="newMeetingBtn">+ New Item</button>
          </div>
          <div class="filters">
            <select id="itemName">
              <option value="" disabled selected>Item Name</option>
              <option value="Engine Oil">Engine Oil</option>
              <option value="Tyres">Tyres</option>
              <option value="Nuts">Nuts</option>
              <!-- Add more options as needed -->
            </select>
          </div>
          <table id="meetingsTable">
            <thead>
              <tr>
                <th>Item-ID</th>
                <th>Item Name</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <!-- Data populated dynamically from PHP -->
              <?php
              // Example row (Replace with dynamic data)
              echo "
                  <tr>
                    <td>1</td>
                    <td><a href='#' class='customer-link' data-id='1'>Engine Oil</a></td>
                    <td>Oil</td>
                    <td>100</td>
                    <td>Rs.50,000</td>
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

  <!-- Add New Item Modal -->
  <div id="addVehicleModal" class="modal add-vehicle-modal">
    <div class="modal-content">
      <span class="close-button" id="closeAddVehicleModal">&times;</span>
      <h2>Add New Item</h2>
      <form id="addVehicleForm">
      <div class="form-group">
          <label for="itemName">Item Name:</label>
          <input type="text" id="vehicleRegistration" name="vehicleRegistration" required>
        </div>
        <div class="form-group">
          <label for="category">Category:</label>
          <input type="text" id="vehicleRegistration" name="vehicleRegistration" required>
        </div>
        <div class="form-group">
          <label for="quantity">Quantity:</label>
          <input type="text" id="vehicleCustomerName" name="vehicleCustomerName" required>
        </div>
        <div class="form-group">
          <label for="price">Price:</label>
          <input type="text" id="vehicleBookingDate" name="vehicleBookingDate" required>
        </div>
        <button type="submit" id="submitAddVehicleForm">Add Item</button>
      </form>
    </div>
  </div>

  <!-- Booking Details Modal -->
  <div id="viewCustomerModal1" class="modal customer-details-modal-1">
    <div class="modal-content">
      <span class="close-button" id="closeCustomerModal1">&times;</span>
      <h2>Booking Details</h2>
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
              <td>Item-ID</td>
              <td id="itemId">1</td>
            </tr>
            <tr>
              <td>Item Name</td>
              <td id="itemName">Engine Oil</td>
            </tr>
            <tr>
              <td>Category</td>
              <td id="category">Oil</td>
            </tr>
            <tr>
              <td>Quantity</td>
              <td id="quantity">100</td>
            </tr>
            <tr>
              <td>Price</td>
              <td id="price">Rs.50,000</td>
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