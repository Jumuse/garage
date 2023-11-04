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

            <form action="form-process.php" method="post" id="form-process">
                <div class="wraps">
                    <div>
                        <label for="name">Votre nom</label>
                        <textarea id="name" name="name"></textarea>
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

    </div>

    <div>


            <?php
            include_once "connexion.php";
            $req = mysqli_query($con , "SELECT * FROM usedcars");
            if(mysqli_num_rows($req) == 0){
                echo "Aucune voiture n'est enregistrée à la vente !" ;

            }else {
                while($row=mysqli_fetch_assoc($req)){
                    ?>
        <div class="cube">
            <div class="upperHalf">
                <img src="" alt="">
                <p><?=$row['price']?> €</p>
            </div>
            <div class="bottomHalf">
                <h5><?=$row['title']?></h5>
                <p>Année : <?=$row['year']?></p>
                <p>Kilométrage : <?=$row['kilometers']?>km</p>
                <section id="hiddenMsg" style="display:none">
                    <p><?=$row['description']?></p>
                    <ul>
                        <li><?=$row['option1']?></li>
                        <li><?=$row['option2']?></li>
                        <li><?=$row['option3']?></li>
                        <li><?=$row['option4']?></li>
                    </ul>
                </section>

                <hr>
                <p><?=$row['price']?> €</p>
            </div>
            <button type="button" id="detailsBtn" onclick="showMsg()">Détails</button>

                    <?php
                }

            }
            ?>

        </div>


    </div>


<script>
    function showMsg() {
        let paragraph = document.getElementById("hiddenMsg")

        if(paragraph.style.display == "block") {
            paragraph.style.display = "none";
        } else {
            paragraph.style.display = "block";
        }
    }
</script>
</body>
<footer>
    <?php
    include "footer.php";
    ?>
</footer>
</html>