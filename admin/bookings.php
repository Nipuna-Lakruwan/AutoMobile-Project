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
      <nav>
        <i class='bx bx-menu'></i>
        <form action="#">
          <div class="form-input">
            <input type="search" placeholder="Search...">
            <button class="search-btn" type="submit"><i class='bx bx-search'></i></button>
          </div>
        </form>
        <input type="checkbox" id="theme-toggle" hidden>
        <label for="theme-toggle" class="theme-toggle"></label>
        <a href="#" class="notif">
          <i class='bx bx-bell'></i>
          <span class="count">12</span>
        </a>
        <!--<a href="#" class="profile">
                        <img src="images/profile.JPG">
                    </a> -->
        <div class="profile-dropdown">
          <div onclick="toggle()" class="profile-dropdown-btn">
            <div class="profile-img">
              <i class="fa-solid fa-circle"></i>
            </div>

            <span>Nipuna
              <i class="fa-solid fa-angle-down"></i>
            </span>
          </div>

          <ul class="profile-dropdown-list">
            <li class="profile-dropdown-list-item">
              <a href="profile.html">
                <i class="fa-regular fa-user"></i>
                Edit Profile
              </a>
            </li>

            <li class="profile-dropdown-list-item">
              <a href="#">
                <i class="fa-regular fa-envelope"></i>
                Inbox
              </a>
            </li>

            <li class="profile-dropdown-list-item">
              <a href="#">
                <i class="fa-solid fa-chart-line"></i>
                Analytics
              </a>
            </li>

            <li class="profile-dropdown-list-item">
              <a href="#">
                <i class="fa-solid fa-sliders"></i>
                Settings
              </a>
            </li>

            <li class="profile-dropdown-list-item">
              <a href="#">
                <i class="fa-regular fa-circle-question"></i>
                Help & Support
              </a>
            </li>
            <hr />

            <li class="profile-dropdown-list-item">
              <a href="#">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                Log out
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <!-- End of Navbar -->

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
          <div class="footer">
            Copyright &copy; 2024. All rights reserved.
            Nipuna Lakruwan
          </div>
        </div>
      </main>
    </div>
  </div>
  <!-- End of Wrapper -->
  <script src="/AutoMobile Project/admin/assets/js/index.js"></script>
  <script src="/AutoMobile Project/admin/assets/js/bookings.js"></script>
</body>

</html>