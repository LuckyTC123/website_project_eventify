<?php
// Database configuration
define("DB_HOST", "localhost");  // Your database host (usually localhost on XAMPP)
define("DB_USER", "master");       // Your database username (default: root)
define("DB_PASS", "12345678");           // Your database password (default: empty for XAMPP)
define("DB_NAME", "formdata");    // Your database name (use the name of your created database)

// Create a connection to the database
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>