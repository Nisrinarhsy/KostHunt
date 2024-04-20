<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit House</title>
    <link rel="stylesheet" type="text/css" href="../styling/form_page_style.css">
</head>

<body>
    <?php include '../general/navbar.php'; ?>
    <div class="content">
        <div class="add-house-box">
            <form id="edit-house-form">
                <div class="form-group">
                    <label for="house-name">House Name</label>
                    <input type="text" id="house-name" name="house_name" placeholder="Enter house name" disabled required>
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" id="location" name="location" placeholder="Enter location" disabled required>
                </div>
                <div class="form-group" id="house-pictures-container">
                    <label for="house-pictures">House Pictures</label>
                    <div class="house-pictures-container">
                        <div class="picturebox">
                            <input type="file" name="house_pictures[]" disabled>
                        </div>
                        <button type="button" id="add-picture-button" disabled>Add Picture</button>
                    </div>
                </div>
                <div class="form-button">
                    <button type="submit" id="edit-button">Edit</button>
                    <button type="submit" id="save-button" style="display: none;">Save</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Get form elements
        const editButton = document.getElementById("edit-button");
        const saveButton = document.getElementById("save-button");
        const form = document.getElementById("edit-house-form");
        const inputs = form.querySelectorAll("input, select, textarea");
        const addPictureButton = document.getElementById("add-picture-button");

        // Initialize form edit mode attribute
        form.dataset.editMode = "false";

        // Function to toggle edit mode
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

                // Update form mode
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

                // Update form mode
                form.dataset.editMode = "true";
            }
        }

        // Event listener for "Edit" button
        editButton.addEventListener("click", toggleEditMode);
        saveButton.addEventListener("click", toggleEditMode);

        // Add event listener for the "Add Picture" button
        addPictureButton.addEventListener("click", function() {
            // Create a new file input element
            const newFileInput = document.createElement("input");
            newFileInput.setAttribute("type", "file");
            newFileInput.setAttribute("name", "house_pictures[]");
            newFileInput.setAttribute("multiple", "");

            // Append the new file input element to the house pictures container
            document.querySelector('.house-pictures-container').appendChild(newFileInput);
        });
    </script>
</body>

</html>
