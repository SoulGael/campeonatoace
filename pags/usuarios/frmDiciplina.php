<?php

include '../conexion.php';
include 'funcion/rol.php';
conectarse();

$id = $_POST['id'];
$idRol = $_POST['idRol'];
$diciplina = "";
$hora = "";
$estado = "t";

//Verificar si los datos son nuevos
if(strcmp($id, '-1')!=0){
	$resultado=getDiciplinas($id);

	if(pg_num_rows($resultado)!=0){
		if($fila=pg_fetch_array($resultado)){
			$diciplina=$fila['diciplina'];
			$estado=$fila['estado'];
			$hora=$fila['hora'];
		}
	}
}

$html = "";

$html .= '<input type="hidden" id="id_diciplina" name="id_diciplina" value="'.$id.'">';

$html .= '<form class="form-horizontal" role="form">
	<div class="form-group">
		<label class="col-sm-2 control-label">Disciplina</label>

		<div class="col-sm-10">
			<span class="input-icon">
				<input type="text" id="nuevo_diciplina" name="nuevo_diciplina" value="'.$diciplina.'"/>
				<i class="ace-icon fa fa-leaf blue"></i>
			</span>
		</div>
	</div>

	<div class="space-4"></div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Duración</label>

		<div class="col-sm-10">
			<span class="input-icon">
				<div class="input-group bootstrap-timepicker">
					<input id="id_hora" name="id_hora" type="text" class="form-control" value="'.$hora.'" />
					<span class="input-group-addon">
						<i onclick=timepicker("id_hora"); class="fa fa-clock-o bigger-110"></i>
					</span>
				</div>
			</span>
		</div>
	</div>

	<div class="space-4"></div>

		<div class="form-group">
			<label class="col-sm-2 control-label">Estado</label>

			<div class="col-sm-10">
				<span class="input-icon">
					<div class="radio">
						<label>
							<input type="radio" class="ace" name="estado" id="estadoa" value="true" '.($estado== 't' ? 'checked' : '').' />
							<span class="lbl">Activo</span>
						</label>
						<label>
							<input type="radio" class="ace" name="estado" id="estadoi" value="false" '.($estado== 'f' ? 'checked' : '').' />
							<span class="lbl">Inactivo</span>
						</label>
					</div>
				</span>
			</div>
		</div>

</form>';

$html .= '<button class="btn btn-success" onclick=admDiciplinaGuardar();>Guardar</button>';

/*'Duracion:<input id="id_hora" name="id_hora" class="uk-input uk-form-width-xsmall" type="text" placeholder="hh" value="'.$hora.'">
	<input id="id_minuto" name="id_minuto" class="uk-input uk-form-width-xsmall" type="text" placeholder="mm" value="'.$minuto.'"><br><br>';
$html .= 'Estado: <div class="uk-margin uk-grid-small uk-child-width-auto" uk-grid>'.
		'<label><input class="uk-radio" type="radio" name="estado" id="estadoa" value="true" '.($estado== 't' ? 'checked' : '').'> Activo</label>'.
		'<label><input class="uk-radio" type="radio" name="estado" id="estadoi" value="false" '.($estado== 'f' ? 'checked' : '').'> Inactivo</label>'.
		 '</div>';*/

$html .= '</div>';

echo $html;
pg_close();
?>
