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

function fichaRepetido($id) {
	$consulta="select * from tbl_ficha_control where id_ficha_control='".$id."' and estado='f';"; 
	$resultado=pg_query($consulta) or die (pg_last_error());
	
	if(pg_num_rows($resultado)!=0){
		return true;
	}
	return false;
}

function fichaGuardar($id, $golesA, $golesB, $checkA, $checkB) {
	
	$resultado = "";
	if($resultado = pg_query("update tbl_ficha_control set goles_a=".$golesA.", goles_b=".$golesB.", estado='f' where id_ficha_control=".$id." ;") or die (pg_last_error())){
		
		if(strcmp($checkA, "true")==0){
			if($resultado = pg_query("insert into perdida_garantia (id_campeonato, id_equipo, id_ficha_control, fecha) 
				values (
							(select id_campeonato_actual from tbl_equipo where id_equipo=
								(select id_equipo from tbl_grupo_futbol where id_grupo_futbol=
									(select id_grupo_futbol_a from tbl_ficha_control where id_ficha_control=".$id.")
								)
							),
						(select id_equipo from tbl_grupo_futbol where id_grupo_futbol=
							(select id_grupo_futbol_a from tbl_ficha_control where id_ficha_control=".$id.")
						), ".$id.", date 'now()') ") or die (pg_last_error())){
				}
		}

		if(strcmp($checkB, "true")==0){
			if($resultado = pg_query("insert into perdida_garantia (id_campeonato, id_equipo, id_ficha_control, fecha) 
				values (
							(select id_campeonato_actual from tbl_equipo where id_equipo=
								(select id_equipo from tbl_grupo_futbol where id_grupo_futbol=
									(select id_grupo_futbol_b from tbl_ficha_control where id_ficha_control=".$id.")
								)
							),
						(select id_equipo from tbl_grupo_futbol where id_grupo_futbol=
							(select id_grupo_futbol_b from tbl_ficha_control where id_ficha_control=".$id.")
						), ".$id.", date 'now()') ") or die (pg_last_error())){
				}
		}
		
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

function tarjetaGuardar($id, $id_alumno, $tipo) {

	$resultado = "";
	if($resultado = pg_query("insert into tbl_tarjeta (tarjeta, id_estudiante, id_ficha_control, fecha) values ('".$tipo."', ".$id_alumno.", ".$id.", date 'now()')") or die (pg_last_error())){
		return true;
	}

	return false;
}

function tarjetaPagar($id) {

	$resultado = "";
	if($resultado = pg_query("update tbl_tarjeta set estado=true where id_tarjeta=".$id." ") or die (pg_last_error())){
		return true;
	}

	return false;
}

function getTarjetaDeuda($id_alumno){
	$html ="";

	$resultado = pg_query("select * from tbl_tarjeta where id_estudiante=".$id_alumno." and estado=false;") or die (pg_last_error());
	return $resultado;

	/*while($fila=pg_fetch_array($resultado)){
		$t=$fila["tarjeta"];
		$html.="<td colspan='4'><button class='btn btn-danger btn-block'>DEBE DE UNA TARJETA ".$t."</button></td>";
	}
	
	return $html;*/
}

?>