<?php

    $agare = $_SESSION['userLoggedIn'];

    $queryl = null;  

    $queryl = mysqli_query($con, "SELECT * FROM `users` WHERE `lagenhetsnummer`='$agera'");

    

?>