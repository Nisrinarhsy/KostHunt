<?php
session_start();

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'wpproject');

$conn = mysqli_connect(HOST, USER, PASS, DB);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = $conn->query($sql);

        if ($result) {
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                if ($row['status'] == 'active' && password_verify($password, $row['password'])) {
                    $_SESSION['username'] = $username;
                    $_SESSION['role'] = $row['user_type'];
                    header('location: ./home.php', true, 301);
                    exit();
                } else {
                    echo "<script>alert('Incorrect username or password or inactive account');</script>";
                }
            } else {
                echo "<script>alert('User not found');</script>";
            }
        } else {
            echo "<script>alert('Error executing query:" . $conn->error . "');";
        }
    } else {
        echo "<script>alert('Username or password not provided');</script>";
    }

    $conn->close();
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
        <?php if (isset($loginError))
            echo "<p>$loginError</p>"; ?>
        <form id="loginForm" action="" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="login" value="Login">
        </form>
        <a href="register.php">
            <p>Don't have an account? Register</p>
        </a>
    </div>

    <!-- <script>
    document.getElementById('loginForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting in the traditional way

        var formData = new FormData(this);

        fetch('../../api/user/login.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if(data.status === 'success') {
                // Redirect to the home page on successful login
                window.location.href = 'home.php';
            } else {
                // Handle login errors (e.g., display an error message)
                alert(data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
    </script> -->
</body>

</html>