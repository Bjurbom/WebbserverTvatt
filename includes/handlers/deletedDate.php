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

//gör en sql request
$sql = "DELETE FROM schemat WHERE agare='$agare'";  

//query den med connection
$pdo->query($sql);

//tillbacka till the user.php
header("location: ../../user.php");



?>