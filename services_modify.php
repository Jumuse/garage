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
$req = mysqli_query($con , "SELECT * FROM services WHERE id = $id");
$row = mysqli_fetch_assoc($req);

if(isset($_POST['button'])){
    extract($_POST);
    if(isset($title) && isset($category) && isset($price)){
        $req = mysqli_query($con, "UPDATE services SET title = '$title' , category = '$category', price = '$price' WHERE id = $id");
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
    <h2>Modifier le service : <?=$row['title']?> </h2>
    <p class="erreur_message">
        <?php
        if(isset($message)){
            echo $message ;
        }
        ?>
    </p>
    <form action="" method="POST">
        <label>Nom du service</label>
        <input type="text" name="title" value="<?=$row['title']?>">
        <label>Catégorie</label>
        <select type="text" name="category" value="<?=$row['category']?>">
            <option value="Entretien">Forfaits entretien</option>
            <option value="Pièces">Pièces détachées</option>
            <option value="Mécanique">Mécanique</option>
            <option value="Carrosserie">Carroserie</option>
        </select>
        <label>Prix</label>
        <input type="integer" name="price" value="<?=$row['price']?>">
        <input type="submit" value="Modifier" name="button">
    </form>
</div>
</body>
</html>