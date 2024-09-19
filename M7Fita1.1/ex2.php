<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ex1</title>
</head>
<body>
    <table style="border: 1px solid black; border-collapse: collapse;">
        
            <?php
                $letra = 65;
                echo "<tr>";
                for($j = 0; $j <= 7; $j++){

                    echo "<td style='border: 1px solid black; border-collapse: collapse;'>" . chr($letra+ $j) . "</td>";

                }
                echo "</tr>";
                echo "<tr>";

                for($i = 0; $i <= 7; $i++){

                    echo "<td style='border: 1px solid black; border-collapse: collapse;'> $i </td>";

                }
                echo "</tr>";
               
            ?>

        

    </table>
    
</body>
</html>