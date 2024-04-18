<?php
include '../helper.php';

$sql = "SELECT * FROM rooms";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $rooms = array();
    while ($row = $result->fetch_assoc()) {
        $rooms[] = $row;
    }
    echo json_encode($rooms);
} else {
    echo "No rooms found";
}

$conn->close();
?>
