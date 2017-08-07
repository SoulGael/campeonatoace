<?php

include '../conexion.php';
include 'funcion/equipos.php';
conectarse();

$id = $_GET['id'];
$golesA = $_GET['golesA'];
$golesB = $_GET['golesB'];
$checkA = $_GET['checkA'];
$checkB = $_GET['checkB'];

$res = false;

$resultadoArray = array();
$mensaje = "Ha Ocurrido un Error al Guardar.";
if(!fichaRepetido($id)){
	if(fichaGuardar($id, $golesA, $golesB, $checkA, $checkB)){
		$mensaje = "Guardado Correctamente";
		$res=true;
	}
}else{
	$mensaje = "El juego ya esta guardado";
	$res=false;
}


$resultadoArray[] = array('msg' => $mensaje, 'res' => $res, 'select' => "id_rol,rol", 'head' => "ROL", 'tamanio' => "100", 'from' => "tbl_rol", 'where' => " order by rol", 'onclick' => "activaTab('div2');admRolForm");
echo $_GET['callback']."(".json_encode($resultadoArray).");";

pg_close();
?>
