<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('FICHERO','acceso.txt');

// PROCESO COOKIE
$vecesCookies = 0;
if ( isset($_COOKIE["vecesCookies"])) {
    $vecesCookies = $_COOKIE["vecesCookies"];
}
$vecesCookies++;
setcookie("vecesCookies",$vecesCookies, time() + 30*24*3600);


$veces = 0;

if (file_exists(FICHERO)) {
    $veces = @file_get_contents(FICHERO);
    if ($veces == false) {
        die(" El fichero no se ha podido leer");
    }

}

$veces = $veces + 1;

file_put_contents(FICHERO,$veces);



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio_01_Contador</title>
</head>
<body>
    <h1>Bienvenido</h1>
    has accedido <?= $veces ?> en total <br>
    has accedido <?= $vecesCookies ?> desde el navegador <br>
</body>
</html>