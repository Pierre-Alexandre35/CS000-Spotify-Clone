<?php 
    class Account{

        private $conn;
        private $errorArray;

        public function __construct($conn){
            $this->conn = $conn;
            $this->errorArray = array();
        }

        public function register($username, $firstName, $lastName, $email, $emailConfirm, $password, $passwordConfirm){
            $this->validateUsername($username);
            $this->validateFirstName($firstName);
            $this->validateLastName($lastName);
            $this->validateEmails($email, $emailConfirm);
            $this->validatePasswords($password, $passwordConfirm);

            if(empty($this->errorArray)){
                $this->insertUserDetails($username, $firstName, $lastName, $email, $password);
                return true;
            } else{
                return false;
            }
        }

        public function login($username, $password){
            $pw = md5($password);
            $query = mysqli_query($this->conn, "SELECT * 
            FROM users 
            WHERE username = '$username'
            AND password = '$pw';");
            if(mysqli_num_rows($query) == 1){
                return true;
            } else {
                array_push($this->errorArray, Constants::$loginFail);
                return false;
            }
        }


        public function getError($error){
            if(!in_array($error, $this->errorArray)){
                $error = "";
            }
            return "<span class='errorMessage'>$error</span>";
        }


        private function insertUserDetails($username, $firstName, $lastName, $email, $password){
            $encryptedPw = md5($password);
            $profilePic = "";
            $date = date("Y-m-d");

            $result = mysqli_query($this->conn, "INSERT INTO users VALUES(NULL, '$username', '$firstName', '$lastName', '$email', '$encryptedPw', '$date', '$profilePic')") or die(mysqli_error($this->conn));;

            return;
        }

        private function validateUsername($username){
            if(strlen($username) < 5 || strlen($username) > 20){
                array_push($this->errorArray, Constants::$usernameSize);
                return;
            };
            $checkUsernameQuery = mysqli_query($this->conn, "SELECT username FROM users WHERE username = '$username';");
            if(mysqli_num_rows($checkUsernameQuery) != 0){
                array_push($this->errorArray, Constants::$usernameExists);

            }
        }
        
        private function validateFirstName($fn){
            if(strlen($fn) < 2 || strlen($fn) > 30){
                array_push($this->errorArray, Constants::$firstNameSize);
                return;
            }
        }
        
        private function validateLastName($ln){
            if(strlen($ln) < 2 || strlen($ln) > 30){
                array_push($this->errorArray, Constants::$lastNameSize);
                return;
            }
        }
        
        private function validateEmails($email1, $email2){
            $checkEmailQuery = mysqli_query($this->conn, "SELECT email FROM users WHERE email = '$email1';");
            if(mysqli_num_rows($checkEmailQuery) != 0){
                array_push($this->errorArray, Constants::$emailExists);

            }
            //check email equality 
            if($email1 != $email2){
                array_push($this->errorArray, Constants::$emailMistchMatch);
                return;
            }
            if(!filter_var($email1, FILTER_VALIDATE_EMAIL)){
                array_push($this->errorArray, Constants::$emailInvalid);
                return;
            }

            //TODO check if that username has not been use
        }
        
        private function validatePasswords($password1, $password2){
            if($password2 != $password1){
                array_push($this->errorArray, Constants::$passwordMissMatch);
                return;
            }
            if(preg_match('/[^A-Za-z0-9]/', $password1)){
                array_push($this->errorArray, Constants::$passwordMissCharacters);
                return;
            }
            if(strlen($password1) < 2 || strlen($password1) > 25){
                array_push($this->errorArray, Constants::$passwordSize);
                return;
            }
        }
    }

?>