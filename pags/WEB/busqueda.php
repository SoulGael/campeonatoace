<?php

include '../conexion.php';
conectarse();
//Inicio de variables de sesión
//Recibir los datos ingresados en el formulario
$select = $_POST['select'];
$from = $_POST['from'];
$where = $_POST['where'];
$onclick = $_POST['onclick'];
//Consultar si los datos son están guardados en la base de datos
$consulta="SELECT ".$select." FROM ".$from." ".$where.""; 
$resultado=pg_query($consulta) or die (pg_last_error());

$html = "";

$html .= '<table class="uk-table uk-table-middle">'.
			'<thead>'.
				'<tr>';
$headArray = explode(",", $select);
for ($i=1; $i < count($headArray); $i++) { 
	$html .= '<th>'.$headArray[$i].'</th>';
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
		for ($i=1; $i < count($headArray); $i++) { 
			$html.='<td class="uk-table-shrink uk-text-nowrap">'.$fila[$i].'<td>';
		}
    	$html.='</tr>';
    }
}

$html .= '</tbody></table>';
    //<caption>Table Caption</caption> 

echo $html;
?>