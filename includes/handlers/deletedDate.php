<?php
include('../config.php');

$agare = $_SESSION['agare'];


try{
    $pdo = new PDO("mysql:host=localhost;dbname=tvattstugan", "root", "");
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}

$sql = "DELETE FROM schemat WHERE agare='$agare'";  

$pdo->query($sql);

header("location: ../../user.php");



?>