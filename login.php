<?php

include 'includes/book-config.inc.php';
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password is invalid";
    }
else{
    $username=$_POST['username'];
    $password=$_POST['password'];
    
    // Selecting Database
    $pdo = new PDO(DBCONNECTION, DBUSER, DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "select UserID, UserName, Password, Salt, State, DateJoined, DateLastModified from UsersLogin where UserName='$username'";
    $result = $pdo-> query ($sql);
    while ($row = $result->fetch()){
        $salt = $row['Salt'];
        $pass = md5($_POST['password'].$salt);
        if ($row['Password'] == $pass) {
            $_SESSION['userid']= $row['UserID']; // Initializing Session
            $sql2 = "select UserID, FirstName, LastName, Address, City, Region, Country, Postal, Phone, Email from Users";
            $result2 = $pdo-> query($sql2);
            while ($row = $result2->fetch()){
                $_SESSION['firstname']=$row['FirstName'];
                $_SESSION['lastname']=$row['LastName'];
                $_SESSION['email']=$row['Email'];
            }
            header("location: index.php"); // Redirecting To Other Page
        } else {
            $error = "Username or Password is invalid";
        }
    }
    $pdo = null; // Closing Connection
    }
}


?>


<!-- THIS PAGE CHECKS FOR ERRORS AND SESSION -->

<?php
/*include 'includes/book-config.inc.php';
include 'session.php';
//include 'login-page.php';
//session_start();


$pdo = new PDO(DBCONNECTION, DBUSER, DBPASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//if (isset($_POST['submit'])) {
//}

if (isset($_POST['submit'])){
    
} else {
    $username = "";
    $password = "";
    $username = $_POST['username'];
    $password = $_POST['password'];
    echo "oi";


$sql = "select * from UsersLogin where UserName='" . $username . "'";
$result = $pdo->query($sql);

while ($row = $result->fetch()){
    //header('Location: index.php');
    $salt = $row['Salt'];
    $pass = md5($_POST['password'].$salt); //or $password
    if ($row['Password'] == $pass) {
        echo "works";
        echo $pass;
    //    header('Location: index.php');
        $_SESSION['userid']= $row['UserID']; // Initializing Session and getting info
        $sql2 = "select UserID, FirstName, LastName, Address, City, Region, Country, Postal, Phone, Email from Users join UsersLogin using (UserID) where UserName= '" . $username . "'"; 
        $result2 = $pdo-> query($sql2);
        while ($row = $result2->fetch()){
            $_SESSION['firstname']=$row['FirstName'];
            $_SESSION['lastname']=$row['LastName'];
            $_SESSION['email']=$row['Email'];
        
            echo $row['FirstName'] . $row['LastName'] . $row['Email'];
        }
        
       
        
        
    } else { 
        echo "doesn't work!!";
    
       //<!-- OVER HERE ELLEN! i just need the error message javascript to pop up-->
       echo '<script type="text/javascript"> document.getElementById("errormsg").style.display = "block"; </script>';
        
    
    }
    
    
     if(isset($_SESSION['url'])) {
        
        //$url = $_SESSION['url'];
        echo $prev;
        //header('Location:'.$url);
       }
}




}

 $pdo = null;
?>


<script type="text/javascript">

function	init()	{
	document.getElementById("mainform").addEventListener("submit", checkForEmptyFields);				
}
window.addEventListener("load",	init);

// Removing error message when typing - DOESN'T FULLY WORK //

function	removeErr(e)	{
				if	(e.type	==	"blur")	{
								checkForEmptyFields(e);
				}
}
window.addEventListener("load",	function(){
				var	cssSelector	=	"input[type=text],input[type=password]";
				var	fields	=	document.querySelectorAll(cssSelector);
				for	(var i=0;	i<fields.length;	i++)
				{
					fields[i].addEventListener("blur",	removeErr);
				}
});


// ERROR CHECKING FOR LOGIN //
function checkForEmptyFields(e)	{
    console.log("working");
	var	cssSelector	=	"input[type=text],input[type=password]";
	var	fields	=	document.querySelectorAll(cssSelector);
	var	fieldList	=	[];
	var error = document.getElementById("errormsg");
	for	(var i=0;	i<fields.length; i++)	{
		if	(fields[i].value ==	null || fields[i].value	== ""){
			e.preventDefault();
			fieldList.push(fields[i]);
			error.style.display = "block";
		} else {
			error.style.display = "none";
		}
	}
}
				    
</script>

*/

//include 'includes/book-config.inc.php';


/*session_start(); // Starting Session
$error=''; // Variable To Store Error Message

$db = new LoginGateway($connection);
$db2 = new SessionGateway($connection);

if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password is invalid";
    }
}
else{
    $username = "";
    $password = "";
    if(isset($_POST['username'])&&isset($_POST['password'])){
        $username .= $_POST['username'];
        $password .= $_POST['password'];
        $result = $db-> findByField("UserName", $username);
        foreach ($result as $row) {
            $salt = $row['Salt'];
            $pass = md5($_POST['password'].$salt);
            if ($row['Password'] == $pass) {
                $_SESSION['userid']= $row['UserID']; // Initializing Session
                $id = $row['UserID'];
                $result2 = $db2-> findByField("UserID", $id);
                foreach($result2 as $row){
                    $_SESSION['firstname']=$row['FirstName'];
                    $_SESSION['lastname']=$row['LastName'];
                    $_SESSION['email']=$row['Email'];
                }
                header("location: index.php"); // Redirecting To Other Page
            } 
            else {
                $error = "Username or Password is invalid";
            }
        }   
    }
}*/


/*
// PREVIOUSLY WORKING CODE //
session_start(); // Starting Session
$error=""; // Variable To Store Error Message
if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password is invalid";
    }
else{
    $username=$_POST['username'];
    $password=$_POST['password'];
    
    // Selecting Database
    $pdo = new PDO(DBCONNECTION, DBUSER, DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "select UserID, UserName, Password, Salt, State, DateJoined, DateLastModified from UsersLogin where UserName='$username'";
    $result = $pdo-> query ($sql);
    while ($row = $result->fetch()){
        $salt = $row['Salt'];
        $pass = md5($_POST['password'].$salt);
        if ($row['Password'] == $pass) {
            $_SESSION['userid']= $row['UserID']; // Initializing Session
            $sql2 = "select UserID, FirstName, LastName, Address, City, Region, Country, Postal, Phone, Email from Users";
            $result2 = $pdo-> query($sql2);
            while ($row = $result2->fetch()){
                $_SESSION['firstname']=$row['FirstName'];
                $_SESSION['lastname']=$row['LastName'];
                $_SESSION['email']=$row['Email'];
            }
            header("location: index.php"); // Redirecting To Other Page
        } else {
            $error = "Username or Password is invalid";
        }
    }
    $pdo = null; // Closing Connection
    }
}

*/


/*function redirectAfterLogin()
{
    if (isset($_GET['name']))
    {
        header("location: login-page.php?page=" . $_GET['page'] . "php");
        
    }
    else
    {
        $error= header("location: login-page.php");
    }
}*/

?>
