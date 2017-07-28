<?php

include '../conexion.php';
include 'funcion/rol.php';
conectarse();

$id = $_POST['id'];
$idRol = $_POST['idRol'];
$rol = "";
$promover = "";
$revocar = "";

//Verificar si los datos son nuevos
if(strcmp($id, '-1')!=0){
	$resultado=getRol($id);

	if(pg_num_rows($resultado)!=0){
		if($fila=pg_fetch_array($resultado)){
			$rol=$fila['rol'];
		}
	}

	$privilegio = getPromovidos($id);

	if(pg_num_rows($privilegio)!=0){
		
		$revocar = '<tbody>';
		while($filaPrivilegio=pg_fetch_array($privilegio)){
			
			$id_pagina=$filaPrivilegio['id_pagina'];
			$descripcion=$filaPrivilegio['descripcion'];
			$revocar.='<tr>
						<td class="center" width="10%">
							<input type="checkbox" class="ace" value="'.$id_pagina.'" name="revocarTab">
							<span class="lbl"></span>
						</td> 
						<td>
							<p>'.$descripcion.' </p> 
						</td> 
					   </tr>';			
		}
		$revocar .= '<tr><td colspan=2>
						<button type="button" onclick="admRevocarGuardar()" class="btn btn-primary btn-sm">
							<i class="ace-icon fa fa-key bigger-110"></i>Revocar
						</button>';
		$revocar .= '</tbody>';
	}

	$allPrivilegio = getPromover($id);

	if(pg_num_rows($allPrivilegio)!=0){
		
		$promover = '<tbody>';
		while($filaPrivilegio=pg_fetch_array($allPrivilegio)){
			
			$id_pagina=$filaPrivilegio['id_pagina'];
			$descripcion=$filaPrivilegio['descripcion'];
			$promover.='<tr>
							<td class="center" width="10%">
								<input type="checkbox" class="ace" value="'.$id_pagina.'" name="promoverTab">
								<span class="lbl"></span>
							</td> 
							<td>
								<p>'.$descripcion.' </p> 
							</td> 
						</tr>';			
		}
		$promover .= '<tr><td colspan=2>
						<button class="btn btn-primary btn-sm" onclick="admPromoverGuardar()">
							<i class="ace-icon fa fa-key bigger-110"></i>Promover
						</button>
						<td><tr>';
		$promover .= '</tbody>';
	}


}

$html = "";

$html .= '<input type="hidden" id="id_rol" name="id_rol" value="'.$id.'">';

$html .= '<ul class="nav nav-tabs" id="myTab">'.
				'<li class="active"><a data-toggle="tab" href="#roles"><i class="green ace-icon fa fa-home bigger-120"></i>ROLES</a></li>';
				if (getPermiso($idRol, "admPrivilegios")) {
					if(strcmp($id, '-1')!=0){
						$html .= '<li><a data-toggle="tab" href="#promover">Promover</a></li>'.
				    			 '<li><a data-toggle="tab" href="#revocar">Revocar</a></li>';
					}
				}
	$html .='</ul>'.
			'<div class="tab-content">'.
				'<div id="roles" class="tab-pane fade in active">'.
						'<div class="form-group">
						<label for="inputWarning" class="col-xs-12 col-sm-1 control-label no-padding-right">ROLES</label>
						<div class="col-xs-12 col-sm-3">
							<span class="block input-icon input-icon-right">
								<input id="nuevo_rol" name="nuevo_rol" type="text" id="inputWarning" class="width-100" value='.$rol.'>
								<i class="ace-icon fa fa-leaf"></i>
							</span>
						</div>
						<button onclick="admRolGuardar()" class="btn btn-primary">
							<i class="ace-icon fa fa-floppy-o bigger-120 "></i>
							Guardar
						</button>
					</div>'.
				'</div>';
		if (getPermiso($idRol, "admPrivilegios")) {
			if(strcmp($id, '-1')!=0){
				$html .= '<div id="promover" class="tab-pane fade"><table id="promoverTable" class="table  table-bordered table-hover">'.$promover.'</table></div>'.
		        		 '<div id="revocar" class="tab-pane fade"><table id="revocarTable" class="table  table-bordered table-hover">'.$revocar.'</table></div>';
			}
		}		
	        	
$html .= '</div>';

echo $html;
pg_close();
?>
