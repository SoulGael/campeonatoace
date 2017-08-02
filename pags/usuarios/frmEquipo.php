<?php

include 'funcion/futbol.php';
include '../conexion.php';
conectarse();

//Recibir los datos ingresados en el formulario
$id = $_POST['id'];
$equipo = "";
$id_campeonato = "";
$id_diciplina = "";
$sexo = "t";
$modalidad = "p";

$diciplina = "";
$carrera = "";
$Seleccionados = "";

$comboCarrea = "";
$comboCampeonato = "";
$comboDiciplina = "";

if(strcmp($id, '-1')!=0){
	$resultado=getEquipo($id);

	if(pg_num_rows($resultado)!=0){
		if($fila=pg_fetch_array($resultado)){
			$equipo=$fila['equipo'];
			$id_campeonato=$fila['id_campeonato_actual'];
			$carrera=$fila['carrera'];
			$diciplina=$fila['diciplina'];
			$sexo=$fila['genero'];
			$modalidad=$fila['modalidad'];
		}
	}

	$resultadoSe=getSeleccionados($id);
	if(pg_num_rows($resultadoSe)!=0){
		$Seleccionados .= '<tbody>';
		while($filaSe=pg_fetch_array($resultadoSe)){
			$al =  $filaSe['razon_social'];
			$id_al =  $filaSe['id_alumno'];
			$id_ca =  $filaSe['id_campeonato'];
			$num =  $filaSe['num_camiseta'];
			$Seleccionados .= '<tr>
								<td width="40%">'.$al.'</td>
								<td class="center" width="10%">
									<span class="input-icon input-icon-right">
										<input placeholder="Nro" id="camiseta_'.$id_al.'" name="camiseta_'.$id_al.'" value='.$num.' type="text" "/>
										<i class="ace-icon fa fa-leaf green"></i>
									</span>
								</td>
								<td width="500%">
									<button class="btn btn-warning" onclick="admJugadorQuitar('.$id.','.$id_al.','.$id_ca.',\'m\')">Modificar</button>
									<button class="btn btn-danger" onclick="admJugadorQuitar('.$id.','.$id_al.','.$id_ca.',\'e\')">Eliminar</button>
								</td>
							</tr>';
		}
		$Seleccionados .= '</tbody>';
	}
}
//.uk-active
$comboCarrea = equiposCombo($carrera);
$comboCampeonato = getCampeonatoEstado($id_campeonato, "true");
$comboDiciplina = diciplinaCombo($diciplina);

$html = "";

$html .= '<input type="hidden" id="id_futbol" name="id_futbol" value="'.$id.'">';

$html .= '
	<div class="tabbable">
		<ul class="nav nav-tabs" id="myTab">
			<li class="active">
				<a data-toggle="tab" href="#home">
					<i class="green ace-icon fa fa-home bigger-120"></i>
					Datos del Equipo
				</a>
			</li>
			<li>
				<a data-toggle="tab" href="#messages">
					Jugadores Seleccionados
				</a>
			</li>
		</ul>
		<div class="tab-content">
			<div id="home" class="tab-pane fade in active">
				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Nombre del Equipo:</label>
						<div class="col-sm-10">
							<span class="input-icon input-icon-right">
								<input id="nuevo_equipo" name="nuevo_equipo" placeholder="Equipo..." type="text" value="'.$equipo.'"/>
								<i class="ace-icon fa fa-leaf green"></i>
							</span>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Campeonato:</label>
						<div class="col-sm-10">
							<span class="input-icon input-icon-right">
								<select class="form-control" name="cmbCampeonato" id="cmbCampeonato"  onchange="cargarDiciplinaEquipo()">'.$comboCampeonato.'</select>
							</span>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Genero:</label>

						<div class="col-sm-10">
							<span class="input-icon">
								<div class="radio">
									<label>
										<input type="radio" class="ace" name="sexo" id="sexom" value="true" '.($sexo== 't' ? 'checked' : '').' />
										<span class="lbl">Masculino</span>
									</label>
									<label>
										<input type="radio" class="ace" name="sexo" id="sexof" value="false" '.($sexo== 'f' ? 'checked' : '').' />
										<span class="lbl">Femenino</span>
									</label>
								</div>
							</span>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Modalidad:</label>

						<div class="col-sm-10">
							<span class="input-icon">
								<div class="radio">
									<label>
										<input type="radio" class="ace" name="modalidad" id="modalidadp" onclick=cargarCarreraEquipo(); value="p" '.($modalidad== 'p' ? 'checked' : '').' />
										<span class="lbl">Presencial</span>
									</label>
									<label>
										<input type="radio" class="ace" name="modalidad" id="modalidads" onclick=cargarCarreraEquipo(); value="s" '.($modalidad== 's' ? 'checked' : '').' />
										<span class="lbl">Semi-Presencial</span>
									</label>
								</div>
							</span>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Diciplina:</label>
						<div class="col-sm-10">
							<span class="input-icon input-icon-right">
								<select class="form-control" name="cmbDiciplina" id="cmbDiciplina" >'.$comboDiciplina.'</select>
							</span>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Carrera:</label>
						<div class="col-sm-10">
							<span class="input-icon input-icon-right">
								<select class="form-control" name="cmbCarrea" id="cmbCarrea" onchange="cargarCarrera()">'.$comboCarrea.'</select>
							</span>
						</div>
					</div>

				</form>

				<div class="hr hr-double hr-dotted hr18"></div>
				<div class="row" id="divEquipos"></div>
				<div class="hr hr-double hr-dotted hr18"></div>

				<button type="button" onclick="admFutbolGuardar()" class="btn btn-primary btn-sm">
					<i class="ace-icon fa fa-key bigger-110"></i>Guardar
				</button>

			</div>
			<div id="messages" class="tab-pane fade">
				<table id="simple-table" class="table  table-bordered table-hover">'.$Seleccionados.'</table>
			</div>
		</div>
	</div>';

echo $html;
pg_close();
?>
