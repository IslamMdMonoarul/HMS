<?php
require '../controllers/PatientController.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Patient</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa;
        }

        .registration-container {
            max-width: 800px;
            padding: 40px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

    <div class="registration-container">
        <h2 class="text-center mb-4">Edit Patient Information</h2>
        <form id="registrationForm" action="../controllers/PatientController.php?action=update" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter first name" required
                    value="<?php echo isset($info['name']) ? $info['name'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter email" required
                    value="<?php echo isset($info['email']) ? $info['email'] : ''; ?>">
            </div>

            <div class="form-group">
                <label for="phoneNumber">Phone Number</label>
                <input type="text" class="form-control" name="phone" placeholder="Enter phone number"
                    value="<?php echo isset($info['phone']) ? $info['phone'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" placeholder="Enter address"
                    value="<?php echo isset($info['address']) ? $info['address'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" class="form-control" name="dob"
                    value="<?php echo isset($info['dob']) ? $info['dob'] : ''; ?>">
            </div>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                </div>
                <div class="col text-right">
                    <a href="../views/dashboard.php" class="btn btn-secondary btn-block">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>