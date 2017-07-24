<?php

include '../conexion.php';
conectarse();
//Inicio de variables de sesión
//Recibir los datos ingresados en el formulario
$select = $_POST['select'];
$from = $_POST['from'];
$where = $_POST['where'];
//Consultar si los datos son están guardados en la base de datos
$consulta="SELECT ".$select." FROM ".$from." ".$where.""; 
$resultado=pg_query($consulta) or die (pg_last_error());

$html = "";

if(pg_num_rows($resultado)!=0){
	$html .= '<option value="-1">Seleccione una Opcion</option>';
	while($fila=pg_fetch_array($resultado)){ 
		$html .= '<option value="'.$fila[0].'">'.$fila[1].'</option>';
    }
}
    //<caption>Table Caption</caption> 

echo $html;
?>