<?php

include 'funcion/rol.php';
include '../conexion.php';
conectarse();

//Recibir los datos ingresados en el formulario
$id = $_POST['id'];
$idRol = "";
$usuario = "";
$estado = "t";

if(strcmp($id, '-1')!=0){
	$resultado=getUsuarios($id);

	if(pg_num_rows($resultado)!=0){
		if($fila=pg_fetch_array($resultado)){
			$idRol=$fila['id_rol'];
			$usuario=$fila['alias'];
			$estado=$fila['estado'];
		}
	}
}

$combo = rolcombo($idRol);

$html = "";

$html .= '<input type="hidden" id="id_usuario" name="id_usuario" value="'.$id.'">';

$html .= '<form class="form-horizontal" role="form">

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right">ROL</label>
				<div class="col-sm-9">
					<span class="input-icon input-icon-right">
					<select class="uk-select  uk-width-1-2@s" name="cmbRol" id="cmbRol">
					 '.$combo.'
					</select>
					</span>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right">Usuario</label>
				<div class="col-sm-9">
					<span class="input-icon input-icon-right">
						<input id="nuevo_usuario" name="nuevo_usuario" placeholder="Usuario" type="text" value="'.$usuario.'"/>
						<i class="ace-icon fa fa-leaf green"></i>
					</span>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right">Contraseña</label>
				<div class="col-sm-9">
					<span class="input-icon input-icon-right">
						<input id="nuevo_clave" placeholder="Contraseña" name="nuevo_clave" type="password" id="form-field-icon-2"/>
						<i class="ace-icon fa fa-leaf green"></i>
					</span>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Estado</label>

				<div class="col-sm-10">
					<span class="input-icon">
						<div class="radio">
							<label>
								<input type="radio" class="ace" name="estado" id="estadoa" value="true" '.($estado== 't' ? 'checked' : '').' />
								<span class="lbl">Activo</span>
							</label>
							<label>
								<input type="radio" class="ace" name="estado" id="estadoi" value="false" '.($estado== 'f' ? 'checked' : '').' />
								<span class="lbl">Inactivo</span>
							</label>
						</div>
					</span>
				</div>
			</div>
</form>

<button type="button" onclick="admUsuarioGuardar()" class="btn btn-info btn-sm">
	<i class="ace-icon fa fa-key bigger-110"></i>Guardar
</button>';

echo $html;
pg_close();
?>
