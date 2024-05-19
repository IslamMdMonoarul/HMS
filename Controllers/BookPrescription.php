<?php
session_start();
require_once '../Model/Doctor.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract form data
    $patientName = $_POST['patientName'];
    $dateIssued = $_POST['dateIssued'];
    $prescriptionText = $_POST['prescriptionText'];

    // Call function to add prescription
    $isAdded = AddPrescription($patientName, $dateIssued, $prescriptionText);

    if ($isAdded) {
        $_SESSION['successMessage'] = "Prescription added successfully.";
    } else {
        $_SESSION['errorMessage'] = "Failed to add prescription.";
    }
} else {
    $_SESSION['errorMessage'] = "Invalid request.";
}

// Redirect back to the prescription management view
header('Location: ../Views/Doctor/Prescription.php');
exit();
?>
