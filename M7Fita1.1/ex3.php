<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>PHP Intro</h1>
    <table  border="1" style="border-collapse: collapse;" >
      
      <?php
      
        $m = 3;

        $n= 5;
        
        if($m == 0 || $m == null){

          echo "<tr>";

          for ($i = 0; $i <= $n; $i++){

            echo "<td>$i</td> ";

          }

          echo "</tr>";
        }else{

          $initNum = 0;

          for ($i = 0; $i <= $m; $i++){

            echo "<tr>";

            for ($j = 0 ; $j <= $n; $j++){

              if($i == 0){
                echo "<td>" . ($j) ."</td> ";
              }else{echo "<td>" . ($j + $i) ."</td> ";}
                

            }

            echo "</tr>";
            
            
          }



        }
        

      ?>
  </table>

</body>
</html>


