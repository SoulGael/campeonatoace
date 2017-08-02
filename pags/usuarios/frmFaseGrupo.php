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

$htmlCabecera = 'FASE DE GRUPOS | <button class="btn btn-success" onclick="admFaseGrupoGuardar()">Guardar</button> 
				<div class="tabbable"> 
					<ul class="nav nav-tabs padding-12 tab-color-blue background-blue">';

$htmlCuerpo = '<div class="tab-content">';

if(strcmp($id, '-1')!=0){

	$resultadoDiciplina=getDiciplinaCampeonato($id);

	while($filaDiciplina=pg_fetch_array($resultadoDiciplina)){
		$idDiciplina = $filaDiciplina['id_diciplina'];
		$diciplina = $filaDiciplina['diciplina'];

		$htmlCabecera .= '<li><a data-toggle="tab" href="#'.$diciplina.'">'.$diciplina.'</a></li>';
		
		$htmlVarones = "";
		$htmlMujeres = "";

		$cont = 0;
		$contCa = 1;
		//$limite = pg_num_rows($resultado);

		$htmlCuerpo .= '<div id="'.$diciplina.'" class="tab-pane">';
						
		$htmlVarones .=	'<table id="simple-table" class="table  table-bordered table-hover">'.
					    '<tbody>';

		$htmlMujeres .=	'<table id="simple-table" class="table  table-bordered table-hover">'.
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
				$por= rand(0, 84);
				$htmlVarones .= '<tr><td class="red" colspan=2>Grupo '.($contCa).' - VARONES</td></tr>';
				$htmlVarones .= '<tr><td>'. $equipo .'</td><td><div class="progress pos-rel" data-percent="'.$por.'%"><div class="progress-bar" style="width:'.$por.'%;"></div></div></td></tr>';
				$contCa++;
			}
			else{
				$por= rand(0, 84);
				$htmlVarones .= '<tr><td>'. $equipo .'</td><td><div class="progress pos-rel" data-percent="'.$por.'%"><div class="progress-bar" style="width:'.$por.'%;"></div></div></td></tr>';
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
				$por= rand(0, 73);
				$htmlMujeres .= '<tr><td class="pink" colspan=2>Grupo '.($contCa).' - MUJERES</td></tr>';
				$htmlMujeres .= '<tr><td>'. $equipo .'</td><td><div class="progress pos-rel" data-percent="'.rand(0, 100).'%"><div class="progress-bar" style="width:'.$por.'%;"></div></div></td></tr>';
				$contCa++;
			}
			else{
				$por= rand(0, 72);
				$htmlMujeres .= '<tr><td>'. $equipo .'</td><td><div class="progress pos-rel" data-percent="'.rand(0, 100).'%"><div class="progress-bar" style="width:'.$por.'%;"></div></div></td></tr>';
			}
			$cont++;	
		}
		$htmlVarones .= '</tbody></table></li>';
		$htmlMujeres .= "</tbody></table></li>";
		$htmlCuerpo .= $htmlVarones;
		$htmlCuerpo .= $htmlMujeres."</div>";

	}
		
}
$htmlCabecera .= "</ul></div>";
$htmlCuerpo .= "</div>";

//

$html = "";

$html .= $htmlCabecera;

$html .= $htmlCuerpo;

		

echo $html;
pg_close();
?>