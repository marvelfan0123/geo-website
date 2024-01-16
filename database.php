<?php
echo "Submitted...";

$id = $_POST['id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$loc = $_POST['loc'];
// dbconnection
$conn = new mysqli('localhost', 'root', '', 'geo');

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Prepare and execute SQL statement
$stmt = $conn->prepare("INSERT INTO test (id, fname, lname, loc) VALUES (?, ?, ?,?)");

// Check if the statement is prepared successfully
if ($stmt) {
    $stmt->bind_param("ssss", $id, $fname, $lname, $loc);
    $stmt->execute();

    echo "Registered successfully...";
    
    // Close statement
    $stmt->close();
} else {
    echo "Error preparing statement: " . $conn->error;
}

// Close connection
$conn->close();
?>
