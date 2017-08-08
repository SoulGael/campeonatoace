<?php

include 'funcion/rol.php';
include '../conexion.php';
conectarse();

//Recibir los datos ingresados en el formulario
$id = $_POST['id'];

$nombre = "";
$cedula = "";
$carrera = "";
$tarjeta = "";

$html = "";

$resultado=getTarjeta($id);
while($fila=pg_fetch_array($resultado)){
	$nombre = $fila['razon_social'];;
	$cedula = $fila['cedula'];;
	$carrera = $fila['carrera'];;
	$tarjeta = $fila['tarjeta'];;
}

$html .= '<input type="hidden"  id="id_tarjeta" name="id_tarjeta" value="'.$id.'">
<button type="button" onclick="admImprimirTarjetas('.$id.')" class="btn btn-primary btn-sm">
	<i class="ace-icon fa fa-key bigger-110"></i>Imprimir
</button>';

$html .= '<form class="form-horizontal" role="form">
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right">Nombres</label>
				<div class="col-sm-10">
					<span class="input-icon input-icon-right">
						<input id="nuevo_rol" name="nuevo_rol" type="text" id="form-field-icon-2" value="'.$nombre.'" disable />
						<i class="ace-icon fa fa-leaf green"></i>
					</span>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right">Cédula</label>
				<div class="col-sm-10">
					<span class="input-icon input-icon-right">
						<input id="nuevo_rol" name="nuevo_rol" type="text" id="form-field-icon-2" value="'.$cedula.'" disable/>
						<i class="ace-icon fa fa-leaf green"></i>
					</span>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right">Carrera</label>
				<div class="col-sm-10">
					<span class="input-icon input-icon-right">
						<input id="nuevo_rol" name="nuevo_rol" type="text" id="form-field-icon-2" value="'.$carrera.'" disable/>
						<i class="ace-icon fa fa-leaf green"></i>
					</span>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right">Tipo de Tarjeta</label>
				<div class="col-sm-10">
					<span class="input-icon input-icon-right">
						<input id="nuevo_rol" name="nuevo_rol" type="text" id="form-field-icon-2" value="'.$tarjeta.'" disable/>
						<i class="ace-icon fa fa-leaf green"></i>
					</span>
				</div>
			</div>
		</form>';



$html .='</tbody>
		</table>

		<button type="button" onclick="admTarjetaGuardar()" class="btn btn-primary btn-sm">
			<i class="ace-icon fa fa-key bigger-110"></i>Pagar
		</button>';

echo $html;
pg_close();
?>
