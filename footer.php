<footer>


<div class="upwards">
    <img src="photos/Logos/Logo Light.png" class="logo-footer" alt="logo">
    <p class="footerP">
        <?php 
            require_once 'Back/dates.php';
            echo "Aujourd'hui, ". dateToFrench("now" ,"l"). " ". dateToFrench("now" ,"j F Y");
        ?>
        <br>
        <?php
            echo retrieveDate();
        ?>
    </p>
</div>

<div class="middlePart">
    <img src="" class="img-footer" alt="'Logo TripAdvisor">
</div>

<div class="downwards">
    <p class="footerP">mentions légales</p>
</div>

</footer>
