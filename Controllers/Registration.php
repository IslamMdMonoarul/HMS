<?php
session_start();
require_once '../Model/User.php';
$con = getConnection();
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $isValid = true;

    if (empty($username)) {
        $_SESSION['usernameErrorMsg'] = "Username is required";
        $isValid = false;
    }

    if (empty($email)) {
        $_SESSION['emailErrorMsg'] = "Email is required";
        $isValid = false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['emailErrorMsg'] = "Invalid email format";
        $isValid = false;
    }

    if (empty($password)) {
        $_SESSION['passwordErrorMsg'] = "Password is required";
        $isValid = false;
    }

    if (!$isValid) {
        header('Location: ../Views/Home/Registration.php');
        exit;
    }


    $stmt = $con->prepare("SELECT * FROM doctor WHERE username = ? OR email = ?");
    if ($stmt === false) {
        $_SESSION['Error'] = "SQL error: " . $con->error;
        header('Location: ../Views/Home/Registration.php');
        exit();
    }

    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        if ($row['username'] === $username) {
            $_SESSION['usernameErrorMsg'] = "Username already exists";
        }
        if ($row['email'] === $email) {
            $_SESSION['emailErrorMsg'] = "Email already exists";
        }
        header('Location: ../Views/Home/Registration.php');
        exit();
    }



    $stmt = $con->prepare("INSERT INTO doctor (username, email, password) VALUES (?, ?, ?)");
    if ($stmt === false) {
        $_SESSION['Error'] = "SQL error: " . $con->error;
        header('Location: ../Views/Home/Registration.php');
        exit();
    }

    $stmt->bind_param("sss", $username, $email, $password);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $_SESSION['username'] = $username;
        header('Location: ../Views/Home/Login.php');
        exit();
    } else {
        $_SESSION['Error'] = "Registration failed. User might already exist or other error.";
        header('Location: ../Views/Home/Registration.php');
        exit();
    }

    $stmt->close();
    $con->close();
} else {
    echo "Invalid Request";
}
