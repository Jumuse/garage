<footer>


<div class="upwards">
    <img src="photos/Logos/logo-footer.png" class="logo-footer" alt="logo">
    <p class="footerP">
        <?php 
            require_once 'dates.php';
            echo "Aujourd'hui, ". dateToFrench("now" ,"l"). " ". dateToFrench("now" ,"j F Y");
        ?>
        <br>
        <?php
            echo retrieveDate();
        ?>
    </p>
</div>

<div class="middlePart">
    <h5>Le garage est ouvert du lundi au samedi :</h5>

    <?php
    include_once "dates.php";
    include_once "connexion.php";
    $req = mysqli_query($con , "SELECT opening_time_morning, closing_time_morning, opening_time_evening, closing_time_evening FROM garage");
    if(mysqli_num_rows($req) == 0){
        echo "Il manque une information dans la base de données" ;
    }else {
        while($row=mysqli_fetch_assoc($req)){
            ?>
                <ul>
                    <li>LUNDI au VENDREDI <?=$row['opening_time_morning']?> à <?=$row['closing_time_morning']?> & <?=$row['opening_time_evening']?> à <?=$row['closing_time_evening']?></li>
                    <li>SAMEDI <?=$row['opening_time_morning']?> à <?=$row['closing_time_morning']?></li>
                    <li>DIMANCHE fermé</li>
                </ul>
            <?php
        }
    }
    ?>


</div>

<div class="downwards">
    <p class="footerP">mentions légales</p>
</div>

</footer>
