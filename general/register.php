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
        <!-- Updated registration form -->
        <form id="registrationForm"> 
            <input type="text" name="username" placeholder="Username" required>
            <input type="text" name="name" placeholder="Full Name" required> 
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="tel" name="contact_number" placeholder="Phone Number" required> 
            <select name="user_type" id="user-type" required>
                <option value="">Select User Type</option>
                <option value="regular">Regular</option>
                <option value="home_owner">Home Owner</option>
            </select>
            <input type="text" name="address" placeholder="Address (Home Owners Only)" id="address">
            <select name="gender" required>
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            <input type="submit" name="register" value="Register">
            <p id="error-message" class="error-message"></p>
            <p id="success-message" class="success-message"></p> <!-- Added success message -->
        </form>
    </div>
    <script>
    document.getElementById('registrationForm').addEventListener('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission

        var formData = new FormData(this);

        fetch('../../api/user/register.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json()) // Expecting a JSON response
            .then(data => {
        if (data.status === "error") {
            // Display the specific error message as a pop-up
            alert(data.message);
            document.getElementById('error-message').innerText = data.message;
            document.getElementById('success-message').innerText = ''; // Clear success message
        } else if (data.status === "success") {
            // Display success message as a pop-up
            alert(data.message);
            document.getElementById('success-message').innerText = data.message;
            document.getElementById('error-message').innerText = ''; // Clear error message
            // Redirect to login page after showing success message
            window.location.href = '../../KostHunt/general/login.php';
        }
    })


        .catch(error => console.error('Error:', error));
    });

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
