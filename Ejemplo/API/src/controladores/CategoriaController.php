<?php
require_once '../src/modelo/Categoria.php';
require_once '../src/vistas/RespuestaJSON.php';

class CategoriaController {

    // Método para obtener todas las categorías
    public function getAll() {
        $categoria = new Categoria();
        $data = $categoria->getAllCategorias();
        enviarRespuestaJSON($data);
    }

    // Método para obtener una categoría por ID
    public function getById($id) {
        $categoria = new Categoria();
        $data = $categoria->getCategoriaById($id);
        if ($data) {
            enviarRespuestaJSON($data);
        } else {
            http_response_code(404);
            enviarRespuestaJSON(['error' => 'Categoría no encontrada']);
        }
    }

    // Método para crear una nueva categoría
    public function create() {
        $input = json_decode(file_get_contents('php://input'), true);
        if (!isset($input['nombre'])) {
            http_response_code(400);
            enviarRespuestaJSON(['error' => 'Nombre de la categoría requerido']);
            return;
        }

        $categoria = new Categoria();
        $result = $categoria->crearCategoria($input['nombre']);

        if ($result) {
            http_response_code(201);
            enviarRespuestaJSON(['mensaje' => 'Categoría creada exitosamente']);
        } else {
            http_response_code(500);
            enviarRespuestaJSON(['error' => 'Error al crear la categoría']);
        }
    }

    // Método para actualizar una categoría por ID
    public function update($id) {
        $input = json_decode(file_get_contents('php://input'), true);
        if (!isset($input['nombre'])) {
            http_response_code(400);
            enviarRespuestaJSON(['error' => 'Nombre de la categoría requerido']);
            return;
        }

        $categoria = new Categoria();
        $result = $categoria->actualizarCategoria($id, $input['nombre']);

        if ($result) {
            enviarRespuestaJSON(['mensaje' => 'Categoría actualizada exitosamente']);
        } else {
            http_response_code(500);
            enviarRespuestaJSON(['error' => 'Error al actualizar la categoría']);
        }
    }

    // Método para eliminar una categoría por ID
    public function delete($id) {
        $categoria = new Categoria();
        $result = $categoria->eliminarCategoria($id);

        if ($result) {
            enviarRespuestaJSON(['mensaje' => 'Categoría eliminada exitosamente']);
        } else {
            http_response_code(500);
            enviarRespuestaJSON(['error' => 'Error al eliminar la categoría']);
        }
    }
}
?>
