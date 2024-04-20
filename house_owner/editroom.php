<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Room</title>
    <link rel="stylesheet" type="text/css" href="../styling/form_page_style.css">
</head>

<body>
    <?php include '../general/navbar.php'; ?>
    <div class="content">
        <div class="edit-room-box" id="edit-room-box">
            <form id="edit-room-form">
                <div class="form-group">
                    <label for="house-name">House Name</label>
                    <div class="selectionbox">
                        <select name="house_name" id="house-name" disabled>
                            <option value="kosa">Kos a</option>
                            <option value="kosb">Kos b</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="room-name">Room Name</label>
                    <input type="text" id="room-name" name="room_name" placeholder="Enter room name" disabled>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" id="price" name="price" placeholder="Enter price" disabled>
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" id="quantity" name="quantity" placeholder="Enter quantity" disabled>
                </div>
                <div class="form-group" id="room-pictures-container">
                    <label for="room-pictures">Room Pictures</label>
                    <div class="room-pictures-container">
                        <div class="picturebox">
                            <input type="file" name="room_pictures[]" disabled>
                        </div>
                        <button type="button" id="add-picture-button" disabled>Add Picture</button>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" id="description" name="description" placeholder="Enter description" required>
                </div>
                <div class="form-button">
                    <button type="submit" id="edit-button">Edit</button>
                    <button type="submit" id="save-button" style="display: none;">Save</button>
                </div>
            </form>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        const editButton = document.getElementById("edit-button");
        const saveButton = document.getElementById("save-button");
        const form = document.getElementById("edit-room-form");
        const inputs = form.querySelectorAll("input, select, textarea");
        const addPictureButton = document.getElementById("add-picture-button");

        // Toggle edit mode function
        function toggleEditMode() {
            const isEditMode = form.dataset.editMode === "true";

            if (isEditMode) {
                // If currently in edit mode, switch to view mode
                saveButton.style.display = "none";
                editButton.style.display = "inline-block";

                // Disable form inputs and buttons
                inputs.forEach(input => {
                    input.disabled = true;
                });
                addPictureButton.disabled = true;

                // Update the mode
                form.dataset.editMode = "false";
            } else {
                // If currently in view mode, switch to edit mode
                saveButton.style.display = "inline-block";
                editButton.style.display = "none";

                // Enable form inputs and buttons
                inputs.forEach(input => {
                    input.disabled = false;
                });
                addPictureButton.disabled = false;

                // Update the mode
                form.dataset.editMode = "true";
            }
        }

        // Add event listeners
        editButton.addEventListener("click", toggleEditMode);
        saveButton.addEventListener("click", toggleEditMode);

        // Add new file input for room pictures
        addPictureButton.addEventListener('click', function() {
            const newFileInput = document.createElement('input');
            newFileInput.setAttribute('type', 'file');
            newFileInput.setAttribute('name', 'room_pictures[]');
            newFileInput.setAttribute('multiple', '');

            const pictureBox = document.createElement('div');
            pictureBox.classList.add('picturebox');
            pictureBox.appendChild(newFileInput);

            document.querySelector('.room-pictures-container').appendChild(pictureBox);
        });
    </script>
</body>

</html>
