<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Registration</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa;
        }

        .registration-container {
            max-width: 800px;
            padding: 40px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

    <div class="registration-container">
        <h2 class="text-center mb-4">Patient Registration</h2>
        <form id="registrationForm" action="../controllers/PatientController.php?action=register" method="POST"
            onsubmit="return validateForm()">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter first name" required>
                <span id="nameError" class="text-danger"></span>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>
                <span id="emailError" class="text-danger"></span>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter password"
                    required>
                <span id="passwordError" class="text-danger"></span>
            </div>
            <div class="form-group">
                <label for="phoneNumber">Phone Number</label>
                <input type="text" class="form-control" name="phone" placeholder="Enter phone number">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" placeholder="Enter address">
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" class="form-control" name="dob" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Register</button>
        </form>
        <div class="text-center mt-3">
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </div>
    </div>

    <script>
        function validateForm() {
            // Reset error messages
            document.getElementById('nameError').textContent = '';
            document.getElementById('emailError').textContent = '';
            document.getElementById('passwordError').textContent = '';

            // Get form inputs
            var name = document.getElementById('name').value;
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;
            // You can get other form inputs similarly

            // Perform validation
            var isValid = true;

            if (name.trim() === '') {
                document.getElementById('nameError').textContent = 'Please enter your name.';
                isValid = false;
            }
            // Email validation
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                document.getElementById('emailError').textContent = 'Please enter a valid email address.';
                isValid = false;
            }

            // Password validation
            // Password must be at least 6 characters long
            if (password.length < 6) {
                document.getElementById('passwordError').textContent = 'Password must be at least 6 characters long.';
                isValid = false;
            }

            // You can add more validation rules here

            return isValid;
        }
    </script>
</body>

</html>