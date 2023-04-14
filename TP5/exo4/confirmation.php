<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Adresse client</title>
        <style>
            table,td{
                border: 1px solid black;
            }
            #confirmation{
                font-weight: bold;
                padding-left: 35px;
                width: 140px;
                height: 35px;
                text-align: center;
            }
            #missingvalues{
                font-weight: bold;
                padding-left: 35px;
            }
        </style>
    </head>


    <?php
    $tab=array(
        "nom" => $_POST['nom'],
        "prenom" => $_POST['prenom'],
        "adresse" => $_POST['adresse'],
        "ville" => $_POST['ville'],
        "codepostal" => $_POST['codepostal'],
    );
    function count_null($array){
        $res=0;
        foreach($array as $key => $value){
            if(!$value){
                $res=$res+1;
            }
        }
        return $res;
    }

    if(count_null($tab)>0){
        echo "<div id='missingvalues'>";
        echo "<p><div>Some values are missing!</div>";
        echo "<div>Please enter: ";
        $i=1;
        foreach($tab as $key => $value){
            if(!$value){
                echo "<span>".$key."</span>";
                if($i<count_null($tab)){
                    echo "<span>,</span>";
                }
                if($i==count_null($tab)){
                    echo "<span>.</span>";
                }
                $i++;
            }
        }
        echo "</div>";
        echo "</p>";
        echo "</div>";
    }else{
        echo "<div"." id='confirmation'".">Confirmation de vos coordonnés</div>";
        echo "<div>";
        echo "<table>";
            echo "<tr>";
                echo "<td>nom</td>";
                echo "<td>".$tab["nom"]."</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td>prenom</td>";
                echo "<td>".$tab["prenom"]."</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td>adresse</td>";
                echo "<td>".$tab["adresse"]."</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td>ville</td>";
                echo "<td>".$tab["ville"]."</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td>code</td>";
                echo "<td>".$tab["codepostal"]."</td>";
            echo "</tr>";
        echo "</table>";
        echo "</div>";
    }

    ?>

</html>