<?php
include 'config.php';

$stmt = $pdo->query('SELECT * FROM jabones');
$jabones = $stmt->fetchAll();
?>

<h2>Listado de Jabones</h2>

<!-- Botón para crear un nuevo jabón -->
<a href="create.php">Crear nuevo Jabón</a>
<br><br>

<ul>
<?php foreach ($jabones as $jabon): ?>
    <li>
        <?php echo $jabon['nombre']; ?> - $<?php echo $jabon['precio']; ?>
        <a href="edit.php?id=<?php echo $jabon['id']; ?>">Editar</a>
        <a href="delete.php?id=<?php echo $jabon['id']; ?>">Eliminar</a>
    </li>
<?php endforeach; ?>
</ul>
