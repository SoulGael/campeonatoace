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

/*$html .= '<table class="uk-table uk-table-middle">'.
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

$html .= '</tbody></table>';*/
    //<caption>Table Caption</caption>

$html .= '<div class="page-content">'.
	'<div class="row">'.
		'<div class="col-xs-12">'.
			'<div class="row">'.
				'<div class="col-xs-12">'.
					'<div>'.
						'<table id="dynamic-table" class="table table-striped table-bordered table-hover">'.
							'<thead>'.
								'<tr>'.
									'<th class="center">'.
										'<label class="pos-rel">'.
											'<input type="checkbox" class="ace" />'.
											'<span class="lbl"></span>'.
										'</label>'.
									'</th>'.
									'<th>sgu</th>'.
									'<th>Price</th>'.
									'<th class="hidden-480">Clicks</th>'.
									'<th>'.
										'<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>'.
										'Update'.
									'</th>'.
									'<th class="hidden-480">Status</th>'.
									'<th></th>'.
								'</tr>'.
							'</thead>'.
							'<tbody>'.
								'<tr>'.
									'<td class="center">'.
										'<label class="pos-rel">'.
											'<input type="checkbox" class="ace" />'.
											'<span class="lbl"></span>'.
										'</label>'.
									'</td>'.
									'<td>'.
										'<a href="#">app.com</a>'.
									'</td>'.
									'<td>$45</td>'.
									'<td class="hidden-480">3,330</td>'.
									'<td>Feb 12</td>'.
									'<td class="hidden-480">'.
										'<span class="label label-sm label-warning">Expiring</span>'.
									'</td>'.
									'<td>'.
										'<div class="hidden-sm hidden-xs action-buttons">'.
											'<a class="blue" href="#">'.
												'<i class="ace-icon fa fa-search-plus bigger-130"></i>'.
											'</a>'.
											'<a class="green" href="#">'.
												'<i class="ace-icon fa fa-pencil bigger-130"></i>'.
											'</a>'.
											'<a class="red" href="#">'.
												'<i class="ace-icon fa fa-trash-o bigger-130"></i>'.
											'</a>'.
										'</div>'.
										'<div class="hidden-md hidden-lg">'.
											'<div class="inline pos-rel">'.
												'<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">'.
													'<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>'.
												'</button>'.
												'<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">'.
													'<li>'.
														'<a href="#" class="tooltip-info" data-rel="tooltip" title="View">'.
															'<span class="blue">'.
																'<i class="ace-icon fa fa-search-plus bigger-120"></i>'.
															'</span>'.
														'</a>'.
													'</li>'.
													'<li>'.
														'<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">'.
															'<span class="green">'.
																'<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>'.
															'</span>'.
														'</a>'.
													'</li>'.
													'<li>'.
														'<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">'.
															'<span class="red">'.
																'<i class="ace-icon fa fa-trash-o bigger-120"></i>'.
															'</span>'.
														'</a>'.
													'</li>'.
												'</ul>'.
											'</div>'.
										'</div>'.
									'</td>'.
								'</tr>'.
								'<tr>'.
									'<td class="center">'.
										'<label class="pos-rel">'.
											'<input type="checkbox" class="ace" />'.
											'<span class="lbl"></span>'.
										'</label>'.
									'</td>'.
									'<td>'.
										'<a href="#">app.com</a>'.
									'</td>'.
									'<td>$45</td>'.
									'<td class="hidden-480">3,330</td>'.
									'<td>Feb 12</td>'.
									'<td class="hidden-480">'.
										'<span class="label label-sm label-warning">Expiring</span>'.
									'</td>'.
									'<td>'.
										'<div class="hidden-sm hidden-xs action-buttons">'.
											'<a class="blue" href="#">'.
												'<i class="ace-icon fa fa-search-plus bigger-130"></i>'.
											'</a>'.
											'<a class="green" href="#">'.
												'<i class="ace-icon fa fa-pencil bigger-130"></i>'.
											'</a>'.
											'<a class="red" href="#">'.
												'<i class="ace-icon fa fa-trash-o bigger-130"></i>'.
											'</a>'.
										'</div>'.
										'<div class="hidden-md hidden-lg">'.
											'<div class="inline pos-rel">'.
												'<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">'.
													'<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>'.
												'</button>'.
												'<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">'.
													'<li>'.
														'<a href="#" class="tooltip-info" data-rel="tooltip" title="View">'.
															'<span class="blue">'.
																'<i class="ace-icon fa fa-search-plus bigger-120"></i>'.
															'</span>'.
														'</a>'.
													'</li>'.
													'<li>'.
														'<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">'.
															'<span class="green">'.
																'<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>'.
															'</span>'.
														'</a>'.
													'</li>'.
													'<li>'.
														'<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">'.
															'<span class="red">'.
																'<i class="ace-icon fa fa-trash-o bigger-120"></i>'.
															'</span>'.
														'</a>'.
													'</li>'.
												'</ul>'.
											'</div>'.
										'</div>'.
									'</td>'.
								'</tr>'.
							'</tbody>'.
						'</table>'.
					'</div>'.
				'</div>'.
			'</div>'.
		'</div>'.
	'</div>'.
'</div>';

echo $html;
?>
