/**
Realizar codificación para la transmisión por red usando TCP/IP en formato 'Content-Type: application/json' [HOST.ip:port] <-----|json|----> [HOST.ip:port] 
*/
<?php
// Función para enviar una respuesta en formato JSON
function enviarRespuestaJSON($data) {
    header('Content-Type: application/json');
    echo json_encode($data);
    exit();
}

?>