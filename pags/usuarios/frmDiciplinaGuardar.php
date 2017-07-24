<?php

include '../conexion.php';
include 'funcion/rol.php';
conectarse();

$id = $_GET['id'];
$estado = $_GET['estado'];
$diciplina = $_GET['diciplina'];
$hora = $_GET['hora'];
$minuto = $_GET['minuto'];

$res = false;

$resultadoArray = array();
$mensaje = "Ha Ocurrido un Error al Guardar.";
if(strcmp($id, '-1')==0){
	if(!diciplinaRepetido($diciplina)){
		if(diciplinaGuardar($diciplina, $hora, $minuto)){
			$mensaje = "Guardado Correctamente";
			$res=true;
		}
	}else{
		$mensaje = "Nombre Diciplina Repetido";
		$res=false;
	}	
}
else {
	if(diciplinaModificar($id, $diciplina, $estado, $hora, $minuto)){
		$mensaje = "Modificado Correctamente";
		$res = true;
	}
}

$resultadoArray[] = array('msg' => $mensaje, 'res' => $res, 'select' => "id_diciplina,diciplina, txt_estado", 'from' => "vta_diciplina", 'where' => " order by diciplina", 'onclick' => "admDiciplinaForm");
echo $_GET['callback']."(".json_encode($resultadoArray).");";

pg_close();
?>
