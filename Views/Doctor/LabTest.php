<?php 
session_start();
require_once '../../Model/Doctor.php'; // Assuming you have a LabTest.php model

// Fetch all lab tests
$labTests = ShowAllLabTests();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Tests</title>
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
<h2>Lab Tests</h2>
    <div class="card">
        <h3>Add New Lab Test</h3>
        <form action="../../Controllers/AddLabTest.php" method="POST" onsubmit="return validateForm()">
            <label for="testName">Test Name:</label><br>
            <input type="text" id="testName" name="testName"><br>

            <label for="patientName">Patient Name:</label><br>
            <input type="text" id="patientName" name="patientName"><br>

            <label for="testDescription">Test Description:</label><br>
            <textarea id="testDescription" name="testDescription" rows="4" cols="50"></textarea><br>

            <label for="testCost">Test Cost:</label><br>
            <input type="text" id="testCost" name="testCost"><br>

            <input type="submit" value="Add Lab Test"> <br>
            <?php  
    if(isset($_SESSION['successMessage'])) {
        echo '<span class="success-message">' . $_SESSION['successMessage'] . '</span>';
        unset($_SESSION['successMessage']);
    } else if (isset($_SESSION['errorMessage'])) {
        echo '<span class="error-message">' . $_SESSION['errorMessage'] . '</span>';
        unset($_SESSION['errorMessage']);
    }
?><br>
        </form>
        <a class="back" href="Dashboard.php">Go back</a>
    </div>

    <!-- Table to display all lab tests -->
    <h3>All Lab Tests</h3>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Test Name</th>
                <th>Patient Name</th>
                <th>Test Description</th>
                <th>Test Cost</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($labTests !== false) :
                while ($row = $labTests->fetch_assoc()) :
            ?>
            <tr>
                <td><?php echo $row['Id']; ?></td>
                <td><?php echo $row['TestName']; ?></td>
                <td><?php echo $row['PatinetName']; ?></td>
                <td><?php echo $row['TestDescription']; ?></td>
                <td><?php echo $row['TestCost']; ?></td>
                <td>
                    
                    <button><a href="../../Controllers/DeleteLabTest.php?id=<?php echo $row['Id']; ?>">Delete</a></button>
                </td>
            </tr>
            <?php
                endwhile;
            else :
            ?>
            <tr>
                <td colspan="6">No lab tests found.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <script src="../Js/LabTest.js"></script>
</body>
</html>
