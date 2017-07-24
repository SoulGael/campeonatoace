<?php

//Futbol
function getDato($select, $from, $where){

	$id = "";
	$resultado = pg_query("select ".$select." from ".$from." where ".$where." ;") or die (pg_last_error());

	if($fila=pg_fetch_array($resultado)){
		$id=$fila["0"];
	}
	return $id;
}
function getEquipo($id) {
	
	$consulta="SELECT * FROM vta_equipo where id_equipo=".$id." "; 
	$resultado=pg_query($consulta) or die (pg_last_error());

	return $resultado;
}

function getEquiposCampeonato($id, $id_diciplina, $genero) {
	
	$consulta="SELECT * FROM tbl_equipo where id_campeonato_actual=".$id." and id_diciplina= ".$id_diciplina." and genero=".$genero." "; 
	$resultado=pg_query($consulta) or die (pg_last_error());

	return $resultado;
}

function getDiciplinaCampeonato($id) {
	
	$consulta="select * from vta_diciplina_campeonato where id_campeonato=".$id." "; 
	$resultado=pg_query($consulta) or die (pg_last_error());

	return $resultado;
}

function getSeleccionados($id) {
	
	$consulta="select * from vta_equipo where id_equipo=".$id." "; 
	$resultado=pg_query($consulta) or die (pg_last_error());

	return $resultado;
}

function equipoFultbolRepetido($nuevo_equipo) {
	$consulta="select * from tbl_equipo where lower(equipo)=lower('".$nuevo_equipo."');"; 
	$resultado=pg_query($consulta) or die (pg_last_error());
	
	if(pg_num_rows($resultado)!=0){
		return true;
	}
	return false;
}

function equipoGuardar($nuevo_equipo,$cmbCampeonato,$cmbCarrera,$idsAlumnos,$cmbDiciplina,$idsNumero,$genero,$modalidad) {
	
	$cont = 0;
	$resultado = "";
	$id = "";
	$resultado = pg_query("insert into tbl_equipo (equipo, fecha, genero, modalidad, id_campeonato_actual, id_diciplina) values (UPPER('".$nuevo_equipo."'), date 'now()', ".$genero.", '".$modalidad."', ".$cmbCampeonato.",".$cmbDiciplina.") returning id_equipo;") or die (pg_last_error());

	if($fila=pg_fetch_array($resultado)){
		$id=$fila["0"];
	}

	$arrayAlumnos = explode( ',', $idsAlumnos );
	$arrayNumeros = explode( ',', $idsNumero );

	foreach($arrayAlumnos as $array) {
		if($resEquipoCarrera = pg_query("insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (".$id.",".$array.",(select id_carrera_actual from tbl_alumno where id_alumno=".$array."),".$cmbCampeonato.",".$arrayNumeros[$cont].")") or die(pg_last_error())){
			$cont++;
		}
	}
	if ($cont==count($arrayAlumnos)) {
		return true;
	}

	return false;
}

