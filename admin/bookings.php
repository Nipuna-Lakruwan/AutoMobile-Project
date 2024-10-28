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
      <?php include 'includes/header.php'; ?>

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
  </div>
  <?php include 'includes/footer.php'; ?> <!-- Include the footer -->
  <!-- End of Wrapper -->
  <script src="/AutoMobile Project/admin/assets/js/index.js"></script>
  <script src="/AutoMobile Project/admin/assets/js/bookings.js"></script>
</body>

</html>