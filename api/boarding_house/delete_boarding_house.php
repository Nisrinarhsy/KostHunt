<?php
include '../helper.php';

$house_id = $_GET['house_id'];

$sql = "DELETE FROM boarding_houses WHERE house_id=$house_id";

if ($conn->query($sql) === TRUE) {
    echo "Boarding house deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
