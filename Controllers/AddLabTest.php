<?php
session_start();
require_once '../Model/Doctor.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract form data
    $testName = $_POST['testName'];
    $patientName = $_POST['patientName'];
    $testDescription = $_POST['testDescription'];
    $testCost = $_POST['testCost'];

    // Call function to add lab test
    $isAdded = AddLabTest($testName, $patientName, $testDescription, $testCost);

    if ($isAdded) {
        $_SESSION['successMessage'] = "Lab test added successfully.";
    } else {
        $_SESSION['errorMessage'] = "Failed to add lab test.";
    }
} else {
    $_SESSION['errorMessage'] = "Invalid request.";
}

// Redirect back to the lab tests view
header('Location: ../Views/Doctor/LabTest.php');
exit();
?>
