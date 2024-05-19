<?php
session_start();
require_once '../Model/Doctor.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['fullName']) && isset($_POST['gender']) && isset($_POST['contactNo']) && isset($_POST['email']) && isset($_POST['address']) && isset($_POST['speciality'])) {
        $username = $_SESSION['username']; 
        
        $fullName = $_POST['fullName'];
        $gender = $_POST['gender'];
        $contactNo = $_POST['contactNo'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $speciality = $_POST['speciality'];
        
        $isUpdateSuccessful = UpdateDoctorProfile($username, $fullName, $gender, $contactNo, $email, $address, $speciality);
        
        if ($isUpdateSuccessful) {
            $_SESSION['successMessage'] = "Profile updated successfully!";
            header('Location: ../Views/Doctor/Dashboard.php');
            exit();
        } else {
            $_SESSION['errorMessage'] = "Failed to update profile. Please try again.";
            header('Location: ../Views/Doctor/Profile.php');
            exit();
        }
    } else {
        $_SESSION['errorMessage'] = "Invalid form submission. Please fill all required fields.";
        header('Location: ../Views/Doctor/Profile.php');
        exit();
    }
} else {
    $_SESSION['errorMessage'] = "Invalid Request!";
    header('Location: ../Views/Doctor/Profile.php');
    exit();
}
?>
