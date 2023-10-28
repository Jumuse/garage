<?php

if (empty($_POST["name"])) {
    die("Entrez votre nom, s'il vous plaît");
}

if (empty($_POST["mark"])) {
    die("N'oubliez pas de nous noter !");
}

if (strlen($_POST["message"]) > 150) {
    die("Votre commentaire est limité à 150 caractères");
}

$con = require_once 'connexion.php';

$sql = "INSERT INTO comments (name, mark, message, moderates)
        VALUES (?, ?, ?, 2)";

$stmt = $con->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $con->error);
}

$stmt->bind_param("sss",
    $_POST["name"],
    $_POST["mark"],
    $_POST["message"]
    );

if ($stmt->execute()) {

    header("Location: index.php");
    exit;

} else {

    if ($con->errno === 1062) {
        die("email already taken");
    } else {
        die($con->error . " " . $con->errno);
    }
}
?>