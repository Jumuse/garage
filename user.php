<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Style/header-style.css" rel="stylesheet" type="text/css" />
    <link href="Style/footer-style.css" rel="stylesheet" type="text/css" />
    <link href="Style/index-style.css" rel="stylesheet" type="text/css" />
    <link href="Style/admin-style.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Hind+Madurai:wght@300&family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Garage Parrot</title>
</head>
<body>
<?php
include "header.php";
include_once "connexion.php";
?>

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
                    <td><a href="cusedcar_delete.php?id=<?=$row['id']?>" onclick="return(confirm('Confirmez-vous la suppression ?'));"><img src="photos/Logos/bin.png"></a></td>
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
</div>

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
    </div>
</body>


    <?php
    include "footer.php";
    ?>

</html>
