<?php
// Connexion à la base de données MySQL
include_once 'db.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE users SET last_connection = null";
$conn->query($sql);

// L'utilisateur n'existe pas, on affiche un message d'erreur
header("Location: index.html");

$conn->close();
?>