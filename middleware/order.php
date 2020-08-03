<?php
require_once('../entity/quotes.php');
$orderModule = FuelQuote::getInstance();

session_start();

$username = $_SESSION["USERNAME"];
$date = $_POST["deliverydate"];
$totalGallons = $_POST["GallonsRequested"]; 
$totalPrice = $_POST["Totalamountdue"];

$result = $orderModule->addQuotation( $username, $date, $totalGallons, $totalPrice );

if ( !$result ) {
    echo '<script language="javascript">';
    echo 'alert("Unable to place an order.");';
    echo 'window.location = "http://localhost/login.php"';
    echo '</script>';
}
else {
    echo '<script language="javascript">';
    echo 'alert("Order placed successfully.");';
    echo 'window.location = "http://localhost/quotehistory.php"';
    echo '</script>';
}
?>