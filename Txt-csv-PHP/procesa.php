<?php

    $proceso = false;
    if(isset($_POST["oc_Control"])){

        //procesa los datos generales del archivo recibido.
		$archivo = $_FILES["txtArchi"]["tmp_name"];
		$tamanio = $_FILES["txtArchi"]["size"];
		$tipo    = $_FILES["txtArchi"]["type"];
        $nombre  = $_FILES["txtArchi"]["name"];

        //valida que
        if($tamanio > 0){
            //procesa el contenido del archivo recibido.
            $archi = fopen($archivo, "rb");
            if(isset($_POST["txt_Control_C"])){
                //se asigna el valor capturado a la variable $controlCharacter
                $controlCharacter = $_POST["txt_Control_C"];
            } else {
                echo "no se asignó ningún valor";
            }
            //se asigna el valor en la posición correspondiente
            $encabezados = explode($controlCharacter,fgets($archi));

            $contenido = array();
            $posi = 0;
            while($linea = fgets($archi)){
                $contenido[$posi++] = explode($controlCharacter,$linea);
            }

           

            //cierra el archivo.
            fclose($archi);

            //cambia el estado del proceso.
            $proceso = true;
        }
    }
    $proceso2 = false;
    if(isset($_POST["oc_Control"])){

        //procesa los datos generales del archivo recibido.
		$archivo2 = $_FILES["txtArchi2"]["tmp_name"];
		$tamanio2 = $_FILES["txtArchi2"]["size"];
		$tipo2    = $_FILES["txtArchi2"]["type"];
        $nombre2  = $_FILES["txtArchi2"]["name"];

        //valida que
        if($tamanio2 > 0){
            //procesa el contenido del archivo recibido.
            $archi2 = fopen($archivo2, "rb");
            if(isset($_POST["txt_Control_B"])){
                //se asigna el valor capturado a la variable $controlCharacter
                $controlCharacter2 = $_POST["txt_Control_B"];
            } else {
                echo "no se asignó ningún valor";
            }
            //se asigna el valor en la posición correspondiente
            $encabezados2 = explode($controlCharacter,fgets($archi2));

            $contenido2 = array();
            $posi2 = 0;
            while($linea2 = fgets($archi2)){
                $contenido2[$posi2++] = explode($controlCharacter,$linea);
            }

           

            //cierra el archivo.
            fclose($archi2);

            //cambia el estado del proceso.
            $proceso2 = true;
        }
    }
    //FIN DE LA MODIFICACION
    function procesaDatos2() {

        //procesa los datos generales del archivo recibido.
        $archivo2 = $_FILES["txtArchi"]["tmp_name"];
        $tamanio2 = $_FILES["txtArchi"]["size"];
        $tipo2    = $_FILES["txtArchi"]["type"];
        $nombre2  = $_FILES["txtArchi"]["name"];
    
        //valida que
        if($tamanio2 > 0) {
    
            //procesa el contenido del archivo recibido.
            $archi2 = fopen($archivo2, "rb");
            $encabezados2 = explode(';',fgets($archi2));
    
            //procesa los datos del archivo recibido.
            $contenido2 = array();
            $posi2 = 0;
            while($linea2 = fgets($archi)) {
                $contenido2[$posi2++] = explode(';',$linea);
            }
    
            //cierra el archivo.
            fclose($archi);
    
            //cambia el estado del proceso.
            $proceso2 = true;
    
            //verifica si el archivo tiene encabezado.
            if(isset($_POST["txtEncabezado"]) && $_POST["txtEncabezado"] == "on") {
                //mantiene el comportamiento de la primera línea tal y como lo hace.
            } else {
                //crea sus propios encabezados para cada campo, cuando el archivo no posee los mismos.
                $encabezados = array_keys($contenido[0]);
            }
    
            // Imprime los encabezados en pantalla.
            echo "<h1>Encabezados</h1>";
            foreach($encabezados as $encabezado) {
                echo "<p>".$encabezado."</p>";
            }
        }
    }//FIN DE LA MODIFICACION


    
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		include_once("segmentos/encabe.inc");
	?>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
    <title>Proceso de datos</title>
