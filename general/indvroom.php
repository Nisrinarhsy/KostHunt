<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="SUHouse\styling\style.css"> 
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="content">
        <div class="roominfo">
            <div class="pict">
            <img src="https://via.placeholder.com/350x250" alt="Placeholder Image">
            </div>
            <div class="desc">
                <div class="deschead">
                <h2>room name</h2>
                <a href="https://api.whatsapp.com/send?phone=YOUR_HOMEOWNER_PHONE_NUMBER" class="contact-btn btn">
                    Contact Homeowner
                </a>                </div>
            <p>room price</p><br>
            <p>description</p>
            </div>
        </div>
    </div>
</body>
</html>
