<?php

include '../conexion.php';
include 'funcion/rol.php';
conectarse();

$id = $_GET['id'];
$campeonato = $_GET['nombre_campeonato'];
$f_inicio = $_GET['f_inicio'];
$f_inscripcion = $_GET['f_inscripcion'];
$diciplina = $_GET['diciplina'];
$ch = $_GET['ch'];
$cm = $_GET['cm'];
$c_equipos = $_GET['c_equipos'];
$v_inscripcion = $_GET['v_inscripcion'];
$v_garantia = $_GET['v_garantia'];
$d_habilitantes = $_GET['d_habilitantes'];
$f_inauguracion = $_GET['f_inauguracion'];
$p_equipos = $_GET['p_equipos'];
$m_control = $_GET['m_control'];
$arbitraje = $_GET['arbitraje'];
$coorDiciplina = $_GET['coorDiciplina'];
$contacto = $_GET['contacto'];
$res = false;

$resultadoArray = array();
$mensaje = "Ha Ocurrido un Error al Guardar.";
if(strcmp($id, '-1')==0){
	if(!campeonatoRepetido($campeonato)){
		if(campeonatoGuardar($campeonato, $f_inicio, $f_inscripcion, $diciplina, $ch, $cm, $c_equipos, $v_inscripcion, $v_garantia, $d_habilitantes, $f_inauguracion, $p_equipos, $m_control, $arbitraje, $coorDiciplina, $contacto)){
			$res=true;
			$mensaje = "Guardado Correctamente";
		}
		else{
			$mensaje = "Error al Guardar.";
			$res=false;
		}
	}else{
		$mensaje = "Nombre del Repetido";
		$res=false;
	}
}
else {
	if(campeonatoModificar($id, $campeonato, $f_inicio, $f_inscripcion, $diciplina, $ch, $cm, $c_equipos, $v_inscripcion, $v_garantia, $d_habilitantes, $f_inauguracion, $p_equipos, $m_control, $arbitraje, $coorDiciplina, $contacto)){
			$res=true;
			$mensaje = "Modificado Correctamente";
		}
		else{
			$mensaje = "Error al Modificar.";
			$res=false;
		}	
}

$resultadoArray[] = array('msg' => $mensaje, 'res' => $res, 'select' => "id_campeonato,campeonato, fecha_inicio, fecha_max_inscripcion, fecha_inauguracion", 'head' => "CAMPEONATO, F. DE INICIO, F. MAX DE INSCRIPCIÓN, F. DE INAUGURACIÓN", 'tamanio' => "40,20,20,20", 'from' => "tbl_campeonato", 'where' => " order by id_campeonato ", 'onclick' => "activaTab('div2');admCampeonatoForm");

echo $_GET['callback']."(".json_encode($resultadoArray).");";

pg_close();
?>
