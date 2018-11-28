<?php 
include("../config.php");



class dataChange
{
    private $link;

    public function __construct(){
        

        //trying to connect
        $link = mysqli_connect("localhost", "root", "", "tvattstugan");
 
        // Check connection
        if($link === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

    }

    public function ChangeData($ln,$pw,$adress,$namn){
        if ($pw == null){
            
        }
    }

}





$ln = $_POST['laganhetsnummer'];
$pw = $_POST['password'];
$namn = $_POST['namn'];
$adress = $_POST['adress'];

    /* Attempt MySQL server connection. Assuming you are running MySQL
    server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "tvattstugan");
     
    // Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}






?>