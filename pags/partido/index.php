	<?php
session_start();
include '../autenticacion.php';
autenticar();
?>
<!DOCTYPE html>
<html lang="en-gb" dir="ltr">
<head>
	<title>CAMPEONATO UNIANDES</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="datos/css/uikit.min.css" />
	<script src="datos/js/jquery.js"></script>
	<script src="datos/js/uikit.min.js"></script>
	<script src="datos/js/uikit-icons.min.js"></script>
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>

	<script type="text/javascript">

	</script>

	<link rel="stylesheet" href="datos/css/jquery-ui.css">
  <script src="funcion/js.js"></script>
  <script src="datos/js/jquery-1.12.4.js"></script>
  <script src="datos/js/jquery-ui.js"></script>
</head>
<body>
	<input type="hidden" id="id" name="id" value="<?php echo $_SESSION['usu']; ?>">
	<input type="hidden" id="idRol" name="idRol" value="<?php echo $_SESSION['idrol']; ?>">
	<div class="uk-grid-match uk-child-width-expand@s uk-text-center" uk-grid>
	    <div>
	        <div class="uk-margin uk-padding uk-padding-remove-left">
							<input type="text" id="equipo_a" name="equipo_a" value="Campeonato">
	            <div id="datosA"></div>
	        </div>
	     </div>
	    <div>
		    <div class="uk-margin uk-padding uk-padding-remove-left">
	            <h3>FICHA DE CONTROL</h3>
	            <div class="uk-flex uk-flex-center">
				    <div class="uk-card uk-card-default uk-card-small uk-card-body" id="goles_a">0</div>
				    <div class="uk-card uk-card-default uk-card-small uk-card-body uk-margin-left">/</div>
				    <div class="uk-card uk-card-default uk-card-small uk-card-body uk-margin-left" id="goles_b">0</div>
				</div>
	        </div>
	        <!--<div id="resultadosEquipos"></div>-->
					<input type="hidden" id="datosCambiarA" name="datosA">
					<input type="hidden" id="datosCambiarB" name="datosB">
	        <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
	        <div id="prediccion" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
	    </div>
	    <div>
	        <div class="uk-margin uk-padding uk-padding-remove-left">
							<input type="text" id="equipo_b" name="equipo_b" value="Campeonato">
	            <div id="datosB"></div>
	        </div>
	    </div>
	</div>

</body>
</html>
