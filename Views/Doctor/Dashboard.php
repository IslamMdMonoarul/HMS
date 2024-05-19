<?php 
session_start();

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
    <title>Doctor - Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #008B8B;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .sidebar {
            width: 250px;
            background-color: #2F4F4F;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar h1 {
            color: #fff;
            text-align: center;
            margin-bottom: 30px;
        }

        .sidebar .dashboard-links {
            list-style-type: none;
            padding: 0;
        }

        .sidebar .dashboard-links li {
            margin-bottom: 10px;
        }

        .sidebar .dashboard-links li a {
            display: block;
            padding: 10px;
            background-color: #7FFFD4;
            color: black;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
            text-align: center;
        }

        .sidebar .dashboard-links li a:hover {
            background-color: #7FFF00;
        }

        .main-content {
            padding: 20px;
            flex-grow: 1;
            background-color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .main-content img {
            max-width: 100 vh; /* Adjust the size as needed */
            border-radius: 8px;
            margin-left: 80px;
            align-items: center;
            
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h1>Welcome, <?php echo $_SESSION['username'] ?></h1>
        <ul class="dashboard-links">
            <?php 
            if(isset($_SESSION['isDoctor']) && $_SESSION['isDoctor'] == true)
            {
                echo '<li><a href="Profile.php">Profile</a></li>';
                echo '<li><a href="BookAppointment.php">Appointments</a></li>';
                echo '<li><a href="PatientManagement.php">Patients</a></li>';
                echo '<li><a href="Prescription.php">Prescriptions</a></li>';
                echo '<li><a href="LabTest.php">Lab Test</a></li>';
                echo '<li><a href="SupportTickets.php">Support Tickets</a></li>';
                echo '<li><a href="FeedBack.php">Feedback</a></li>';
                echo '<li><a href="ChangePassword.php">Change Password</a></li>';
                echo '<li><a href="../../Controllers/Logout.php">Logout</a></li>';
            }
            else
            {
                echo '<a href="Login.php">Login</a>';
            }
            ?>
        </ul>
    </div>
    <div class="main-content">
        
    
        <img src="https://assets.materialup.com/uploads/28c6cd89-08c5-496e-8e73-76436d63a5f5/preview.png" alt="Doctor's image">
    </div>
</body>
</html>
