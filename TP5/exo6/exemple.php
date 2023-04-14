<?php
if (isset($_COOKIE['monPetitcookie'])) {
 setcookie('monPetitcookie', "");
} else {
 setcookie('monPetitcookie', 'hello');
}
?>
<html lang="fr">
<head>
 <meta charset="utf-8" />
 <title>Création/Supression de cookie</title>
</head>
<body>
 <h1>Hello Cookie!</h1>
 <?php
 if (isset($_COOKIE['monPetitcookie'])) {
 echo "<p>le cookie monPetitcookie (" . $_COOKIE['monPetitcookie'] . ") a été reçu</p>";
 echo "<p>on a demandé sa suppression en renvoyant cette page</p>";
 } else {
 echo "<p>il n'y a pas de cookie monPetitcookie sur le client</p>";
 echo "<p>on a demandé sa création en renvoyant cette page</p>";
 }
 ?>
</body>
</html>