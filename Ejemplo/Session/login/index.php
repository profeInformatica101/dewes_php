 <?php
include_once('plantillas.php');
session_start();

if (isset($_SESSION['usuario'])) {
    // Si el usuario ya está logueado, mostramos un mensaje de bienvenida
    echo generarPaginaHTML("Ejemplo Inicio Sesión", "<h1>Hola, " . $_SESSION['usuario'] . ". </h1> <br>" . generarLogout());
} else {
    // Si el usuario no está logueado, mostramos el formulario de inicio de sesión
    echo generarPaginaHTML("Ejemplo Mostrar Formulario",  generarFormularioLogin());
}
?>

