<?php
$message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Directorio de destino donde se guardará el archivo
    $target_dir = "uploads/";
    
    // Nombre del archivo incluyendo la ruta de destino
    $target_file = $target_dir . basename($_FILES['image']['name']);
    
    // Verificar si no hubo error al subir el archivo
    if ($_FILES['image']['error'] === 0) {
        // Mover el archivo al directorio de destino
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $message = '<b>File:</b> ' . $_FILES['image']['name'] . '<br>';
            $message .= '<b>Size:</b> ' . $_FILES['image']['size'] . ' bytes<br>';
            $message .= '<b>Location:</b> File saved at ' . $target_file;
        } else {
            $message = 'The file could not be saved.';
        }
    } else {
        $message = 'The file could not be uploaded.';
    }
}
?>
<?= $message ?>
<form method="POST" action="upload-file.php" enctype="multipart/form-data">
    <label for="image"><b>Upload file:</b></label>
    <input type="file" name="image" accept="image/*" id="image"><br>
    <input type="submit" value="Upload">
</form>