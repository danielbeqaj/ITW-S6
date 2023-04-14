<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Agence</title>
        <style>
            table{
                border: 1px solid black;
                padding: 10px;
                padding-right: 50%;
            }
            input[type="submit"]{
                border-radius: 10px ;
                border-width: 1px;
            }
            .firstspan {position: relative; top: 8px; padding: 0 13px;}
            span span {background-color: white;font-weight:bold;}
        </style>
    </head>

    <body>
        <form method="post" action="redirection.php">
        <span class="firstspan"><span>Faites votre choix</span></span>
        <table>
            <tr>
                <td>
                <input type="submit" name="btnVendre" value="Vendre">
                </td>
            </tr>
            <tr>
                <td>
                <input type="submit" name="btnAcheter" value="Acheter">
                </td>
            </tr>
            <tr>
                <td>
                <input type="submit" name="btnLouer" value="Louer">
                </td>
            </tr>
        </table>
        </form>
    </body>

</html>