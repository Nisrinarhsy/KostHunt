<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boarding House Details</title>
    <link rel="stylesheet" type="text/css" href="../styling/style.css">
    <style>
        /* Additional CSS styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .content {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .boarding-house-details {
            margin-bottom: 20px;
            margin-top: 50px;
        }

        /* Adjust image size */
        .boarding-house-details img {
            max-width: 30%;
            height: auto;
            display: block;
            margin: 0 auto; /* Center the image */
        }

        .back-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: #24147a;
        }

        /* WhatsApp button */
        .whatsapp-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #25d366;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .whatsapp-button:hover {
            background-color: ;
        }
    </style>
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
        <div class="boarding-house-details">
            <h2><?php echo $boarding_house['name']; ?></h2>
            <img src="<?php echo $boarding_house['image_url']; ?>" alt="<?php echo $boarding_house['name']; ?>">
            <p><?php echo $boarding_house['address']; ?></p>
            <p>Price: <?php echo number_format($boarding_house['price'], 2); ?></p>
            <p>Description: <?php echo $boarding_house['description']; ?></p>
            <!-- WhatsApp button -->
            <a href="https://api.whatsapp.com/send?phone=YOUR_PHONE_NUMBER_HERE&text=I%20want%20to%20book%20the%20boarding%20house%20<?php echo $boarding_house['name']; ?>" class="whatsapp-button">Book Now on WhatsApp</a>
        </div>

        <?php
        } else {
            echo "<p>No boarding house found with the given ID.</p>";
        }
        ?>
        <!-- Back button with icon -->
        <a href="javascript:history.back()" class="back-button"><i class="fas fa-arrow-left"></i> Back</a>
    </div>

    <?php include '../general/footer.php'; ?>
</body>
</html>
