<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookmarks</title>
    <script src="https://kit.fontawesome.com/cb7394df23.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../styling/style.css">    
</head>
<body>  
    <?php include '../general/navbar.php'; ?>
    <div class="content">
        <input type="text" placeholder="Search..." class="searchbar">
        <div class="bookmark-list">
            <div class="bookmark">
                <a href="indvroom.php">
                    <div class="img">
                        <img src="https://placehold.co/300x200" alt="Accommodation">
                    </div>
                    <div class="bookmark-info">
                        <h3>Kost abc</h3>
                        <p>Rp1.500.000/bulan</p>
                    </div>
                    <div class="bookmark-actions">
                        <button onclick="window.location.href='#'" title="Delete" class="delete-icon">
                            <i class="fa-regular fa-trash-can"></i>
                        </button>
                        <button onclick="window.location.href='#'" title="apply" class="apply-icon">
                            <i class="fa-solid fa-house-circle-check"></i>
                        </button>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <?php include '../general/footer.php'; ?>
</body>
</html>
