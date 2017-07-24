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

$html .= 'DICIPLINAS <hr class="uk-divider-icon">';

$html .= '<div class="uk-margin uk-text-left" >';
$html .= '<input type="hidden" id="id_diciplina" name="id_diciplina" value="'.$id.'">';
$html .= '<input id="nuevo_diciplina" name="nuevo_diciplina" placeholder="Diciplina" class="uk-input uk-form-width-medium uk-form-small" type="text" value="'.$diciplina.'"><br><br>';
$html .= 'Duracion:<input id="id_hora" name="id_hora" class="uk-input uk-form-width-xsmall" type="text" placeholder="hh" value="'.$hora.'"> 
	<input id="id_minuto" name="id_minuto" class="uk-input uk-form-width-xsmall" type="text" placeholder="mm" value="'.$minuto.'"><br><br>';			
$html .= 'Estado: <div class="uk-margin uk-grid-small uk-child-width-auto" uk-grid>'.
		'<label><input class="uk-radio" type="radio" name="estado" id="estadoa" value="true" '.($estado== 't' ? 'checked' : '').'> Activo</label>'.
		'<label><input class="uk-radio" type="radio" name="estado" id="estadoi" value="false" '.($estado== 'f' ? 'checked' : '').'> Inactivo</label>'.
		 '</div>';
$html .= '<button class="uk-button uk-button-primary" onclick="admDiciplinaGuardar()">Guardar</button>';

$html .= '</div>';

echo $html;
pg_close();
?>
