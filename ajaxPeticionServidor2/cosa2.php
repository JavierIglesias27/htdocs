<?php
switch ($_POST['queHacer']) {
    case 1:
        peticion1();
        break;
    case 2:
        peticion2();
        break;
    case 3:
        peticion3();
        break;
}
function peticion1()
{
    $total = $_POST['numero1'] + $_POST['numero2'];
    echo json_encode(array('NOMBRE' => $_POST['nombre'], 'EDAD' => $_POST['edad'], 'TOTAL' => $total));
}
function peticion2()
{
    echo 'hola';
}
function peticion3()
{
    $conn = new mysqli("localhost", "root", "");
    if ($conn->connect_error) {
        die("connection failed" . $conn->connect_error);
    }
    echo "connection successfully";
}
