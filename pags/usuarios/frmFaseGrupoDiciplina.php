<?php

include 'funcion/futbol.php';
include '../conexion.php';
conectarse();

//Recibir los datos ingresados en el formulario
$id = $_POST['id'];
$idCampeonato = $_POST['idCampeonato'];

$html = "<ul uk-tab>";
	$html .= "<li><a href='#'>HOMBRES</a></li>";
	$html .= "<li><a href='#'>MUJERES</a></li>";
$html .= "</ul>";

$html .= "<ul class='uk-switcher uk-margin'>";
$html .= "<li>";

$resultadoVarones=getEquiposCampeonato($idCampeonato, $id,"true");
	$html .= '<ul uk-accordion>';
	while($filaVarones=pg_fetch_array($resultadoVarones)){
		$idequipo = $filaVarones['id_equipo'];
		$equipo = $filaVarones['equipo'];
		$html .= "<li>";
		$html .= '<h3 class="uk-accordion-title uk-text-left">'.$equipo.'</h3>';
		$html .= '<div class="uk-accordion-content"><table class="uk-table uk-table-divider"><tbody>';
		
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
		$html .= '</tbody></table></div></li>';
		
	}
	$html .= '</ul></li>';

$html .= "<li>";
$resultadoMujeres=getEquiposCampeonato($idCampeonato, $id,"false");
	$html .= '<ul uk-accordion>';
	while($filaMujeres=pg_fetch_array($resultadoMujeres)){
		$equipo = $filaMujeres['equipo'];
		$html .= "<li>";
		$html .= '<h3 class="uk-accordion-title uk-text-left">'.$equipo.'</h3>';
		$html .= '<div class="uk-accordion-content">';
		
		$resultadoEquiposM=getSeleccionados($idequipo);
		while($filaEquiposM=pg_fetch_array($resultadoEquiposM)){
			$nombre =  $filaEquiposM['razon_social'];
			$cedula =  $filaEquiposM['cedula'];
			$num_camiseta =  $filaEquiposM['num_camiseta'];
			$html .= '<hr class="uk-divider-icon"><div class="uk-column-1-1@s uk-column-1-2@m uk-column-1-3@l">
						<p class="uk-text-left">'.$cedula.'</p>
						<p class="uk-text-left">'.$nombre.'</p>
						<p>'.$num_camiseta.'</p>
					  </div>';
		}
		$html .= '</div></li>';
	}

$html .= "</ul></li></ul>";
echo $html;
pg_close();
?>