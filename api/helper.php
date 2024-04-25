<?php

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'wpproject');

$conn = mysqli_connect(HOST, USER, PASS, DB);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_select_db($conn,DB);
?>
