<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Style/footer-style.css" rel="stylesheet" type="text/css" />
    <link href="Style/header-style.css" rel="stylesheet" type="text/css" />
    <link href="Style/index-style.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Hind+Madurai:wght@300&family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Garage Parrot</title>
</head>
<body>
<?php
include "header.php";
?>

    <div class="frontPicture">
        <img src="" class="background-picture" alt="">
        <img src="" class="m-background-picture" alt="">

    </div>
    <div class="bloc1">
        <img src="" class="imgB1" alt=''>
        <div class="wrapper">        
            <h2>LE GARAGE</h2>
            <p>
            L’ensemble de l’équipe du garage Vincent Parrot est heureuse de vous accueillir dans ses locaux.
            <br><br>
            Notre fondateur, Vincent Parrot, fort de ses quinze ans dans la réparation de véhicules, saura vous proposer LA solution à tous vos problèmes mécaniques.
            <br><br>
            Nos forfaits entretien et réparation toutes marques sont garantis. Chez nous, vous venez avant tout pour la qualité de notre travail.
            </p>
        </div>

    </div>

    <div class="bloc2">
        <h2>VOS AVIS</h2>
        <div class="group">
            <form action="form-process.php" method="post" id="form-process">
                <div class="wraps">
                    <div>
                        <label for="name">Votre nom</label>
                        <input type="text" name ="name">
                    </div>
                    <div>
                        <label for="mark">Sur une échelle de 1 à 5, comment jugez-vous notre établissement ?</label>
                        <select name="mark" id="mark">
                            <option value="1">1 étoile</option>
                            <option value="2">2 étoiles</option>
                            <option value="3">3 étoiles</option>
                            <option value="4">4 étoiles</option>
                            <option value="5">5 étoiles</option>
                        </select>
                    </div>
                    <div>
                        <label for="message">Avez-vous des choses à ajouter sur notre prestation ?</label>
                        <textarea id="message" name="message"></textarea>
                    </div>

                    <button type="submit" value="Envoyer" name="send">Envoyer votre avis</button>
            </form>
        </div>

        <div class="group">
            <?php
            include_once "connexion.php";
            $req = mysqli_query($con , "SELECT name, message, mark FROM comments");
            if(mysqli_num_rows($req) == 0){
                echo "<p>Le garage ne propose pas ce type de services.</p>" ;
            }else {
            while($row=mysqli_fetch_assoc($req)){
            ?>
                <section class="groupir">
                    <h3><?=$row['name']?></h3>
                    <h5><?=$row['mark']?></h5>
                </section>
                <p><?=$row['message']?></p>
                <?php
                }
            }
            ?>
        </div>
    </div>

    <div class="bloc3">
        <h2>NOS SERVICES</h2>
        <div class="group">
            <h3>Forfaits entretien</h3>
                <table>
                    <tr id="items">
                        <th>Intitulé</th>
                        <th>Prix</th>
                    </tr>
                    <?php
                    include_once "connexion.php";
                    $req = mysqli_query($con , "SELECT title, price FROM services WHERE category = 'Entretien'");
                    if(mysqli_num_rows($req) == 0){
                        echo "<p>Le garage ne propose pas ce type de services.</p>" ;
                    }else {
                        while($row=mysqli_fetch_assoc($req)){
                            ?>
                            <tr>
                                <td><?=$row['title']?></td>
                                <td><?=$row['price']?></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </table>
        </div>

        <div class="group">
            <h3>Pièces détachées</h3>
                <table>
                    <tr id="items">
                        <th>Intitulé</th>
                        <th>Prix</th>
                    </tr>
                    <?php
                    include_once "connexion.php";
                    $req = mysqli_query($con , "SELECT title, price FROM services WHERE category = 'Pièces'");
                    if(mysqli_num_rows($req) == 0){
                        echo "<p>Le garage ne propose pas ce type de services.</p>" ;
                    }else {
                        while($row=mysqli_fetch_assoc($req)){
                            ?>
                            <tr>
                                <td><?=$row['title']?></td>
                                <td><?=$row['price']?></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </table>
        </div>

        <div class="group">
            <h3>Mécanique</h3>
                <table>
                    <tr id="items">
                        <th>Intitulé</th>
                        <th>Prix</th>
                    </tr>
                    <?php
                    include_once "connexion.php";
                    $req = mysqli_query($con , "SELECT title, price FROM services WHERE category = 'Mécanique'");
                    if(mysqli_num_rows($req) == 0){
                        echo "<p>Le garage ne propose pas ce type de services.</p>" ;
                    }else {
                        while($row=mysqli_fetch_assoc($req)){
                            ?>
                            <tr>
                                <td><?=$row['title']?></td>
                                <td><?=$row['price']?></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </table>
        </div>
    </div>
    
</body>

<footer>
    <?php
    include "footer.php";
    ?>
</footer>
</html>