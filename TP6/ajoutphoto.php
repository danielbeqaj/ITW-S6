<?php
header('Location: http://localhost:3001/photos.php');
//exit;
/**
*  création d'une copie redimensionnée d'une image jpeg.
*
*  $sourceImageName : 
*      le nom (chemin/nomDuFichier) de l'image source à copier
*      et à redimensionner
*  $destImageName : 
*      le nom (chemin/nomDufichier) de l'image à créer.
*  $destWidth, $destHeight : 
*      la largeur et la hauteur (en pixel) de $destImage.
*/
function redimensionneImageJpeg($sourceImageName,$destImageName,
$destWidth,$destHeight) {
    // calcul de la taille de l'image source
    $imageSize = getimagesize($sourceImageName); 

    // crée une ressource image correspondant au fichier jpeg $sourceImageName
    $sourceImage = imagecreatefromjpeg($sourceImageName); 

    // crée une ressource image noire pour le moment) correspondante 
    // pour accueillir l'image destination
    $destImage = imagecreatetruecolor($destWidth,$destHeight); 

    // recopie l'image source en la redimenssionant dans $destImage
    imagecopyresampled($destImage,$sourceImage,0,0,0,0,
    $destWidth,$destHeight,$imageSize[0],$imageSize[1]); 

    // enregistre dans le fichier $destImageName l'image $destImage
    // au format compressé jpeg (qualité par défaut 75)
    imagejpeg($destImage,$destImageName); 

    // libère ressources allouées pour l'image source
    imagedestroy($sourceImage);

    // libère les ressources allouées pour l'image destination  
    imagedestroy($destImage);     
}

$nom=$_FILES['image']['name'];
//echo $nom;
//echo "<br>";
$adresse_temp=$_FILES['image']['tmp_name'];
//echo $adresse_temp;
//echo "<br>";
//echo $_POST["description"];
//echo "<br>";


if(is_uploaded_file($adresse_temp)){
    echo "<p>Succès d'envoi!</p>";
}else{
    echo "<p>Echèc d'envoi!</p>";
}

if(move_uploaded_file($adresse_temp,"./images/photos/".$nom)){
    echo "<p>Succès de téléchargement!</p>";
}else{
    echo "<p>Echèc de téléchargement!</p>";
}

redimensionneImageJpeg("./images/photos/".$nom,
"./images/photos/thumb_".$nom,700,700);


$myfile = fopen("./images/photos/description.txt", "a") or die("Unable to open file!");
$txt ="\n".$nom." : ".$_POST["description"];
fwrite($myfile, $txt);
fclose($myfile);
?>

<p><a href="photos.php">Go to photos</a></p>
