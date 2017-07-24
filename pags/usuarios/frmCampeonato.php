<?php

include 'funcion/rol.php';
include '../conexion.php';
conectarse();

//Recibir los datos ingresados en el formulario
$id = $_POST['id'];
$campeonato = "";
$f_inicio = "";
$f_inscripcion = "";
$ch = "";
$cm = "";
$c_equipos = "";
$v_inscripcion = "";
$v_garantia = "";
$d_habilitantes = "";
$f_inauguracion = "";
$p_equipos = "";
$m_control = "";
$arbitraje = "";
$coorDiciplina = "";
$contacto = "";

$diciplina = "";

if(strcmp($id, '-1')!=0){
	$resultado=getCampeonato($id);

	if(pg_num_rows($resultado)!=0){
		if($fila=pg_fetch_array($resultado)){
			$campeonato = $fila['campeonato'];
			$f_inicio = $fila['fecha_inicio'];
			$f_inscripcion = $fila['fecha_max_inscripcion'];
			$ch = $fila['varones'];
			$cm = $fila['damas'];
			$c_equipos = $fila['conformacion_equipos'];
			$v_inscripcion = $fila['valor_ins'];
			$v_garantia = $fila['valor_gar'];
			$d_habilitantes = $fila['doc_habilitantes'];
			$f_inauguracion = $fila['fecha_inauguracion'];
			$p_equipos = $fila['presentacion_equipos'];
			$m_control = $fila['mesa_control'];
			$arbitraje = $fila['arbitraje'];
			$coorDiciplina = $fila['coor_diciplina'];
			$contacto = $fila['contacto_sugerencia'];
		}
	}
}

$diciplina=getDiciplina($id);

$c_equipos=str_replace('<br>', "\r\n", $c_equipos);
$d_habilitantes=str_replace('<br>', "\r\n", $d_habilitantes);
$m_control=str_replace('<br>', "\r\n", $m_control);
$arbitraje=str_replace('<br>', "\r\n", $arbitraje);
$coorDiciplina=str_replace('<br>', "\r\n", $coorDiciplina);
$contacto=str_replace('<br>', "\r\n", $contacto);
$p_equipos=str_replace('<br>', "\r\n", $p_equipos);


$html = "";

$html .= "CAMPEONATO <hr class='uk-divider-icon'>";
$html .= '<div class="uk-margin uk-text-left uk-overflow-auto" >'.
			'<input type="hidden"  id="id_campeonato" name="id_campeonato" value="'.$id.'">'.
			'<table class="uk-table uk-table-small uk-table-divider">'.
			'<tr class="uk-align-center"><td coslpan="2">SOCIALIZACIÓN</td></tr>'.
			'<tr><td class="uk-table-shrink uk-text-nowrap">Nombre Campeonato</td><td><input type="text" id="nombre_campeonato" name="nombre_campeonato" class="uk-input uk-form-width-medium uk-form-small" placeholder="Campeonato" value="'.$campeonato.'"></td></tr>'.
			'<tr><td class="uk-table-shrink uk-text-nowrap">Fecha Inicio: </td><td><input type="text" id="f_inicio" name="f_inicio" value="'.$f_inicio.'" placeholder="dd/mm/YYYY..." class="uk-input uk-form-width-medium uk-form-small"></td></tr>'.
			'<tr><td class="uk-table-shrink uk-text-nowrap">Fecha Maxima de Inscripcion: </td><td><input type="text" id="f_inscripcion" name="f_inscripcion" value="'.$f_inscripcion.'" placeholder="dd/mm/YYYY..." class="uk-input uk-form-width-medium uk-form-small"></td></tr>'.
	        '<tr><td>Diciplinas</td><td><table class="uk-table uk-table-hover uk-table-middle uk-table-divider">'.$diciplina.'</table></td></tr>'.	        
	        '<tr><td>Categorias</td><td>'.
		        '<div class="uk-margin uk-grid-small uk-child-width-auto" uk-grid>'.
	            '<label><input class="uk-checkbox check" name="ch" id="ch" type="checkbox" value="1" '.($ch== 't' ? 'checked' : '').'> Hombres</label>'.
	            '<label><input class="uk-checkbox check" name="cm" id="cm" type="checkbox" value="2" '.($cm== 't' ? 'checked' : '').'> Mujeres</label>'.
	        '</div>'.
	        '</td></tr>'.	        
	        '<tr><td>Conformacion de Equipos </td><td><textarea id="c_equipos" name="c_equipos" placeholder="El equipo puede estar conformado..." class="uk-textarea" >'.$c_equipos.'</textarea></td></tr>'.
	        
	        '<tr><td coslpan="2">REQUISITOS</td></tr>'.
	        '<tr><td>Valor de Inscripcion </td><td><input type="text" id="v_inscripcion" name="v_inscripcion" value="'.$v_inscripcion.'" placeholder="Valor Inscripcion..." class="uk-input uk-form-width-medium uk-form-small"  ></td></tr>'.
	        '<tr><td>Valor Garantia </td><td><input type="text" id="v_garantia" name="v_garantia" value="'.$v_garantia.'" placeholder="Valor Garantia..." class="uk-input uk-form-width-medium uk-form-small"  ></td></tr>'.
	        '<tr><td>Documentos Habilitantes </td><td><textarea id="d_habilitantes" name="d_habilitantes" placeholder="1.- Ficha de Inscripcripcion...." class="uk-textarea" >'.$d_habilitantes.'</textarea></td></tr>'.
	        
	        '<tr><td coslpan="2">DE LA INAUGURACION</td></tr>'.
	        '<tr><td>Fecha de Inauguracion: </td><td><input type="text" id="f_inauguracion" name="f_inauguracion" value="'.$f_inauguracion.'" placeholder="dd/mm/YYYY..." class="uk-input uk-form-width-medium uk-form-small"></td></tr>'.
	        '<tr><td>Presentacion de Equipos</td><td><textarea id="p_equipos" name="p_equipos" placeholder="Los equipos deberan..." class="uk-textarea" >'.$p_equipos.'</textarea></td></tr>'.

	        '<tr><td coslpan="2" >Datos Importantes Adicionales</td></tr>'.
	        '<tr><td>Mesa de Control</td><td><textarea id="m_control" name="m_control" placeholder="Se designara de forma..." class="uk-textarea" >'.$m_control.'</textarea></td></tr>'.
	        '<tr><td>Arbitraje</td><td><textarea id="arbitraje" name="arbitraje" placeholder="El valor de USD..." class="uk-textarea" >'.$arbitraje.'</textarea></td></tr>'.
	        '<tr><td>Coordinadores por Diciplina</td><td><textarea id="coorDiciplina" name="coorDiciplina" placeholder="Lcd. Ing. Dr." class="uk-textarea" >'.$coorDiciplina.'</textarea></td></tr>'.
	        '<tr><td>Contacto, sugerencia e inquietudes</td><td><textarea id="contacto" name="contacto" placeholder="direccion@uniandes.edu.ec" class="uk-textarea" >'.$contacto.'</textarea></td></tr>'.

	        '</table>'.
	        '<hr class="uk-divider-icon">'.
	        '<button class="uk-button uk-button-primary" onclick="admCampeonatoGuardar()">Guardar</button>'.
	    '</div>';

echo $html;
pg_close();
?>