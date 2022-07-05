<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Save php0</title>
    <meta name="Author" content="Javier Iglesias">
    <meta name="Description" content="CONFECCIÓ I PUBLICACIÓ DE PÀGINES WEB(IFCD0110-UF132)">
    <meta name="Viewport" content="width=device-with, initia-scale=1">
    <link rel="stylesheet" href="#">
    <style>
        body {
            background-color: grey;
        }

        div {
            width: 70%;
            height: 30px;
            margin: auto;
            margin-top: 100px;
            border: 3px solid black;
            color: orange;
            text-transform: uppercase;
            font-size: 25px;
        }
    </style>
</head>

<body>

    <?php
    $edad = 20;

    switch ($edad) {

        case 3: ## si $edad vale 3 printeara menor
            echo 'menor';
            break;

        case 4: ## si $edad vale 4 printeara igual
            echo 'media';
            break;
        case 5:
            echo 'mayor';
            break;
        default:
            echo 'no';
            break;
    }
    switch ($abecedario) {

        case 'a': ## si $edad vale 3 printeara menor
            echo 'letra a';
            break;

        case 'b': ## si $edad vale 4 printeara igual
            echo 'letra b';
            break;
        case 'c':
            echo 'letra c';
            break;
        default:
            echo 'no hay letra';
            break;
    }




    ?>
</body>

</html>