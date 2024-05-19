<?php
// Include database configuration and connect to the database
require '../controllers/DoctorController.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Doctors List</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <?php include 'navbar.php'; ?>

    <div class="container">
        <h1 class="mt-4 mb-4">Doctors List</h1>

        <?php if (count($doctors) === 0): ?>
            <!-- Display a card for "No doctors available" -->
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">No Doctors Available</h5>
                    <p class="card-text">Please check back later or contact support.</p>
                </div>
            </div>
        <?php else: ?>
            <!-- Display doctors in cards using Bootstrap grid -->
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <?php foreach ($doctors as $doctor): ?>
                    <div class="col">
                        <div class="card">
                            <div class="card-body d-flex align-items-center">
                                <img src="https://placehold.co/60@3x.png" class="avatar mr-3" alt="Avatar">
                                <div>
                                    <h5 class="card-title"><?php echo $doctor['name']; ?></h5>
                                    <p class="card-text"><?php echo $doctor['speciality']; ?></p>

                                    <?php
                                    // Decode the JSON routine data
                                    $routine = json_decode($doctor['routine'], true);

                                    if ($routine && is_array($routine)) {
                                        echo '<p class="card-text"><strong>Availability:</strong></p>';
                                        echo '<ul class="list-unstyled">';
                                        foreach ($routine as $day => $time) {
                                            echo '<li>' . $day . ': ' . $time . '</li>';
                                        }
                                        echo '</ul>';

                                        // Display appointment form
                                        echo '<form action="../controllers/AppointmentController.php?action=make" method="post">';
                                        echo '<input type="hidden" name="doctor_id" value="' . $doctor['id'] . '">';
                                        echo '<div class="mb-3">';
                                        echo '<label for="appointment_date" class="form-label">Select Appointment Date:</label>';
                                        echo '<input type="date" id="appointment_date" name="appointment_date" class="form-control" required min="' . date('Y-m-d') . '">';
                                        echo '</div>';
                                        echo '<button type="submit" class="btn btn-primary">Book Appointment</button>';
                                        echo '</form>';
                                    } else {
                                        echo '<p class="card-text"><em>Availability not specified</em></p>';
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>