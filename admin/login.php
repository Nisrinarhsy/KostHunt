<?php
session_start(); 
include "connection.php";

$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Modified SQL query to fetch only admin user
        $select_account = mysqli_query($mysqli, "SELECT * FROM users WHERE username='$username' AND user_type='admin'");

        if (mysqli_num_rows($select_account) == 1) {
            $row = mysqli_fetch_assoc($select_account);
            $hashedPassword = $row['password'];
            $passwordMatch = password_verify($password, $hashedPassword);

            if ($passwordMatch &&  $row['user_type'] == 'admin') {
                $_SESSION['account_id'] = $row['user_id'];
                $_SESSION['role'] = 'admin';
                header("Location: dashboard.php");
                exit();
            } else {
                $msg = "Username or password did not match with the data in our database.";
            }
        } else {
            $msg = "You do not have admin privileges to access the dashboard.";
        }
    } else {
        $msg = "There is an error in the login process.";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="style.css" rel="stylesheet">
</head>

<body>
    <div class="signup-form">
        <form action="" method="POST">
            <h2>KostHunt - Admin Login</h2>
            <p>Login into Admin Account</p>
            <hr>

            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Enter your username">
            </div>

            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Enter your password">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </div>

            <p class="small text-center">If you have trouble, please contact Admin: <a target="_blank" href="#">WhatsApp</a>.</p>
        </form>

        <div class='text-center'>
            <?php echo $msg; ?>
        </div>
    </div>
</body>

</html>
