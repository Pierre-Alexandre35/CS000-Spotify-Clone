<?php

function sanitizeFormUsername($input){
    $input = strip_tags($input);
    $input = str_replace(" ", "", $input);
    return $input;
}

function sanitizeFormString($input){
    $input = strip_tags($input);
    $input = str_replace(" ", "", $input);
    $input = ucfirst(strtolower($input));
    return $input;
}

function sanitizeFormPassword($input){
    $input = strip_tags($input);
    $input = ucfirst(strtolower($input));
    return $input;


    
}

if(isset($_POST['registerButton'])){
    $username = sanitizeFormUsername($_POST['username']);
    $firstName = sanitizeFormString($_POST['firstName']);
    $lastName = sanitizeFormString($_POST['lastName']);
    $email = sanitizeFormString($_POST['email']);
    $emailConfirm = sanitizeFormString($_POST['emailConfirm']);
    $password = sanitizeFormPassword($_POST['password']);
    $passwordConfirm = sanitizeFormPassword($_POST['passwordConfirm']); 
    
    //return true or false
    $wasSuccessfull = $currentAccount->register($username, $firstName, $lastName, $email, $emailConfirm, $password, $passwordConfirm);

    if($wasSuccessfull){
        header("Location: index.php");
    } 


}


?>
