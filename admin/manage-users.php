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
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .summary-card h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .summary-card p {
            font-size: 14px;
            color: #888;
            margin-bottom: 5px;
        }

        .manager-menu {
            margin-top: 30px;
        }

        .manager-menu a {
            display: inline-block;
            background-color: #34974d;
            color: #fff;
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .manager-menu a:hover {
            background-color: #45a049;
        }

        #graph-container {
            background-color: #ffffff;
            border-radius: 5px;
            padding: 20px;
        }

        .summary-container {
            text-align: center;
        }

        .left-div,
        .right-div {
            display: inline-block;
            width: 49%;
            vertical-align: top;
        }
    .user-list {
        max-height: 300px;
        overflow-y: auto;
    }

    .user {
        margin-bottom: 15px;
        padding: 15px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .user-name {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .user-role {
        color: #666;
        margin-bottom: 10px;
        margin: 10px;
    }

    .delete-user {
        background-color: #dc3545;
        color: #fff;
        border: none;
        padding: 5px 10px;
        margin:10px;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .delete-user:hover {
        background-color: #c82333;
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
    </script>
</head>

<body>
    <?php
    if (isset($_SESSION['account_id'])) {
    ?>
        <div class="sidebar">
            <ul>
                <li><a href="./dashboard.php"><i class="fas fa-home"></i>Dashboard</a></li>
                <li><a href="./manage-boarding-house.php"><i class="fas fa-building"></i>Manage Boarding Houses</a></li>
                <li <?php echo (isset($is_selected_0) ? $is_selected_0 : ''); ?>><a href="./manage-users.php"><i class="fas fa-users"></i>Manage Users</a></li>
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
                            <div class="account-icon"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg></div>
                            <div class="account-dropdown">
                                <div class="account-name">&nbsp;&nbsp;&nbsp;Welcome <b>Admin</b></div>
                                <ul class="account-menu">
                                    <span class="dropdown-item"><li><a href="./logout.php">&nbsp;&nbsp;&nbsp;Logout</a></li></span>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            <!-- Content related to managing users -->
            <div class="summary-card">
                <h2>Manage Users</h2>
                <div class="user-list">
                    <?php
                    // Fetch users from the database
                    $query = "SELECT * FROM users";
                    $result = mysqli_query($mysqli, $query);

                    // Check if there are any users
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            // Display user details
                            echo '<div class="user">';
                            echo '<span class="user-name">' . $row['username'] . '</span>';
                            echo '<span class="user-role">' . $row['user_type'] . '</span>';
                            echo '<button class="delete-user" data-id="' . $row['user_id'] . '"><i class="fas fa-trash-alt"></i> Delete</button>';
                            echo '</div>';
                        }
                    } else {
                        echo "<p>No users found.</p>";
                    }
                    ?>
                </div>
            </div>

            </div>
        </div>
    <?php } ?>

    <script>
        // Toggle sidebar and content
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            const content = document.querySelector('.content');
            sidebar.classList.toggle('active');
            content.classList.toggle('active');
        }
    </script>
</body>

</html>
