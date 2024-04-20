<?php
session_start();

include "connection.php";

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['account_id'])) {
    header("Location: login.php");
    exit();
}

$is_selected_0 = "class='active' style='background-color: #3f3f3f'";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Global styles */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        /* Styles for the sidebar */
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #252525;
            color: #fff;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 999;
            padding-top: 20px;
            transition: all 0.3s ease;
        }

        .sidebar.active {
            width: 70px;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .sidebar li {
            padding: 15px 20px;
            border-bottom: 1px solid #383838;
            transition: all 0.3s ease;
        }

        .sidebar li a {
            color: #fff;
            text-decoration: none;
            display: flex;
            align-items: center;
            opacity: 0.7;
            transition: all 0.3s ease;
        }

        .sidebar li a i {
            margin-right: 10px;
        }

        .sidebar li:hover a {
            opacity: 1;
        }

        /* Styles for the main content area */
        .content {
            margin-left: 250px;
            /* Width of the sidebar */
            padding: 20px;
            transition: all 0.3s ease;
            background-color: #f8f9fa;
            /* Primary color */
        }

        .content.active {
            margin-left: 70px;
        }

        /* Additional styling for the active menu item */
        .active {
            background-color: #3f3f3f;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
            }

            .sidebar.active {
                width: 250px;
            }

            .content {
                margin-left: 70px;
            }

            .content.active {
                margin-left: 250px;
            }

            .sidebar li a i {
                margin-right: 0;
            }
        }
    </style>

    <style>
        /* CSS styles for the admin dashboard */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .menu {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .menu a {
            margin-right: 10px;
            color: #666;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .menu a:hover {
            color: #000;
        }

        .account {
            position: relative;
        }

        .account-icon {
            background-color: #fff;
            color: #fff;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
            box-shadow: 1px 6px 8px rgba(0, 0, 0, 0.1);
        }

        .account-icon:hover {
            background-color: #ddd;
        }

        .account-dropdown {
            position: absolute;
            bottom: -70px;
            right: 0;
            width: 200px;
            background-color: #fff;
            box-shadow: 1px 6px 8px rgba(0, 0, 0, 0.1);
            border-radius: 4px;
            padding: 10px;
            display: none;
        }

        .account-dropdown.active {
            display: block;
        }

        .account-dropdown:before {
            position: absolute;
            top: -0.3em;
            right: 0.8em;
            border-left: solid 1px #fff;
            border-top: solid 1px #fff;
            width: 1em;
            height: 1em;
            transform: rotate(45deg);
            background: inherit;
            content: '';
            box-shadow: -6px -13px 8px rgba(0, 0, 0, 0.1);
        }

        .dropdown-item {
            display: block;
            width: 100%;
            padding: 0.25rem 0rem;
            clear: both;
            font-weight: 400;
            color: #212529;
            text-align: inherit;
            white-space: nowrap;
            background-color: transparent;
            border: 0;
            border-radius: 5px;
        }

        .dropdown-item:hover,
        .dropdown-item:focus {
            color: #16181b;
            text-decoration: none;
            background-color: #f8f9fa;
            color: #fff;
        }

        .account-menu:focus {
            color: #fff;
        }

        .account-name {
            font-size: 14px;
            margin-bottom: 5px;
        }

        .account-menu {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .account-menu li {
            margin-bottom: 5px;
        }

        .account-menu a {
            color: #000;
            text-decoration: none;
            font-size: 14px;
        }
        .summary-card {
            background-color: #fff;
            padding: 20px;
            border-radius: 8

px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .summary-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .summary-header h2 {
            font-size: 24px;
            color: #333;
        }

        .add-button {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .add-button:hover {
            background-color: #2980b9;
        }

        .boarding-houses-list {
            max-height: 300px;
            overflow-y: auto;
        }

        .boarding-house {
            margin-bottom: 15px;
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .boarding-house-name {
            font-weight: bold;
            margin: 3px;
        }

        .boarding-house-address {
            color: #666;
            margin: 10px;
        }

        .button-group button {
            margin-right: 10px;
            background-color: #fff;
            color: #333;
            border: 1px solid #ccc;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button-group button:hover {
            background-color: #f0f0f0;
        }

        .edit-boarding-house {
            background-color: #28a745; /* Green */
            color: #fff;
            border: none;
            padding: 4px 8px;
            margin-right: 10px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s ease;
            margin-top: 6px;
        }

        .edit-boarding-house:hover {
            background-color: #218838; /* Darker green */
        }

        .delete-boarding-house {
            background-color: #dc3545; /* Red */
            color: #fff;
            border: none;
            padding: 4px 8px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .delete-boarding-house:hover {
            background-color: #c82333; /* Darker red */
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
            border-radius: 5px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>

    <script>
        // JavaScript code to toggle the account dropdown
        document.addEventListener('DOMContentLoaded', function () {
            var accountIcon = document.querySelector('.account-icon');
            var accountDropdown = document.querySelector('.account-dropdown');

            accountIcon.addEventListener('click', function () {
                accountDropdown.classList.toggle('active');
            });
        });

        // JavaScript code to toggle the modal for editing boarding house details
        document.addEventListener('DOMContentLoaded', function () {
            var modal = document.getElementById('edit-boarding-house-modal');
            var btn = document.getElementById("add-boarding-house-btn");
            var span = document.getElementsByClassName("close")[0];

            btn.onclick = function () {
                modal.style.display = "block";
            }

            span.onclick = function () {
                modal.style.display = "none";
            }

            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        });
    </script>
</head>

<body>
    <?php
    if (isset($_SESSION['account_id'])) {
    ?>
        <div class="sidebar">
            <ul>
                <li><a href="./dashboard.php"><i class="fas fa-home"></i>Dashboard</a></li>
                <li <?php echo (isset($is_selected_0) ? $is_selected_0 : ''); ?>><a href="./manage-boarding-house.php"><i class="fas fa-building"></i>Manage Boarding Houses</a></li>
                <li><a href="./manage-users.php"><i class="fas fa-users"></i>Manage Users</a></li>
                <li><a href="./logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
            </ul>
        </div>

        <div class="content">
            <div class="container">
                <div class="header">
                    <div class="logo">Admin Dashboard</div>
                    <div class="menu">
                        <a href="#">Website Detail</a>
                        <div class="account">
                            <div class="account-icon"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><path d="M224 256A128 128 0 1 0 224 0a128 128

 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg></div>
                            <div class="account-dropdown">
                                <div class="account-name">&nbsp;&nbsp;&nbsp;Welcome <b>Admin</b></div>
                                <ul class="account-menu">
                                    <span class="dropdown-item"><li><a href="./logout.php">&nbsp;&nbsp;&nbsp;Logout</a></li></span>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Manage Boarding House Functionality -->
                <div class="summary-card">
                    <div class="summary-header">
                        <h2>Manage Boarding Houses</h2>
                        <button id="add-boarding-house-btn" class="add-button">Add New Boarding House</button>
                    </div>
                    <div class="boarding-houses-list" id="boarding-houses">
                        <?php
                        // Fetch boarding houses from the database
                        $query = "SELECT * FROM boarding_house";
                        $result = mysqli_query($mysqli, $query);

                        // Check if there are any boarding houses
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                // Display boarding house details
                                echo '<div class="boarding-house">';
                                echo '<span class="boarding-house-name">' . $row['name'] . '</span>';
                                echo '<span class="boarding-house-address">' . $row['address'] . '</span>';
                                echo '<div class="button-group">';
                                echo '<button class="edit-boarding-house" data-id="' . $row['boarding_house_id'] . '" data-name="' . $row['name'] . '" data-address="' . $row['address'] . '"><i class="fas fa-edit"></i> Edit</button>';
                                echo '<button class="delete-boarding-house" data-id="' . $row['boarding_house_id'] . '"><i class="fas fa-trash-alt"></i> Delete</button>';
                                echo '</div>';
                                echo '</div>';
                            }
                        } else {
                            echo "<p>No boarding houses found.</p>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for adding new boarding house -->
        <div id="edit-boarding-house-modal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Edit Boarding House Details</h2>
                <form id="edit-boarding-house-form" action="edit_boarding_house.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" id="edit-boarding-house-id" name="boarding_house_id" value="">
                <label for="edit-boarding-house-name">Name:</label><br>
                <input type="text" id="edit-boarding-house-name" name="name" required><br>
                <label for="edit-boarding-house-address">Address:</label><br>
                <input type="text" id="edit-boarding-house-address" name="address" required><br><br>
                <label for="image">Upload Image:</label><br>
                <input type="file" name="image" id="image"><br><br>
                <button type="submit">Save Changes</button>
            </form>
            <form id="delete-boarding-house-form" action="delete_boarding_house.php" method="POST">
                <input type="hidden" id="delete-boarding-house-id" name="boarding_house_id" value="">
                <button type="submit">Delete Boarding House</button>
            </form>

            </div>
        </div>

 <!-- Modal for adding new boarding house -->
<div id="add-boarding-house-modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Add New Boarding House</h2>
        <!-- Form to add a new boarding house -->
        <form id="add-boarding-house-form" action="add_boarding_house.php" method="POST" enctype="multipart/form-data">
            <!-- Add necessary form fields for adding a new boarding house -->
            <!-- For example: name, address, image upload, etc. -->
            <label for="add-boarding-house-name">Name:</label><br>
            <input type="text" id="add-boarding-house-name" name="name" required><br>
            <label for="add-boarding-house-address">Address:</label><br>
            <input type="text" id="add-boarding-house-address" name="address" required><br><br>
            <label for="image">Upload Image:</label><br>
            <input type="file" name="image" id="image"><br><br>
            <button type="submit">Add Boarding House</button>
        </form>
    </div>
</div>

    <?php } ?>

    <script>
    // JavaScript code to toggle the modal for adding new boarding house
    document.addEventListener('DOMContentLoaded', function () {
        var addModal = document.getElementById('add-boarding-house-modal');
        var addBtn = document.getElementById("add-boarding-house-btn");
        var span = document.getElementsByClassName("close")[0];

        addBtn.onclick = function () {
            addModal.style.display = "block";
        }

        span.onclick = function () {
            addModal.style.display = "none";
        }

        window.onclick = function (event) {
            if (event.target == addModal) {
                addModal.style.display = "none";
            }
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
    // Function to handle edit modal
    function openEditModal(id, name, address) {
        document.getElementById('edit-boarding-house-id').value = id;
        document.getElementById('edit-boarding-house-name').value = name;
        document.getElementById('edit-boarding-house-address').value = address;
        document.getElementById('edit-boarding-house-modal').style.display = 'block';
    }

    // Function to handle delete modal
    function openDeleteModal(id) {
        document.getElementById('delete-boarding-house-id').value = id;
        document.getElementById('edit-boarding-house-modal').style.display = 'block';
    }

    // Event listeners for edit and delete buttons
    var editButtons = document.querySelectorAll('.edit-boarding-house');
    var deleteButtons = document.querySelectorAll('.delete-boarding-house');

    editButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var id = button.dataset.id;
            var name = button.dataset.name;
            var address = button.dataset.address;
            openEditModal(id, name, address);
        });
    });

    deleteButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var id = button.dataset.id;
            openDeleteModal(id);
        });
    });

    // Close modal when close button is clicked
    var closeButtons = document.querySelectorAll('.close');
    closeButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            document.getElementById('edit-boarding-house-modal').style.display = 'none';
        });
    });
});

    </script>
</body>

</html>