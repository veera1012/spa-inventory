<?php
$host = 'localhost';
$dbname = 'spa_inventory';
$username = 'root';
$password = '';  // Default password for XAMPP/WAMP

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
