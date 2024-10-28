<?php

    $host = "localhost";
    $username = "ennuwelx_admin";
    $password = "@Pdeshan12";
    $database = "ennuwelx_cras_auto";

    $conn = mysqli_connect($host, $username, $password, $database);

    if(!$conn) 
    {
        die("connection failed: ".mysqli_connect_error());
    }
    
?>