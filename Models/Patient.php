<?php

class Patient
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function register($name, $email, $password, $phone, $address, $dob)
    {
        $existingEmailQuery = "SELECT COUNT(*) AS count FROM patients WHERE email = '$email'";
        $existingEmailResult = $this->conn->query($existingEmailQuery);

        if ($existingEmailResult && $existingEmailResult->num_rows > 0) {
            $row = $existingEmailResult->fetch_assoc();
            if ($row['count'] > 0) {
                return false;
            }
        }
        $sql = "INSERT INTO patients (name, email, password, phone, address, dob) VALUES ('$name', '$email', '$password', '$phone', '$address', '$dob')";
        $result = $this->conn->query($sql);

        return $result;
    }


    public function update($id, $name, $email, $phone, $address, $dob)
    {
        $sql = "UPDATE patients SET name = '$name', email = '$email', phone = '$phone', address = '$address', dob = '$dob' WHERE id = $id";

        $result = $this->conn->query($sql);

        return $result;
    }


    public function login($email, $password)
    {

        $sql = "SELECT * FROM patients WHERE email = '$email' AND password = '$password'";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if ($password === $user['password']) {
                return $user;
            } else {
                return null;
            }
        } else {
            return false;
        }
    }

    public function edit($patientId)
    {
        $sql = "SELECT * FROM patients WHERE id = '$patientId'";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            return $user;
        } else {
            return false;
        }
    }

}
?>