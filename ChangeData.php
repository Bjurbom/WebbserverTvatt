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


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Change Data</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    
</body>
</html>