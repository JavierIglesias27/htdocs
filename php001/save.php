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
    if ($_SERVER["REQUEST_METHOD"] == "GET") {

        if (!empty($_GET['edad'])) {
            caso1($_GET['edad']);
        } else if (!empty($_GET['num1']) && !empty($_GET['num2'])) {

            caso2(intval($_GET['num1']), intval($_GET['num2']));
        } else {
            echo '<div> <p>vacio o indeterminado!!!!!</p></div>';
        }
    }
    function caso1($edad)
    {
        if ($edad <= 0  || $edad > 200) {
            echo  '<div> edad: ' . $edad . ' introduzca valor numerico 1 y 200!!!!! </div>';
        } elseif ($edad < 16) {
            echo  '<div> edad: ' . $edad . ' años acceso restringido </div>';
        } elseif ($edad >= 16 and $edad < 18) {
            echo '<div> edad: ' . $edad . ' años acceder derechos restrictivos';
        } else {
            echo '<div> mayor edad: ' . $edad . ' años acceso sin restricciones </div>';
        }
    }
    function caso2($num1, $num2)
    {
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
                echo '<div> error!!!no se puede dividir por negativos o letras</div>';
            }
        }
    }

    ?>
</body>

</html>