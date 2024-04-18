<?php
include '../helper.php';

$user_id = $_GET['user_id'];

$sql = "SELECT * FROM users WHERE user_id=$user_id";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo "User not found";
}

$conn->close();
?>
