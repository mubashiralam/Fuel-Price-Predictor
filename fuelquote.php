<?php
require_once('entity/fuelprice.php');
require_once('entity/users.php');
require_once('entity/quotes.php');

$users = User::getInstance();
$quoteHistory = FuelQuote::getInstance();

	session_start();

	if ( !isset( $_SESSION["USERNAME"] ) ) {
		echo '<script language="javascript">';
		echo 'window.location = "http://localhost/login.php"';
		echo '</script>';
	}

	$priceModule = new FuelPrice();
	$ppg = $priceModule->getPricePerGallon();
	$address = $users->getUser($_SESSION["USERNAME"])["ADDRESS1"];
	$state = $users->getUser($_SESSION["USERNAME"])["STATE"];
	$isNotFirstTime = 0;

	if ( $quoteHistory->getQuotationHistory($_SESSION["USERNAME"]) != false ) {
		$isNotFirstTime = 1;
	}

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
				<center><img src="img/logo.PNG"></center>
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

		<form method="post" action="middleware/order.php">
		<div class="registrationbox" >
				<h1>Fuel Quote</h1>
			<div class="textbox">
				<i class="fa fa-pencil" aria-hidden="true"></i>
				<input id="gallons" type="number" name="GallonsRequested" onChange="calculatePrice()" min=1 required="required" oninvalid="alert('Please Enter Gallons Requested');" Placeholder="Please Enter Gallons Requested">
			</div>
			<div class="textbox">
		  		<i class="fa fa-address-book" aria-hidden="true"></i>
				<input type="text" name="DeliveryAddress"  value=<?php echo $address; ?> >
			</div>
			
			<div class="textbox">
				<i class="fa fa-address-book" aria-hidden="true"></i>
				<label>Delivery Date</label>
				<input id="datefield" type="date" name="deliverydate" required="required">
			</div>
			<div class="textbox">
				<i class="fa fa-pencil" aria-hidden="true"></i>
				<input id="pricepg" step="0.001" type="number" name="SuggestedPrice"  placeholder="Suggested Price" required="required" >
			</div>
			<div class="textbox">
				<i class="fa fa-pencil" aria-hidden="true"></i>
				<input id="dueAmt" step="0.001" type="number" name="Totalamountdue"  placeholder="Total Price" required="required">
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
			var margin = 0;
            var ppg = 1.50;
			var state = '<?php echo $state ;?>';
			var isNotFirstTime = '<?php echo $isNotFirstTime ;?>'; 
			//Location factor
			if ( state == "TX" ) {
				margin = margin + .02;
			}
			else {
				margin = margin + .04;
			}

			//Rate history factor
			if ( isNotFirstTime > 0 ) {
				margin = margin - 0.01;
			}

			//Gallons factor
			if ( gallons > 1000 ) {
				margin = margin + .02;
			}
			else {
				margin = margin + .03;
			}

			//Company profit factor
			margin = margin + .1;

			//Total margin
			margin = margin * ppg;

			var suggestedPrice = ppg + margin;
			suggestedPrice = Math.round((suggestedPrice + Number.EPSILON) * 1000) / 1000;

            var total = gallons * suggestedPrice;
			total = Math.round((total + Number.EPSILON) * 1000) / 1000;

            document.getElementById("dueAmt").value = total;
			document.getElementById("pricepg").value = suggestedPrice;
        }
    </script>

</body>