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

<?php
echo "Page de traitement des options";
echo "<br>";
$postedkeys = array_keys($_POST);
//print_r($postedkeys);
//echo "<br>";
//print_r($_POST);
//print_r($_FILES);

try {
    $connection = new PDO("mysql:host=localhost;dbname=itw", "root", "");
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<br>";
    echo "Connected successfully to the database";
    echo "<br>";
  } catch (PDOException $e) {
    echo "Connection to database failed: " . $e->getMessage();
  }

if(isset($postedkeys[0]) && isset($postedkeys[1])) {
    // The image submit button was clicked
    $button=substr($postedkeys[0],0,strlen($postedkeys[0])-2);
    $positiontrash=strpos($button,"trash");
    
    //Ici on traite la suppression d'un équipe, mais les photos restent.
    if(strpos($button,"trash")>0){
        $id=substr($button,0,$positiontrash);
        echo "On veut supprimer: ".$id;
        $requete = "DELETE FROM equipes WHERE equipe_id='".$id."';";
        $resultat = $connection->exec($requete);
        header('Location: '.$_SERVER['HTTP_REFERER']) ;
        exit();
    }
    $positionedit=strpos($button,"edit");
    if(strpos($button,"edit")>0){
        $id=substr($button,0,$positionedit);
        echo "On veut editer: ".$id;
        $_SESSION["edit"]=$id;
        header('Location: edit.php') ;
        exit();
    }
    if($button=="addEq"){
        echo "On veut rajouter un équipe";
        header("Location: addEq.php") ;
        exit();
    }
}

//Ici on traite l'ajout d'un nouvel équipe. Tout les infos doivent être fournis.
//Il faut des photo de même tailles que les autres.
if (isset($_POST["submitaddEq"])) {
  echo "<br>";
  echo "On a envoyé un équipe a rajouter";
  if((((((((!empty($_POST['equipe_id'])&&!empty($_POST['championnat']))&&!empty($_POST['sexe']))
  &&!empty($_POST['coach']))&&!empty($_POST['url_res']))&&!empty($_POST['url_classmnt']))
  &&$_FILES['photo_c']['error']===0)&&$_FILES['photo_e']['error']===0)){
  echo "<br>";
    if (is_uploaded_file($_FILES["photo_c"]["tmp_name"])){
      echo "<p>Succès d'envoi de photo_c!</p>";
    } else {
      echo "<p>Echèc d'envoi de photo_c!</p>";
    }
    if (move_uploaded_file($_FILES["photo_c"]["tmp_name"], "./images/".$_FILES["photo_c"]["name"])) {
      echo "<p>Succès de téléchargement de photo_c!</p>";
    } else {
      echo "<p>Echèc de téléchargemen de photo_c!</p>";
    }

  echo "<br>";
    if (is_uploaded_file($_FILES["photo_e"]["tmp_name"])){
      echo "<p>Succès d'envoi de photo_e!</p>";
    } else {
      echo "<p>Echèc d'envoi de photo_e!</p>";
    }
    if (move_uploaded_file($_FILES["photo_e"]["tmp_name"], "./images/".$_FILES["photo_e"]["name"])) {
      echo "<p>Succès de téléchargement de photo_e!</p>";
    } else {
      echo "<p>Echèc de téléchargemen de photo_e!</p>";
    }

    
    $requete = "
    insert into equipes values (
      '".$_POST['equipe_id']."',
      '".$_POST['championnat']."',
      '".$_POST['sexe']."',
      '".$_POST['coach']."',
      '".$_FILES["photo_c"]["name"]."',
      '".$_FILES["photo_e"]["name"]."',
      '".$_POST['url_res']."',
      '".$_POST['url_classmnt']."'
    );
    ";

    $resultat = $connection->exec($requete);

    if($resultat!=0){
      echo "<br>";
      echo "Equipe rajouté dans la database!";
    }else{
      echo "<br>";
      echo "Équipe pas rajouté dans la database!";
    }
  }else{
    echo "<br>";
    echo "Quelques infos manquent!";
  }

  header("Location: lesequipes.php") ;
  exit();
}

?>