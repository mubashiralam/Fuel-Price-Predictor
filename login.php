<?php
	session_start();
	
   if ( isset( $_SESSION["USERNAME"] ) ) {
	   unset($_SESSION["USERNAME"]);

	   if (ini_get("session.use_cookies")) {
		   $params = session_get_cookie_params();
		   setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"],$params["httponly"]);
		}

		session_destroy();
	}
?>

<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/customstyle.css" type = "text/css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width device-width, initial-scale=1">
</head>
	<body id="boxbody">
		<div class="loginbox">
		<form method="post" action="authenticator.php">

				<h1 >Login Form</h1>
			<div class="textbox" >
				<i class="fa fa-user" aria-hidden="true"></i>
				<input type="text" name="USERNAME" required="required" oninvalid="alert('Please Fill User Name')" Placeholder="username">
			</div>
			<div class="textbox">
				<i class="fa fa-lock" aria-hidden="true"></i>
				<input type="password" name="PASSWORD" required="required" oninvalid="alert('Please Fill password')" Placeholder="password">
			</div>
			
				<button name="login" class="btn">Login</button>
				</form>
		</div>
	</body>
</html>