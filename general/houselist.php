<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Houselist</title>
    <link rel="stylesheet" type="text/css" href="../styling/style.css">    
</head>
<body>  
    <?php include 'navbar.php'; ?>
    <div class="content">
    <input type="text" placeholder="Search..." class="searchbar">
    <div class="boarding-house">
        <div class="item-list">
            <div class="item">
                <a href="indvroom.php">
                    <img src="https://placehold.co/300x200" alt="Accommodation">
                    <div class="short-info">
                        <h3>Kost abc</h3>
                         <p>Rp1.500.000/bulan</p>
                    </div>
                </a>
                <div class="item-actions">
                    <button onclick="window.location.href='editroom.php'" title="Edit" class="edit-icon">
                        <i class="fa-solid fa-pen-to-square"></i>
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
</div>
    <?php include '../general/footer.php'; ?>
</body>
</html>
