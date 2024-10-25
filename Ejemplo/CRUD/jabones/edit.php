<?php
include 'config.php';

// Comprobando si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $id = $_POST['id'];

    $stmt = $pdo->prepare("UPDATE jabones SET nombre = ?, precio = ? WHERE id = ?");
    $stmt->execute([$nombre, $precio, $id]);

    header('Location: index.php');
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->query("SELECT * FROM jabones WHERE id = $id");
$jabon = $stmt->fetch();

?>

<h2>Editar Jabón</h2>

<form action="edit.php" method="post">
    <input type="hidden" name="id" value="<?php echo $jabon['id']; ?>">
    Nombre: <input type="text" name="nombre" value="<?php echo $jabon['nombre']; ?>"><br>
    Precio: $<input type="text" name="precio" value="<?php echo $jabon['precio']; ?>"><br>
    <input type="submit" value="Guardar Cambios">
</form>
