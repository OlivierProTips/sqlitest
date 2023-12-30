<?php
// Démarrage de la session
session_start();

// Vérification de l'existence de la variable de session email
if (!isset($_SESSION['email'])) {
  // Si la variable n'existe pas, on redirige vers la page d'authentification
  header("Location: login.php");
}
?>
<html>
<head>
  <title>Page d'accueil</title>
  <style>
    /* Définition du style du cadre */
    .cadre {
      width: 400px;
      margin: 0 auto;
      border: 2px solid black;
      padding: 20px;
      background-color: lightblue;
      text-align: center;
    }

    /* Définition du style du bouton */
    input[type="submit"] {
      width: 200px;
      margin: 10px;
      padding: 10px;
      border: none;
      border-radius: 10px;
      background-color: red;
      color: white;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="cadre">
    <h1>Page d'accueil</h1>
    <p>Bonjour <?php echo $_SESSION['email']; ?>, vous êtes connecté.</p>
    <form action="logout.php" method="post">
      <input type="submit" value="Se déconnecter">
    </form>
  </div>
</body>
</html>