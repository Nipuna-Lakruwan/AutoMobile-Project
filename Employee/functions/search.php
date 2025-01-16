<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


$mysqli = new mysqli("localhost", "ennuwelx_admin", "@Pdeshan12", "ennuwelx_cras_auto");

if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

if(isset($_REQUEST["term"])) {
    // Prepare the SQL query
    $sql = "SELECT * FROM customer WHERE fname LIKE ? OR lname LIKE ? OR email LIKE ? OR phone LIKE ?";

    if($stmt = $mysqli->prepare($sql)){
        $stmt->bind_param("ssss", $param_term, $param_term, $param_term, $param_term);
        $param_term = $_REQUEST["term"] . '%';

        if($stmt->execute()){
            $result = $stmt->get_result();

            if($result->num_rows > 0){
                while($row = $result->fetch_array(MYSQLI_ASSOC)){
                    echo "<p>" . $row["fname"] . " " . $row["lname"] . "</p>";
                }
            } else {
                echo "<p>No matches found</p>";
            }
        } else {
            echo "ERROR: Could not execute query.";
        }
    } else {
        echo "ERROR: Could not prepare statement.";
    }

    $stmt->close();
}

$mysqli->close();
?>