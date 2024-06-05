<?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'bookart';

    // Create a database connection
    $connection = mysqli_connect($host, $username, $password, $database);

    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>