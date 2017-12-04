<?php ?>



<!DOCTYPE html>
<html>
  <head>
    <title>Browse Books</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.blue_grey-orange.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://code.jquery.com/jquery-1.7.2.min.js" ></script>
    <script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
    
    
    

  </head>
  <body>
    
		<div id="regis">
    <div class="mdl-layout mdl-js-layout mdl-color--grey-100">
	<main class="mdl-layout__content">
		<div class="mdl-card mdl-shadow--6dp">
			<div class="mdl-card__title mdl-color--primary mdl-color-text--white">
				<h2 class="mdl-card__title-text">Register </h2>
			</div>
	  	<div class="mdl-card__supporting-text">
	  		
				<form action="#" method="" id="reg">
						<label>First Name:</label> <input type="text" name="" class="hifield"><br/><br/>
						<label>Last Name: </label> <input type="text" name="" class="required hifield"><br/><br/>
						<label>Address: </label> <input type="text" name="" class="hifield"><br/><br/>
						<label>City:</label> <input type="text" name="" class="required hifield"><br/><br/>
						<label>Region:</label> <input type="text" name="" class="hifield"><br/><br/>
						<label>Country:</label> <input type="text" name="" class="required hifield"><br/><br/>
						<label>Postal code:</label> <input type="text" name="" class="hifield"><br/><br/>
						<label>Phone:</label> <input type="number" name="" class="hifield"><br/><br/>
						<label>Email:</label> <input type="email" name="email" class="required hifield" id="em" pattern="([A-Za-z0-9_\.\-])+@[\w]+\.[\w]{2,6}" title="format: abc@x.yz"><br/><br/>
						<label>Password:</label> <input type="password" name="pass" id="pass" class="hifield"><br/><br/>
						<label>Re-enter Password:</label> <input type="password" name="conf" id="conf" class="hifield"><br/><br/>
						<span id="mess" class="mess"></span>
						<br/>
						<div class="mdl-card__actions mdl-card--border">
						<input type="submit" name="register"> 
						</div>
				</form>
			</div>
			
		</div>
	</main>
</div>
      
		</div>
		
		
		
		
		
		
		<script>
		

    var pass1 = document.getElementById('pass');
    var pass2 = document.getElementById('conf');
    var message = document.getElementById('mess');
    var correct = "#ace1af";
    var mismatch = "#ffb7c5";


$(document).ready(function() {
  $("#conf").keyup(validate);
});


function validate() {
  var password1 = $("#pass").val();
  var password2 = $("#conf").val();

    
 
    if(password1 == password2) {
    	pass2.style.backgroundColor = correct;
            
    }
    else {
    	pass2.style.backgroundColor = mismatch;
        
    }
    
}

		
function	setBackground(e)	{
				if	(e.type	==	"focus")	{
							e.target.classList.toggle('highlight');
				}
				else	if	(e.type	==	"blur")	{
								e.target.classList.toggle('highlight');
								//checkForEmptyFields(e);
								
				}
}



window.addEventListener("load",	function(){
				var	cssSelector	=	"input[type=text]";
				var	fields	=	document.querySelectorAll(cssSelector);
				for	(var i=0;	i<fields.length;	i++)
				{
								
								fields[i].addEventListener("focus",	setBackground);
								fields[i].addEventListener("blur",	setBackground);
								
								
				}
				

});



// ----- validate form error ----- //

function	init()	{
				document.getElementById("reg").addEventListener("submit", checkForEmptyFields);
}

//	initialize	handlers	once	page	is	ready	
window.addEventListener("load",	init);


//	ensures	form	fields	are	not	empty	
function	checkForEmptyFields(e)	{	
	var	cssSelector	=	"input[type=text], input[type=email], input[type=password]";
	var	fields	=	document.querySelectorAll(cssSelector);
//	loop	thru	the	input	elements	looking	for	empty	values
	var	fieldList	=	[];
	for	(var i=0;	i<fields.length;	i++)	{
		//if (document.getElementsByClassName('hilightable').classList.contains("required")){
		if	(fields[i].classList.contains('required') && fields[i].value	==	null || fields[i].classList.contains('required') && fields[i].value	==	"")	{
		//	since	a	field	is	empty	prevent	the	form	submission
			e.preventDefault();
			//fieldList.push( fields[i]);
			fields[i].classList.add('error');
		} else {
			fields[i].classList.remove('error');
		}
		
		//fields[i].onblur();
		

	}
}

		</script>
  </body>
 </html>