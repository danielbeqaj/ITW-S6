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

        function get_server_name($email_address) {
            $parts = explode('@', $email_address);
            $domain_name = $parts[1];
            $ip_address = gethostbyname($domain_name);
            $server_name = gethostbyaddr($ip_address);
            return $server_name;
        }

        $tab=["beqajd@yahoo.com",get_server_name("beqajd@yahoo.com"),
        "brignoli.xavier@hotmail.fr",get_server_name("brignoli.xavier@hotmail.fr"),
        "beqajd2000@gmail.com",get_server_name("beqajd2000@gmail.com")];

        echo "<table>";
        foreach($tab as $key => $value ){
            if($key%2==0){
                echo "<tr>";
                echo "<td> $value </td>";
            }else{
                echo "<td> $value </td>";
                echo "</tr>"; 
            }
        }
        echo "</table>";

        echo "<p>";
        print_r(array_count_values($tab));
        echo "</p";

        ?>
    <body>

</html>