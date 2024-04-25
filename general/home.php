<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="../styling/style.css">    
</head>
<body>
    <?php include '../general/navbar.php'; ?>
    <div class="content">
        <div class="homecontent">
            <h2>Welcome to your gateway to exceptional university living</h2>
            <p>Discover your ideal home-away-from-home where community and comfort converge.</p>
            <a href="houselist.php" class="btn">Browse Available Housing</a>
        </div>
    </div>
    <?php include '../general/footer.php'; ?>
</body>
</html>
