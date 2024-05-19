<?php
session_start();
require "../model/dbConnect.php";
$isExists = false;

    if(empty($_GET['pID'])){
        header("location: ../view/viewHistory.php?error=pIDErr");
        exit();
    }
    else{
        $pID = sanitize($_GET['pID']);
    }
    
    $sqlFindtUser = "SELECT `id`, `pID`, `pFirstName`, `pLastName`, `pAge`, `pGender`, `disease`, `last_diagnosed`, `history`, `phone` FROM `appointments` WHERE `pID` = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sqlFindtUser))
    {
        header("location: ../view/viewHistory.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $pID);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($resultData)>0){
    
        $patientData = array();
        while($row = mysqli_fetch_assoc($resultData)){
            $id = $row['pID'];
            $FirstName = $row['pFirstName'];
            $LastName = $row['pLastName'];
            $Age = $row['pAge'];
            $Disease = $row['disease'];
            $LastDiagnosed = $row['last_diagnosed'];
            $History = $row['history'];
            array_push($patientData, array("id" => $id, "firstName" => $FirstName, "lastName" => $LastName, "age" => $Age, "disease" => $Disease, "lastDiagonosed" => $LastDiagnosed, "history" => $History));
        }
    }
    else{
        header("location:../view/viewHistory.php?error=usernotfound");
            mysqli_stmt_close($stmt);
            exit();
    }
    
    echo json_encode($patientData);
        
function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>