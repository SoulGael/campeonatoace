<?php
include 'funcion/estudiante.php';
include '../conexion.php';
conectarse();
//obtenemos el archivo .csv
//$nombre = addslashes(htmlspecialchars($_POST["nombre"]));
$tipo = $_FILES['archivo']['type']; 
$tamanio = $_FILES['archivo']['size']; 
$archivotmp = $_FILES['archivo']['tmp_name'];
 
//cargamos el archivo
$lineas = file($archivotmp);
 
//inicializamos variable a 0, esto nos ayudará a indicarle que no lea la primera línea
$i=0;

$observaciones="";
 
//Recorremos el bucle para leer línea por línea
foreach ($lineas as $linea_num => $linea)
{ 
   //abrimos bucle
   /*si es diferente a 0 significa que no se encuentra en la primera línea 
   (con los títulos de las columnas) y por lo tanto puede leerla*/
   if($i != 0) 
   { 
       //abrimos condición, solo entrará en la condición a partir de la segunda pasada del bucle.
       /* La funcion explode nos ayuda a delimitar los campos, por lo tanto irá 
       leyendo hasta que encuentre un ; */
       $datos = explode(";",$linea);
 
       //Almacenamos los datos que vamos leyendo en una variable
       $cedula = trim($datos[0]);
       $nombres = trim($datos[1]);	
       $apellidos = trim($datos[2]); 
       $paralelo = trim($datos[9]); 
       $sexo = (strtoupper(trim($datos[3]))== 'MASCULINO' ? 'true' : 'false') ;
       $id_carrera = getIdCarrera(strtoupper(trim($datos[6])), strtoupper(trim($datos[8])));
       $modalidad = ( strtolower(trim($datos[10]))== 'presencial' ? 'p' : 's') ;

       if(strcmp($id_carrera, '-1')!=0){
       	if(!estudianteRepetido($cedula)){
    			if(estudianteGuardar($nombres, $apellidos, $cedula, $sexo, $id_carrera, $modalidad, $paralelo)){
    				$mensaje = "Guardado Correctamente";
    				$res=true;
    			}
    		}else{
    			$mensaje = "Cedula Repetida";
    			$res=false;
    		}
       }else{
        $observaciones .= "El estudiante ".$cedula." tuvo problemas con el ingreso.<br>";
       }
       
 
       //guardamos en base de datos la línea leida
       //$hol .= $nombre;
 
       //cerramos condición
   }
 
   /*Cuando pase la primera pasada se incrementará nuestro valor y a la siguiente pasada ya 
   entraremos en la condición, de esta manera conseguimos que no lea la primera línea.*/
   $i++;
   //cerramos bucle
}
if(strcmp($observaciones, "")==0){
	$observaciones="NINGUNA";
}

echo json_encode($observaciones);
?>