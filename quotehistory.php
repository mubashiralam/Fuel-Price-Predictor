<?php
require_once('entity/fuelquote.php');

    session_start();

    if ( isset( $_SESSION["USERNAME"] ) ) {
        echo '<script language="javascript">';
        echo '</script>';
    }
    else {
        echo '<script language="javascript">';
        echo 'window.location = "http://localhost/login.php"';
        echo '</script>';
    }

    //$users = User::getInstance();
    //$userData = $users->getUserData($_SESSION["USERNAME"]);
?>

<html>
<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/customstyle.css" type = "text/css">
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="js/jquery.js"></script>
		<style>
table, th, td {
  border: 1px solid black;
  margin-left:400;
}
</style>
</head>


<body id="boxbody">
	<div class="mycontainer">
	<div class="mywrapper">
		<div class="mynavbar">
				<div class="logo">
				<center><img src="img/logo.PNG"></center>
				<br>
			</div>
			<div class="usernavbar">
			<div class="headernav" >
				<a href="home.php" >Home</a>
			</div>	
			<div class="headernav" >
				<a href="fuelquote.php" >Fuel Quote</a>
			</div>
			<div class="headernav">
				<a href="#" >Quote History</a>
			</div>	
			<div class="headernav">
			<div class="headernav">
				<a href="index.php" ><button style="width:auto;">Logout</button></a>
			</div>
			<br>
		</div>
		</div>
<br>
<h1>Quote History</h1>

<table>
  <tr>
    <th>Requested Gallon</th>
    <th>Delivery Address</th>
    <th>Delivery Date</th>
    <th>Suggested Price</th>
    <th>Total Amount Due</th>
  </tr>

  <tr>
  <td>10</td>
  <td>Anchorage Alaska, USA. 99501</td>
  <td>04/06/2020</td>
  <td>25.50</td>
  <td>255.00</td>
  </tr>
  
  <tr>
  <td>13</td>
  <td>Anchorage Alaska, USA. 99501</td>
  <td>14/06/2020</td>
  <td>25.50</td>
  <td>331.50</td>
  </tr>
  
  <tr>
  <td>15</td>
  <td>Anchorage Alaska, USA. 99501</td>
  <td>24/06/2020</td>
  <td>25.50</td>
  <td>382.50</td>
  </tr>
</table>

</body>
</html>
