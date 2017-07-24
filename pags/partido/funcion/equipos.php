<?php

function getEquipo($id) {
	
	$consulta="SELECT * FROM vta_grupo_equipo where id_grupo_futbol=".$id." "; 
	$resultado=pg_query($consulta) or die (pg_last_error());

	return $resultado;
}

function equiposCombo($carrera) {
	$html="";
	$consulta="select * from tbl_carrera order by carrera, id_nivel;"; 
	$resultado=pg_query($consulta) or die (pg_last_error());
	$html .= '<option value="-1">Elija una Opcion</option>';
	if(strcmp($carrera,"")==0){
		while($fila=pg_fetch_array($resultado)){ 
			$html .= "<option value='".$fila["id_carrera"]."' >".$fila["carrera"]." - ".$fila["nivel"]."</option>";
	    }
	}else{
		while($fila=pg_fetch_array($resultado)){ 
			if(strcmp($carrera,$fila["id_carrera"])==0){
				$html .= "<option value='".$fila["id_carrera"]."' selected>".$fila["carrera"]." - ".$fila["nivel"]."</option>";
			}else{
				$html .= "<option value='".$fila["id_carrera"]."' >".$fila["carrera"]." - ".$fila["nivel"]."</option>";
			}
	    }
	}
	
    return $html;
}

function estudianteRepetido($cedula) {
	$consulta="select * from tbl_alumno where cedula='".$cedula."';"; 
	$resultado=pg_query($consulta) or die (pg_last_error());
	
	if(pg_num_rows($resultado)!=0){
		return true;
	}
	return false;
}

function estudianteGuardar($nombres, $apellidos, $cedula, $sexo, $id_carrera_actual, $modalidad, $paralelo) {
	
	$resultado = "";
	if($resultado = pg_query("insert into tbl_alumno (nombres, apellidos, cedula, sexo, modalidad, paralelo, id_carrera_actual) values (UPPER('".$nombres."'), UPPER('".$apellidos."'), '".$cedula."', ".$sexo.", '".$modalidad."', UPPER('".$paralelo."'), ".$id_carrera_actual.");") or die (pg_last_error())){
		return true;
	}

	return false;
}

function estudianteModificar($id, $nombres, $apellidos, $cedula, $sexo, $id_carrera_actual, $modalidad, $paralelo) {
	
	$resultado = "";
	if($resultado = pg_query("update tbl_alumno set nombres=UPPER('".$nombres."'), apellidos=UPPER('".$apellidos."'), cedula='".$cedula."', sexo=".$sexo.", id_carrera_actual=".$id_carrera_actual.", modalidad='".$modalidad."', paralelo=UPPER('".$paralelo."') where id_alumno=".$id." ") or die (pg_last_error())){
		return true;
	}

	return false;
}

function getIdCarrera($carrera, $nivel){
	$resultado = pg_query("select id_carrera from tbl_carrera where lower(carrera)=lower('".$carrera."') and lower(nivel)=lower('".$nivel."');") or die (pg_last_error());

	if($fila=pg_fetch_array($resultado)){
		return $fila["0"];
	}
	else{
		return "-1";
	}
}

?>