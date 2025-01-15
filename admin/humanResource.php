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
  <link rel="stylesheet" href="/AutoMobile Project/admin/assets/css/cashBank.css">
  <title>Dashboard - Human Resource</title>
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
            <h1>Human Resource</h1>
          </div>
        </div>
        <div class="container">
          <div class="toolbar">
            <input type="text" id="searchBox" placeholder="Search..." />
            <button id="newMeetingBtn">+ New Employee</button>
          </div>
          <div class="filters">
            <input type="text" placeholder="Employee Name" />
            <input type="date" id="startDate" />
            <span>-</span>
            <input type="date" id="endDate" />
            <select id="department">
              <option value="" disabled selected>Department</option>
              <option value="IT">IT</option>
              <option value="HR">HR</option>
              <option value="Finance">Finance</option>
              <option value="Marketing">Marketing</option>
              <!-- Add more options as needed -->
            </select>
            <input type="text" placeholder="Location Name" />
            <select id="supervisor">
              <option value="" disabled selected>Supervisor</option>
              <option value="John Doe">John Doe</option>
              <option value="Jane Smith">Jane Smith</option>
              <!-- Add more options as needed -->
            </select>
            <select id="role">
              <option value="" disabled selected>Role</option>
              <option value="Manager">Manager</option>
              <option value="Employee">Employee</option>
              <!-- Add more options as needed -->
            </select>
          </div>
          <table id="meetingsTable">
            <thead>
              <tr>
                <th>ID</th>
                <th>Employee Name</th>
                <th>Employee Type</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Department</th>
                <th>Location Name</th>
                <th>Supervisor</th>
                <th>Role</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>John Doe</td>
                <td>Full Time</td>
                <td>2022-01-01</td>
                <td>2022-12-31</td>
                <td>IT</td>
                <td>Location 1</td>
                <td>Jane Smith</td>
                <td>Manager</td>
              </tr>
              <!-- Add more rows as needed -->
            </tbody>
          </table>
        </div>
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

  <!-- New Report Modal -->
  <div id="newTransactionModal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <h2>New Employee</h2>
      <form id="newTransactionForm">
        <label for="transactionName">Employee Name:</label>
        <input type="text" id="transactionName" name="transactionName" required />

        <label for="transactionType">Employee Type:</label>
        <select id="transactionType" name="transactionType" required>
          <option value="Deposit">Full Time</option>
          <option value="Withdrawal">Part Time</option>
        </select>

        <label for="transactionDate">Start Date:</label>
        <input type="date" id="transactionDate" name="transactionDate" required />

        <label for="transactionDate">End Date:</label>
        <input type="date" id="transactionDate" name="transactionDate" required />

        <label for="department">Department:</label>
        <select id="department" name="department" required>
          <option value="Finance">IT</option>
          <option value="Accounting">Accounting</option>
          <option value="HR">HR</option>
          <!-- Add more options as needed -->
        </select>

        <label for="locationName">Location Name:</label>
        <input type="text" id="locationName" name="locationName" required />

        <label for="preparedBy">Supervisor:</label>
        <select id="preparedBy" name="preparedBy" required>
          <option value="John Doe">John Doe</option>
          <option value="Jane Smith">Jane Smith</option>
        </select>

        <label for="approvedBy">Role:</label>
        <select id="approvedBy" name="approvedBy" required>
          <option value="Approver 1">manager</option>
          <option value="Approver 2">Mechanic</option>
        </select>

        <button type="submit">Submit</button>
      </form>
    </div>
  </div>

  <!-- Modal for Viewing Report Details -->
  <div id="viewTransactionModal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <h2>Employee Details</h2>
      <table id="transactionDetailsTable">
        <tr>
          <th>Employee Name:</th>
          <td><span id="transactionName">-</span></td>
        </tr>
        <tr>
          <th>Employee Type:</th>
          <td><span id="transactionType">-</span></td>
        </tr>
        <tr>
          <th>Start Date:</th>
          <td><span id="transactionDate">-</span></td>
        </tr>
        <tr>
          <th>End Date:</th>
          <td><span id="transactionDate">-</span></td>
        </tr>
        <tr>
          <th>Department:</th>
          <td><span id="transactionAmount">-</span></td>
        </tr>
        <tr>
          <th>Location Name:</th>
          <td><span id="transactionLocation">-</span></td>
        </tr>
        <tr>
          <th>Supervisor:</th>
          <td><span id="transactionManagedBy">-</span></td>
        </tr>
        <tr>
          <th>Role:</th>
          <td><span id="transactionApprovedBy">-</span></td>
        </tr>
      </table>
    </div>
  </div>

  <?php include 'includes/footer.php'; ?> <!-- Include the footer -->
  <!-- End of Wrapper -->
  <script src="/AutoMobile Project/admin/assets/js/index.js"></script>
  <script src="/AutoMobile Project/admin/assets/js/cashBank.js"></script>
</body>

</html>