<?php

function sanitizeFormGeneral($input){
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
    return $input;

}

if(isset($_POST['registerButton'])){
    $username = sanitizeFormGeneral($_POST['username']);
    $firstName = sanitizeFormString($_POST['firstName']);
    $lastName = sanitizeFormString($_POST['lastName']);
    $email = sanitizeFormGeneral($_POST['email']);
    $emailConfirm = sanitizeFormGeneral($_POST['emailConfirm']);
    $password = sanitizeFormPassword($_POST['password']);
    $passwordConfirm = sanitizeFormPassword($_POST['passwordConfirm']); 
    
    //return true or false
    $wasSuccessfull = $currentAccount->register($username, $firstName, $lastName, $email, $emailConfirm, $password, $passwordConfirm);

    if($wasSuccessfull){
        $_SESSION['userLoggedIn'] = $username;
        header("Location: index.php");
    } 


}


?>
