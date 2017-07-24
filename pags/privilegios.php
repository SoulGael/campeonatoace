<?php 
include 'conexion.php';
conectarse();
//$resultado = $_POST['valorCaja1'] + $_POST['valorCaja2']; 
$idGetRol=$_GET['idRol'];
$resultadoArray = array();
$privilegios="";

$consulta="select * from tbl_privilegio p
		join tbl_pagina a on p.id_pagina=a.id_pagina
		where id_rol=".$idGetRol."";

$resultado=pg_query($consulta) or die (pg_last_error());

if(pg_num_rows($resultado)!=0){
	while($fila=pg_fetch_array($resultado)){  
    	$privilegios.=($fila['pagina'].',');
    }
}


$resultadoArray[] = array('Roles' => $privilegios);
echo $_GET['callback']."(".json_encode($resultadoArray).");";

//echo $resultado;
pg_close();
?>