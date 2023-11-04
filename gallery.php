<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste photos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<section>
    <?php
    include_once "connexion.php";
    $req = mysqli_query($con , "SELECT * FROM gallery");

    if(mysqli_num_rows($req) < 1){
        ?>
        <p class="vide_message">La liste des photos est vide.</p>
        <?php
    }

    while($row = mysqli_fetch_assoc($req)){
        ?>
        <div class="box">
            <img  class="main_photo" src="Gallery/<?=$row['photo_title']?>">
            <div><?=$row['photo_title']?></div>
        </div>
        <?php
    }
    ?>

</section>
</body>
</html>