<?php

include 'funcion/futbol.php';
include '../conexion.php';
conectarse();

//Recibir los datos ingresados en el formulario
$idCampeonato = $_POST['id'];
$fecha = $_POST['fecha'];
$hi = $_POST['hi'];
$mi = $_POST['mi'];
$hf = $_POST['hf'];
$mf = $_POST['mf'];
$equipo = "";
$Seleccionados = "";

$htmlCabecera = 'CALENDARIO |  <button class="btn btn-success" onclick=admCalendarioGuardar(-1);>Guardar</button><div class="tabbable">';
$htmlCuerpo = "<div class='tab-content'>";

//$fechaInicio = date('Y-m-d H:i', strtotime("$fecha $hi:$mi + 1 day + 1 hour"));
//$fechaFin = date('Y-m-d H:i', strtotime("$fecha $hf:$mf + 1 day + 1 hour"));

$fechaInicio = date('Y-m-d H:i', strtotime("$fecha $hi:$mi "));
$fechaFin = date('Y-m-d H:i', strtotime("$fecha $hf:$mf - 1 hour"));
$contHoras=0;
$contMinutos=0;

if(strcmp($idCampeonato, '-1')!=0){

	$resultadoDiciplina=getDiciplinaCampeonato($idCampeonato);

	while($filaDiciplina=pg_fetch_array($resultadoDiciplina)){
		$idDiciplina = $filaDiciplina['id_diciplina'];
		$diciplina = $filaDiciplina['diciplina'];
		$hora = $filaDiciplina['hora'];

		list($hora, $minuto, $s) = explode(':', $hora);

		$htmlCabecera .= "<li><a data-toggle='tab' href='#".$diciplina."'>".$diciplina."</a></li>";
		
		$htmlVarones = "";
		$htmlMujeres = "";

		$htmlCuerpo .= '<div id='.$diciplina.' class="tab-pane">'.
						  '<ul uk-tab><li><a href="#">MASCULINO</a></li>'.
						  '<li><a href="#">FEMENINO</a></li></ul><ul class="uk-switcher uk-margin">';
						
		$htmlVarones .=	'<li><table class="uk-table uk-table-divider">'.
					    '<tbody>';

		$htmlMujeres .=	'<li><table class="uk-table uk-table-divider">'.
					    '<tbody>';

		for ($i=1;  ; $i++) {
			$resultadoVarones=getArrayGrupo($idCampeonato, $i, $idDiciplina,"true");
			$arrayVarones = explode( ',', $resultadoVarones );

			if($resultadoVarones== "-1"){
				break;
			}else {
				
				
				
				//$htmlVarones .= '<tr><td>'. $fechaInicio .'</td></tr>';
				$htmlVarones .= '<tr class="uk-text-left"><td><h3>Grupo: '. $i.'</h3></td></tr>';

				for ($j=0; $j <count($arrayVarones) ; $j++) { 
					for ($k=$j+1; $k < (count($arrayVarones)) ; $k++) {
						
						$equipoa=getNombreEquipo($arrayVarones[$j]);
						$equipob=getNombreEquipo($arrayVarones[$k]);
						if($fechaInicio>$fechaFin){

							$fechaInicio = date('Y-m-d H:i', strtotime("$fechaInicio + 1 day - $contHoras hour - $minuto minutes"));
							$fechaFin = date('Y-m-d H:i', strtotime("$fechaFin + 1 day"));
							$diaLaborable=date('w',strtotime($fechaInicio));
							while (strcmp($diaLaborable, '0')==0||strcmp($diaLaborable, '6')==0) {
								$fechaInicio = date('Y-m-d H:i', strtotime("$fechaInicio + 1 day"));
								$fechaFin = date('Y-m-d H:i', strtotime("$fechaFin + 1 day"));
								$diaLaborable=date('w',strtotime($fechaInicio));
							}
							$contHoras=0;
							$contMinutos=0;
						}
						$htmlVarones .= '<tr class="uk-text-left" onclick=admFichaControl('.$arrayVarones[$j].','.$arrayVarones[$k].')><td>'. $equipoa .' vs '.$equipob.' ->'.$fechaInicio.'</td></tr>';
						$fechaInicio = date('Y-m-d H:i', strtotime("$fechaInicio + $hora hour + $minuto minutes"));
						$contHoras++;
						$contMinutos++;
					}					
				}
				//$fechaInicio = date('Y-m-d H:i', strtotime("$fechaInicio + 1 day - $contHoras hour"));
				//$fechaFin = date('Y-m-d H:i', strtotime("$fechaFin + 1 day"));
				//$contHoras=0;
			}
		}



		

		/*foreach ($resultadoVarones as $valor) {
			$htmlVarones .= '<tr><td>'. $valor .'</td></tr>';
		}*/

		for ($i=1;  ; $i++) {
			$resultadoMujeres=getArrayGrupo($idCampeonato, $i, $idDiciplina,"false");
			$arrayMujeres = explode( ',', $resultadoMujeres );
			if($resultadoMujeres== "-1"){
				break;
			}else {
				$htmlMujeres .= '<tr class="uk-text-left"><td><h4>Grupo '. $i.'</h4></td></tr>';

				for ($j=0; $j < count($arrayMujeres) ; $j++) { 
					for ($k=$j+1; $k < (count($arrayMujeres)) ; $k++) {
						$equipoa=getNombreEquipo($arrayMujeres[$j]);
						$equipob=getNombreEquipo($arrayMujeres[$k]);
						if($fechaInicio>$fechaFin){

							$fechaInicio = date('Y-m-d H:i', strtotime("$fechaInicio + 1 day - $contHoras hour - $minuto minutes"));
							$fechaFin = date('Y-m-d H:i', strtotime("$fechaFin + 1 day"));
							$diaLaborable=date('w',strtotime($fechaInicio));
							while (strcmp($diaLaborable, '0')==0||strcmp($diaLaborable, '6')==0) {
								$fechaInicio = date('Y-m-d H:i', strtotime("$fechaInicio + 1 day"));
								$fechaFin = date('Y-m-d H:i', strtotime("$fechaFin + 1 day"));
								$diaLaborable=date('w',strtotime($fechaInicio));
							}
							$contHoras=0;
							$contMinutos=0;
						}
						$htmlMujeres .= '<tr class="uk-text-left"><td>'. $equipoa .' vs '.$equipob.' ->'.$fechaInicio.'</td></tr>';
						$fechaInicio = date('Y-m-d H:i', strtotime("$fechaInicio + $hora hour + $minuto minutes"));
						$contHoras++;
						$contMinutos++;
					}
					
				}
				//$fechaInicio = date('Y-m-d H:i', strtotime("$fechaInicio + 1 day - $contHoras hour"));
				//$fechaFin = date('Y-m-d H:i', strtotime("$fechaFin + 1 day"));
				//$contHoras=0;
				
			}
		}		
		
		/*foreach ($resultadoMujeres as $valor) {
			$htmlMujeres .= '<tr><td>'. $valor .'</td></tr>';
		}*/

		$htmlVarones .= '</tbody></table></li>';
		$htmlMujeres .= "</tbody></table></li>";
		$htmlCuerpo .= $htmlVarones.'</div>';
		$htmlCuerpo .= $htmlMujeres."</ul></li>";

	}
		
}
$htmlCabecera .= "</ul</div>";
$htmlCuerpo .= "</div>";

//
ini_set('max_execution_time', 300);

$html = "";

$html .= $htmlCabecera;

$html .= $htmlCuerpo;
		

echo $html;
pg_close();
?>