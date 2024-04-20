<?php
session_start();

include "connection.php";

// Check if the user is logged in and is an admin
if (!isset($_SESSION['account_id']) || $_SESSION['user_type'] !== 'admin') {
    http_response_code(403);
    echo "Access forbidden";
    exit();
}

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the user ID from the request
    $user_id = $_POST['user_id'];

    // Delete the user from the database
    $query = "DELETE FROM users WHERE user_id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $user_id);
    
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
