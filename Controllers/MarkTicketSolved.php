<?php
session_start();
require_once '../Model/Doctor.php';

if (isset($_GET['id'])) {
    $ticketId = $_GET['id'];
    $isStatusChanged = MarkTicketAsSolved($ticketId);

    if ($isStatusChanged) {
        $_SESSION['successMessage'] = "Support ticket status updated successfully.";
    } else {
        $_SESSION['errorMessage'] = "Failed to update support ticket status.";
    }
} else {
    $_SESSION['errorMessage'] = "Invalid request.";
}

header('Location: ../Views/Doctor/SupportTickets.php');
exit();
?>
