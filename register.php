<?php
    //includes the php code from other files 
    include("includes/config.php");
    include("includes/classes/Constants.php");  
    include("includes/classes/Account.php");
    
    //make a acount with the connection of the database
     $account = new Account($con);
     
    
    include("includes/handlers/register-handler.php");
    include("includes/handlers/login-handler.php");

    
    function getInputValue($name){
        if(isset($_POST[$name])){
            echo $_POST[$name];
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <!-- setting strandard value-->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- loads in the css-->
    <link rel="stylesheet" type="text/css" href="assets/css/register.css">

    <!-- loads jquary -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- loads in the javascript-->
    <script src="assets/js/register.js"></script>

</head>
<body>
    <?php


    //if registerbutton is pressed the site will reset to register button 
    // instead of going back to the login it will stay at the register form
    if(isset($_POST['registerButton'])){
       echo('
       <script>
       $(document).ready(function(){
        $("#loginForm").hide();
        $("#registerForm").show();
            
           
    
        });

    </script>');
        
    }else {
        echo('
        <script>
        $(document).ready(function(){
         $("#loginForm").show();
         $("#registerForm").end();
             
            
     
         });
 
     </script>');
    }
    ?>
 
    <div id=background>
        <div id="loginContainer">
            <div id="inputContainer">

                <!-- login fome-->
                <form id="loginForm" action="register.php" method="POST" >

                    

                    <h2>Login to you account</h2>
                    <p>

                    <!--Error messages-->
                        <!-- it see if something goes wrong using function in Account-->
                    <?php echo $account->getError(Constants::$loginFailed);?>
                        <label for="loginUsername">Username</label>
                        <input id="loginUsername" name="loginUsername" type="text" placeholder="e.g Bart"  value="<?php getInputValue('loginUsername')?>" required>
                    </p>
                    
                    <p>
                        <label for="loginPassword">Password</label>
                        <input id="loginPassword" name="loginPassword" type="Password" placeholder="" required> 
                    </p>

                    <button type="submit" name="loginButton">LOGIN</button>
                    <div class="hasAccountText">
                        
                        
                    </div>

                </form>
                <!--register form-->
                <!--<form id="registerForm" action="register.php" method="POST">

                    <h2>Create your free account</h2>
                    <p>
                        
                        <?php echo $account->getError(Constants::$usernameCharacters);?>
                        <?php echo $account->getError(Constants::$usernameTaken);?>
                        <label for="username">Username</label>
                        <input id="username" name="username" type="text" placeholder="e.g BartSimpson222" value="<?php getInputValue('username')?>" required>
                    </p>


                    <p>
                        <?php echo $account->getError(Constants::$firstNameCharacters);?>
                        <label for="firstName">First name</label>
                        <input id="firstName" name="firstName" type="text" placeholder="e.g Bart" value="<?php getInputValue('firstName')?>" required>
                    </p>

                    <p>
                        <?php echo $account->getError(Constants::$lastNameCharacters)?>   
                        <label for="lastName">Last name</label>
                        <input id="lastName" name="lastName" type="text" placeholder="e.g Simpson" value="<?php getInputValue('lastName')?>" required>
                    </p>

                    <p>
                        <?php echo $account->getError(Constants::$emailsDoNotMatch)?>
                        <?php echo $account->getError(Constants::$emailInvalid)?>
                        <?php echo $account->getError(Constants::$emailTaken)?>
                        <label for="email">E-mail</label>
                        <input id="email" name="email" type="email" placeholder="e.g bart@simpson.com" value="<?php getInputValue('email')?>" required>
                    </p>

                    <p>

                        <label for="email2">Confirm E-mail</label>
                        <input id="email2" name="email2" type="email" placeholder="e.g bart@simpson.com" value="<?php getInputValue('email2')?>" required>
                    </p>

                    
                    <p>
                        <?php echo $account->getError(Constants::$passwordsDoNoMatch)?>
                        <?php echo $account->getError(Constants::$passwordNotAlphanumeric)?>
                        <?php echo $account->getError(Constants::$passwordCharacters)?>
                        <label for="password">Password</label>
                        <input id="password" name="password" type="Password" placeholder="password" required> 
                    </p>

                    <p>
                        <label for="password2">Confirm Password</label>
                        <input id="password2" name="password2" type="Password" placeholder="password" required> 
                    </p>

                    <button type="submit" name="registerButton">SIGN UP</button>
                
                    <div class="hasAccountText">
                        
                        <span id="hideRegister">Already have an account? <a href="#">Login here</a></span>
                    </div>

                </form>
            -->
            
            </div>

            <!--information text-->
            <div id="loginText">
                <h1>Tor och Hugos</h1>
                <h1>Tvagstuga</h1>

                <ul>
                    <li>Snabbt</li>
                    <li>Flexibelt</li>
                </ul>
            </div>
        </div>
    </div>

</body>
</html>


