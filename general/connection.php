<?php

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'wpproject');

$mysqli = mysqli_connect(HOST, USER, PASS, DB);

// Function to fetch user data from the database
function getUserDataFromDatabase($userId) {
    global $mysqli;
    $userData = array();

    // Prepare and execute query to fetch user data
    $query = "SELECT * FROM users WHERE user_id = ?";
    $stmt = mysqli_prepare($mysqli, $query);
    mysqli_stmt_bind_param($stmt, "i", $userId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Fetch user data as an associative array
    if ($row = mysqli_fetch_assoc($result)) {
        $userData = $row;
    }

    // Close statement and database connection
    mysqli_stmt_close($stmt);

    return $userData;
}

?>
