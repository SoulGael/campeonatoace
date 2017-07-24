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
if(pg_num_rows($resultado)!=0){
	while($fila=pg_fetch_array($resultado)){
		$lista .= '';
		$listaParaleo = '<ul uk-accordion>';
		
		$nivel=$fila['nivel'];
		$i=0;
		$j=0;

		$resultadoA=getAlumnosCarreras($carrera,$nivel,$diciplina,$campeonato,$getGenero, $modalidad);
		while($filaA=pg_fetch_array($resultadoA)){
			$razon_social=$filaA['razon_social'];
			$genero=$filaA['genero'];
			$id_alumno=$filaA['id_alumno'];
			$paralelo=$filaA['paralelo'];
			if($i==0){
				$lista.='<li><h6 class="uk-accordion-title">'.$nivel.'</h6><div class="uk-accordion-content">';
				//$lista.='<table class="uk-table uk-table-hover uk-table-middle uk-table-divider"><tbody>';
				$i++;
			}
			if($j==0){
				$paraleloAnterior=$paralelo;
				$listaParaleo.='<li><h6 class="uk-accordion-title">'.$paralelo.'</h6><div class="uk-accordion-content">';
				$listaParaleo.='<table class="uk-table uk-table-hover uk-table-middle uk-table-small uk-table-divider"><tbody>';
				$j++;
			}
			if(strcmp($paralelo, $paraleloAnterior)==0){
				$listaParaleo.='<tr><td><input class="uk-checkbox" type="checkbox" value="'.$id_alumno.'" name="alumnosTab"></td> <td class="uk-table-link"><a class="uk-link-reset" >'.$razon_social.' ('.$genero.')</a> </td> <td><input class="uk-input uk-form-width-xsmall" type="text" name="alumnoNumTab" placeholder="Nro"></td> </tr>';
			}else{
				$listaParaleo .= '</tbody></table>';
				$listaParaleo.='<li><h6 class="uk-accordion-title">'.$paralelo.'</h6><div class="uk-accordion-content">';
				$listaParaleo.='<table class="uk-table uk-table-hover uk-table-middle uk-table-small uk-table-divider"><tbody>';
				$listaParaleo.='<tr><td><input class="uk-checkbox" type="checkbox" value="'.$id_alumno.'" name="alumnosTab"></td> <td class="uk-table-link"><a class="uk-link-reset" >'.$razon_social.' ('.$genero.')</a> </td> <td><input class="uk-input uk-form-width-xsmall" type="text" name="alumnoNumTab" placeholder="Nro"></td> </tr>';
				$paraleloAnterior=$paralelo;
			}

		}
		if($j==1){
			$listaParaleo .= '</tbody></table></div></li></ul>';
		}
		if($i==1){
			//$lista .= $listaParaleo.'</tbody></table></div></li>';
			$lista .= $listaParaleo.'</div></li>';
		}
		
		
	}
}
$lista .= ''.
$html = "";

$html .= '<ul uk-accordion>'.$lista.'</ul>';

//$html .= '<ul uk-accordion="collapsible: false">'.$lista.'<ul>';

echo $html;
pg_close();