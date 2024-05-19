<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

</head>

<body>
    <?php
        $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $firstNameEmpty = false;
        $lastNameEmpty = false;
        $userNameEmpty = false;
        $emailEempty = false;
        $passwordErr = false;
        $confirmPasswordErr = false;
        $phoneErr = false;
        $firstNameCovensionErr = false;
        $lastNameCovensionErr = false;
        $emailConvensionErr = false;
        $passmismatchErr = false;
        $stmtfailed = false;
        $userexits = false;
        $stmt2failed = false;

        if(strpos($fullUrl,"error=firstNameErr") == true){
            $firstNameEmpty = true;
        }

        elseif(strpos($fullUrl,"error=lastNameErr") == true){
            $lastNameEmpty = true;
        }

        elseif(strpos($fullUrl,"error=userNameErr") == true){
            $userNameEmpty = true;
        }

        elseif(strpos($fullUrl,"error=emailErr") == true){
            $emailEempty = true;
        }

        elseif(strpos($fullUrl,"error=passwordErr") == true){
            $passwordErr = true;
        }
        elseif(strpos($fullUrl,"error=confirmPasswordErr") == true){
            $confirmPasswordErr = true;
        }
        elseif(strpos($fullUrl,"error=phoneErr") == true){
            $phoneErr = true;
        }
        elseif(strpos($fullUrl,"error=firstNameCovensionErr") == true){
            $firstNameCovensionErr = true;
        }
        elseif(strpos($fullUrl,"error=lastNameCovensionErr") == true){
            $lastNameCovensionErr = true;
        }
        elseif(strpos($fullUrl,"error=emailConvensionErr") == true){
            $emailConvensionErr = true;
        }
        elseif(strpos($fullUrl,"error=passmismatchErr") == true){
            $passmismatchErr = true;
        }
        elseif(strpos($fullUrl,"error=stmtfailed") == true){
            $stmtfailed = true;
        }
        elseif(strpos($fullUrl,"error=userexits") == true){
            $userexits = true;
        }
        elseif(strpos($fullUrl,"error=stmt2failed") == true){
            $stmt2failed = true;
        }
    ?>
    <main>
        <section>
            <div
                style="margin:auto;width:20%;background-color:#3498DB;padding-left:2rem;padding-right:2rem;padding-bottom:0.5rem;border-radius: 30px;">
                <div style="margin-top:1rem;text-align:center;padding-top:0.5rem;color:#e6e6e6;">
                    <h1>Sign Up</h1>
                </div>
                <div>
                    <form style="margin-left:0rem;" action="../control/signUpAction.php" method="post" novalidate
                        id="su-form" onsubmit="return isValid(this);">
                        <label style="color:#e6e6e6;" for="firstName">Fisrt Name</label>
                        <br>
                        <input
                            style="padding-right:8rem;border-radius: 30px;border:none;padding-top:5px;padding-bottom:5px;"
                            type="text" name="firstName" id="su-firstName">
                        <?php
                        if($firstNameEmpty === true){
                            echo "First Name empty";
                        }
                        ?>
                        <span id="fnameErr"></span>
                        <br><br><br>
                        <label style="color:#e6e6e6;" for="lastName">Last Name</label>
                        <br>
                        <input
                            style="padding-right:8rem;border-radius: 30px;border:none;padding-top:5px;padding-bottom:5px;"
                            type="text" name="lastName" id="su-lastName">
                        <?php
                        if($lastNameEmpty === true){
                            echo "Last Name empty";
                        }
                        ?>
                        <span id="lnameErr"></span>
                        <br><br><br>
                        <label style="color:#e6e6e6;" for="userName">User Name</label>
                        <br>
                        <input
                            style="padding-right:8rem;border-radius: 30px;border:none;padding-top:5px;padding-bottom:5px;"
                            type="text" name="userName" id="su-userName">
                        <?php
                        if($userNameEmpty === true){
                            echo "User Name empty";
                        }
                        ?>
                        <span id="unameErr"></span>
                        <br><br><br>
                        <label style="color:#e6e6e6;" for="email">Email</label>
                        <br>
                        <input
                            style="padding-right:8rem;border-radius: 30px;border:none;padding-top:5px;padding-bottom:5px;"
                            type="email" name="email" id="su-email">
                        <?php
                        if($emailEempty === true){
                            echo "Enter an email Address!";
                        }
                        ?>
                        <span id="emailErr"></span>
                        <br><br><br>
                        <label style="color:#e6e6e6;" for="password">Password</label>
                        <br>
                        <input
                            style="padding-right:8rem;border-radius: 30px;border:none;padding-top:5px;padding-bottom:5px;"
                            type="password" name="password" id="su-password">
                        <?php
                        if($passwordErr === true){
                            echo "Enter a password!";
                        }
                        ?>
                        <span id="passwordErr"></span>
                        <br><br><br>
                        <label style="color:#e6e6e6;" for="confirmPassword">Confirm Password</label>
                        <br>
                        <input
                            style="padding-right:8rem;border-radius: 30px;border:none;padding-top:5px;padding-bottom:5px;"
                            type="password" name="confirmPassword" id="su-confirmPassword">
                        <?php
                        if($confirmPasswordErr === true){
                            echo "Confirm Password field empty!";
                        }
                        ?>
                        <span id="confirmpasswordErr"></span>
                        <br><br><br>
                        <label style="color:#e6e6e6;" for="phone">Phone</label>
                        <br>
                        <input
                            style="padding-right:8rem;border-radius: 30px;border:none;padding-top:5px;padding-bottom:5px;"
                            type="text" name="phone" id="su-phone">
                        <?php
                        if($phoneErr === true){
                            echo "Enter a phone number!";
                        }
                        ?>
                        <span id="phoneErr"></span>
                        <br><br>
                        <input
                            style="color:#e6e6e6;padding-right:10px;padding-left:10px;padding-top:5px;padding-bottom:5px;border-radius: 30px;border:none;font-size:15px;"
                            type="submit" value="Submit" id="btn-signup">
                    </form>
                </div>
                <div style="margin-top:0.7rem;text-align:center;">
                    <span style="text-decoration:none;color:#e6e6e6;">Already have an account?
                        <a style="text-decoration:none;color:#e6e6e6;" href="../view/logIn.php">
                            Log In
                        </a>
                    </span>
                    <br><br>

                </div>

                <?php
                    if($firstNameCovensionErr === true){
                        echo "Please enter only upper case <br> and lower case letters!";
                    }
                ?>
                <?php
                    if($lastNameCovensionErr === true){
                        echo "Please enter only upper case <br> and lower case letters!";
                    }
                ?>
                <?php
                    if($emailConvensionErr === true){
                        echo "Please enter a valid email!";
                    }
                ?>
                <?php
                    if($passmismatchErr === true){
                        echo "Passwords does not match!";
                    }
                ?>
                <?php
                    if($stmtfailed === true){
                        echo "Sql statement failed!";
                    }
                    if($userexits === true){
                        echo "Username or email taken!<br>Please try again!";
                    }
                    if($stmt2failed === true){
                        echo "Sql statement failed!";
                    }
                ?>
            </div>
        </section>
    </main>
    <script src="../view/js/signUp.js"></script>
</body>

</html>