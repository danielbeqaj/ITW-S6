<?php
if(isset($_COOKIE["visites"])){
  setcookie("visites",$_COOKIE["visites"]+1,time()+3600*0.5);
  //echo "Cookie is set and incremented";
}else{
  //echo "Cookie is not set";
  setcookie("visites",2,time()+3600*0.5);
} 
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <title>Accueil</title>
    <link rel="stylesheet" href="styles/accueil.css" type="text/css" />
  </head>
  <body>
    <!-- le menu de navigation -->
    <nav>
      <ul class="barre-de-menu">
        <li><a href="index.php" class="actuel">Accueil</a></li>
        <li><a href="cv.php">Mon CV</a></li>
        <li><a href="agenda.php">Agenda</a></li>
        <li><a href="photos.php">Photos</a></li>
      </ul>
    </nav>

    <!-- le contenu de la page -->
    <main>
      <section><p>Bienvenue sur mon mini site web !</p></section>

      <?php
      if(isset($_COOKIE["visites"])){
        echo "<section><p>Nombre de visites: ".$_COOKIE["visites"]."</p></section>";
      }else{
        echo "<section><p>Nombre de visites: 1</p></section>";
      }
      echo "<section><a href='resetvisitcount.php'>Reinitialiser le nombre de visites</a></section>";
      echo "<br>";
      ?>

      <section class="actions">
        <a href="cv.html" class="action-cv"
          ><img src="images/cv.svg" alt="Lien vers mon CV"
        /></a>
        <a href="mailto:jane.doe@univ-grenoble-alpes.com" class="action-mail"
          ><img src="images/mail.svg" alt="Courriel"
        /></a>
        <a href="https://shs.univ-grenoble-alpes.fr" class="action-ufr"
          ><img
            src="images/ufr.svg"
            alt="Lien vers l'UFR SHS de l'université Grenoble-Alpes"
        /></a>
      </section>
    </main>
  </body>
</html>