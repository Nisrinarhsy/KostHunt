<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boarding House Details</title>
    <link rel="stylesheet" type="text/css" href="../styling/style.css">
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="content">
        <?php
        include "../admin/connection.php";

        // Fetch the data based on the query string variable, which in this case is the house_id
        $house_id = $_GET['house_id'];

        // Select data from the database table
        $select_house_query = "SELECT * FROM boarding_house WHERE boarding_house_id = '$house_id'";
        $select_house_result = mysqli_query($mysqli, $select_house_query);
        $total_rows = mysqli_num_rows($select_house_result);

        // If the data exists, show it
        if ($total_rows > 0) {
            $boarding_house = mysqli_fetch_assoc($select_house_result);
        ?>
        <div class="roominfo">
            <div class="room-pict">
                <img src="<?php echo $boarding_house['image_url']; ?>" alt="<?php echo $boarding_house['name']; ?>">
            </div>
            <div class="description">
                <div class="deschead">
                        <h2><?php echo $boarding_house['name']; ?></h2>
                        <p><?php echo number_format($boarding_house['price'], 2); ?></p>           
                </div>
            <p><?php echo $boarding_house['address']; ?></p>
            <p><?php echo $boarding_house['description']; ?></p>
            </div>
            <div class="buttons">
                <a href="https://api.whatsapp.com/send?phone=YOUR_PHONE_NUMBER_HERE&text=I%20want%20to%20book%20the%20boarding%20house%20<?php echo $boarding_house['name']; ?>" class="btn">Contact Owner</a>
                <a href="#" class="btn">Apply Room</a>
                <a href="#" class="btn">Bookmark</a>
            </div>
        </div>
        <?php
        } else {
            echo "<p>No boarding house found with the given ID.</p>";
        }
        ?>
    </div>
    <?php include '../general/footer.php'; ?>
</body>
</html>
