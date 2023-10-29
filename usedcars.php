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
?>
    <div class="frontPicture">
        <img src="" class="background-picture" alt="">
        <img src="" class="m-background-picture" alt="">

    </div>
    <div class="bloc1">
        <img src="" class="imgB1" alt=''>
        <div class="wrapper">        
            <p>
            Vous êtes à la recherche d'un véhicule d'occasion ? Vous êtes au bon endroit !
            <br>
            Toute l'expertise de l'équipe de Vincent Parrot au service de votre sécurité !
            Nos experts vous assurent un contrôle sécurité total, et une garantie de 2 ans sur chacun de nos véhicules à la vente.
            <br>
            Pour un maximum de confort, n'hésitez pas à régler les filtres ci-dessous pour affiner votre recherche.
            <br>
            Un véhicule en particulier a su retenir votre attention ? N'hésitez pas à remplir le formulaire de contact prévu sous chaque annonce.
            </p>
        </div>

    </div>

    <div class="bloc2">
        <div class="filtres">

        </div>
    </div>

    <div class="bloc3">
        <h2>NOS VÉHICULES</h2>
        <div class="group">
            <div class="cube">

            </div>
        </div>

        <div class="formulaire">

            <form action="" method="POST">

                <div class="wraps">
                    <label for="name">Nom</label>
                    <input type="text" id="name" name="name">
                </div>

                <div>
                    <label for="name">Notez notre prestation !</label>

                    <input type="radio" id="mark" name="mark">
                    <label for="one">1</label>

                    <input type="radio" id="mark" name="mark">
                    <label for="two">2</label>

                    <input type="radio" id="mark" name="mark">
                    <label for="three">3</label>

                    <input type="radio" id="mark" name="mark">
                    <label for="four">4</label>

                    <input type="radio" id="mark" name="mark">
                    <label for="five">5</label>
                    
                </div>

                <div class="wraps">
                    <label for="comment">Commentaire</label>
                    <input type="text" id="comment" name="comment">
                </div>


                <button type="submit" value="Envoyer" name="send">Envoyer</button>
            </form>

    </div>

    </div>
    
</body>
<footer>
    <?php
    include "footer.php";
    ?>
</footer>
</html>