<?php
switch ($_POST['queHacer']) {
    case 1:
        peticion1();
        break;
    case 2:
        peticion2();
        break;
    case 3:
        //borrar_crearDBTablas(); // comentarlo xa guardar los datos y asi insertamos datos xq sino cada vez que actualizemos se borran los datos
        insertarDatosTest();
        break;
    case 4:
        insertarDatos($_POST['email'], $_POST['nombre'], $_POST['phone']);
        break;
    case 5:
        getDatos();
        break;

    case 6:
        getDatosPersona($_POST['email']);
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
    $conn->close();
}
function borrar_crearDBTablas()
{
    $conn = new mysqli("localhost", "root", "");
    if ($conn->connect_error) {
        die("connection failed" . $conn->connect_error);
    }
    // echo "connection successfully";
    $sql = "DROP DATABASE IF EXISTS cesi";
    if ($conn->query($sql) === TRUE) {
        echo "drop database \"cesi\"";
    } else {
        echo "Error: drop database \"cesi\"" . $conn->error;
    }
    $sql = "CREATE DATABASE  cesi";
    if ($conn->query($sql) === TRUE) {
        echo "create database \"cesi\"";
    } else {
        echo "Error: create database \"cesi\"" . $conn->error;
    }

    $conn->close();


    $conn = new mysqli("localhost", "root", "", "cesi");

    $sql = "CREATE TABLE usuarios (id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY , email VARCHAR(50) NOT NULL, nombre VARCHAR(30) NOT NULL, phone INT(9)NOT NULL, reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";
    if ($conn->multi_query($sql) === TRUE) {
        echo "create table \"usuarios\"<br/>";
    } else {
        echo "Error: create table \"usuarios\"<br/>" . $conn->error;
    }
    $conn->close();
}
function insertarDatosTest()
{
    $conn = new mysqli("localhost", "root", "", "cesi");
    $sql = "INSERT INTO usuarios(email,nombre,phone) VALUES('eric.casanova@cesi.info','eric','665478932');";
    $sql .= "INSERT INTO usuarios(email,nombre,phone) VALUES('juan.anotnio@cesi.info','juan','879654123');";
    $sql .= "INSERT INTO usuarios(email,nombre,phone) VALUES('juan.pedro@cesi.info','pedro','456789123');";
    if ($conn->multi_query($sql) === TRUE) {
        echo "insert  table \"usuarios\"<br/>";
        $last_id = $conn->insert_id;
        echo $last_id;
    } else {
        echo "Error: insert table \"usuarios\"<br/>" . $conn->error;
    }
    $conn->close();
}
function insertarDatos($email, $nombre, $phone)
{
    $conn = new mysqli("localhost", "root", "", "cesi");
    $sql = "INSERT INTO usuarios(email,nombre,phone) VALUES('" . $email . "', '" . $nombre . "', '" . $phone . "' )";

    if ($conn->multi_query($sql) === TRUE) {
        echo "insert  table \"usuarios\"<br/>";
        $last_id = $conn->insert_id;
        echo $last_id;
    } else {
        echo "Error: insert table \"usuarios\"<br/>" . $conn->error;
    }
    $conn->close();
}
//solicitar/obtener datos de las tabla
function getDatos()
{
    $conn = new mysqli("localhost", "root", "", "cesi");
    //comprobamos q la conxion es correcta

    if ($conn->connect_error) {
        die("connection failed" . $conn->connect_error);
    }

    $sql = "SELECT * FROM usuarios";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<b>id:</b>" . $row["id"] . "<b>nombre:</b>" . $row["nombre"] . "<b>email:</b>" . $row["email"] . "<b>phone:</b>" . $row["phone"] . "<b>fecha:</b>" . $row["reg_date"] . "<br/>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();
}
//seleccionar datos especificos
function getDatosPersona($email)
{
    $conn = new mysqli("localhost", "root", "", "cesi");
    //comprobamos q la conxion es correcta

    if ($conn->connect_error) {
        die("connection failed" . $conn->connect_error);
    }

    $sql = "SELECT * FROM usuarios WHERE email='" . $email . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $array = [];
        while ($row = $result->fetch_assoc()) {
            array_push($array, $row);
        }
        echo json_encode($array);
    } else {
        echo "0 results";
    }
    $conn->close();
}
