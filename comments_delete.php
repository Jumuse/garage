<?php
include_once "connexion.php";
$id= $_GET['id'];
$req = mysqli_query($con , "DELETE FROM comments WHERE id = $id");
header("Location: admin.php")
?>