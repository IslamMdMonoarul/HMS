<?php

class Appointment
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function showAppointment($patientId)
    {

        $sql = "SELECT doctors.name, appointments.date, appointments.status FROM doctors JOIN appointments ON doctors.id = appointments.doctor_id WHERE appointments.patient_id = '$patientId'";

        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {

            $appointments = array();

            while ($row = $result->fetch_assoc()) {
                $appointments[] = $row;
            }
        } else {
            $appointments = array();
        }

        $result->free();

        return $appointments;
    }

    public function insertAppointment($doctorId, $patientId, $date)
    {
        $sql = "INSERT INTO appointments (doctor_id, patient_id, date) VALUES ('$doctorId', '$patientId', '$date')";

        $result = $this->conn->query($sql);

        return $result;
    }
}
