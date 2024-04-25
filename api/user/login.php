<?php
session_start();
include '../helper.php';

header('Content-Type: application/json'); // Set the content type of the response to JSON

if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result) {
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if ($row['status'] == 'active' && password_verify($password, $row['password'])) {
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $row['user_type'];
                echo json_encode(["message" => "Login successful", "status" => "success"]);
            } else {
                echo json_encode(["message" => "Incorrect username or password or inactive account", "status" => "error"]);
            }
        } else {
            echo json_encode(["message" => "User not found", "status" => "error"]);
        }
    } else {
        echo json_encode(["message" => "Error executing query: " . $conn->error, "status" => "error"]);
    }
} else {
    echo json_encode(["message" => "Username or password not provided", "status" => "error"]);
}

$conn->close();
?>
