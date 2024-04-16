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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #04132a;
            margin: 0;
            padding: 0;
        }
        .loginbox {
            max-width: 300px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-top: 60px;
        }
        h2 {
            text-align: center;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #24147a;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        p.error-message {
            color: red;
            text-align: center;
        }
    </style>
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
    </div>
    <?php include '../general/footer.php'; ?>
</body>
</html>