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
	<link rel="stylesheet" href="../../css/uikit.min.css" />
	<script src="../../js/jquery.js"></script>
	<script src="../../js/uikit.min.js"></script>
	<script src="../../js/uikit-icons.min.js"></script>
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>

	<script type="text/javascript">

	</script>
	
	<link rel="stylesheet" href="../../css/jquery-ui.css">
  <script src="funcion/js.js"></script>
  <script src="../../js/jquery-1.12.4.js"></script>
  <script src="../../js/jquery-ui.js"></script>
</head>
<body>
	<input type="hidden" id="id" name="id" value="<?php echo $_SESSION['usu']; ?>">  
	<input type="hidden" id="idRol" name="idRol" value="<?php echo $_SESSION['idrol']; ?>">
	<div class="uk-grid-match uk-child-width-expand@s uk-text-center" uk-grid>
	    <div>
	        <div class="uk-margin uk-padding uk-padding-remove-left">
	            <h3  id="equipo_a">Campeonato</h3>
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
	        <!--<div id="datosEquipoA"></div>-->
	        <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
	        <div id="prediccion" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
	    </div>
	    <div>
	        <div class="uk-margin uk-padding uk-padding-remove-left">
	            <h3  id="equipo_b"></h3>
	            <div id="datosB"></div>
	        </div>
	    </div>
	</div>
	
</body>
</html>