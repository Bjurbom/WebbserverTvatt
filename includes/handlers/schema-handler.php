<?php

    $agare = $_SESSION['userLoggedIn'];

    $query = null;  

    $query = mysqli_fetch_row($con, "SELECT * FROM `users` WHERE `lagenhetsnummer`='$agera'");

    print_r($query);

?>