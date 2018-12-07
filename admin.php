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

<div id="box">

    <form action="admin.php" method="POST" enctype="multipart/form-data">

        <h2>lägg till användare</h2>

        <p>
        <label for="lagenhetnummer">Lägenhetsnummer</label>
        <input type="text" name="lagenhetnummer" class="inputBox" required>
        </p>

        <p>
        <label for="password">Lössenord</label>
        <input type="password" name="password" class="inputBox" required>
        </p>

        <p>
        <label for="namn">Namn</label>
        <input type="text" name="namn" class="inputBox" required>
        </p>

        <p>
        <label for="adress">Adress</label>
        <input type="text" name="adress" class="inputBox" required>
        </p>

        <p>
        <label for="file"> Välj bild </label>
        <input type="file" name="fileToUpload" id="fileToUpload">

        </p>

<button type="submit" name="registerButton">Lägg in användare</button>

</form>







<form action="includes/handlers/removeUser-handler.php" method="POST">

<h2>Ta bort användare</h2>

<p>
<label for="lagenhetnummer">lägenhetsnummer</label>
<input type="text" name="lagenhetnummer" class="inputBox" required>
</p>





<button type="submit" name="registerButton">Ta Bort användare</button>

</form>


<p>
<form action="includes/handlers/log-out.php">
<input type="submit" value="Logga ut">
</form>
</p>

</div>

    
</body>
</html>