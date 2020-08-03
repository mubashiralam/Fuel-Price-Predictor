<?php
require_once('../middleware/uservalidation.php');
require_once('../entity/users.php');

$username   = $_POST["USERNAME"];
$password   = $_POST["PASSWORD1"];
$confirmPassword = $_POST["PASSWORD2"];

if ( $password != $confirmPassword ) {
    echo '<script language="javascript">';
    echo 'alert("Passwords doesn\'t match");';
    echo 'window.location = "http://localhost/registration.php"';
    echo '</script>';
    exit();
}

$users = User::getInstance();
$validator = new UserValidation();

session_start();

if ( $validator->isDuplicate( $username ) ) {
    echo '<script language="javascript">';
    echo 'alert("Duplicate username");';
    echo 'window.location = "http://localhost/login.php"';
    echo '</script>';
}
else {

    $_SESSION["USERNAME"] = $_POST["USERNAME"];

    $result = $users->addUserCredentials( $username, $password);

    if ( !$result ) {
        echo '<script language="javascript">';
        echo 'alert("Unable to register.");';
        echo 'window.location = "http://localhost/index.php"';
        echo '</script>';
    }
    else {
        echo '<script language="javascript">';
        echo 'alert("Welcome, '. $username .'.");';
        echo 'window.location = "http://localhost/registrationform.php"';
        echo '</script>';
    }
}

?>