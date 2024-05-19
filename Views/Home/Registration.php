
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
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
            margin-bottom: 20px;
            text-align: center;
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
        <h1>Registration</h1>
        <form action="../../Controllers/Registration.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>

                <input type="text" id="username" name="username" value="<?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : ''; ?>"><br>

                <span style="color: red; text-align: center; display: block; margin-top: 15px;">
                    <?php
                    if (isset($_SESSION['usernameErrorMsg'])) {
                        echo htmlspecialchars($_SESSION['usernameErrorMsg']);
                        unset($_SESSION['usernameErrorMsg']);
                    }
                    ?>
                </span>
            </div>
            <div class="form-group">
                <label for="email">Email</label>

                <input type="email" id="email" name="email" value="<?php echo isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : ''; ?>"><br>

                <span style="color: red; text-align: center; display: block; margin-top: 15px;">
                    <?php
                    if (isset($_SESSION['emailErrorMsg'])) {
                        echo htmlspecialchars($_SESSION['emailErrorMsg']);
                        unset($_SESSION['emailErrorMsg']);
                    }
                    ?>
                </span>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password"><br>
                <span style="color: red; text-align: center; display: block; margin-top: 15px;">
                    <?php
                    if (isset($_SESSION['passwordErrorMsg'])) {
                        echo htmlspecialchars($_SESSION['passwordErrorMsg']);
                        unset($_SESSION['passwordErrorMsg']);
                    }
                    ?>
                </span>
            </div>

            <input type="submit" value="Register" class="form-submit">
        </form>


        <!-- back to home button -->
        <div class="link-container">
            <span class="link-text">Already have an account?</span>
            <a href="docLogin.php" class="link">Login</a>
        </div>
    </div>
</body>

</html>