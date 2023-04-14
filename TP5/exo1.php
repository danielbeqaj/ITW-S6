<!DOCTYPE html>
<html>
    
    <head>
        <style>
            table,td{
                border: 1px solid black;
                border-collapse: collapse;
            }
        </style>
    </head>
    
    <body>
        <?php
        echo "<table>";
        for($i=1;$i<=5;$i++){
            echo "<tr>";
            for($j=1;$j<=5;$j++){
                echo "<td>$i*$j=".$i*$j."</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
        ?>
    <body>

</html>