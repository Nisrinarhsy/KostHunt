<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Settings</title>
    <script src="https://kit.fontawesome.com/cb7394df23.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../styling/form_page_style.css">
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="content">
        <div class="profilebox" id="profile-box">
            <!-- Profile picture and edit icon -->
            <div class="profile-picture">
                <img src="https://via.placeholder.com/100" alt="Profile Picture">
                <span class="edit-icon" id="edit-icon"><i class="fa-solid fa-pen"></i></span>
                <input type="file" id="profile-picture-input" style="display: none;">
            </div>
            <div class="profile-name">Name</div>
            <div class="user-info">
                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" value="johndoe@example.com" readonly>
                </div>
                <div>
                    <label for="contact-number">Contact Number</label>
                    <input type="tel" id="contact-number" value="123-456-7890" readonly>
                </div>
                <div>
                    <label for="bio">Bio</label>
                    <textarea id="bio" readonly>ndkanf
                    </textarea>
                </div>
                <div>
                    <label for="gender">Gender</label>
                    <input type="text" id="gender" value="Male" readonly>
                </div>
            </div>
            <!-- Buttons section -->
            <div class="buttons">
                <button id="edit-button">Edit</button>
                <button id="save-button" class="save-button">Save</button>
                <button id="logout-button">Log Out</button>
            </div>
        </div>
    </div>
    <script>
        // Script
        const editButton = document.getElementById("edit-button");
        const saveButton = document.getElementById("save-button");
        const logoutButton = document.getElementById("logout-button");
        const profileBox = document.getElementById("profile-box");
        const profileInputs = document.querySelectorAll(".user-info input, .user-info textarea");
        const editIcon = document.getElementById('edit-icon');
        const profilePictureInput = document.getElementById('profile-picture-input');

        // Toggle edit mode
        function toggleEditMode() {
            profileBox.classList.toggle("edit-mode");

            if (profileBox.classList.contains("edit-mode")) {
                // In edit mode, display the save button and hide edit and logout buttons
                saveButton.style.display = "inline-block";
                editButton.style.display = "none";
                logoutButton.style.display = "none";

                // Enable editing
                profileInputs.forEach(input => {
                    input.readOnly = false;
                    input.style.borderBottom = "1px solid #ccc";
                });
            } else {
                // In view mode, hide the save button and display edit and logout buttons
                saveButton.style.display = "none";
                editButton.style.display = "inline-block";
                logoutButton.style.display = "inline-block";

                // Disable editing
                profileInputs.forEach(input => {
                    input.readOnly = true;
                    input.style.borderBottom = "none";
                });
            }
        }

        // Event listeners
        editButton.addEventListener("click", toggleEditMode);
        saveButton.addEventListener("click", toggleEditMode);
        logoutButton.addEventListener("click", function() {
            // Add your logout logic here
            console.log("Logging out...");
        });

        // Event listener for profile picture edit icon
        editIcon.addEventListener('click', function() {
            profilePictureInput.click(); // Trigger file input when edit icon is clicked
        });

        // Function to auto-resize textarea
        function autoResizeTextarea(textarea) {
            textarea.style.height = 'auto';
            textarea.style.height = textarea.scrollHeight + 'px';
        }

        const bioTextarea = document.getElementById('bio');
        bioTextarea.addEventListener('input', function() {
            autoResizeTextarea(this);
        });
        autoResizeTextarea(bioTextarea);
    </script>
</body>

</html>
