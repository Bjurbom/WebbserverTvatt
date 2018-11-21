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

//gör en sql query
$sql = "DELETE FROM users WHERE lagenhetsnummer='$ln'";  

//insert
$pdo->query($sql);





//this doesn't even give a error .... Weird
$sql2 = "DELETE FROM schemat WHERE agare='$ln'";  
$pdo->query($sql2); 







header("location: ../../admin.php");
echo("the user was removed");



?>