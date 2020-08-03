<!DOCTYPE html>
<html>
	<head>
		<title>Test Password</title>
		
	</head>
	<body style="background-color:grey;">
	<h1> Testing Password</h1>
	<p id="checkpas"> checkpas </p>	
			
		<script>
			var pas= "abc123";
			var confirmpas= "abc123";
		
			//function to check if the entered password match each other or not.
			function checkPassword(password,confirmPassword) {
				
				if (password != confirmPassword) {
					alert("Password did not match")
					return false;
				} 
				alert("Password  match")
					return true;
				}
			
			document.getElementById("checkpas").innerHTML = checkPassword(pas, confirmpas);
		</script>
	
	</body>
</html>