<?php 
include("../../config.php");

if(isset($_POST['artistId'])){
    $artistId = $_POST['artistId'];

    $query = mysqli_query($conn, "SELECT * FROM songs WHERE id='$songId'");

    $result = mysqli_fetch_array($query);

    echo json_encode($result);
}
?>