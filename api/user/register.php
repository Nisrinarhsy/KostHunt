<?php
include '../helper.php';

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$email = $_POST['email'];
$name = $_POST['name'];
$contact_number = $_POST['contact_number'];
$user_type = $_POST['user_type'];
$address = $_POST['address'];
$date_of_birth = $_POST['date_of_birth'];
$gender = $_POST['gender'];
$bio = $_POST['bio'];

$sql = "INSERT INTO users (username, password, email, name, contact_number, user_type, address, date_of_birth, gender, bio, registration_date, status) VALUES ('$username', '$password', '$email', '$name', '$contact_number', '$user_type', '$address', '$date_of_birth', '$gender', '$bio', NOW(), 'active')";

if ($conn->query($sql) === TRUE) {
    echo "User registered successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
