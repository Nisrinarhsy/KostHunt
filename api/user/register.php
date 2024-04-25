<?php
session_start();
include '../helper.php';

header('Content-Type: application/json'); // Set the content type of the response to JSON

$response = array();

// $_POST['username'] = 'a';// Create an array to hold the response data
// $_POST['name'] = 'a';// Create an array to hold the response data
// $_POST['email'] = 'a';// Create an array to hold the response data
// $_POST['contact_number'] = 'a';// Create an array to hold the response data
// $_POST['user_type'] = 'a';// Create an array to hold the response data
// $_POST['gender'] = 'a';// Create an array to hold the response data


if (
    isset($_POST['username']) && 
    isset($_POST['name']) && 
    isset($_POST['email']) && 
    isset($_POST['password']) && 
    isset($_POST['contact_number']) && 
    isset($_POST['user_type']) && 
    isset($_POST['gender'])
) {
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $contact_number = $_POST['contact_number'];
    $user_type = $_POST['user_type'];
    $address = isset($_POST['address']) ? $_POST['address'] : null;
    $gender = $_POST['gender'];

    // Check if username already exists
    $check_username_sql = "SELECT * FROM users WHERE username='$username'";
    $result_username = $conn->query($check_username_sql);
    if ($result_username->num_rows > 0) {
        $response['status'] = "error";
        $response['message'] = "Username already exists";
        echo json_encode($response);
        exit();
    }

    // Check if email already exists
    $check_email_sql = "SELECT * FROM users WHERE email='$email'";
    $result_email = $conn->query($check_email_sql);
    if ($result_email->num_rows > 0) {
        $response['status'] = "error";
        $response['message'] = "Email already exists";
        echo json_encode($response);
        exit();
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Perform database insertion
    $insert_sql = "INSERT INTO users (username, name, email, password, contact_number, user_type, address, gender) 
                    VALUES ('$username', '$name', '$email', '$hashed_password', '$contact_number', '$user_type', '$address', '$gender')";
    if ($conn->query($insert_sql) === TRUE) {
        $response['status'] = "success";
        $response['message'] = "Registration successful";
        echo json_encode($response);
    } else {
        $response['status'] = "error";
        $response['message'] = "Error executing query: " . $conn->error;
        echo json_encode($response);
    }
} else {
    $response['status'] = "error";
    $response['message'] = "All fields are required";
    echo json_encode($response);
}

$conn->close();
?>
