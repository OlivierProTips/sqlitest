<?php
// Démarrage de la session
session_start();

// Destruction de la session
session_destroy();

// Redirection vers la page d'authentification
header("Location: index.html");
?>