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
    <title>Garage Parrot</title>
</head>


<body>

<?php
include "header.php";

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $con = require_once 'connexion.php';
    
    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                   $con->real_escape_string($_POST["email"]));
    
    $is_admin = mysqli_query($con, "SELECT id FROM user WHERE is_admin = true");
    
    $result = $con->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password"])) {            
            session_start();           
            session_regenerate_id();
            $_SESSION["user_id"] = $user["id"];
            header("Location: index.php");
            exit;
            } if ($is_admin) {
            header("Location: admin.php");
        }
    }

    
    $is_invalid = true;
}

?>
    
    <h1>Se connecter</h1>
    
    <?php if ($is_invalid): ?>
        <em>Email non valide</em>
    <?php endif; ?>
    
    <form method="post">
        <label for="email">Adresse email</label>
        <input type="email" name="email" id="email"
               value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
        
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password">
        
        <button>Se connecter</button>
    </form>


<?php
include "footer.php";
?>
</body>
</html>