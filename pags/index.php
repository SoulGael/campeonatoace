<?php
session_start();
include 'autenticacion.php';
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

		<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="../assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="../assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="../assets/css/jquery.gritter.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="../assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="../assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="../assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="../assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="../assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="../assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- ace settings handler -->
		<script src="../assets/js/jquery-2.1.4.min.js"></script>
		<script src="../assets/js/ace-extra.min.js"></script>
		<script src="../js/js.js"></script>
		<script src="../assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="../assets/js/jquery.gritter.min.js"></script>

		<!-- page specific plugin scripts Table -->
		<script src="../assets/js/jquery.dataTables.min.js"></script>
		<script src="../assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="../assets/js/dataTables.buttons.min.js"></script>
		<!-- ace scripts -->
		<script src="../assets/js/ace-elements.min.js"></script>
		<script src="../assets/js/ace.min.js"></script>
	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<input type="hidden" id="id" name="id" value="<?php echo $_SESSION['usu']; ?>">
			<input type="hidden" id="idRol" name="idRol" value="<?php echo $_SESSION['idrol']; ?>">
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
							Campeonato
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

			<div id="sidebar" class="sidebar responsive ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<ul id="divOpciones" class="nav nav-list">
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

			<div class="main-content">
				<div class="main-content-inner">

					<div class="page-content">

						<div id="divMenu1" class="page-header">

						</div><!-- Primer Menu -->

						<div id="divMenu2" class="page-header">

						</div><!-- Segundo Menu -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="tabbable">
									<ul class="nav nav-tabs padding-18 tab-size-bigger" id="myTab">
										<li class="active">
											<a data-toggle="tab" href="#div1">
												<i class="blue ace-icon fa fa-question-circle bigger-120"></i>
												Información
											</a>
										</li>

										<li>
											<a data-toggle="tab" href="#div2">
												<i class="green ace-icon fa fa-user bigger-120"></i>
												Nuevo
											</a>
										</li>
									</ul>

									<div class="tab-content no-border padding-24">
										<div id="div1" class="tab-pane fade in active">
											
										</div>

										<div id="div2" class="tab-pane fade">

										</div>
									</div>
								</div>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
<script type="text/javascript">
			$('#id-text2').attr('class', 'white');
			$('#id-company-text').attr('class', 'light-blue');
		</script>
	</body>
</html>
