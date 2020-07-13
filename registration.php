<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/customstyle.css" type = "text/css">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
	<body id="boxbody">
	<form method="post" action="middleware/registercredentials.php">
		<div class="registrationbox" >
				<h1>Client Registration</h1>
			
			<div class="textbox">
				<i class="fa fa-user" aria-hidden="true"></i>
				<input type="text" name="USERNAME"  required="required" oninvalid="alert('Please Fill User Name');" Placeholder="username">
			</div>
			<div class="textbox">
				<i class="fa fa-lock" aria-hidden="true"></i>
				<input id="password" type="password" name="PASSWORD1"  required="required" oninvalid="alert('Please Fill password');" Placeholder="password">
			</div>
			<div class="textbox">
			<i class="fa fa-lock" aria-hidden="true"></i>
				<input id="ConfirmPassword" type="password" name="PASSWORD2"  required="required" oninvalid="alert('Re-Enter your Password');" Placeholder="Confirm password">
			</div>
				<button id="btnSubmit" name="register" class="btn" >Register</button>
			
		</div>
		</form>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		
<script type="text/javascript">
    $(function () {
        $("#btnSubmit").click(function () {
            var password = $("#password").val();
            var confirmPassword = $("#ConfirmPassword").val();
            if (password != confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }
            return true;
        });
    });
</script>
	</body>
</html>