<?php
echo "ARRAY--><br>";

$lst = array("Nombre" => "Isabel",
             "Edad" => 37, "Admin" => true,
             "Contacto" => array("Web" => "isabelweb.com", "telefono" => 123, "direccion" => null),
             "Etiquetas" => array("php", "web", "dev"));
    /**
        foreach ($lst as $i => $value) {
                echo ($lst[$i] ." # ");
            }
    */

//IMPRIMO EL RESULTADO
print_r($lst);

echo "<br><br>JSON--><br>";

$lst_encode = json_encode($lst);

//IMPRIMO EL RESULTADO
print_r($lst_encode);
?>