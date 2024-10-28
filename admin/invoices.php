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
  <title>Dashboard - Invoice</title>
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

        <div class="button-container">
          <button id="exportBtn">Export CSV</button>
          <button id="pdfBtn">PDF</button>
        </div>

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
  </div><br><br><br><br><br>

  <?php include 'includes/footer.php'; ?> <!-- Include the footer -->

  <script src="/AutoMobile Project/admin/assets/js/index.js"></script>
  <script src="/AutoMobile Project/admin/assets/js/invoices.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.6.0/jspdf.umd.min.js"></script>
</body>

</html>