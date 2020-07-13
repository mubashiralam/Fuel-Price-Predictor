<?php
require_once('entity/users.php');

    session_start();

	if ( !isset( $_SESSION["USERNAME"] ) ) {
		echo '<script language="javascript">';
		echo 'window.location = "http://localhost/login.php"';
		echo '</script>';
	}
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
	
		<div>
                <h1>Register User Profile</h1>
            <form method="post" action="middleware/registeruser.php">
			<div class="textbox">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" maxlength="50" name="FULL_NAME" required="required" oninvalid="alert('Please Fill Full Name');" Placeholder="Full Name">
			</div>
			<div class="textbox">
                <i class="fa fa-address-book" aria-hidden="true"> </i>
                <input type="text" name="ADDRESS1" maxlength="100" required="required" oninvalid="alert('Please Fill Address1');" Placeholder="Address1">
			</div>
			<div class="textbox">
                <i class="fa fa-address-book" aria-hidden="true"></i>
                <input type="text" name="ADDRESS2" maxlength="100" required="required" oninvalid="alert('Please Fill Address1');" Placeholder="Address1">
			</div>
			<div class="textbox">
				<i class="fa fa-address-book" aria-hidden="true"></i>
				<input type="text" name="CITY" maxlength="100" required="required" Placeholder="City">
			</div>
			<div class="textbox">
				<i class="fa fa-pencil" aria-hidden="true"></i>
                <select name="STATE" id="STATE" required="required" oninvalid="alert('Please Enter your State');">
                    <option value="Al">AL</option>
                    <option value="AK">AK</option>
                    <option value="AZ">AZ</option>
                    <option value="AR">AR</option>
                    <option value="CA">CA</option>
                    <option value="CO">CO</option>
                    <option value="CT">CT</option>
                    <option value="DE">DE</option>
                    <option value="DC">DC</option>
                    <option value="FL">FL</option>
                    <option value="GA">GA</option>
                    <option value="HI">HI</option>
                    <option value="ID">ID</option>
                    <option value="IL">IL</option>
                    <option value="IN">IN</option>
                    <option value="IA">IA</option>
                    <option value="KS">KS</option>
                    <option value="KY">KY</option>
                    <option value="LA">LA</option>
                    <option value="ME">ME</option>
                    <option value="MD">MD</option>
                    <option value="MA">MA</option>
                    <option value="MI">MI</option>
                    <option value="MN">MN</option>
                    <option value="MS">MO</option>
                    <option value="MT">MT</option>
                    <option value="NE">NE</option>
                    <option value="NV">NV</option>
                    <option value="NH">NH</option>
                    <option value="NJ">NJ</option>
                    <option value="NM">NM</option>
                    <option value="NY">NY</option>
                    <option value="NC">NC</option>
                    <option value="ND">ND</option>
                    <option value="OH">OH</option>
                    <option value="OK">OK</option>
                    <option value="OR">OR</option>
                    <option value="PA">PA</option>
                    <option value="RI">RI</option>
                    <option value="SC">SC</option>
                    <option value="TN">TN</option>
                    <option value="TX">TX</option>
                    <option value="UT">UT</option>
                    <option value="VT">VT</option>
                    <option value="VA">VA</option>
                    <option value="WA">WA</option>
                    <option value="WV">WV</option>
                    <option value="WI">WI</option>
                    <option value="WY">WY</option>


                    


                </select>
			</div>
			<div class="textbox">
				<i class="fa fa-pencil" aria-hidden="true"></i>
				<input type="number" name="ZIPCODE" maxlength="9" minlength="5" required="required" oninvalid="alert('Please Fill Zipcode');" Placeholder="Zipcode">
            </div>

            <button name="register" class="btn">Submit</button>
            </form>
		</div>
</body>