<?php
// Iniciar sesión o reanudar la existente
session_start();

// Inicializar la lista de productos en la sesión si no existe
if (!isset($_SESSION['lista_compras'])) {
    $_SESSION['lista_compras'] = array();
}

// Comprobar si se ha enviado un nuevo producto desde el formulario
if (isset($_POST['producto']) && !empty($_POST['producto'])) {
    $producto = htmlspecialchars($_POST['producto'], ENT_QUOTES, 'UTF-8');
    // Agregar el producto al array de la lista de compras en la sesión
    $_SESSION['lista_compras'][] = $producto;
}

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

// Generar el contenido del formulario y la lista de productos
$contenido = "<form method='POST'>
                <label for='producto'>Agregar un producto:</label>
                <input type='text' id='producto' name='producto'>
                <input type='submit' value='Agregar'>
              </form>";

// Mostrar la lista de productos si existen
if (!empty($_SESSION['lista_compras'])) {
    $contenido .= "<h2>Lista de compras:</h2><ul>";
    foreach ($_SESSION['lista_compras'] as $producto) {
        $contenido .= "<li>" . $producto . "</li>";
    }
    $contenido .= "</ul>";
}

// Añadir un botón para finalizar y limpiar la lista de productos
$contenido .= "<form method='POST'>
                <input type='submit' name='finalizar' value='Finalizar y limpiar lista'>
              </form>";

// Si el usuario decide finalizar, limpiar la lista de productos
if (isset($_POST['finalizar'])) {
    $_SESSION['lista_compras'] = array();
    $contenido = "<p>Has finalizado la lista de compras. La lista ha sido limpiada.</p>";
}

// Mostrar la página
generarPagina("Lista de compras", $contenido);
?>
