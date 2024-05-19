<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Mangement System</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body style="padding-right:7rem;padding-left:7rem;">

    <header style="margin-top:3rem;margin-bottom:3rem;">
        <?php include("../model/nav.php");?>
    </header>

    <main>
        <section>
            <div style="background-color:#3498DB;display:flex;justify-content: space-between;
        border-radius: 50% 20% / 10% 40%;">
                <div style="padding-left:3rem;margin-top:9rem">
                    <h1 style="color:white;font-size:25px;margin-bottom:10px">Welcome to the Hospital.</h1>
                    <p style="color:white;font-size:20px">Always at your service. Need any medical attension?
                        We are always there for you. <br> To continue-</p>
                    <a style="text-decoration:none;" href="../view/signUp.php">
                        <button style="margin-top:1rem;">Sign Up</button></a>
                </div>
                <div>
                    <img style="width:90%;" src="images/doctor.png" alt="">
                </div>
            </div>
        </section>
    </main>
    <!-- footer -->
    <?php include("../model/footer.php");?>

</body>

</html>