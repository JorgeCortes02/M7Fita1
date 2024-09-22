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

    $arrayPosiciones = array();
    
    $barquitos = [ "portaavions" => [1, 4], "submari" => [3,2],"destructor" => [2, 3], "fragata" => [4, 1] ];
    //rellena las posciones del array con agua. Evitamos que pete.
    for($i = 0; $i<= 8; $i++){
        
        for($j = 0; $j<= 8; $j++){
            $arrayPosiciones[$i][$j] = "^^^";
        }
    }


    // Recorremos el array de barcos extrayendo la informacion de cada uno de los barcos.
    foreach($barquitos as $barco => $infoBarco){

        //Miramos la cantidad de barcos que hay de cada tipo.
        for($i=0; $i<$infoBarco[0]; $i++){
            //Decidimos aleatoriamente la alineación. 0 es horizontal y 1 vertical.
            $orientation = rand(0,1);

            //Si la orientacion es horizntal...
            if($orientation == 0){

                $libre = false;

                //Buscamos de forma aleatoria una posicion para coloar el barco.
                while($libre == false){
                    
                    //Buscamos una posicion aleatoria
                    $row = rand(0, count($arrayPosiciones)-1);
                    
                    $column = rand(0, count($arrayPosiciones[$row]) -1 - $infoBarco[1]);
                  
                    $libre = isFreePosH($row, $column, $arrayPosiciones, $infoBarco[1]);
                  
                    
                }

                if($libre == true){

                    for($j = 0; $j < $infoBarco[1]; $j++){
    
                        $arrayPosiciones[$row][$column+ $j] = substr($barco, 0 ,1) . "h";
                       
                    }
                }
    
            }else{

                $libre = false;

                //Buscamos de forma aleatoria una posicion para coloar el barco.
                while($libre == false){
                    
                    //Buscamos una posicion aleatoria
                    $row = rand(0, count($arrayPosiciones)-1- $infoBarco[1]);
                    
                    $column = rand(0, count($arrayPosiciones[$row]) -1 );
                 
                    $libre = isFreePosV($row, $column, $arrayPosiciones, $infoBarco[1]);
                 
                    
                }

                if($libre == true){

                    for($j = 0; $j < $infoBarco[1]; $j++){
    
                        $arrayPosiciones[$row + $j][$column] = substr($barco, 0 ,1) . "v";
                       
                    }
                }
    

            }
                
                
            
            

        }
    }


    

    for($i = 0; $i<= 9; $i++){
        echo "<tr>";
        for($j = 0; $j<= 9; $j++){

            if($i == 0 && $j == 0){
                echo "<td></td>";
            }elseif($i == 0 && $j != 0){

                 echo "<th>$j</th>";

            }elseif($i != 0 && $j == 0){

                echo "<th>" . chr($letra) . "</th>";

                $letra += 1;

            }else{

                echo "<td>". $arrayPosiciones[$i - 1][$j -1]  ."</td>";

            }

        }
        echo "</tr>";
    }



    function isFreePosH($row, $column, $arrayPosiciones, $tamañoBarco){

        if($column != 0 && $column != count($arrayPosiciones[0])-1 && $row != 0 && $row != count($arrayPosiciones) -1 ){
         
            for($i = -1 ; $i<= 1; $i++){

                for($j = -1; $j <=  $tamañoBarco; $j++){
                   
                    if($arrayPosiciones[$row + $i][$column + $j] != "^^^"){
                     
                        return false;
                        
                    }

                }

            }
         
          
        }elseif($row == 0 && $column == 0){

            for($i = 0 ; $i<= 1; $i++){

                for($j = 0; $j <=  $tamañoBarco; $j++){

                    if($arrayPosiciones[$row + $i][$column + $j] != "^^^"){

                        return false;
                    }

                }

            }
            
        }elseif($row == 0 && $column == count($arrayPosiciones[0])-1){

                for($i = 0 ; $i<= 1; $i++){

                    for($j = -1; $j <  $tamañoBarco; $j++){

                        if($arrayPosiciones[$row + $i][$column + $j] != "^^^"){

                            return false;
                        }

                    }

                }

        }elseif($row ==  count($arrayPosiciones)-1 && $column == 0){

            for($i = -1 ; $i < 1; $i++){

                for($j = 0; $j <=  $tamañoBarco; $j++){

                    if($arrayPosiciones[$row + $i][$column + $j] != "^^^"){
                        return false;
                    }

                }

            }

            $libre = true;
        }elseif($row == count($arrayPosiciones)-1 && $column == count($arrayPosiciones[0])-1){

            for($i = -1 ; $i< 1; $i++){

                for($j = -1; $j <  $tamañoBarco; $j++){

                    if($arrayPosiciones[$row + $i][$column + $j] != "^^^"){

                        return false;
                    }

                }

            }

            $libre = true;
        }elseif($row == 0 && $column != count($arrayPosiciones[0])-1){

            for($i = 0 ; $i<= 1; $i++){

                for($j = -1; $j <=  $tamañoBarco; $j++){

                    if($arrayPosiciones[$row + $i][$column + $j] != "^^^"){

                        return false;
                    }

                }

            }

            
        }elseif($row != 0 && $column == 0){

            for($i = -1 ; $i<= 1; $i++){

            for($j = 0; $j <=  $tamañoBarco; $j++){

                if($arrayPosiciones[$row + $i][$column + $j] != "^^^"){

                    return false;
                }

            }

        }

        
}       elseif($row == count($arrayPosiciones)-1 && $column != count($arrayPosiciones[0])-1){

            for($i = -1 ; $i< 1; $i++){

            for($j = -1; $j <=  $tamañoBarco; $j++){

                if($arrayPosiciones[$row + $i][$column + $j] != "^^^"){

                    return false;
                }

            }

            }

           
        }elseif($row != count($arrayPosiciones)-1 && $column == count($arrayPosiciones[0])-1){

            for($i = -1 ; $i<= 1; $i++){

            for($j = -1; $j <  $tamañoBarco; $j++){

                if($arrayPosiciones[$row + $i][$column + $j] != "^^^"){

                    return false;
                }
            
            }

            }
        }
    return true;
}

