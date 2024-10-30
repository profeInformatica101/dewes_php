<?php
echo "ARRAY--><br>";

$lst2 = array();

$lst2['Nombre'] = 'Isabel';
$lst2['Edad'] = 37;
$lst2['Admin'] = TRUE;

$lst2['Contacto'] = array(
    'Web' => "isabelweb.com",
    'Telefono' => 123,
    'Direccion' => NULL
);

$lst2['Tags'] = array('php', 'web', 'dev');

//IMPRIMO EL RESULTADO
print_r($lst2);

echo "<br><br>JSON--><br>";

$lst_encode = json_encode($lst2);

//IMPRIMO EL RESULTADO
print_r($lst_encode);
?>
