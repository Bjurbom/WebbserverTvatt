<?php 

include('../config.php');
//förstör section
session_destroy();
//tillbacka till inlogningen
header("Location: ../../index.php");


?>