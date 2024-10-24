<?php
// Iniciar sesión o reanudar la existente
session_start();

// Función para generar la estructura HTML
function generarPagina($titulo, $contenido) {
    echo "<!DOCTYPE html>";
    echo "<html>";
    echo "<head>";
    echo "<title>$titulo</title>";
    echo "</head>";
    echo "<body>";
    echo "<h1>$titulo</h1>";
    echo $contenido;
    echo "</body>";
    echo "</html>";
}

// Comprobar si existe la sesión
if (!isset($_SESSION['nombre'])) {
    // Si no hay sesión, mostrar la página 1
    generarPagina("Pagina1", "<p>No has iniciado sesión.</p>");
} else {
    // Si hay sesión, mostrar la página 2
    $nombre = htmlspecialchars($_SESSION['nombre'], ENT_QUOTES, 'UTF-8');
    generarPagina("Pagina2", "<h2>Hola, $nombre</h2>");
}
?>
