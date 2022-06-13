<?php
date_default_timezone_set('Europe/Madrid');
define("RECAPTCHA_V3_SECRET_KEY", '6LepHlMgAAAAANAWwdPTbXISe5rKHLbQEno8tQV1');

$myObject = new stdClass();


/* sanitize =le ponemos strip_tags xa q solo coja texto aunque sea codigo */
function sanitize($texto)
{
    return htmlentities(strip_tags($texto), ENT_QUOTES, "UTF-8");
}

switch ($_POST['api']) {
    case "loginUser":
        checkCaptcha(sanitize($_POST['captcha']), $myObject);

        if (isset($myObject->success)) {
            loginUser(sanitize($_POST['email']), sanitize($_POST['password']), $myObject);
        }
        break;
    default:
        $myObject->error = "error en el switchcase";
        break;
}
echo json_encode($myObject);
function loginUser($email, $password, $myObject)
{
    $usuario = new stdClass();
    $conn = new mysqli("localhost", "root", "", "pbd");
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
function checkCaptcha($captcha, $myObject)
{


    $response = file_get_contents(
        "https://www.google.com/recaptcha/api/siteverify?secret=" . RECAPTCHA_V3_SECRET_KEY . "&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']
    );
    $response = json_decode($response);
    if ($response->success === false) {
        //Do something with error
    } else {
        if ($response->success == true && $response->score > 0.5) {
        } else if ($response->success == true && $response->score <= 0.5) {
            //Do something to denied access
            $myObject->error = "Human?<br>";
        } else {
            $myObject->error = "NO<br>";
        }
    }
}
