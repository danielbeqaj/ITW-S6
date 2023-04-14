<?php
//Pour supprimer le cookie
setcookie("visites","",time()-3600*2,"/");
unset($_COOKIE["visites"]);
header('Location: http://localhost:3001/index.php');
?>