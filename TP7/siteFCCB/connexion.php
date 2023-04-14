<?php
    session_start();
  
  if(isset($_POST['deconnection'])){
    $_SESSION["connection"]=false;
    session_unset();
  }

  if (loginOK($_POST['login'],$_POST['passwd'])) {
    $_SESSION['login'] = $_POST['login'];
    $_SESSION["connection"]=true;
  }
  header('Location: '.$_SERVER['HTTP_REFERER']) ;
  
/* Vérifie la combinaison nom/mot de passe et renvoie 
   true si elle est OK, false sinon
   Pour le moment on n'utilise pas de base de données.
   le évrification est codée en "dur" */
   
  function loginOK($login, $passwd) {
    return (($login == "toto") && ($passwd == "toto")); 
  }
  
?>
