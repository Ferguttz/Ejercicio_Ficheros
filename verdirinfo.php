<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informacion_Directorio</title>
</head>
<body>
    <?php

    define('DIR',getcwd()."/ficheros/");

    $ficheros = scandir(DIR);

    $ordenTam = ordenarArchivos($ficheros);


    function ordenarArchivos(&$ficheros) : array {
        //quitar '.' y '..' del array de ficheros
        $ficheros = array_diff($ficheros,array('.','..'));
        $resu = [];

        //asignar a $resu el fichero => tamañoFichero
        foreach ($ficheros as $valor) {
            $ruta = DIR.$valor;
            $tamanio = filesize($ruta);

            $resu[$valor] = $tamanio;
        }

        //Ordenar de forma descendente por tamaño
        arsort($resu);

        return $resu;
    }


    function crearTabla($tabla) : String {
        $resu = "<table border='1'>";
        $resu .= "<tr> <th>FICHEROS</th><th>TAMAÑO</th> </tr>";

        foreach ($tabla as $archivo => $tamanio) {
            $resu .= "<tr>";
                $resu .= "<th>$archivo</th>";
                $resu .= "<td>$tamanio bytes</td>";
            $resu .= "</tr>";
        }

        $resu .= "</table>";

        return $resu;
    }

    ?>

    <!-- Parte HTML crear TABLA  -->
    <?= crearTabla($ordenTam); ?>


</body>
</html>