<?php 
require_once 'Db.php';
function ShowProfile($Username)
{
    $con = getConnection();
    $sql = "SELECT * FROM doctor WHERE Username = '$Username'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) 
    {
        return $result;
    } 
    else 
    {
        return false;
    }
}

function UpdateDoctorProfile($username, $fullName, $gender, $contactNo, $email, $address, $speciality)
{
    $con = getConnection();
    
    
    $sql = "UPDATE doctor SET FullName = '$fullName', Gender = '$gender', ContactNo = '$contactNo', Email = '$email', Address = '$address', Speciality = '$speciality' WHERE Username = '$username'";
    
    if ($con->query($sql) === TRUE) {
        return true; 
    } else {
        return false; 
    }
}

//verify current password
function VerifyPassword($username, $password) {
    $con = getConnection();
    $sql = "SELECT * FROM doctor WHERE Username = '$username' AND Password = '$password'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}


function ChangePassword($username, $newPassword) {
    $con = getConnection();
    
    $sql = "UPDATE doctor SET Password = '$newPassword' WHERE Username = '$username'";
    if ($con->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

//change appointment status
function ChangeAppointmentStatus($appointmentId) 
{
    $con = getConnection();
    
    $sql = "UPDATE appointment SET Status = '1' WHERE Id = '$appointmentId'";
    if ($con->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

//delete appointment
function DeleteAppointment($appointmentId) 
{
    $con = getConnection();
    
    $sql = "DELETE FROM appointment WHERE Id = '$appointmentId'";
    if ($con->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}


function AddPatientRecord($firstName, $lastName, $email, $password, $maritalStatus, $gender, $dateOfBirth, $spouseName, $bloodGroup, $fatherName, $motherName, $contactNo, $username) 
{
    $con = getConnection();
    
    $sql = "INSERT INTO patient (FirstName, LastName, Email, Password, MaritalStatus,Gender, DateOfBirth, SpouseName, BloodGroup, FatherName, MotherName, Status, ContactNo, Username) 
            VALUES ('$firstName', '$lastName', '$email', '$password', '$maritalStatus', '$gender', '$dateOfBirth', '$spouseName', '$bloodGroup', '$fatherName', '$motherName', '1', '$contactNo', '$username')";

    if ($con->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
    
}

//delete patient
function DeletePatient($patientId) 
{
    $con = getConnection();
    
    $sql = "DELETE FROM patient WHERE Id = '$patientId'";
    if ($con->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

//update patient record
function UpdatePatientRecord($patientId, $firstName, $lastName, $email, $maritalStatus, $gender, $dateOfBirth, $spouseName, $bloodGroup, $fatherName, $motherName, $contactNo, $username) 
{
    $con = getConnection();
    
    $sql = "UPDATE patient SET FirstName = '$firstName', LastName = '$lastName', Email = '$email', MaritalStatus = '$maritalStatus, Gender = '$gender', DateOfBirth = '$dateOfBirth', SpouseName = '$spouseName', BloodGroup = '$bloodGroup', FatherName = '$fatherName', MotherName = '$motherName', ContactNo = '$contactNo', Username = '$username' WHERE Id = '$patientId'";

    if ($con->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    
}
}

function createAppointment($patientName, $contactNo, $date, $time, $reason, $status) {
    $con = getConnection();
    
    
    $sql = "INSERT INTO appointment (PatientName, ContactNo, Date, Time, Reason, Status) 
            VALUES ('$patientName', '$contactNo', '$date', '$time', '$reason', '$status')";
    
    
    if ($con->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}


function ShowAllAppointments() 
{
    $con = getConnection();
    $sql = "SELECT * FROM appointment";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

//show all support tickets
function ShowAllSupportTickets() 
{
    $con = getConnection();
    $sql = "SELECT * FROM supporttickets";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

//mark support ticket as solved
function MarkTicketAsSolved($ticketId) 
{
    $con = getConnection();
    
    $sql = "UPDATE supporttickets SET Status = 'Solved' WHERE Id = '$ticketId'";
    if ($con->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

//delete support ticket
function DeleteSupportTicket($ticketId) 
{
    $con = getConnection();
    
    $sql = "DELETE FROM supporttickets WHERE Id = '$ticketId'";
    if ($con->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

//show all feedbacks
function ShowAllFeedback() 
{
    $con = getConnection();
    $sql = "SELECT * FROM feedback";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

//ShowAllPrescriptions
function ShowAllPrescriptions() 
{
    $con = getConnection();
    $sql = "SELECT * FROM prescriptions";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

//AddPrescription
function AddPrescription($patientName, $dateIssued, $prescriptionText) 
{
    $con = getConnection();
    
    $sql = "INSERT INTO prescriptions (PatientName, DateIssued,PrescriptionText,PrescriptionStatus) 
            VALUES ('$patientName','$date', '$prescriptionText','Active')";
    
    if ($con->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

//delete prescription
function DeletePrescription($prescriptionId) 
{
    $con = getConnection();
    
    $sql = "DELETE FROM prescriptions WHERE Id = '$prescriptionId'";
    if ($con->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

//ShowAllLabTests

function ShowAllLabTests() 
{
    $con = getConnection();
    $sql = "SELECT * FROM labtests";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

//AddLabTest

function AddLabTest($testName, $patientName, $testDescription, $testCost) 
{
    $con = getConnection();
    
    $sql = "INSERT INTO labtests (TestName, PatinetName, TestDescription, TestCost) 
            VALUES ('$testName', '$patientName', '$testDescription', '$testCost')";
    
    if ($con->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

//DeleteLabTest

function DeleteLabTest($labTestId) 
{
    $con = getConnection();
    
    $sql = "DELETE FROM labtests WHERE Id = '$labTestId'";
    if ($con->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}









?>