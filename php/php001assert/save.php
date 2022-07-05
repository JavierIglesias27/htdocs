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
            echo caso1($_GET['edad']);
        } else if (!empty($_GET['num1']) && !empty($_GET['num2'])) {

            echo caso2(intval($_GET['num1']), intval($_GET['num2']));
        } else {
            echo '<div> vacio o indeterminado!!!!!</div>';
        }
    }

    function caso1($edad)
    {
        $guardado = '';
        if ($edad <= 0  || $edad > 200) {
            $guardado = '<div> edad: ' . $edad . ' introduzca valor numerico 1 y 200!!!!! </div>';
        } elseif ($edad < 16) {
            $guardado =  '<div> edad: ' . $edad . ' años acceso restringido </div>';
        } elseif ($edad >= 16 and $edad < 18) {
            $guardado = '<div> edad: ' . $edad . ' años acceder derechos restrictivos';
        } else {
            $guardado = '<div> mayor edad: ' . $edad . ' años acceso sin restricciones </div>';
        }
        return $guardado;
    }
    //comprobaciones caso1
    //echo caso1(-1);
    assert(caso1(-1) == '<div> edad: -1 introduzca valor numerico 1 y 200!!!!! </div>');
    //echo caso1(0);
    assert(caso1(0) == '<div> edad: 0 introduzca valor numerico 1 y 200!!!!! </div>');
    //echo caso1(202);
    assert(caso1(202) == '<div> edad: 202 introduzca valor numerico 1 y 200!!!!! </div>');
    //echo (caso1(12));
    assert(caso1(12) == '<div> edad: 12 años acceso restringido </div>');
    //echo caso1(16);
    assert(caso1(16) == '<div> edad: 16 años acceder derechos restrictivos');
    //echo caso1(17);
    assert(caso1(17) == '<div> edad: 17 años acceder derechos restrictivos');
    //echo caso1(18);
    assert(caso1(18) == '<div> mayor edad: 18 años acceso sin restricciones </div>');
    //echo caso1(55);
    assert(caso1(55) == '<div> mayor edad: 55 años acceso sin restricciones </div>');


    function caso2($num1, $num2)
    {
        $guardado = '';
        if (!is_numeric($num1) || !is_numeric($num2)) {
            $guardado = '<div>Introducir valor numerico</div>';
        } else {
            if ($num1 >= 1 && $num2 >= 1) {
                if ($num1 > $num2) {
                    $guardado = '<div> el numero  ' . $num1 . ' es mayor que ' . $num2 . '</div>';
                    $guardado = $guardado . '<div>' . $num1 . ' / ' . $num2 . ' = ' . intval($num1 / $num2) . '</div>';
                } elseif ($num2 > $num1) {
                    $guardado = '<div> el numero  ' . $num2 . '  es mayor al numero ' . $num1 . '</div>';
                    $guardado = $guardado . '<div>' . $num2 . ' / ' . $num1 . ' = ' . intval($num2 / $num1) . '</div>';
                } else {
                    $guardado = '<div> los numeros son iguales ' . $num1 . ' y ' . $num2 . '</div>';
                    $guardado =  $guardado . '<div>' . $num1 . ' / ' . $num2 . ' = ' . intval($num1 / $num2) . '</div>';
                }
            } else {
                $guardado = '<div> error!!!no se puede dividir por negativos o letras</div>';
            }
        }
        return $guardado;
    }

    //comprobaciones caso 2
    //echo (caso2(2, 2));
    assert(caso2(2, 2) == '<div> los numeros son iguales 2 y 2</div><div>2 / 2 = 1</div>');

    //echo (caso2(6, 3));
    assert(caso2(6, 3) == '<div> el numero  6 es mayor que 3</div><div>6 / 3 = 2</div>');

    //echo (caso2(4, 2));
    assert(caso2(4, 2) == '<div> el numero  4 es mayor que 2</div><div>4 / 2 = 2</div>');

    //echo (caso2(6, -2));
    assert(caso2(6, -2) == '<div> error!!!no se puede dividir por negativos o letras</div>');

    //echo (caso2(6, 'asd'))
    assert(caso2(6, ' asd') == '<div>Introducir valor numerico</div>');

    ?>
</body>

</html>