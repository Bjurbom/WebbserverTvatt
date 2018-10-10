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
    <title>Admin Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/admin.css"> 

</head>
<body>

<div class="leftContainer">
</div>

<div class="header">
</div>

<div class="">

    <form action="includes/handlers/makeDate.php" method="POST">

        <h2>lägg till användare</h2>

        <p>
        <label for="lagenhetnamn">Datum</label>
        <input type="text" name="lagenhetnamn" id="lagenhetnamn" required>
        </p>

        <p>
        <label for="password">Lössenord</label>
        <input type="password" name="password" id="password" required>
        </p>

        <p>
        <label for="namn">Datum</label>
        <input type="text" name="namn" id="namn" required>
        </p>


<input type="submit">

</form>




</div>

<div class="rightContainer">
</div>

    
</body>
</html>