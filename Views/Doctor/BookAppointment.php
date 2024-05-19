<?php 

session_start();
require_once '../../Model/Doctor.php';
if(isset($_SESSION['isDoctor']) && $_SESSION['isDoctor'] == true){
    
}
else{
    header('Location: ../Home/Login.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Booking</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 20px;
}

.card {
    max-width: 400px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}

.card h3 {
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 15px;
}

label {
    font-weight: bold;
}

input[type="text"],
input[type="date"],
input[type="time"],
textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 10px;
}

input[type="submit"] {
    background-color: #7FFFD4;
            color: black;
    border: none;
    padding: 12px 20px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
    display: block;
    width: 100%;
    text-align: center;
    text-decoration: none;
    margin-top: 25px;
    box-sizing: border-box;
}

input[type="submit"]:hover {
    background-color: #7FFF00;
}
.back {
    background-color: #7FFFD4;
            color: black;
    border: none;
    padding: 12px 20px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
    display: block;
    width: 60%;
    text-align: center;
    text-decoration: none;
    margin: 25px auto;
    box-sizing: border-box;
    justify-content:center;
}

.back:hover {
    background-color: #7FFF00;
}

.error-message {
    color: red;
    margin-top: 5px;
   
}

.success-message {
    color: green;
    margin-top: 5px;
   
}



table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}


button{
    background-color: #7FFFD4;
            color: black;
            border:none;
}
button:hover{
    background-color: #7FFF00;
}
 a{
    text-decoration:none;
    color: black;
    
}
    </style>
</head>
<body>
<div class="card">
    <h3>Add New Appointment</h3>
    <form action="../../Controllers/BookAppointment.php" method="POST" onclick="return validateForm()">
        <div class="form-group">
            <label for="patientName">Patient Name:</label><br>
            <input type="text" id="patientName" name="patientName"><br><br>
        </div>

        <div class="form-group">
            <label for="contactNo">Contact Number:</label><br>
            <input type="text" id="contactNo" name="contactNo"><br><br>
        </div>

        <div class="form-group">
            <label for="date">Date:</label><br>
            <input type="date" id="date" name="date"><br><br>
        </div>

        <div class="form-group">
            <label for="time">Time:</label><br>
            <input type="time" id="time" name="time"><br><br>
        </div>

        <div class="form-group">
            <label for="reason">Reason for Appointment:</label><br>
            <textarea id="reason" name="reason" rows="4" cols="50"></textarea><br><br>
        </div>

        <input type="submit" value="Book Appointment"><br>
       
        <br>
        <?php  
    if(isset($_SESSION['successMessage'])) {
        echo '<span class="success-message">' . $_SESSION['successMessage'] . '</span>';
        unset($_SESSION['successMessage']);
    } else if (isset($_SESSION['errorMessage'])) {
        echo '<span class="error-message">' . $_SESSION['errorMessage'] . '</span>';
        unset($_SESSION['errorMessage']);
    }
?>
<br>
<span id="error"></span>

    </form>
  <a class="back" href="Dashboard.php">Go back</a>
</div>


    <!-- Table to display all appointments -->
    <h3>All Appointments</h3>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Patient Name</th>
                <th>Contact Number</th>
                <th>Date</th>
                <th>Time</th>
                <th>Reason</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch all appointments
            $appointments = ShowAllAppointments();
            if ($appointments !== false) :
                while ($row = $appointments->fetch_assoc()) :
            ?>
            <tr>
                <td><?php echo $row['Id']; ?></td>
                <td><?php echo $row['PatientName']; ?></td>
                <td><?php echo $row['ContactNo']; ?></td>
                <td><?php echo $row['Date']; ?></td>
                <td><?php echo date('h:i A', strtotime($row['Time'])); ?></td>

                <td><?php echo $row['Reason']; ?></td>
                <td><?php echo ($row['Status'] == 0 ? "Pending" : "Completed"); ?></td>
                <td>
                <?php if ($row['Status'] == 0): ?>

                    <button>
                    <a href="../../Controllers/ChangeAppointmentStatus.php?id=<?php echo $row['Id']; ?>">Mark As Complete</a>
                    <?php endif; ?>

                    </button>
        
                    <button><a href="../../Controllers/DeleteAppointment.php?id=<?php echo $row['Id']; ?>">Delete</a></button>
                </td>
            </tr>
            <?php
                endwhile;
            else :
            ?>
            <tr>
                <td colspan="8">No appointments found.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <script src="../Js/BookAppointment.js"></script>
</body>
</html>