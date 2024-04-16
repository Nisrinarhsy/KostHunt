<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/cb7394df23.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../styling/style.css">    
    <title>Bookmarks</title>
</head>
<body>  
    <?php include '../general/navbar.php'; ?>
    <div class="content">
        <div class="boarding-house">
            <h2>Kos a</h2>
            <div class="item-list">
                <div class="item">
                    <a href="indvroom.php">
                    <img src="https://placehold.co/300x200" alt="Accommodation">
                    <div class="short-info">
                        <h3>Kost abc</h3>
                        <p>Rp1.500.000/bulan</p>
                    </div></a>
                    <div class="item-actions">
                        <button onclick="window.location.href='editroom.php'" title="Edit" class="edit-icon">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        <button onclick="window.location.href='#'" title="Delete" class="delete-icon">
                            <i class="fa-regular fa-trash-can"></i>
                        </button>
                    </div>
                </div>
                <a class="item">
                <img src="https://placehold.co/300x200" alt="Accommodation">
                    <div class="short-info">
                        <h3>Kost abc</h3>
                        <p>Rp1.500.000/bulan</p>
                    </div>
                </a>
                <a class="item">
                <img src="https://placehold.co/300x200" alt="Accommodation">
                    <div class="short-info">
                        <h3>Kost abc</h3>
                        <p>Rp1.500.000/bulan</p>
                    </div>
                </a> 
                <a class="item">
                <img src="https://placehold.co/300x200" alt="Accommodation">
                    <div class="short-info">
                        <h3>Kost abc</h3>
                        <p>Rp1.500.000/bulan</p>
                    </div>
                </a>
            </div>
        </div>
    </div>  
    <?php include '../general/footer.php'; ?>
</body>
</html>
