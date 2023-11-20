<?php
    define('DIR',getcwd()."/ficheros/");

    $ficheros = scandir(DIR);

    //Filtar solo archivos con extension .php con callback "extensionPHP"
    $archivosPHP = array_filter($ficheros,"extensionPHP");


    $tabla = crearTabla($archivosPHP);
?>

<!-- Parte HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contar_Ficheros</title>
</head>
<body>
    <?= mostarTabla($tabla); ?>
</body>
</html>
<!-- FIN Parte HTML -->

<?php
//------------------------------------Parte Funciones PHP-----------------------------

function extensionPHP($var) {
    return preg_match("/.php$/",$var);
}

function crearTabla($archivosPHP) : Array {
    $resu = [];

    foreach ($archivosPHP as $valor) {
        $archivo = file(DIR.$valor);
        $numLineas = count($archivo);

        $resu[$valor] = $numLineas;
    }

    return $resu;
}

function mostarTabla($tabla) : String {
    $acumulador=0;
    $resu = "<table border='1'>";
    $resu .= "<tr> <th>FICHEROS</th><th>Nº LINEAS</th> </tr>";

    foreach ($tabla as $archivo => $lineas) {
        $resu .= "<tr>";
            $resu .= "<th>$archivo</th>";
            $resu .= "<td>$lineas líneas</td>";
        $resu .= "</tr>";
        $acumulador += $lineas;
    }

    $resu .= "<tr> <th>Total dir: </th><td>$acumulador líneas</td> </tr>";

    $resu .= "</table>";

    return $resu;
}
?>