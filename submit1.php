<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get input values from the form
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Insert input values into the database table
$sql = "INSERT INTO contact (name, email, message)
VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
  echo "Data inserted successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close database connection
$conn->close();
?>
