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
   

    //trying to register
    $wasSuccessful = $account->register($lagenhetsnummer,$namn,$password,$adress);
    
    //if succesfull the redirect to index.php and gives session the username of the user 
echo($wasSuccessful);

    if($wasSuccessful){
        
        echo ("User was created");
        
    }

}

?>