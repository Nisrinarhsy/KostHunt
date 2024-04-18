<?php
include '../helper.php';

$room_id = $_GET['room_id'];

$sql = "SELECT * FROM rooms WHERE room_id=$room_id";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo "Room not found";
}

$conn->close();
?>
