<?php

if (isset($_GET['id']) && isset($_GET['clave'])) {
    $id = $_GET['id'];
    $clave = $_GET['clave'];

    echo "id=" . $id . "<br />";

    echo "clave=" . $clave;

    $usuario = new stdClass();
    $conn = new mysqli("sql4.freemysqlhosting.net", "sql4499631", "aVDL9RBswz", "sql4499631");
    $sql = "SELECT * FROM usuarios_temp WHERE id= '" . $id . "';";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {

        while ($row = $result->fetch_assoc()) {
            $usuario->id = $row['id'];
            $usuario->email = $row['email'];
            $usuario->nombre = $row['nombre'];
            $usuario->phone = $row['phone'];
            $usuario->password = $row['password'];
            $usuario->reg_date = $row['reg_date'];
        }
        $xstring = $usuario->id . "-" . $usuario->email . "-" . $usuario->nombre . "-" . $usuario->phone . "-" . $usuario->password . "-" . $usuario->reg_date;
        $sha1 = sha1($xstring);
        if ($clave == $sha1) {
            insertUser($usuario);
        }
    } else {
        echo 'Error:id not found';
    }
    $conn->close();
}
function insertUser($user)
{
    $conn = new mysqli("sql4.freemysqlhosting.net", "sql4499631", "aVDL9RBswz", "sql4499631");
    $sql = "INSERT INTO usuarios_temp(email,nombre,password,phone) VALUES('" . $user->email . "', '" . $user->nombre . "', '" . $user->password . "','" . $user->phone . "' )";
    if ($conn->query($sql) === TRUE) {
        echo "<br/>OK";
        header('Location:login.html');
    } else {
        echo "Error " . $conn->error;
    }
    $conn->close();
}
