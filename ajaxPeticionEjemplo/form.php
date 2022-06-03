<?php
switch ($_POST['formulario']) {
    case 1:
        conexionOk();
        break;
    case 2:
        borrar_crearDBTablas(); // comentarlo xa guardar los datos y asi insertamos datos xq sino cada vez que actualizemos se borran los datos
        insertarDatosTest();
        break;
    case 3:
        insertarDatos($_POST['name'], $_POST['email'], $_POST['password'], $_POST['phone']);
        break;
    case 4:
        getDatos();
        break;
    case 5:
        getDatosPersona($_POST['email']);
        break;
}
//miramos que la conexion a la DataBase sea CORRECTA
function conexionOk()
{
    $conn = new mysqli("localhost", "root", "");
    if ($conn->connect_error) {
        die("connection failed" . $conn->connect_error);
    }
    echo " CONNECTION SUCCESSFULLY";
    $conn->close();
}
function borrar_crearDBTablas()
{
    $conn = new mysqli("localhost", "root", "");
    if ($conn->connect_error) {
        die("connection failed" . $conn->connect_error);
    }
    // echo "connection successfully";
    $sql = "DROP DATABASE IF EXISTS pbd";
    if ($conn->query($sql) === TRUE) {
        echo "drop database \"pbd\"";
    } else {
        echo "Error: drop database \"pbd\"" . $conn->error;
    }
    $sql = "CREATE DATABASE  pbd";
    if ($conn->query($sql) === TRUE) {
        echo "create database \"pbd\"";
    } else {
        echo "Error: create database \"pbd\"" . $conn->error;
    }

    $conn->close();


    $conn = new mysqli("localhost", "root", "", "pbd");

    $sql = "CREATE TABLE formulario (id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY , nombre VARCHAR(30),email VARCHAR(50) NOT NULL, password VARCHAR(30) NOT NULL, phone INT(9)NOT NULL, reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";
    if ($conn->multi_query($sql) === TRUE) {
        echo "create table \"formulario\"<br/>";
    } else {
        echo "Error: create table \"formulario\"<br/>" . $conn->error;
    }
    $conn->close();
}
function insertarDatosTest()
{
    $conn = new mysqli("localhost", "root", "", "pbd");
    $sql = "INSERT INTO formulario(nombre,email,password,phone) VALUES('juan','eric.casanova@cesi.info','adffsf234','665478932');";
    $sql .= "INSERT INTO formulario(nombre,email,password,phone) VALUES('andres','juan.anotnio@cesi.info','jasbb6uan','879654123');";
    $sql .= "INSERT INTO formulario(nombre, email,password,phone) VALUES('pedro','juan.pedro@cesi.info','asf78jasd8','5678912');";
    if ($conn->multi_query($sql) === TRUE) {
        echo "insert  table \"formulario\"<br/>";
        $last_id = $conn->insert_id;
        echo $last_id;
    } else {
        echo "Error: insert table \"formulario\"<br/>" . $conn->error;
    }
    $conn->close();
}
function insertarDatos($nombre, $email, $password, $phone)
{
    $conn = new mysqli("localhost", "root", "", "pbd");
    $sql = "INSERT INTO formulario(nombre, email,password,phone) VALUES('" . $nombre . "', '" . $email . "', '" . $password . "','" . $phone . "' )";

    if ($conn->multi_query($sql) === TRUE) {
        echo "insert  table \"pbd\"<br/>";
        $last_id = $conn->insert_id;
        echo $last_id;
    } else {
        echo "Error: insert table \"pbd\"<br/>" . $conn->error;
    }
    $conn->close();
}
//solicitar/obtener datos de las tabla
function getDatos()
{
    $conn = new mysqli("localhost", "root", "", "pbd");
    //comprobamos q la conxion es correcta

    if ($conn->connect_error) {
        die("connection failed" . $conn->connect_error);
    }

    $sql = "SELECT * FROM formulario";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<b>id:</b>" . $row["id"] . "<b>nombre:</b>" . $row["nombre"] . "<b>email:</b>" . $row["email"] . "<b>Password:</b>" . $row["password"] . "<b>phone:</b>" . $row["phone"] . "<b>fecha:</b>" . $row["reg_date"] . "<br/>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();
}
//seleccionar datos especificos
function getDatosPersona($email)
{
    $conn = new mysqli("localhost", "root", "", "pbd");
    //comprobamos q la conxion es correcta

    if ($conn->connect_error) {
        die("connection failed" . $conn->connect_error);
    }

    $sql = "SELECT * FROM formulario WHERE email='" . $email . "'";
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
