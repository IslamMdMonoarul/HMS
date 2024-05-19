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
    <title>HMS | A Complete Healthcare System</title>
    <style>
    table {
        border-collapse: collapse;
        width: 100%;
        color: black;
    }

    th,
    td {
        padding: 8px;
        text-align: center;
        border-bottom: 1px solid #ddd;
    }

    td {
        font-size: 20px;
    }

    tr:hover {
        background-color: gray;
    }
    </style>
</head>

<body style="padding-right:7rem;padding-left:7rem;">

    <?php include "../model/_nav.php"; ?>

    <h2
        style="text-align:center;color:white;background-color:gray;border-radius:10px;padding-top:1rem;align-items:center;font-size:30px;">
        Appointments</h2>
    <?php include "../control/appointmentsAction.php"; ?>

    <?php include "../model/footer.php"; ?>

</body>

</html>