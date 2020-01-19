<?php


function sanitarizeUsername($input){
    $input = strip_tags($input);
    $input = str_replace(" ", "", $input);
    return $input;
}

function sanitarizePassword($input){
    $input = strip_tags($input);
    return $input;
}

if(isset($_POST['loginButton'])){
    $username = sanitarizeUsername($_POST['loginUsername']);
    $password = sanitarizePassword($_POST['loginPassword']);

    $wasSuccesfull = $currentAccount->login($username, $password);

    if($wasSuccesfull){
        $_SESSION['userLoggedIn'] = $username;
        header("Location: index.php");
    } 
}
?>
