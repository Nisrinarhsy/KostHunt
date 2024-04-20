<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Houselist</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-VC1LKgx/z32CVwugL3VMSNEwdqff0TANnPYRVgOmz4JcifIpoY+IwcuYf+q7hY9xG2Hvr3yxEY+UvC0ntINOKQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="../styling/style.css">
    <style>
        /* Additional CSS for layout */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .content {
            padding: 20px;
        }

        .searchbar {
            width: 70%;
            padding: 10px;
            margin-top:20px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        #boarding-house-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .item {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
        }

        .item img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .short-info {
            margin-top: 10px;
        }

        .short-info h3 {
            margin: 0;
            font-size: 18px;
        }

        .short-info p {
            margin: 5px 0 0;
            font-size: 16px;
            color: #666;
        }

        .item-actions {
            margin-top: 10px;
            text-align: right;
        }

        .edit-icon {
            background-color: black;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="content">
        <input type="text" placeholder="Search by name" class="searchbar">
        <div class="boarding-house" id="boarding-house-list">
            <!-- Boarding houses will be dynamically added here -->
        </div>
    </div>

    <?php include '../general/footer.php'; ?>

    <script>
        // Fetch boarding houses data from the API
        fetch('../../api/boarding_house/boarding_houses.php')
            .then(response => response.json())
            .then(data => {
                const boardingHouseList = document.getElementById('boarding-house-list');
                let boardingHousesData = data; // Store original data for filtering
                displayBoardingHouses(boardingHousesData);

                // Search functionality
                const searchInput = document.querySelector('.searchbar');
                searchInput.addEventListener('input', function() {
                    const searchTerm = this.value.toLowerCase();
                    const filteredBoardingHouses = boardingHousesData.filter(boardingHouse => boardingHouse.name.toLowerCase().includes(searchTerm));
                    displayBoardingHouses(filteredBoardingHouses);
                });

                function displayBoardingHouses(boardingHouses) {
                    boardingHouseList.innerHTML = ''; // Clear existing items
                    boardingHouses.forEach(boardingHouse => {
                        const item = document.createElement('div');
                        item.classList.add('item');
                        // Add onclick event to redirect to indvroom.php with the boarding house ID
                        item.innerHTML = `
                            <a href="indvroom.php?house_id=${boardingHouse.boarding_house_id}">
                            <div class="img-container">
                                <img src="${boardingHouse.image_url}" alt="BoardingHouse">
                            </div>
                                <div class="short-info">
                                    <h3>${boardingHouse.name}</h3>
                                    <p>${boardingHouse.price}/bulan</p>
                                </div>
                            </a>
                        `;
                        boardingHouseList.appendChild(item);
                
                    });
                }
            })
            .catch(error => console.error('Error:', error));
    </script>
</body>
</html>
