<?php
    //start buffer for the database
    ob_start();
    //start session for every user
    session_start();


    //setting the timezone
    $timezone = date_default_timezone_set("Europe/Stockholm");

    //conneting to the database
    $con = mysqli_connect("localhost", "root", "", "slotify");

    //if it doesn't connect
    if(mysqli_connect_errno()){
        echo "failed to connect: " . mysqli_connect_errno();
    }
?>