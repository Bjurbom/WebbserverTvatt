<?php 
    include("includes/config.php");
    include("includes/classes/Constants.php");  
    include("includes/classes/Account.php");
    
    //make a acount with the connection of the database
     $account = new Account($con);
     
    
    include("includes/handlers/register-handler.php");



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

    <form action="admin.php" method="POST">

        <h2>lägg till användare</h2>

        <p>
        <label for="lagenhetnummer">lagenhetsnummer</label>
        <input type="text" name="lagenhetnummer" id="lagenhetnummer" required>
        </p>

        <p>
        <label for="password">Lössenord</label>
        <input type="password" name="password" id="password" required>
        </p>

        <p>
        <label for="namn">Namn</label>
        <input type="text" name="namn" id="namn" required>
        </p>

        <p>
        <label for="adress">Adress</label>
        <input type="text" name="adress" id="adress" required>
        </p>


<button type="submit" name="registerButton">Lägg in användare</button>

</form>




</div>

<div class="rightContainer">
</div>

    
</body>
</html>