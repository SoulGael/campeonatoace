<?php

include '../conexion.php';
include 'funcion/rol.php';
conectarse();

$id = $_GET['id'];
$rol = $_GET['nuevo_rol'];
$res = false;

$resultadoArray = array();
$mensaje = "Ha Ocurrido un Error al Guardar.";
if(strcmp($id, '-1')==0){
	if(!rolRepetido($rol)){
		if(rolGuardar($rol)){
			$mensaje = "Guardado Correctamente";
			$res=true;
		}
	}else{
		$mensaje = "Rol Repetido";
		$res=false;
	}	
}
else {
	if(rolModificar($id, $rol)){
		$mensaje = "Modificado Correctamente";
		$res = true;
	}
}

$resultadoArray[] = array('msg' => $mensaje, 'res' => $res, 'select' => "id_rol,rol", 'head' => ",ROL", 'tamanio' => ",100", 'from' => "tbl_rol", 'where' => " order by rol", 'onclick' => "admRolForm");
echo $_GET['callback']."(".json_encode($resultadoArray).");";

pg_close();
?>
