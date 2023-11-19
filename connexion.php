<?php
//connexion à la base de données
$con = mysqli_connect("oliadkuxrl9xdugh.chr7pe7iynqr.eu-west-1.rds.amazonaws.com","bups62d830cgla6u","d3bjcgxenfl9k8ub","qp1min19x22f6rsw");
if(!$con){
    echo "Vous n'êtes pas connecté à la base de donnée";
}
return $con;
?>