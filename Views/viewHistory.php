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
    <title>HMS | Patient History</title>
    <style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        padding: 8px;
        text-align: center;
        border-bottom: 1px solid #ddd;
    }

    tr:hover {
        background-color: gray;
    }
    </style>
</head>

<body style="padding-right:7rem;padding-left:7rem;">
    <?php
        $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $pIDErr = false;
        $usernotfound = false;

        if(strpos($fullUrl,"error=pID") == true){
            $pIDErr = true;
        }
        if(strpos($fullUrl,"error=usernotfound") == true){
            $usernotfound = true;
        }
    ?>

    <?php
    include "../model/_nav.php";
    ?>
    <div
        style="margin:auto;width:50%;background-color:#3498DB;padding-left:2rem;padding-right:2rem;padding-bottom:0.5rem;border-radius: 30px;">
        <div style="margin:auto;">
            <form style="margin:auto;" action="../control/viewHistoryAction.php" method="get" novalidate id="vh_form"
                onsubmit="return isValid(this)">
                <br>
                <label style="color:white;margin-right:3rem;" for="pID">Patient ID</label>
                <br>
                <input
                    style="margin-bottom:1.5rem;padding-right:8rem;border-radius: 30px;border:none;padding-top:5px;padding-bottom:5px;"
                    type="text" name="pID" id="pID">

                <input
                    style="border:none; border-radius:30px;padding:5px;margin-left:1rem;padding-left:15px;padding-right:15px;"
                    type="button" name="Search" value="Search" onclick="search(this);">
                <?php
                        if($pIDErr === true){
                            echo "<br>Enter patient's ID!";
                        }
                        if($usernotfound === true){
                            echo "<br>Patient not found!";
                        }
                        ?>
                <span id="vh_fnameErr"></span>
            </form>
        </div>


    </div>
    <div id="patientDetails" style="margin-top:2rem;">
    </div>
    <?php include "../model/footer.php"; ?>

    <script src="js/viewHistory.js"></script>
    <script src="js/historyAjax.js"></script>
    <script>

    </script>
</body>

</html>