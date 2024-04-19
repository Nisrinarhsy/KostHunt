<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boarding House Details</title>
    <script src="https://kit.fontawesome.com/cb7394df23.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../styling/style.css">    
</head>
<body>  
    <?php include 'navbar.php'; ?>
    <div class="content">
        <div class="boarding-house-details" id="boarding-house-details">
            <!-- Boarding house details will be dynamically added here -->
        </div>
    </div>

    <?php include '../general/footer.php'; ?>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const boardingHouseDetails = document.getElementById('boarding-house-details');
            const urlParams = new URLSearchParams(window.location.search);
            const houseId = urlParams.get('house_id');

            // Fetch boarding house details from the API based on house_id
            fetch(`../../api/boarding_house.php?house_id=${houseId}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    displayBoardingHouseDetails(data);
                })
                .catch(error => console.error('Error:', error));

            function displayBoardingHouseDetails(boardingHouse) {
                const details = document.createElement('div');
                details.classList.add('boarding-house-details');
                details.innerHTML = `
                    <h2>${boardingHouse.name}</h2>
                    <img src="${boardingHouse.image}" alt="Accommodation">
                    <p>Price: ${boardingHouse.price}/bulan</p>
                    <!-- Add more details here -->
                `;
                boardingHouseDetails.appendChild(details);
            }
        });
    </script>
</body>
</html>
