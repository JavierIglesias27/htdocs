<?php
switch ($_POST['formulario']) {
    case 1:
        // conexionOk();
        // borrar_Tablas(); // comentarlo xa guardar los datos y asi insertamos datos xq sino cada vez que actualizemos se borran los datos
        comprobarCosasDB();

        break;
    case 3:
        insertarDatos($_POST['name'], $_POST['email'], $_POST['password'], $_POST['phone']);
        break;
    case 4:
        selectName($_POST['name']);
        break;
    case 5:
        signIn($_POST['email'], $_POST['password']);
        break;
}
//miramos que la conexion a la DataBase sea CORRECTA
function comprobarCosasDB()
{
    if (conexionOk()) {
        echo "OK CONECTION SUCCESFULLY";
        if (!checkConnectionDB()) {
            crear_Tablas();
        }
    } else {
        echo "ERROR en conexion";
    }
}

function conexionOk()
{
    $conn = new mysqli("localhost", "root", "");
    if ($conn->connect_error) {
        die("connection failed" . $conn->connect_error . "<br/>");
        return false;
    }
    echo " TESTING 1: Connection Succesfully <br/>";
    $conn->close();
    return true;
}
function checkConnectionDB()
{
    try {
        $conn = new mysqli("localhost", "root", "", "pbd");

        if ($conn->connect_error) {
            return false;
        }
        echo "connected  Succesfully";
        $conn->close();
        return true;
    } catch (Exception) {
        //throw $th;
    }
    return false;
}

/*ME SIRVE XA HACER TESTING Y VER Q LOS DATOS SE INTRODUCEN CORRECTAMENTE */
function borrar_Tablas()
{
    $conn = new mysqli("localhost", "root", "");
    if ($conn->connect_error) {
        die("TESTING 1:connection failed" . $conn->connect_error . "<br/>");
    }
    // echo "  llyTESTING 2: borrarCrearTabla--> connection successfu <br/>";

    $sql = "DROP DATABASE IF EXISTS pbd";
    if ($conn->query($sql) === TRUE) {
        echo " TESTING 2:drop database \"pbd\" <br/>";
    } else {
        echo "Error TESTING2: drop database \"pbd\"" . $conn->error . "<br/>";
    }

    $conn->close();
}
function crear_Tablas()
{
    $conn = new mysqli("localhost", "root", "");
    if ($conn->connect_error) {
        die("connection failed" . $conn->connect_error . "<br/>");
    }
    echo " Connection successfully para crear la tabla<br/>";


    $sql = "CREATE DATABASE pbd ";

    if ($conn->query($sql) === TRUE) {
        echo "TESTING 3:create database \"pbd\"<br/>";
    } else {
        echo "Error TESTING 3: create database \"pbd\"" . $conn->error;
    }

    $conn->close();


    $conn = new mysqli("localhost", "root", "", "pbd");


    $sql = "CREATE TABLE formulario (id INT(10) UNSIGNED AUTO_INCREMENT UNIQUE PRIMARY KEY , nombre VARCHAR(30),email VARCHAR(50) NOT NULL, password CHAR(32)  CHARACTER SET 'latin1' NOT NULL, phone INT(9)NOT NULL, reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";
    if ($conn->multi_query($sql) === TRUE) {
        echo " TESTING 4: create table \"formulario\"<br/>";
    } else {
        echo "Error TESTING 4: create table \"formulario\"<br/>" . $conn->error;
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
        echo " TESTING 5: insert  table \"formulario\"<br/>";
        $last_id = $conn->insert_id;
        echo  "Id asociado: " . $last_id;
    } else {
        echo "Error TESTING 5: insert table \"formulario\"<br/>" . $conn->error;
    }
    $conn->close();
}
function insertarDatos($nombre, $email, $password, $phone)
{
    $conn = new mysqli("localhost", "root", "", "pbd");
    /*md5 password me lo codifica */
    $sql = "INSERT INTO formulario(nombre, email,password,phone) VALUES('" . $nombre . "', '" . $email . "', '" . md5($password) . "','" . $phone . "' )";

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

    $sql = "SELECT nombre FROM formulario WHERE email='" . $email . "'";
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
function signIn($email, $password)
{

    $conn = new mysqli("localhost", "root", "", "pbd");

    $sql = "SELECT nombre FROM formulario WHERE email= '" . $email . "' && password= '" . md5($password) . "' ;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {

            echo "Contraseña introducida correctamente" . $row['nombre'];
        }
    } else {
        echo $conn->error . "<br/>" . $sql . "<br/>";
    }
    $conn->close();
}
function selectName($name)

{
    $conn = new mysqli("localhost", "root", "", "pbd");

    $sql = "SELECT * FROM formulario WHERE nombre = '" . $name . "';";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {

            echo "Bienvenido:  " . $row['nombre'];
        }
    } else {
        echo $conn->error . "<br/>" . $sql . "<br/>";
    }
    $conn->close();
}
