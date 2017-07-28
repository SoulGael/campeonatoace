<?php

function getPermiso($idRol, $buscar){
    $consulta="select * from vta_privilegio where id_rol=".$idRol." and lower(pagina)=lower('".$buscar."');"; 
	$resultado=pg_query($consulta) or die (pg_last_error());
	
	if(pg_num_rows($resultado)!=0){
		return true;
	}
	return false;
}

function getRol($id) {
	
	$consulta="SELECT * FROM tbl_rol where id_rol=".$id." "; 
	$resultado=pg_query($consulta) or die (pg_last_error());

	return $resultado;
}

function rolGuardar($rol) {
	
	$resultado = "";
	if($resultado = pg_query("insert into tbl_rol (rol) values UPPER('".$rol."');") or die (pg_last_error())){
		return true;
	}

	return false;
}

function getPromovidos($idrol) {
	
	$consulta="select * from vta_privilegio where id_rol=".$idrol." "; 
	$resultado=pg_query($consulta) or die (pg_last_error());

	return $resultado;
}

function getPromover($idrol) {
	
	$consulta="select * from tbl_pagina where id_pagina not in (SELECT id_pagina FROM vta_privilegio where id_rol=".$idrol.") "; 
	$resultado=pg_query($consulta) or die (pg_last_error());

	return $resultado;
}

function promoverGuardar($id, $idsPaginas) {
	
	$cont = 0;
	$arrayPaginas = explode( ',', $idsPaginas );

	foreach($arrayPaginas as $array) {
		if($resEquipoCarrera = pg_query("insert into tbl_privilegio values (".$id.",".$array.")") or die(pg_last_error())){
			$cont++;
		}
	}
	if ($cont==count($arrayPaginas)) {
		return true;
	}

	return false;
}

function revocarGuardar($id, $idsPaginas) {
	
	if($resEquipoCarrera = pg_query("delete from tbl_privilegio where id_rol=".$id." and id_pagina in (".$idsPaginas.") ") or die(pg_last_error())){
		return true;
	}

	return false;
}

function rolRepetido($rol) {
	$consulta="select * from tbl_rol where lower(rol)=lower('".$rol."');"; 
	$resultado=pg_query($consulta) or die (pg_last_error());
	
	if(pg_num_rows($resultado)!=0){
		return true;
	}
	return false;
}

function rolModificar($idrol, $rol) {
	
	$resultado = "";
	if($resultado = pg_query("update tbl_rol set rol=UPPER('".$rol."') where id_rol=".$idrol." ") or die (pg_last_error())){
		return true;
	}

	return false;
}

function rolcombo($id) {
	$html="";
	$consulta="SELECT * FROM tbl_rol order by rol"; 
	$resultado=pg_query($consulta) or die (pg_last_error());

	if(strcmp($id,"")==0){
		while($fila=pg_fetch_array($resultado)){ 
			$html .= "<option value=".$fila["id_rol"]." >".$fila["rol"]."</option>";
	    }
	}else{
		while($fila=pg_fetch_array($resultado)){ 
			if(strcmp($id,$fila["id_rol"])==0){
				$html .= "<option value=".$fila["id_rol"]." selected>".$fila["rol"]."</option>";
			}else{
				$html .= "<option value=".$fila["id_rol"]." >".$fila["rol"]."</option>";
			}
	    }
	}
	
    return $html;
}


//Usuarios
function getUsuarios($id) {

	$consulta="SELECT * FROM tbl_usuario where alias='".$id."' "; 
	$resultado=pg_query($consulta) or die (pg_last_error());

	return $resultado;
}

function usuarioRepetido($usuario) {
	$consulta="select * from tbl_usuario where lower(alias)=lower('".$usuario."');"; 
	$resultado=pg_query($consulta) or die (pg_last_error());
	
	if(pg_num_rows($resultado)!=0){
		return true;
	}
	return false;
}

function igualPass($usuario,$pass) {
	$consulta="select * from tbl_usuario where lower(alias)=lower('".$usuario."') and clave='".$pass."';"; 
	$resultado=pg_query($consulta) or die (pg_last_error());
	
	if(pg_num_rows($resultado)!=0){
		return true;
	}
	return false;
}

