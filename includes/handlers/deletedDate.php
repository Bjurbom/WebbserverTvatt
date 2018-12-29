<?php
include('../config.php');

//ser vems som vill avboka
$agare = $_SESSION['agare'];

//försöker göra en connection
try{
    $pdo = new PDO("mysql:host=localhost;dbname=tvattstugan", "root", "");
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}

$sqll = "SELECT * FROM schemat WHERE agare='$agare'";  
$result = $pdo->query($sqll);
if($result->num_rows == 0){



}else {
$sql2 = "DELETE FROM schemat WHERE agare='$ln'";  
$pdo->query($sql2); 
//this doesn't even give a error .... Weird
}

//tillbacka till the user.php
header("location: ../../user.php");



?>