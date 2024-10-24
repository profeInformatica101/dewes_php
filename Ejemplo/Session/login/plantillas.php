<?php
/**
 * Genera una plantilla HTML
 */
function generarPaginaHTML($titulo, $contenido) {
    $res = "
    <!DOCTYPE html>
    <html>
    <head>
    <title>$titulo</title>
    </head>
    <body>
    $contenido
    </body>
    </html>";
    
    return $res;
}
/**
 * Genera Formulario HTML de acceso
 */
function generarFormularioLogin() {
    return "
    <form method='POST' action='procesar_acceso.php'>
        <input type='hidden' name='login' value='login'>
        <label for='usuario'>Usuario:</label>
        <input type='text' name='usuario' required><br><br>
        <label for='credencial'>Contraseña:</label>
        <input type='credencial' name='credencial' required><br><br>
        <input type='submit' value='Iniciar sesión'>
    </form>";
}
/**
 * Genera formulario de salida
 */
function generarLogout() {
    return "
    <form method='POST' action='procesar_acceso.php'>
        <input type='hidden' name='logout' value='logout'>
        <input type='submit' value='Cerrar sesión'>
    </form>";
}
?>