<?php
session_start();
//echo $_SESSION["connection"];
if($_SESSION["connection"]!=1){
  session_unset();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="styles/stylesCommuns.css" />
  <title>Equipes du FCCB</title>
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
        <li><a href="lesequipes.php">Les équipes</a></li>
        <li><a href="terrains.php">Terrains</a></li>
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

    <?php
    try {
      $connection = new PDO("mysql:host=localhost;dbname=itw", "root", "");
      $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //echo "Connected successfully";
    } catch (PDOException $e) {
      //echo "Connection failed: " . $e->getMessage();
    }
    ?>

    <section>
      <h1>Equipes Masculines</h1>

      <?php
      if($_SESSION["connection"]===true){
        echo "
        <form action='options.php' method='post'>
        <input type='image' name='addEq' class='options addEq' src='images/addEq.jpg'/>
        </form>
        ";
      }
      ?>

      <ul>

      <?php
      //
      $requete = "SELECT * FROM equipes WHERE sexe = 'M' ORDER BY coach ASC";
      $resultat = $connection->query($requete);
      $lignes = $resultat->fetchAll(PDO::FETCH_ASSOC);
      for($i=0; $i<count($lignes); $i++){
        echo "<li>";
        if($_SESSION["connection"]===true){
          echo "
          <form action='options.php' method='post' class='optionsedittrash'>
          <input name='".$lignes[$i]['equipe_id']."trash' class='options trash' type='image' src='images/trash.jpg'/>
          <input name='".$lignes[$i]['equipe_id']."edit' class='options edit' type='image' src='images/edit.jpg'/>
          </form>
          ";
        }
        echo " 
          <img src='images/".$lignes[$i]['photo_e']."'/>
          <img src='images/".$lignes[$i]['photo_c']."'/>
          <h2>".$lignes[$i]['equipe_id']." ".$lignes[$i]['championnat']."</h2>
          <ul>
            <li>Entraineur : ".$lignes[$i]['coach']."</li>
            <li><a href='equipe.php'>Composition</a></li>
            <li>Championnat
              <ul>
                <li><a href='".$lignes[$i]['url_res']."'>Résultats dernière journée</a></li>
                <li><a href='".$lignes[$i]['url_classmnt']."'>Classement</a></li>
              </ul>
            </li>
          </ul>
        </li>
        ";
      $resultat->closeCursor();
      }
      ?>
      </ul>
    </section>


    <section>
      <h1>Equipes Féminines</h1>
      <ul>

      <?php
      //
      $requete = "SELECT * FROM equipes WHERE sexe = 'F'";
      $resultat = $connection->query($requete);
      $lignes = $resultat->fetchAll(PDO::FETCH_ASSOC);
      for($i=0; $i<count($lignes); $i++){
        echo "<li>";
        if($_SESSION["connection"]===true){
          echo "
          <form action='options.php' method='post' class='optionsedittrash'>
          <input name='".$lignes[$i]['equipe_id']."trash' class='options trash' type='image' src='images/trash.jpg'/>
          <input name='".$lignes[$i]['equipe_id']."edit' class='options edit' type='image' src='images/edit.jpg'/>
          </form>
          ";
        }
        echo " 
          <img src='images/".$lignes[$i]['photo_e']."'/>
          <img src='images/".$lignes[$i]['photo_c']."'/>
          <h2>".$lignes[$i]['equipe_id']." ".$lignes[$i]['championnat']."</h2>
          <ul>
            <li>Entraineur : ".$lignes[$i]['coach']."</li>
            <li><a href='equipe.php'>Composition</a></li>
            <li>Championnat
              <ul>
                <li><a href='".$lignes[$i]['url_res']."'>Résultats dernière journée</a></li>
                <li><a href='".$lignes[$i]['url_classmnt']."'>Classement</a></li>
              </ul>
            </li>
          </ul>
        </li>
        ";
      $resultat->closeCursor();
      $connection = NULL;
      }
      ?>


      </ul>
    </section>


  </div>
</body>

</html>