<?php
session_start();
require_once '../models/db_config.php';
require_once '../models/Patient.php';

class PatientController
{
    private $conn;
    private $reg;

    public function __construct($conn)
    {
        $this->conn = $conn;
        $this->reg = new Patient($conn);

    }
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $dob = $_POST['dob'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];

            if (empty($name) || empty($email) || empty($password)) {
                echo "<script>alert('Email, password and name are required')</script>";
                header("refresh:0;url=../views/register.php");
                exit;
            }

            $user = $this->reg->register($name, $email, $password, $phone, $address, $dob);

            if ($user) {
                echo "<script>alert('Registration successful. you can login now.')</script>";
                echo "<script>window.location.href = '../views/login.php';</script>";
                exit;
            } else {
                echo "<script>alert('Registration failed. Please try again.')</script>";
                echo "<script>window.location.href = '../views/register.php';</script>";
            }
        } else {
            echo "Invalid request.";
        }
    }
    public function updatePatient($id)
    {
        if ($id === 0) {
            echo "<script>alert('Patient not found.')</script>";
            header("refresh:0;url=../views/dashboard.php");
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $name = $_POST['name'];
            $email = $_POST['email'];
            $dob = $_POST['dob'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];

            if (empty($name) || empty($email)) {
                echo "<script>alert('Email,  name are required')</script>";
                header("refresh:0;url=../views/edit.php?action=edit");
                exit;
            }

            $user = $this->reg->update($id, $name, $email, $phone, $address, $dob);

            if ($user) {
                $_SESSION['id'] = $id;
                $_SESSION['email'] = $email;
                $_SESSION['name'] = $user['name'];
                echo "<script>alert('Updated, re login please')</script>";
                echo "<script>window.location.href = '../views/dashboard.php';</script>";
                exit;
            } else {
                echo "Registration failed. Please try again.";
            }
        } else {
            echo "Invalid request.";
        }
    }

    public function editPatient()
    {
        $patientId = $_SESSION['id'];
        if ($patientId === 0) {
            echo "<script>alert('Patient not found.')</script>";
            header("refresh:0;url=../views/dashboard.php");
            exit;
        }
        return $this->reg->edit($patientId);
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $authenticated = $this->reg->login($email, $password);

            if ($authenticated) {
                $_SESSION['email'] = $email;
                $_SESSION['id'] = $authenticated['id'];
                $_SESSION['name'] = $authenticated['name'];
                echo "<script>window.location.href = '../views/dashboard.php';</script>";
                exit;
            } else {

                echo "<script>alert('Invalid email or password. Please try again.')</script>";
                header("refresh:0;url=../views/login.php");
                exit;
            }
        } else {
            echo "Invalid request.";
        }
    }

    public function logout()
    {
        session_destroy();
        header("Location: ../views/login.php");
        exit;
    }


}

$registrationController = new PatientController($conn);

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'register':
            $registrationController->register();
            break;
        case 'login':
            $registrationController->login();
            break;
        case 'logout':
            $registrationController->logout();
            break;
        case 'edit':
            $info = $registrationController->editPatient();
            break;
        case 'update':
            $id = $_SESSION['id'];
            $registrationController->updatePatient($id);
            break;
        default:
            echo "Invalid action.";
            break;
    }
} else {
    echo "Action parameter missing.";
}

