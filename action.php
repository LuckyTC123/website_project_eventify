<?php
// Database configuration
$host = 'localhost';      // Database host
$user = 'master';   // Database username
$pass = '12345678';   // Database password
$db   = 'formdata';   // Database name

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Example: Assuming your form sends 'name' and 'email' fields via POST
$name  = isset($_POST['name']) ? $conn->real_escape_string($_POST['name']) : '';
$state = isset($_POST['state']) ? $conn->real_escape_string($_POST['state']) : '';
$district = isset($_POST['district']) ? $conn->real_escape_string($_POST['district']) : '';
$city = isset($_POST['city']) ? $conn->real_escape_string($_POST['city']) : '';
$venue = isset($_POST['venue']) ? $conn->real_escape_string($_POST['venue']) : '';
$email = isset($_POST['email']) ? $conn->real_escape_string($_POST['email']) : '';
$phone = isset($_POST['phone']) ? $conn->real_escape_string($_POST['phone']) : '';
$event_type = isset($_POST['event_type']) ? $conn->real_escape_string($_POST['event_type']) : '';
$date = isset($_POST['date']) ? $conn->real_escape_string($_POST['date']) : '';
$guests = isset($_POST['guests']) ? $conn->real_escape_string($_POST['guests']) : '';
$message = isset($_POST['message']) ? $conn->real_escape_string($_POST['message']) : '';

// Insert data into your table (replace 'users' with your table name)
$sql = "INSERT INTO myform (name, email,state,district,city,venue,phone,date,message,event_type,guests) VALUES ('$name', '$email', '$state', '$district', '$city', '$venue', '$phone', '$date', '$message', '$event_type', '$guests')";

if ($conn->query($sql) === TRUE) {
    echo "Data submitted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>