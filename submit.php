<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "test2";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // If form is submitted
  if($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and bind statement
    $stmt = $conn->prepare("INSERT INTO user (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $password);

    // Execute statement
    if($stmt->execute()){
      echo "Registration successfully...";
    } else{
      echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    mysqli_close($conn);
  }
?>
