<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		include_once("segmentos/encabe.inc");
	?>
</head>
<body class="container">
	<header class="row">
		<?php
			include_once("segmentos/menu.inc");
		?>
	</header>

	<main class="row">
		<div class="linea_sep">
			<br>
			<h4>Lectura de archivo</h4>
			<!-- Invoca ventana modal para la lectura de un archivo -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cargArchi">
				Leer archivo
			</button>



			<!-- Modal -->
			<div class="modal fade" id="cargArchi" tabindex="-1" role="dialog" aria-labelledby="etiTitulo" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="etiTitulo">Lectura de archivo...</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" enctype="multipart/form-data" action="procesa.php">
							<div class="modal-body">
								<fieldset>
                        			<div>
                            			<label>Archivo:</label>
                                		<input type="file" name="txtArchi" />
										<label>Archivo 2:</label>
                                		<input type="file" name="txtArchi2" />
                            		</div>
									<br>
									<div>
                                        
                                    </div>
									<div>
                                        <!-- se crea un label y el input relacional para que el usuario agregue el caracter de control a usar -->
                                        <label>Carácter de Control que desea utilizar para separar los datos:</label>
                                        <input type="text" name="txt_Control_C" placeholder="Ejemplo: ;"/>
                                    </div>
                                </fieldset>
							</div>
							<div class="modal-footer">
								<input name="oc_Control" type="hidden" value="Control">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
								<button type="submit" class="btn btn-primary">Aceptar</button>
								<input type="checkbox" name="txtEncabezado" value="on">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<form action="index.php" method="post" enctype="multipart/form-data">

    <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
	<!-- 
    <div class="form-group">
        <label for="txtArchi">Archivo a procesar:</label>
        <input type="file" name="txtArchi" class="form-control">
    </div> -->
	<!--MODIFICACION PARA LA PARTE2--><!-- 
    <div class="form-group">
        ¿El archivo tiene encabezado?
    </div>

    <input type="submit" name="oc_Control" value="Procesar" class="btn btn-primary">
	<input type="checkbox" name="txtEncabezado" value="on">//FIN DE LA MODIFICACION
	
</form>-->

	</main>

	<footer class="row pie">
		<?php
			include_once("segmentos/pie.inc");
		?>
	</footer>

	<!-- jQuery necesario para los efectos de bootstrap -->
    <script src="formatos/bootstrap/js/jquery-1.11.3.min.js"></script>
    <script src="formatos/bootstrap/js/bootstrap.js"></script>
</body>
</html>
