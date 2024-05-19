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
    <title>Support Tickets</title>
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

        button {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        button a {
            color: white;
            text-decoration: none;
        }

        button:hover {
            background-color: #45a049;
        }

        .no-tickets {
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
        <h2>Support Tickets</h2>

        <!-- Table to display all support tickets -->
        <h3>All Support Tickets</h3>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Issue</th>
                    <th>Patient Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch all support tickets
                $tickets = ShowAllSupportTickets();
                if ($tickets !== false) :
                    while ($row = $tickets->fetch_assoc()) :
                ?>
                <tr>
                    <td><?php echo $row['Id']; ?></td>
                    <td><?php echo $row['Issue']; ?></td>
                    <td><?php echo $row['PatientName']; ?></td>
                    <td><?php echo $row['Status']; ?></td>
                    <td>
                        <?php if ($row['Status'] == 'Pending'): ?>
                            <button>
                                <a href="../../Controllers/MarkTicketSolved.php?id=<?php echo $row['Id']; ?>">Mark As Solved</a>
                            </button>
                        <?php endif; ?>

                        <button><a href="../../Controllers/DeleteTicket.php?id=<?php echo $row['Id']; ?>">Delete</a></button>
                    </td>
                </tr>
                <?php
                    endwhile;
                else :
                ?>
                <tr>
                    <td colspan="5" class="no-tickets">No support tickets found.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <a class="back" href="Dashboard.php">Go back</a>
    </div>
</body>
</html>
