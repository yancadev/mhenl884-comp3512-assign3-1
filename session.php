<?php
include 'includes/book-config.inc.php';
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
    header('Location: login-page.php'); 
}


// i only get the previous page (which is login) //
/*session_start();

$_POST

$_SESSION['url'] = $_SERVER['REQUEST_URI']; 
$prev = $_SESSION['url'];
echo $_SESSION['url'];

if (isset($_POST['submit'])){
    echo "has logged";
} else {
//header('Location: login-page.php');
}*/
?>