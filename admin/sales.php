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
  <title>Dashboard - Sales</title>
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
          <h2>Sales</h2>
          <div class="toolbar">
            <input type="text" id="searchBox" placeholder="search..." />
            <button id="newMeetingBtn">+ New Sale</button>
          </div>
          <div class="filters">
            <!-- <input type="text" placeholder="" /> -->
            <input type="date" id="startDate" />
            <!-- <span>-</span> -->
            <input type="date" id="endDate" />
            <select id="department">
              <option value="" disabled selected>Type</option>
              <option value="IT">Car Wash</option>
              <option value="HR">Service</option>
            </select>
            <select id="organizedBy">
              <option value="" disabled selected>Mechanic</option>
              <option value="John Doe">John Doe</option>
              <option value="Jane Smith">Jane Smith</option>
              <!-- Add more options as needed -->
            </select>
            <!-- <select id="reporter">
              <option value="" disabled selected>Reporter</option>
              <option value="Reporter 1">Reporter 1</option>
              <option value="Reporter 2">Reporter 2</option>
            </select> -->
          </div>
          <table id="meetingsTable">
            <thead>
              <tr>
              <tr>
                <th>ID</th>
                <th>Vehicle Registration</th>
                <th>Customer Name</th>
                <th>Service Type</th>
                <th>Service Date</th>
                <th>Cost</th>
                <th>Status</th>
                <th>Mechanic Assigned</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>ABC 123</td>
                <td>John Doe</td>
                <td>Car Wash</td>
                <td>2024-01-01</td>
                <td>Rs. 5000</td>
                <td>Completed</td>
                <td>John Doe</td>
                <td>
                  <button class="editBtn">Edit</button>
                  <button class="deleteBtn">Delete</button>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td>XYZ 456</td>
                <td>Jane Smith</td>
                <td>Service</td>
                <td>2024-01-02</td>
                <td>Rs. 10000</td>
                <td>Pending</td>
                <td>Jane Smith</td>
                <td>
                  <button class="editBtn">Edit</button>
                  <button class="deleteBtn">Delete</button>
                </td>
              </tr>
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
  <?php include 'includes/footer.php'; ?> <!-- Include the footer -->

  <script src="/AutoMobile Project/admin/assets/js/index.js"></script>
  <script src="/AutoMobile Project/admin/assets/js/sales.js"></script>
</body>

</html>