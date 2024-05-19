<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}
$email = $_SESSION['email'];
$name = isset($_SESSION['name']) ? $_SESSION['name'] : 'Guest';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <?php include 'navbar.php'; ?>

    <h1 class="p-4 m-4">Welcome, <?php echo $name; ?>!</h1>

    <div class="container m-4 p-4">
        <p class="mb-2">Update your information <a href="edit.php?action=edit" class="btn btn-info btn-sm">Edit</a></p>

    </div>

</body>

</html>