<?php
// Include the database connection file
include "connection.php";

if (isset($_POST['house_id'])) {
    $houseId = $_POST['house_id'];
    
    // Delete the boarding house from the database
    $query = "DELETE FROM boarding_house WHERE boarding_house_id = $houseId";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        echo "Boarding house deleted successfully.";
    } else {
        echo "Error deleting boarding house: " . mysqli_error($conn);
    }
}
?>
