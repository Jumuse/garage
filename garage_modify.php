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
$req = mysqli_query($con , "SELECT * FROM garage WHERE id = $id");
$row = mysqli_fetch_assoc($req);

if(isset($_POST['button'])){
    extract($_POST);
    if(isset($address) && isset($phone_number) && isset($opening_time_morning) && isset($closing_time_morning)  && isset($opening_time_evening)  && isset($closing_time_evening) ){
        $req = mysqli_query($con, "UPDATE comments SET address = '$address' , phone_number = '$phone_number', opening_time_morning = '$opening_time_morning', closing_time_morning = '$closing_time_morning', opening_time_evening = '$opening_time_evening', closing_time_evening = '$closing_time_evening' WHERE id = $id");
        if($req){
            header("location: admin.php");
        }else {
            $message = "Détail non modifié";
        }

    }else {
        $message = "Veuillez remplir tous les champs !";
    }
}

?>

<div class="form">
    <a href="admin.php" class="back_btn">Retour</a>
    <h2>Modifier les informations du garage</h2>
    <p class="erreur_message">
        <?php
        if(isset($message)){
            echo $message ;
        }
        ?>
    </p>
    <form action="" method="POST">
        <label>Adresse</label>
        <input type="text" name="address">
        <label>Numéro de téléphone</label>
        <input type="tel" name="phone_number">
        <label>Ouverture matin</label>
        <input type="time" name="opening_time_morning">
        <label>Fermeture matin</label>
        <input type="time" name="closing_time_morning">
        <label>Ouverture après midi</label>
        <input type="time" name="opening_time_evening">
        <label>Fermeture après midi</label>
        <input type="time" name="closing_time_evening">
        <input type="submit" value="Modifier" name="button">
    </form>
</div>
</body>
</html>