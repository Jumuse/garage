<?php
include_once "connexion.php";
$id= $_GET['id'];
$req = mysqli_query($con , "DELETE FROM usedcars WHERE id = $id");
header("Location: admin.php")
?>