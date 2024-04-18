<?php
include '../helper.php';

// Assuming you receive booking data through POST parameters

// Sample data for demonstration, replace with actual POST data
$user_id = 1; // Assuming you have a user_id associated with the booking
$room_id = 1; // Assuming you have a room_id associated with the booking
$check_in_date = "2024-04-01";
$check_out_date = "2024-04-05";
$total_price = 200.00; // Assuming you calculate the total price based on the booking details

$sql = "INSERT INTO bookings (user_id, room_id, check_in_date, check_out_date, total_price) 
        VALUES ($user_id, $room_id, '$check_in_date', '$check_out_date', $total_price)";

if ($conn->query($sql) === TRUE) {
    echo "Booking created successfully";
    // Here you can implement further logic such as sending confirmation details to the user
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
