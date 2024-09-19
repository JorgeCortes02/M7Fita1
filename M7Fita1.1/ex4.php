<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barcos</title>
</head>
<body>
    
<table border="1" style="border-collapse: collapse;">
<?php
    $letra = 65;


    for($i = 0; $i<= 7; $i++){
        echo "<tr>";
        for($j = 0; $j<= 7; $j++){

            if($i == 0 && $j == 0){
                echo "<td style = 'width: 30px;'></td>";
            }elseif($i == 0 && $j != 0){

                 echo "<th style = 'width: 30px;'>$j</th>";

            }elseif($i != 0 && $j == 0){

                echo "<th style = 'width: 30px;'>" . chr($letra) . "</th>";

                $letra += 1;

            }else{

                echo "<td style = 'width: 30px;'></td>";

            }

        }
        echo "</tr>";
    }




?>
</table>
</body>
</html>