<?php
require_once('entity/users.php');

    session_start();

    if ( isset( $_SESSION["USERNAME"] ) ) {
        echo '<script language="javascript">';
        echo 'alert("Welcome, '. $_SESSION["USERNAME"] .'.");';
        echo '</script>';
    }
    else {
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
            <<form method="post" action="registrar.php">>
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
                <input type="text" name="STATE" required="required" oninvalid="alert('Please Enter your State');" Placeholder="State">
                <select name="State" id="state">
                    <option value="Ny">Ny</option>
                    <option value="LA">LA</option>
                    <option value="FL">FL</option>
                    <option value="NJ">NJ</option>
                </select>
			</div>
			<div class="textbox">
				<i class="fa fa-pencil" aria-hidden="true"></i>
				<input type="text" name="ZIPCODE" maxlength="9" required="required" oninvalid="alert('Please Fill Zipcode');" Placeholder="Zipcode">
            </div>

            <button name="register" class="btn">Submit</button>
            </form>
		</div>
</body>