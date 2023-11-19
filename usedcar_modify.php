<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
    <link rel="stylesheet" href="admin-style.css">
</head>
<body>
<?php

include_once "connexion.php";
$id = $_GET['id'];
$req = mysqli_query($con , "SELECT * FROM usedcars WHERE id = $id");
$row = mysqli_fetch_assoc($req);

if(isset($_POST['button'])){
    extract($_POST);
    if(isset($title) && isset($description) && isset($year) && isset($kilometers) && isset($price)){
        $req = mysqli_query($con, "UPDATE usedcars SET title = '$title' , description = '$description', year = '$year', kilometers = '$kilometers', price = '$price' WHERE id = $id");
        if($req){
            header("location: admin.php");
        }else {
            $message = "Service non modifié";
        }

    }else {
        $message = "Veuillez remplir tous les champs !";
    }
}

?>

<div class="form">
    <a href="admin.php" class="back_btn">Retour</a>
    <h2>Modifier le véhicule : <?=$row['title']?> </h2>
    <p class="erreur_message">
        <?php
        if(isset($message)){
            echo $message ;
        }
        ?>
    </p>
    <form action="" method="POST">
        <label>Nom du véhicule</label>
        <input type="text" name="title" value="<?=$row['title']?>">
        <label>Description</label>
        <input type="text" name="description" value="<?=$row['description']?>">
        <label>Année</label>
        <input type="number" name="year" value="<?=$row['year']?>">
        <label>Kilométrage</label>
        <input type="number" name="kilometers" value="<?=$row['kilometers']?>">
        <label>Prix</label>
        <input type="integer" name="price" value="<?=$row['price']?>">
        <input type="submit" value="Modifier" name="button">
    </form>
</div>
</body>
</html>