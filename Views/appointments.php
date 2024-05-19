<?php
require '../controllers/AppointmentController.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Appointments</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <?php include 'navbar.php'; ?>

    <div class="container">
        <h1 class="mt-5 mb-4">My Appointments</h1>

        <?php if (empty($myAppointments)): ?>
            <div class="alert alert-info" role="alert">
                No appointments found.
            </div>
        <?php else: ?>
            <div class="row">
                <?php foreach ($myAppointments as $appointment): ?>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $appointment['name']; ?></h5>
                                <p class="card-text">
                                    <strong>Status:</strong>
                                    <?php
                                    if ($appointment['status'] == true) {
                                        echo "<span class='badge badge-warning'>Opened</span>";
                                    } else {
                                        echo "<span class='badge badge-denger'>Closed</span>";
                                    }
                                    ?>
                                </p>
                                <p class="card-text">
                                    <strong>Date:</strong> <?php echo $appointment['date']; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div>

</body>

</html>