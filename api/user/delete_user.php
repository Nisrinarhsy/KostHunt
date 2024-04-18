<?php
include '../helper.php';

$user_id = $_GET['user_id'];

$sql = "DELETE FROM users WHERE user_id=$user_id";

if ($conn->query($sql) === TRUE) {
    echo "User deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
