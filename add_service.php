<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
    <link rel="stylesheet" href="admin-style.css">
</head>
<body>
<?php
if(isset($_POST['button'])){
    extract($_POST);
    if(isset($title) && isset($category) && isset($price)){
        include_once "connexion.php";
        $req = mysqli_query($con , "INSERT INTO services VALUES(NULL, '$title', '$category','$price')");
        if($req){
            header("location: admin.php");
        }else {
            $message = "Le service n'a pas pu être ajouté.";
        }
    }else {
        $message = "Veuillez remplir tous les champs !";
    }
}

?>
<div class="form">
    <a href="admin.php" class="back_btn"> Retour</a>
    <h2>Ajouter un service</h2>
    <p class="erreur_message">
        <?php
        if(isset($message)){
            echo $message;
        }
        ?>

    </p>
    <form action="" method="POST">
        <label>Nom du service</label>
        <input type="text" name="title">
        <label>Catégorie</label>
        <select type="text" name="category">
            <option value="Entretien">Forfaits entretien</option>
            <option value="Pièces">Pièces détachées</option>
            <option value="Mécanique">Mécanique</option>
            <option value="Carrosserie">Carroserie</option>
        </select>
        <label>Prix</label>
        <input type="price" name="price">

        <input type="submit" value="Ajouter" name="button">
    </form>
</div>
</body>
</html>