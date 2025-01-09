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
  <title>Dashboard - Bookings</title>
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
            <h1>Bookings</h1>
          </div>
        </div>

        <div class="container">
          <div class="toolbar">
            <input type="text" id="searchBox" placeholder="search..." />
            <button id="newMeetingBtn">+ New Booking</button>
          </div>
          <div class="filters">
            <select id="customerName">
              <option value="" disabled selected>Customer Name</option>
              <option value="Nipuna Lakruwan">Nipuna Lakruwan</option>
              <option value="Pasindu Deshan">Pasindu Deshan</option>
              <option value="Malaka Perera">Malaka Perera</option>
              <!-- Add more options as needed -->
            </select>
            <select id="manufacturer">
              <option value="" disabled selected>Manufacturer</option>
              <option value="Honda">Honda</option>
              <option value="Toyota">Toyota</option>
              <!-- Add more options as needed -->
            </select>
            <select id="model">
              <option value="" disabled selected>Model</option>
              <option value="VW Vento">VW Vento</option>
              <option value="Toyota Corolla">Toyota Corolla</option>
              <!-- Add more options as needed -->
            </select>
            <select id="fuelType">
              <option value="" disabled selected>Fuel Type</option>
              <option value="Petrol">Petrol</option>
              <option value="Diesel">Diesel</option>
              <!-- Add more options as needed -->
            </select>
            <!-- Color Name -->
            <select id="colorName">
              <option value="" disabled selected>Color Name</option>
              <option value="Red">Red</option>
              <option value="Blue">Blue</option>
              <!-- Add more options as needed -->
            </select>
            <select id="year">
              <option value="" disabled selected>Year</option>
              <option value="2021">2021</option>
              <option value="2022">2022</option>
              <!-- Add more options as needed -->
            </select>
          </div>
          <table id="meetingsTable">
            <thead>
              <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Customer Name</th>
                <th>Vehicle Registration</th>
                <th>Booking Date</th>
                <th>Note</th>
              </tr>
            </thead>
            <tbody>
              <!-- Data populated dynamically from PHP -->
              <?php
              // Example row (Replace with dynamic data)
              echo "
                  <tr>
                    <td>1</td>
                    <td><a href='#' class='customer-link' data-id='1'>Oli Change</a></td>
                    <td>Nipuna Lakruwan</td>
                    <td>WP CA-1234</td>
                    <td>2025-01-09</td>
                    <td>Change the Oil</td>
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

  <!-- Add New Booking Modal -->
  <div id="addVehicleModal" class="modal add-vehicle-modal">
    <div class="modal-content">
      <span class="close-button" id="closeAddVehicleModal">&times;</span>
      <h2>Add New Booking</h2>
      <form id="addVehicleForm">
      <div class="form-group">
          <label for="vehicleRegistration">Title:</label>
          <input type="text" id="vehicleRegistration" name="vehicleRegistration" required>
        </div>
        <div class="form-group">
          <label for="vehicleRegistration">Vehicle Registration:</label>
          <input type="text" id="vehicleRegistration" name="vehicleRegistration" required>
        </div>
        <div class="form-group">
          <label for="vehicleCustomerName">Customer Name:</label>
          <input type="text" id="vehicleCustomerName" name="vehicleCustomerName" required>
        </div>
        <div class="form-group">
          <label for="vehicleBookingDate">Booking Date:</label>
          <input type="date" id="vehicleBookingDate" name="vehicleBookingDate" required>
        </div>
        <div class="form-group">
          <label for="vehicleNote">Note:</label>
          <textarea id="vehicleNote" name="vehicleNote" required></textarea>
        </div>
        <button type="submit" id="submitAddVehicleForm">Add Booking</button>
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
              <td>Customer Name</td>
              <td id="customerName1">Nipuna Lakruwan</td>
            </tr>
            <tr>
              <td>Phone Number</td>
              <td id="customerPhone1">+94 712345678</td>
            </tr>
            <tr>
              <td>Address</td>
              <td id="customerAddress1">123 Main Street, Colombo</td>
            </tr>
            <tr>
              <td>Registered Vehicles</td>
              <td id="customerVehicles1">
                <ul>
                  <li>WP CA-1234 - Honda</li>
                  <li>WP CA-5678 - Toyota</li>
                </ul>
              </td>
            </tr>
            <tr>
              <td>Booking Date</td>
              <td id="bookingDate1">2023-10-01</td>
            </tr>
            <tr>
              <td>Booking Time</td>
              <td id="bookingTime1">10:00 AM</td>
            </tr>
            <tr>
              <td>Note</td>
              <td id="note1">Customer requested a quick service.</td>
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