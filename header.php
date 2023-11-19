<?php
if (isset($_SESSION["id"])) {
    $con = require_once 'connexion.php';
    $sql = "SELECT * FROM users
            WHERE id = {$_SESSION["id"]}";
    $result = $con->query($sql);  
    $user = $result->fetch_assoc();
}
?>
<header>
    

    <nav class="navbar">
        <a href="index.php" class="nav-branding">
            <img src="photos/Logos/logo-footer.png" alt="Logo">
        </a>

            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="usedcars.php" class="nav-link">Véhicules d'occasion</a>
                </li>
                <li class="nav-item">
                    <a href="contact.php" class="nav-link">Contact</a>
                </li>
                <li class="nav-item">
                <?php if (isset($user)): ?>
                    <a href="logout.php">Se déconnecter</a>
                <?php else: ?>            
                    <a href="login.php">Connexion</a>
                <?php endif; ?>
                </li>
            </ul>

            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
    </nav>



</header>
<script src="JS/script.js"></script>