function isFreePosV($row, $column, $arrayPosiciones, $tamañoBarco){

    if($column != 0 && $column != count($arrayPosiciones[0])-1 && $row != 0 && $row != count($arrayPosiciones) -1 ){
        
        for($i = -1 ; $i<= $tamañoBarco; $i++){

            for($j = -1; $j <= 1  ; $j++){
               
                if($arrayPosiciones[$row + $i][$column + $j] != "^^^"){
                 
                    return false;
                    
                }

            }

        }
     
      
    }elseif($row == 0 && $column == 0){

        for($i = 0 ; $i<= $tamañoBarco; $i++){

            for($j = 0; $j <= 1; $j++){

                if($arrayPosiciones[$row + $i][$column + $j] != "^^^"){

                    return false;
                }

            }

        }
        
    }elseif($row == 0 && $column == count($arrayPosiciones[0])-1){

            for($i = 0 ; $i<= $tamañoBarco; $i++){

                for($j = -1; $j <  1; $j++){

                    if($arrayPosiciones[$row + $i][$column + $j] != "^^^"){

                        return false;
                    }

                }

            }

    }elseif($row ==  count($arrayPosiciones)-1 && $column == 0){

        for($i = -1 ; $i < $tamañoBarco; $i++){

            for($j = 0; $j <=  1; $j++){

                if($arrayPosiciones[$row + $i][$column + $j] != "^^^"){
                    return false;
                }

            }

        }

        $libre = true;
    }elseif($row == count($arrayPosiciones)-1 && $column == count($arrayPosiciones[0])-1){

        for($i = -1 ; $i< $tamañoBarco; $i++){

            for($j = -1; $j <  1; $j++){

                if($arrayPosiciones[$row + $i][$column + $j] != "^^^"){

                    return false;
                }

            }

        }

        $libre = true;
    }elseif($row == 0 && $column != count($arrayPosiciones[0])-1){

        for($i = 0 ; $i<= $tamañoBarco; $i++){

            for($j = -1; $j <=  1; $j++){

                if($arrayPosiciones[$row + $i][$column + $j] != "^^^"){

                    return false;
                }

            }

        }

        
    }elseif($row != 0 && $column == 0){

        for($i = -1 ; $i<= $tamañoBarco; $i++){

        for($j = 0; $j <=  1; $j++){

            if($arrayPosiciones[$row + $i][$column + $j] != "^^^"){

                return false;
            }

        }

    }

    
}       elseif($row == count($arrayPosiciones)-1 && $column != count($arrayPosiciones[0])-1){

        for($i = -1 ; $i< $tamañoBarco; $i++){

        for($j = -1; $j <=  1; $j++){

            if($arrayPosiciones[$row + $i][$column + $j] != "^^^"){

                return false;
            }

        }

        }

       
    }elseif($row != count($arrayPosiciones)-1 && $column == count($arrayPosiciones[0])-1){

        for($i = -1 ; $i<= $tamañoBarco; $i++){

        for($j = -1; $j <  1; $j++){

            if($arrayPosiciones[$row + $i][$column + $j] != "^^^"){

                return false;
            }
        
        }

        }
    }
return true;
}



?>
</table>
</body>
</html>