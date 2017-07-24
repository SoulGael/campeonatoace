<?php

include '../conexion.php';
include 'funcion/rol.php';
conectarse();

$id = $_GET['id'];
$usuario = $_GET['nuevo_usuario'];
$pass = $_GET['nuevo_clave'];
$idRol = $_GET['idRol'];
$estado = $_GET['estado'];
$res = false;

$resultadoArray = array();
$mensaje = "Ha Ocurrido un Error al Guardar.";
if(strcmp($id, '-1')==0){
	if(!usuarioRepetido($usuario)){
		if(usuarioGuardar($usuario, $pass, $idRol, $estado)){
			$mensaje = "Guardado Correctamente";
			$res=true;
		}
	}else{
		$mensaje = "Usuario Repetido";
		$res=false;
	}	
}
else {
	//if (!igualPass($usuario,$pass)) {
	if(strcmp($pass,"")!=0){
		if(usuarioModificar($usuario, $pass, $idRol, $estado)){
			$mensaje = "Contraseña y Rol Modificado Correctamente";
			$res = true;
		}
	}else{
		if(usuarioModificarPass($usuario, $idRol, $estado)){
			$mensaje = "Modificado Correctamente";
			$res = true;
		}
	}		
}

$resultadoArray[] = array('msg' => $mensaje, 'res' => $res, 'select' => "alias,alias", 'from' => "tbl_usuario", 'where' => " order by alias", 'onclick' => "admUsuarioForm");
echo $_GET['callback']."(".json_encode($resultadoArray).");";

pg_close();
?>
