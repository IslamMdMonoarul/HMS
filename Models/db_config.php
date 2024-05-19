<?php

// models/db_config.php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Return the connection object
return $conn;
