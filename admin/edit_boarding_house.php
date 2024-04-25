<?php
// edit_boarding_house.php

include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['boarding_house_id'])) {
    $boarding_house_id = $_POST['boarding_house_id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    
    // Handle file upload
    $targetDir = "../uploads/"; // Directory where uploaded images will be stored
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            // Update the boarding house with the image URL
            $image_url = $targetFile; // You may need to modify this depending on how you store the URLs
            $query = "UPDATE boarding_house SET name = '$name', address = '$address', image_url = '$image_url' WHERE boarding_house_id = '$boarding_house_id'";
            $result = mysqli_query($mysqli, $query);

            if ($result) {
                header("Location: manage-boarding-house.php");
                exit();
            } else {
                // Handle update failure
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
