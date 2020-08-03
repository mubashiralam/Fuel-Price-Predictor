<!DOCTYPE html>
<html>
	<head>
		<title>Due amount funtion Test</title>
		
	</head>
	<body style="background-color:grey;">
	<h1> Testing Total</h1>
	<p id="amountdue"> check </p>	
			
		<script>
            
                        function calculatePrice(){
                            var ppg= 2.5;
                            var gallons =0;
                            return ppg * gallons;
                           
                        }
                        document.getElementById("amountdue").innerHTML =calculatePrice();
                   
		</script>
	
	</body>
</html>


