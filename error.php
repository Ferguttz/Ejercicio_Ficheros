

<?php

$modulo ='redes locales holaa '."\n" ;
file_put_contents('materias.txt' , $modulo , FILE_APPEND);


$f= fopen('materias.txt', 'r') ;
$contenido= fread( $f , filesize('materias.txt') );


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?= $contenido ?>

</body>
</html>
