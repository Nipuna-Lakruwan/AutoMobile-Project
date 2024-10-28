    <?php
        include '../middleware/usermiddleware.php';
        include 'includes/header.php';
        include 'includes/subheader.php';
        include 'includes/sidebar.php';
        include '../config/dbconnection.php';
        include '../functions/alert.php';

        $cus_id = $_SESSION['auth_user']['userId'];

        // Prepare the SQL statement
        $stmt = $conn->prepare("SELECT a.app_id, a.app_date, a.app_time, a.status, v.license_no, v.category FROM appointment a JOIN vehicle v ON a.vehicle_id = v.vehicle_id WHERE v.cus_id = ? ;");
        $stmt->bind_param("i", $cus_id); // Assuming cus_id is an integer
        $stmt->execute(); // Execute the statement
        $query_run = $stmt->get_result(); // Get the result

        // Prepare the SQL statement
        $stmt = $conn->prepare("SELECT a.app_id, a.app_date, a.app_time, a.status, v.license_no FROM appointment a JOIN vehicle v ON a.vehicle_id = v.vehicle_id WHERE a.status != 'Cancelled' AND v.cus_id = ? ;");
        $stmt->bind_param("i", $cus_id); // Assuming cus_id is an integer
        $stmt->execute(); // Execute the statement
        $modal_query_run = $stmt->get_result(); // Get the result

        $stmt = $conn->prepare("SELECT vehicle_id, license_no FROM vehicle WHERE cus_id = ? ;");
        $stmt->bind_param("i", $cus_id); // Assuming cus_id is an integer
        $stmt->execute(); // Execute the statement
        $vehicle_query = $stmt->get_result(); // Get the result
    ?>
    <link rel="stylesheet" href="/AutoMobile Project/User/assets/css/appointment.css">

    <div class="col-md-9 flex-grow-1 p-3">
        <div class="text-center">
            <div class="container">
                <h2>My Appointments</h2>
                <table id="appointmentTable" class="container-table">
                    <thead>
                        <tr>
                            <th>Appointment ID</th>
                            <th>License Plate No</th>
                            <th>Category</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // Check if the query returned any results
                            if (mysqli_num_rows($query_run) > 0) {
                                // Loop through the results and create table rows
                                while ($row = mysqli_fetch_assoc($query_run)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['app_id'] . "</td>";
                                    echo "<td>" . $row['license_no'] . "</td>";
                                    echo "<td>" . $row['category'] . "</td>";
                                    echo "<td>" . $row['app_date'] . "</td>";
                                    echo "<td>" . date('h:i A', strtotime($row['app_time'])) . "</td>";
                                    echo "<td>" . $row['status'];
                                
                                    if ($row['status'] == 'Pending') {
                                        echo ' <img src="../User/assets/img/time-machine.png" alt="Pending" style="width:16px; height:16px;">';
                                    } elseif ($row['status'] == 'Confirmed') {
                                        echo ' <img src="../User/assets/img/check-mark.png" alt="Confirm" style="width:16px; height:16px;">';
                                    } else {
                                        echo ' <img src="../User/assets/img/cancel.png" alt="Canceled" style="width:16px; height:16px;">';
                                    }
                                
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
                    <!-- Buttons -->
                    <div class="appointment-button-container">
                        <div class="appointment-button-wrapper">
                            <a href="#" class="appointment-button" id="editAppointmentBtn">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <form action="functions/appointment_actions.php" method="POST">
                    <h2>Place an Appointment</h2><br><br>
                    <div class="placeAnAppointment-container">
                        <!-- Left Side -->
                        <div class="container-left">
                            <label for="selectVehicle">Select Vehicle</label>
                            <div class="custom-select-container">
                                <select id="selectVehicle" name="selectVehicle" required>
                                    <option value="" disabled selected>Select a vehicle</option>
                                    <?php
                                        while ($row = mysqli_fetch_assoc($vehicle_query)) {
                                            echo "<option value='{$row['vehicle_id']}'>{$row['license_no']}</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <!-- Right Side -->
                        <div class="container-right">
                            <label for="appointmentDateTime" class="custom-label">Date & Time</label>
                            <input type="datetime-local" id="dateTime" name="dateTime" required>
                        </div>
                    </div><br><br>
                    <!-- Message Box -->
                    <label for="message">Message*</label>
                    <div class="appointmentModal-form-message">
                        <textarea id="message" name="message" rows="4" cols="50" placeholder="Type your message here..."></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="appointment-button-container">
                        <div class="container-button-wrapper">
                            <button type="submit" id="submitModalBtn" name="place_app">Place</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Edit Appointments Modal -->
            <div id="editAppointmentsModal" class="editAppointmentsModal">
                <div class="editAppointmentsModal-content">
                    <span class="close" id="closeEditModal">&times;</span>
                    <h2>Edit Appointments</h2>
                    <hr class="modal-header-line">
                    <table id="modalTable" class="container-table">
                        <thead>
                            <tr>
                                <th>Appointment ID</th>
                                <th>License Plate No</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // Check if the query returned any results
                                if (mysqli_num_rows($modal_query_run) > 0) {
                                    // Loop through the results and create table rows
                                    while ($row = mysqli_fetch_assoc($modal_query_run)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['app_id'] . "</td>";
                                        echo "<td>" . $row['license_no'] . "</td>";
                                        echo "<td>" . $row['app_date'] . "</td>";
                                        echo "<td>" . date('h:i A', strtotime($row['app_time'])) . "</td>";
                                        echo "<td>" . $row['status'];
                                        if ($row['status'] == 'Pending') {
                                            echo ' <img src="../User/assets/img/time-machine.png" alt="Pending" style="width:16px; height:16px;">';
                                        } elseif ($row['status'] == 'Confirmed') {
                                            echo ' <img src="../User/assets/img/check-mark.png" alt="Confirm" style="width:16px; height:16px;">';
                                        }
                                        echo "</td>";
                                        // Add the cancellation form
                                        echo "<td>
                                        <form action='functions/appointment_actions.php' method='POST'>
                                            <input type='hidden' name='app_id' value='" . $row['app_id'] . "'>
                                            <button type='submit' class='cancel-btn'>Cancel<img src='/AutoMobile Project/User/assets/img/Close.png' alt='Cancel' class='cancel-icon'></button>
                                        </form>
                                        </td>";
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
                    <div class="modal-table-footer">
                        <!-- Horizontal line -->
                        <hr class="modal-footer-line">
                        <!-- Buttons -->
                        <div class="editAppointment-button-container">
                            <div class="editAppointment-button-wrapper">
                                <a href="#" class="doneAppointment-button" id="doneAppointmentBtn">Done</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cancel Confirmation Modal -->
            <div id="cancelConfirmationModal" class="cancelConfirmationModal">
                <div class="cancelConfirmation-modal-content">
                    <span class="close" id="closeCancelModal">&times;</span>
                    <div class="warning-icon">
                        <img src="/User/assets/img/Error.png" alt="Warning" style="width:50px;height:50px;">
                    </div>
                    <h3>Do you wish to cancel appointment?</h3>
                    <div class="modal-button-container">
                        <button class="modal-button yes-button" id="yesCancelBtn">YES</button>
                        <button class="modal-button no-button" id="noCancelBtn">NO</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Closing the row , container divs opened in the sidebar -->
    </div>
</div>

    <script src="/AutoMobile Project/User/assets/js/index.js"></script>
    <script src="/AutoMobile Project/User/assets/js/appointment.js"></script>
</body>
</html>