<?php

include '../conexion.php';
include 'funcion/rol.php';
conectarse();

$id = $_GET['id'];
$res = false;

$resultadoArray = array();
$mensaje = "Ha Ocurrido un Error al Guardar.";

if(tarjetaPagar($id)){
	$mensaje = "ok";
	$res=true;
}

$resultadoArray[] = array('msg' => $mensaje, 'res' => $res, 'select' => "id_tarjeta,cedula,razon_social,carrera,nivel,tarjeta,fecha", 'head' => "CEDULA,NOMBRES,CARRERA,NIVEL,TARJETA,FECHA", 'tamanio' => "20,30,20,10,10,10", 'from' => "vta_tarjeta", 'where' => " ", 'onclick' => " activaTab('div2');admTarjetaForm ");
echo $_GET['callback']."(".json_encode($resultadoArray).");";

pg_close();
?>
