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
  <title>Dashboard - Cash/Bank</title>
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
          <h2>Cash & Bank</h2>
          <div class="toolbar">
            <input type="text" id="searchBox" placeholder="Search..." />
            <button id="newMeetingBtn">+ New Transaction</button>
          </div>
          <div class="filters">
            <input type="text" placeholder="Transaction Name" />
            <input type="date" id="transactionDate" />
            <span>-</span>
            <input type="date" id="endDate" />
            <select id="transactionType">
              <option value="" disabled selected>Transaction Type</option>
              <option value="Deposit">Deposit</option>
              <option value="Withdrawal">Withdrawal</option>
              <!-- Add more options as needed -->
            </select>
            <input type="text" placeholder="Amount" />
            <input type="text" placeholder="Location Name" />
            <select id="managedBy">
              <option value="" disabled selected>Managed By</option>
              <option value="John Doe">John Doe</option>
              <option value="Jane Smith">Jane Smith</option>
              <!-- Add more options as needed -->
            </select>
            <select id="approvedBy">
              <option value="" disabled selected>Approved By</option>
              <option value="Approver 1">Approver 1</option>
              <option value="Approver 2">Approver 2</option>
              <!-- Add more options as needed -->
            </select>
          </div>
          <table id="meetingsTable">
            <thead>
              <tr>
                <th>ID</th>
                <th>Transaction Name</th>
                <th>Transaction Type</th>
                <th>Transaction Date</th>
                <th>Amount</th>
                <th>Location Name</th>
                <th>Managed By</th>
                <th>Approved By</th>
              </tr>
            </thead>
            <tbody>
              <tr>
              <tr>
                <td>1</td>
                <td>Deposit</td>
                <td>Deposit</td>
                <td>2022-10-10</td>
                <td>Rs. 1000</td>
                <td>Colombo</td>
                <td>John Doe</td>
                <td>Approver 1</td>
                <td>
                  <button class="editBtn">Edit</button>
                  <button class="deleteBtn">Delete</button>
                </td>
              </tr>
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
  <?php include 'includes/footer.php'; ?> <!-- Include the footer -->
  <!-- End of Wrapper -->
  <script src="/AutoMobile Project/admin/assets/js/index.js"></script>
  <script src="/AutoMobile Project/admin/assets/js/cashBank.js"></script>
</body>

</html>