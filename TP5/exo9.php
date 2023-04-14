<?php


$servername = "localhost";
$username = "root";
// Create connection
$conn = new mysqli($servername, $username, $password,'itw');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
//

echo "<table>";
echo "<thead>";
echo "<tr>";
echo "<td>id_modele</td>";
echo "<td>modele</td>";
echo "<td>carburant</td>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

$result = mysqli_query($conn,"select * from modeles");

/*
if (!$result) {
  echo "DB Error, could not list tables\n";
  echo 'MySQL Error: ' . mysqli_error($conn);
  exit;
}
*/

while ($row = mysqli_fetch_row($result)) {
  echo "<tr>";
  echo "<td>".$row[0]."</td>";
  echo "<td>".$row[1]."</td>";
  echo "<td>".$row[2]."</td>";
  echo "</tr>";
}

mysqli_free_result($result);

echo "</tbody>";
echo "</table>";


//echo "Hello World!";
//phpinfo();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Table modele</title>
    <style>
      
      table{
        border: 0px solid black;
        background-color: #f5f5f5;
      }
      thead td{
        text-align: center;
        color: blue;
        font-weight: bold;
        background-color: #d3dce3;
      }
      tbody td{
        padding-left: 10px;
      }
      tr:nth-child(2n){
        background-color: #d5d5d5;
      }
      tr:nth-child(2n+1){
        background-color: #e5e5e5;
      }
    </style>
  </head>
</html>




