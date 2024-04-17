<?php
session_start();

//db configurations and connection
$host = 'localhost';
$username = 'root';
$pass = '';
$database = 'suhouse';
$conn = mysqli_connect($host, $username, $pass, $database);

// Function to authenticate user and determine role
function authenticateUser($username, $password) {
    global $conn;
    $query = "SELECT * FROM user WHERE user_id='$username' AND password='$password'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $row['role'];
        return true;
    } else {
        return false;
    }
}

// Function to check if user is logged in
function isLoggedIn() {
    return isset($_SESSION['username']);
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (authenticateUser($username, $password)) {
        header('Location: home.php'); // Redirect to main page after successful login
        exit();
    } else {
        $loginError = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../styling/login-register_style.css">    
</head>
<body>
    <div class="loginbox">
        <h2>Login</h2>
        <?php if (isset($loginError)) echo "<p>$loginError</p>"; ?>
        <form action="login.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="login" value="Login">
        </form>
        <a href="register.php">
            <p>Don't have an account? Register</p>
        </a>
    </div>
</body>
</html>