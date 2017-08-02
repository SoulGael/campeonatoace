<?php

include '../conexion.php';
include 'funcion/estudiante.php';
conectarse();

$id = $_GET['id'];
$nombres = $_GET["nombre_estudiante"];
$apellidos = $_GET["apellido_estudiante"];
$cedula = $_GET["cedula"];
$sexo = $_GET["sexo"];
$id_carrera = $_GET["cmbCarrera"];
$modalidad = $_GET["modalidad"];
$paralelo = $_GET["paralelo"];

$resultadoArray = array();
$mensaje = "Ha Ocurrido un Error al Guardar.";
if(strcmp($id, '-1')==0){
	if(!estudianteRepetido($cedula)){
		if(estudianteGuardar($nombres, $apellidos, $cedula, $sexo, $id_carrera, $modalidad, $paralelo)){
			$mensaje = "Guardado Correctamente";
			$res=true;
		}
	}else{
		$mensaje = "Cedula Repetida";
		$res=false;
	}	
}
else {
	if(estudianteModificar($id, $nombres, $apellidos, $cedula, $sexo, $id_carrera, $modalidad, $paralelo)){
		$mensaje = "Modificado Correctamente";
		$res = true;
	}
}

$resultadoArray[] = array('msg' => $mensaje, 'res' => $res, 'select' => "id_alumno,razon_social,carrera,nivel", 'head' => "RAZON SOCIAL, CARRERA, NIVEL", 'tamanio' => "50,25,25", 'from' => "vta_alumno_carrera", 'where' => " ", 'onclick' => "activaTab('div2');admEstudianteForm");
echo $_GET['callback']."(".json_encode($resultadoArray).");";

pg_close();
?>
