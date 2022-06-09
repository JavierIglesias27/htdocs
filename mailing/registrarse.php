<?php
switch ($_POST['api']) {
    case "checkEmail":
        /*le ponemos strip_tags xa q solo coja texto aunque sea codigo */
        $email = htmlentities(strip_tags($_POST['email']), ENT_QUOTES, "UTF-8");
        checkEmail($email);

        break;
    default:
        break;
}
function checkEmail($email)
{
    /*trim quito espacios delante
    str_replace quieta espacios entre letras
    strtolower  se pone todo a minusculas */
    $email = strtolower(str_replace(" ", "", trim($email)));


    $conn = new mysqli("localhost", "root", "", "pbd");

    $sql = "SELECT email FROM usuarios WHERE email= '" . $email . "';";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {

        while ($row = $result->fetch_assoc()) {

            echo "mail introducido" . $row['email'];
        }
    } else {
        echo "null";
    }
    $conn->close();
}
