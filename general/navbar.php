<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Start the session if not already started
}
?>

<div class="header">
    <div class="logo">
        <a href="../general/home.php">
            <img src="../styling/su_logo_nobg.png" alt="SU_logo">
        </a>    
    </div>
    <div class="navbar">
        <?php if(isset($_SESSION['user_id'])): ?>
            <!-- User is logged in -->
            <a href="../api/user/logout.php">Logout</a>
            <a href="../user_functions/bookmark.php">Bookmarks</a>
            <a href="../general/houselist.php">Find Housing</a>
            <?php if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'admin'): ?>
                <!-- Only show this link for admin users -->
                <a href="../admin_functions/manage_users.php">Manage Users</a>
            <?php endif; ?>
            <a href="../homeowner_functions/manageproperty.php">Manage Property</a>
            <a href="../general/home.php">Home</a>
        <?php else: ?>
            <!-- User is not logged in -->
            <a href="../general/login.php">Login</a>
            <a href="../general/houselist.php">Find Housing</a>
            <a href="../general/home.php">Home</a>
        <?php endif; ?>
    </div>
</div>