function equipoModificar($id, $nuevo_equipo,$cmbCampeonato,$cmbCarrera,$idsAlumnos,$cmbDiciplina,$idsNumero,$genero,$modalidad) {
	
	$cont = 0;
	
	if($resultado = pg_query("update tbl_equipo set equipo=UPPER('".$nuevo_equipo."'), id_campeonato_actual=".$cmbCampeonato.", id_diciplina=".$cmbDiciplina.", 
	  	genero=".$genero.", modalidad='".$modalidad."' where id_equipo=".$id.";") or die (pg_last_error())){

		if (strcmp($idsAlumnos, "")!=0) {
			
			$arrayAlumnos = explode( ',', $idsAlumnos );
			$arrayNumeros = explode( ',', $idsNumero );

			foreach($arrayAlumnos as $array) {
				if($resEquipoCarrera = pg_query("insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (".$id.",".$array.",(select id_carrera_actual from tbl_alumno where id_alumno=".$array."),".$cmbCampeonato.",".$arrayNumeros[$cont].")") or die(pg_last_error())){
					$cont++;
				}
			}
			if ($cont==count($arrayAlumnos)) {
				
			}
		}
		return true;		
	}
	
	return false;
}

function equipoQuitarJugador($id, $id_alumno, $id_campeonato){

	if(pg_query("delete from tbl_equipo_alumno where id_equipo=".$id." and id_alumno=".$id_alumno." and id_campeonato=".$id_campeonato." ;") or die (pg_last_error())){
		return true;
	}

	return false;
}

function equipoModificarJugador($id, $id_alumno, $id_campeonato, $numero){

	if(pg_query("update tbl_equipo_alumno set num_camiseta='".$numero."'  where id_equipo=".$id." and id_alumno=".$id_alumno." and id_campeonato=".$id_campeonato." ;") or die (pg_last_error())){
		return true;
	}

	return false;
}

function equiposCombo($carrera) {
	$html="";
	$consulta="select distinct(carrera) from tbl_carrera order by carrera;"; 
	$resultado=pg_query($consulta) or die (pg_last_error());
	$html .= '<option value="-1">Elija una Opcion</option>';
	if(strcmp($carrera,"")==0){
		while($fila=pg_fetch_array($resultado)){ 
			$html .= "<option value='".$fila["carrera"]."' >".$fila["carrera"]."</option>";
	    }
	}else{
		while($fila=pg_fetch_array($resultado)){ 
			if(strcmp($carrera,$fila["carrera"])==0){
				$html .= "<option value='".$fila["carrera"]."' selected>".$fila["carrera"]."</option>";
			}else{
				$html .= "<option value='".$fila["carrera"]."' >".$fila["carrera"]."</option>";
			}
	    }
	}
	
    return $html;
}

function diciplinaCombo($diciplina) {
	$html="";
	$consulta="select * from vta_diciplina order by diciplina;"; 
	$resultado=pg_query($consulta) or die (pg_last_error());
	$html .= '<option value="-1">Elija una Opcion</option>';
	if(strcmp($diciplina,"")==0){
		while($fila=pg_fetch_array($resultado)){ 
			$html .= "<option value='".$fila["id_diciplina"]."' >".$fila["diciplina"]."</option>";
	    }
	}else{
		while($fila=pg_fetch_array($resultado)){ 
			if(strcmp($diciplina,$fila["diciplina"])==0){
				$html .= "<option value='".$fila["id_diciplina"]."' selected>".$fila["diciplina"]."</option>";
			}else{
				$html .= "<option value='".$fila["id_diciplina"]."' >".$fila["diciplina"]."</option>";
			}
	    }
	}
	
    return $html;
}


function getAlumnosCarreras($carrera, $nivel,$diciplina,$campeonato,$genero, $modalidad) {

	$consulta="select * from vta_alumno_carrera where carrera='".$carrera."' and sexo=".$genero." and modalidad='".$modalidad."' and nivel='".$nivel."' and id_alumno not in (select id_alumno from vta_equipo where id_campeonato=".$campeonato." and id_diciplina=".$diciplina." order by paralelo, razon_social); "; 
	$resultado=pg_query($consulta) or die (pg_last_error());

	return $resultado;
}

function getNivelesCarreras($carrera) {

	$consulta="select distinct(nivel),id_nivel from tbl_carrera where carrera='".$carrera."' order by id_nivel; "; 
	$resultado=pg_query($consulta) or die (pg_last_error());

	return $resultado;
}

function getCampeonatoEstado($campeonato, $estado) {
	$html="";
	$consulta="SELECT * FROM tbl_campeonato where estado=".$estado." "; 
	$resultado=pg_query($consulta) or die (pg_last_error());
	$html .= '<option value="-1">Elija una Opcion</option>';
	if(strcmp($campeonato,"")==0){
		while($fila=pg_fetch_array($resultado)){ 
			$html .= "<option value='".$fila["id_campeonato"]."' >".$fila["campeonato"]."</option>";
	    }
	}else{
		while($fila=pg_fetch_array($resultado)){ 
			if(strcmp($campeonato,$fila["id_campeonato"])==0){
				$html .= "<option value='".$fila["id_campeonato"]."' selected>".$fila["campeonato"]."</option>";
			}else{
				$html .= "<option value='".$fila["id_campeonato"]."' >".$fila["campeonato"]."</option>";
			}
	    }
	}
	
    return $html;
}

function faseGrupoGuardar($grupo_futbol, $id_campeonato, $id_equipo){
	if(pg_query("insert into tbl_grupo_futbol (grupo_futbol, id_campeonato, id_equipo) values (UPPER('".$grupo_futbol."'), ".$id_campeonato.", ".$id_equipo."); ") 
		or die(pg_last_error())){
			return true;
	}
	return false;
}

function getArrayGrupo($idcampeonato, $idGrupo, $idDiciplina, $estado) {
	$consulta="select array_to_string(array_agg(id_grupo_futbol), ',') from vta_grupo_futbol where id_campeonato=".$idcampeonato." and grupo_futbol='".$idGrupo."' and id_diciplina=".$idDiciplina." and genero=".$estado.";"; 

	$array="";
	$resultado=pg_query($consulta) or die (pg_last_error());

	while($fila=pg_fetch_array($resultado)){ 
		$array = $fila[0];
		if(strcmp($array, "")==0){
			$array="-1";
		}
	}
	
    return $array;
}

function calendarioGuardar($id_grupo_futbol_a, $id_grupo_futbol_b, $fecha){
	//e = En proceso
	//f = Finalizado
	//p = Proximo
	if(pg_query("insert into tbl_ficha_control (id_grupo_futbol_a, id_grupo_futbol_b, fecha, hora, estado) 
				values (".$id_grupo_futbol_a.", ".$id_grupo_futbol_b.", ('".$fecha."')::date, ('".$fecha."')::time, 'p'); ") 
		or die(pg_last_error())){
			return true;
	}
	return false;
}

function getNombreEquipo($idGrupo) {
	$consulta="select * from vta_grupo_futbol where id_grupo_futbol=".$idGrupo.";"; 

	$equipo="";
	$resultado=pg_query($consulta) or die (pg_last_error());

	while($fila=pg_fetch_array($resultado)){ 
		$equipo = $fila["equipo"];
	}
	
    return $equipo;
}

function getGrupoFutbol($idcampeonato, $idDiciplina, $genero) {

	$consulta="select * from vta_grupo_futbol where id_diciplina=".$idDiciplina." and genero=".$genero." and id_campeonato=".$idcampeonato." order by id_grupo_futbol; "; 
	$resultado=pg_query($consulta) or die (pg_last_error());

	return $resultado;
}

function getGrupoFutbolJuegos($id_grupo_futbol) {

	$consulta="select * from vta_ficha_control where id_grupo_futbol_a = ".$id_grupo_futbol." or id_grupo_futbol_b = ".$id_grupo_futbol."; "; 
	$resultado=pg_query($consulta) or die (pg_last_error());

	return $resultado;
}

?>