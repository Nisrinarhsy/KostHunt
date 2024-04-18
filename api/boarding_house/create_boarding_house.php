<?php
include '../helper.php';

$name = $_POST['name'];
$address = $_POST['address'];
$owner_id = $_POST['owner_id'];

$sql = "INSERT INTO boarding_house (name, address, owner_id) VALUES ('$name', '$address', '$owner_id')";

if ($conn->query($sql) === TRUE) {
    echo "Boarding house created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
