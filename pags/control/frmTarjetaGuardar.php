<?php

include '../conexion.php';
include 'funcion/equipos.php';
conectarse();

$id = $_GET['id'];
$id_alumno = $_GET['id_alumno'];
$tipo = $_GET['tipo'];

$res = false;

$resultadoArray = array();
$mensaje = "Ha Ocurrido un Error al Guardar.";

if(strcmp($tipo, "pagar")==0){
	if(tarjetaPagar($id)){
		$mensaje = "ok";
		$res=true;
	}

}else{
	if(tarjetaGuardar($id, $id_alumno, $tipo)){
		$mensaje = "ok";
		$res=true;
	}
}


$resultadoArray[] = array('msg' => $mensaje, 'res' => $res, 'select' => "id_rol,rol", 'head' => "ROL", 'tamanio' => "100", 'from' => "tbl_rol", 'where' => " order by rol", 'onclick' => "activaTab('div2');admRolForm");
echo $_GET['callback']."(".json_encode($resultadoArray).");";

pg_close();
?>
