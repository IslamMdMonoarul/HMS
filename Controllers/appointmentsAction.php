<?php

require "../model/dbConnect.php";

    $sqlDisplay = "SELECT `id`, `pFirstName`, `pLastName`, `pAge`, `pGender`, `disease`, `phone` FROM `appointments`;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sqlDisplay))
    {
        header("location: ../view/viewProfile.php?error=stmt2failed");
        exit();
    }
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    echo "
            <table>
            <tr style='border-bottom: 1px solid #ddd; font-size:22px;background-color:gray;color:white;border-bottom: 1px solid #DDD;'>
                <th style='display:none;'>Id</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Disease</th>
                <th>Contact</th>
                <th>Action</th>
            </tr>";
            
    while($row = mysqli_fetch_assoc($resultData)){
       
         
        $id = $row['id'];
        echo "
        <tr>
            <td style='text-align:center;padding:5px;font-size:20px;display:none;'>".$row["id"]."</td>
            <td>".$row["pFirstName"]."</td>
            <td>".$row["pLastName"]."</td>
            <td>".$row["pAge"]."</td>
            <td>".$row["pGender"]."</td>
            <td>".$row["disease"]."</td>
            <td>".$row["phone"]."</td>
            <td><button style='padding-left:15px;padding-right:15px;padding-top:7px;padding-bottom:7px;border:none;border-radius:10px;background-color:tomato;'><a style='text-decoration:none;color:white;' href='../control/deleteAppointment.php?id=".$id."'>Delete</a></button></td>
        </tr>        
        ";
        
    }
    echo "</table>"; 
    mysqli_stmt_close($stmt);

    
?>