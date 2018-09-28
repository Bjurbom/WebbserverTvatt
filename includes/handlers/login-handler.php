<?php

//if loginButton is pressed
if(isset($_POST['loginButton'])) {
    
    //register the input into varibels
    $username = $_POST['loginUsername'];
    $Password = $_POST['loginPassword'];

    //try to login
    $result = $account->login($username,$Password);
    
    //if succesfull the redirect to index.php and gives session the username of the user 
    if($result){
        
        $_SESSION['userLoggedIn'] = $username;
		if($username == "admin"){
			header("Location: admin.php");
		}
		else{
        header("Location: user.php");
		}
    }
	
}
?>