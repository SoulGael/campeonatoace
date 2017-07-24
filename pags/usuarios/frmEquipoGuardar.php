<?php

include '../conexion.php';
include 'funcion/futbol.php';
conectarse();

$id = $_GET['id'];
$nuevo_equipo = $_GET['nuevo_equipo'];
$cmbCampeonato = $_GET['cmbCampeonato'];
$cmbCarrera = $_GET['cmbCarrea'];
$cmbDiciplina = $_GET['cmbDiciplina'];
$idsAlumnos = $_GET['ids'];
$idsNumero = $_GET['idsNum'];
$genero = $_GET['genero'];
$modalidad = $_GET['modalidad'];

$res = false;

$resultadoArray = array();
$mensaje = "Ha Ocurrido un Error al Guardar.";
if(strcmp($id, '-1')==0){
	//if(!equipoFultbolRepetido($nuevo_equipo)){
	if(equipoGuardar($nuevo_equipo,$cmbCampeonato,$cmbCarrera,$idsAlumnos,$cmbDiciplina,$idsNumero,$genero,$modalidad)){
		$res=true;
		$mensaje = "Guardado Correctamente";
	}else{
		$mensaje = "Ha ocurrido un Error";
		$res=false;
	}
}
else {
	if(equipoModificar($id,$nuevo_equipo,$cmbCampeonato,$cmbCarrera,$idsAlumnos,$cmbDiciplina,$idsNumero,$genero,$modalidad)){
		$mensaje = "Modificado Correctamente";
		$res = true;
	}
	else{
		$mensaje = "Ha ocurrido un Error";
		$res=false;
	}
}

$resultadoArray[] = array('msg' => $mensaje, 'res' => $res, 'select' => "id_equipo,equipo, diciplina, txt_genero", 'from' => "vta_equipo_solo", 'where' => " order by diciplina, genero", 'onclick' => "admEquipoForm");
echo $_GET['callback']."(".json_encode($resultadoArray).");";

pg_close();
?>
