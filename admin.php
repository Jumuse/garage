<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garage Parrot</title>
</head>
<body>
<?php
include "header.php";
include_once "connexion.php";
?>

<div class="content">
    <h2>Modifier les informations du garage</h2>

    <table>
        <tr id="items">
            <th>Adresse</th>
            <th>Numéro de téléphone</th>
            <th>Ouverture matin</th>
            <th>Fermeture matin</th>
            <th>Ouverture après midi</th>
            <th>Fermeture après midi</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
        <?php
        include_once "connexion.php";
        $req = mysqli_query($con , "SELECT * FROM garage");
        if(mysqli_num_rows($req) == 0){
            echo "Aucune information présente !" ;

        }else {
            while($row=mysqli_fetch_assoc($req)){
                ?>
                <tr>
                    <td><?=$row['address']?></td>
                    <td><?=$row['phone_number']?></td>
                    <td><?=$row['opening_time_morning']?></td>
                    <td><?=$row['closing_time_morning']?></td>
                    <td><?=$row['opening_time_evening']?></td>
                    <td><?=$row['closing_time_evening']?></td>

                    <td><a href="garage_modify.php?id=<?=$row['id']?>"><img src="photos/Logos/pen.png"></a></td>
                </tr>
                <?php
            }

        }
        ?>


    </table>

</div>

<div class="content">
    <h2>Modifier les véhicules d'occasion à la vente :</h2>
    <a href="add_usedcar.php" class="Btn_add"> <img src="photos/Logos/plus.png"> Ajouter</a>
    <table>
        <tr id="items">
            <th>Titre</th>
            <th>Description</th>
            <th>Année</th>
            <th>Kilomètres</th>
            <th>Prix</th>
            <th>Option 1</th>
            <th>Option 2</th>
            <th>Option 3</th>
            <th>Option 4</th>
            <th>Photo</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
        <?php
        include_once "connexion.php";
        $req = mysqli_query($con , "SELECT * FROM usedcars");
        if(mysqli_num_rows($req) == 0){
            echo "Aucune voiture à la vente !" ;

        }else {
            while($row=mysqli_fetch_assoc($req)){
                ?>
                <tr>
                    <td><?=$row['title']?></td>
                    <td><?=$row['description']?></td>
                    <td><?=$row['year']?></td>
                    <td><?=$row['kilometers']?></td>
                    <td><?=$row['price']?></td>
                    <td><?=$row['option1']?></td>
                    <td><?=$row['option2']?></td>
                    <td><?=$row['option3']?></td>
                    <td><?=$row['option4']?></td>
                    <td><?=$row['main_photo']?></td>

                    <td><a href="usedcar_modify.php?id=<?=$row['id']?>"><img src="photos/Logos/pen.png"></a></td>
                </tr>
                <?php
            }

        }
        ?>


    </table>
</div>

<div class="content">
    <h2>Modifier les services proposés</h2>
    <a href="add_service.php" class="Btn_add"> <img src="photos/Logos/plus.png"> Ajouter</a>

    <table>
        <tr id="items">
            <th>Nom du service</th>
            <th>Catégorie</th>
            <th>Prix</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
        <?php
        include_once "connexion.php";
        $req = mysqli_query($con , "SELECT * FROM services");
        if(mysqli_num_rows($req) == 0){
            echo "Il n'y a pas encore de services à ajouter !" ;

        }else {
            while($row=mysqli_fetch_assoc($req)){
                ?>
                <tr>
                    <td><?=$row['title']?></td>
                    <td><?=$row['category']?></td>
                    <td><?=$row['price']?></td>

                    <td><a href="services_modify.php?id=<?=$row['id']?>"><img src="photos/Logos/pen.png"></a></td>
                    <td><a href="services_delete.php?id=<?=$row['id']?>" onclick="return(confirm('Confirmez-vous la suppression ?'));"><img src="photos/Logos/bin.png"></a></td>
                </tr>
                <?php
            }

        }
        ?>


    </table>

    <div class="content">
        <h2>Modérer les avis</h2>
        <a href="add_comment.php" class="Btn_add"> <img src="photos/Logos/plus.png"> Ajouter</a>

        <table>
            <tr id="items">
                <th>Nom</th>
                <th>Message</th>
                <th>Note</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            <?php
            include_once "connexion.php";
            $req = mysqli_query($con , "SELECT * FROM comments");
            if(mysqli_num_rows($req) == 0){
                echo "Il n'y a pas encore de commentaires !" ;

            }else {
                while($row=mysqli_fetch_assoc($req)){
                    ?>
                    <tr>
                        <td><?=$row['name']?></td>
                        <td><?=$row['message']?></td>
                        <td><?=$row['mark']?></td>

                        <td><a href="comments_modify.php?id=<?=$row['id']?>"><img src="photos/Logos/pen.png"></a></td>
                        <td><a href="comments_delete.php?id=<?=$row['id']?>" onclick="return(confirm('Confirmez-vous la suppression ?'));"><img src="photos/Logos/bin.png"></a></td>
                    </tr>
                    <?php
                }

            }
            ?>


        </table>

</body>

<footer>
    <?php
    include "footer.php";
    ?>
</footer>
</html>
