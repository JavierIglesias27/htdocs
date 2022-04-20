<!DOCTYPE html>
<html lang="ca">

<head>

    <meta charset="UTF-8">
    <title> tabla10x10 </title>
    <meta name="Author" content="Javier Iglesias">
    <meta name="Description" content="CONFECCIÓ I PUBLICACIÓ DE PÀGINES WEB(IFCD0110-UF132)">
    <meta name="Viewport" content="width=device-with, initia-scale=1">
    <style>
        body {
            background-color: grey;
        }

        table,
        td,
        th {
            /*border: 1px solid black; aqui no haria falta poner el raduis*/
            border: 1px solid black;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: grey;
        }

        td,
        th {
            padding: 15px;
            /*amplio el recuadro xq q  sea mas ancho*/
            margin: 0px;
            background-color: green;
        }

        th {
            background-color: blue;
            color: white;
            font-size: large;
        }
    </style>
</head>

<body>

    <?php




    function calendar($relleno, $dias)
    {
        echo '<table>
            <tr>
                <th>Lun</th>
                <th>Mar</th>
                <th>Mie</th>
                <th>Jue</th>
                <th>Vie</th>
                <th>Sab</th>
                <th>Dom</th>
            </tr>';

        $var4 = $relleno + $dias;
        //r16//34//
        $varz = ($var4 % 7) - 1;
        echo $varz . 'xxxxxxxxxxxxxxxxxxxxxxx';

        $var6 = $var4 + $varz;

        $abc = 1;
        for ($colum = 2; $colum <= $var6; $colum++) {

            if ($colum < $relleno + 2) {
                echo '<td> </td>';
            } elseif ($colum % 8 == 1) {
                echo '</tr>';
            } else {
                echo '<td>' . $abc++ . '</td>';
            }
            echo $colum . ' ';
        }
        echo '</table>';
    }
    calendar(1, 15);
    calendar(3, 31);
    //calendar(6, 80);


    ?>



</body>

</html>