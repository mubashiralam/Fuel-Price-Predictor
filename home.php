<?php
require_once('entity/users.php');

	session_start();

	if ( !isset( $_SESSION["USERNAME"] ) ) {
		echo '<script language="javascript">';
		echo 'window.location = "http://localhost/login.php"';
		echo '</script>';
	}

    $users = User::getInstance();
    $userData = $users->getUser($_SESSION["USERNAME"]);
?>

<html>
<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/customstyle.css" type = "text/css">
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="jquery.js"></script>
		
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
				<a href="#" >Home</a>
			</div>	
			<div class="headernav" >
				<a href="fuelquote.php">Fuel Quote</a>
			</div>
			<div class="headernav">
				<a href="quotehistory.php">Quote History</a>
			</div>	
			<div class="headernav">
			<div class="headernav">
				<a href="index.php" ><button style="width:auto;">Logout</button></a>
			</div>
		</div>
		</div>
	
		<div>
				<h1>Profile</h1>
			<div class="textbox">
                <i class="fa fa-user" aria-hidden="true"></i>
                <?php echo $userData["USERNAME"] ?>
			</div>
			<div class="textbox">
                <i class="fa fa-address-book" aria-hidden="true"> </i>
                <?php echo $userData["ADDRESS1"] ?>
			</div>
			<div class="textbox">
                <i class="fa fa-address-book" aria-hidden="true"></i>
                <?php echo $userData["ADDRESS2"] ?>
			</div>
			<div class="textbox">
				<i class="fa fa-address-book" aria-hidden="true"></i>
				<?php echo $userData["CITY"] ?>
			</div>
			<div class="textbox">
				<i class="fa fa-pencil" aria-hidden="true"></i>
				<?php echo $userData["STATE"] ?>
			</div>
			<div class="textbox">
				<i class="fa fa-pencil" aria-hidden="true"></i>
				<?php echo $userData["ZIPCODE"] ?>
			</div>
		</div>
</body>