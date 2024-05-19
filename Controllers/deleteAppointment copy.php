<?php
// session_start();
require "../model/dbConnect.php";
$id = $_GET['id']; 
// echo $id;

$sqlInsertUser = "DELETE FROM `appointments` WHERE `id` = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sqlInsertUser))
    {
        header("location: ../view/signUp.php?error=stmt2failed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../view/dashboard.php");
?>