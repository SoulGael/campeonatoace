<?php

include '../conexion.php';
include 'funcion/futbol.php';
conectarse();

$id = $_GET['id'];
$res = false;

$cont = 1;
$contCa = 1;

//$limite = pg_num_rows($resultado);

$mensaje = "Ha Ocurrido un Error al Guardar.";

$resultadoDiciplina=getDiciplinaCampeonato($id);

while($filaDiciplina=pg_fetch_array($resultadoDiciplina)){
	$idDiciplina = $filaDiciplina['id_diciplina'];
	$diciplina = $filaDiciplina['diciplina'];

	$resultadoVarones=getEquiposCampeonato($id, $idDiciplina, "true");
	$cont = 1;
	$contCa = 1;
	$modulo = ceil(pg_num_rows($resultadoVarones)/2);
	//$limite = pg_num_rows($resultado);

	while($filaVarones=pg_fetch_array($resultadoVarones)){
		$id_campeonato = $filaVarones['id_campeonato_actual'];
		$id_equipo = $filaVarones['id_equipo'];	
		if($cont%$modulo==0){
			if(faseGrupoGuardar($contCa, $id_campeonato, $id_equipo)){
				$mensaje = "Guardado Correctamente.";
				$res=true;
			}
			$contCa++;
		}
		else{
			if(faseGrupoGuardar($contCa, $id_campeonato, $id_equipo)){
				$res=true;
			}
		}
		$cont++;	
	}

	$resultadoMujeres=getEquiposCampeonato($id, $idDiciplina, "false");
	$cont = 1;
	$contCa = 1;
	$modulo = ceil(pg_num_rows($resultadoMujeres)/2);
	//$limite = pg_num_rows($resultado);

	while($filaMujeres=pg_fetch_array($resultadoMujeres)){
		$id_campeonato = $filaMujeres['id_campeonato_actual'];
		$id_equipo = $filaMujeres['id_equipo'];	
		if($cont%$modulo==0){
			if(faseGrupoGuardar($contCa, $id_campeonato, $id_equipo)){
				$mensaje = "Guardado Correctamente.";
				$res=true;
			}
			$contCa++;
		}
		else{
			if(faseGrupoGuardar($contCa, $id_campeonato, $id_equipo)){
				$res=true;
			}
		}
		$cont++;	
	}
}

$resultadoArray[] = array('msg' => $mensaje, 'res' => $res, 'select' => "id_diciplina,diciplina", 'from' => "vta_diciplina_campeonato", 'where' => " order by diciplina", 'onclick' => "admFaseGrupoForm");
echo $_GET['callback']."(".json_encode($resultadoArray).");";

pg_close();
?>
