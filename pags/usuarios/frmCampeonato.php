<?php

include 'funcion/rol.php';
include '../conexion.php';
conectarse();

//Recibir los datos ingresados en el formulario
$id = $_POST['id'];
$campeonato = "";
$f_inicio = "";
$f_inscripcion = "";
$ch = "";
$cm = "";
$c_equipos = "";
$v_inscripcion = "";
$v_garantia = "";
$d_habilitantes = "";
$f_inauguracion = "";
$p_equipos = "";
$m_control = "";
$arbitraje = "";
$coorDiciplina = "";
$contacto = "";

$diciplina = "";

if(strcmp($id, '-1')!=0){
	$resultado=getCampeonato($id);

	if(pg_num_rows($resultado)!=0){
		if($fila=pg_fetch_array($resultado)){
			$campeonato = $fila['campeonato'];
			$f_inicio = $fila['fecha_inicio'];
			$f_inscripcion = $fila['fecha_max_inscripcion'];
			$ch = $fila['varones'];
			$cm = $fila['damas'];
			$c_equipos = $fila['conformacion_equipos'];
			$v_inscripcion = $fila['valor_ins'];
			$v_garantia = $fila['valor_gar'];
			$d_habilitantes = $fila['doc_habilitantes'];
			$f_inauguracion = $fila['fecha_inauguracion'];
			$p_equipos = $fila['presentacion_equipos'];
			$m_control = $fila['mesa_control'];
			$arbitraje = $fila['arbitraje'];
			$coorDiciplina = $fila['coor_diciplina'];
			$contacto = $fila['contacto_sugerencia'];
		}
	}
}

$diciplina=getDiciplina($id);

$c_equipos=str_replace('<br>', "\r\n", $c_equipos);
$d_habilitantes=str_replace('<br>', "\r\n", $d_habilitantes);
$m_control=str_replace('<br>', "\r\n", $m_control);
$arbitraje=str_replace('<br>', "\r\n", $arbitraje);
$coorDiciplina=str_replace('<br>', "\r\n", $coorDiciplina);
$contacto=str_replace('<br>', "\r\n", $contacto);
$p_equipos=str_replace('<br>', "\r\n", $p_equipos);


$html = "";

