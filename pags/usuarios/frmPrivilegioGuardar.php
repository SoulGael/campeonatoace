<?php

include '../conexion.php';
include 'funcion/rol.php';
conectarse();

$id = $_GET['id'];
$ids_pagina = $_GET['ids_pagina'];
$tipo = $_GET['tipo'];
$res = false;

$resultadoArray = array();
$mensaje = "Ha Ocurrido un Error al Guardar.";
if(strcmp($tipo, 'p')==0){
	if(promoverGuardar($id, $ids_pagina)){
			$mensaje = "Guardado Correctamente";
			$res=true;
	}else{
		$mensaje = "Error al Promover";
		$res=false;
	}
}
else {
	if(revocarGuardar($id, $ids_pagina)){
			$mensaje = "Guardado Correctamente";
			$res=true;
	}else{
		$mensaje = "Error al Promover";
		$res=false;
	}
}

$resultadoArray[] = array('msg' => $mensaje, 'res' => $res, 'select' => "id_rol,rol", 'head' => ",ROL", 'tamanio' => ",100", 'from' => "tbl_rol", 'where' => " order by rol", 'onclick' => "activaTab('div2');admRolForm");
echo $_GET['callback']."(".json_encode($resultadoArray).");";

pg_close();
?>
