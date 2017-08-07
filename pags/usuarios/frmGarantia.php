<?php

include 'funcion/rol.php';
include '../conexion.php';
conectarse();

//Recibir los datos ingresados en el formulario
$id = $_POST['id'];






$html = "";

$html .= '<input type="hidden"  id="id_garantia" name="id_garantia" value="'.$id.'">';
$html .= '<table id="simple-table" class="table  table-bordered table-hover">
			<thead>
				<tr>
					<th>Equipo</td>
					<th>Fecha</td>
					<th>Genero</td>
					<th>Disciplina</td>
				</tr>
			</thead>

			<tbody>';

			$resultado=getGarantia($id);
			while($fila=pg_fetch_array($resultado)){
				$equipo = $fila['equipo'];;
				$fecha = $fila['fecha'];;
				$genero = $fila['txt_genero'];;
				$diciplina = $fila['diciplina'];;

				$html .='<tr><td>'.$equipo.'</td>
						<td>'.$fecha.'</td>
						<td>'.$genero.'</td>
						<td>'.$diciplina.'</td></tr>';
			}
					
$html .='</tbody>
		</table>

		<button type="button" onclick="admCampeonatoGuardar()" class="btn btn-info btn-sm">
			<i class="ace-icon fa fa-key bigger-110"></i>Guardar
		</button>';

echo $html;
pg_close();
?>
