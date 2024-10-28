<?php
// Get the current page filename
$currentPage = basename($_SERVER['PHP_SELF']);
?>


<!-- Sidebar -->
<div class="sidebar">
  <a href="/AutoMobile Project/admin/index.php" class="logo">
  <img src="/AutoMobile Project/admin/assets/img/logo.png" alt="Logo" class="logo" width="37" height="30">
    <div class="logo-name"><span>C</span>RAS</div>
  </a>
  <ul class="side-menu">
    <li><a href="/AutoMobile Project/admin/index.php" class="<?php echo ($currentPage == 'index.php') ? 'active' : ''; ?>"><i class='bx bxs-dashboard'></i>Dashboard</a></li>
    <li><a href="/AutoMobile Project/admin/vehicles.php" class="<?php echo ($currentPage == 'vehicles.php') ? 'active' : ''; ?>"><i class='bx bx-car'></i>Vehicles</a></li>
    <li><a href="/AutoMobile Project/admin/bookings.php" class="<?php echo ($currentPage == 'bookings.php') ? 'active' : ''; ?>"><i class='bx bx-calendar'></i>Bookings</a></li>
    <li><a href="/AutoMobile Project/admin/inspections.php" class="<?php echo ($currentPage == 'inspections.php') ? 'active' : ''; ?>"><i class='bx bxs-car-mechanic'></i>Inspections</a></li>
    <li><a href="/AutoMobile Project/admin/inventory.php" class="<?php echo ($currentPage == 'inventory.php') ? 'active' : ''; ?>"><i class='bx bx-basket'></i>Inventory</a></li>
    <li><a href="/AutoMobile Project/admin/invoices.php" class="<?php echo ($currentPage == 'invoices.php') ? 'active' : ''; ?>"><i class='bx bxs-report'></i>Invoices</a></li>
    <!-- <li><a href="/AutoMobile Project/admin/quotation.php" class="<?php echo ($currentPage == 'quotation.php') ? 'active' : ''; ?>"><i class='bx bx-checkbox-checked'></i>Quotations</a></li> -->
    <li><a href="/AutoMobile Project/admin/sales.php" class="<?php echo ($currentPage == 'sales.php') ? 'active' : ''; ?>"><i class='bx bx-cart'></i>Sales</a></li>
    <li><a href="/AutoMobile Project/admin/purchasing.php" class="<?php echo ($currentPage == 'purchasing.php') ? 'active' : ''; ?>"><i class='bx bx-cart-add'></i>Purchasing</a></li>
    <li><a href="/AutoMobile Project/admin/cashBank.php" class="<?php echo ($currentPage == 'cashBank.php') ? 'active' : ''; ?>"><i class='bx bxs-bank'></i>Cash/Bank</a></li>
    <li><a href="/AutoMobile Project/admin/financial.php" class="<?php echo ($currentPage == 'financial.php') ? 'active' : ''; ?>"><i class='bx bx-briefcase'></i>Financial</a></li>
    <li><a href="/AutoMobile Project/admin/humanResource.php" class="<?php echo ($currentPage == 'humanResource.php') ? 'active' : ''; ?>"><i class='bx bx-body'></i>Human Resource</a></li>
    <li><a href="/AutoMobile Project/admin/reports.php" class="<?php echo ($currentPage == 'reports.php') ? 'active' : ''; ?>"><i class='bx bx-circle'></i>Reports</a></li>
    <li><a href="/AutoMobile Project/admin/administration.php" class="<?php echo ($currentPage == 'administration.php') ? 'active' : ''; ?>"><i class='bx bx-cog'></i>Administration</a></li>
  </ul>
  <ul class="side-menu">
    <li>
      <a href="#" class="logout">
        <i class='bx bx-log-out-circle'></i>
        Logout
      </a>
    </li>
  </ul>
</div>
<!-- End of Sidebar -->