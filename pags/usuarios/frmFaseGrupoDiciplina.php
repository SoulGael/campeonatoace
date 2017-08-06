<?php

include 'funcion/futbol.php';
include '../conexion.php';
conectarse();

//Recibir los datos ingresados en el formulario
$id = $_POST['id'];
$idCampeonato = $_POST['idCampeonato'];

$html = '<div class="tabbable">
					<ul class="nav nav-tabs padding-12 tab-color-blue background-blue">';
	$html .= '<li>
							<a data-toggle="tab" href="#acorHombres">Hombres</a>
						</li>';
	$html .= '<li>
							<a data-toggle="tab" href="#acorMujeres">Mujeres</a>
						</li>';
$html .= '</ul>
				</div>';

$html .= '<div class="tab-content">';
$html .= '<div id="acorHombres" class="tab-pane">
						<div id="accordion" class="accordion-style1 panel-group accordion-style2">';

$resultadoVarones=getEquiposCampeonato($idCampeonato, $id,"true");
	while($filaVarones=pg_fetch_array($resultadoVarones)){
		$idequipo = $filaVarones['id_equipo'];
		$equipo = $filaVarones['equipo'];

		$html .= '<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#'.$idequipo.'h" aria-expanded="false">
											<i class="bigger-110 ace-icon fa fa-angle-right" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
											&nbsp;'.$equipo.'
										</a>
									</h4>
								</div>

							<div class="panel-collapse collapse" id="'.$idequipo.'h" aria-expanded="false" style="height: 0px;">
								<div class="panel-body">
									<table id="simple-table" class="table  table-bordered table-hover">
									<thead>
										<tr>
											<th>Cédula</th>
											<th>Nombres</th>
											<th>Nro de Camiseta</th>
										</tr>
									</thead>
										<tbody>';

		$resultadoEquiposV=getSeleccionados($idequipo);
		while($filaEquiposV=pg_fetch_array($resultadoEquiposV)){
			$nombre =  $filaEquiposV['razon_social'];
			$cedula =  $filaEquiposV['cedula'];
			$num_camiseta =  $filaEquiposV['num_camiseta'];
			$html .= '<tr>
						<td>'.$cedula.'</td>
						<td>'.$nombre.'</td>
						<td>'.$num_camiseta.'</td>
					  </tr>';
		}
		$html .= '</tbody>
						</table>
					</div>
				</div>
			</div>';

	}
	$html .= '</div>
					</div>';

$html .= '<div id="acorMujeres" class="tab-pane">
						<div id="accordion" class="accordion-style1 panel-group accordion-style2">';
$resultadoMujeres=getEquiposCampeonato($idCampeonato, $id,"false");
	while($filaMujeres=pg_fetch_array($resultadoMujeres)){
		$idequipo = $filaMujeres['id_equipo'];
		$equipo = $filaMujeres['equipo'];
		$html .= '<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#'.$idequipo.'m" aria-expanded="false">
											<i class="bigger-110 ace-icon fa fa-angle-right" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
											&nbsp;'.$equipo.'
										</a>
									</h4>
								</div>

							<div class="panel-collapse collapse" id="'.$idequipo.'m" aria-expanded="false" style="height: 0px;">
								<div class="panel-body">
									<table id="simple-table" class="table  table-bordered table-hover">
									<thead>
										<tr>
											<th>Cédula</th>
											<th>Nombres</th>
											<th>Nro de Camiseta</th>
										</tr>
									</thead>
										<tbody>';

		$resultadoEquiposM=getSeleccionados($idequipo);
		while($filaEquiposM=pg_fetch_array($resultadoEquiposM)){
			$nombre =  $filaEquiposM['razon_social'];
			$cedula =  $filaEquiposM['cedula'];
			$num_camiseta =  $filaEquiposM['num_camiseta'];
			$html .= '<tr>
						<td>'.$cedula.'</td>
						<td>'.$nombre.'</td>
						<td>'.$num_camiseta.'</td>
					  </tr>';
		}
		$html .= '</tbody>
						</table>
					</div>
				</div>
			</div>';
	}

	$html .= '</div>
					</div>';

$html .= '</div>';
echo $html;
pg_close();
?>
