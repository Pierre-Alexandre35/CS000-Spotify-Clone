<?php 
    class Account{
        public function __construct(){
            $this->errorArray = array();
        }

        public function register($username, $firstName, $lastName, $email, $emailConfirm, $password, $passwordConfirm){
            $this->validateUsername($username);
            $this->validateFirstName($firstName);
            $this->validateLastName($lastName);
            $this->validateEmails($email, $emailConfirm);
            $this->validatePasswords($password, $passwordConfirm);

            if(empty($this->errorArray)){
                return true;
            } else{
                return false;
            }
        }

        public function getError($error){
            if(!in_array($error, $this->errorArray)){
                $error = "";
            }
            return "<span class='errorMessage'>$error</span>";
        }

        private function validateUsername($username){
            if(strlen($username) < 5 || strlen($username) > 20){
                array_push($this->errorArray, "Your username must be between 5 and 25 characters");
                return;
            };
            //check that the username does not already exits
        }
        
        private function validateFirstName($fn){
            if(strlen($fn) < 2 || strlen($fn) > 30){
                array_push($this->errorArray, "Your first name should between 2 and 30 characters");
                return;
            }
        }
        
        private function validateLastName($ln){
            if(strlen($ln) < 2 || strlen($ln) > 30){
                array_push($this->errorArray, "Your last name should between 2 and 30 characters");
                return;
            }
        }
        
        private function validateEmails($email1, $email2){
            //check email equality 
            if($email1 != $email2){
                array_push($this->errorArray, "Your emails does not match");
                return;
            }
            if(!filter_var($email1, FILTER_VALIDATE_EMAIL)){
                array_push($this->errorArray, "Invalid email");
                return;
            }

            //TODO check if that username has not been use
        }
        
        private function validatePasswords($password1, $password2){
            if($password2 != $password2){
                array_push($this->errorArray, "Your password does not match");
                return;
            }
            if(preg_match('/[^A-Za-z0-9]/', $password1)){
                array_push($this->errorArray, "Your password can only contains letters and numbers");
                return;
            }
            if(strlen($password1) < 2 || strlen($password1) > 25){
                array_push($this->errorArray, "Your password must be between 2 and 25 characters");
                return;
            }
        }
    }

?>