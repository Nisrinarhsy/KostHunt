<?php
include '../helper.php';

$user_id = $_GET['user_id']; 

$sql = "SELECT * FROM bookings WHERE user_id=$user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $bookings = array();
    while ($row = $result->fetch_assoc()) {
        $bookings[] = $row;
    }
    echo json_encode($bookings);
} else {
    echo "No bookings found";
}

$conn->close();
?>
