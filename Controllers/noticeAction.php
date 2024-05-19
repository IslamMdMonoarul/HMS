<?php
// session_start();
require "../model/dbConnect.php";
    // get the table data
    $sqlDisplay = "SELECT `notices`, `date` FROM `notice`;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sqlDisplay))
    {
        header("location: ../view/viewProfile.php?error=stmt2failed");
        exit();
    }
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    echo "
            <table >
            <tr style='border-bottom: 1px solid #ddd; font-size:22px;background-color:gray;color:white;border-bottom: 1px solid #DDD;'>
                
                <th>Notice</th>
                <th>Date</th>
                
            </tr>";
            
    while($row = mysqli_fetch_assoc($resultData)){
        echo "
        <tr>
            <td>
            ".$row["notices"]."</td>
            <td>".$row["date"]."</td>
            
        </tr>        
        ";
        
    }
    echo "</table>"; 
    mysqli_stmt_close($stmt);

    
?>