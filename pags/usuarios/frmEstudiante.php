<?php

include 'funcion/estudiante.php';
include '../conexion.php';
conectarse();

//Recibir los datos ingresados en el formulario
$id = $_POST['id'];
$nombres = "";
$apellidos = "";
$cedula = "";
$sexo = "t";
$modalidad = "p";
$paralelo = "A";
$id_carrera = "";
$comboCarrera = "";

if(strcmp($id, '-1')!=0){
	$resultado=getEstudiante($id);

	if(pg_num_rows($resultado)!=0){
		if($fila=pg_fetch_array($resultado)){
			$nombres=$fila['nombres'];
			$apellidos=$fila['apellidos'];
			$cedula=$fila['cedula'];
			$sexo=$fila['sexo'];
			$modalidad=$fila['modalidad'];
			$paralelo=$fila['paralelo'];
			$id_carrera=$fila['id_carrera_actual'];
		}
	}
}
//.uk-active
$comboCarrera = equiposCombo($id_carrera);

$html = "";

$html .= '<input type="hidden" id="id_estudiante" name="id_estudiante" value="'.$id.'">
			
			<button type="button" onclick="admImprimirCarnet('.$id.')" class="btn btn-primary btn-sm">
				<i class="ace-icon fa fa-key bigger-110"></i>Imprimir
			</button>';

$html .= '
<div class="tabbable">
	<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
		<li class="active">
			<a data-toggle="tab" href="#tabAlumnos">Alumnos</a>
		</li>
		<li>
			<a data-toggle="tab" href="#tabArchivo">Subir Archivo</a>
		</li>

	</ul>
	
	<div class="tab-content">
		<div id="tabAlumnos" class="tab-pane in active">
		<form class="form-horizontal" role="form">
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right">Cédula</label>
				<div class="col-sm-10">
					<span class="input-icon input-icon-right">
						<input id="cedula_estudiante" name="cedula_estudiante" placeholder="Cedula..." type="text" value="'.$cedula.'"/>
						<i class="ace-icon fa fa-leaf green"></i>
					</span>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right">Nombres</label>
				<div class="col-sm-10">
					<span class="input-icon input-icon-right">
						<input id="nombre_estudiante" name="nombre" placeholder="Nombres..." type="text" value="'.$nombres.'"/>
						<i class="ace-icon fa fa-leaf green"></i>
					</span>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right">Apellidos</label>
				<div class="col-sm-10">
					<span class="input-icon input-icon-right">
						<input id="apellido_estudiante" name="apellido_estudiante" placeholder="Apellidos..."  type="text" value="'.$apellidos.'"/>
						<i class="ace-icon fa fa-leaf green"></i>
					</span>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Genero</label>

				<div class="col-sm-10">
					<span class="input-icon">
						<div class="radio">
							<label>
								<input type="radio" class="ace" name="sexo" id="sexom" value="true" '.($sexo== 't' ? 'checked' : '').' />
								<span class="lbl">Masculino</span>
							</label>
							<label>
								<input type="radio" class="ace" name="sexo" id="sexof" value="false" '.($sexo== 'f' ? 'checked' : '').' />
								<span class="lbl">Femenino</span>
							</label>
						</div>
					</span>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Modalidad</label>

				<div class="col-sm-10">
					<span class="input-icon">
						<div class="radio">
							<label>
								<input type="radio" class="ace" name="modalidad" id="modalidadp" value="p" '.($modalidad== 'p' ? 'checked' : '').' />
								<span class="lbl">Presencial</span>
							</label>
							<label>
								<input type="radio" class="ace" name="modalidad" id="modalidads" value="s" '.($modalidad== 's' ? 'checked' : '').' />
								<span class="lbl">Semi-presencial</span>
							</label>
						</div>
					</span>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right">Carrera</label>
				<div class="col-sm-10">
					<span class="input-icon input-icon-right">
						<select class="form-control" name="cmbCarrera" id="cmbCarrera">'.$comboCarrera.'</select>
					</span>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right">Paralelo</label>
				<div class="col-sm-10">
					<span class="input-icon input-icon-right">
						<input id="id_paralelo" name="id_paralelo" placeholder="Paralelo..."  type="text" value="'.$paralelo.'"/>
						<i class="ace-icon fa fa-leaf green"></i>
					</span>
				</div>
			</div>

		</form>

			<button type="button" onclick="admEstudianteGuardar()" class="btn btn-primary btn-sm">
				<i class="ace-icon fa fa-key bigger-110"></i>Guardar
			</button>

		</div>
		<div id="tabArchivo" class="tab-pane">

		<div class="input-group input-xlarge">
			<input id="archivo" name="archivo" type="file" accept=".csv" />
			<span>
				<br><button type="button" class="btn btn-primary btn-sm" onclick="uploadAjax()" >
					<span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
					Subir
				</button>
			</span>
		</div>
	</div>
</div>';

echo $html;
pg_close();
?>