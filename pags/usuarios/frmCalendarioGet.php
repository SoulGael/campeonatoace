<?php 
include '../conexion.php';
conectarse();
//$resultado = $_POST['valorCaja1'] + $_POST['valorCaja2']; 
$id=1;
$resultadoArray = array();



$consulta="select * from vta_ficha_control ";

$resultado=pg_query($consulta) or die (pg_last_error());
$i=0;
while($fila=pg_fetch_array($resultado)){  
   	$equipo_a=($fila['equipo_a']);
   	$equipo_b=($fila['equipo_b']);
      $fecha=($fila['fecha']);
      $hora=($fila['hora']);

      $resultadoArray[$i] = array('title' => $equipo_a." VS ".$equipo_b, 'start' => $fecha.' '.$hora, 'className' => "label-info");
      $i++;
}

echo $_GET['callback']."(".json_encode($resultadoArray).");";

//echo $resultado;
pg_close();
?>