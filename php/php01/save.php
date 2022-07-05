<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <title>Save php 01</title>
    <meta name="Author" content="Javier Iglesias">
    <meta name="Description" content="CONFECCIÓ I PUBLICACIÓ DE PÀGINES WEB(IFCD0110-UF132)">
    <meta name="Viewport" content="width=device-with, initia-scale=1">
    <link rel="stylesheet" href="#">
    <style>
        body {
            background-color: grey;
        }

        div {
            width: 60%;
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
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (!empty($_GET['num1']) && !empty($_GET['num2'])) {
            $num1 = intval($_GET['num1']);
            $num2 = intval($_GET['num2']);
            if (!is_numeric($num1) || !is_numeric($num2)) {
                echo 'Introducir valor numerico';
            } else {
                if ($num1 >= 1 && $num2 >= 1) {
                    if ($num1 > $num2) {
                        echo '<div> el numero  ' . $num1 . ' es mayor que ' . $num2 . '</div>';
                        echo '<div>' . $num1 . ' / ' . $num2 . ' = ' . intval($num1 / $num2) . '</div>';
                    } elseif ($num2 > $num1) {
                        echo '<div> el numero  ' . $num2 . '  es mayor al numero ' . $num1 . '</div>';
                        echo '<div>' . $num2 . ' / ' . $num1 . ' = ' . intval($num2 / $num1) . '</div>';
                    } else {
                        echo '<div> los numeros son iguales ' . $num1 . ' y ' . $num2 . '</div>';
                        echo '<div>' . $num1 . ' / ' . $num2 . ' = ' . intval($num1 / $num2) . '</div>';
                    }
                } else {
                    echo '<div> error!!!no se puede dividir por negativos</div>';
                }
            }
        } else {
            echo '<div> vacio o  indeterminado!!!!!</div>';
        }
    }
    ?>
</body>

</html>