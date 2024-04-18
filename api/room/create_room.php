<?php
include '../helper.php';

// Assuming you receive room data through POST parameters

// Sample data for demonstration, replace with actual POST data
$house_id = 1; // Assuming you have a house_id associated with the room
$room_number = "101";
$description = "This is a sample room in the boarding house.";

$sql = "INSERT INTO rooms (house_id, room_number, description) VALUES ($house_id, '$room_number', '$description')";

if ($conn->query($sql) === TRUE) {
    echo "Room created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
