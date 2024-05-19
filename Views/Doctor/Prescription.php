<?php
session_start();
require_once '../../Model/Doctor.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescription Management</title>
    <style>
           body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        h2 {
            text-align: center;
            margin-top: 30px;
        }

        .card {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="date"],
        textarea {
            width: calc(100% - 16px); /* Adjusted for padding */
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
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

        .status-pending {
            color: orange;
        }

        .status-completed {
            color: green;
        }

        .status-inactive {
            color: red;
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
<h2>Prescription Management</h2>
    <div class="card">
        <h3>Add New Prescription</h3>
        <form action="../../Controllers/BookPrescription.php" method="POST" onsubmit="return validateForm()">
            <label for="patientName">Patient Name:</label><br>
            <input type="text" id="patientName" name="patientName"><br>

            <label for="dateIssued">Date Issued:</label><br>
            <input type="date" id="dateIssued" name="dateIssued"><br>

            <label for="prescriptionText">Prescription Text:</label><br>
            <textarea id="prescriptionText" name="prescriptionText" rows="4" cols="50"></textarea><br>

            <input type="submit" value="Add Prescription"><br>
            <?php  
    if(isset($_SESSION['successMessage'])) {
        echo '<span class="success-message">' . $_SESSION['successMessage'] . '</span>';
        unset($_SESSION['successMessage']);
    } else if (isset($_SESSION['errorMessage'])) {
        echo '<span class="error-message">' . $_SESSION['errorMessage'] . '</span>';
        unset($_SESSION['errorMessage']);
    }
?> <br>
        </form>
        <a class="back" href="Dashboard.php">Go back</a>
    </div>

    <!-- Table to display all prescriptions -->
    <h3>All Prescriptions</h3>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Patient Name</th>
                <th>Date Issued</th>
                <th>Prescription Text</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch all prescriptions
            $prescriptions = ShowAllPrescriptions();
            if ($prescriptions !== false) :
                while ($row = $prescriptions->fetch_assoc()) :
            ?>
            <tr>
                <td><?php echo $row['Id']; ?></td>
                <td><?php echo $row['PatientName']; ?></td>
              
                <td><?php echo $row['DateIssued']; ?></td>
                <td><?php echo $row['PrescriptionText']; ?></td>
                <td class="status-<?php echo strtolower($row['PrescriptionStatus']); ?>"><?php echo ucfirst($row['PrescriptionStatus']); ?></td>
                <td>
                    
                    <button><a href="../../Controllers/DeletePrescription.php?id=<?php echo $row['Id']; ?>">Delete</a></button>
                </td>
            </tr>
            <?php
                endwhile;
            else :
            ?>
            <tr>
                <td colspan="7">No prescriptions found.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <script src="../Js/Prescription.js"></script>
</body>
</html>
