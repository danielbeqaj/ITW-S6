<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Page B</title>
    <style>
        <?php
        if (isset($_SESSION["couleurdefond"])) {
            echo "body{background-color:" . $_SESSION["couleurdefond"] . ";}";
        }
        if (isset($_SESSION["couleurdetexte"])) {
            echo "body{color:" . $_SESSION["couleurdetexte"] . ";}";
        }
        ?>
        body p{
            margin: 0;
        }
    </style>
</head>

<body>
    <p>Contenu de la page B...</p>
    <p><a href="pageA.php">Lien vers la page A</a></p>
</body>

</html>