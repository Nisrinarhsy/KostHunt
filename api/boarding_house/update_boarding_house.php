<?php
include '../helper.php';

// Check if the request method is PUT
if ($_SERVER["REQUEST_METHOD"] == "PUT") {
    // Get the data from the request body
    $data = json_decode(file_get_contents("php://input"), true);

    // Check if JSON decoding was successful
    if ($data === null) {
        http_response_code(400); // Bad Request
        echo "Error: Invalid JSON data";
        exit;
    }

    // Check if required fields are present
    if (!isset($data['boarding_house_id']) || !isset($data['name']) || !isset($data['address'])) {
        http_response_code(400); // Bad Request
        echo "Error: Missing required fields";
        exit;
    }

    // Extract the data
    $boarding_house_id = $data['boarding_house_id'];
    $name = $data['name'];
    $address = $data['address'];

    // Prepare and execute the SQL query
    $sql = "UPDATE boarding_house SET name='$name', address='$address' WHERE boarding_house_id='$boarding_house_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Boarding house updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    http_response_code(405); // Method Not Allowed
    echo "Invalid request method";
}
?>
