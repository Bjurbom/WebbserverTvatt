<?php
    class Account {

        //var
        private $con;
        private $errorArray;
        

        public function __construct($con){

            $this->con = $con;
            $this->errorArray = array();
        
        }

        //trying to login the user
        public function login($un,$pw){

            //ecrypte the password with a SIMPLE ecrypte algo
            $ecryptedPw = md5($pw);

            
            //see if the same username and same ecrypted password exist in the database
            $query = mysqli_query($this->con, "SELECT * FROM users WHERE lagenhetsnummer='$un' AND losenord='$ecryptedPw'");
            			
            
            
            //if it finds one profile the the login was succesfull
            if(mysqli_num_rows($query) == 1) {
                return true;
            }else {
                //else if put outs a error and false
                array_push($this->errorArray, Constants::$loginFailed);
                return false;
            }
        }

        //trying to register the user
        public function register($ln,$n,$pw,$adress){

            //validating the users input


           //if errorArray is empty then insert into the database
           if(empty($this->errorArray)){
               //Insert into db
               return $this->insertUserDetails($ln,$n,$pw,$adress);
           }
           else{
               //else it wasn't succesful
               return false;
           }
        }

        private function insertUserDetails($ln,$n,$pw,$adress){

        $ecryptedPw = md5($pw);
        
        $link = mysqli_connect("localhost", "root", "", "tvattstugan");
 
        // Check connection
        if($link === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
 
        // Attempt insert query execution
        $sql = "INSERT INTO `users` (`id`, `lagenhetsnummer`, `losenord`, `namn`, `adress`, `bild`) VALUES (NULL, '$ln', '$ecryptedPw', '$n', '$adress', NULL)";
        if(mysqli_query($link, $sql)){
            return true;
            mysqli_close($link);
        } else{
            return  mysqli_error($link);
            mysqli_close($link);
        }
 

            
        }

        //looking for a specific error
        public function getError($error){
            //looking for the error 
            if(!in_array($error, $this->errorArray)){
                //if it doesn't exist then error is emty
                $error = "";
            }
            //return a html tag
            return "<span class='errorMessage'>$error</span>";
        }

        //validate functions
        //seeing if it following the criteria
        private function validateUsername($username) {
        
            if(strlen($username) > 25 || strlen($username) < 5){
                array_push($this->errorArray,  Constants::$usernameCharacters);
                return;
            }

            $checkUsernameQuery = mysqli_query($this->con, "SELECT username FROM users WHERE username='$username'");
            if(mysqli_num_rows($checkUsernameQuery) != 0){
                array_push($this->errorArray, Constants::$usernameTaken);
                return;
            }

        }
        
        private function validateFirstname($firstName) {
            if(strlen($firstName) > 25 || strlen($firstName) < 2){
                array_push($this->errorArray, Constants::$firstNameCharacters);
                return;
            }
        }
        
        private function validateLastname($lastName) {
            if(strlen($lastName) > 25 || strlen($lastName) < 2){
                array_push($this->errorArray, Constants::$lastNameCharacters);
                return;
            }
        }
        
        private function validateEmails($email, $email2) {
            if($email != $email2){
                array_push($this->errorArray, Constants::$emailsDoNotMatch);
                return;
            }

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                array_push($this->errorArray, Constants::$emailInvalid);
                return;
            }

            $checkEmailQuery = mysqli_query($this->con, "SELECT email FROM users WHERE email='$email'");
            if(mysqli_num_rows($checkEmailQuery) != 0){
                array_push($this->errorArray, Constants::$emailTaken);
                return;
            }
        }
        
        private function validatePasswords($password, $password2) {
            
            if($password != $password2){  
                array_push($this->errorArray, Constants::$passwordsDoNoMatch);
                return;
            
            }

            if(preg_match('/[^A-Za-z0-9]/', $password)){
                array_push($this->errorArray, Constants::$passwordNotAlphanumeric);
                return;
            }

            if(strlen($password) > 30 || strlen($password) < 5){
                array_push($this->errorArray, Constants::$passwordCharacters);
                return;
            }
        }

    }


?>