<?php
// edit_boarding_house.php

include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['boarding_house_id'])) {
    $boarding_house_id = $_POST['boarding_house_id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    
    // Update the boarding house
    $query = "UPDATE boarding_house SET name = '$name', address = '$address' WHERE boarding_house_id = '$boarding_house_id'";
    $result = mysqli_query($mysqli, $query);

    if ($result) {
        header("Location: dashboard.php");
        exit();
    } else {
        // Handle update failure
    }
}
?>
