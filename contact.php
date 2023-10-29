<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Style/footer-style.css" rel="stylesheet" type="text/css" />
    <link href="Style/header-style.css" rel="stylesheet" type="text/css" />
    <link href="Style/index-style.css" rel="stylesheet" type="text/css" />
    <title>Restaurant Quai Antique</title>
</head>


<body>
  
    <?php
        include "header.php";
    ?>

    <h1>Contact</h1>

    <div class="bloc1">
        <div class="wrapper">        
            <h2>Où nous <br> trouver</h2>
            <p>25 Chemin des Camélias <br> 73000 Chambéry</p>
        </div>

    </div>

    <div class="bloc2">

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


<?php
    include "footer.php";
?>


<script src="script.js"></script>
<style>
    .timesWrap {
        display: flex;
        justify-content: space-around;
    }
</style>

</body>
</html>