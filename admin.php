<?php
session_start();
?>
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

</body>


    <?php
    include "footer.php";
    ?>

</html>
