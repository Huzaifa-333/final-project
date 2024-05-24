<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $message = $_POST['message'];

   // Prepare the SQL statement with placeholders
   $stmt = $conn->prepare("INSERT INTO gym (name, email, address, message) VALUES (?, ?, ?, ?)");
    
   // Bind the actual values to the placeholders
   $stmt->bind_param("ssss", $name, $email, $address, $message);

   // Execute the statement
   if ($stmt->execute()) {
       // Redirect to request_dashboard.php after successful insertion
       header("Location: mydashboard.php");
       exit();
   } else {
       echo "Error: " . $stmt->error;
   }
   

   // Close the statement
   $stmt->close();
}

// Close the connection
$conn->close();
?>
