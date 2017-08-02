<?php

include '../conexion.php';
conectarse();
//Inicio de variables de sesión
session_start();
//Recibir los datos ingresados en el formulario
$usuario= $_POST['usuario'];
$idRol= $_POST['idRol'];
$pass= md5($_POST['pass']);
//Consultar si los datos son están guardados en la base de datos
$consulta="SELECT * FROM tbl_usuario WHERE alias='".$usuario."' and id_rol=".$idRol." AND clave ='".$pass."'"; 
$resultado=pg_query($consulta) or die (pg_last_error());
$fila=pg_fetch_array($resultado);

if($fila['sesion']!=session_id())
{
	$modificar=pg_query("update tbl_usuario set sesion='".session_id()."' where alias='".$usuario."'") or die("Error de conexion. ". pg_last_error());
}

if (!$fila[0]) //opcion1: Si el usuario NO existe o los datos son INCORRRECTOS
{
	echo 'Usuario o Password errados, por favor verifique';
}
if (strcmp($fila["estado"], "f")==0) //opcion1: Si el usuario NO existe o los datos son INCORRRECTOS
{
	echo 'Usuario Inactivo, no tiene Acceso al sistema';
}
//if($fila['autenticacion_ip']==session_id())
//{self.location = "../index.php"  header("Location: inicio.php");

else //opcion2: Usuario logueado correctamente
{
	//Definimos las variables de sesión y redirigimos a la página de usuario
	$_SESSION['usu'] = $fila['alias'];
	$_SESSION['idrol'] = $fila['id_rol'];
	echo "0";
}
pg_close();
?>