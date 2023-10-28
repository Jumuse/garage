<footer>


<div class="upwards">
    <img src="" class="logo-footer" alt="logo">
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
    $req = mysqli_query($con , "SELECT opening_time_morning, closing_time_morning, opening_time_afternoon, closing_time_morning FROM garage");
    if(mysqli_num_rows($req) == 0){
        echo "RIen dans la base de données" ;
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

<div class="downwards">
    <p class="footerP">mentions légales</p>
</div>

</footer>
