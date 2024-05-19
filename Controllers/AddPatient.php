<?php

session_start();

require_once '../Model/Doctor.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $maritalStatus = $_POST['maritalStatus'];
    $gender = $_POST['gender'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $spouseName = $_POST['spouseName'];
    $bloodGroup = $_POST['bloodGroup'];
    $fatherName = $_POST['fatherName'];
    $motherName = $_POST['motherName'];
    $contactNo = $_POST['contactNo'];
    $username = $_POST['username'];

    
    if ($password !== $_POST['confirmpassword']) {
        $_SESSION['error_message'] = 'Passwords do not match.';
        header('Location: ../Views/Doctor/PatientManagement.php');
        exit();
    }

    
    if (AddPatientRecord($firstName, $lastName, $email, $password, $maritalStatus, $gender, $dateOfBirth, $spouseName, $bloodGroup, $fatherName, $motherName, $contactNo, $username)) {
        
        $_SESSION['success_message'] = 'Patient registration successful!';
        header('Location: ../Views/Doctor/PatientManagement.php');
        exit();
    } else {
        
        $_SESSION['error_message'] = 'Failed to register patient. Please try again.';
        header('Location: ../Views/Doctor/PatientManagement.php');
        exit();
    }
} else {
    
    $_SESSION['error_message'] = 'Invalid request method.';
    header('Location: ../Views/Doctor/PatientManagement.php');
    exit();
}
?>
