<?php
// Crear la imagen con tamaño de 500x300
$image = imagecreate(500, 300);

// Establecer los colores
$background_color = imagecolorallocate($image, 0, 153, 0);  // Fondo verde
$text_color = imagecolorallocate($image, 255, 255, 255);     // Blanco para el texto
$circle_color = imagecolorallocate($image, 255, 0, 0);       // Rojo para el círculo
$filled_square_color = imagecolorallocate($image, 0, 0, 255); // Azul para el cuadrado
$point_color = imagecolorallocate($image, 255, 255, 0);      // Amarillo para el punto

// Escribir texto en la imagen
imagestring($image, 5, 180, 100, "Libre Configuración", $text_color);
imagestring($image, 3, 160, 120, "Desarrollo de Aplicaciones Web", $text_color);

// Dibujar un círculo con radio 50
$cx = 250; // Coordenada X del centro del círculo
$cy = 200; // Coordenada Y del centro del círculo
$r = 50;   // Radio del círculo

// Dibujar el círculo
imageellipse($image, $cx, $cy, $r * 2, $r * 2, $circle_color);

// Dibujar un cuadrado relleno de color azul
$rect_x1 = 50;   // Coordenada X de la esquina superior izquierda del cuadrado
$rect_y1 = 50;   // Coordenada Y de la esquina superior izquierda del cuadrado
$rect_x2 = 150;  // Coordenada X de la esquina inferior derecha del cuadrado
$rect_y2 = 150;  // Coordenada Y de la esquina inferior derecha del cuadrado

// Dibujar el cuadrado relleno
imagefilledrectangle($image, $rect_x1, $rect_y1, $rect_x2, $rect_y2, $filled_square_color);

// Dibujar otro círculo (círculo pequeño)
$cx2 = 400; // Coordenada X del centro del segundo círculo
$cy2 = 100; // Coordenada Y del centro del segundo círculo
$r2 = 30;   // Radio del segundo círculo

// Dibujar el segundo círculo
imageellipse($image, $cx2, $cy2, $r2 * 2, $r2 * 2, $circle_color);

// Dibujar un punto amarillo (un píxel)
$point_x = 400;  // Coordenada X del punto
$point_y = 250;  // Coordenada Y del punto

// Dibujar el punto
imagesetpixel($image, $point_x, $point_y, $point_color);

// Enviar la imagen como una respuesta PNG
header("Content-Type: image/png");
imagepng($image);

// Destruir la imagen para liberar memoria
imagedestroy($image);
?>