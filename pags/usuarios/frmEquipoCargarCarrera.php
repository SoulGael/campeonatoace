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
											<a data-toggle="tab" href="#'.$nivel.'"><i class="pink ace-icon fa fa-tachometer bigger-110"></i>'.$nivel.'</a>
										</li>';
				$nivelMenuContenido.='<div id="'.$nivel.'" class="tab-pane">';
				$i++;
			}
			if($j==0){
				$paraleloAnterior=$paralelo;
				$nivelParalelo.='<li>
													<a data-toggle="tab" href="#'.$paralelo.'">Paralelo '.$paralelo.'</a>
												</li>';
				$j++;
			}
			if(strcmp($paralelo, $paraleloAnterior)==0){
				//$nivelMenuContenido.='<input class="uk-checkbox" type="checkbox" value="'.$id_alumno.'" name="alumnosTab">'.$razon_social.' ('.$genero.')
				//										<input class="uk-input uk-form-width-xsmall" type="text" name="alumnoNumTab" placeholder="Nro">';
				//$j++;
			}else{
				//$listaParaleo .= '</tbody></table>';
				$nivelParalelo.='<li>
													<a data-toggle="tab" href="#'.$paralelo.'">Paralelo '.$paralelo.'</a>
												</li>';
			/*	$listaParaleo.='<li><h6 class="uk-accordion-title">'.$paralelo.'</h6><div class="uk-accordion-content">';
				$listaParaleo.='<table class="uk-table uk-table-hover uk-table-middle uk-table-small uk-table-divider"><tbody>';
				$listaParaleo.='<tr><td><input class="uk-checkbox" type="checkbox" value="'.$id_alumno.'" name="alumnosTab"></td> <td class="uk-table-link"><a class="uk-link-reset" >'.$razon_social.' ('.$genero.')</a> </td> <td><input class="uk-input uk-form-width-xsmall" type="text" name="alumnoNumTab" placeholder="Nro"></td> </tr>';
				*/$paraleloAnterior=$paralelo;
			}

		}

		if($j==1){
			$nivelParalelo .= '</ul>';
			$nivelParaleloContenido .='</ul>';
			$nivelMenuContenido .= '<div class="tabbable">'.$nivelParalelo.'</div>';
		}

		if($i==1){
			$nivelMenuContenido .= '</div>';
			//$lista .= $listaParaleo.'</tbody></table></div></li>';
			//$lista .= $listaParaleo.'</div></li>';
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
