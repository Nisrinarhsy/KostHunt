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
        <form id="loginForm" action="../../api/user/login.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="login" value="Login">
        </form>
        <a href="register.php">
            <p>Don't have an account? Register</p>
        </a>
    </div>

    <script>
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
    </script>
</body>
</html>