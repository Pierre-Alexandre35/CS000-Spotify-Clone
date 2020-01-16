<?php 
    class Account{
        public function __construct(){

        }

        public function register(){
            $this->validateUsername($username);
            $this->validateFirstName($firstName);
            $this->validateLastName($lastName);
            $this->validateEmails($email1, $email2);
            $this->validatePasswords($password1, $password2);
        }

        private function validateUsername($username){

        }
        
        private function validateFirstName($fn){
        
        }
        
        private function validateLastName($ln){
        
        }
        
        private function validateEmails($email1, $email2){
        
        }
        
        private function validatePasswords($password1, $password2){
            
        }
    }

?>