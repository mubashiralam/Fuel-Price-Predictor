<?php
require_once('entity/uservalidation.php');
require_once('entity/users.php');

$username   = isset($_POST["USERNAME"]) ?  $_POST["USERNAME"] : "";
$password   = isset($_POST["PASSWORD"]) ?  $_POST["PASSWORD"] : "";
$fullName   = isset($_POST["FULL_NAME"]) ?  $_POST["FULL_NAME"] : "";
$address1   = isset($_POST["ADDRESS1"]) ?  $_POST["ADDRESS1"] : "";
$address2   = isset($_POST["ADDRESS2"]) ?  $_POST["ADDRESS2"] : "";
$city       = isset($_POST["CITY"]) ?  $_POST["CITY"] : "";
$state      = isset($_POST["STATE"]) ?  $_POST["STATE"] : "";
$zipCode    = isset($_POST["ZIPCODE"]) ?  $_POST["ZIPCODE"] : "";

$users = User::getInstance();
$validator = new UserValidation();

if ( isset( $_SESSION["USERNAME"] ) && $fullName != NULL ) {
    session_start();

    $username = $_SESSION["USERNAME"];
    $users->addUserData( $username, $fullName, $address1, $address2, $city, $state, $zipCode);
    echo '<script language="javascript">';
    echo 'window.location = "http://localhost/home.php"';
    echo '</script>';
}
else if ( $validator->isDuplicate( $username ) ) {
    echo '<script language="javascript">';
    echo 'alert("Duplicate username");';
    echo 'window.location = "http://localhost/login.php"';
    echo '</script>';
}
else if ( !isset( $_SESSION["USERNAME"] ) ) {
    session_start();

    $_SESSION["USERNAME"] = $_POST["USERNAME"];
    $users->addUserCredentials( $username, $password);
    
    echo '<script language="javascript">';
    echo 'window.location = "http://localhost/registrationform.php"';
    echo '</script>';
}

?>