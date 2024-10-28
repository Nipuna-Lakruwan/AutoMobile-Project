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
  <title>Dashboard - Vehicles</title>
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
            <h1>Vehicles</h1>
          </div>
        </div>

        <div class="container">
          <div class="toolbar">
            <input type="text" id="searchBox" placeholder="search..." />
            <button id="newMeetingBtn">+ New Meetings</button>
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
                <th>Customer Name</th>
                <th>Vehicle Registration</th>
                <th>Year</th>
                <th>Seats</th>
                <th>Manufacturer</th>
                <th>CC Rating</th>
                <th>Model Name</th>
                <th>Fuel Type</th>
                <th>Color Name</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td><a href="#">Nipuna Lakruwan</a></td>
                <td>WP CA-1234</td>
                <td>2021</td>
                <td>5</td>
                <td>Honda</td>
                <td>1500</td>
                <td>VW Vento</td>
                <td>Petrol</td>
                <td>Red</td>
              </tr>
              <tr>
                <td>2</td>
                <td><a href="#">Pasindu Deshan</a></td>
                <td>WP CA-5678</td>
                <td>2022</td>
                <td>5</td>
                <td>Toyota</td>
                <td>1500</td>
                <td>Toyota Corolla</td>
                <td>Petrol</td>
                <td>Blue</td>
              </tr>
              <tr>
                <td>3</td>
                <td><a href="#">Malaka Perera</a></td>
                <td>WP CA-9876</td>
                <td>2021</td>
                <td>5</td>
                <td>Honda</td>
                <td>1500</td>
                <td>VW Vento</td>
                <td>Petrol</td>
                <td>Red</td>
              </tr>
              <!-- Add more rows as needed -->
            </tbody>
          </table>
          <div class="pagination">
            <span>Showing 1 to 1 of 1 total records</span>
            <select id="rowsPerPage">
              <option value="100">100</option>
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
  
  <script src="/AutoMobile Project/admin/assets/js/index.js"></script>
  <script src="/AutoMobile Project/admin/assets/js/meeting.js"></script>
</body>

</html>