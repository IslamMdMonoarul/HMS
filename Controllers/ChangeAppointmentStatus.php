<?php
session_start();
require_once '../Model/Doctor.php'; 

if (isset($_GET['id'])) {
    $appointmentId = $_GET['id'];
    $isStatusChanged = ChangeAppointmentStatus($appointmentId);
    
    if ($isStatusChanged) {
        $_SESSION['successMessage'] = "Appointment status updated successfully.";
    } else {
        $_SESSION['errorMessage'] = "Failed to update appointment status.";
    }
} else {
    $_SESSION['errorMessage'] = "Invalid request.";
}

header('Location: ../Views/Doctor/BookAppointment.php');
exit();
?>
