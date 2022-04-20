<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Plantilla códigos</title>
    <meta name="author" content="Erik Aguirre">
    <meta name="description" content="código curso IFCD0110">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="#">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.0.0/css/all.css">
    <link rel="stylesheet" href="/paginaselect.css">
    <link rel="stylesheet" href="style.css">
    <style>
        * {
            scroll-behavior: smooth;
        }

        .anchor {
            display: block;
            position: relative;
            top: -100px;
            visibility: hidden;
        }

        h1.back {
            border-left: 6px solid red;
            background-color: lightgrey;
        }

        .center {
            margin-top: 20px;
            width: 50%;
            text-align: center;
            border: 2px black solid;
            min-width: min-content;
        }

        .buttons {
            padding: 20px;
            overflow: hidden;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <a class="active" href="index.html">Home</a>
        <a href="index.html#news">News</a>
        <a href="contacto.html">Contact</a>
        <a href="ejercicio7texto.html">Ejercicio7</a>
        <a href="http://wikipedia.org">Wikipedia</a>
        <div class="dropdown">
            <button class="dropbtn">Dropdown
                <i class="fa fa-caret-down"></i> <!-- flechita para abajo en el menu de selección-->
            </button>
            <div class="dropdown-content">
                <a href="/#home">Home</a>
                <a href="/#news">News</a>
                <a href="/#others">Others</a>
                <a href="https://wikipedia.org">Wikipedia</a>
                <a href="/Ejercicios y pruebas/ejercicio2.html">Ejercicio - 2</a>
                <a href="/Ejercicios y pruebas/ejercicio7texto.html">Ejercicio - 7</a>
                <a href="/Ejercicios y pruebas/ejercicioZ.html">Ejercicio - Z</a>
                <a href="/Ejercicios y pruebas/tabla10x10.html">Tabla 10x10</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">PHP
                <i class="fa fa-caret-down"></i> <!-- flechita para abajo en el menu de selección-->
            </button>
            <div class="dropdown-content">
                <a href="/form2/index2.php">Formulario 2</a>
            </div>
        </div>
        <div class="navbar-right">
            <a href="#search"><i class="fa-solid fa-magnifying-glass"></i>Search
            </a>
            <div style="display:inline-flex">
                <a href="#about">About</a>
            </div>
        </div>
    </div>

    <div class="main">
        <h1 class="back"> Página prueba<a id="home" class="anchor"></a></h1>
        <h2></h2>
        <h2></h2>

        <?php
        $token = 'mytoken';
        $name = '';
        $email = '';
        $password = '';
        $t = date('y.m.d');
        $save1 = false;
        $save2 = false;
        $save3 = false;
        $save4 = false;
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if (!empty($_GET['nameUser'])) {
                $name = $_GET['nameUser'];
                $save1 = true;
            }
            if (!empty($_GET['email'])) {
                $email = $_GET['email'];
                $save2 = true;
            }
            if (!empty($_GET['password'])) {
                $password = $_GET['password'];
                $save3 = true;
            }
            if (!empty($_GET['date'])) {
                $t = $_GET['date'];
                $save4 = true;
            }
        }
        ?>
        <div>
            <?php
            if ($save1 & $save2 & $save3) {
                $usuarios = new SimpleXMLElement('db3.xml', 0, true);
                $nuevoUsuario = $usuarios->addChild('user');
                $nuevoUsuario->addChild('name', $name);
                $nuevoUsuario->addChild('email', encrypt($email, $token, date('y.m.d')));
                $nuevoUsuario->addChild('password', encrypt($password, $token, date('y.m.d')));
                $nuevoUsuario->addChild('date', $t);
                $usuarios->saveXML('db3.xml');
                echo '<h2>Usted se ha registrado</h2>';
                echo '<br />';
                echo '<br />';
                echo 'nameUser: ' . $name;
                echo '<br />';
                echo $nuevoUsuario->addChild('email', encrypt($email, $token, date('y.m.d')));
                echo '<br />';
                echo $nuevoUsuario->addChild('password', encrypt($password, $token, date('y.m.d')));
            } else {
                echo '<h2> Usted se ha logueado</h2>';
                echo '<br />';
                //echo 'nameUser: ' . $name;
                echo '<br />';
            }
            ?>
            <?php
            function encrypt($txt, $token1, $t)
            {
                $tokenizer = $token1 . $txt . $t;
                $hash = hash('gost', $tokenizer, false);
                return $hash;
            }

            ?>
        </div>



</body>

</html>