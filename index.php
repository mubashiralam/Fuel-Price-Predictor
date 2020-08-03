<?php
    session_start();

    if ( isset( $_SESSION['USERNAME'] ) ) {
        unset($_SESSION);
        
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"],$params["httponly"]);
        }
        
        session_destroy();
    }
?>

<html lang="en">
  <head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>

  <body style="background-image: url('img/1.PNG');" >
	</br>
    <div class="container-fluid">
        <div class="col-md-12">
			 	<img src="img/logo.PNG"> 
		</div>
		<br>
		<hr>
        <div class="container">
            <div class="row">
                <div class="col">
                    <a href="login.php" class="btn btn-warning btn-lg btn-block"  type="button">Client Login</a>
                </div>
                
                <div class="col">
                    <a href="registration.php" class="btn btn-warning btn-lg btn-block" type="button">Registration</a>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>