<?php
session_start();
require_once '../Model/Doctor.php';

if (isset($_GET['id'])) {
    $ticketId = $_GET['id'];
    $isDeleted = DeleteSupportTicket($ticketId);

    if ($isDeleted) {
        $_SESSION['success'] = "Support ticket deleted successfully.";
    } else {
        $_SESSION['errorMessage'] = "Failed to delete support ticket.";
    }
} else {
    $_SESSION['errorMessage'] = "Invalid request.";
}

header('Location: ../Views/Doctor/SupportTickets.php');
exit();
?>
