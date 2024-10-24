<?php
session_start();


if(isset($_POST['logout'])){
    session_destroy();
}


if (isset($_POST['usuario']) && isset($_POST['credencial'])) {
    $user = $_POST['usuario'];
    $pass = $_POST['credencial']; 
    
    if ($user == "admin" && $pass == "admin") {
        $_SESSION['usuario'] = "Administrador";
    }
}

header("Location: index.php");
exit(); // Se recomienda usar exit() después de un header() para evitar que el script continúe ejecutándose.
?>