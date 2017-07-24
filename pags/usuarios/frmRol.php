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
			$revocar.='<tr><td><input class="uk-checkbox" type="checkbox" value="'.$id_pagina.'" name="revocarTab"></td> <td class="uk-table-link"><a class="uk-link-reset uk-text-left" >'.$descripcion.' </a> </td> </tr>';

			
		}
		$revocar .= '<tr><td colspan=2 class="uk-text-left"><button class="uk-button uk-button-primary" onclick="admRevocarGuardar()">Revocar</button><td><tr>';
		$revocar .= '</tbody>';
	}

	$allPrivilegio = getPromover($id);

	if(pg_num_rows($allPrivilegio)!=0){
		
		$promover = '<tbody>';
		while($filaPrivilegio=pg_fetch_array($allPrivilegio)){
			
			$id_pagina=$filaPrivilegio['id_pagina'];
			$descripcion=$filaPrivilegio['descripcion'];
			$promover.='<tr><td><input class="uk-checkbox" type="checkbox" value="'.$id_pagina.'" name="promoverTab"></td> <td class="uk-table-link"><a class="uk-link-reset uk-text-left" >'.$descripcion.' </a> </td> </tr>';

			
		}
		$promover .= '<tr><td colspan=2 class="uk-text-left"><button class="uk-button uk-button-primary" onclick="admPromoverGuardar()">Promover</button><td><tr>';
		$promover .= '</tbody>';
	}


}

$html = "";

$html .= '<input type="hidden" id="id_rol" name="id_rol" value="'.$id.'">';

$html .= '<ul uk-tab>'.
				'<li ><a href="#">ROLES</a></li>';
				if (getPermiso($idRol, "admPrivilegios")) {
					if(strcmp($id, '-1')!=0){
						$html .= '<li><a href="#">Promover</a></li>'.
				    			 '<li><a href="#">Revocar</a></li>';
					}
				}
	$html .='</ul>'.
			'<ul class="uk-switcher uk-margin">'.
	        	'<li>'.
	        		'<div class="uk-margin uk-text-left" >'.
				        'ROL: <input id="nuevo_rol" name="nuevo_rol" class="uk-input uk-form-width-medium uk-form-small" type="text" value="'.$rol.'">'.
				        '<hr class="uk-divider-icon">'.
				        '<button class="uk-button uk-button-primary" onclick="admRolGuardar()">Guardar</button>'.
				    '</div>'.
				'</li>';
		if (getPermiso($idRol, "admPrivilegios")) {
			if(strcmp($id, '-1')!=0){
				$html .= '<li><table class="uk-table uk-table-hover uk-table-divider">'.$promover.'</table></li>'.
		        		 '<li><table class="uk-table uk-table-hover uk-table-divider">'.$revocar.'</table></li>';
			}
		}		
	        	
$html .= '</ul>';

echo $html;
pg_close();
?>
