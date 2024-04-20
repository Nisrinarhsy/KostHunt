<?php
// Include connection to the database
include "connection.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are filled
    if (!empty($_POST['name']) && !empty($_POST['address']) && !empty($_FILES['image'])) {
        // Get form data
        $name = $_POST['name'];
        $address = $_POST['address'];

        // File upload
        $targetDirectory = "../uploads/";
        $fileName = basename($_FILES['image']['name']);
        $targetFilePath = $targetDirectory . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            // Upload file to server
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
                // Insert boarding house data into the database
                $insertQuery = "INSERT INTO boarding_house (name, address, image_url) VALUES ('$name', '$address', '$targetFilePath')";
                if (mysqli_query($mysqli, $insertQuery)) {
                    // Boarding house added successfully
                    echo "New boarding house added successfully.";
                } else {
                    // Error inserting data into the database
                    echo "Error: " . $insertQuery . "<br>" . mysqli_error($mysqli);
                }
            } else {
                // Error uploading file
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            // Invalid file format
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }
    } else {
        // Required fields not filled
        echo "Please fill in all required fields.";
    }
} else {
    // Redirect to manage-boarding-house.php if accessed directly without submitting the form
    header("Location: manage-boarding-house.php");
    exit();
}
?>
