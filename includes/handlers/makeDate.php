<?php 
include('../config.php'); //not needed

//lägger in formuläret in till variabler
$date = $_POST['datum'];
$time = $_POST['tid'];
$agare = $_SESSION['agare'];

$todaysDate = date('Y-m-d');

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "tvattstugan");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


//looking if the user have a time if they do they cannot book
$sqll = "SELECT * FROM schemat WHERE agare='$agare'";  
$result = $link->query($sqll);



if($result->num_rows == 0){

        
        //if the date is not today nor anytime in the futer it will die
        if($todaysDate >$date){

            echo ("die todays date");
            
            header("Location: ../../user.php");
            die();
        }
        //see if somethings is inside with the same date and time
        $seeIfSomethingIsThere = "SELECT * FROM schemat WHERE dagforbokning='$date' AND tidForBokning='$time'";
        $result = $link->query($seeIfSomethingIsThere);

        //if result is 1 then nothing happens
        if($result->num_rows == 1){
            
            header("Location: ../../user.php");
            //same date and time
            die();
        }else{

            //ger valuta av vad datum är om en månad
            
            //tar dagens datum + 1 månad
            $effectiveDate = date('Y-m-d', strtotime("+1 months", strtotime($todaysDate)));

            //look if the date is one month ahead
            if($date < $effectiveDate){

                //inserting
                $sql = "INSERT INTO `schemat` (`agare`, `tidForBokning`, `dagforbokning`) VALUES ('$agare', '$time', '$date');";
                if(mysqli_query($link, $sql)){
                    echo "Records inserted successfully.";
                } else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                }
            }else{
                echo("to long into the future");
                header("Location: ../../user.php");
                die();
            }
            //2018-11-16  ->   2018-12-16

            


           
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

// 2019-05-03


header("Location: ../../user.php");

?>


