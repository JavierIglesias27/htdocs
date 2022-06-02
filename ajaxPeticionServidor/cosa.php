
<?php
// print_r($_REQUEST);
// echo $_GET['nombre'];
//echo $_POST['nombre'];
// le puedes dar los datos que tu quieras
//echo json_encode(array('success' => 1));

//se descomenta json del otro codigo y te devuelve un objeto con los dats introducidos
$total = $_GET['numero1'] + $_GET['numero2'];
echo json_encode(array('NOMBRE' => $_GET['nombre'], 'EDAD' => $_GET['edad'], 'TOTAL' => $total));
