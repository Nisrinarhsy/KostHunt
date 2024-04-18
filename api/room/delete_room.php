<?php
include '../helper.php';

$room_id = $_GET['room_id'];

$sql = "DELETE FROM rooms WHERE room_id=$room_id";

if ($conn->query($sql) === TRUE) {
    echo "Room deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
