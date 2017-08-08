<?php
include 'funcion/rol.php';
include '../conexion.php';
conectarse();
// reference the Dompdf namespace
require_once '../dompdf/autoload.inc.php';
// instantiate and use the dompdf class
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

$id = $_GET['id'];

$html = '<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Campeonato Uniandes</title>

		<meta name="description" content="Aplicación web realizada para la Universidad Reginal Autónoma de los Andes Uniandes ext Ibarra" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="../assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="../assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="../assets/css/jquery.gritter.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="../assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="../assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="../assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="../assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="../assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="../assets/css/bootstrap-datepicker3.min.css" />
		<link rel="stylesheet" href="../assets/css/bootstrap-timepicker.min.css" />
		<link rel="stylesheet" href="../assets/css/daterangepicker.min.css" />
		<link rel="stylesheet" href="../assets/css/bootstrap-datetimepicker.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="../assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- ace settings handler -->
		<script src="../assets/js/jquery-2.1.4.min.js"></script>
		<script src="../assets/js/ace-extra.min.js"></script>
		<script src="../js/js.js"></script>
		<script src="../assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="../assets/js/jquery.gritter.min.js"></script>

		<!-- page specific plugin scripts Table -->
		<script src="../assets/js/jquery.dataTables.min.js"></script>
		<script src="../assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="../assets/js/dataTables.buttons.min.js"></script>

		<!--DATE TIME PICKER-->
		<script src="../assets/js/bootstrap-datepicker.min.js"></script>
		<script src="../assets/js/bootstrap-timepicker.min.js"></script>
		<script src="../assets/js/moment.min.js"></script>
		<script src="../assets/js/daterangepicker.min.js"></script>
		<script src="../assets/js/bootstrap-datetimepicker.min.js"></script>
		<!-- ace scripts -->
		<script src="../assets/js/ace-elements.min.js"></script>
		<script src="../assets/js/ace.min.js"></script>
	</head><body>';

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
		</table></body></html>';


$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();
?>
