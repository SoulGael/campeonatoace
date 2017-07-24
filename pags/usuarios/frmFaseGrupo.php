<?php

include 'funcion/futbol.php';
include '../conexion.php';
conectarse();

//Recibir los datos ingresados en el formulario
$id = $_POST['id'];
$equipo = "";
$Seleccionados = "";

$cont = 0;
$contCa = 1;

$htmlCabecera = 'FASE DE GRUPOS | <button class="uk-button uk-button-primary  uk-button-small" onclick="admFaseGrupoGuardar()">Guardar</button> <hr class="uk-divider-icon"><ul uk-tab>';
$htmlCuerpo = "<ul class='uk-switcher uk-margin'>";

if(strcmp($id, '-1')!=0){

	$resultadoDiciplina=getDiciplinaCampeonato($id);

	while($filaDiciplina=pg_fetch_array($resultadoDiciplina)){
		$idDiciplina = $filaDiciplina['id_diciplina'];
		$diciplina = $filaDiciplina['diciplina'];

		$htmlCabecera .= "<li><a href='#'>".$diciplina."</a></li>";
		
		$htmlVarones = "";
		$htmlMujeres = "";

		$cont = 0;
		$contCa = 1;
		//$limite = pg_num_rows($resultado);

		$htmlCuerpo .= '<li>'.
						  '<ul uk-tab><li><a href="#">MASCULINO</a></li>'.
						  '<li><a href="#">FEMENINO</a></li></ul><ul class="uk-switcher uk-margin">'.
						
		$htmlVarones .=	'<li><table class="uk-table uk-table-divider">'.
					    '<tbody>';

		$htmlMujeres .=	'<li><table class="uk-table uk-table-divider">'.
					    '<tbody>';

		$resultadoVarones=getEquiposCampeonato($id, $idDiciplina,"true");
		
		$numrows=pg_num_rows($resultadoVarones);

		$modulo=ceil(pg_num_rows($resultadoVarones)/2);
		if ($numrows>11&&$numrows<=13) {
			$modulo = 3;
		}
		
		while($filaVarones=pg_fetch_array($resultadoVarones)){
			$equipo = $filaVarones['equipo'];
			if($cont%$modulo==0){
				$htmlVarones .= '<tr><td class="uk-text-left uk-text-primary">Grupo '.($contCa).'</td></tr>';
				$htmlVarones .= '<tr><td>'. $equipo .'</td></tr>';
				$contCa++;
			}
			else{
				$htmlVarones .= '<tr><td>'. $equipo .'</td></tr>';
			}
			$cont++;	
		}

		$cont = 0;
		$contCa = 1;
		$resultadoMujeres=getEquiposCampeonato($id, $idDiciplina,"false");
		$modulo = ceil(pg_num_rows($resultadoMujeres)/2);
		if ($numrows>11&&$numrows<=13) {
			$modulo = 3;
		}
		
		while($filaMujeres=pg_fetch_array($resultadoMujeres)){
			
			$equipo = $filaMujeres['equipo'];
			if($cont%$modulo==0){
				$htmlMujeres .= '<tr><td class="uk-text-left uk-text-primary">Grupo '.($contCa).'</td></tr>';
				$htmlMujeres .= '<tr><td>'. $equipo .'</td></tr>';
				$contCa++;
			}
			else{
				$htmlMujeres .= '<tr><td>'. $equipo .'</td></tr>';
			}
			$cont++;	
		}
		$htmlVarones .= '</tbody></table></li>';
		$htmlMujeres .= "</tbody></table></li>";
		$htmlCuerpo .= $htmlVarones;
		$htmlCuerpo .= $htmlMujeres."</ul></li>";

	}
		
}
$htmlCabecera .= "</ul>";
$htmlCuerpo .= "</ul>";

//

$html = "";

$html .= $htmlCabecera;

$html .= $htmlCuerpo;
		

echo $html;
pg_close();
?>