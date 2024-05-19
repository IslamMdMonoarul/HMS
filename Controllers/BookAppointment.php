<?php
session_start();
require_once '../Model/Doctor.php'; 


if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // Validate form data
    $isValid = true;
    $errorMessage = "";

    if (empty($_POST['patientName'])) {
        $errorMessage .= "Patient name is required. ";
        $isValid = false;
    }

    if (empty($_POST['contactNo'])) {
        $errorMessage .= "Contact number is required. ";
        $isValid = false;
    }

    if (empty($_POST['date'])) {
        $errorMessage .= "Date is required. ";
        $isValid = false;
    }

    if (empty($_POST['time'])) {
        $errorMessage .= "Time is required. ";
        $isValid = false;
    }

    if (empty($_POST['reason'])) {
        $errorMessage .= "Reason for appointment is required. ";
        $isValid = false;
    }

    
    if (!$isValid) {
        $_SESSION['errorMessage'] = $errorMessage;
        header('Location: ../Views/Patient/BookAppointment.php');
        exit();
    }

    
    $patientName = $_POST['patientName'];
    $contactNo = $_POST['contactNo'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $reason = $_POST['reason'];
    $status = 0; 

    // Call the function to create appointment
    $isAppointmentCreated = createAppointment($patientName, $contactNo, $date, $time, $reason, $status);

    if ($isAppointmentCreated) {
        $_SESSION['successMessage'] = "Appointment created successfully!";
    } else {
        $_SESSION['errorMessage'] = "Failed to create appointment!";
    }
    
    
    header('Location: ../Views/Doctor/BookAppointment.php');
    exit();
} 
else {
    $_SESSION['errorMessage'] = "Invalid Request!";
    header('Location: ../Views/Doctor/BookAppointment.php');
    exit();
}
?>
