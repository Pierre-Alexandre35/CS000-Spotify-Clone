<?php include("includes/header.php")?>
    <?php if(isset($_GET['id'])){
        echo $_GET['id'];
        $albumId = $_GET['id'];
    } else {
        header("Location: index.php");
    }

    $albumQuery = mysqli_query($conn, "SELECT * FROM albums WHERE id = '$albumId' ");
    $album = mysqli_fetch_array($albumQuery);

    echo $album['title'];
    
    ?>


<?php include("includes/footer.php")?>
