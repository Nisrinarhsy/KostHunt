<?php
// delete_boarding_house.php

include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['boarding_house_id'])) {
    $boarding_house_id = $_POST['boarding_house_id'];
    
    // Delete the boarding house
    $query = "DELETE FROM boarding_house WHERE boarding_house_id = '$boarding_house_id'";
    $result = mysqli_query($mysqli, $query);

    if ($result) {
        header("Location: dashboard.php");
        exit();
    } else {
        // Handle deletion failure
    }
}
?>
