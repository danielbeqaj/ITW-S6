<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8"/>
  <link rel="stylesheet" href="styles/stylesCommuns.css"/>
  <title>Equipes du FCCB</title>
</head>
<body>
  <div id="wrapper">
  	<header>
  	  <h1>FCCB</h1>
  	  <h2>Equipe <?php echo $_GET['equipe']; ?></h2>
    </header>
    <nav>
      <ul>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="lesequipes.php" >Les équipes</a></li>
        <li><a href="terrains.php" >Terrains</a></li>
        <li>	
          &nbsp;&nbsp;&nbsp;&nbsp;
          <form action="connexion.php" method="post">
            Identifiant : <input type="text" size="16" name="login" />
            Mot de passe : <input type="password" size="16" name="passwd" />
            <input type="submit" value="Se connecter" />
          </form>				
        </li>
      </ul>
    </nav> 
    <section>
      <h1>Under construction ! <img src="./images/enConstruction.gif" /></h1>
    </section>
  </div>
</body>
</html>