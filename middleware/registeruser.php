<?php
require_once('../middleware/uservalidation.php');
require_once('../entity/users.php');

echo $_POST["STATE"];

$fullName   = isset($_POST["FULL_NAME"]) ?  $_POST["FULL_NAME"] : "";
$address1   = isset($_POST["ADDRESS1"]) ?  $_POST["ADDRESS1"] : "";
$address2   = isset($_POST["ADDRESS2"]) ?  $_POST["ADDRESS2"] : "";
$city       = isset($_POST["CITY"]) ?  $_POST["CITY"] : "";
$state      = isset($_POST["STATE"]) ?  $_POST["STATE"] : "";
$zipCode    = isset($_POST["ZIPCODE"]) ?  $_POST["ZIPCODE"] : "";

$error = "Invalid length of";
$flag = false;

if ( strlen($fullName) < 1 || strlen($fullName) > 50 ) {
    $error = $error." full-name ";
    $flag = true;
}

if ( strlen($address1) < 1 || strlen($address1) > 100 ) {
    $error = $error." address1 ";
    $flag = true;
}

if ( strlen($address2) > 100 ) {
    $error = $error." address2 ";
    $flag = true;
}

if ( strlen($city) < 1 || strlen($city) > 100 ) {
    $error = $error." city ";
    $flag = true;
}

if ( strlen($state) != 2 ) {
    $error = $error." state ";
    $flag = true;
}

if ( strlen($zipCode) < 5 || strlen($zipCode) > 9 ) {
    $error = $error." zip-code ";
    $flag = true;
}

$users = User::getInstance();

session_start();

if ( isset( $_SESSION["USERNAME"] ) ) {

    if ( $flag ) {
        echo '<script language="javascript">';
        echo 'alert("'. $error .'");';
        echo 'window.location = "http://localhost/registrationform.php"';
        echo '</script>';
        exit(); 
    }

    $username = $_SESSION["USERNAME"];
    $result = $users->addUserData( $username, $fullName, $address1, $address2, $city, $state, $zipCode);

    if ( !$result ) {
        echo '<script language="javascript">';
        echo 'alert("Unable to register.");';
        echo 'window.location = "http://localhost/login.php"';
        echo '</script>';
    }
    else {
        echo '<script language="javascript">';
        echo 'alert("Details registered successfully.");';
        echo 'window.location = "http://localhost/home.php"';
        echo '</script>';
    }
}
else {
    echo '<script language="javascript">';
    echo 'alert("Unauthorized access.");';
    echo 'window.location = "http://localhost/login.php"';
    echo '</script>';
}

?>