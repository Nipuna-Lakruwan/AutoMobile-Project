<?php
include 'includes/header.php';
include 'includes/navbar.php';
include '../config/dbconnection.php';
?>

<div class="navcontainer">
    <div class="item back">
        <h2 class="clickable" onclick="redirectTo('billingOptions.php')">
            <i class="fa-solid fa-chevron-left fa-lg" style="color: #952B1A;"></i>
            Back
        </h2>
    </div>
    <div class="item home">
        <h2 class="clickable" onclick="redirectTo('home.php')">Home</h2>
    </div>
    <div class="item name">
        <h2>Pending Appointments</h2>
        <hr>
    </div>
</div>

<div class="main-container">
    <table id="appointmentsTable">
        <thead>
            <tr>
                <th>App ID</th>
                <th>Date</th>
                <th>Time</th>
                <th>Type</th>
                <th>Message</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM appointment WHERE status = 'Pending'";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['app_id'] . "</td>";
                    echo "<td>" . $row['app_date'] . "</td>";
                    echo "<td>" . $row['app_time'] . "</td>";
                    echo "<td>" . $row['activity_type'] . "</td>";
                    echo "<td>" . $row['message'] . "</td>";
                    echo "<td><button class='btn' onclick='redirectToBilling(" . $row['app_id'] . ")'>Bill</button></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No pending appointments found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<script src="/AutoMobile Project/Employee/assets/js/script.js"></script>
<script>
    function redirectToBilling(appId) {
        window.location.href = 'billing.php?appId=' + appId;
    }
</script>

<style>
    .main-container {
        padding: 20px;
    }

    #appointmentsTable {
        width: 100%;
        border-collapse: collapse;
    }

    #appointmentsTable th, #appointmentsTable td {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #appointmentsTable th {
        background-color: #f2f2f2;
        text-align: left;
    }

    .btn {
        padding: 5px 10px;
        background-color: #952B1A;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
</style>

</body>
</html>