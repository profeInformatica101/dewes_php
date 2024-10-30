<?php

$url ="https://raw.githubusercontent.com/profeInformatica101/dewes_php/refs/heads/main/Ejemplo/JSON/test.json";
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
$data = json_decode($response);
echo "Nombre proyecto: " . $data->proyectos[0]->nombre;