<?php 
include '../conexion.php';
conectarse();
//$resultado = $_POST['valorCaja1'] + $_POST['valorCaja2']; 
$id=$_GET['id'];
$resultadoArray = array();

$equipo_a="";
$equipo_b="";
$id_a="";
$id_b="";
$lista_requerimientoA = array();
$lista_requerimientoB = array();

$lista_porcentajeA = array();
$lista_porcentajeB = array();

$consulta="select * from vta_ficha_control where id_ficha_control=".$id."";

$resultado=pg_query($consulta) or die (pg_last_error());

if($fila=pg_fetch_array($resultado)){  
   	$equipo_a=($fila['equipo_a']);
   	$equipo_b=($fila['equipo_b']);
   	$id_a=($fila['id_grupo_futbol_a']);
   	$id_b=($fila['id_grupo_futbol_b']);
}

$consultaRequerimiento1="select * from vta_ficha_control where (id_grupo_futbol_a = ".$id_a." or id_grupo_futbol_b = ".$id_a.") and estado='f' order by fecha, hora limit 6;";

$resultadoRequerimiento1=pg_query($consultaRequerimiento1) or die (pg_last_error());
$valor = 0;
$i = 0;
$cont = 0;
$totalGolesA = 0;
$totalGolesB = 0;

while ($filaRequerimiento1=pg_fetch_array($resultadoRequerimiento1)){  
   	$equipoReq_a=($filaRequerimiento1['equipo_a']);
   	$equipoReq_b=($filaRequerimiento1['equipo_b']);
   	$goles_a=($filaRequerimiento1['goles_a']);
   	$goles_b=($filaRequerimiento1['goles_b']);

   	if(strcmp($equipo_a, $equipoReq_a)==0){
   		$totalGolesA += $goles_a;
   		if($goles_a>$goles_b){   			
   			$valor += 1; 
   			$lista_requerimientoA[$i]=$valor;
   			$i++;
   		}
   		elseif ($goles_a==$goles_b) {
   			$valor += 0.33; 
   			$lista_requerimientoA[$i]=$valor;
   			$i++;
   		}
   		elseif ($goles_a<$goles_b){
   			$valor += -1; 
   			$lista_requerimientoA[$i]=$valor;
   			$i++;
   		}
   	}

   	if(strcmp($equipo_a, $equipoReq_b)==0){
   		$totalGolesA += $goles_b;
   		if($goles_a<$goles_b){
   			$valor += 1; 
   			$lista_requerimientoA[$i]=$valor;
   			$i++;
   		}
   		elseif ($goles_a==$goles_b) {
   			$valor += 0.33; 
   			$lista_requerimientoA[$i]=$valor;
   			$i++;
   		}
   		elseif ($goles_a>$goles_b){
   			$valor += -1; 
   			$lista_requerimientoA[$i]=$valor;
   			$i++;
   		}
   	}
   	$lista_porcentajeA[$cont]=($totalGolesA/$valor);
   	$cont++;
}

$consultaRequerimiento2="select * from vta_ficha_control where (id_grupo_futbol_a = ".$id_b." or id_grupo_futbol_b = ".$id_b.") and estado='f' order by fecha, hora limit 6;";

$resultadoRequerimiento2=pg_query($consultaRequerimiento2) or die (pg_last_error());
$valor = 0;
$i = 0;
$cont = 0;

while ($filaRequerimiento2=pg_fetch_array($resultadoRequerimiento2)){  
   	$equipoReq_a=($filaRequerimiento2['equipo_a']);
   	$equipoReq_b=($filaRequerimiento2['equipo_b']);
   	$goles_a=($filaRequerimiento2['goles_a']);
   	$goles_b=($filaRequerimiento2['goles_b']);

   	if(strcmp($equipo_b, $equipoReq_a)==0){
   		$totalGolesB += $goles_a;
   		if($goles_a>$goles_b){
   			$valor += 1; 
   			$lista_requerimientoB[$i]=$valor;
   			$i++;
   		}
   		elseif ($goles_a==$goles_b) {
   			$valor += 0.33; 
   			$lista_requerimientoB[$i]=$valor;
   			$i++;
   		}
   		elseif ($goles_a<$goles_b){
   			$valor += -1; 
   			$lista_requerimientoB[$i]=$valor;
   			$i++;
   		}
   	}

   	if(strcmp($equipo_b, $equipoReq_b)==0){
   		$totalGolesB += $goles_b;
   		if($goles_a<$goles_b){
   			$valor += 1; 
   			$lista_requerimientoB[$i]=$valor;
   			$i++;
   		}
   		elseif ($goles_a==$goles_b) {
   			$valor += 0.33; 
   			$lista_requerimientoB[$i]=$valor;
   			$i++;
   		}
   		elseif ($goles_a>$goles_b){
   			$valor += -1; 
   			$lista_requerimientoB[$i]=$valor;
   			$i++;
   		}
   	}
   	$lista_porcentajeB[$cont]=($totalGolesB/$valor);
   	$cont++;
}

$resultadoArray[] = array('equipo_a' => $equipo_a, 'equipo_b' => $equipo_b, 'id_a' => $id_a, 'id_b' => $id_b, 'lista1' => $lista_requerimientoA, 'lista2' => $lista_requerimientoB, 'porcentaje1' => $lista_porcentajeA, 'porcentaje2' => $lista_porcentajeB);
echo $_GET['callback']."(".json_encode($resultadoArray).");";

//echo $resultado;
pg_close();
?>