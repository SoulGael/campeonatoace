<?php

include 'funcion/futbol.php';
include '../conexion.php';
conectarse();

//Recibir los datos ingresados en el formulario
$idCampeonato = $_POST['idCampeonato'];
$id = $_POST['id'];
$equipo = "";
$Seleccionados = "";
$html = "";

$htmlCabecera = "";
	$htmlCuerpo = "";

if (strcmp($idCampeonato, "-1")!=0) {

	

	$diciplina = getDato(" diciplina ", " vta_diciplina ", " id_diciplina=".$id." ");

		$htmlCabecera .= "<h4>".$diciplina."</h4>";
		
		$htmlVarones = "";
		$htmlMujeres = "";

		$htmlCuerpo .= '<ul uk-tab><li><a href="#">MASCULINO</a></li>'.
						  '<li><a href="#">FEMENINO</a></li></ul><ul class="uk-switcher uk-margin">';
						
		$htmlVarones .=	'<li><ul uk-accordion>';

		$htmlMujeres .=	'<li><table class="uk-table uk-table-divider">'.
					    '<tbody>';

		$resultadoVarones=getGrupoFutbol($idCampeonato, $id,"true");

		while($filaVarones=pg_fetch_array($resultadoVarones)){ 
			$idGrupoFutbol = $filaVarones["id_grupo_futbol"];
			$equipo = $filaVarones["equipo"];
			$htmlVarones .= '<li><h4 class="uk-accordion-title uk-text-left">'.$equipo.'</h4>';
			$htmlVarones .= '<div class="uk-accordion-content">';
				$htmlVarones.= '<table class="uk-table uk-table-divider uk-text-left">
									<thead><tr>
										<th>Equipo 1</th>
										<th>VS</th>
										<th>Equipo 2</th>
										<th>Fecha</th>
										<th>Hora</th>
										<th>Estado</th>
									</tr></thead>
								<tbody>';

				$resultadoVaronesJuegos=getGrupoFutbolJuegos($idGrupoFutbol);
				while($filaVaronesJuegos=pg_fetch_array($resultadoVaronesJuegos)){
					$equipoa = $filaVaronesJuegos["equipo_a"];
					$equipob = $filaVaronesJuegos["equipo_b"];
					$fechaJuego = $filaVaronesJuegos["fecha"];
					$txtEstado = $filaVaronesJuegos["txt_estado"];
					$hora = $filaVaronesJuegos["hora"];
					$golesa = $filaVaronesJuegos["goles_a"];
					$golesb = $filaVaronesJuegos["goles_b"];

					$htmlVarones .= "<tr><td class='uk-table-shrink'>".$equipoa."</td>".
										"<td class='uk-table-shrink'>".$golesa." - ".$golesb."</td>".
										"<td class='uk-table-shrink'>".$equipob."</td>".
										"<td class='uk-table-shrink'>".$fechaJuego."</td>".
										"<td class='uk-table-shrink'>".$hora."</td>";
					if (strcmp($txtEstado,"PROXIMO")==0) {
						$htmlVarones .= "<td class='uk-table-shrink uk-text-warning'>".$txtEstado."</td>";
					}
					if (strcmp($txtEstado,"FINALIZADO")==0) {
						$htmlVarones .= "<td class='uk-table-shrink uk-text-success'>".$txtEstado."</td>";
					}
					$htmlVarones .= "</tr>";
										
				}

			$htmlVarones .= '</tbody></table></div></li>';
			
		}

		$htmlVarones .= '</ul></li>';
		$htmlCuerpo .= $htmlVarones."</ul>";



}else{
	$html .= '<div class="uk-alert-danger" uk-alert>
			    <a class="uk-alert-close" uk-close></a>
			    <p>NO HA SELECCIONADO EL CAMPEONATO</p>
			</div>';
}
//
ini_set('max_execution_time', 300);



$html .= $htmlCabecera;

$html .= $htmlCuerpo;
		

echo $html;
pg_close();
?>