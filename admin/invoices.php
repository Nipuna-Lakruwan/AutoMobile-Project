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
  <link rel="stylesheet" href="/AutoMobile Project/admin/assets/css/vehicle.css">
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

      <main>
        <div class="header">
          <div class="left">
            <h1>Invoices</h1>
          </div>
        </div>

        <div class="container">
          <div class="toolbar">
            <input type="text" id="searchBox" placeholder="search..." />
            <button id="newMeetingBtn">+ New Invoice</button>
          </div>
          <div class="filters">
            <select id="itemName">
              <option value="" disabled selected>Invoice ID</option>
              <option value="INV0001">INV0001</option>
              <option value="INV0002">INV0002</option>
              <option value="INV0003">INV0003</option>
              <!-- Add more options as needed -->
            </select>
          </div>
          <table id="meetingsTable">
            <thead>
              <tr>
                <th>Invoice ID</th>
                <th>Customer Name</th>
                <th>Date</th>
                <th>Amount</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <!-- Data populated dynamically from PHP -->
              <?php
              // Example row (Replace with dynamic data)
              echo "
                  <tr>
                    <td>INV0001</td>
                    <td><a href='#' class='customer-link' data-id='1'>Nipuna</a></td>
                    <td>2024-08-17</td>
                    <td>Rs.150000</td>
                    <td>Paid</td>
                  </tr>
                ";
              ?>
            </tbody>
          </table>
        </div>
        <div class="pagination">
          <span>Showing 1 to 1 of 1 total records</span>
          <select id="rowsPerPage">
          <option value="5">5</option>
          <option value="10">10</option>
          <option value="50">50</option>
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
  </div><br><br>

  <!-- Add New Invoice Modal -->
  <div id="addVehicleModal" class="modal add-vehicle-modal">
    <div class="modal-content">
      <span class="close-button" id="closeAddVehicleModal">&times;</span>
      <h2>Add New Invoice</h2>
      <form id="addVehicleForm">
      <div class="form-group">
          <label for="invoiceId">Invoice ID:</label>
          <input type="text" id="invoiceId" name="invoiceId" required>
        </div>
        <div class="form-group">
          <label for="customerName">Customer Name:</label>
          <input type="text" id="customerName" name="customerName" required>
        </div>
        <div class="form-group">
          <label for="date">Date:</label>
          <input type="date" id="date" name="date" required>
        </div>
        <div class="form-group">
          <label for="amount">Amount:</label>
          <input type="text" id="amount" name="amount" required>
        </div>
        <div class="form-group">
          <label for="status">Status:</label>
          <select id="status" name="status" required>
            <option value="Paid">Paid</option>
            <option value="Unpaid">Unpaid</option>
          </select>
        </div>
        <button type="submit" id="submitAddInvoiceForm">Add Invoice</button>
      </form>
    </div>
  </div>

  <!-- Invoice Details Modal -->
  <div id="viewCustomerModal1" class="modal customer-details-modal-1">
    <div class="modal-content">
      <span class="close-button" id="closeCustomerModal1">&times;</span>
      <h2>Invoice Details</h2>
      <div class="customer-table-container-1">
        <table class="customer-details-table-1" id="meetingsTable1">
          <thead>
            <tr>
              <th>Detail</th>
              <th>Information</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Invoice ID</td>
              <td id="itemId">INV0001</td>
            </tr>
            <tr>
              <td>Customer Name</td>
              <td id="itemName">Nipuna</td>
            </tr>
            <tr>
              <td>Date</td>
              <td id="category">2024-08-17</td>
            </tr>
            <tr>
              <td>Amount</td>
              <td id="quantity">Rs.120000</td>
            </tr>
            <tr>
              <td>Status</td>
              <td id="price">Paid</td>
            </tr>
          </tbody>
        </table>
      </div>
      <button class="close-modal-btn-1" id="closeCustomerDetailsBtn1">Close</button>
    </div>
  </div>

  <?php include 'includes/footer.php'; ?> <!-- Include the footer -->

  <script src="/AutoMobile Project/admin/assets/js/index.js"></script>
  <script src="/AutoMobile Project/admin/assets/js/vehicle.js"></script>
</body>

</html>