<?php

class Doctor
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getDoctors()
    {
        $sql = "SELECT * FROM doctors";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $doctors = array();
            while ($row = $result->fetch_assoc()) {
                $doctors[] = $row;
            }
        } else {
            $doctors = array();
        }

        $result->free();
        $this->conn->close();

        return $doctors;

    }
}
?>