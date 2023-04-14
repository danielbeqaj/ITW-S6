<?php
session_start();
//echo "Status de connection: ".$_SESSION["connection"];
//Ici c'est pour s'assurer que seulement les admins peuveunt accèder
if($_SESSION["connection"]!=1){
  session_unset();
  header("Location: lesequipes.php") ;
  exit();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="styles/stylesCommuns.css"/>
        <title>Ajouter un équipe</title>
        <style>
            #formaddEq{
                margin-left: 5%;
                font-size: 25px;
            }
            #formaddEq div{
                padding-bottom: 10px;
            }
        </style>
    </head>

    <body>
        <div id="wrapper">
            <header>
              <h1>FCCB</h1>
              <h2>Les Equipes</h2>
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
        </div>

        <section>
            <h1>Ajouter un équipe</h1>
            <ul>
                <form id="formaddEq" action="options.php" method="post" enctype="multipart/form-data">
                    <div><label for="equipe_id">Id d'équipe: </label><input type="text" id="equipe_id" name="equipe_id"></div>
                    <div><label for="championnat">Championnat: </label><input type="text" id="championnat" name="championnat"></div>
                    <div><label for="sexe">Sexe (M ou F): </label><input type="text" id="sexe" name="sexe"></div>
                    <div><label for="coach">Nom du coach: </label><input type="text" id="coach" name="coach"></div>
                    <div><label for="photo_c">Photo du coach: </label><input type="file" id="photo_c" name="photo_c"></div>
                    <div><label for="photo_e">Photo d'équipe: </label><input type="file" id="photo_e" name="photo_e"></div>
                    <div><label for="url_res">url des résultats: </label><input type="text" id="url_res" name="url_res"></div>
                    <div><label for="url_classmnt">url du classement: </label><input type="text" id="url_classmnt" name="url_classmnt"></div>
                    <div><input type="submit" id="submitaddEq" name="submitaddEq"></div>
                </form>
                </li>
            </ul>
        </section>
    </body>
</html>