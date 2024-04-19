<?php
include '../helper.php';

header('Content-Type: application/json'); // Set the content type of the response to JSON

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    $username = $data['username'];
    $email = $data['email'];

    // Check if username or email already exists
    $checkQuery = "SELECT * FROM users WHERE username='$username' OR email='$email'";
    $result = mysqli_query($conn, $checkQuery);
    if (mysqli_num_rows($result) > 0) {
        echo json_encode(["message" => "Username or email already exists", "status" => "error"]);
    } else {
        // Proceed with registration
        // Retrieve other registration data from $data array
        $name = $data['name'];
        $password = $data['password'];
        $contact_number = $data['contact_number'];
        $user_type = $data['user_type'];
        $address = $data['address'];
        $gender = $data['gender'];
        // Insert new user into the database
        $insertQuery = "INSERT INTO users (username, email, name, password, contact_number, user_type, address, gender) VALUES ('$username', '$email', '$name', '$password', '$contact_number', '$user_type', '$address', '$gender')";
        if (mysqli_query($conn, $insertQuery)) {
            echo json_encode(["message" => "User registered successfully", "status" => "success"]);
        } else {
            echo json_encode(["message" => "Error registering user", "status" => "error"]);
        }
    }
} else {
    echo json_encode(["message" => "Invalid request method", "status" => "error"]);
}

$conn->close();
?>
