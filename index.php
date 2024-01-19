<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "admin", "Admin1234!", "testMysqli");

// Récupérer l'URL actuelle de votre page
$uri = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

// Vérifier la présence des mots spécifiques dans l'URL
if (strpos($uri, "id_sup") !== false) {
    include ('delete_user.php');
} elseif (strpos($uri, "id_mod") !== false) {
    include ('update_user.php');
} else {
    include ('add_user.php');
}
// Fermeture de la connexion
$connexion->close();
?>