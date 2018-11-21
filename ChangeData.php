<?php
    include("includes/config.php");

if(!isset($_SESSION['userLoggedIn'])){
    header("Location: index.php");
}

$adminId = $_SESSION['userLoggedIn'];

if(!$adminId == "0"){
    header("Location: user.php");
}



?>