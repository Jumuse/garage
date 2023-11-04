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
    if(isset($title) && isset($description) && isset($year) && isset($kilometers) && isset($price) && isset($main_photo)){
        include_once "connexion.php";
        $req = mysqli_query($con , "INSERT INTO usedcars VALUES(NULL, '$title', '$description','$year','$kilometers','$price', NULL, NULL, NULL, NULL, $main_photo)");
        if($req){
            header("location: admin.php");
        }else {
            $message = "Le véhicule n'a pas pu être ajouté.";
        }
    }else {
        $message = "Veuillez remplir tous les champs !";
    }
}

?>
<div class="form">
    <a href="admin.php" class="back_btn"> Retour</a>
    <h2>Ajouter un véhicule à la vente</h2>
    <p class="erreur_message">
        <?php
        if(isset($message)){
            echo $message;
        }
        ?>

    </p>
    <form action="" method="POST" enctype="multipart/form-data">
        <label>Titre de l'annonce</label>
        <input type="text" name="title">

        <label>Description du véhicule</label>
        <textarea id="description" name="description"></textarea>
        <label>Année</label>
        <input type="number" min="1930" max="2099" name="year">
        <label>Kilométrage</label>
        <input type="number" max="500000" name="kilometers">
        <label>Prix</label>
        <input type="price" name="price">
        <label>Option n°1</label>
        <textarea id="option1" name="option1"></textarea>
        <label>Option n°2</label>
        <textarea id="option2" name="option2"></textarea>
        <label>Option n°3</label>
        <textarea id="option3" name="option3"></textarea>
        <label>Option n°4</label>
        <textarea id="option4" name="option4"></textarea>

        <label>Ajouter une photo</label>
        <input type="file" name="main_photo" href="gallery.php">


        <input type="submit" value="Ajouter" name="button">
    </form>
</div>
</body>
</html>