<?php
session_start();
require_once '../models/db_config.php';
require_once '../models/Appointment.php';

class AppointmentController
{
    private $conn;
    public $appointment;

    public $patientId;

    public function __construct($conn)
    {
        $this->conn = $conn;
        $this->appointment = new Appointment($conn);

        if (isset($_SESSION['id'])) {
            $this->patientId = $_SESSION['id'];
        } else {
            header('Location: ../views/login.php');
            exit();
        }
    }

    public function makeAppointment($patientId)
    {

        $doctorId = $_POST['doctor_id'];
        $date = $_POST['appointment_date'];

        if ($patientId !== 0) {
            $result = $this->appointment->insertAppointment($doctorId, $patientId, $date);
            if ($result) {
                echo "<script>alert('Appointed successfully.')</script>";
                echo "<script>window.location.href = '../views/appointments.php?action=showAppointment';</script>";
            } else {
                echo "<script>alert('Appointment failed. Please try again.')</script>";
                echo "<script>window.location.href = '../views/doctors.php';</script>";
            }
        } else {
            echo "Patient not found.";
        }
    }

}


$app = new AppointmentController($conn);


if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'make':
            $app->makeAppointment($app->patientId);
            break;
        case 'showAppointment':
            $myAppointments = $app->appointment->showAppointment($app->patientId);
            break;
        default:
            echo "Invalid action.";
            break;
    }
} else {
    echo "Action parameter missing.";
}
