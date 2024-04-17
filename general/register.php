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
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="../styling/login-register_style.css">    
</head>
<body>
    <div class="registerbox">
        <h2>Register</h2>
        <!-- registration form -->
        <form action="register.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="text" name="full_name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="tel" name="phone_number" placeholder="Phone Number" required>
            <select name="user_type" id="user-type" required>
                <option value="">Select User Type</option>
                <option value="regular">Regular</option>
                <option value="home_owner">Home Owner</option>
            </select>
            <input type="text" name="address" placeholder="Address (Home Owners Only)" id="address" style="display: none;">
            <select name="gender" required>
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
            <input type="date" name="date_of_birth" placeholder="Date of Birth" required>
            <input type="submit" name="register" value="Register">
        </form>
        <!-- Error message -->
        <?php if (isset($registerError)) echo '<p class="error-message">' . $registerError . '</p>'; ?>
    </div>
    <script>
    const userTypeSelect = document.getElementById('user-type');
    const addressInput = document.getElementById('address');
    function toggleAddressInput() {
        if (userTypeSelect.value === 'home_owner') {
            addressInput.style.display = 'block';
        } else {
            addressInput.style.display = 'none';
        }
    }
    userTypeSelect.addEventListener('change', toggleAddressInput);
    toggleAddressInput();
    </script>
</body>
</html>