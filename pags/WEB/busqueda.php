<?php

include '../conexion.php';
conectarse();
//Inicio de variables de sesión
//Recibir los datos ingresados en el formulario
$select = $_POST['select'];
$from = $_POST['from'];
$where = $_POST['where'];
$onclick = $_POST['onclick'];
$head = $_POST['head'];
$tamanio = $_POST['tamanio'];
//Consultar si los datos son están guardados en la base de datos
$consulta="SELECT ".$select." FROM ".$from." ".$where."";
$resultado=pg_query($consulta) or die (pg_last_error());

$html = "";

$html .= '<table id="dynamic-table" class="table table-striped table-bordered table-hover">'.
			'<thead>'.
				'<tr>';
$selectArray = explode(",", $select);
$headArray = explode(",", $head);
$tamanioArray = explode(",", $tamanio);
for ($i=0; $i < count($headArray); $i++) {
	$html .= '<th width="'.$tamanioArray[$i].'%">'.$headArray[$i].'</th>';
}

$html .= '</tr>'.
		'</thead><tbody>';
if(pg_num_rows($resultado)!=0){
	while($fila=pg_fetch_array($resultado)){
		if (strcmp($onclick, "")==0) {
			$html.='<tr>';
		}
		else{
			$html.='<tr onclick='.$onclick.'("'.$fila[0].'")>';
		}
		for ($i=1; $i < count($selectArray); $i++) {
			$html.='<td>'.$fila[$i].'</td>';
		}
    	$html.='</tr>';
    }
}

$html .= '</tbody></table>';
    //<caption>Table Caption</caption>

echo $html;
?>
