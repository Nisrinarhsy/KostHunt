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
        <?php if(isset($_SESSION['role'])) { ?>
            <?php if ($_SESSION['role'] == 'regular' || $_SESSION['role'] == 'owner') ?>
                <a href="../api/user/logout.php">Logout</a>
                <a href="../general/profile.php">Profile</a>
                <a href="../house_owner/manageproperty.php">Manage Property</a>
                <a href="../general/houselist.php">Find Housing</a>
                <a href="../general/home.php">Home</a>
            <? } ?>
        <?php } else { ?>
            <a href="../general/login.php">Login</a>
            <a href="../general/houselist.php">Find Housing</a>
            <a href="../general/home.php">Home</a>
        <?php } ?>
    </div>
</div>
