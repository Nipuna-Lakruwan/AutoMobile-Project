    <?php
        include '../middleware/usermiddleware.php';
        include 'includes/header.php';
        include 'includes/subheader.php';
        include 'includes/sidebar.php';
        include '../config/dbconnection.php';
        include '../functions/alert.php';

        $cus_id = $_SESSION['auth_user']['userId'];

        // Prepare the SQL statement
        $stmt = $conn->prepare("SELECT i.invoice_id, s.service_record_id, v.license_no, i.date, i.amount FROM invoice i JOIN servicerecord s ON i.service_id = s.service_record_id JOIN vehicle v ON s.vehicle_id = v.vehicle_id JOIN customer c ON v.cus_id = c.cus_Id WHERE c.cus_Id = ?;");
        $stmt->bind_param("i", $cus_id); // Assuming cus_id is an integer
        $stmt->execute(); // Execute the statement
        $query_run = $stmt->get_result(); // Get the result
    ?>
    <link rel="stylesheet" href="/AutoMobile Project/User/assets/css/bill.css">

    <div class="col-md-9 flex-grow-1 p-3">
        <div class="text-center">
            <div class="viewBill-container">
                <h2>Bills</h2>
                <table id="viewBillTable">
                    <thead>
                        <tr>
                            <th>Bill No</th>
                            <th>Service ID</th>
                            <th>License Plate No</th>
                            <th>Date</th>
                            <th>Total Amount</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Check if the query returned any results
                        if (mysqli_num_rows($query_run) > 0) {
                            // Loop through the results and create table rows
                            while ($row = mysqli_fetch_assoc($query_run)) {
                                echo "<tr>";
                                echo "<td>" . $row['invoice_id'] . "</td>";
                                echo "<td>" . $row['service_record_id'] . "</td>"; // Customer Name
                                echo "<td>" . $row['license_no'] . "</td>"; // License Plate Number
                                echo "<td>" . $row['date'] . "</td>"; // Bill Date
                                echo "<td>Rs." . number_format($row['amount'], 2) . "</td>"; // Total Amount
                                echo "<td><a href='#' class='viewBill-button viewBillBtn'  data-bill-id='" . $row['invoice_id'] . "'>View Bill</a></td>";
                                echo "<td><a href='mekata_link_karapan' class='details-button viewBillBtn' ><img src='../User/assets/img/Download from the Cloud.png' alt='Pending' style='width:16px; height:16px;'></a></td>"; // Download Icon
                                echo "</tr>";
                            }
                        } else {
                            // If no data found, display a message
                            echo "<tr><td colspan='6'>No bills found</td></tr>";
                        }?>
                    </tbody>
                </table>
                <!-- Add space after the table -->
                <div class="viewBill-table-footer">
                    <!-- Horizontal line -->
                    <hr class="viewBill-footer-line">
                </div>
            </div>
        </div>
    </div>

    <div id="invoiceModal" class="invoiceModal">

        <div class="invoiceModal-content">
        <span class="close" id="closeBillModal">&times;</span>
            <h2>INVOICE</h2>
            <hr class="modal-footer-line">

            <div class="invoice-details">
                <div class="customer-info">
                    <div class="form-group">
                        <label for="customerNo">Customer No:</label>
                        <input type="text" id="customerNo" readonly>
                    </div>
                    <div class="form-group">
                        <label for="customerName">Customer Name:</label>
                        <input type="text" id="customerName" readonly>
                    </div>
                    <div class="form-group">
                        <label for="billNo">Bill No:</label>
                        <input type="text" id="billNo" readonly>
                    </div>
                    <div class="form-group">
                        <label for="vehicleNo">Vehicle No:</label>
                        <input type="text" id="vehicleNo" readonly>
                    </div>
                    <div class="form-group">
                        <label for="billingDate">Billing Date:</label>
                        <input type="text" id="billingDate" readonly>
                    </div>
                </div>

                <div class="total-payable">
                    <div class="payable-box">
                        <span>Total payable</span>
                        <strong>Rs.5500.00</strong>
                    </div>
                </div>
            </div>

            <hr class="divider">

            <div class="charges-details">
                <h3>Details Of Chargers For The Period</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>(Rs.)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>nvjaovoqbdq</td>
                            <td>1000.00</td>
                        </tr>
                        <tr>
                            <td>bcjwbwbv</td>
                            <td>1500.00</td>
                        </tr>
                        <tr>
                            <td>ncijbowq</td>
                            <td>1000.00</td>
                        </tr>
                        <tr>
                            <td>njofnqf</td>
                            <td>250.00</td>
                        </tr>
                        <tr>
                            <td>Service Charge</td>
                            <td>1500.00</td>
                        </tr>
                        <tr>
                            <td>Taxes & Levies</td>
                            <td>250.00</td>
                        </tr>
                        <!-- Divider row -->
                        <tr class="divider-row">
                            <td colspan="2"></td>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>Total</td>
                            <td>5500.00</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    </div>
<!-- Closing the row , container divs opened in the sidebar -->
    </div>
</div>

    <script src="/AutoMobile Project/User/assets/js/index.js"></script>
    <script src="/AutoMobile Project/User/assets/js/bill.js"></script>
</body>

</html>