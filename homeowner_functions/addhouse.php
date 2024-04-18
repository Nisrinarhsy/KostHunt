<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="../styling/form_page_style.css">    
</head>
<body>
    <?php include '../general/navbar.php'; ?>
    <div class="content">
        <div class="add-house-box">
            <form action="submit_house.php" method="POST">
                <div class="form-group">
                    <label for="house-name">House Name</label>
                    <input type="text" id="house-name" name="house_name" placeholder="Enter house name" required>
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" id="location" name="location" placeholder="Enter location" required>
                </div>
                <div class="form-group" id="house-pictures-container">
                    <label for="house-pictures">House Picture</label>
                    <div class="house-pictures-container">
                        <div class="picturebox">
                            <input type="file" name="house_pictures[]" multiple>
                        </div>
                        <button type="button" id="add-picture-button">Add Picture</button>
                    </div>
                </div>
                <div class="form-button">
                    <input type="submit" form="add-house-form" value="Add House">
                </div>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('add-picture-button').addEventListener('click', function() {
            // Create a new file input element
            var newFileInput = document.createElement('input');
            newFileInput.setAttribute('type', 'file');
            newFileInput.setAttribute('name', 'house_pictures[]');
            newFileInput.setAttribute('multiple', '');

            // Append the new file input to the house pictures container
            var housePicturesContainer = document.querySelector('.picturebox');
            housePicturesContainer.appendChild(newFileInput);
        });
    </script>
</body>
</html>
