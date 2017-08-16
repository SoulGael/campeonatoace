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

		$htmlCuerpo .= '<div class="tabbable">
							<ul class="nav nav-tabs" id="myTab">
								<li class="active">
									<a data-toggle="tab" href="#tabHombres">
										<i class="green ace-icon fa fa-home bigger-120"></i>
										Hombres
									</a>
								</li>
								<li>
									<a data-toggle="tab" href="#tabMujeres">
										Mujeres
										<i class="green ace-icon fa fa-home bigger-120"></i>
									</a>
								</li>
							</ul>
						<div class="tab-content">';
						
		$htmlVarones .=	'<div id="tabHombres" class="tab-pane fade in active"><div class="row">';


		$resultadoVarones=getGrupoFutbol($idCampeonato, $id,"true");

		while($filaVarones=pg_fetch_array($resultadoVarones)){ 
			$idGrupoFutbol = $filaVarones["id_grupo_futbol"];
			$equipo = $filaVarones["equipo"];
			$htmlVarones .= '<div class="col-sm-6"><div class="col-xs-11 label label-lg label-info arrowed-in arrowed-right">
								<b>'.$equipo.'</b>
							</div> ';

			//$htmlVarones .= '<div class="uk-accordion-content">';
				$htmlVarones.= '<table id="simple-table" class="table  table-bordered table-hover">
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

					$htmlVarones .= "<tr><td>".$equipoa."</td>".
										"<td>".$golesa." - ".$golesb."</td>".
										"<td>".$equipob."</td>".
										"<td>".$fechaJuego."</td>".
										"<td>".$hora."</td>";
					if (strcmp($txtEstado,"PROXIMO")==0) {
						$htmlVarones .= "<td class='red'>".$txtEstado."</td>";
					}
					if (strcmp($txtEstado,"FINALIZADO")==0) {
						$htmlVarones .= "<td class='green'>".$txtEstado."</td>";
					}
					$htmlVarones .= "</tr>";
										
				}

			$htmlVarones .= '</tbody></table></div>';
			
		}

		$htmlVarones .= '</div></div>';

		$htmlMujeres .=	'<div id="tabMujeres" class="tab-pane"><div class="row">';


		$resultadoMujeres=getGrupoFutbol($idCampeonato, $id,"false");

		while($filaMujeres=pg_fetch_array($resultadoMujeres)){ 
			$idGrupoFutbol = $filaMujeres["id_grupo_futbol"];
			$equipo = $filaMujeres["equipo"];
			$htmlMujeres .= '<div class="col-sm-6"><div class="col-xs-11 label label-lg label-info arrowed-in arrowed-right">
								<b>'.$equipo.'</b>
							</div> ';

			//$htmlVarones .= '<div class="uk-accordion-content">';
				$htmlMujeres.= '<table id="simple-table" class="table  table-bordered table-hover">
									<thead><tr>
										<th>Equipo 1</th>
										<th>VS</th>
										<th>Equipo 2</th>
										<th>Fecha</th>
										<th>Hora</th>
										<th>Estado</th>
									</tr></thead>
								<tbody>';

				$resultadoMujeresJuegos=getGrupoFutbolJuegos($idGrupoFutbol);
				while($filaMujeresJuegos=pg_fetch_array($resultadoMujeresJuegos)){
					$equipoa = $filaMujeresJuegos["equipo_a"];
					$equipob = $filaMujeresJuegos["equipo_b"];
					$fechaJuego = $filaMujeresJuegos["fecha"];
					$txtEstado = $filaMujeresJuegos["txt_estado"];
					$hora = $filaMujeresJuegos["hora"];
					$golesa = $filaMujeresJuegos["goles_a"];
					$golesb = $filaMujeresJuegos["goles_b"];

					$htmlMujeres .= "<tr><td>".$equipoa."</td>".
										"<td>".$golesa." - ".$golesb."</td>".
										"<td>".$equipob."</td>".
										"<td>".$fechaJuego."</td>".
										"<td>".$hora."</td>";
					if (strcmp($txtEstado,"PROXIMO")==0) {
						$htmlMujeres .= "<td class='red'>".$txtEstado."</td>";
					}
					if (strcmp($txtEstado,"FINALIZADO")==0) {
						$htmlMujeres .= "<td class='green'>".$txtEstado."</td>";
					}
					$htmlMujeres .= "</tr>";
										
				}

			$htmlMujeres .= '</tbody></table></div>';
			
		}

		$htmlMujeres .= '</div></div>';



		$htmlCuerpo .=$htmlMujeres." ". $htmlVarones."</div>";



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