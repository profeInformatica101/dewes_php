<?php
/* Establecemos el content-type. */
header('Content-Type: application/json');

/* Creamos el contenido del Servicio. */
$array = array("peon"=>1, "caballo"=>3, "alfil"=>3, "torre"=>5, "dama"=>10);

/* Codificamos el contenido. */
$json = json_encode($array);

/* Devolvemos el contenido como JSON */
echo $json;
?>