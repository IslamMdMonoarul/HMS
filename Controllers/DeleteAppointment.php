<?php
session_start();
require_once '../Model/Doctor.php'; 

if (isset($_GET['id'])) {
    $appointmentId = $_GET['id'];
    $isDeleted = DeleteAppointment($appointmentId);
    
    if ($isDeleted) {
        $_SESSION['successMessage'] = "Appointment deleted successfully.";
    } else {
        $_SESSION['errorMessage'] = "Failed to delete appointment.";
    }
} else {
    $_SESSION['errorMessage'] = "Invalid request.";
}

header('Location: ../Views/Doctor/BookAppointment.php');
exit();
?>
