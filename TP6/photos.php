<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8" />
  <title>Photos</title>
  <link rel="stylesheet" href="styles/photos.css" type="text/css" />
</head>

<body>
  <!-- le menu de navigation -->
  <nav>
    <ul class="barre-de-menu">
      <li><a href="index.php">Accueil</a></li>
      <li><a href="cv.php">Mon CV</a></li>
      <li><a href="agenda.php">Agenda</a></li>
      <li><a href="photos.php" class="actuel">Photos</a></li>
    </ul>
  </nav>

  <main>
    <header>
      <h1>Ma gallerie de photos</h1>
    </header>

    <?php
    $tabdescription = array();
    $rep = "./images/photos/description.txt";
    $nblines = count(file($rep));
    if (file_exists($rep)) {
      $fichier = fopen($rep, "r");
      for ($i = 0; $i < $nblines; $i++) {
        $line = fgets($fichier);
        $positionsep = strpos($line, ":");
        $cle = substr($line, 0,$positionsep-1);
        $valeur = substr($line,$positionsep+1, strlen($line) - $positionsep -1);
        $tabdescription[$cle] = $valeur;
      }
    }
    ?>

    <section id="ajoutphoto">
    <a href="./ajoutphoto.html">Ajouter une photo</a>
    </section>

    <?php
    echo "<section id='gallerie'>";
    $rep = "images/photos";
    $id_rep = opendir($rep);
    echo "<section id='gallerie'>";
    while ($fichier = readdir($id_rep)) {
      if (($fichier != ".") && ($fichier != "..") && ($fichier != "description.txt")) {
        if (strpos($fichier, "thumb") !== false) {
          $nvfichier = substr($fichier, 6, strlen($fichier));
        }
        if (strpos($fichier, "Small") !== false) {
          $nvfichier = substr($fichier, 0, strpos($fichier, "Small")) . ".jpg";
        }
        if ((strpos($fichier, "thumb") !== false) || (strpos($fichier, "Small") !== false)) {
          echo "<a class='img' href='./images/photos/" . $nvfichier . "' title='" . $nvfichier . "'>";
          echo "<img src='./images/photos/" . $fichier . "' width='110' height= '90' />";
          if (isset($tabdescription[$nvfichier])) {
            echo "<div class='desc'>" . $tabdescription[$nvfichier] . "</div>";
          }else{
            echo "<div class='desc'>Probleme d'affichage de description</div>";
          }
          echo "</a>";
        }
      }
    }
    echo "</section>";
    closedir($id_rep);
    ?>

  </main>
</body>

</html>