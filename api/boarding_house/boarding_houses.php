<?php
include '../helper.php';

$sql = "SELECT * FROM boarding_house";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $boarding_houses = array();
    while ($row = $result->fetch_assoc()) {
        $boarding_houses[] = $row;
    }
    echo json_encode($boarding_houses);
} else {
    echo "No boarding houses found";
}

$conn->close();
?>
