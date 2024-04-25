<?php
session_start();

include "connection.php";

// Check if the user is logged in and is an admin
if (!isset($_SESSION['account_id']) || $_SESSION['role'] !== 'admin') {
    http_response_code(403);
    echo "Access forbidden";
    exit();
}

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the user ID and new user type from the request
    $user_id = $_POST['user_id'];
    $new_role = $_POST['new_role'];

    // Update the user type in the database
    $query = "UPDATE users SET user_type = ? WHERE user_id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("si", $new_role, $user_id);
    
    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    // If the request method is not POST, return an error
    http_response_code(405);
    echo "Method Not Allowed";
}
?>
