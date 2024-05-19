<?php

    $dbhost = "localhost";
    $dbname = "doctor";
    $dbuser = "root";
    $dbpass = "";

    function getConnection(){
        global $dbhost;
        global $dbname;
        global $dbpass;
        global $dbuser;

        return  $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    }
?>