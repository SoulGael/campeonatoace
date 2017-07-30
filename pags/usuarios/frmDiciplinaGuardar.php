<?php

include '../conexion.php';
include 'funcion/rol.php';
conectarse();

$id = $_GET['id'];
$estado = $_GET['estado'];
$diciplina = $_GET['diciplina'];
$hora = $_GET['hora'];

$res = false;

$resultadoArray = array();
$mensaje = "Ha Ocurrido un Error al Guardar.";
if(strcmp($id, '-1')==0){
	if(!diciplinaRepetido($diciplina)){
		if(diciplinaGuardar($diciplina, $hora)){
			$mensaje = "Guardado Correctamente";
			$res=true;
		}
	}else{
		$mensaje = "Nombre Diciplina Repetido";
		$res=false;
	}
}
else {
	if(diciplinaModificar($id, $diciplina, $estado, $hora)){
		$mensaje = "Modificado Correctamente";
		$res = true;
	}
}

$resultadoArray[] = array('msg' => $mensaje, 'res' => $res, 'select' => "id_diciplina,diciplina,hora,txt_estado", 'head' => "DICIPLINA, DURACION ESTIMADA, ESTADO", 'tamanio' => "40,30,30", 'from' => "vta_diciplina", 'where' => " order by diciplina", 'onclick' => "activaTab('div2');admDiciplinaForm");
echo $_GET['callback']."(".json_encode($resultadoArray).");";

pg_close();
?>
