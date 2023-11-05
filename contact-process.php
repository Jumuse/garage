<?php

if (empty($_POST["firstname"])) {
    die("Entrez votre prénom, s'il vous plaît");
}
if (empty($_POST["lastname"])) {
    die("Entrez votre nom, s'il vous plaît");
}
if (empty($_POST["email"])) {
    die("Entrez votre adresse email, s'il vous plaît");
}
if (empty($_POST["telephone"])) {
    die("Entrez votre numéro de téléphone, s'il vous plaît");
}
if (empty($_POST["lastname"])) {
    die("Entrez le sujet de votre message, s'il vous plaît");
}
if (strlen($_POST["message"]) > 150) {
    die("Votre message est limité à 150 caractères");
}

$con = require_once 'connexion.php';

$sql = "INSERT INTO form (id, firstname, lastname, email, telephone, subject, message, receives)
        VALUES (?, ?, ?, ?, ?, ?, ?, 2)";

$stmt = $con->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $con->error);
}

$stmt->bind_param("sss",
    $_POST["firstname"],
    $_POST["lastname"],
    $_POST["email"],
    $_POST["telephone"],
    $_POST["subject"],
    $_POST["message"]
);

if ($stmt->execute()) {

    header("Location: index.php");
    exit;

} else {

    if ($con->errno === 1062) {
        die("Ce message existe déjà");
    } else {
        die($con->error . " " . $con->errno);
    }
}
?>