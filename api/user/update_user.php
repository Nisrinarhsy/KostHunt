<?php
include '../helper.php';

if ($_SERVER["REQUEST_METHOD"] == "PUT"){
    $data = json_decode(file_get_contents("php://input"), true);

    $user_id = $data['user_id'];
    $name = $data['name'];
    $contact_number =$data['contact_number'];
    $user_type = $data['user_type'];
    $address = $data['address'];
    $date_of_birth = $data['date_of_birth'];
    $gender = $data['gender'];
    $bio = $data['bio'];

    $sql = "UPDATE users SET name='$name', contact_number='$contact_number', user_type='$user_type', address='$address', date_of_birth='$date_of_birth', gender='$gender', bio='$bio' WHERE user_id=$user_id";

    if ($conn->query($sql) === TRUE) {
        echo "User updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


}

$conn->close();
?>
