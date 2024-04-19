<?php
include '../helper.php';

// Check if house_id is provided
if(isset($_GET['house_id'])) {
    $house_id = $_GET['house_id'];

    $sql = "SELECT * FROM boarding_house WHERE house_id=$house_id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo "Boarding house not found";
    }
} else {
    echo "House ID parameter is missing";
}

$conn->close();
?>
