    <?php 
        include '../middleware/usermiddleware.php';
        include 'includes/header.php';
        include 'includes/subheader.php';
        include 'includes/sidebar.php';
        include '../config/dbconnection.php';
        include '../functions/alert.php';

        $cus_id = $_SESSION['auth_user']['userId'];

        // Prepare the SQL statement
        $stmt = $conn->prepare("SELECT vehicle_id, category, model, company, license_no FROM vehicle WHERE cus_id = ?");
        $stmt->bind_param("i", $cus_id); // Assuming cus_id is an integer
        $stmt->execute(); // Execute the statement
        $query_run = $stmt->get_result(); // Get the result
    ?>
    <link rel="stylesheet" href="/AutoMobile Project/User/assets/css/vehicle.css">
    
    <div class="col-md-9 flex-grow-1 p-3">
        <div class="text-center">
            <div class="container">
                <h2>My Vehicles</h2>
                <table id="meetingsTable">
                    <thead>
                        <tr>
                            <th>Vehicle ID</th>
                            <th>Category</th>
                            <th>Model</th>
                            <th>Company</th>
                            <th>License Plate</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // Check if the query returned any results
                            if (mysqli_num_rows($query_run) > 0) {
                                // Loop through the results and create table rows
                                while ($row = mysqli_fetch_assoc($query_run)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['vehicle_id'] . "</td>";
                                    echo "<td>" . $row['category'] . "</td>";
                                    echo "<td>" . $row['model'] . "</td>";
                                    echo "<td>" . $row['company'] . "</td>";
                                    echo "<td>" . $row['license_no'] . "</td>";
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
                    <!-- Buttons -->
                    <div class="vehicle-button-container">
                        <div class="vehicle-button-wrapper">
                            <a href="#" class="vehicle-button" id="addVehicleBtn">Add a Vehicle</a>
                        </div>
                        <div class="vehicle-button-wrapper">
                            <a href="#" class="vehicle-button" id="editVehicleBtn"> Edit Vehicle </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Vehicle Modal -->
    <div id="addVehicleModal" class="addVehicleModal">
        <div class="addVehicleModal-content">
            <span class="close" id="closeAddModal">&times;</span>
            <h2>ADD A VEHICLE</h2>
            <!-- Horizontal line -->
            <hr class="modal-footer-line">
            <form action="functions/addvehicle.php" method="POST">
                <div class="addVehicleModal-form-container">
                    <!-- Left Side -->
                    <div class="modal-form-left">
                        <label for="company">Company</label>
                        <input type="text" id="company" name="company" required>

                        <label for="model">Model</label>
                        <input type="text" id="model" name="model" required>

                        <label for="manufacturedYear">Manufactured Year</label>
                        <input type="text" id="manufacturedYear" name="manufacturedYear" required>

                        <label for="category">Category</label>
                        <input type="text" id="category" name="category" required>
                    </div>

                    <!-- Right Side -->
                    <div class="modal-form-right">
                        <label for="licensePlateNo">License Plate No</label>
                        <input type="text" id="licensePlateNo" name="licensePlateNo" required>

                        <label for="engineNo">Engine No</label>
                        <input type="text" id="engineNo" name="engineNo" required>

                        <label for="chassisNo">Chassis No</label>
                        <input type="text" id="chassisNo" name="chassisNo" required>

                    </div>
                </div>

                <!-- Submit Button -->
                <div class="vehicle-button-container">
                    <div class="modal-button-wrapper">
                        <button type="submit" id="submitModalBtn" name="add_vehicle">add vehicle</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Vehicle Modal -->
    <div id="editVehicleModal" class="addVehicleModal">
        <div class="addVehicleModal-content">
            <span class="close" id="closeEditModal">&times;</span>
            <h2>Edit Vehicle</h2>
            <!-- Horizontal line -->
            <hr class="modal-footer-line">
            <form action="functions/addvehicle.php" method="POST">
                <div class="addVehicleModal-form-container">
                    <!-- Left Side -->
                    <div class="modal-form-left">
                        <label for="selectVehicle">Select Vehicle</label>
                        <div class="custom-select-container">
                            <select id="selectVehicle" name="selectVehicle" required>
                                <option value="" disabled selected>Select a vehicle</option>
                                <?php
                                    mysqli_data_seek($query_run, 0); // Reset the pointer to reuse the result set
                                    while ($row = mysqli_fetch_assoc($query_run)) {
                                        echo "<option value='{$row['vehicle_id']}'>{$row['license_no']}</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <label for="editCompany">Company</label>
                        <input type="text" id="editCompany" name="editCompany" required>

                        <label for="editModel">Model</label>
                        <input type="text" id="editModel" name="editModel" required>

                        <label for="editManufacturedYear">Manufactured Year</label>
                        <input type="text" id="editManufacturedYear" name="editManufacturedYear" required>


                    </div>

                    <!-- Right Side -->
                    <div class="modal-form-right">
                        <label for="editCategory">Category</label>
                        <input type="text" id="editCategory" name="editCategory" required>

                        <label for="editLicensePlateNo">License Plate No</label>
                        <input type="text" id="editLicensePlateNo" name="editLicensePlateNo" required>

                        <label for="editEngineNo">Engine No</label>
                        <input type="text" id="editEngineNo" name="editEngineNo" required>

                        <label for="editChassisNo">Chassis No</label>
                        <input type="text" id="editChassisNo" name="editChassisNo" required>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="vehicle-button-container">
                    <div class="modal-button-wrapper">
                        <button type="submit" id="submitModalBtn" name="edit_vehicle">update</button>
                    </div>
                </div>
                </div>
            </form>
        </div>
    </div>
<!-- Closing the row , container divs opened in the sidebar -->
    </div>
</div>
    
    <script src="/AutoMobile Project/User/assets/js/index.js"></script>
    <script src="/AutoMobile Project/User/assets/js/vehicle.js"></script>
</body>
</html>