<?php

include '../conexion.php';
include 'funcion/futbol.php';
conectarse();

$idCampeonato = $_GET['id'];
$fecha = $_GET['fecha'];
$hi = $_GET['hi'];
$mi = $_GET['mi'];
$hf = $_GET['hf'];
$mf = $_GET['mf'];


$fechaInicio = date('Y-m-d H:i', strtotime("$fecha $hi:$mi "));
$fechaFin = date('Y-m-d H:i', strtotime("$fecha $hf:$mf - 1 hour"));
$contHoras=0;
$contMinutos=0;

$resultadoArray = array();
$res = false;
$mensaje = "Ha Ocurrido un Error al Guardar.";
if(strcmp($idCampeonato, '-1')!=0){
	$resultadoDiciplina=getDiciplinaCampeonato($idCampeonato);

	while($filaDiciplina=pg_fetch_array($resultadoDiciplina)){
		$idDiciplina = $filaDiciplina['id_diciplina'];
		$diciplina = $filaDiciplina['diciplina'];
		$hora = $filaDiciplina['hora'];
		$minuto = $filaDiciplina['minuto'];

		for ($i=1;  ; $i++) {
			$resultadoVarones=getArrayGrupo($idCampeonato, $i, $idDiciplina,"true");
			$arrayVarones = explode( ',', $resultadoVarones );

			if($resultadoVarones== "-1"){
				break;
			}else {

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
						if(calendarioGuardar($arrayVarones[$j], $arrayVarones[$k], $fechaInicio)){
							$res = true;
							$mensaje = "Guardado Correctamente";
						}
						$fechaInicio = date('Y-m-d H:i', strtotime("$fechaInicio + $hora hour + $minuto minutes"));
						$contHoras++;
						$contMinutos++;
					}					
				}
			}
		}

		for ($i=1;  ; $i++) {
			$resultadoMujeres=getArrayGrupo($idCampeonato, $i, $idDiciplina,"false");
			$arrayMujeres = explode( ',', $resultadoMujeres );
			if($resultadoMujeres== "-1"){
				break;
			}else {

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
						if(calendarioGuardar($arrayMujeres[$j], $arrayMujeres[$k], $fechaInicio)){
							$res = true;
							$mensaje = "Guardado Correctamente";
						}
						$fechaInicio = date('Y-m-d H:i', strtotime("$fechaInicio + $hora hour + $minuto minutes"));
						$contHoras++;
						$contMinutos++;
					}
					
				}
			}
		}		
	}
}

ini_set('max_execution_time', 300);

$resultadoArray[] = array('msg' => $mensaje, 'res' => $res, 'select' => "id_campeonato,campeonato", 'from' => "tbl_campeonato", 'where' => " order by id_campeonato", 'onclick' => "admCampeonatoForm");
echo $_GET['callback']."(".json_encode($resultadoArray).");";

pg_close();
?>
