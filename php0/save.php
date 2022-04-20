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
            $edad = $_GET['edad'];
            if ($edad <= 0  || $edad > 200) {
                echo  '<div> edad: ' . $edad . ' introduzca valor numerico 1 y 200!!!!! </div>';
            } elseif ($edad < 16) {
                echo  '<div> edad: ' . $edad . ' años acceso restringido </div>';
            } elseif ($edad >= 16 and $edad < 18) {
                echo '<div> edad: ' . $edad . ' años acceder derechos restrictivos';
            } else {
                echo '<div> mayor edad: ' . $edad . ' años acceso sin restricciones </div>';
            }
        } else {
            echo '<div> no hay datos </div>';
        }
    }
    ?>
</body>

</html>