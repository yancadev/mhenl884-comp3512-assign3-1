<?php

//include 'includes/book-config.inc.php';


/*$db = new LoginGateway($connection);
session_start();// Starting Session

// Storing Session
$user_check=$_SESSION['userid'];
$result = $db-> findByUserID($user_check);
foreach($result as $row){
    $_SESSION['userid']=$row['UserID'];
    $id = $row['UserID'];
    $db = new SessionGateway($connection);
    $result2 = $db->findByUserID($id);
    foreach($result2 as $row){
        $_SESSION['firstname']=$row['FirstName'];
        $_SESSION['lastname']=$row['.LastName'];
        $_SESSION['email']=$row['Email'];
        $login_session = $row['UserID'];
    }
}

if(!isset($login_session)){
    $pdo = null; // Closing Connection
    header('Location: login-page.php'); 
}*/

//include 'includes/config.php';





/*
// ------ FOR NOW ------ //
$pdo = new PDO(DBCONNECTION, DBUSER, DBPASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['userid'];
// SQL Query To Fetch Complete Information Of User
$sql="select UserID, UserName, Password, Salt, State, DateJoined, DateLastModified from UsersLogin where UserID='$user_check'";
$result = $pdo-> query ($sql);
while ($row = $result->fetch()){
    $_SESSION['userid']=$row['UserID'];
    $login_session = $row['UserID'];
}
$sql2 = "select UserID, FirstName, LastName, Address, City, Region, Country, Postal, Phone, Email from Users";
$result2 = $pdo-> query($sql2);
while ($row = $result2->fetch()){
    $_SESSION['firstname']=$row['FirstName'];
    $_SESSION['lastname']=$row['LastName'];
    $_SESSION['email']=$row['Email'];
}

if(!isset($login_session)){
    $pdo = null; // Closing Connection
    //<form action='' method="post">
    header('Location: login-page.php');
    //header('Location: login-page.php?=CRMAdmin/' . $_GET('page') . 'aboutus.php'); 
}
*/
?>












<script type="text/javascript">
function	init()	{
				document.getElementById("mainform").addEventListener("submit", checkForEmptyFields);				
}
/*	initialize	handlers	once	page	is	ready	*/
window.addEventListener("load",	init);
/*	ensures	form	fields	are	not	empty	*/

function checkForEmptyFields(e)	{
    
    console.log("working");
	var	cssSelector	=	"input[type=text]";
	var	fields	=	document.querySelectorAll(cssSelector);
	var error = document.getElementById("errormsg");
//	loop	thru	the	input	elements	looking	for	empty	values
	var	fieldList	=	[];
	for	(var i=0;	i<fields.length;	i++)	{
		//if (document.getElementsByClassName('hilightable').classList.contains("required")){
		if	(fields[i].value	==	null || fields[i].value	==	"")	{
		//	since	a	field	is	empty	prevent	the	form	submission
			e.preventDefault();
			error.style.display = "block";
		} else {
			error.style.display = "none";
		}
	}
}
				    
</script>