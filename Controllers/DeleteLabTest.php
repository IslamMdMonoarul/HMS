<?php
session_start();
require_once '../Model/Doctor.php';

if (isset($_GET['id'])) {
    $testID = $_GET['id'];
    $isDeleted = DeleteLabTest($testID);

    if ($isDeleted) {
        $_SESSION['successMessage'] = "Lab test deleted successfully.";
    } else {
        $_SESSION['errorMessage'] = "Failed to delete lab test.";
    }
} else {
    $_SESSION['errorMessage'] = "Invalid request.";
}

// Redirect back to the lab tests view
header('Location: ../Views/Doctor/LabTest.php');
exit();
?>
