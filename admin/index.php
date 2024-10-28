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
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Dashboard</title>
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
        <!-- <a href="#" class="profile">
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
              <a href="pages/profile.html">
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
            <h1>Dashboard</h1>
          </div>
          <a href="#" class="report">
            <i class='bx bx-cloud-download'></i>
            <span>Download CSV</span>
          </a>
        </div>

        <!-- Insights -->
        <!-- Summary of the dashboard -->

        <ul class="insights">
          <li>
            <i class='bx bx-car'></i>
            <span class="info">
              <h3>
                10
              </h3>
              <p>Total Vehicles</p>
            </span>
          </li>
          <li><i class='bx bx-male'></i>
            <span class="info">
              <h3>
                10
              </h3>
              <p>Total Customers</p>
            </span>
          </li>
          <li><i class='bx bx-line-chart'></i>
            <span class="info">
              <h3>
                10
              </h3>
              <p>Services</p>
            </span>
          </li>
          <li><i class='bx bx-money'></i>
            <span class="info">
              <h3>
                Rs.742,000
              </h3>
              <p>Total Sales</p>
            </span>
          </li>
        </ul>
        <!-- End of Insights -->

        <!-- Charts -->
        <div class="graphBox">
          <div class="box">
            <canvas id="myChart"></canvas>
          </div>
          <div class="box">
            <canvas id="earning"></canvas>
          </div>
        </div>

        <!-- Orders -->
        <div class="bottom-data">
          <div class="orders">
            <div class="header">
              <i class='bx bx-receipt'></i>
              <h3>Orders</h3>
              <a href="#" class="report">
                <i class='bx bx-plus-circle'></i>
                <span>Place New Order</span>
              </a>
              <i class='bx bx-filter'></i>
              <i class='bx bx-search'></i>
            </div>
            <table>
              <thead>
                <tr>
                  <th>Customer ID</th>
                  <th>User</th>
                  <th>Order Date</th>
                  <th>Status</th>
                  <th>Price</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>#001</td>
                  <td>
                    <img src="../Admin-Dashboard/images/profile.JPG">
                    <p>Nipuna Lakruwan</p>
                  </td>
                  <td>14-08-2024</td>
                  <td><span class="status completed">Completed</span></td>
                  <td>Rs.5000</td>
                </tr>
                <tr>
                  <td>#002</td>
                  <td>
                    <img src="images/profile.JPG">
                    <p>Nipuna Lakruwan</p>
                  </td>
                  <td>14-08-2024</td>
                  <td><span class="status pending">Pending</span></td>
                  <td>Rs.5000</td>
                </tr>
                <tr>
                  <td>#003</td>
                  <td>
                    <img src="images/profile.JPG">
                    <p>Nipuna Lakruwan</p>
                  </td>
                  <td>14-08-2024</td>
                  <td><span class="status process">Processing</span></td>
                  <td>Rs.5000</td>
                </tr>
                <tr>
                  <td>#004</td>
                  <td>
                    <img src="images/profile.JPG">
                    <p>Pasindu Deshan</p>
                  </td>
                  <td>14-08-2024</td>
                  <td><span class="status process">Processing</span></td>
                  <td>Rs.5000</td>
                </tr>
                <tr>
                  <td>#005</td>
                  <td>
                    <img src="images/profile.JPG">
                    <p>Pasindu Deshan</p>
                  </td>
                  <td>14-08-2024</td>
                  <td><span class="status completed">Completed</span></td>
                  <td>Rs.5000</td>
                </tr>
                <tr>
                  <td>#006</td>
                  <td>
                    <img src="images/profile.JPG">
                    <p>Malaka Perera</p>
                  </td>
                  <td>14-08-2024</td>
                  <td><span class="status pending">Pending</span></td>
                  <td>Rs.5000</td>
                </tr>
                <tr>
                  <td>#007</td>
                  <td>
                    <img src="images/profile.JPG">
                    <p>Malaka Perera</p>
                  </td>
                  <td>14-08-2024</td>
                  <td><span class="status pending">Pending</span></td>
                  <td>Rs.5000</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </main>
    </div>
  </div>
  <!-- End of Wrapper -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>
        <script src="assets/js/index.js"></script>
        <script src="assets/js/chart.js"></script>
</body>

</html>

<?php

include('../middleware/adminmiddleware.php');

?>