<?php
if (isset($_POST["couleurdefond"])) {
    setcookie("couleurdefond", $_POST["couleurdefond"], time() + 3600 * 2);
}
if (isset($_POST["couleurdetexte"])) {
    setcookie("couleurdetexte", $_POST["couleurdetexte"], time() + 3600 * 2);
}
/*
if(isset($_COOKIE["couleurdefond"])){
    echo "Couleur de fond is set.";
}else{
    echo "Couleur de fond is not set.";
}
if(!empty($_COOKIE["couleurdefond"])){
    echo "Not Empty.";
}
*/
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Couleurs</title>
    <style>
        table {
            border: 1px solid black;
            padding: 10px;
        }

        .firstspan {
            position: relative;
            top: 8px;
            padding: 0 13px;
        }

        span span {
            background-color: white;
            font-weight: bold;
        }

        input[type="submit"] {
            border-radius: 10px;
            border-width: 1px;
        }

        <?php
        if (isset($_COOKIE["couleurdefond"])) {
            echo "body,span span{background-color:" . $_COOKIE["couleurdefond"] . ";}";
        }
        if (isset($_COOKIE["couleurdetexte"])) {
            echo "body{color:" . $_COOKIE["couleurdetexte"] . ";}";
        }
        ?>
    </style>
</head>

<body>
    <form method="post" action="couleurs.php">
        <span class="firstspan"><span>Choisisez vos couleurs</span></span>
        <table>
            <tr>
                <td>Couleurs de fond:</td>
                <td><input type="text" name="couleurdefond"></td>
            </tr>
            <tr>
                <td>Couleurs de texte:</td>
                <td><input type="text" name="couleurdetexte"></td>
            </tr>
            <tr>
                <td><input type="submit" name="btnEnvoi" value="Envoyer"></td>
            </tr>
        </table>
    </form>
    <p>
        Contenu de la page...
    </p>
</body>

</html>
