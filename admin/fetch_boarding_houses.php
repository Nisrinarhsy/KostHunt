<?php
// Include the database connection file
include "connection.php";

// Fetch boarding houses from the database
$query = "SELECT * FROM boarding_house";
$result = mysqli_query($conn, $query);

// Check if there are any boarding houses
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Display boarding house details
        echo '<div>';
        echo '<span>' . $row['name'] . ' - ' . $row['address'] . '</span>';
        echo '<button class="edit-boarding-house" data-id="' . $row['boarding_house_id'] . '">Edit</button>';
        echo '<button class="delete-boarding-house" data-id="' . $row['boarding_house_id'] . '">Delete</button>';
        echo '</div>';
    }
} else {
    echo "No boarding houses found.";
}
?>
