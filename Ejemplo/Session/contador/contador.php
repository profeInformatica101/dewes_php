 <h1>Contador de visitas</h1>
 <?php
 /** Permite realizar el conteo de visitas de un cliente web */

 session_start();

 if (!isset($_SESSION['counter'])) {
       $_SESSION['counter'] = 1;
 } else {
       $_SESSION['counter']++;
 }
      echo ("Visitas: ".$_SESSION['counter']);

?>
<br>
<a href="cerrarsesion.php">Cerrar Sesión</a>
