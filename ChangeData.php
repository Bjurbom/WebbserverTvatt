<?php
    include("includes/config.php");

if(!isset($_SESSION['userLoggedIn'])){
    header("Location: index.php");
}


$ln = $_POST['lagenhetnummer'];
$adminId = $_SESSION['userLoggedIn'];

if(!$adminId == "0"){
    header("Location: user.php");
}

if($ln == 0){
    header("location: admin.php");
}


//trying to connect
$link = mysqli_connect("localhost", "root", "", "tvattstugan");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "SELECT * FROM users WHERE lagenhetsnummer='$ln'";  
$result = $link->query($sql);

if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){
    
        $ln = $row['lagenhetsnummer'];
        $name = $row['namn'];
        $adress = $row['adress'];
        $bild = $row['bild'];

   
    }
mysqli_free_result($result);
} else{
   echo "No";
}


$_SESSION['ln']= $ln;

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Change Data</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Credit for the icon goes to smalllikeart-->
    <link rel="icon" href="assets/images/icons/washing-machine.png">

</head>
<body>

<h1>Ändra Datan</h1>

<form action="includes/handlers/dataChange.php" method="POST">
<p>
<label>Lägenhetsnummer</label>
<input type="text" name="laganhetsnummer" class="inputBox" required value="<?php echo $ln ?>">
</p>

<p>
<label>Nytt lösenord</label>
<input type="text" name="password" class="inputBox" value="">
</p>
<p>
<label>Namn</label>
<input type="text" name="namn" class="inputBox" required value="<?php echo $name ?>">
</p>
<p>
<label>Adress</label>
<input type="text" name="adress" class="inputBox" required value="<?php echo $adress ?>">
</p>

<button type="submit">Ändra</button>
</form>
    
</body>
</html>