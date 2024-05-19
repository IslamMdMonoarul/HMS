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
    <title>HMS | Profile</title>
</head>

<body style="padding-right:7rem;padding-left:7rem;">
    <?php
        $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $firstNameErr = false;
        $lastNameErr = false;
        $userNameErr = false;
        $emailErr = false;
        $phoneErr = false;
        $firstNameCovensionErr = false;
        $lastNameCovensionErr = false;
        $emailConvensionErr = false;
        $stmt2failed = false;

        if(strpos($fullUrl,"error=firstNameErr") == true){
            $firstNameErr = true;
        }

        elseif(strpos($fullUrl,"error=lastNameErr") == true){
            $lastNameErr = true;
        }

        elseif(strpos($fullUrl,"error=userNameErr") == true){
            $userNameErr = true;
        }

        elseif(strpos($fullUrl,"error=emailErr") == true){
            $emailErr = true;
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

        elseif(strpos($fullUrl,"error=stmt2failed") == true){
            $stmt2failed = true;
        }

        
    ?>
    <?php include "../model/_nav.php"; ?>
    <main>
        <section>
            <div
                style="margin:auto;width:23%;background-color:#3498DB;padding-left:2rem;padding-right:2rem;padding-bottom:0.5rem;border-radius: 30px;">
                <div style="margin-top:4rem;text-align:center;padding-top:0.5rem;color:#e6e6e6;">
                    <h1>Welcome. <?php echo $_SESSION['username']; ?></h1>
                </div>
                <div>
                    <form style="margin-left:0rem;" action="../control/profileAction.php" method="post" novalidate
                        id="vp_form" onsubmit="return isValid(this);">
                        <label style="color:#e6e6e6;" for="firstName">Fisrt Name</label>
                        <br>
                        <input
                            style="padding-right:8rem;border-radius: 30px;border:none;padding-top:5px;padding-bottom:5px;"
                            type="text" name="firstName" id="firstName"
                            value="<?php if(isset($_SESSION['dbFirstName'])){echo $_SESSION['dbFirstName'];} ?>">
                        <?php
                        if($firstNameErr === true){
                            echo "First Name empty!";
                        }

                        if($firstNameCovensionErr === true){
                            echo "Only upper case and lower case letters allowed!";
                        }
                        ?>
                        <span id="vp_fnameErr"></span>
                        <br><br><br>
                        <label style="color:#e6e6e6;" for="lastName">Last Name</label>
                        <br>
                        <input
                            style="padding-right:8rem;border-radius: 30px;border:none;padding-top:5px;padding-bottom:5px;"
                            type="text" name="lastName" id="lastName"
                            value="<?php if(isset($_SESSION['dbLastName'])){echo $_SESSION['dbLastName'];}?>">
                        <?php
                        if($lastNameErr === true){
                            echo "Last Name empty!";
                        }

                        if($lastNameCovensionErr === true){
                            echo "Only upper case and lower case letters allowed!";
                        }
                        ?>
                        <span id="vp_lnameErr"></span>
                        <br><br><br>
                        <label style="color:#e6e6e6;" for="userName">User Name</label>
                        <br>
                        <input
                            style="padding-right:8rem;border-radius: 30px;border:none;padding-top:5px;padding-bottom:5px;"
                            type="text" name="userName" id="userName"
                            value="<?php if(isset($_SESSION['dbUserName'])){echo $_SESSION['dbUserName'];} ?>">

                        <?php
                        if($userNameErr === true){
                            echo "User Name empty!";
                        }
                        ?>
                        <span id="vp_unameErr"></span>
                        <br><br><br>
                        <label style="color:#e6e6e6;" for="email">Email</label>
                        <br>
                        <input
                            style="padding-right:8rem;border-radius: 30px;border:none;padding-top:5px;padding-bottom:5px;"
                            type="email" name="email" id="email"
                            value="<?php if(isset($_SESSION['dbemail'])){echo  $_SESSION['dbemail'] ;}  ?>">
                        <?php
                        if($emailErr === true){
                            echo "Email empty!";
                        }

                        if($emailConvensionErr === true){
                            echo "Enter a valid email!";
                        }
                        ?>
                        <span id="vp_emailErr"></span>
                        <br><br><br>
                        <label style="color:#e6e6e6;" for="phone">Phone</label>
                        <br>
                        <input
                            style="padding-right:8rem;border-radius: 30px;border:none;padding-top:5px;padding-bottom:5px;"
                            type="text" name="phone" id="phone"
                            value="<?php if(isset($_SESSION['dbPhone'])){echo $_SESSION['dbPhone'];}?>">
                        <?php
                        if($phoneErr === true){
                            echo "Phone number empty!";
                        }
                        ?>
                        <span id="vp_phoneErr"></span>
                        <br><br>
                        <input
                            style="padding-right:10px;padding-left:10px;padding-top:5px;padding-bottom:5px;border-radius: 30px;border:none;font-size:15px;"
                            type="submit" id="btn_update" name="Update" value="Update">
                    </form>
                </div>
                <?php
                    if($stmt2failed === true){
                        echo "Sql statement failed!";
                    }
                ?>
            </div>
        </section>
    </main>
    <?php include "../model/footer.php"; ?>

    <script src="js/viewProfile.js"></script>
</body>

</html>