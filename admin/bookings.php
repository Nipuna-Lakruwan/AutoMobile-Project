<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="images/favicon.svg" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="/AutoMobile Project/admin/assets/css/booking.css">
  <link rel="stylesheet" href="/AutoMobile Project/admin/assets/css/style.css">
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
            <button id="newBookingsBtn">+ New Booking</button>
          </div>
          <div class="filters">
            <select id="customerNames">
              <option value="" disabled selected>Customer Name</option>
              <option value="Nipuna">Nipuna</option>
              <option value="Pasindu">Pasindu</option>
              <!-- Add more options as needed -->
            </select>
            <select id="Vehicle Register">
              <option value="" disabled selected>Vehicle Register</option>
              <option value="WP CA-1234">WP CA-1234</option>
              <option value="WP CA-5678">WP CA-5678</option>
              <!-- Add more options as needed -->
            </select>
            <input type="date" id="startDate" />
            <span>-</span>
            <input type="date" id="endDate" />
          </div>
          <table id="bookingsTable">
            <thead>
              <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Customer Name</th>
                <th>Vehicle Register Number</th>
                <th>Booking Date</th>
                <th>Note</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <!-- Add more rows as needed in js -->
            </tbody>
          </table>
        </div>
        <div class="pagination">
          <span>Showing 1 to 1 of 1 total records</span>
          <select id="rowsPerPage">
            <option value="100">100</option>
            <option value="50">50</option>
            <option value="25">25</option>
            <option value="10">10</option>
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
  </div>
  </div><br><br>

  <!-- Add New Booking Modal -->
  <div id="addBookingModal" class="modal add-booking-modal">
    <div class="modal-content">
      <span class="close-button" id="closeAddBookingModal">&times;</span>
      <h2>Add New Booking</h2>

      <!-- Step 1: Vehicle Information -->
      <div id="step1">
        <h3>Vehicle Information</h3>
        <form id="addBookingForm">
          <div class="form-group">
            <label for="vehicleRegistration">Vehicle Registration:</label>
            <input type="text" id="vehicleRegistration" name="vehicleRegistration" required>
          </div>
          <div class="form-group">
            <label for="vehicleCustomerName">Customer Name:</label>
            <input type="text" id="vehicleCustomerName" name="vehicleCustomerName" required>
          </div>
          <div class="form-group">
            <label for="vehicleManufacturer">Manufacturer:</label>
            <input type="text" id="vehicleManufacturer" name="vehicleManufacturer" required>
          </div>
          <div class="form-group">
            <label for="vehicleModel">Model:</label>
            <input type="text" id="vehicleModel" name="vehicleModel" required>
          </div>
          <div class="form-group">
            <label for="vehicleFuelType">Fuel Type:</label>
            <input type="text" id="vehicleFuelType" name="vehicleFuelType" required>
          </div>
          <div class="form-group">
            <label for="vehicleColor">Color:</label>
            <input type="text" id="vehicleColor" name="vehicleColor" required>
          </div>
          <div class="form-group">
            <label for="vehicleYear">Year:</label>
            <input type="text" id="vehicleYear" name="vehicleYear" required>
          </div>
        </form>
        <button id="nextStepBtn">Next</button>
      </div>

      <!-- Step 2: Booking Information (Hidden initially) -->
      <div id="step2" style="display: none;">
        <h3>Booking Information</h3>
        <div class="form-group">
          <label for="bookingDate">Booking Date:</label>
          <input type="date" id="bookingDate" name="bookingDate" required>
        </div>
        <div class="form-group">
          <label for="bookingTime">Booking Time:</label>
          <input type="time" id="bookingTime" name="bookingTime" required>
        </div>
        <div class="form-group">
          <label for="note">Note:</label>
          <textarea id="note" name="note" rows="4" cols="50" placeholder="Enter any notes here..."></textarea>
        </div>
        <button type="submit" id="submitAddBookingForm">Add Booking</button>
      </div>
    </div>
  </div>

  <!-- Booking Details Modal -->
  <div id="viewBookingModal1" class="modal customer-details-modal-1">
    <div class="modal-content">
      <span class="close-button" id="closeBookingModal1">&times;</span>
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
              <td>Email</td>
              <td id="customerEmail1">nipuna@example.com</td>
            </tr>
            <tr>
              <td>Phone Number</td>
              <td id="customerPhone1">123-456-7890</td>
            </tr>
            <tr>
              <td>Vehicle Registration</td>
              <td id="vehicleRegistration1">ABC123</td>
            </tr>
            <tr>
              <td>Manufacturer</td>
              <td id="vehicleManufacturer1">Toyota</td>
            </tr>
            <tr>
              <td>Model</td>
              <td id="vehicleModel1">Corolla</td>
            </tr>
            <tr>
              <td>Fuel Type</td>
              <td id="vehicleFuelType1">Petrol</td>
            </tr>
            <tr>
              <td>Color</td>
              <td id="vehicleColor1">Red</td>
            </tr>
            <tr>
              <td>Year</td>
              <td id="vehicleYear1">2020</td>
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
    </div>
  </div>

  <?php include 'includes/footer.php'; ?> <!-- Include the footer -->
  <!-- End of Wrapper -->
  <script src="/AutoMobile Project/admin/assets/js/index.js"></script>
  <script src="/AutoMobile Project/admin/assets/js/bookings.js"></script>
</body>

</html>