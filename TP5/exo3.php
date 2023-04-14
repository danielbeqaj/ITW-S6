<!DOCTYPE html>
<html>
    
    <head>
        <style>
            table,td,th{
                border: 1px solid black;
                border-collapse: collapse;
            }
        </style>
    </head>
    
    <body>

        <?php

        $tab = [
            "Hello","hello","HELLO","He1l0","hElLo","blablA","blabla"
        ];

        echo "<table>";
        echo "<thead>
               <tr>
               <th>Key</th>
               <th>Value</th>
               <th>Result</th>
               </tr>
              </thead>";
        foreach($tab as $key => $value){
            echo "<tr>";
            echo "<td>".$key."</td>";
            echo "<td>".$value."</td>";
            echo "<td>".ucfirst(strtolower($value))."</td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>
        
    <body>

</html>