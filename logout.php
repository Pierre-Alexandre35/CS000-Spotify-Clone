<?php include("includes/header.php")?>
<?php session_destroy();
header("location:index.php?msg=logout");
?>

