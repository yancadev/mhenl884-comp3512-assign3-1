<!-- yanca: added error message when logging in -->
<!-- THIS PAGE IS RESPONSIBLE FOR THE LOGIN LAYOUT -->


<?php
include 'login.php'; 
include 'session.php';

//if(isset($_SESSION['login_user'])){
//header("location: index.php");
//}

?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.blue_grey-orange.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <script   src="https://code.jquery.com/jquery-1.7.2.min.js" ></script>
    <script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
</head>
<body>
    
    <div class="mdl-layout mdl-js-layout mdl-color--grey-100">
	<main class="mdl-layout__content">
	    
		<div class="mdl-card mdl-shadow--6dp">
			<div class="mdl-card__title mdl-color--primary mdl-color-text--white">
				<h2 class="mdl-card__title-text"><center> Login </center> </h2>
			</div>
	  	<div class="mdl-card__supporting-text">
	  	    
	  	    <!-- NEEDS REDIRECTING TO PREVIOUS PAGE OR INDEX -->
				<form id="mainform" action="index.php" method="pos"  main="mainform">
					<div class="mdl-textfield mdl-js-textfield">
						<input class="mdl-textfield__input" type="text" id="username" name="username" />
						<label class="mdl-textfield__label" for="username">Username</label>
					</div>
					<div class="mdl-textfield mdl-js-textfield">
						<input class="mdl-textfield__input" type="password" id="userpass" name="password"/>
						<label class="mdl-textfield__label" for="userpass">Password</label>
					</div>
				
			</div>
			<div class="mdl-card__actions mdl-card--border">
				<input type="submit"/>
				<!--<button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">Log in</button>-->
			</div>
			</form>
		</div>
		
		<br/>
		<div id="errormsg">
		<div class="mdl-card mdl-shadow--4dp" >
			<div class="mdl-card__title  mdl-color-text--white mdl-color--red-800">
				<h2 class="mdl-card__title-text "><center> Login unsuccessful </center> </h2>
			</div>
			<br/><br/>
	  	    <div class="mdl-card__supporting-text">
				Error logging in: wrong username or password.
			</div>
			
		</div>
		</div>
			
	
	
	
	</main>
</div>
<br/></br/>

    
 
-->
</body>
</html>