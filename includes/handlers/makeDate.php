<?php 
include('../config.php');

$date = $_POST['datum'];
$time = $_POST['tid'];
$agare = $_SESSION['agare'];

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "tvattstugan");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt insert query execution
$sql = "INSERT INTO `schemat` (`id`, `agare`, `tidForBokning`, `dagforbokning`) VALUES (NULL, '$agare', '$time', '$date');";
if(mysqli_query($link, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);




header("Location: ../../user.php");

?>