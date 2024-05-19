<?php
session_start();
require_once '../Model/Doctor.php';

// Check if ID is provided in the URL
if (isset($_GET['id'])) {
    $prescriptionId = $_GET['id'];
    $isDeleted = DeletePrescription($prescriptionId);

    if ($isDeleted) {
        $_SESSION['successMessage'] = "Prescription deleted successfully.";
    } else {
        $_SESSION['errorMessage'] = "Failed to delete prescription.";
    }
} else {
    $_SESSION['errorMessage'] = "Invalid request.";
}

// Redirect back to the prescription management view
header('Location: ../Views/Doctor/Prescription.php');
exit();
?>
