    <?php
    session_start();
    include 'includes/header.php';
    include 'includes/subheader.php';
    include 'includes/sidebar.php';
    include '../config/dbconnection.php';
    include '../functions/alert.php';

    $officer_id = $_SESSION['auth_user']['userId'];

    // Prepare the SQL statement
    $query = "SELECT a.app_id, a.app_date, a.app_time, v.category FROM appointment a JOIN vehicle v ON a.vehicle_id = v.vehicle_id WHERE a.status = 'Pending';";
    $result = mysqli_query($conn, $query);
    ?>
    <link rel="stylesheet" href="/AutoMobile Project/Mechanic/assets/css/appointment.css">

    <div class="col-md-9 flex-grow-1 p-3">
        <div class="text-center">
            <div class="container">
                <h2>Appointments</h2>
                <table id="appointmentTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Category</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // Check if the query returned any results
                            if (mysqli_num_rows($result) > 0) {
                                // Loop through the results and create table rows
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['app_id'] . "</td>";
                                    echo "<td>" . $row['app_date'] . "</td>";
                                    echo "<td>" . $row['app_time'] . "</td>";
                                    echo "<td>" . $row['category'] . "</td>";
                                    echo "<td><a href='#' class='see-more detailsReportBtn' data-id=" . $row['app_id'] . ">See more</a></td>";
                                    echo "<td>";
                                        echo "<form method='POST' action='functions/appointment_actions.php'>";
                                            echo "<button class='btn accept' name='btn_accept' value='" . $row['app_id'] . "'>Accept</button>";
                                            echo "<button class='btn decline' name='btn_decline' value='" . $row['app_id'] . "'>Decline</button>";
                                        echo "</form>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                // If no data found, display a message
                                echo "<tr><td colspan='6'>No appointments found</td></tr>";
                            }
                        ?>
                    </tbody>
                </table>
                <!-- Add space after the table -->
                <div class="table-footer">
                    <!-- Horizontal line -->
                    <hr class="footer-line">
                </div>
            </div>
        </div>
    </div> <!-- closed the d-flex div opened in sidebar -->

    <!-- Detailed Report Modal -->
    <div id="detailsReportModal" class="detailsReportModal">
        <div class="detailsReportModal-content">
            <span class="close" id="closeDetailsReportModal">&times;</span>
            <h2>Detailed Report</h2>
            <!-- Horizontal line -->
            <hr class="details-modal-footer-line">
            <form action="#" method="POST">
                <div class="detailsReportModal-form-container">
                    <div class="details-table">
                        <table>
                            <tbody>
                                <tr>
                                    <td>Service ID - </td>
                                    <td>001</td>
                                </tr>
                                <tr>
                                    <td>Date - </td>
                                    <td>19/08/2024</td>
                                </tr>
                                <tr>
                                    <td>Time - </td>
                                    <td>09.30 - 10.30</td>
                                </tr>
                                <tr>
                                    <td>Category - </td>
                                    <td>Car</td>
                                </tr>
                                <tr>
                                    <td>License Plate No - </td>
                                    <td>WP ABC 1234</td>
                                </tr>
                                <tr>
                                    <td>Service Description - </td>
                                    <td>Mahaththaya car eka supiriyata service karala dennm ane, baya wenna epa mage pana wage balagannm ane</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </form>
        </div>

    </div>

    <!-- Closing the row , container divs opened in the sidebar -->
    </div>
</div>

    <script src="/AutoMobile Project/Mechanic/assets/js/index.js"></script>
    <script src="/AutoMobile Project/Mechanic/assets/js/appointment.js"></script>
</body>

</html>