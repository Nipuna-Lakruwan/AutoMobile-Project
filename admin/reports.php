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
      <?php include 'includes/navbar.php'; ?>

      <main>
        <div class="container">
          <h2>Reports Management</h2>
          <div class="toolbar">
            <input type="text" id="searchBox" placeholder="Search Reports..." />
            <button id="newMeetingBtn">+ New Report</button>
          </div>

          <div class="filters">
            <input type="text" placeholder="Report Title" />
            <input type="date" id="startDate" />
            <span>-</span>
            <input type="date" id="endDate" />
            <select id="serviceType">
              <option value="" disabled selected>Service Type</option>
              <option value="Maintenance">Maintenance</option>
              <option value="Repair">Repair</option>
              <option value="Inspection">Inspection</option>
              <!-- Add more service options as needed -->
            </select>
            <input type="text" placeholder="Garage Location" />
            <select id="createdBy">
              <option value="" disabled selected>Created By</option>
              <option value="John Doe">John Doe</option>
              <option value="Jane Smith">Jane Smith</option>
              <!-- Add more options as needed -->
            </select>
            <select id="verifiedBy">
              <option value="" disabled selected>Verified By</option>
              <option value="Supervisor 1">Supervisor 1</option>
              <option value="Supervisor 2">Supervisor 2</option>
              <!-- Add more options as needed -->
            </select>
          </div>

          <table id="meetingsTable">
            <thead>
              <tr>
                <th>ID</th>
                <th>Report Title</th>
                <th>Service Type</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Location</th>
                <th>Created By</th>
                <th>Verified By</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Vehicle Maintenance Report</td>
                <td>Maintenance</td>
                <td>2022-01-01</td>
                <td>2022-01-01</td>
                <td>Garage 1</td>
                <td>John Doe</td>
                <td>Supervisor 1</td>
              </tr>
              <!-- Add more rows as needed -->
            </tbody>
          </table>
        </div>
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
        </div>
      </main>
    </div>
  </div>
  <?php include 'includes/footer.php'; ?> <!-- Include the footer -->

  <script src="/AutoMobile Project/admin/assets/js/index.js"></script>
  <script src="/AutoMobile Project/admin/assets/js/reports.js"></script>
</body>

</html>