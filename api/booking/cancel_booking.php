<?php
include '../helper.php';

$booking_id = $_GET['booking_id']; 

$sql = "DELETE FROM bookings WHERE booking_id=$booking_id";

if ($conn->query($sql) === TRUE) {
    echo "Booking canceled successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
