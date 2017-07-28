<?php

include '../conexion.php';
include 'funcion/rol.php';
conectarse();

$id = $_POST['id'];
$idRol = $_POST['idRol'];
$diciplina = "";
$hora = "";
$minuto = "";
$estado = "t";

//Verificar si los datos son nuevos
if(strcmp($id, '-1')!=0){
	$resultado=getDiciplinas($id);

	if(pg_num_rows($resultado)!=0){
		if($fila=pg_fetch_array($resultado)){
			$diciplina=$fila['diciplina'];
			$estado=$fila['estado'];
			$hora=$fila['hora'];
			$minuto=$fila['minuto'];
		}
	}
}

$html = "";

$html .= '<input type="hidden" id="id_diciplina" name="id_diciplina" value="'.$id.'">';

$html .= '<div class="row"><div class="form-group">
						<label class="col-sm-1 control-label no-padding-right">Diciplina</label>
						<div class="col-sm-11">
							<span class="input-icon input-icon-right">
								<input id="nuevo_diciplina" name="nuevo_diciplina" placeholder="Diciplina" type="text" id="form-field-icon-2" value="'.$diciplina.'"/>
								<i class="ace-icon fa fa-leaf green"></i>
							</span>
						</div>
					</div><div class="space-4"></div>';
$html .= '<div class="form-group">
						<label class="col-sm-1 control-label no-padding-right">Diciplina</label>
						<div class="col-sm-11">
							<span class="input-icon input-icon-right">
								<input id="nuevo_diciplina" name="nuevo_diciplina" placeholder="Diciplina" type="text" id="form-field-icon-2" value="'.$diciplina.'"/>
								<i class="ace-icon fa fa-leaf green"></i>
							</span>
						</div>
					</div></div>';

/*$html .= '<div class="tab-content" ><div class="input-group bootstrap-timepicker">
						<input id="timepicker1" type="text" class="form-control" />
						<span class="input-group-addon">
							<i class="fa fa-clock-o bigger-110"></i>
						</span>
					</div>
Duracion:<input id="id_hora" name="id_hora" class="uk-input uk-form-width-xsmall" type="text" placeholder="hh" value="'.$hora.'">
	<input id="id_minuto" name="id_minuto" class="uk-input uk-form-width-xsmall" type="text" placeholder="mm" value="'.$minuto.'"><br><br>';
$html .= 'Estado: <div class="uk-margin uk-grid-small uk-child-width-auto" uk-grid>'.
		'<label><input class="uk-radio" type="radio" name="estado" id="estadoa" value="true" '.($estado== 't' ? 'checked' : '').'> Activo</label>'.
		'<label><input class="uk-radio" type="radio" name="estado" id="estadoi" value="false" '.($estado== 'f' ? 'checked' : '').'> Inactivo</label>'.
		 '</div>';
$html .= '<button class="uk-button uk-button-primary" onclick="admDiciplinaGuardar()">Guardar</button>';

$html .= '</div>';*/

echo $html;
pg_close();
?>
