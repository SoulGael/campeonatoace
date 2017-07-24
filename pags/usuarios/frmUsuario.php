<?php

include 'funcion/rol.php';
include '../conexion.php';
conectarse();

//Recibir los datos ingresados en el formulario
$id = $_POST['id'];
$idRol = "";
$usuario = "";
$estado = "t";

if(strcmp($id, '-1')!=0){
	$resultado=getUsuarios($id);

	if(pg_num_rows($resultado)!=0){
		if($fila=pg_fetch_array($resultado)){
			$idRol=$fila['id_rol'];
			$usuario=$fila['alias'];
			$estado=$fila['estado'];
		}
	}
}

$combo = rolcombo($idRol);

$html = "";

$html .= "USUARIOS <hr class='uk-divider-icon'>";

$html .= '<div class="uk-margin uk-text-left" >'.
			'<div class="uk-margin uk-form-small">'.
			            '<select class="uk-select  uk-width-1-2@s" name="cmbRol" id="cmbRol">';
$html .= $combo.
			            '</select>'.
			        '</div>'.
			'<input type="hidden" id="id_usuario" name="id_usuario" value="'.$id.'">'.
	        '<input id="nuevo_usuario" name="nuevo_usuario" placeholder="Usuario" class="uk-input uk-form-width-medium uk-form-small" type="text" value="'.$usuario.'"><br><br>'.
	        '<input id="nuevo_clave" placeholder="Contraseña" name="nuevo_clave" class="uk-input uk-form-width-medium uk-form-small" type="password" ">'.
	        '<div class="uk-margin uk-grid-small uk-child-width-auto" uk-grid>'.
				'<label><input class="uk-radio" type="radio" name="estado" id="estadot" value="true" '.($estado== 't' ? 'checked' : '').'> Activo</label>'.
				'<label><input class="uk-radio" type="radio" name="estado" id="estadof" value="false" '.($estado== 'f' ? 'checked' : '').'> Inactivo</label>'.
			'</div>'.
	        '<hr class="uk-divider-icon">'.
	        '<button class="uk-button uk-button-primary" onclick="admUsuarioGuardar()">Guardar</button>'.
	    '</div>';

echo $html;
pg_close();
?>