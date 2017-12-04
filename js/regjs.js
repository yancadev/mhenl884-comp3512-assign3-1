/*ERROR HANDLING JS FOR REGISTER.PHP*/

function	setBackground(e)	{
				if	(e.type	==	"focus")	{
							e.target.classList.toggle('highlight');
				}
				else	if	(e.type	==	"blur")	{
								e.target.classList.toggle('highlight');
								checkForEmptyFields(e);
								
				}
}



window.addEventListener("load",	function(){
				var	cssSelector	=	"input[type=text],input[type=email],input[type=password]";
				var	fields	=	document.querySelectorAll(cssSelector);
				for	(var i=0;	i<fields.length;	i++)
				{
								
								fields[i].addEventListener("focus",	setBackground);
								fields[i].addEventListener("blur",	setBackground);
								
								
				}
				

});




/*




// ----- validate form error ----- //

function	init()	{
				document.getElementById("reg").addEventListener("submit", checkForEmptyFields);				
}

//	initialize	handlers	once	page	is	ready	
window.addEventListener("load",	init);

//	ensures	form	fields	are	not	empty	
function	checkForEmptyFields(e)	{	
	var	cssSelector	=	"input[type=text],input[type=email],input[type=password]";
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



*/