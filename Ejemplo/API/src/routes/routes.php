<?php
// Incluimos los controladores
require_once '../src/controladores/CategoriaController.php';
require_once '../src/controladores/ProductoController.php';
// Puedes incluir más controladores aquí...

// Función para procesar las rutas
function procesarRutas($request) {
    // Obtener el método HTTP usado en la solicitud (GET, POST, PUT, DELETE)
    $method = $_SERVER['REQUEST_METHOD'];

    // Limpiar la URI quitando los parámetros de consulta (?param)
    $request = strtok($request, '?');

    // Procesamos la ruta
    switch ($request) {
        // Rutas para categorías
        case '/categorias':
            $controller = new CategoriaController();
            if ($method == 'GET') {
                // Obtener todas las categorías
                $controller->getAll();
            } elseif ($method == 'POST') {
                // Crear una nueva categoría
                $controller->create();
            }
            break;

        case (preg_match('/^\/categorias\/(\d+)$/', $request, $matches) ? true : false):
            $controller = new CategoriaController();
            $id = $matches[1];
            if ($method == 'GET') {
                // Obtener una categoría por ID
                $controller->getById($id);
            } elseif ($method == 'PUT') {
                // Actualizar una categoría por ID
                $controller->update($id);
            } elseif ($method == 'DELETE') {
                // Eliminar una categoría por ID
                $controller->delete($id);
            }
            break;

        // Rutas para productos
        case '/productos':
            $controller = new ProductoController();
            if ($method == 'GET') {
                // Obtener todos los productos
                $controller->getAll();
            } elseif ($method == 'POST') {
                // Crear un nuevo producto
                $controller->create();
            }
            break;

        case (preg_match('/^\/productos\/(\d+)$/', $request, $matches) ? true : false):
            $controller = new ProductoController();
            $id = $matches[1];
            if ($method == 'GET') {
                // Obtener un producto por ID
                $controller->getById($id);
            } elseif ($method == 'PUT') {
                // Actualizar un producto por ID
                $controller->update($id);
            } elseif ($method == 'DELETE') {
                // Eliminar un producto por ID
                $controller->delete($id);
            }
            break;

        default:
            // Respuesta en caso de que la ruta no se encuentre
            http_response_code(404);
            echo json_encode(['error' => 'Ruta no encontrada']);
            break;
    }
}
?>