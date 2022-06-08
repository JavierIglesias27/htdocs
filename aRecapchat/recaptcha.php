<?php
date_default_timezone_set('Europe/Madrid');

define("RECAPTCHA_V3_SECRET_KEY", '6LepHlMgAAAAANAWwdPTbXISe5rKHLbQEno8tQV1');

// if (isset($_POST['email']) && $_POST['email']) {
//     $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
// } else {
//     // set error message and redirect back to form...
//     header('location: subscribe_newsletter_form.php');
//     exit;
// }
if (isset($_POST['g-recaptcha-response'])) {
    $captcha = $_POST['g-recaptcha-response'];
} else {
    $captcha = false;
}
echo $captcha . "<br><br>";

//
if (!$captcha) {
    //Do something with error
} else {
    $response = file_get_contents(
        "https://www.google.com/recaptcha/api/siteverify?secret=" . RECAPTCHA_V3_SECRET_KEY . "&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']
    );
    $response = json_decode($response);
    if ($response->success === false) {
        //Do something with error
    }
    //echo '<script>window.setTimeout(function () {window.history.back();},10000);</script>';
}
if ($response->success == true && $response->score > 0.5) {
    echo "OK<br>";
    /*copiar el ajax primero importdo */
} else if ($response->success == true && $response->score <= 0.5) {
    //Do something to denied access
    echo "Human?<br>";
} else {
    echo "NO<br>";
}
