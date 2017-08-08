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
		<link rel="stylesheet" href="../assets/css/bootstrap-datepicker3.min.css" />
		<link rel="stylesheet" href="../assets/css/bootstrap-timepicker.min.css" />
		<link rel="stylesheet" href="../assets/css/daterangepicker.min.css" />
		<link rel="stylesheet" href="../assets/css/bootstrap-datetimepicker.min.css" />

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

		<!--DATE TIME PICKER-->
		<script src="../assets/js/bootstrap-datepicker.min.js"></script>
		<script src="../assets/js/bootstrap-timepicker.min.js"></script>
		<script src="../assets/js/moment.min.js"></script>
		<script src="../assets/js/daterangepicker.min.js"></script>
		<script src="../assets/js/bootstrap-datetimepicker.min.js"></script>
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
					<div class="clearfix">
						<div class="pull-right tableTools-container"></div>
					</div>
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
											<div class="row">
												<div class="col-xs-12">
													<table id="simple-table" class="table  table-bordered table-hover">
														<thead>
															<tr>
																<th class="center">
																	<label class="pos-rel">
																		<input type="checkbox" class="ace" />
																		<span class="lbl"></span>
																	</label>
																</th>
																<th class="detail-col">Detalles</th>
																<th>Estudiante</th>
																<th>Cedula</th>
																<th class="hidden-480">Nivel</th>

																<th>
																	<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
																	Fecha
																</th>
																<th class="hidden-480">-</th>

																<th></th>
															</tr>
														</thead>

														<tbody>
															<tr>
																<td class="center">
																	<label class="pos-rel">
																		<input type="checkbox" class="ace" />
																		<span class="lbl"></span>
																	</label>
																</td>

																<td class="center">
																	<div class="action-buttons">
																		<a href="#" class="green bigger-140 show-details-btn" title="Show Details">
																			<i class="ace-icon fa fa-angle-double-down"></i>
																			<span class="sr-only">Details</span>
																		</a>
																	</div>
																</td>

																<td>
																	<a href="#">1720929593</a>
																</td>
																<td>OSWALDO RAPHAEL</td>
																<td class="hidden-480">ABALCO VIZCAINO</td>
																<td>Feb 12</td>

																<td class="hidden-480">
																	<span class="label label-sm label-warning">Expiring</span>
																</td>

																<td>
																	<div class="hidden-sm hidden-xs btn-group">
																		<button class="btn btn-xs btn-success">
																			<i class="ace-icon fa fa-check bigger-120"></i>
																		</button>

																		<button class="btn btn-xs btn-info">
																			<i class="ace-icon fa fa-pencil bigger-120"></i>
																		</button>

																		<button class="btn btn-xs btn-danger">
																			<i class="ace-icon fa fa-trash-o bigger-120"></i>
																		</button>

																		<button class="btn btn-xs btn-warning">
																			<i class="ace-icon fa fa-flag bigger-120"></i>
																		</button>
																	</div>

																	<div class="hidden-md hidden-lg">
																		<div class="inline pos-rel">
																			<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
																				<i class="ace-icon fa fa-cog icon-only bigger-110"></i>
																			</button>

																			<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
																				<li>
																					<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
																						<span class="blue">
																							<i class="ace-icon fa fa-search-plus bigger-120"></i>
																						</span>
																					</a>
																				</li>

																				<li>
																					<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
																						<span class="green">
																							<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																						</span>
																					</a>
																				</li>

																				<li>
																					<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
																						<span class="red">
																							<i class="ace-icon fa fa-trash-o bigger-120"></i>
																						</span>
																					</a>
																				</li>
																			</ul>
																		</div>
																	</div>
																</td>
															</tr>

															<tr class="detail-row">
																<td colspan="8">
																	<div class="table-detail">
																		<div class="row">
																			<div class="col-xs-12 col-sm-2">
																				<div class="text-center">
																					<img height="150" class="thumbnail inline no-margin-bottom" alt="Domain Owner's Avatar" src="../assets/images/avatars/profile-pic.jpg" />
																					<br />
																					<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
																						<div class="inline position-relative">
																							<a class="user-title-label" href="#">
																								<i class="ace-icon fa fa-circle light-green"></i>
																								&nbsp;
																								<span class="white">Alex M. Doe</span>
																							</a>
																						</div>
																					</div>
																				</div>
																			</div>

																			<div class="col-xs-12 col-sm-7">
																				<div class="space visible-xs"></div>

																				<div class="profile-user-info profile-user-info-striped">
																					<div class="profile-info-row">
																						<div class="profile-info-name"> Username </div>

																						<div class="profile-info-value">
																							<span>alexdoe</span>
																						</div>
																					</div>

																					<div class="profile-info-row">
																						<div class="profile-info-name"> Location </div>

																						<div class="profile-info-value">
																							<i class="fa fa-map-marker light-orange bigger-110"></i>
																							<span>Netherlands, Amsterdam</span>
																						</div>
																					</div>

																					<div class="profile-info-row">
																						<div class="profile-info-name"> Age </div>

																						<div class="profile-info-value">
																							<span>38</span>
																						</div>
																					</div>

																					<div class="profile-info-row">
																						<div class="profile-info-name"> Joined </div>

																						<div class="profile-info-value">
																							<span>2010/06/20</span>
																						</div>
																					</div>

																					<div class="profile-info-row">
																						<div class="profile-info-name"> Last Online </div>

																						<div class="profile-info-value">
																							<span>3 hours ago</span>
																						</div>
																					</div>

																					<div class="profile-info-row">
																						<div class="profile-info-name"> About Me </div>

																						<div class="profile-info-value">
																							<span>Bio</span>
																						</div>
																					</div>
																				</div>
																			</div>

																			<div class="col-xs-12 col-sm-3">
																				<div class="space visible-xs"></div>
																				<h4 class="header blue lighter less-margin">Send a message to Alex</h4>

																				<div class="space-6"></div>

																				<form>
																					<fieldset>
																						<textarea class="width-100" resize="none" placeholder="Type something…"></textarea>
																					</fieldset>

																					<div class="hr hr-dotted"></div>

																					<div class="clearfix">
																						<label class="pull-left">
																							<input type="checkbox" class="ace" />
																							<span class="lbl"> Email me a copy</span>
																						</label>

																						<button class="pull-right btn btn-sm btn-primary btn-white btn-round" type="button">
																							Submit
																							<i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
																						</button>
																					</div>
																				</form>
																			</div>
																		</div>
																	</div>
																</td>
															</tr>

															<tr>
																<td class="center">
																	<label class="pos-rel">
																		<input type="checkbox" class="ace" />
																		<span class="lbl"></span>
																	</label>
																</td>

																<td class="center">
																	<div class="action-buttons">
																		<a href="#" class="green bigger-140 show-details-btn" title="Show Details">
																			<i class="ace-icon fa fa-angle-double-down"></i>
																			<span class="sr-only">Details</span>
																		</a>
																	</div>
																</td>

																<td>
																	<a href="#">1727464057</a>
																</td>
																<td>MARIA MANUELA</td>
																<td class="hidden-480">ACHINA ANDRANGO</td>
																<td>Feb 18</td>

																<td class="hidden-480">
																	<span class="label label-sm label-success">Registered</span>
																</td>

																<td>
																	<div class="hidden-sm hidden-xs btn-group">
																		<button class="btn btn-xs btn-success">
																			<i class="ace-icon fa fa-check bigger-120"></i>
																		</button>

																		<button class="btn btn-xs btn-info">
																			<i class="ace-icon fa fa-pencil bigger-120"></i>
																		</button>

																		<button class="btn btn-xs btn-danger">
																			<i class="ace-icon fa fa-trash-o bigger-120"></i>
																		</button>

																		<button class="btn btn-xs btn-warning">
																			<i class="ace-icon fa fa-flag bigger-120"></i>
																		</button>
																	</div>

																	<div class="hidden-md hidden-lg">
																		<div class="inline pos-rel">
																			<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
																				<i class="ace-icon fa fa-cog icon-only bigger-110"></i>
																			</button>

																			<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
																				<li>
																					<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
																						<span class="blue">
																							<i class="ace-icon fa fa-search-plus bigger-120"></i>
																						</span>
																					</a>
																				</li>

																				<li>
																					<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
																						<span class="green">
																							<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																						</span>
																					</a>
																				</li>

																				<li>
																					<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
																						<span class="red">
																							<i class="ace-icon fa fa-trash-o bigger-120"></i>
																						</span>
																					</a>
																				</li>
																			</ul>
																		</div>
																	</div>
																</td>
															</tr>

															<tr class="detail-row">
																<td colspan="8">
																	<div class="table-detail">
																		<div class="row">
																			<div class="col-xs-12 col-sm-2">
																				<div class="text-center">
																					<img height="150" class="thumbnail inline no-margin-bottom" alt="Domain Owner's Avatar" src="../assets/images/avatars/profile-pic.jpg" />
																					<br />
																					<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
																						<div class="inline position-relative">
																							<a class="user-title-label" href="#">
																								<i class="ace-icon fa fa-circle light-green"></i>
																								&nbsp;
																								<span class="white">Alex M. Doe</span>
																							</a>
																						</div>
																					</div>
																				</div>
																			</div>

																			<div class="col-xs-12 col-sm-7">
																				<div class="space visible-xs"></div>

																				<div class="profile-user-info profile-user-info-striped">
																					<div class="profile-info-row">
																						<div class="profile-info-name"> Username </div>

																						<div class="profile-info-value">
																							<span>alexdoe</span>
																						</div>
																					</div>

																					<div class="profile-info-row">
																						<div class="profile-info-name"> Location </div>

																						<div class="profile-info-value">
																							<i class="fa fa-map-marker light-orange bigger-110"></i>
																							<span>Netherlands, Amsterdam</span>
																						</div>
																					</div>

																					<div class="profile-info-row">
																						<div class="profile-info-name"> Age </div>

																						<div class="profile-info-value">
																							<span>38</span>
																						</div>
																					</div>

																					<div class="profile-info-row">
																						<div class="profile-info-name"> Joined </div>

																						<div class="profile-info-value">
																							<span>2010/06/20</span>
																						</div>
																					</div>

																					<div class="profile-info-row">
																						<div class="profile-info-name"> Last Online </div>

																						<div class="profile-info-value">
																							<span>3 hours ago</span>
																						</div>
																					</div>

																					<div class="profile-info-row">
																						<div class="profile-info-name"> About Me </div>

																						<div class="profile-info-value">
																							<span>Bio</span>
																						</div>
																					</div>
																				</div>
																			</div>

																			<div class="col-xs-12 col-sm-3">
																				<div class="space visible-xs"></div>
																				<h4 class="header blue lighter less-margin">Send a message to Alex</h4>

																				<div class="space-6"></div>

																				<form>
																					<fieldset>
																						<textarea class="width-100" resize="none" placeholder="Type something…"></textarea>
																					</fieldset>

																					<div class="hr hr-dotted"></div>

																					<div class="clearfix">
																						<label class="pull-left">
																							<input type="checkbox" class="ace" />
																							<span class="lbl"> Email me a copy</span>
																						</label>

																						<button class="pull-right btn btn-sm btn-primary btn-white btn-round" type="button">
																							Submit
																							<i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
																						</button>
																					</div>
																				</form>
																			</div>
																		</div>
																	</div>
																</td>
															</tr>

															<tr>
																<td class="center">
																	<label class="pos-rel">
																		<input type="checkbox" class="ace" />
																		<span class="lbl"></span>
																	</label>
																</td>

																<td class="center">
																	<div class="action-buttons">
																		<a href="#" class="green bigger-140 show-details-btn" title="Show Details">
																			<i class="ace-icon fa fa-angle-double-down"></i>
																			<span class="sr-only">Details</span>
																		</a>
																	</div>
																</td>

																<td>
																	<a href="#">1727532150</a>
																</td>
																<td>ANDRES HUMBERTO</td>
																<td class="hidden-480">ACHINA MONTA</td>
																<td>Mar 11</td>

																<td class="hidden-480">
																	<span class="label label-sm label-warning">Expiring</span>
																</td>

																<td>
																	<div class="hidden-sm hidden-xs btn-group">
																		<button class="btn btn-xs btn-success">
																			<i class="ace-icon fa fa-check bigger-120"></i>
																		</button>

																		<button class="btn btn-xs btn-info">
																			<i class="ace-icon fa fa-pencil bigger-120"></i>
																		</button>

																		<button class="btn btn-xs btn-danger">
																			<i class="ace-icon fa fa-trash-o bigger-120"></i>
																		</button>

																		<button class="btn btn-xs btn-warning">
																			<i class="ace-icon fa fa-flag bigger-120"></i>
																		</button>
																	</div>

																	<div class="hidden-md hidden-lg">
																		<div class="inline pos-rel">
																			<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
																				<i class="ace-icon fa fa-cog icon-only bigger-110"></i>
																			</button>

																			<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
																				<li>
																					<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
																						<span class="blue">
																							<i class="ace-icon fa fa-search-plus bigger-120"></i>
																						</span>
																					</a>
																				</li>

																				<li>
																					<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
																						<span class="green">
																							<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																						</span>
																					</a>
																				</li>

																				<li>
																					<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
																						<span class="red">
																							<i class="ace-icon fa fa-trash-o bigger-120"></i>
																						</span>
																					</a>
																				</li>
																			</ul>
																		</div>
																	</div>
																</td>
															</tr>

															<tr class="detail-row">
																<td colspan="8">
																	<div class="table-detail">
																		<div class="row">
																			<div class="col-xs-12 col-sm-2">
																				<div class="text-center">
																					<img height="150" class="thumbnail inline no-margin-bottom" alt="Domain Owner's Avatar" src="../assets/images/avatars/profile-pic.jpg" />
																					<br />
																					<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
																						<div class="inline position-relative">
																							<a class="user-title-label" href="#">
																								<i class="ace-icon fa fa-circle light-green"></i>
																								&nbsp;
																								<span class="white">Alex M. Doe</span>
																							</a>
																						</div>
																					</div>
																				</div>
																			</div>

																			<div class="col-xs-12 col-sm-7">
																				<div class="space visible-xs"></div>

																				<div class="profile-user-info profile-user-info-striped">
																					<div class="profile-info-row">
																						<div class="profile-info-name"> Username </div>

																						<div class="profile-info-value">
																							<span>alexdoe</span>
																						</div>
																					</div>

																					<div class="profile-info-row">
																						<div class="profile-info-name"> Location </div>

																						<div class="profile-info-value">
																							<i class="fa fa-map-marker light-orange bigger-110"></i>
																							<span>Netherlands, Amsterdam</span>
																						</div>
																					</div>

																					<div class="profile-info-row">
																						<div class="profile-info-name"> Age </div>

																						<div class="profile-info-value">
																							<span>38</span>
																						</div>
																					</div>

																					<div class="profile-info-row">
																						<div class="profile-info-name"> Joined </div>

																						<div class="profile-info-value">
																							<span>2010/06/20</span>
																						</div>
																					</div>

																					<div class="profile-info-row">
																						<div class="profile-info-name"> Last Online </div>

																						<div class="profile-info-value">
																							<span>3 hours ago</span>
																						</div>
																					</div>

																					<div class="profile-info-row">
																						<div class="profile-info-name"> About Me </div>

																						<div class="profile-info-value">
																							<span>Bio</span>
																						</div>
																					</div>
																				</div>
																			</div>

																			<div class="col-xs-12 col-sm-3">
																				<div class="space visible-xs"></div>
																				<h4 class="header blue lighter less-margin">Send a message to Alex</h4>

																				<div class="space-6"></div>

																				<form>
																					<fieldset>
																						<textarea class="width-100" resize="none" placeholder="Type something…"></textarea>
																					</fieldset>

																					<div class="hr hr-dotted"></div>

																					<div class="clearfix">
																						<label class="pull-left">
																							<input type="checkbox" class="ace" />
																							<span class="lbl"> Email me a copy</span>
																						</label>

																						<button class="pull-right btn btn-sm btn-primary btn-white btn-round" type="button">
																							Submit
																							<i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
																						</button>
																					</div>
																				</form>
																			</div>
																		</div>
																	</div>
																</td>
															</tr>

															<tr>
																<td class="center">
																	<label class="pos-rel">
																		<input type="checkbox" class="ace" />
																		<span class="lbl"></span>
																	</label>
																</td>

																<td class="center">
																	<div class="action-buttons">
																		<a href="#" class="green bigger-140 show-details-btn" title="Show Details">
																			<i class="ace-icon fa fa-angle-double-down"></i>
																			<span class="sr-only">Details</span>
																		</a>
																	</div>
																</td>

																<td>
																	<a href="#">1003984539</a>
																</td>
																<td>MARIA ESTHELA</td>
																<td class="hidden-480">AGUILAR BURGA</td>
																<td>Apr 03</td>

																<td class="hidden-480">
																	<span class="label label-sm label-inverse arrowed-in">Flagged</span>
																</td>

																<td>
																	<div class="hidden-sm hidden-xs btn-group">
																		<button class="btn btn-xs btn-success">
																			<i class="ace-icon fa fa-check bigger-120"></i>
																		</button>

																		<button class="btn btn-xs btn-info">
																			<i class="ace-icon fa fa-pencil bigger-120"></i>
																		</button>

																		<button class="btn btn-xs btn-danger">
																			<i class="ace-icon fa fa-trash-o bigger-120"></i>
																		</button>

																		<button class="btn btn-xs btn-warning">
																			<i class="ace-icon fa fa-flag bigger-120"></i>
																		</button>
																	</div>

																	<div class="hidden-md hidden-lg">
																		<div class="inline pos-rel">
																			<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
																				<i class="ace-icon fa fa-cog icon-only bigger-110"></i>
																			</button>

																			<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
																				<li>
																					<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
																						<span class="blue">
																							<i class="ace-icon fa fa-search-plus bigger-120"></i>
																						</span>
																					</a>
																				</li>

																				<li>
																					<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
																						<span class="green">
																							<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																						</span>
																					</a>
																				</li>

																				<li>
																					<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
																						<span class="red">
																							<i class="ace-icon fa fa-trash-o bigger-120"></i>
																						</span>
																					</a>
																				</li>
																			</ul>
																		</div>
																	</div>
																</td>
															</tr>

															<tr class="detail-row">
																<td colspan="8">
																	<div class="table-detail">
																		<div class="row">
																			<div class="col-xs-12 col-sm-2">
																				<div class="text-center">
																					<img height="150" class="thumbnail inline no-margin-bottom" alt="Domain Owner's Avatar" src="../assets/images/avatars/profile-pic.jpg" />
																					<br />
																					<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
																						<div class="inline position-relative">
																							<a class="user-title-label" href="#">
																								<i class="ace-icon fa fa-circle light-green"></i>
																								&nbsp;
																								<span class="white">Alex M. Doe</span>
																							</a>
																						</div>
																					</div>
																				</div>
																			</div>

																			<div class="col-xs-12 col-sm-7">
																				<div class="space visible-xs"></div>

																				<div class="profile-user-info profile-user-info-striped">
																					<div class="profile-info-row">
																						<div class="profile-info-name"> Username </div>

																						<div class="profile-info-value">
																							<span>alexdoe</span>
																						</div>
																					</div>

																					<div class="profile-info-row">
																						<div class="profile-info-name"> Location </div>

																						<div class="profile-info-value">
																							<i class="fa fa-map-marker light-orange bigger-110"></i>
																							<span>Netherlands, Amsterdam</span>
																						</div>
																					</div>

																					<div class="profile-info-row">
																						<div class="profile-info-name"> Age </div>

																						<div class="profile-info-value">
																							<span>38</span>
																						</div>
																					</div>

																					<div class="profile-info-row">
																						<div class="profile-info-name"> Joined </div>

																						<div class="profile-info-value">
																							<span>2010/06/20</span>
																						</div>
																					</div>

																					<div class="profile-info-row">
																						<div class="profile-info-name"> Last Online </div>

																						<div class="profile-info-value">
																							<span>3 hours ago</span>
																						</div>
																					</div>

																					<div class="profile-info-row">
																						<div class="profile-info-name"> About Me </div>

																						<div class="profile-info-value">
																							<span>Bio</span>
																						</div>
																					</div>
																				</div>
																			</div>

																			<div class="col-xs-12 col-sm-3">
																				<div class="space visible-xs"></div>
																				<h4 class="header blue lighter less-margin">Send a message to Alex</h4>

																				<div class="space-6"></div>

																				<form>
																					<fieldset>
																						<textarea class="width-100" resize="none" placeholder="Type something…"></textarea>
																					</fieldset>

																					<div class="hr hr-dotted"></div>

																					<div class="clearfix">
																						<label class="pull-left">
																							<input type="checkbox" class="ace" />
																							<span class="lbl"> Email me a copy</span>
																						</label>

																						<button class="pull-right btn btn-sm btn-primary btn-white btn-round" type="button">
																							Submit
																							<i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
																						</button>
																					</div>
																				</form>
																			</div>
																		</div>
																	</div>
																</td>
															</tr>

															<tr>
																<td class="center">
																	<label class="pos-rel">
																		<input type="checkbox" class="ace" />
																		<span class="lbl"></span>
																	</label>
																</td>

																<td class="center">
																	<div class="action-buttons">
																		<a href="#" class="green bigger-140 show-details-btn" title="Show Details">
																			<i class="ace-icon fa fa-angle-double-down"></i>
																			<span class="sr-only">Details</span>
																		</a>
																	</div>
																</td>

																<td>
																	<a href="#">1003558242</a>
																</td>
																<td>JIMY ANDRES</td>
																<td class="hidden-480">AGUIRRE ENRIQUEZ</td>
																<td>Jan 21</td>

																<td class="hidden-480">
																	<span class="label label-sm label-success">Registered</span>
																</td>

																<td>
																	<div class="hidden-sm hidden-xs btn-group">
																		<button class="btn btn-xs btn-success">
																			<i class="ace-icon fa fa-check bigger-120"></i>
																		</button>

																		<button class="btn btn-xs btn-info">
																			<i class="ace-icon fa fa-pencil bigger-120"></i>
																		</button>

																		<button class="btn btn-xs btn-danger">
																			<i class="ace-icon fa fa-trash-o bigger-120"></i>
																		</button>

																		<button class="btn btn-xs btn-warning">
																			<i class="ace-icon fa fa-flag bigger-120"></i>
																		</button>
																	</div>

																	<div class="hidden-md hidden-lg">
																		<div class="inline pos-rel">
																			<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
																				<i class="ace-icon fa fa-cog icon-only bigger-110"></i>
																			</button>

																			<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
																				<li>
																					<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
																						<span class="blue">
																							<i class="ace-icon fa fa-search-plus bigger-120"></i>
																						</span>
																					</a>
																				</li>

																				<li>
																					<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
																						<span class="green">
																							<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																						</span>
																					</a>
																				</li>

																				<li>
																					<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
																						<span class="red">
																							<i class="ace-icon fa fa-trash-o bigger-120"></i>
																						</span>
																					</a>
																				</li>
																			</ul>
																		</div>
																	</div>
																</td>
															</tr>

															<tr class="detail-row">
																<td colspan="8">
																	<div class="table-detail">
																		<div class="row">
																			<div class="col-xs-12 col-sm-2">
																				<div class="text-center">
																					<img height="150" class="thumbnail inline no-margin-bottom" alt="Domain Owner's Avatar" src="../assets/images/avatars/profile-pic.jpg" />
																					<br />
																					<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
																						<div class="inline position-relative">
																							<a class="user-title-label" href="#">
																								<i class="ace-icon fa fa-circle light-green"></i>
																								&nbsp;
																								<span class="white">Alex M. Doe</span>
																							</a>
																						</div>
																					</div>
																				</div>
																			</div>

																			<div class="col-xs-12 col-sm-7">
																				<div class="space visible-xs"></div>

																				<div class="profile-user-info profile-user-info-striped">
																					<div class="profile-info-row">
																						<div class="profile-info-name"> Username </div>

																						<div class="profile-info-value">
																							<span>alexdoe</span>
																						</div>
																					</div>

																					<div class="profile-info-row">
																						<div class="profile-info-name"> Location </div>

																						<div class="profile-info-value">
																							<i class="fa fa-map-marker light-orange bigger-110"></i>
																							<span>Netherlands, Amsterdam</span>
																						</div>
																					</div>

																					<div class="profile-info-row">
																						<div class="profile-info-name"> Age </div>

																						<div class="profile-info-value">
																							<span>38</span>
																						</div>
																					</div>

																					<div class="profile-info-row">
																						<div class="profile-info-name"> Joined </div>

																						<div class="profile-info-value">
																							<span>2010/06/20</span>
																						</div>
																					</div>

																					<div class="profile-info-row">
																						<div class="profile-info-name"> Last Online </div>

																						<div class="profile-info-value">
																							<span>3 hours ago</span>
																						</div>
																					</div>

																					<div class="profile-info-row">
																						<div class="profile-info-name"> About Me </div>

																						<div class="profile-info-value">
																							<span>Bio</span>
																						</div>
																					</div>
																				</div>
																			</div>

																			<div class="col-xs-12 col-sm-3">
																				<div class="space visible-xs"></div>
																				<h4 class="header blue lighter less-margin">Send a message to Alex</h4>

																				<div class="space-6"></div>

																				<form>
																					<fieldset>
																						<textarea class="width-100" resize="none" placeholder="Type something…"></textarea>
																					</fieldset>

																					<div class="hr hr-dotted"></div>

																					<div class="clearfix">
																						<label class="pull-left">
																							<input type="checkbox" class="ace" />
																							<span class="lbl"> Email me a copy</span>
																						</label>

																						<button class="pull-right btn btn-sm btn-primary btn-white btn-round" type="button">
																							Submit
																							<i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
																						</button>
																					</div>
																				</form>
																			</div>
																		</div>
																	</div>
																</td>
															</tr>
														</tbody>
													</table>
												</div><!-- /.span -->
											</div><!-- /.row -->										</div>

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
			$('.show-details-btn').on('click', function(e) {
				console.log("ddsd")
				e.preventDefault();
				$(this).closest('tr').next().toggleClass('open');
				$(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
			});

			$('#id-text2').attr('class', 'white');
			$('#id-company-text').attr('class', 'light-blue');
		</script>
	</body>
</html>
