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
    case "checkEmail":
        $email = sanitize($_POST['email']);
        checkEmail($email, $myObject);

        //
        echo json_encode($myObject);
        exit;

        if (property_exists('success', json_encode($myObject))) {
            insertUser($email, sanitize($_POST['nombre']), sanitize($_POST['phone']), sanitize($_POST['password']), sanitize($_POST['captcha']), $myObject);
        }
        echo json_encode($myObject);
        break;
    default:
        echo "error";
        break;
}
function checkEmail($email, $myObject)
{
    /*trim quito espacios delante
    str_replace quieta espacios entre letras
    strtolower  se pone todo a minusculas */

    $email = strtolower(str_replace(" ", "", trim($email)));
    if ($email == "" || is_numeric($email)) {
        $myObject->error =  "PHP lado servidor: el mail no puede estar vacio o es valor numerico";
    }

    /*if(pattern ) */


    $conn = new mysqli("localhost", "root", "", "pbd");

    $sql = "SELECT email FROM usuarios WHERE email= '" . $email . "';";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {

        while ($row = $result->fetch_assoc()) {
            $myObject->error = $row['email'];
        }
    } else {
        $myObject->success = "PHP: lado servidor : mail is OK";
    }
    $conn->close();
}
function insertUser($email, $nombre, $phone, $password, $captcha, $myObject)
{
    // hacer regex
    // if($email==""){

    // }else{

    // }

    $response = file_get_contents(
        "https://www.google.com/recaptcha/api/siteverify?secret=" . RECAPTCHA_V3_SECRET_KEY . "&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']
    );
    $response = json_decode($response);
    if ($response->success === false) {
        //Do something with error
    } else {
        if ($response->success == true && $response->score > 0.5) {
            guardarDB($email, $nombre, $phone, $password, $myObject);
        } else if ($response->success == true && $response->score <= 0.5) {
            //Do something to denied access
            echo "Human?<br>";
        } else {
            echo "NO<br>";
        }
    }
}
function guardarDB($email, $nombre, $phone, $password, $myObject)
{
    $conn = new mysqli("localhost", "root", "", "pbd");
    $sql = "INSERT INTO usuarios(nombre,email,password,phone) VALUES('" . $nombre . "', '" . $email . "', '" . md5($password) . "','" . $phone . "' )";
    if ($conn->multi_query($sql) === TRUE) {
        echo "  insert  table \"pbd\"<br/>";
        $last_id = $conn->insert_id;
        echo  "Id asociado: " . $last_id;
    } else {
        echo "Error T insert table \"pbd\"<br/>" . $conn->error;
    }
    $conn->close();
}
