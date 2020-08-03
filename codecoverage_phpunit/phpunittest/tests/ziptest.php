<!DOCTYPE html>
<html>
	<head>
		<title>Zipcode test</title>
		
	</head>
	<body style="background-color:grey;">
	<h1> Testing Zpcode </h1>
	<p id="ZipCheck"> check </p>	
			
	<script>
    var zip ="79402";
    // to check if zipcode is right or not.
   function stateCheck(zipc){
            if (zipc.length < 5 || zipc.length > 9 ) {
                alert("Please enter valid zipcode !");

                return false;
            } else {
            	alert("Passed");
                return true;
            }
        }
        document.getElementById("ZipCheck").innerHTML =stateCheck(zip);
</script>
	</body>
</html>


