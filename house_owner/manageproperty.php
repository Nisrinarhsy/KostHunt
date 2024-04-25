<?php
session_start();

include "helper.php";

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['role'])) {
    header("Location: ../general/login.php");
    exit();
}

if ($_SESSION['role'] != 'owner') {
    header("Location: ../general/login.php");
    exit();
}


$is_selected_0 = "class='active' style='background-color: #3f3f3f'";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/cb7394df23.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../styling/style.css">    
    <title>Property Management</title>
</head>
<body>  
    <?php include '../general/navbar.php'; ?>
    <div class="content">
        <div class="owner_application">
            <a href="applicant.php" class="btn">View Applications</a>
            <!-- Add House Button -->
            <a href="addroom.php" class="btn">Add House</a>
        </div>
        <div class="boarding-house">
            <h2>Manage Boarding House</h2>
            <div class="item-list" id="boarding-house-list">
            </div>
        </div>
    </div>  
    <?php include '../general/footer.php'; ?>
    <script>
        fetch('../../api/boarding_house/boarding_houses.php')
            .then(response => response.json())
            .then(data => {
                const boardingHouseList = document.getElementById('boarding-house-list');
                let boardingHousesData = data; // Store original data for filtering
                displayBoardingHouses(boardingHousesData);

                function displayBoardingHouses(boardingHouses) {
                    boardingHouseList.innerHTML = ''; // Clear existing items
                    boardingHouses.forEach(boardingHouse => {
                        const item = document.createElement('div');
                        item.classList.add('item');
                        item.innerHTML = `
                            <a href="../house_owner/boarding_house_details.php?house_id=${boardingHouse.boarding_house_id}">
                                <img src="${boardingHouse.image_url}" alt="Accommodation">
                                <div class="short-info">
                                    <h3>${boardingHouse.name}</h3>
                                    <p>${boardingHouse.price}/bulan</p>
                                </div>
                            </a>
                            <div class="item-actions">
                                <button onclick="window.location.href='editroom.php'" title="Edit" class="edit-icon">
                                    <i class="fa-regular fa-bookmark"></i>
                                </button>
                            </div>
                        `;

                        boardingHouseList.appendChild(item);
                    });
                }
            })
            .catch(error => console.error('Error:', error));
    </script>
    <style>
        .item {
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
            padding: 10px;
            display: flex;
            align-items: center;
        }

        .item a {
            text-decoration: none;
            color: #333;
            display: flex;
            align-items: center;
        }

        .item img {
            width: 100px;
            height: 100px;
            margin-right: 10px;
            border-radius: 5px;
        }

        .short-info {
            flex: 1;
        }

        .item-actions {
            margin-left: auto;
        }

        .edit-icon {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .edit-icon:hover {
            background-color: #0056b3;
        }
    </style>
</body>
</html>