function usuarioGuardar($usuario, $pass, $idRol, $estado) {
	
	$resultado = "";
	if($resultado = pg_query("insert into tbl_usuario (alias, clave, id_rol, estado) values ('".$usuario."', md5('".$pass."'), ".$idRol.", ".$estado.");") or die (pg_last_error())){
		return true;
	}

	return false;
}

function usuarioModificar($usuario, $pass, $idRol, $estado) {
	
	$resultado = "";
	if($resultado = pg_query("update tbl_usuario set clave=md5('".$pass."'), id_rol=".$idRol.", estado=".$estado." where alias='".$usuario."' ") or die (pg_last_error())){
		return true;
	}

	return false;
}

function usuarioModificarPass($usuario, $idRol, $estado) {
	
	$resultado = "";
	if($resultado = pg_query("update tbl_usuario set id_rol=".$idRol.", estado=".$estado." where alias='".$usuario."' ") or die (pg_last_error())){
		return true;
	}

	return false;
}


//Campeonato
function getCampeonato($id) {

	$consulta="SELECT * FROM tbl_campeonato where id_campeonato='".$id."' "; 
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

function campeonatoRepetido($campeonato) {
	$consulta="select * from tbl_campeonato where lower(campeonato)=lower('".$campeonato."');"; 
	$resultado=pg_query($consulta) or die (pg_last_error());
	
	if(pg_num_rows($resultado)!=0){
		return true;
	}
	return false;
}

function campeonatoGuardar($campeonato, $f_inicio, $f_inscripcion, $idsDiciplina, $ch, $cm, $c_equipos, $v_inscripcion, $v_garantia, $d_habilitantes, $f_inauguracion, $p_equipos, $m_control, $arbitraje, $coorDiciplina, $contacto) {

	$cont = 0;
	$resultado = "";
	$id = "";
	$resultado = pg_query("insert into tbl_campeonato (campeonato, fecha, fecha_inicio, fecha_max_inscripcion, varones, damas, conformacion_equipos, valor_ins, valor_gar, doc_habilitantes, fecha_inauguracion, presentacion_equipos, mesa_control, arbitraje, coor_diciplina, contacto_sugerencia) values ('".$campeonato."', date 'now()', '".$f_inicio."', '".$f_inscripcion."', ".$ch.", ".$cm.", '".$c_equipos."','".$v_inscripcion."', '".$v_garantia."', '".$d_habilitantes."', '".$f_inauguracion."', '".$p_equipos."',	'".$m_control."','".$arbitraje."', '".$coorDiciplina."','".$contacto."') returning id_campeonato;") or die (pg_last_error());

	if($fila=pg_fetch_array($resultado)){
		$id=$fila["0"];
	}

	$arrayDiciplina = explode( ',', $idsDiciplina );

	foreach($arrayDiciplina as $array) {
		if($resDiciplica = pg_query("insert into tbl_diciplina_campeonato values (".$array.",".$id.")") or die(pg_last_error())){
			$cont++;
		}
	}
	if ($cont==count($arrayDiciplina)) {
		return true;
	}

	return false;
}

function campeonatoModificar($id, $campeonato, $f_inicio, $f_inscripcion, $idsDiciplina, $ch, $cm, $c_equipos, $v_inscripcion, $v_garantia, $d_habilitantes, $f_inauguracion, $p_equipos, $m_control, $arbitraje, $coorDiciplina, $contacto) {

	$cont = 0;
	$resultado = "";
	if ($resultado = pg_query("update tbl_campeonato set campeonato= '".$campeonato."', fecha_inicio='".$f_inicio."', fecha_max_inscripcion='".$f_inscripcion."', varones=".$ch.", 
		damas=".$cm.", conformacion_equipos='".$c_equipos."', valor_ins='".$v_inscripcion."', valor_gar='".$v_garantia."', doc_habilitantes='".$d_habilitantes."', 
		fecha_inauguracion='".$f_inauguracion."', presentacion_equipos='".$p_equipos."', mesa_control='".$m_control."', arbitraje='".$arbitraje."', 
		coor_diciplina='".$coorDiciplina."', contacto_sugerencia='".$contacto."' where id_campeonato=".$id." ") or die (pg_last_error())){

		$arrayDiciplina = explode( ',', $idsDiciplina );

		if($resDiciplinaEliminar = pg_query("delete from tbl_diciplina_campeonato where id_campeonato=".$id." ") or die(pg_last_error())){

			foreach($arrayDiciplina as $array) {			
				if($resDiciplinaInsert = pg_query("insert into tbl_diciplina_campeonato values (".$array.",".$id.")") or die(pg_last_error())){
					$cont++;
				}
			}	
			if ($cont==count($arrayDiciplina)) {
				return true;
			}		
		}
	}

	return false;
}

//DICIPLINAS
function getDiciplina($id){
	$html="<tbody>";	

	if(strcmp($id, "-1")==0){
		$consulta="select * from tbl_diciplina where estado=true order by id_diciplina";
		$resultado=pg_query($consulta) or die (pg_last_error());

		while($fila=pg_fetch_array($resultado)){ 
			$id_diciplina=$fila['id_diciplina'];
			$diciplina=$fila['diciplina'];
			$html.='<tr><td class="uk-table-shrink uk-text-nowrap"><input class="uk-checkbox" type="checkbox" value="'.$id_diciplina.'" name="diciplinaTab"></td> <td class="uk-table-link"><a class="uk-link-reset" >'.$diciplina.' </a> </td> </tr>';
	    }

	}
	else{
		$consulta="select * from tbl_diciplina order by id_diciplina";
		$resultado=pg_query($consulta) or die (pg_last_error());

		while($fila=pg_fetch_array($resultado)){ 
			$id_diciplina=$fila['id_diciplina'];
			$diciplina=$fila['diciplina'];
			$ban=0;
				
				$consultaDis="select * from tbl_diciplina_campeonato where id_campeonato=".$id." order by id_diciplina";
				$resultadoDis=pg_query($consultaDis) or die (pg_last_error());
				
				while($filaDis=pg_fetch_array($resultadoDis)){
					$id_diciplinaSelecionada=$filaDis['id_diciplina'];

					if(strcmp($id_diciplina, $id_diciplinaSelecionada)==0){
						$html.='<tr><td class="uk-table-shrink uk-text-nowrap"><input class="uk-checkbox" type="checkbox" value="'.$id_diciplina.'" name="diciplinaTab" checked ></td> <td class="uk-table-link"><a class="uk-link-reset" >'.$diciplina.' </a> </td> </tr>';
						$ban=1;
						break;
					}
				}

			if(strcmp($ban, 0)==0){
				$html.='<tr><td><input class="uk-checkbox" type="checkbox" value="'.$id_diciplina.'" name="diciplinaTab"></td> <td class="uk-table-link"><a class="uk-link-reset" >'.$diciplina.' </a> </td> </tr>';
			}
			
	    }
	}
	
	$html.="</tbody>";
    return $html;
}

//DICIPLINAS
function getDiciplinas($id) {
	
	$consulta="SELECT * FROM tbl_diciplina where id_diciplina=".$id." "; 
	$resultado=pg_query($consulta) or die (pg_last_error());

	return $resultado;
}

function diciplinaRepetido($diciplina) {
	$consulta="select * from tbl_diciplina where lower(diciplina)=lower('".$diciplina."');"; 
	$resultado=pg_query($consulta) or die (pg_last_error());
	
	if(pg_num_rows($resultado)!=0){
		return true;
	}
	return false;
}

function diciplinaGuardar($diciplina, $hora, $minuto) {
	
	$resultado = "";
	if($resultado = pg_query("insert into tbl_diciplina (diciplina, hora, minuto) values (UPPER('".$diciplina."'), ".$hora.", ".$minuto." )") or die (pg_last_error())){
		return true;
	}

	return false;
}

function diciplinaModificar($id, $diciplina, $estado, $hora, $minuto) {
	
	$resultado = "";
	if($resultado = pg_query("update tbl_diciplina set diciplina='".$diciplina."', hora=".$hora.", minuto=".$minuto.", estado=".$estado." where id_diciplina=".$id." ") or die (pg_last_error())){
		return true;
	}

	return false;
}


?>