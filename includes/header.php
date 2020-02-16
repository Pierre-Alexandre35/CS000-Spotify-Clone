<?php
    include('includes/config.php');
    include('includes/classes/Artist.php');
    include('includes/classes/Album.php');
    include('includes/classes/Song.php');


    if(isset($_SESSION['userLoggedIn'])){
        $userLoggedIn = $_SESSION['userLoggedIn'];
    } else {
        header("Location: register.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./assets/style.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    <script src="assets/scripts/script.js"></script>
    <title>Document</title>
</head>
<body>
    <script>
        var audioElement = new Audio();
        audioElement.setTrack("./assets/music/coup_de_folie.mp3");
        var promise = audioElement.audio.play();
        if (promise !== undefined) {
            promise.then(_ => {}).catch(error => {});
        }       

    </script>

    <div id="main-container">
        <div id="top-container">
        <?php include("includes/navbar.php")?>

        <div id="main-view-container">
            <div id="main-content">