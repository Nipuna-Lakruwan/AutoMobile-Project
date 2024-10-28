    <?php 
        include '../middleware/usermiddleware.php';
        include 'includes/header.php';
        include 'includes/subheader.php';
        include 'includes/sidebar.php';
        include '../config/dbconnection.php';
        include '../functions/alert.php';

        $cus_id = $_SESSION['auth_user']['userId'];

        // Prepare the SQL statement
        $stmt = $conn->prepare("SELECT a.activity_id, a.activity_type, v.license_no FROM activities a JOIN appointment ap ON a.app_id = ap.app_id JOIN vehicle v ON ap.vehicle_id = v.vehicle_id WHERE v.cus_id = ?");
        $stmt->bind_param("i", $cus_id); // Assuming cus_id is an integer
        $stmt->execute(); // Execute the statement
        $query_run = $stmt->get_result(); // Get the result
    ?>
    <link rel="stylesheet" href="/AutoMobile Project/User/assets/css/activity.css">

    <div class="col-md-9 flex-grow-1 p-3">
        <div class="text-center">
            <div class="activity-container">
                <h2 class="container-h2-main">Ongoing Activities</h2>
                <hr class="modal-footer-line">
                <table id="meetingsTable">
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
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
                                    echo '<tr class="clickable-row" ' . 'data-link="showContainerLink2">';
                                    echo "<td>" . $row['activity_id'] . "</td>";
                                    echo "<td>" . $row['license_no'] . "</td>";
                                    echo "<td></td>";
                                    echo "<td><a href='#' class='viewBill-button viewActivityBtn'  data-bill-id='" . $row['activity_id'] . "'>View Activity</a></td>";
                                    echo "<td>" . $row['activity_type'] . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                // If no data found, display a message
                                echo "<tr><td colspan='5'>No vehicles found</td></tr>";
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

            <div class="activity-container" id="ongoingActivitiesContainer" style="display: none;">
                <div class="vehicle-button-container">
                    <div class="vehicle-button-wrapper">
                        <button id="backButton" class="vehicle-button">Back</button> <!-- Back button -->
                    </div>
                </div>
                <h2 class="container-h2">WP ABC 1234 - Body Wash</h2>
                <hr class="modal-footer-line">
                <div class="datetime">
                    <p class="date-time1">Start Date - 09/08/2024</p>
                    <p class="date-time2">Start Time - 13.00</p>
                </div>
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="circle"></div>
                        <p>Started</p>
                    </div>
                    <div class="timeline-item">
                        <div class="circle"></div>
                        <p>Preparing Quotation</p>
                    </div>
                    <div class="timeline-item">
                        <div class="circle"></div>
                        <p class="highlighted-text">Quotation Sent</p>
                        <p class="quotation">• The quotation has been sent to your email. Please check your email and confirm to begin your service process.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="circle"></div>
                        <p>Service Scheduled</p>
                    </div>
                    <div class="timeline-item">
                        <div class="circle"></div>
                        <p>Service Completed</p>
                    </div>
                    <div class="timeline-last-item">
                        <div class="circle"></div>
                        <p>Feedback Received</p>
                    </div><br><br>
                    <!-- Horizontal line -->
                    <hr class="timeLine-line">
                </div>
            </div>
        </div>
    </div>
    <!-- Closing the row , container divs opened in the sidebar -->
    </div>
</div>
    
    <script src="/AutoMobile Project/User/assets/js/index.js"></script>
    <script src="/AutoMobile Project/User/assets/js/activity.js"></script>
</body>
</html>