</head>
<body class="container">
	<header class="row">
		<?php
			include_once("segmentos/menu.inc");
		?>
	</header>

	<main class="row">
		<div class="linea_sep">
            <h3>Procesando archivo.</h3>
            <br>
            <?php
                if(!$proceso){
                    //En caso que el archivo .csv no pudiese ser procesado
                    echo '<div class="alert alert-danger" role="alert">';
                    echo '  El archivo no puede ser procesado, verifique sus datos.....!';
                    echo '</div>';
                }else{
                    //En caso que el archivo .csv pudiese ser procesado
                    echo "<h4>Datos Generales.</h4>";

                    echo "<table class='table table-bordered table-hover'>";
                    echo "  <tr>";
                    echo "      <td>Archivo</td><td>Tipo</td><td>Peso</td><td>Observaciones</td>";
                    echo "  </tr>";
                    echo "      <td>" . $nombre."</td><td>".$tipo."</td><td>".number_format((($tamanio)/1024)/1024,2,'.',',')."</td><td>".$posi."</td>";
                    echo "  <tr>";
                    echo "  </tr>";
                    echo "  <tr>";
                    echo "      <td>" . $nombre2."</td><td>".$tipo2."</td><td>".number_format((($tamanio2)/1024)/1024,2,'.',',')."</td><td>".$posi2."</td>";
                    echo "  </tr>";
                    echo "</table>";

                    echo "<br>";
                    echo "<h4>Estructura.</h4>";
                    echo "<table class='table table-bordered table-hover'>";
                    echo "<tr>";
                    echo "<th>Campo</th>";
                    echo "<th>Tipo</th>";
                    echo "<th>Uso</th>";
                    echo "<th>Valor</th>";
                    echo "</tr>";
                    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
                    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
                
                if ($proceso) {
                                    echo "<h4>" . $_FILES["txtArchi1"]["name"] . "</h4>";
                
                                    $resumen = array(
                                        'M' => array(),
                                        'F' => array()
                                    );
                
                                    $provincias = array('San José', 'Cartago', 'Alajuela', 'Heredia', 'Puntarenas', 'Guanacaste', "Limón");
                                    foreach ($provincias as $provincia) {
                                        $resumen['M'][$provincia] = 0;
                                        $resumen['F'][$provincia] = 0;
                                    }
                
                                    foreach ($contenido1 as $campos) {
                                        $genero = $campos[1];
                                        $provincia = $campos[6];
                
                                        if ($genero === 'M' || $genero === 'F') {
                                            $resumen[$genero][$provincia]++;
                                        }
                                    }
                
                                    echo "<table class='table table-bordered table-hover'>";
                                    echo "<thead><tr><th>Género</th>";
                                    foreach ($provincias as $provincia) {
                                        echo "<th>$provincia</th>";
                                    }
                                    echo "<th>Total</th></tr></thead><tbody>";
                
                                    $totalM = 0;
                                    $totalF = 0;
                
                                    foreach (['M', 'F'] as $genero) {
                                        echo "<tr><td>$genero</td>";
                                        $totalGenero = 0;
                                        foreach ($provincias as $provincia) {
                                            echo "<td>{$resumen[$genero][$provincia]}</td>";
                                            $totalGenero += $resumen[$genero][$provincia];
                                        }
                                        echo "<td>$totalGenero</td>";
                
                                        if ($genero === 'M') {
                                            $totalM = $totalGenero;
                                        } else {
                                            $totalF = $totalGenero;
                                        }
                                    }
                
                                    echo "<tr><td>Observaciones</td>";
                                    foreach ($provincias as $provincia) {
                                        echo "<td></td>";
                                    }
                                    echo "<td>" . ($totalM + $totalF) . "</td>";
                
                                    echo "</tbody></table>";
                                }
                
            
                if ($proceso) {
                                    echo "<h4>" . $_FILES["txtArchi2"]["name"] . "</h4>";
                
                                    $resumen2 = array(
                                        'M' => array(),
                                        'F' => array()
                                    );
                
                                    $provincias = array('San José', 'Cartago', 'Alajuela', 'Heredia', 'Puntarenas', 'Guanacaste', "Limón");
                                    foreach ($provincias as $provincia) {
                                        $resumen2['M'][$provincia] = 0;
                                        $resumen2['F'][$provincia] = 0;
                                    }
                
                                    foreach ($contenido2 as $campos) {
                                        $genero = $campos[1];
                                        $provincia = $campos[6];
                
                                        if ($genero === 'M' || $genero === 'F') {
                                            $resumen2[$genero][$provincia]++;
                                        }
                                    }
                
                                    echo "<table class='table table-bordered table-hover'>";
                                    echo "<thead><tr><th>Género</th>";
                                    foreach ($provincias as $provincia) {
                                        echo "<th>$provincia</th>";
                                    }
                                    echo "<th>Total</th></tr></thead><tbody>";
                
                                    $totalM2 = 0;
                                    $totalF2 = 0;
                
                                    foreach (['M', 'F'] as $genero) {
                                        echo "<tr><td>$genero</td>";
                                        $totalGenero2 = 0;
                                        foreach ($provincias as $provincia) {
                                            echo "<td>{$resumen2[$genero][$provincia]}</td>";
                                            $totalGenero2 += $resumen2[$genero][$provincia];
                                        }
                                        echo "<td>$totalGenero2</td>";
                
                                        if ($genero === 'M') {
                                            $totalM2 = $totalGenero2;
                                        } else {
                                            $totalF2 = $totalGenero2;
                                        }
                                    }
                
                                    echo "<tr><td>Observaciones</td>";
                                    foreach ($provincias as $provincia) {
                                        echo "<td></td>";
                                    }
                                    echo "<td>" . ($totalM2 + $totalF2) . "</td>";
                
                                    echo "</tbody></table>";
                                }
                   
                
                  //Altero mi funcion de determinar el tipo de dato. 
                  //Igualmente de agarro de valor para revisar el campo
                        function determinarTipoDato($valor) {
                        if (is_numeric($valor)) {
                            //aca filtro para validar si es entero
                            if (filter_var($valor, FILTER_VALIDATE_INT) !== false) {
                                $tipo = "int";
                                //filtro de nuevo para ver si entre 1 a 1500 para ver si es cuantitivo
                                $uso = ($valor >= 1 && $valor <= 1500) ? "Cuantitativo" : "Cualitativo";
                                //y de nuevo para ver si el valor cuantitivo esta entre 1 a 1500
                                //es casi lo mismo pero solo asi pude hacerlo jeje
                                $valorEntero = ($valor >= 1 && $valor <= 1500) ? "0 a 1500" : "Variado";
                                //lo siguiente es casi que lo mismo dela funcion original
                            } elseif (filter_var($valor, FILTER_VALIDATE_FLOAT) !== false) {
                                $tipo = "float";
                                $uso = "Cuantitativo (flotante)";
                                $valorEntero = "Variado";
                            } else {
                                $tipo = "string";
                                $uso = "Cualitativo (no es entero ni flotante)";
                                $valorEntero = "Variado";
                            }
                        } elseif (DateTime::createFromFormat('d/m/Y', $valor) !== false) {
                            $tipo = "date";
                            $uso = "Cualitativo (fecha)";
                            $valorEntero = "Variado";
                        } elseif (strlen($valor) === 1) {
                            $tipo = "char";
                            $uso = "Cualitativo (char)";
                            $valorEntero = "Variado";
                        } else {
                            $tipo = "string";
                            $uso = "Cualitativo";
                            $valorEntero = "Variado";
                        }
                    
                        return array($tipo, $uso, $valorEntero);
                    }
                    
                    
                    foreach ($contenido[0] as $datos) {
                        list($tipo, $uso ,$valorEntero) = determinarTipoDato($datos);
                        echo "<tr>";
                        echo "<td>" . $datos . "</td>";
                        echo "<td>" . $tipo . "</td>";
                        echo "<td>" . $uso . "</td>";
                        echo "<td>" . $valorEntero . "</td>";
                        echo "</tr>";
                    }
                    
                    echo "</table>";

                    echo "<br>";
                    echo "<h4>Datos.</h4>";
                    echo "<table id='tblDatos' class='table table-bordered table-hover'>";
                    echo "<thead><tr>";

                    foreach($encabezados as $titulo){
                        echo "<td>".$titulo."</td>";
                    }

                    echo "</tr></thead><tbody>";

                    for ($i=0; $i < 100 ; $i++) {
                        echo "<tr>";
                        foreach($contenido[$i] as $datos){
                            echo "<td>".$datos."</td>";
                        }
                        echo "</tr>";
                    }

                    echo "<tbody></table>";

                }//fin del else (solo si el archivo fue procesado)

                
                //aca inicia el proceso para hacer las tablas aboslutas 
                //y porcentuales. 
                //Pirmeramente tengo ek array columnaOG que va a contener lo 
                //que tiene contenido pero la columna 8, o sea la de 
                //orientacion de genero
                $columnaOrientacionGenero = array_column($contenido, 8);

