<?php
session_start();
require_once '../Model/Doctor.php';

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];
    
    
    if (empty($currentPassword) || empty($newPassword) || empty($confirmPassword)) {
        $_SESSION['errorMessage'] = "All password fields are required.";
        header('Location: ../Views/Doctor/ChangePassword.php');
        exit();
    }

    
    if ($newPassword !== $confirmPassword) {
        $_SESSION['errorMessage'] = "New password and confirmed password do not match.";
        header('Location: ../Views/Doctor/ChangePassword.php');
        exit();
    }

    
    $username = $_SESSION['username'];

    $isValidPassword = VerifyPassword($username, $currentPassword);
    if (!$isValidPassword) {
        $_SESSION['errorMessage'] = "Invalid current password.";
        header('Location: ../Views/Doctor/ChangePassword.php');
        exit();
    }

    // Update password
    $isPasswordChanged = ChangePassword($username, $newPassword);
    if ($isPasswordChanged) {
        $_SESSION['successMessage'] = "Password changed successfully.";
        header('Location: ../Views/Doctor/Dashboard.php'); 
        exit();
    } else {
        $_SESSION['errorMessage'] = "Failed to change password. Please try again.";
        header('Location: ../Views/Doctor/ChangePassword.php');
        exit();
    }
} else {
    $_SESSION['errorMessage'] = "Invalid request.";
    header('Location: ../Views/Doctor/ChangePassword.php');
    exit();
}
?>
