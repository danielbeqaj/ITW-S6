<?php
session_start();
//echo $_SESSION["connection"];
if($_SESSION["connection"]!=1){
  session_unset();
}
/*
if(isset($_SESSION['login'])){
echo "On est connecté!";
}else{
  echo "On n'est pas connecté!";
}
*/
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8"/>
  <link rel="stylesheet" href="styles/stylesCommuns.css"/>
  <title>FCCB</title>
</head>
<body>
  <div id="wrapper">
    <header>
      <h1>FCCB</h1>
      <h2>Football Club Crolles Bernin</h2>
    </header>
    <nav>
      <ul>
      	<li><a href="index.php">Accueil</a></li>
      	<li><a href="lesequipes.php" >Les équipes</a></li>
      	<li><a href="terrains.php" >Terrains</a></li>
        <li>	
          &nbsp;&nbsp;&nbsp;&nbsp;
          <?php
          if($_SESSION["connection"]===true){
            echo "
            <form action='connexion.php' method='post'>".$_SESSION['login']." ".
            "<input type='submit' name='deconnection' value='Se déconnecter' />
          </form>		
            ";
          }else{
            echo "
            <form action='connexion.php' method='post'>
            Identifiant : <input type='text' size='16' name='login' />
            Mot de passe : <input type='password' size='16' name='passwd' />
            <input type='submit' name='connection' value='Se connecter' />
          </form>		
            ";
          }
          ?>		
        </li>
      </ul>
    </nav> 
    <section>
      <h2>Bienvenue sur la page d'accueil du FCCB</h2>
      <h1>Under construction ! <img src="./images/enConstruction.gif" /></h1>
    </section>
  </div>
</body>
</html>