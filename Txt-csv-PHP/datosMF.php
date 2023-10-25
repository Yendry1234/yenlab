<?php
     $provincias = array("Agrupacion de Provincias","Puntarenas","Heredia","San José","Limón", "Guanacaste", "Cartago", "Alajuela");
     $sug = array("Provincia", "Mujeres (%)", "Hombres (%)");
     //Tengo que abrir el archivo:
     $M = 0; $F = 0;
     $archivo = fopen("CSV/datos.csv", "rb");
     $encabezado = explode(";", fgets($archivo));
     $contenido =[];
     $posi = 0;
     while($linea = fgets($archivo)){
        $buscador = $provincias[1];
        $contenido[0] = explode(";", $linea);
        if ($contenido[0][6] === $buscador) { 
            if ($contenido[0][2] === "M") {
                $M++; 
            } else {
                $F++;
            }
        }
     }
     $total = $M + $F;
     $prM = number_format(($M  / $total) * 100, 2);
     $prF = number_format(($F / $total) * 100, 2);
     $puntarenas = array($buscador, $prF, $prM);
     $M = 0; $F = 0;
     fclose($archivo);
     $archivo = fopen("CSV/datos.csv", "rb");
     $posi = 0;
     while($linea = fgets($archivo)){
        $buscador = $provincias[2];
        $contenido[0] = explode(";", $linea);
        if ($contenido[0][6] === $buscador) { 
            if ($contenido[0][2] === "M") {
                $M++; 
            } else {
                $F++;
            }
        }
     }
     $total = $M + $F;
     $prM = number_format(($M / $total) * 100, 2);
     $prF = number_format(($F / $total) * 100, 2);
     $heredia = array($buscador, $prF, $prM);
     $M = 0; $F = 0;


     fclose($archivo);
     $archivo = fopen("CSV/datos.csv", "rb");
     $posi = 0;
     while($linea = fgets($archivo)){
        $buscador = $provincias[3];
        $contenido[0] = explode(";", $linea);
        if ($contenido[0][6] === $buscador) { 
            if ($contenido[0][2] === "M") {
                $M++; 
            } else {
                $F++;
            }
        }
     }
     $total = $M + $F;
     $prM = number_format(($M / $total) * 100, 2);
     $prF = number_format(($F / $total) * 100, 2);
     $sanjose = array($buscador, $prF, $prM);
     $M = 0; $F = 0;


     fclose($archivo);
     $archivo = fopen("CSV/datos.csv", "rb");
     $posi = 0;
     while($linea = fgets($archivo)){
        $buscador = $provincias[4];
        $contenido[0] = explode(";", $linea);
        if ($contenido[0][6] === $buscador) { 
            if ($contenido[0][2] === "M") {
                $M++; 
            } else {
                $F++;
            }
        }
     }
     $total = $M + $F;
     $prM = number_format(($M / $total) * 100, 2);
     $prF = number_format(($F / $total) * 100, 2);
     $limon = array($buscador, $prF, $prM);
     $M = 0; $F = 0;

     fclose($archivo);

     $archivo = fopen("CSV/datos.csv", "rb");
     $posi = 0;
     while($linea = fgets($archivo)){
        $buscador = $provincias[5];
        $contenido[0] = explode(";", $linea);
        if ($contenido[0][6] === $buscador) { 
            if ($contenido[0][2] === "M") {
                $M++; 
            } else {
                $F++;
            }
        }
     }
     $total = $M + $F;
     $prM = number_format(($M / $total) * 100, 2);
     $prF = number_format(($F / $total) * 100, 2);
     $guanacaste = array($buscador, $prF, $prM);
     $M = 0; $F = 0;

     fclose($archivo);

     $archivo = fopen("CSV/datos.csv", "rb");
     $posi = 0;
     while($linea = fgets($archivo)){
        $buscador = $provincias[6];
        $contenido[0] = explode(";", $linea);
        if ($contenido[0][6] === $buscador) { 
            if ($contenido[0][2] === "M") {
                $M++; 
            } else {
                $F++;
            }
        }
     }
     $total = $M + $F;
     $prM = number_format(($M / $total) * 100, 2);
     $prF = number_format(($F / $total) * 100, 2);
     $cartago = array($buscador, $prF, $prM);
     $M = 0; $F = 0;

     fclose($archivo);

     $archivo = fopen("CSV/datos.csv", "rb");
     $posi = 0;
     while($linea = fgets($archivo)){
        $buscador = $provincias[7];
        $contenido[0] = explode(";", $linea);
        if ($contenido[0][6] === $buscador) { 
            if ($contenido[0][2] === "M") {
                $M++; 
            } else {
                $F++;
            }
        }
     }
     $total = $M + $F;
     $prM = number_format(($M / $total) * 100, 2);
     $prF = number_format(($F / $total) * 100, 2);
     $alajuela = array($buscador, $prF, $prM);
     $M = 0; $F = 0;

     fclose($archivo);
     echo json_encode(array($puntarenas, $heredia, $sanjose, $limon, $guanacaste, $cartago, $alajuela));
      
?>