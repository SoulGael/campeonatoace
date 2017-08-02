<?php

include 'funcion/futbol.php';
include '../conexion.php';
conectarse();

//Recibir los datos ingresados en el formulario
$carrera = $_POST['carrera'];
$diciplina = $_POST['diciplina'];
$campeonato = $_POST['campeonato'];
$getGenero = $_POST['genero'];
$modalidad = $_POST['modalidad'];

$resultado=getNivelesCarreras($carrera);
//$resultado=getAlumnosCarreras($carrera);
$lista = '';

$nivelMenu = '<ul class="nav nav-tabs">';
$nivelMenuContenido = '<div class="tab-content">';
if(pg_num_rows($resultado)!=0){
	while($fila=pg_fetch_array($resultado)){

		$nivel=$fila['nivel'];
		$nivelParalelo = '<ul class="nav nav-tabs">';
		$nivelParaleloContenido = '<div class="tab-content">';
		$i=0;
		$j=0;

		$resultadoA=getAlumnosCarreras($carrera,$nivel,$diciplina,$campeonato,$getGenero, $modalidad);
		while($filaA=pg_fetch_array($resultadoA)){
			$razon_social=$filaA['razon_social'];
			$genero=$filaA['genero'];
			$id_alumno=$filaA['id_alumno'];
			$paralelo=$filaA['paralelo'];
			if($i==0){
				$nivelMenu.='<li>
								<a data-toggle="tab" href="#'.$nivel.'"><i class="blue ace-icon fa fa-tachometer bigger-110"></i><b>'.$nivel.'</b></a>
							</li>';
				$nivelMenuContenido.='<div id="'.$nivel.'" class="tab-pane">';
				$i++;
			}
			if($j==0){
				$paraleloAnterior=$paralelo;
				$nivelParalelo.='<li>
									<a data-toggle="tab" href="#'.$paralelo.'-'.$nivel.'">Paralelo '.$paralelo.'</a>
								</li>';
				$nivelParaleloContenido.='<div id="'.$paralelo.'-'.$nivel.'" class="tab-pane"><table id="simple-table" class="table  table-bordered table-hover">';
				$j++;
			}
			if(strcmp($paralelo, $paraleloAnterior)==0){
				$nivelParaleloContenido.='<tr>
											<td class="center" width="10%">
												<input type="checkbox" class="ace" value="'.$id_alumno.'" name="alumnosTab">
												<span class="lbl"></span>
											</td>
											<td>
												'.$razon_social.'
											</td>
											<td>
												<span class="input-icon input-icon-right">
													<input name="alumnoNumTab" type="text" placeholder="Nro.."/>
													<i class="ace-icon fa fa-leaf green"></i>
												</span>
											</td>
										</tr>';
			}else{
				$nivelParalelo.='<li>
									<a data-toggle="tab" href="#'.$paralelo.'-'.$nivel.'">Paralelo '.$paralelo.'</a>
								</li>';
				$nivelParaleloContenido.='</table></div><div id="'.$paralelo.'-'.$nivel.'" class="tab-pane">
											<table id="simple-table" class="table  table-bordered table-hover">
											<tr>
												<td class="center" width="10%">
													<input type="checkbox" class="ace" value="'.$id_alumno.'" name="alumnosTab">
													<span class="lbl"></span>
												</td>
												<td>
													'.$razon_social.'
												</td>
												<td>
													<span class="input-icon input-icon-right">
														<input name="alumnoNumTab" type="text" placeholder="Nro.."/>
														<i class="ace-icon fa fa-leaf green"></i>
													</span>
												</td>
											</tr>';
				$paraleloAnterior=$paralelo;
			}

		}

		if($j==1){
			$nivelParalelo .= '</ul>';
			$nivelParaleloContenido .='</table></div></div>';
			$nivelMenuContenido .= '<div class="tabbable">'.$nivelParalelo.' '.$nivelParaleloContenido.'</div>';
		}

		if($i==1){
			$nivelMenuContenido .= '</div>';
		}
	}
}

$nivelMenuContenido .='</div>';
$nivelMenu .= '</ul>';

$html = '';

$html .= '<div class="tabbable tabs-left col-sm-12">'.$nivelMenu.' '.$nivelMenuContenido.'</div>';

echo $html;
pg_close();
?>
