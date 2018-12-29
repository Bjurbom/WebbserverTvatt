<?php

$link = mysqli_connect("localhost", "root", "", "tvattstugan");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$mkti = mktime(11, 14, 54, 8, 12, 2014);

$time = date("Y-m-d", $mkti);

$seeIfSomethingIsThere = "SELECT * FROM schemat WHERE tidForBokning='$time'";

$result = mysqli_query($link, $seeIfSomethingIsThere);

echo ($result);

 



echo date("Y-m-d")



?>