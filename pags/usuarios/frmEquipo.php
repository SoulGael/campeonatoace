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
			$Seleccionados .= '<tr><td>'.$al.'</td>'.
				'<td><input class="uk-input uk-form-width-xsmall" type="text" placeholder="Nro" id="camiseta_'.$id_al.'" name="camiseta_'.$id_al.'" value='.$num.'></td> '.
				'<td><div class="uk-button-group">
				        <button class="uk-button uk-button-secondary uk-button-small" onclick="admJugadorQuitar('.$id.','.$id_al.','.$id_ca.',\'m\')">Modificar</button>
				        <button class="uk-button uk-button-danger uk-button-small" onclick="admJugadorQuitar('.$id.','.$id_al.','.$id_ca.',\'e\')">Eliminar</button>
				    </div></td>'.
				'</tr>';
		}
		$Seleccionados .= '</tbody>';
	}
}
//.uk-active
$comboCarrea = equiposCombo($carrera);
$comboCampeonato = getCampeonatoEstado($id_campeonato, "true");
$comboDiciplina = diciplinaCombo($diciplina);

$html = "";

$html .= "EQUIPOS <hr class='uk-divider-icon'>";

$html .= '<div class="uk-margin uk-text-left" >'.
			'<input type="hidden" id="id_futbol" name="id_futbol" value="'.$id.'">'.
			'<ul uk-tab>'.
			    '<li><a href="#">Creacion de Equipo</a></li>'.
			    '<li ><a href="#">Jugadores Seleccionados</a></li>'.
			'</ul>'.
			'<ul class="uk-switcher uk-margin">'.
			    '<li><table class="uk-table uk-table-hover uk-table-small uk-table-middle uk-table-divider">'.
			    		'<tr><td>Nombre del Equipo: </td><td><input id="nuevo_equipo" name="nuevo_equipo" placeholder="Equipo..." class="uk-input uk-form-width-medium uk-form-small" type="text" value="'.$equipo.'"></td></tr>'.
						'<tr><td>Campeonato: </td><td><div class="uk-margin uk-form-small">'.
				            '<select class="uk-select" name="cmbCampeonato" id="cmbCampeonato" onchange="cargarDiciplinaEquipo()">';
							$html .= $comboCampeonato.
				            '</select>'.
				        '</div></td></tr>'.
				        '<tr><td>Genero: </td><td><div class="uk-margin uk-grid-small uk-child-width-auto" uk-grid>'.
				            '<label><input class="uk-radio" type="radio" name="sexo" id="sexom" value="true" '.($sexo== 't' ? 'checked' : '').'> Masculino</label>'.
				            '<label><input class="uk-radio" type="radio" name="sexo" id="sexof" value="false" '.($sexo== 'f' ? 'checked' : '').'> Femenino</label>'.
				        '</div></td></tr>'.
				         '<tr><td>Modalidad: </td><td><div class="uk-margin uk-grid-small uk-child-width-auto" uk-grid>'.
				            '<label><input class="uk-radio" type="radio" name="modalidad" onclick=cargarCarreraEquipo(); id="modalidadp" value="p" '.($modalidad== 'p' ? 'checked' : '').'> Presencial</label>'.
				            '<label><input class="uk-radio" type="radio" name="modalidad" onclick=cargarCarreraEquipo(); id="modalidads" value="s" '.($modalidad== 's' ? 'checked' : '').'> Semi-Presencial</label>'.
				        '</div></td></tr>'.
				        '<tr><td>Diciplina: </td><td><div class="uk-margin uk-form-small">'.
				            '<select class="uk-select" name="cmbDiciplina" id="cmbDiciplina">';
							$html .= $comboDiciplina.
				            '</select>'.
				        '</div><td></tr>'.
						'<tr><td>Carrera: </td><td><div class="uk-margin uk-form-small">'.
				            '<select class="uk-select" name="cmbCarrea" id="cmbCarrea" onchange="cargarCarrera()">';
							$html .= $comboCarrea.
				            '</select>'.
				        '</div><td></tr>'.
				        '<tr><td colspan=2><div id="divEquipos"></div></td></tr>'.
			        	'<tr><td colspan=2><button class="uk-button uk-button-primary" onclick="admFutbolGuardar()">Guardar</button></td></tr>'.
			     '</table></li>'.
			    '<li>'.
				    '<table class="uk-table uk-table-hover uk-table-middle uk-table-small uk-table-divider">'.$Seleccionados.'</table>'.
	        	'</li>'.
			'</ul>'.
	        
	    '</div>';

echo $html;
pg_close();
?>