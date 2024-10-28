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
  <title>Dashboard - Purchasing</title>
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
          <h2>Purchasing</h2>
          <div class="toolbar">
            <input type="text" id="searchBox" placeholder="Search..." />
            <button id="newMeetingBtn">+ New Purchase</button>
          </div>
          <div class="filters">
            <input type="text" placeholder="Product Name" />
            <input type="date" id="purchaseDate" />
            <span>-</span>
            <input type="date" id="deliveryDate" />
            <select id="supplier">
              <option value="" disabled selected>Supplier</option>
              <option value="Supplier 1">Supplier 1</option>
              <option value="Supplier 2">Supplier 2</option>
              <!-- Add more options as needed -->
            </select>
            <input type="text" placeholder="Location Name" />
            <select id="purchasedBy">
              <option value="" disabled selected>Purchased By</option>
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
                <th>Product Name</th>
                <th>Supplier</th>
                <th>Purchase Date</th>
                <th>Delivery Date</th>
                <th>Cost</th>
                <th>Status</th>
                <th>Purchased By</th>
                <th>Approved By</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Product 1</td>
                <td>Supplier 1</td>
                <td>2022-01-01</td>
                <td>2022-01-02</td>
                <td>Rs. 1000</td>
                <td>Approved</td>
                <td>John Doe</td>
                <td>Approver 1</td>
              </tr>
              <tr>
                <td>2</td>
                <td>Product 2</td>
                <td>Supplier 2</td>
                <td>2022-01-02</td>
                <td>2022-01-03</td>
                <td>Rs. 2000</td>
                <td>Approved</td>
                <td>Jane Smith</td>
                <td>Approver 2</td>
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

      </main>
    </div>
  </div>
  <?php include 'includes/footer.php'; ?> <!-- Include the footer -->

  <script src="/AutoMobile Project/admin/assets/js/index.js"></script>
  <script src="/AutoMobile Project/admin/assets/js/purchasing.js"></script>
</body>

</html>