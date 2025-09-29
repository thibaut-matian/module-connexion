<?php
session_start();
session_destroy(); // Détruit toutes les variables de session
header('Location: index.php'); // Redirige vers la page d'accueil
exit();
?>