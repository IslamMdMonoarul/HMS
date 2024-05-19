<?php 

require_once 'Db.php';

function ValidateLogin($Username, $Password)
{
    $con = getConnection();
    
    
    $doctorLogin = "SELECT * FROM doctor WHERE Username = '$Username' AND Password = '$Password'";
    
    
    
    $doctorResult = $con->query($doctorLogin);
    

    if ($doctorResult->num_rows > 0) 
    {
        return "doctor";
    } 
    else 
    {
        return false;
    }
}


function VerifyUsername($Username)
{
    $con = getConnection();
    $sql = "SELECT * FROM doctor WHERE Username = '$Username'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) 
    {
        return true;
    } 
    else 
    {
        return false;
    }
}

function VerifyEmail($Email)
{
    $con = getConnection();
    $sql = "SELECT * FROM doctor WHERE Email = '$Email'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) 
    {
        return true;
    } 
    else 
    {
        return false;
    }
}


function RegisterDoctor($FullName,$Gender,$ContactNo,$Email,$Password,$Username,$Address,$Speciality,$Status)
{
    $con = getConnection();
    
    $sql = "INSERT INTO doctor (FullName,Gender,ContactNo,Email,Password,Username,Address,Speciality,Status) VALUES ('$FullName','$Gender','$ContactNo','$Email','$Password','$Username','$Address','$Speciality','$Status')";
    
    if ($con->query($sql) === TRUE) 
    {
        return true;
    } 
    else 
    {
        return false;
    }
}


function ForgetPassword($Username, $Password)
{
    $con = getConnection();
    
    $doctorCheck = "SELECT * FROM doctor WHERE Username = '$Username'";
    

   
    $doctorResult = $con->query($doctorCheck);
    

    if ($doctorResult->num_rows > 0) 
    {
        $sql = "UPDATE doctor SET Password = '$Password' WHERE Username = '$Username'";
    }  
    else {
       
        return false;
    }

  
    if ($con->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}


?>