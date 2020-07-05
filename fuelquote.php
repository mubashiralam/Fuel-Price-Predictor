<?php
require_once('entity/user.php');

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
		
</head>

<body id="boxbody">

	<div class="mycontainer">
	<div class="mywrapper">
		<div class="mynavbar">
				<div class="logo">
				<center><img src="../logo.PNG"></center>
			</div>
			<div class="usernavbar">
			<div class="headernav" >
				<a href="home.php" >Home</a>
			</div>	
			<div class="headernav" >
				<a href="#">Fuel Quote</a>
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

		<form method="post" action="#">
		<div class="registrationbox" >
				<h1>Fuel Quote</h1>
			<div class="textbox">
				<i class="fa fa-pencil" aria-hidden="true"></i>
				<input id="gallons" type="number" name="GallonsRequested" onChange="calculatePrice()" min=1 required="required" oninvalid="alert('Please Enter Gallons Requested');" Placeholder="Please Enter Gallons Requested">
			</div>
			<div class="textbox">
		  		<i class="fa fa-address-book" aria-hidden="true"></i>
				<input type="text" name="DeliveryAddress"  value="Anchorage Alaska, USA. 99501">
			</div>
			
			<div class="textbox">
				<i class="fa fa-address-book" aria-hidden="true"></i>
				<label>Delivery Date</label>
				<input id="datefield" type="date" name="deliverydate">
			</div>
			<div class="textbox">
				<i class="fa fa-pencil" aria-hidden="true"></i>
				<input id="pricepg" type="number" name="SuggestedPrice"  required="required"  value="25.50">
			</div>
			<div class="textbox">
				<i class="fa fa-pencil" aria-hidden="true"></i>
				<input id="dueAmt" type="number" name="Totalamountdue"  placeholder="Total Price" required="required">
			</div>
			<button name="order" class="btn" >Place Order</button>
		</div>
		</form>

    <script>
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();
        if(dd<10){
                dd='0'+dd
            } 
            if(mm<10){
                mm='0'+mm
            } 

        today = yyyy+'-'+mm+'-'+dd;
        document.getElementById("datefield").setAttribute("min", today);

        function calculatePrice() {
            var elt = document.getElementById("gallons");
            var gallons = elt.value;

            elt = document.getElementById("pricepg");
            var ppg = elt.value;

            var total = gallons * ppg;
            document.getElementById("dueAmt").value= total;
        }
    </script>

</body>