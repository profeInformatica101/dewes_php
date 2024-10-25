<?php
require_once '../src/config/database.php';

class Categoria {
    private $db;

    public function __construct() {
        $this->db = getDBConnection();
    }

    // Obtener todas las categorías
    public function getAllCategorias() {
        $query = $this->db->prepare("SELECT * FROM categorias");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener una categoría por ID
    public function getCategoriaById($idCategoria) {
        $query = $this->db->prepare("SELECT * FROM categorias WHERE idCategoria = :id");
        $query->bindParam(':id', $idCategoria);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    // Crear una nueva categoría
    public function crearCategoria($nombre, $descripcion) {
        $query = $this->db->prepare("INSERT INTO categorias (Nombre, Descripcion) VALUES (:nombre, :descripcion)");
        $query->bindParam(':nombre', $nombre);
        $query->bindParam(':descripcion', $descripcion);
        return $query->execute();
    }

    // Actualizar una categoría
    public function actualizarCategoria($idCategoria, $nombre, $descripcion) {
        $query = $this->db->prepare("UPDATE categorias SET Nombre = :nombre, Descripcion = :descripcion WHERE idCategoria = :id");
        $query->bindParam(':id', $idCategoria);
        $query->bindParam(':nombre', $nombre);
        $query->bindParam(':descripcion', $descripcion);
        return $query->execute();
    }

    // Eliminar una categoría
    public function eliminarCategoria($idCategoria) {
        $query = $this->db->prepare("DELETE FROM categorias WHERE idCategoria = :id");
        $query->bindParam(':id', $idCategoria);
        return $query->execute();
    }
}
?>