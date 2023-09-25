<?php
$db_host = 'localhost'; // Replace with your database host
$db_user = 'root'; // Replace with your MySQL username
$db_password = ''; // Replace with your MySQL password
$db_name = 'festivaldb'; // Replace with your database name

// Create a database connection
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>