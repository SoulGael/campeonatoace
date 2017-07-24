<?php

include 'funcion/estudiante.php';
include '../conexion.php';
conectarse();

//Recibir los datos ingresados en el formulario
$id = $_POST['id'];
$nombres = "";
$apellidos = "";
$cedula = "";
$sexo = "t";
$modalidad = "p";
$paralelo = "A";
$id_carrera = "";
$comboCarrera = "";

if(strcmp($id, '-1')!=0){
	$resultado=getEstudiante($id);

	if(pg_num_rows($resultado)!=0){
		if($fila=pg_fetch_array($resultado)){
			$nombres=$fila['nombres'];
			$apellidos=$fila['apellidos'];
			$cedula=$fila['cedula'];
			$sexo=$fila['sexo'];
			$modalidad=$fila['modalidad'];
			$paralelo=$fila['paralelo'];
			$id_carrera=$fila['id_carrera_actual'];
		}
	}
}
//.uk-active
$comboCarrera = equiposCombo($id_carrera);

$html = "";

$html .= "EQUIPOS <hr class='uk-divider-icon'>";

$html .= '<div class="uk-margin uk-text-left" >'.
			'<input type="hidden" id="id_estudiante" name="id_estudiante" value="'.$id.'">'.
			'<ul uk-tab>'.
				'<li ><a href="#">Subir Archivo</a></li>'.
			    '<li><a href="#">Alumnos</a></li>'.			    
			'</ul>'.
			'<ul class="uk-switcher uk-margin">'.
	        	'<li>'.
				     '<div class="uk-margin" uk-margin>'.
				     	//'<form action="usuarios/cargarCsv.php" enctype="multipart/form-data" method="post">'.
				        	'<div uk-form-custom="target: true">'.
				            	'<input id="archivo" name="archivo" type="file" accept=".csv">'.
				            	'<input class="uk-input uk-form-width-medium" type="text" placeholder="Seleccionar Archivo" disabled>'.
				        	'</div>'.
				        	'<button class="uk-button uk-button-default" onclick="uploadAjax()">Subir</button>'.
				        //'</form>'.
				    '</div>'.
	        	'</li>'.
	        	'<li>'.
				    '<table class="uk-table uk-table-justify uk-table-divider">'.
						'<tr><td>Cedula</td><td><input id="cedula_estudiante" name="cedula_estudiante" placeholder="Cedula..." class="uk-input uk-form-width-medium uk-form-small" type="text" value="'.$cedula.'"></td></tr>'.		
						
						'<tr><td>Nombres</td><td><input id="nombre_estudiante" name="nombre" placeholder="Nombres..." class="uk-input uk-form-width-medium uk-form-small" type="text" value="'.$nombres.'"></td></tr>'.
					
					'<tr><td>Apellidos</td><td><input id="apellido_estudiante" name="apellido_estudiante" placeholder="Apellidos..." class="uk-input uk-form-width-medium uk-form-small" type="text" value="'.$apellidos.'"></td></tr>'.
					
					'<tr><td>Sexo: </td><td><div class="uk-margin uk-grid-small uk-child-width-auto" uk-grid>'.
			            '<label><input class="uk-radio" type="radio" name="sexo" id="sexom" value="true" '.($sexo== 't' ? 'checked' : '').'> Masculino</label>'.
			            '<label><input class="uk-radio" type="radio" name="sexo" id="sexof" value="false" '.($sexo== 'f' ? 'checked' : '').'> Femenino</label>'.
			        '</div></td></tr>'.

			        '<tr><td>Modalidad: </td><td><div class="uk-margin uk-grid-small uk-child-width-auto" uk-grid>'.
			            '<label><input class="uk-radio" type="radio" name="modalidad" id="modalidadp" value="p" '.($modalidad== 'p' ? 'checked' : '').'> Presencial</label>'.
			            '<label><input class="uk-radio" type="radio" name="modalidad" id="modalidads" value="s" '.($modalidad== 's' ? 'checked' : '').'> Semi-Presencial</label>'.
			        '</div></td></tr>'.
					
					'<tr><td>Carrera</td><td><div class="uk-margin uk-form-small">'.
						'<select class="uk-select uk-width-1-2@s" name="cmbCarrera" id="cmbCarrera" >';
						$html .= $comboCarrera.
					    '</select>'.
					'</div></td></tr>'.
					'<tr><td>Paralelo</td><td><input id="id_paralelo" name="id_paralelo" placeholder="Paralelo..." class="uk-input uk-form-width-xsmall uk-form-small" type="text" value="'.$paralelo.'"></td></tr>'.
					'</table>'.
					'<hr class="uk-divider-icon">'.
		    		'<button class="uk-button uk-button-primary" onclick="admEstudianteGuardar()">Guardar</button>'.	        
	        	'</li>'.
			'</ul>'.
	    '</div>';

echo $html;
pg_close();
?>