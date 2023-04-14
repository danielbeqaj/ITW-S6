<?php
$_SESSION["nbcache"]=random_int(0,100);
$_SESSION["nbessais"]=11;
session_abort();
session_start();
//$_SESSION["nbessais"]=11;
//$_SESSION["nbcache"]=random_int(0,100);
//echo session_id();
//echo "<br>";
//echo $_SESSION["nbessais"];
//echo "<br>";
//print_r($_POST);
?>


<!DOCTYPE html>

<html lang="fr">

<head>
  <meta charset="utf8" />
  <title>Nombre caché</title>
  <link rel="stylesheet" href="./style.css">
</head>

<body>
  <header>
    <h1>Nombre caché</h1>
  </header>
  <main>
  <?php

   //echo "<p>".$_SESSION["nbcache"]."</p>"; 

   if($_POST["action"]==="abandonner"){
    echo "
    <p>Désolé vous avez abandonnée! Le nombre était " . $_SESSION["nbcache"] . ".</p><form action='index.php' class='essai' method='POST'><button type='submit' name='action' value='jouer'>Jouer</button></p></form>  </main>
    ";
    $_SESSION["nbessais"]=11;
    $_SESSION["nbcache"]=random_int(0,100);
    header('Location index.php');
    exit();
    }

   if($_SESSION["nbessais"]===11){
    //On vient juste de commencer!
   echo "
   <p>Entrez un nombre entre 0 et 100.</p><form action='index.php' class='essai' method='POST'><p><label for='saisie'>Proposition : </label><input id='saisie' name='saisie' type='number' min='0' max='100' autofocus /></p><p class='num-essai'>(essai 1/10)</p><p><button type='submit' name='action' value='jouer'>Jouer</button><button type='submit' name='action' value='abandonner'>Abandonner</button></p></form>  </main>
   ";
   $_SESSION["nbessais"]=$_SESSION["nbessais"]-1;
   }else{
    if($_SESSION["nbessais"]!=0){
      $essainb=11 - $_SESSION["nbessais"];
    if($_POST["saisie"]<$_SESSION["nbcache"]){
      //trop petit
      echo "
      <p>Trop petit.</p><form action='index.php' class='essai' method='POST'><p><label for='saisie'>Proposition : </label><input id='saisie' name='saisie' type='number' min='0' max='100' autofocus /></p><p class='num-essai'>(essai ".$essainb."/10)</p><p><button type='submit' name='action' value='jouer'>Jouer</button><button type='submit' name='action' value='abandonner'>Abandonner</button></p></form>  </main>
      ";
      $_SESSION["nbessais"]=$_SESSION["nbessais"]-1;
    }else{
      if($_POST["saisie"]>$_SESSION["nbcache"]){
        //trop grand
        echo "
        <p>Trop grand.</p><form action='index.php' class='essai' method='POST'><p><label for='saisie'>Proposition : </label><input id='saisie' name='saisie' type='number' min='0' max='100' autofocus /></p><p class='num-essai'>(essai ".$essainb."/10)</p><p><button type='submit' name='action' value='jouer'>Jouer</button><button type='submit' name='action' value='abandonner'>Abandonner</button></p></form>  </main>
        ";
        $_SESSION["nbessais"]=$_SESSION["nbessais"]-1;
      }else{
        //trouvé avant la 9ème essai
        echo "
        <p>Bravo c'était bien ".$_SESSION["nbcache"].".</p><form action='index.php' class='essai' method='POST'><p><label for='saisie'>Proposition : </label></p><p><button type='submit' name='action' value='jouer'>Jouer</button></p></form>  </main>
        ";
        if($_POST["action"]==="jouer"){
          $_SESSION["nbessais"]=11;
          $_SESSION["nbcache"]=random_int(0,100);
          header('Location index.php');
          exit();
      }
      }
    }
    } else {
      //Plus d'essais.
      if($_POST["saisie"]==$_SESSION["nbcache"]){
        echo "
        <p>Bravo c'était bien " . $_SESSION["nbcache"] . ".</p><form action='index.php' class='essai' method='POST'><button type='submit' name='action' value='jouer'>Jouer</button></p></form>  </main>
        ";
      }else{
        echo "
        <p>Désolé vous n'avez plus d'essais! Le nombre était " . $_SESSION["nbcache"] . ".</p><form action='index.php' class='essai' method='POST'><button type='submit' name='action' value='jouer'>Jouer</button></p></form>  </main>
        ";
      }
    if($_SESSION["nbessais"]===0){
      if($_POST["action"]==="jouer"){
          $_SESSION["nbessais"]=11;
          $_SESSION["nbcache"]=random_int(0,100);
          header('Location index.php');
      }
     }
    }
   }
  ?>
</body>

</html>