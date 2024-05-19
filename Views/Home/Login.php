<?php 
session_start(); 
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
            background-color: #008B8B;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin-top: 150px;
            margin: 130px auto;
            padding: 20px;
            background-color: #008B8B;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: white;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {

            font-weight: bold;
            text-align: center;
            display: block;
            font-size: 16px;
            margin-bottom: 8px;
            margin-top: 8px;
            color: white;

        }

        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 10px;
        }

        .error-message {
            color: #ff0000;
            margin-top: 5px;
        }

        .form-submit {
            background-color: #7FFFD4;
            color: #ffffff;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
            display: block;
            width: 50%;
            text-align: center;
            text-decoration: none;
            margin-top: 25px;
            margin-bottom: 10px;
            margin-left: auto;
            margin-right: auto;
            box-sizing: border-box;
        }


        .form-submit:hover {
            background-color: #7FFF00;
        }

        .link-container {
            margin-top: 20px;
            text-align: center;
            margin-bottom: 20px;
        }

        .link-text {
            font-size: 14px;
            color: white;
        }

        .link {
            color: #7CFC00;
            text-decoration: none;
            margin-left: 5px;
        }

        .link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
        <h1>Login</h1>
        <form action="../../Controllers/Login.php" method="post" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($_SESSION['username'] ?? ''); ?>">
                <span id="usernameErrorMsg" style="color: red; text-align: center; display: block; margin-top: 5px;"></span>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
                <span id="passwordErrorMsg" style="color: red; text-align: center; display: block; margin-top: 5px;"></span>
            </div>

            <input type="submit" value="Login" class="form-submit">
        </form>




        <div class="link-container">

            <a href="Forgetpassword.php" class="link">Forget password</a>
        </div>
        <div class="link-container">
            <span class="link-text">Don't have an account?</span>
            <a href="Registration.php" class="link">Register</a>
        </div>
    </div>

    <script>
        function validateForm() {
            var username = document.getElementById("username").value.trim();
            var password = document.getElementById("password").value.trim();
            var isValid = true;


            document.getElementById("usernameErrorMsg").innerHTML = "";
            document.getElementById("passwordErrorMsg").innerHTML = "";


            if (username === "") {
                document.getElementById("usernameErrorMsg").innerHTML = "Username is required";
                isValid = false;
            }


            if (password === "") {
                document.getElementById("passwordErrorMsg").innerHTML = "Password is required";
                isValid = false;
            }

            return isValid;
        }
    </script>
</body>
</html>
