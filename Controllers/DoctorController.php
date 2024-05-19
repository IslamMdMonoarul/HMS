<?php
require_once '../models/Doctor.php';
require_once '../models/db_config.php';

session_start();

class DoctorController
{
    private $conn;
    private $doc;

    public function __construct($conn)
    {
        $this->conn = $conn;
        $this->doc = new Doctor($conn);
    }

    public function getDoctors()
    {
        return $this->doc->getDoctors();
    }

}

$doctor = new DoctorController($conn);
$doctors = $doctor->getDoctors();

