<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <title>Index php 02</title>
    <meta name="Author" content="Javier Iglesias">
    <meta name="Description" content="CONFECCIÓ I PUBLICACIÓ DE PÀGINES WEB(IFCD0110-UF132)">
    <meta name="Viewport" content="width=device-with, initia-scale=1">
    <link rel="stylesheet" href="#">

</head>

<body>
    <?php

    $abc = array();

    foreach (range('a', 'z') as $letra) {
        array_push($abc, $letra);
        echo $letra;
    }
    echo '<br />';
    echo '<br />';
    print_r($abc);
    echo '<br />';
    echo '<br />';


    echo 'numero de objetos:  ';

    $var = count($abc);
    echo $var;

    echo '<br />';
    echo '<br />';

    echo 'lista desordenada ';
    echo '<ul>';
    for ($i = 0; $i < $var; $i++) {
        echo '<li>' . $abc[$i] . '</li>';
    }
    echo '</ul>';

    echo 'lista desordenada 1 ';

    $var1 = '';
    echo '<ul>';
    for ($i = 0; $i < $var; $i++) {
        $var1 = $var1 . $abc[$i];
        echo '<li>' . $var1 . '</li>';
    }
    echo '</ul>';


    echo 'lista desordenada inversa ';
    $def = array_reverse($abc);

    echo '<br />';
    echo '<br />';

    print_r($def);

    $var2 = '';
    echo '<ul>';
    for ($i = 0; $i < $var; $i++) {
        $var2 = $var2 . $def[$i];
        echo '<li>' . $var2 . '</li>';
    }
    echo '</ul>';

    ?>
</body>

</html>