// esta variable es el array de las palbaras que contiene la columna
$conteoPalabras = array();


//aca recorro la columna y conteo palabras aumenta en 1, segun la palabra que contenga
//la variable plabra
foreach ($columnaOrientacionGenero as $palabra) {
    if (isset($conteoPalabras[$palabra])) {
        $conteoPalabras[$palabra]++;
    } else {
        $conteoPalabras[$palabra] = 1;
    }//en caso de ser palabra nueva pues la agrega y le suma 1 a esa nueva palabra
}

// aca calculo el total de filas que que hay en mi columna 8 por asi decirlo
$totalFilas = count($columnaOrientacionGenero);

// aca creo la tabla con los valores absolutos
echo "<h4>Tabla de Valores Absolutos</h4>";
echo "<table class='table table-bordered table-hover'>";
echo "<tr><th>Orientación de Género</th><th>Valores Absolutos</th></tr>";
foreach ($conteoPalabras as $palabra => $conteo) {
    echo "<tr><td>$palabra</td><td>$conteo</td></tr>";
}
echo "</table>";

// aca creo la tabla con los valores porcentuales por eso tengo la formula matematica
//para sacar el porcetaje
echo "<h4>Tabla de Valores Porcentuales</h4>";
echo "<table class='table table-bordered table-hover' >";
echo "<tr><th>Orientación de Género</th><th>Valores Porcentuales</th></tr>";
foreach ($conteoPalabras as $palabra => $conteo) {
    $porcentaje = ($conteo / $totalFilas) * 100;
    echo "<tr><td>$palabra</td><td>$porcentaje%</td></tr>";
}
echo "</table>";

                
            
    
            ?>
     
		</div>
        <div class="linea_sep">
            <h3>Procesando archivo.</h3>
            <br>
            <?php
                if(!$proceso2){
                    //En caso que el archivo .csv no pudiese ser procesado
                    echo '<div class="alert alert-danger" role="alert">';
                    echo '  El archivo no puede ser procesado, verifique sus datos.....!';
                    echo '</div>';
                }else{
                    //En caso que el archivo .csv pudiese ser procesado
                    echo "<h4>Datos Generales.</h4>";

                    echo "<table class='table table-bordered table-hover'>";
                    echo "  <tr>";
                    echo "      <td>Nombre</td><td>".$nombre2."</td>";
                    echo "  </tr>";
                    echo "      <td>Tipo</td><td>".$tipo2."</td>";
                    echo "  <tr>";
                    echo "  </tr>";
                    echo "  <tr>";
                    echo "      <td>Tamaño</td><td>".number_format((($tamanio2)/1024)/1024,2,'.',',')." MBs</td>";
                    echo "  </tr>";
                    echo "</table>";

                    echo "<br>";
                    echo "<h4>Estructura.</h4>";
                    echo "<table class='table table-bordered table-hover'>";
                    echo "  <tr>";

               

                   //inicia la funcion
                    function determinarTipoDato2($valor) {//valor guarda el contenido del elemento en cada ciclo de verificacion
                        if (is_numeric($valor)) {
                            // Si es numérico, verifica si es entero o punto flotante
                            //filter_validate_int es de php y se usa para valorar si el valor es entero
                            if (filter_var($valor, FILTER_VALIDATE_INT) !== false) {
                                return "int";
                                //li mismo sucede con filter_validate_float
                            } elseif (filter_var($valor, FILTER_VALIDATE_FLOAT) !== false) {
                                return "float";
                            } else {
                                // Si el valor no es entero pero tampoco flotante es string
                                return "string";
                            }
                        } elseif (DateTime::createFromFormat('d/m/Y', $valor) !== false) {
                            // En esta parte el DateTime::createformat nos permite setear
                            //lo que se debe de considerar un formato de fecha
                            return "date";
                        } elseif (strlen($valor) === 1) {
                            // sterlen mide la longitud del contenido de valor, si es = 1 es que char
                            return "char";
                        } else {
                            // Y si mide mas de 1 pues se considera una string normal
                            return "string";
                        }
                    }
                    
                    //Y esto pues es lo que estamos recorriendo y lo que la funcion esta analizando
                    foreach ($contenido[0] as $datos) {
                        $tipo = determinarTipoDato($datos);
                        
                        echo "<tr>";
                        echo "<td>" . $datos . "</td>"; // Muestra el valor
                        echo "<td>" . $tipo2 . "</td>"; // Muestra el tipo de dato
                        echo "</tr>";
                    }
                    
                    

                    echo "  </tr>";
                    echo "</table>";

                    echo "<br>";
                    echo "<h4>Datos.</h4>";
                    echo "<table id='tblDatos2' class='table table-bordered table-hover'>";
                    echo "<thead><tr>";

                    foreach($encabezados as $titulo){
                        echo "<td>".$titulo."</td>";
                    }

                    echo "</tr></thead><tbody>";

                    for ($i=0; $i < 100 ; $i++) {
                        echo "<tr>";
                        foreach($contenido[$i] as $datos){
                            echo "<td>".$datos."</td>";
                        }
                        echo "</tr>";
                    }

                    echo "<tbody></table>";

                }//fin del else (solo si el archivo fue procesado)
            ?>
     
		</div>
	</main>

  

	<footer class="row pie">
		<?php
			include_once("segmentos/pie.inc");
		?>
	</footer>

	<!-- jQuery necesario para los efectos de bootstrap -->
    <script src="formatos/bootstrap/js/jquery-1.11.3.min.js"></script>
    <script src="formatos/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#tblDatos').dataTable({
                "language":{
                    "url": "dataTables.Spanish.lang"
                }
            });
        });
        $(document).ready(function(){
            $('#tblDatos2').dataTable({
                "language":{
                    "url": "dataTables.Spanish.lang"
                }
            });
        });
    </script>
</body>
</html>