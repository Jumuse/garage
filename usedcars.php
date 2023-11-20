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
                <img src="Gallery/<?=$row['main_photo']?>.jpg" alt="<?=$row['main_photo']?>">
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

                    <div class="formulaire">
                        <form action="contact-process.php" method="post" id="contact-process">
                            <div class="wraps">
                                <div>
                                    <label for="firstname">Votre prénom</label>
                                    <input type="text" id=="firstname" name ="firstname">
                                    <label for="lastname">Votre nom</label>
                                    <input type="text" id="lastname" name ="lastname">
                                    <label for="lastname">Votre adresse email</label>
                                    <input type="email" id="email" name ="email">
                                    <label for="lastname">Votre téléphone</label>
                                    <input type="tel" id="telephone" name ="telephone">
                                </div>
                                <div>
                                    <label for="subject">Sujet</label>
                                    <input type="text" id="subject" name="subject">
                                    <label for="message">Votre message</label>
                                    <textarea id="message" name="message"></textarea>
                                </div>


                                <button type="submit" value="Envoyer" name="send">Envoyer</button>
                        </form>
                    </div>

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

    <?php
    include "footer.php";
    ?>

</html>