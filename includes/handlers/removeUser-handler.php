<?php
include('../config.php');

//gör så man inte kan radera admin
if($_POST["lagenhetnummer"] == 0){
    header("location: ../../admin.php");
    echo("cant be number 0");
    die();
}else {

//variabel som har lägenhetsnummer så ska deleteas
$ln = $_POST["lagenhetnummer"]; 
}

//försöker att connectar med databasen
try{
    $pdo = new PDO("mysql:host=localhost;dbname=tvattstugan", "root", "");
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}


$sql2 = "DELETE FROM users WHERE lagenhetsnummer='$ln'";  
$pdo->query($sql2); 
if($result->num_rows == 0){

}else {
//gör en sql query
$sql = "DELETE FROM users WHERE lagenhetsnummer='$ln'";  

//insert
$pdo->query($sql);



$sqll = "SELECT * FROM schemat WHERE agare='$agare'";  
$result = $link->query($sqll);
if($result->num_rows == 0){



}else {
$sql2 = "DELETE FROM schemat WHERE agare='$ln'";  
$pdo->query($sql2); 
//this doesn't even give a error .... Weird
}
}












header("location: ../../admin.php");
echo("the user was removed");



?>