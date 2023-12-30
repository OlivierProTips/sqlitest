<?php
// Démarrage de la session
session_start();

//error_reporting(E_ALL);
//ini_set('display_errors', 1);

// Connexion à la base de données MySQL
include_once 'db.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Récupération des données du formulaire
$email = $_POST['email'];
$password = $_POST['password'];

// Vérification de l'existence de l'utilisateur dans la base de données
$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
try {
  $result = $conn->query($sql);
}
catch (Exception $e) {
}

if ($result->num_rows > 0) {
  // L'utilisateur existe, on le redirige vers la page d'accueil
  // On définit la variable de session email avec la valeur du formulaire
  $_SESSION['email'] = $email;
  $sql = "UPDATE users SET last_connection = NOW() WHERE email = '$email'";
  try {
    $conn->query($sql);
  }
  catch (Exception $e) {
  }


  header("Location: home.php");
} else {
  // L'utilisateur n'existe pas, on affiche un message d'erreur
  header("Location: error.html");
}

$conn->close();
?>