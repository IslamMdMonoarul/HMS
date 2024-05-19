<?php 
session_start();
require_once '../../Model/Doctor.php';

if (!isset($_SESSION['isDoctor']) || $_SESSION['isDoctor'] !== true) {
    header('Location: ../Home/Login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedbacks</title>
    <style>
        
        .main-content {
            margin-left: 250px;
            padding: 20px;
            flex-grow: 1;
            background-color: #fff;
            height: 100vh;
            overflow-y: auto;
        }

        h2 {
            margin-bottom: 20px;
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

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .no-feedback {
            font-style: italic;
        }

        .back {
            display: inline-block;
            padding: 10px 15px;
            background-color: #7FFFD4;
            color: black;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .back:hover {
            background-color: #7FFF00;
        }
    </style>
</head>
<body>
    <div class="main-content">
        <h2>Feedbacks</h2>

        <!-- Table to display all feedback entries -->
        <h3>All Feedback Entries</h3>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Feedback</th>
                    <th>Patient Name</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch all feedback entries
                $feedbackEntries = ShowAllFeedback();
                if ($feedbackEntries !== false) :
                    while ($row = $feedbackEntries->fetch_assoc()) :
                ?>
                <tr>
                    <td><?php echo $row['Id']; ?></td>
                    <td><?php echo $row['FeedBack']; ?></td>
                    <td><?php echo $row['PatientName']; ?></td>
                </tr>
                <?php
                    endwhile;
                else :
                ?>
                <tr>
                    <td colspan="3" class="no-feedback">No feedback entries found.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <a class="back" href="Dashboard.php">Go back</a>
    </div>
</body>
</html>
