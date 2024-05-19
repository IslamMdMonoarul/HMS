<?php
session_start();
if(!isset($_SESSION['username']) and !isset($_SESSION['password'])){
    header("location:../view/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMS | Change Password</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body style="padding-right:7rem;padding-left:7rem;">

    <?php include "../model/_nav.php"; ?>

    <?php
        $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $prevPasswordErr = false;
        $newPasswordErr = false;
        $confirmPasswordErr = false;
        $newPassConfPassMismatchErr = false;
        $stmtfailed = false;

        if(strpos($fullUrl,"error=prevPasswordErr") == true){
            $prevPasswordErr = true;
        }

        elseif(strpos($fullUrl,"error=newPasswordErr") == true){
            $newPasswordErr = true;
        }

        elseif(strpos($fullUrl,"error=confirmPasswordErr") == true){
            $confirmPasswordErr = true;
        }

        elseif(strpos($fullUrl,"error=newPassConfPassMismatchErr") == true){
            $newPassConfPassMismatchErr = true;
        }

        elseif(strpos($fullUrl,"error=stmtfailed") == true){
            $stmtfailed = true;
        }

        
    ?>
    <main>
        <section>
            <div
                style="margin:auto;width:23%;background-color:#3498DB;padding-left:2rem;padding-right:2rem;padding-bottom:0.5rem;border-radius: 30px;">
                <div style="margin-top:4rem;text-align:center;padding-top:0.5rem;color:#e6e6e6;">
                    <h1>Change Password</h1>
                </div>
                <div>
                    <?php
                        if($newPassConfPassMismatchErr === true){
                            echo "Password mismatch!";
                        }
                        if($stmtfailed === true){
                            echo "Sql statement failed!";
                        }
                    ?>
                    <span id="success" style="color: green; text-align:center;"></span>

                    <form style="margin-left:0rem;" action="../control/changePasswordAction.php" method="post"
                        novalidate id="cp_form" onsubmit="return isValid(this);">
                        <label style="color:#e6e6e6;" for="newPassword">New Password</label>
                        <br>
                        <input
                            style="padding-right:8rem;border-radius: 30px;border:none;padding-top:5px;padding-bottom:5px;"
                            type="password" name="newPassword" id="newPassword">
                        <?php
                        if($newPasswordErr === true){
                            echo "Enter a new password!";
                        }
                        ?>
                        <span id="cp_npERR"></span>
                        <br><br><br>
                        <label style="color:#e6e6e6;" for="confirmPassword">Confirm Password</label>
                        <br>
                        <input
                            style="padding-right:8rem;border-radius: 30px;border:none;padding-top:5px;padding-bottom:5px;"
                            type="password" name="confirmPassword" id="confirmPassword">
                        <?php
                        if($confirmPasswordErr === true){
                            echo "Repeat your password!";
                        }
                        ?>
                        <span id="cp_cnpERR"></span>
                        <br><br><br>
                        <input
                            style="padding-right:10px;padding-left:10px;padding-top:5px;padding-bottom:5px;border-radius: 30px;border:none;font-size:15px;"
                            type="submit" value="Submit" onclick="submitData();">
                    </form>
                </div>
            </div>
        </section>
    </main>

    <?php include "../model/footer.php"; ?>

    <script src="js/changePassword.js"></script>
    <script src="js/cp.js"></script>

</body>

</html>