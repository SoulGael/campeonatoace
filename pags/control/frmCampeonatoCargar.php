<?php

include 'funcion/equipos.php';
include '../conexion.php';
conectarse();

//Recibir los datos ingresados en el formulario
$id = $_POST['id'];

$resultado=getEquipo($id);
$lista = '<thead>
			<tr>
				<th> </th>
				<th>Nro</th>
				<th>Nombres</th>
				<th> </th>
			</tr>';

$lista .= '</thead>';

$lista .= '<tbody>';
if(pg_num_rows($resultado)!=0){
	while($fila=pg_fetch_array($resultado)){
		$jugador=$fila['razon_social'];
		$id_alumno=$fila['id_alumno'];
		$num_camiseta=$fila['num_camiseta'];
		$ata= rand(0, 40);
		$def= rand(0, 40);
		$atajada= rand(0, 5);

		$lista.='<tr id="roja1'.$id_alumno.'" class="uk-text-left">
					<input type="hidden" id="id_ficha_control" name="id_ficha_control" value="'.$id.'">

					<td>
						<input type="checkbox" class="ace" name="capitan'.$id.'" onclick="dat('.$id.')"  value="'.$ata.','.$def.','.$atajada.'" />
						<span class="lbl"></span>
					</td>
					<td><input class="input-mini" type="hidden" name="alumnoNumTab" value="'.$num_camiseta.'">
						<p>'.$num_camiseta.'</p>
					</td>
					
					<td><p>'.$jugador.'</p> 
					<div class="progress">
					  <div class="progress-bar progress-bar-success" role="progressbar" style="width:'.$ata.'%">
					    Ataque
					  </div>
					  <div class="progress-bar progress-bar-warning" role="progressbar" style="width:'.$def.'%">
					    Defensa
					  </div>
					  <div class="progress-bar progress-bar-danger" role="progressbar" style="width:'.$atajada.'%">
					    Atajadas
					  </div>
					</div>
					<td>
						<a href="#" class="btn btn-app btn-primary btn-xs no-radius" onclick=gol('.$id.');sumarGol('.$id_alumno.');>
							GOL
							<span class="label label-inverse arrowed-in" id="resulSpan'.$id_alumno.'" >0</span>
						</a>
						<button class="btn btn-warning btn-xs" onclick=noGol('.$id.');restarGol('.$id_alumno.') >
							<i class="ace-icon fa fa-minus  bigger-110 icon-only"></i>
						</button>
					</td>
				</tr>';

		$resultadoTarjeta=getTarjetaDeuda($id_alumno);
		if(pg_num_rows($resultadoTarjeta)!=0){
			$lista.='<tr id="roja2'.$id_alumno.'">';
			while($filaTarjeta=pg_fetch_array($resultadoTarjeta)){
				$id_t=$filaTarjeta["id_tarjeta"];
				$t=$filaTarjeta["tarjeta"];
				$lista.="<td colspan='4'><button class='btn btn-danger btn-block' onclick=pagar(".$id_alumno.",".$id_t.")>DEBE DE UNA TARJETA ".$t." (PAGAR)</button></td>";
			}
			$lista.='</tr>';
		}
		else{
			$lista.='<tr id="roja2'.$id_alumno.'"><td colspan="4"><p uk-margin>
				    <button class="btn btn-sm btn-primary" onclick=mensaje();" >Tiro Puerta</button>
				    <button class="btn btn-sm btn-primary" onclick=mensaje(); >Despeje</button>
				    <button class="btn btn-sm btn-primary" onclick="mensaje()">Asitencia</button>
				    
				    <a href="#" class="btn btn-app btn-warning btn-xs no-radius" onclick="amarilla('.$id_alumno.')";>
						Amarilla
						<span class="label label-inverse arrowed-in" id="amarillaSpan'.$id_alumno.'" >0</span>
					</a>
				    <button class="btn btn-sm btn-danger" onclick=roja('.$id_alumno.')>Roja</button>
				</p></td><tr>';
		}
		
	}
}
$lista .= '</tbody>';
$html = "";

$html .= '<table id="simple-table" class="table  table-bordered table-hover">'.$lista.'</table>';

//$html .= '<ul uk-accordion="collapsible: false">'.$lista.'<ul>';

echo $html;
pg_close();

//value="true" '.($estado== 't' ? 'checked' : '').'
