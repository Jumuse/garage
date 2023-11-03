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
    if(isset($name) && isset($message) && isset($mark)){
        include_once "connexion.php";
        $req = mysqli_query($con , "INSERT INTO comments VALUES(NULL, '$name', '$message','$mark')");
        if($req){
            header("location: admin.php");
        }else {
            $message = "Le commentaire n'a pas pu être ajouté.";
        }
    }else {
        $message = "Veuillez remplir tous les champs !";
    }
}

?>
<div class="form">
    <a href="admin.php" class="back_btn"> Retour</a>
    <h2>Ajouter un commentaire</h2>
    <p class="erreur_message">
        <?php
        if(isset($message)){
            echo $message;
        }
        ?>

    </p>
    <form action="" method="POST">
        <label>Nom</label>
        <input type="text" name="title">
        <label>Message</label>
        <textarea id="message" name="message"></textarea>
        <label>Note</label>
        <select name="mark" id="mark">
            <option value="1">1 étoile</option>
            <option value="2">2 étoiles</option>
            <option value="3">3 étoiles</option>
            <option value="4">4 étoiles</option>
            <option value="5">5 étoiles</option>
        </select>

        <input type="submit" value="Ajouter" name="button">
    </form>
</div>
</body>
</html>