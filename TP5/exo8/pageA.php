<?php
session_start();
if (isset($_POST["couleurdefond"])) {
    $_SESSION["couleurdefond"]=$_POST["couleurdefond"];
}
if (isset($_POST["couleurdetexte"])) {
    $_SESSION["couleurdetexte"]=$_POST["couleurdetexte"];
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
    <title>Page A</title>
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

        body p{
            margin: 0;
        }

        form{
            margin-bottom: 20px;
        }

        <?php
        if (isset($_SESSION["couleurdefond"])) {
            echo "body,span span{background-color:" . $_SESSION["couleurdefond"] . ";}";
        }
        if (isset($_SESSION["couleurdetexte"])) {
            echo "body{color:" . $_SESSION["couleurdetexte"] . ";}";
        }
        ?>
    </style>
</head>

<body>
    <form method="post" action="pageA.php">
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
        Contenu de la page A...
    </p>
    <p>
        <a href="pageB.php">Lien vers la page B</a>
    </p>
</body>

</html>
