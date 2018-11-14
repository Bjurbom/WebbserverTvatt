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



$sqll = "SELECT * FROM schemat WHERE agare='$agare'";  
$result = $link->query($sqll);



if($result->num_rows == 0){

        

        if(date("Y-m-d") >$date){
       //     header("Location: ../../user.php");
            echo("die");
            die();
        }

        $seeIfSomethingIsThere = "SELECT * FROM schemat WHERE dagforbokning='$date' AND tidForBokning='$time'";

        $result = $link->query($seeIfSomethingIsThere);

        if($result->num_rows == 1){
            //same date and time
            echo("same date and time");
        }else{
            $sql = "INSERT INTO `schemat` (`id`, `agare`, `tidForBokning`, `dagforbokning`) VALUES (NULL, '$agare', '$time', '$date');";
            if(mysqli_query($link, $sql)){
                echo "Records inserted successfully.";
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }
        }


        /*
        if($result->num_rows == 1){
           

            header("Location: ../../user.php");
            echo("same day ");
            $seeIfTimeIsSame = "SELECT * FROM schemat WHERE tidForBokning='$time' AND dagforbokning='$date'";
            $result = $link->query($seeIfTimeIsSame);
            
            if($result->num_rows == 1){
                
                header("Location: ../../user.php");
                echo("same time ");
               // die();
            }else{
                $sql = "INSERT INTO `schemat` (`id`, `agare`, `tidForBokning`, `dagforbokning`) VALUES (NULL, '$agare', '$time', '$date');";
                if(mysqli_query($link, $sql)){
                    echo "Records inserted successfully.";
                } else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                }
            }
        }else{
            $sql = "INSERT INTO `schemat` (`id`, `agare`, `tidForBokning`, `dagforbokning`) VALUES (NULL, '$agare', '$time', '$date');";
            if(mysqli_query($link, $sql)){
                echo "Records inserted successfully.";
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }
        }*/

 
}





// Close connection
mysqli_close($link);




header("Location: ../../user.php");

?>