<?php
// Database connection
include '../config/mysqli_connect.php'; 

// Query to reset the auto-increment ID
$sql = "ALTER TABLE cust_users AUTO_INCREMENT = 1";

// Execute the query
if ($dbc->query($sql) === TRUE) {
    header("Location: delete.php");
    exit;
} else {
    echo "Error resetting auto-increment ID: " . $dbc->error;
}

// Close connection
$dbc->close();
?>
