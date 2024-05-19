<?php 
session_start();
require_once '../Model/User.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") 
{

    if(isset($_POST['username']) && isset($_POST['password']))
    {
        $isValid = true;
        $username = $_POST['username'];
        $password = $_POST['password'];
        if (empty($username)) {
            $_SESSION['usernameErrorMsg'] = "Username is required";
            $isValid = false;
        }
        else
        {
            $_SESSION['username'] = $username;
            $_SESSION['usernameErrorMsg'] = "";

        }
        if (empty($password)) {
            $_SESSION['passwordErrorMsg'] = "Password is required";
            $isValid=false;
        }
        else
        {
            $_SESSION['password'] = $password;
            $_SESSION['passwordErrorMsg'] = "";
        }

        if($isValid)
        {
            $userType = ValidateLogin($username, $password);
            
            if ($userType !== false) 
            {
                $_SESSION['username'] = $username;
                if ($userType == 'admin') 
                {
                    $_SESSION['isAdmin'] = true;
                    setcookie('username', $username, time() + (86400 * 30), "/");
                    header('Location: ../Views/Admin/Dashboard.php');
                } 
                elseif ($userType == 'doctor') {
                    $_SESSION['isDoctor'] = true;
                    setcookie('username', $username, time() + (86400 * 30), "/");
                    header('Location: ../Views/Doctor/Dashboard.php');
                } 
                elseif ($userType == 'patient') {
                    $_SESSION['isPatient'] = true;
                    setcookie('username', $username, time() + (86400 * 30), "/");
                    header('Location: ../Views/Patient/PatientHome.php');
                } 
                elseif ($userType == 'labAssistant') {
                    $_SESSION['isLabAssistant'] = true;
                    setcookie('username', $username, time() + (86400 * 30), "/");
                    header('Location: ../Views/LabAssistant/LabAssistantHome.php');
                } 
                
            }
            else 
                {
                $_SESSION['Error'] = "Invalid Username or Password";
                header('Location: ../Views/Home/Login.php');
                }
            
        }
        else
        {
           
            header('Location: ../Views/Home/Login.php');
        }
    
    }
    
}
else
    {
        echo "Invalid Request";
    }
?>