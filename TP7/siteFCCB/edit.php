<?php
session_start();
//echo "Status de connection: ".$_SESSION["connection"];
//Ici c'est pour s'assurer que seulement les admins peuveunt accèder
if($_SESSION["connection"]!=1){
  session_unset();
  header("Location: lesequipes.php") ;
  exit();
}

try {
    $connection = new PDO("mysql:host=localhost;dbname=itw", "root", "");
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "<br>";
    //echo "Connected successfully to the database";
    //echo "<br>";
  } catch (PDOException $e) {
    echo "Connection to database failed: " . $e->getMessage();
  }

if(isset($_SESSION["edit"])){
//echo "On veut editer ".$_SESSION["edit"] ;
$requete = "SELECT * FROM equipes WHERE equipe_id ='".$_SESSION["edit"]."'";
$resultat = $connection->query($requete);
$infos = $resultat->fetch(PDO::FETCH_ASSOC);

echo "<br>";
//print_r($infos);
//print_r($_POST);
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="styles/stylesCommuns.css"/>
        <title>Editer un équipe</title>
        <style>
            #formedit{
                margin-left: 5%;
                font-size: 25px;
            }
            #formedit div{
                padding-bottom: 10px;
            }
            #formedit #championnat{
                width: auto;
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
            <h1>Editer un équipe</h1>
            <ul>
                <?php
                echo "
                <form id='formedit' action='edit.php' method='post' enctype='multipart/form-data'>
                    <div><label for='equipe_id'>Id d'équipe: ".$infos['equipe_id']."</div>
                    <div><label for='championnat'>Championnat: </label><textarea name='championnat' cols='32' rows='1'>".$infos['championnat']."</textarea></div>
                    <div><label for='sexe'>Sexe (M ou F): </label><input type='text' id='sexe' name='sexe' value='".$infos['sexe']."'></div>
                    <div><label for='coach'>Nom du coach: </label><input type='text' id='coach' name='coach' value='".$infos['coach']."'></div>
                    <div><label for='url_res'>url des résultats: </label><textarea name='url_res' cols='90' rows='2'>".$infos['url_res']."</textarea></div>
                    <div><label for='url_classmnt'>url du classement: </label><textarea name='url_classmnt' cols='90' rows='2'>".$infos['url_classmnt']."</textarea></div>
                    <div><input type='submit' id='submitedit' name='submitedit'></div>
                </form>
                ";

                /*
                <div><label for='photo_c'>Photo du coach: </label><input type='file' id='photo_c' name='photo_c'></div>
                    <div><label for='photo_e'>Photo d'équipe: </label><input type='file' id='photo_e' name='photo_e'></div>
                */

                ?>
                </li>
            </ul>
        </section>
    </body>
</html>

<?php
//Ici on peut editer un équipe,sauf son id et ses photos.
if($_POST["submitedit"]==="Submit"){
    //echo "Edit Form Submitted!";

    if(!empty($_POST['coach'])){
        $requete = "UPDATE equipes SET coach='".$_POST['coach']."' WHERE equipe_id='".$_SESSION['edit']."'";
        $resultat = $connection->query($requete);
    }

    if(!empty($_POST['sexe'])){
        $requete = "UPDATE equipes SET sexe='".$_POST['sexe']."' WHERE equipe_id='".$_SESSION['edit']."'";
        $resultat = $connection->query($requete);
    }

    if(!empty($_POST['championnat'])){
        $requete = "UPDATE equipes SET championnat=\"".$_POST['championnat']."\" WHERE equipe_id='".$_SESSION['edit']."'";
        $resultat = $connection->query($requete);
    }

    if(!empty($_POST['url_res'])){
        $requete = "UPDATE equipes SET url_res='".$_POST['url_res']."' WHERE equipe_id='".$_SESSION['edit']."'";
        $resultat = $connection->query($requete);
    }

    if(!empty($_POST['url_res'])){
        $requete = "UPDATE equipes SET url_classmnt='".$_POST['url_classmnt']."' WHERE equipe_id='".$_SESSION['edit']."'";
        $resultat = $connection->query($requete);
    }

    header('Location: lesequipes.php') ;
    exit();
}
?>