<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Room</title>
    <link rel="stylesheet" type="text/css" href="../styling/form_page_style.css">    
</head>
<body>
    <?php include '../general/navbar.php'; ?>
    <div class="content">
        <div class="add-room-box">
            <form action="submit_room.php" method="POST">
                <div class="form-group">
                    <label for="room-name">House Name</label>
                    <div class="selectionbox">
                        <select name="housename" id="housename" required>
                            <option value="kosa">Kos a</option>
                            <option value="kosb">Kos b</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="room-name">Room Name</label>
                    <input type="text" id="room-name" name="room_name" placeholder="Enter room name" required>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" id="price" name="price" placeholder="Enter price" required>
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="text" id="quantity" name="quantity" placeholder="Enter quantity" required>
                </div>
                <div class="form-group" id="room-pictures-container">
                    <label for="room-pictures">House Picture</label>
                    <div class="room-pictures-container">
                        <div class="picturebox">
                            <input type="file" name="room_pictures[]" multiple>
                        </div>
                        <button type="button" id="add-picture-button">Add Picture</button>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" id="description" name="description" placeholder="Enter description" required>
                </div>
                <div class="form-button">
                    <input type="submit" form="add-room-form" value="Add room">
                </div>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('add-picture-button').addEventListener('click', function() {
            // Create a new file input element
            var newFileInput = document.createElement('input');
            newFileInput.setAttribute('type', 'file');
            newFileInput.setAttribute('name', 'room_pictures[]');
            newFileInput.setAttribute('multiple', '');

            // Append the new file input to the house pictures container
            var housePicturesContainer = document.querySelector('.picturebox');
            housePicturesContainer.appendChild(newFileInput);
        });
    </script>
</body>
</html>
