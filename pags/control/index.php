<?php
session_start();
include '../autenticacion.php';
autenticar();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Campeonato Uniandes</title>

		<meta name="description" content="Aplicación web realizada para la Universidad Reginal Autónoma de los Andes Uniandes ext Ibarra" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<link rel="stylesheet" href="../../assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="../../assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="../../assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="../../assets/css/jquery.gritter.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="../../assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="../../assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="../assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="../../assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="../../assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="../../assets/css/bootstrap-datepicker3.min.css" />
		<link rel="stylesheet" href="../../assets/css/bootstrap-timepicker.min.css" />
		<link rel="stylesheet" href="../../assets/css/daterangepicker.min.css" />
		<link rel="stylesheet" href="../../assets/css/bootstrap-datetimepicker.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="../assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- ace settings handler -->
		<script src="funcion/highcharts.js"></script>
		<script src="funcion/exporting.js"></script>

		<script src="../../assets/js/jquery-2.1.4.min.js"></script>
		<script src="../../assets/js/ace-extra.min.js"></script>
		<script src="funcion/js.js"></script>
		<script src="../../assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="../../assets/js/jquery.gritter.min.js"></script>

		<!-- page specific plugin scripts Table -->
		<script src="../../assets/js/jquery.dataTables.min.js"></script>
		<script src="../../assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="../../assets/js/dataTables.buttons.min.js"></script>

		<!--DATE TIME PICKER-->
		<script src="../../assets/js/bootstrap-datepicker.min.js"></script>
		<script src="../../assets/js/bootstrap-timepicker.min.js"></script>
		<script src="../../assets/js/moment.min.js"></script>
		<script src="../../assets/js/daterangepicker.min.js"></script>
		<script src="../../assets/js/bootstrap-datetimepicker.min.js"></script>
		<!-- ace scripts -->
		<script src="../../assets/js/ace-elements.min.js"></script>
		<script src="../../assets/js/ace.min.js"></script>
	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<input type="hidden" id="id" name="id" value="<?php echo $_SESSION['usu']; ?>">
			<input type="hidden" id="idRol" name="idRol" value="<?php echo $_SESSION['idrol']; ?>">
			<input type="hidden" id="idFichaCamp" name="idFichaCamp" value="0">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Menu Principal</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="#" class="navbar-brand">
						<small>
							<i class="fa fa-futbol-o"></i>
							FICHA DE CONTROL
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">

						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<!--<img class="nav-user-photo" src="../assets/images/avatars/user.jpg" alt="Jason's Photo" />-->
								<span class="user-info">
									<small>Bienvenido,</small>
									<?php echo $_SESSION['usu']; ?>
								</span>

								<i class="ace-icon fa fa-caret-left"></i>
							</a>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>



			<div class="main-content">
				<div class="col-xs-12">

					<div class="center">

						<div class="row">

							<div class="col-xs-4 center">
								<div class="hr hr-double hr-dotted hr18"></div>	
								<input type="text" id="equipo_a" name="equipo_a" value="Campeonato" disabled>
								<input type="checkbox" class="ace" name="checkA" id="checkA" />
								<span class="lbl">No se presento</span>
								
								<div class="hr hr-double hr-dotted hr18"></div>
	            				<div id="datosA"></div>
							</div>
							
							<div class="col-xs-4 center">
							<button class="btn btn-sm btn-primary" onclick="admFichaInicio();" >INICIO</button>
							<button class="btn btn-sm btn-primary" onclick="admFichaGuardar();" >GUARDAR</button>
								<div class="hr hr-double hr-dotted hr18"></div>	
								<h3>FICHA DE CONTROL</h3>
								
								<input type="hidden" id="equipoA" name="equipoA">
								<input type="hidden" id="equipoB" name="equipoB">
								<input class="input-mini" type="text" id="resultadoGolA" name="resultadoGolA" value="0" disabled>/
								<input class="input-mini" type="text" id="resultadoGolB" name="resultadoGolB" value="0" disabled>

								<div class="hr hr-double hr-dotted hr18"></div>	
								<input type="text" id="datosCambiarA" name="datosA">
								<input type="text" id="datosCambiarB" name="datosB">
						        
						        <div id="container"></div>
						        <div id="prediccion"></div>
						        
							</div>

							<div class="col-xs-4 center">
								<div class="hr hr-double hr-dotted hr18"></div>	
								<input  type="text" id="equipo_b" name="equipo_b" value="Campeonato" disabled>
								<input type="checkbox" class="ace" name="checkB" id="checkB" />
								<span class="lbl">No se Presento</span>

								<div class="hr hr-double hr-dotted hr18"></div>	
	            				<div id="datosB"></div>
							</div>

						</div><!-- Primer Menu -->

					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
			<script type="text/javascript">
			$('#id-text2').attr('class', 'white');
			$('#id-company-text').attr('class', 'light-blue');
		</script>
	</body>
</html>
