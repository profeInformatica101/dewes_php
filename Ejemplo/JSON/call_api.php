<?php
// URL de la API de Star Wars para obtener información del planeta Tatooine
$url = "https://swapi.dev/api/people/13/";

// Inicializamos cURL
$ch = curl_init();

// Configuramos las opciones de cURL
curl_setopt($ch, CURLOPT_URL, $url);         // Establecemos la URL de la solicitud
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Para recibir la respuesta como string en lugar de imprimirla
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json'         // Especificamos que esperamos una respuesta en JSON
));

// Ejecutamos la solicitud
$response = curl_exec($ch);
//echo $response;


//Verificamos si hubo errores en la solicitud
if (curl_errno($ch)) {
    echo 'Error en la solicitud: ' . curl_error($ch);
} else {
    
    // Decodificamos el JSON para convertirlo en un array asociativo de PHP
    /** 
    $data = json_decode($response, true);
    print_r($data);
    */

    // Decodificamos el JSON para convertilo en un Objeto
    $data = json_decode($response);
    echo "Nombre: " . $data->name;
   
}

// Cerramos la conexión cURL
curl_close($ch);
?>