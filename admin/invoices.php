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
  <link rel="stylesheet" href="/AutoMobile Project/admin/assets/css/invoices.css">
  <title>Dashboard - Meeting</title>
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
      <div class="container">
        <header>
          <h2>Invoices Management</h2>
        </header>

        <div class="toolbar">
          <input type="text" id="searchBox" placeholder="Search Invoices...">
          <button id="newInvoiceBtn">Add New Invoice</button>
        </div>

        <div class="filters">
          <select id="statusFilter">
            <option value="All">All</option>
            <option value="Paid">Paid</option>
            <option value="Unpaid">Unpaid</option>
          </select>
          <input type="date" id="dateStart">
          <input type="date" id="dateEnd">
        </div>

        <button id="exportBtn">Export to CSV</button>
        <button id="pdfBtn">Export to PDF</button>

        <span id="totalAmount">Total Amount: Rs.0</span>

        <table id="invoicesTable">
          <thead>
            <tr>
              <th>Invoice ID</th>
              <th>Customer Name</th>
              <th>Date</th>
              <th>Amount</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <!-- Rows will be dynamically generated here -->
          </tbody>
        </table>

        <div class="pagination">
          <span>Showing 1 to 10 of 50 entries</span>
          <div class="pagination-controls">
            <button>&laquo; Previous</button>
            <button>Next &raquo;</button>
          </div>
          <select id="rowsPerPage">
            <option value="10">10</option>
            <option value="20">20</option>
            <option value="50">50</option>
          </select>
        </div>
      </div>
    </div>
  </div>

  <script src="/AutoMobile Project/admin/assets/js/index.js"></script>
  <script src="/AutoMobile Project/admin/assets/js/invoices.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.6.0/jspdf.umd.min.js"></script>
</body>

</html>