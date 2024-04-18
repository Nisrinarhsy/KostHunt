<?php
include '../helper.php';

$room_id = $_GET['room_id'];

// Assuming you receive updated room data through POST parameters

// Sample data for demonstration, replace with actual POST data
$room_number = "102";
$description = "This is an updated description of the room.";

$sql = "UPDATE rooms SET room_number='$room_number', description='$description' WHERE room_id=$room_id";

if ($conn->query($sql) === TRUE) {
    echo "Room updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
