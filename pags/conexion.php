<?php
function conectarse() {
    if (!($conexion = pg_connect("host='localhost' port=5432 dbname='campeonato' user='postgres' password='postgres'")))
    //if (!($conexion = pg_connect("host='bdd.ibarra.com' port=5432 dbname='campeonato' user='postgres' password='12345'")))
    {
        exit();
    }
    else {
    }
    return $conexion;
}
?>
