<?php
include 'config.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    try {
        $sql = "INSERT INTO jabones (nombre, descripcion, precio, stock) VALUES (:nombre, :descripcion, :precio, :stock)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['nombre' => $nombre, 'descripcion' => $descripcion, 'precio' => $precio, 'stock' => $stock]);

        $message = 'Jabón añadido con éxito!';
    } catch (PDOException $e) {
        $message = 'Error al añadir el jabón: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Jabón</title>
</head>
<body>
<h2>Añadir nuevo Jabón</h2>

<?php if (!empty($message)): ?>
    <p><?= $message ?></p>
<?php endif; ?>

<form action="create.php" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" required>
    <br>
    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" id="descripcion"></textarea>
    <br>
    <label for="precio">Precio:</label>
    <input type="text" name="precio" id="precio" required>
    <br>
    <label for="stock">Stock:</label>
    <input type="number" name="stock" id="stock" required>
    <br>
    <input type="submit" value="Añadir Jabón">
</form>

</body>
</html>
