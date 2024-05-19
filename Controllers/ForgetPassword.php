
<?php
session_start();
require_once '../Model/User.php';
$con = getConnection();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirmPassword'] ?? '';
    $isValid = true;

    // Perform any necessary validation on username, password, and confirmPassword

    if ($isValid) {
        $stmt = $con->prepare("SELECT * FROM doctor WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            $_SESSION['usernameError'] = "User with this username doesn't exist";
            header('Location: ../Views/Home/ForgetPassword.php');
            exit();
        }

        // User exists, proceed with password update
        $stmt = $con->prepare("UPDATE doctor SET password = ? WHERE username = ?");
        $stmt->bind_param("ss", $password, $username);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            // Password updated successfully
            header('Location: ../Views/Home/Login.php');
            exit();
        } else {
            // Error updating password
            $_SESSION['passwordError'] = "Error updating password";
            header('Location: ../Views/Home/ForgetPassword.php');
            exit();
        }
    }
} else {
    // Redirect to the forget password page if accessed directly
    header('Location: ../Views/Home/ForgetPassword.php');
    exit();
}
?>
