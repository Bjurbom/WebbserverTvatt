<?php
    //includes the php code from other files 
    include("includes/config.php");
    include("includes/classes/Constants.php");  
    include("includes/classes/Account.php");
    
    //make a acount with the connection of the database
     $account = new Account($con);
     
    
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
    <div id=background>
        <div id="loginContainer">
            <div id="inputContainer">

                <!-- login fome-->
                <form id="loginForm" action="index.php" method="POST" >

                    

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







    </div>s

</body>
</html>