<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        h1 {
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
        input[type="email"],
        input[type="password"],
        select,
        input[type="date"] {
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
        .error-message {
            color: red;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <h1>Patient Registration</h1>
    <div class="card">
        <form action="../../Controllers/AddPatient.php" method="POST" onsubmit="return validateForm()" novalidate>
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" required><br>

            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>

            <label for="confirmpassword">Confirm Password:</label>
            <input type="password" id="confirmpassword" name="confirmpassword"><br>

            <label for="maritalStatus">Marital Status:</label>
            <select id="maritalStatus" name="maritalStatus">
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="Divorced">Divorced</option>
                <option value="Widowed">Widowed</option>
            </select><br>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select><br>

            <label for="dateOfBirth">Date of Birth:</label>
            <input type="date" id="dateOfBirth" name="dateOfBirth" required><br>

            <label for="spouseName">Spouse Name:</label>
            <input type="text" id="spouseName" name="spouseName"><br>

            <label for="bloodGroup">Blood Group:</label>
            <input type="text" id="bloodGroup" name="bloodGroup"><br>

            <label for="fatherName">Father's Name:</label>
            <input type="text" id="fatherName" name="fatherName"><br>

            <label for="motherName">Mother's Name:</label>
            <input type="text" id="motherName" name="motherName"><br>

            <label for="contactNo">Contact Number:</label>
            <input type="text" id="contactNo" name="contactNo" required><br>

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br>

            <input type="submit" value="Register">
            <div class="error-message" id="error-message"></div>
        </form>
        <a class="back" href="Dashboard.php">Go back</a>
    </div>

    <script src="../Js/Patient.js"></script>
</body>
</html>
