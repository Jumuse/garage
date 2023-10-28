<?php
//connexion à la base de données
$con = mysqli_connect("localhost","root","root","dbbgarage");
if(!$con){
    echo "Vous n'êtes pas connecté à la base de donnée";
}
return $con;
?>