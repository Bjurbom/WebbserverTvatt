<?php 
include("../config.php");




$lnOriginal = $_SESSION['ln'];

$ln = $_POST['laganhetsnummer'];
$pw = $_POST['password'];
$namn = $_POST['namn'];
$adress = $_POST['adress'];


$sqlquery = " SELECT * FROM users WHERE lagenhetsnummer='$ln'";

$result = mysqli_query($con,$sqlquery);

if($result->num_rows == 0){

    if($pw == null){

        $sqlquery = " UPDATE users  SET lagenhetsnummer='$ln' AND namn='$namn' AND adress='$adress' WHERE lagenhetsnummer='$lnOriginal'";

        $result = mysqli_query($con,$sqlquery);

        echo ($result);

    }

}else{
    echo("Id is already in use");
    die();
}







?>