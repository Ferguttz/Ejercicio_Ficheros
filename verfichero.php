<?php
define('FICHERO','ejemplo.txt');

$lineas = file(FICHERO);
$numLineas = 0;
$numCaracteres = 0;


//Visualizar el fichero
$pag_ini = file_get_contents(FICHERO);
echo $pag_ini ;


//Contar Líneas y número de Carácteres
foreach( $lineas as $n=>$dato) {
    $numLineas++;
    $numCaracteres += contar($dato);
}


function contar($linea) : int {
    $acumulador = 0;
    
    foreach (count_chars($linea,1) as $letra => $valor) {
        $acumulador+=$valor;
    }

    return $acumulador;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio_02</title>
</head>
<body>
    <p>El numero de Líeas es: <?= $numLineas ?></p>
    <p>El número de Carácteres es: <?= $numCaracteres ?></p>
</body>
</html>