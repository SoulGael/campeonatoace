<?php

include '../conexion.php';
include 'funcion/futbol.php';
conectarse();

$id = $_GET['id'];
$id_alumno = $_GET['id_alumno'];
$id_campeonato = $_GET['id_campeonato'];
$tipo = $_GET['tipo'];
$numero = $_GET['numero'];
$res = false;

$resultadoArray = array();
$mensaje = "Ha Ocurrido un Error al Guardar.";

if (strcmp($tipo, "e")==0) {
	if(equipoQuitarJugador($id, $id_alumno, $id_campeonato)){
		$res=true;
		$mensaje = "Guardado Correctamente";
	}else{
		$mensaje = "Usuario Repetido";
		$res=false;
	}
}else{
	if(equipoModificarJugador($id, $id_alumno, $id_campeonato, $numero)){
		$res=true;
		$mensaje = "Guardado Correctamente";
	}else{
		$mensaje = "Usuario Repetido";
		$res=false;
	}
}


$resultadoArray[] = array('msg' => $mensaje, 'res' => $res, 'select' => "id_equipo,equipo,fecha", 'from' => "tbl_equipo", 'where' => " order by id_campeonato_actual", 'onclick' => "admEquipoForm");
echo $_GET['callback']."(".json_encode($resultadoArray).");";

pg_close();
?>