$html .= '<input type="hidden"  id="id_campeonato" name="id_campeonato" value="'.$id.'">';
$html .= '<form class="form-horizontal" role="form">
			<p class="label label-info arrowed-right arrowed-in">SOCIALIZACIÓN</p>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right">Nombre del Campeonato</label>
				<div class="col-sm-10">
					<span class="input-icon input-icon-right">
						<input id="nombre_campeonato" name="nombre_campeonato" type="text" value="'.$campeonato.'"/>
						<i class="ace-icon fa fa-leaf green"></i>
					</span>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right">Fecha de Inicio</label>
				<div class="col-sm-10">
					<span class="input-icon input-icon-right">
						<input id="f_inicio" name="f_inicio" type="text" value="'.$f_inicio.'" data-date-format="dd-mm-yyyy" placeholder="dd/mm/YYYY..." />
						<i class="ace-icon fa fa-leaf green"></i>
					</span>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right">Fecha Maxima de Inscripcion:</label>
				<div class="col-sm-10">
					<span class="input-icon input-icon-right">
						<input id="f_inscripcion" name="f_inscripcion" type="text" value="'.$f_inscripcion.'" data-date-format="dd-mm-yyyy" placeholder="dd/mm/YYYY..." />
						<i class="ace-icon fa fa-leaf green"></i>
					</span>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Disciplinas</label>
					<div class="col-sm-10">
					<span class="input-icon">
						'.$diciplina.'
					</span>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Categorias</label>
					<div class="col-sm-10">
					<span class="input-icon">
						<div class="checkbox">
							<label>
								<input name="form-field-checkbox" type="checkbox" class="ace" name="ch" id="ch" value="1" '.($ch== 't' ? 'checked' : '').'/>
								<span class="lbl"> Hombres</span>
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input name="form-field-checkbox" type="checkbox" class="ace" name="cm" id="cm" value="2" '.($cm== 't' ? 'checked' : '').'/>
								<span class="lbl"> Mujeres</span>
							</label>
						</div>
					</span>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Conformación de Equipos</label>
				<div class="col-sm-10">
					<span class="input-icon">
						<textarea class="form-control" id="c_equipos" name="c_equipos" placeholder="El equipo puede estar conformado...">'.$c_equipos.'</textarea>
					</span>
				</div>
			</div>

			<p class="label label-info arrowed-right arrowed-in">REQUISITOS</p>

			<div class="form-group">
				<label class="col-sm-2 control-label">Valor de Inscripción</label>
				<div class="col-sm-10">
					<span class="input-icon input-icon-right">
						<input id="v_inscripcion" name="v_inscripcion" value="'.$v_inscripcion.'" type="text" placeholder="Valor Inscripcion..."/>
						<i class="ace-icon fa fa-leaf green"></i>
					</span>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Valor Garantia</label>
				<div class="col-sm-10">
					<span class="input-icon input-icon-right">
						<input type="text" id="v_garantia" name="v_garantia" value="'.$v_garantia.'" placeholder="Valor Garantia..."/>
						<i class="ace-icon fa fa-leaf green"></i>
					</span>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Documentos Habilitantes </label>
				<div class="col-sm-10">
					<span class="input-icon">
						<textarea class="form-control" id="d_habilitantes" name="d_habilitantes" placeholder="1.- Ficha de Inscripcripcion....">'.$d_habilitantes.'</textarea>
					</span>
				</div>
			</div>

			<p class="label label-info arrowed-right arrowed-in">REQUISITOS</p>

			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right">Fecha de Inauguracion:</label>
				<div class="col-sm-10">
					<span class="input-icon input-icon-right">
						<input id="f_inauguracion" name="f_inauguracion" type="text" value="'.$f_inauguracion.'" data-date-format="dd-mm-yyyy" placeholder="dd/mm/YYYY..." />
						<i class="ace-icon fa fa-leaf green"></i>
					</span>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Presentacion de Equipos </label>
				<div class="col-sm-10">
					<span class="input-icon">
						<textarea class="form-control" id="p_equipos" name="p_equipos" placeholder="Los equipos deberan...">'.$p_equipos.'</textarea>
					</span>
				</div>
			</div>

			<p class="label label-info arrowed-right arrowed-in">Datos Importantes Adicionales</p>

			<div class="form-group">
				<label class="col-sm-2 control-label">Mesa de Control </label>
				<div class="col-sm-10">
					<span class="input-icon">
						<textarea class="form-control" id="m_control" name="m_control" placeholder="Se designara de forma...">'.$m_control.'</textarea>
					</span>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Arbitraje </label>
				<div class="col-sm-10">
					<span class="input-icon">
						<textarea class="form-control" id="arbitraje" name="arbitraje" placeholder="El valor de USD...">'.$arbitraje.'</textarea>
					</span>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Coordinadores por Diciplina </label>
				<div class="col-sm-10">
					<span class="input-icon">
						<textarea class="form-control" id="coorDiciplina" name="coorDiciplina" placeholder="Lcd. Ing. Dr.">'.$coorDiciplina.'</textarea>
					</span>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Contacto, sugerencia e inquietudes </label>
				<div class="col-sm-10">
					<span class="input-icon">
						<textarea class="form-control" id="contacto" name="contacto" placeholder="direccion@uniandes.edu.ec">'.$contacto.'</textarea>
					</span>
				</div>
			</div>

		</form>

		<button type="button" onclick="admCampeonatoGuardar()" class="btn btn-info btn-sm">
			<i class="ace-icon fa fa-key bigger-110"></i>Guardar
		</button>';

echo $html;
pg_close();
?>
