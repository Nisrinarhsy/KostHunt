<?php
session_start();
?>

<div class="header">
    <div class="logo">
        <a href="../general/home.php">
            <img src="../styling/logo_nobg.png" alt="logo">
        </a>    
    </div>
    <div class="navbar">
        <?php if(isset($_SESSION['username'])): ?>
            <!-- User is logged in -->
            <a href="../api/user/logout.php">Logout</a>
            <a href="../user_functions/bookmark.php">Bookmarks</a>
            <?php if($_SESSION['role'] == 'admin'): ?>
                <!-- Only show this link for admin users -->
                <a href="../admin_functions/manage_users.php">Manage Users</a>
            <?php endif; ?>
            <?php if($_SESSION['role'] == 'owner'): ?>
                <!-- Only show this link for home owner users -->
                <a href="../homeowner_functions/manageproperty.php">Manage Property</a>
            <?php endif; ?>
        <?php endif; ?>
        <!-- User is not logged in -->
        <a href="../general/login.php">Login</a>
        <a href="../general/houselist.php">Find Housing</a>
        <a href="../general/home.php">Home</a>
    </div>
</div>