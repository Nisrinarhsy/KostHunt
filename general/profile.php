<?php
// Include the database helper file
require_once './connection.php';

// Fetch user data from the database
$userData = getUserData(1); // Assuming user ID is 1

// Function to fetch user data from the database
function getUserData($userId) {
    // Call a function from your helper file to fetch user data
    // Replace 'getUserDataFromDatabase' with your actual function name
    return getUserDataFromDatabase($userId);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Settings</title>
    <script src="https://kit.fontawesome.com/cb7394df23.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../styling/form_page_style.css"></head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="content">
        <div class="profilebox" id="profile-box">
            <!-- Profile picture and edit icon -->
            <div class="profile-picture">
                <!-- Profile picture display -->
                <img src="https://via.placeholder.com/100" alt="Profile Picture">
                <span class="edit-icon" id="edit-icon"><i class="fa-solid fa-pen"></i></span>
                <input type="file" id="profile-picture-input" style="display: none;">
            </div>
            <!-- Display user information -->
            <div class="profile-name"><?php echo $userData['name']; ?></div>
            <div class="user-info">
                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" value="<?php echo $userData['email']; ?>" readonly>
                </div>
                <div>
                    <label for="contact-number">Contact Number</label>
                    <input type="tel" id="contact-number" value="<?php echo $userData['contact_number']; ?>" readonly>
                </div>
                <div>
                    <label for="bio">Bio</label>
                    <textarea id="bio" readonly><?php echo $userData['bio']; ?></textarea>
                </div>
                <div>
                    <label for="gender">Gender</label>
                    <input type="text" id="gender" value="<?php echo $userData['gender']; ?>" readonly>
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

        // Fetch API to update user data
        fetch('../api/user/update_user.php', {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                user_id: 1, // Provide the user ID you want to update
                name: 'Budi Doremi',
                contact_number: '987-654-3210',
                user_type: 'updated type',
                address: 'Updated Address',
                date_of_birth: '1990-01-01',
                gender: 'Female',
                bio: 'Updated Bio'
            })
        })
        .then(response => response.text())
        .then(data => {
            console.log(data); // Output the response from update_user.php
        })
        .catch(error => {
            console.error('Error:', error);
        });
    </script>
</body>

</html>
