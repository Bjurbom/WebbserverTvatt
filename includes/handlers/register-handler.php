<?php


function sanitizeFormUsername($inputText){

    //take away the html/php/code tags 
    $inputText = strip_tags($inputText);
    //replaces " " to ""
    $inputText = str_replace(" ", "", $inputText);

    return $inputText;

}

function sanitizeFormPassword($inputText){

     //take away the html/php/code tags 
    $inputText = strip_tags($inputText);

    return $inputText;

}

function sanitizeFormEmail($inputText){

     //take away the html/php/code tags 
    $inputText = strip_tags($inputText);
    //replaces " " to ""
    $inputText = str_replace(" ", "", $inputText);

    return $inputText;

}

function sanitizeFormString($inputText){
     //take away the html/php/code tags 
    $inputText = strip_tags($inputText);
    //replaces " " to ""
    
    //first makes the text lower case then upper case the first letter
    $inputText = ucfirst(strtolower($inputText));

    return $inputText;

}




if(isset($_POST['registerButton'])){
    //registerd was pressed

    //sanitize every varibels before putting it in
    $lagenhetsnummer = sanitizeFormUsername($_POST['lagenhetnummer']);
    $namn = $_POST['namn'];
    $password = sanitizeFormPassword($_POST['password']);
    $adress = sanitizeFormString($_POST['adress']);
   
    $encryptedPassword = md5($password);
    /* Attempt MySQL server connection. Assuming you are running MySQL
    server with default setting (user 'root' with no password) */
    $link = mysqli_connect("localhost", "root", "", "tvattstugan");
     
    // Check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
     
    
    $sqll = "SELECT * FROM users WHERE lagenhetsnummer='$lagenhetsnummer'";  
    $result = $link->query($sqll);
    
    
    
    if($result->num_rows == 0){
            // Attempt insert query execution
            $sql = "INSERT INTO `users` (`id`, `lagenhetsnummer`, `losenord`, `namn` , `adress` , `bild`) VALUES ('', '$lagenhetsnummer', '$encryptedPassword', '$namn', '$adress' , 'includes/images/test.jpg');";
        if(mysqli_query($link, $sql)){
            echo "user added.";
        } else{
            echo "lol didn't work $sql. " . mysqli_error($link);
        }
     
    }
    
    
    
    
    
    // Close connection
    mysqli_close($link);
    
    
    
    
    //header("Location: admin.php");

}

?>