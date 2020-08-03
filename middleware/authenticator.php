<?php
require_once('uservalidation.php');

$username = $_POST["USERNAME"];
$password = $_POST["PASSWORD"];

$validator = new UserValidation();

if ( $validator->validateUser( $username, $password ) ) {
    if ( !isset( $_SESSION["USERNAME"] ) ) {
        session_start();
        $_SESSION["USERNAME"] = $_POST["USERNAME"];
    }
    echo '<script language="javascript">';
    echo 'window.location = "http://localhost/home.php"';
    echo '</script>';
}
else {
    echo '<script language="javascript">';
    echo 'alert("Invalid Credentials");';
    echo 'window.location = "http://localhost/login.php"';
    echo '</script>';
}

?>