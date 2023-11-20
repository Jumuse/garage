<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Style/footer-style.css" rel="stylesheet" type="text/css" />
    <link href="Style/header-style.css" rel="stylesheet" type="text/css" />
    <link href="Style/index-style.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Hind+Madurai:wght@300&family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        .timesWrap {
            display: flex;
            justify-content: space-around;
        }
    </style>

    <title>Garage Parrot</title>
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
    </div>


    <script src="script.js"></script>
</body>
    <?php
    include "footer.php";
    ?>

</html>