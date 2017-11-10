<?php
require_once('config.php');
$pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$sql="select UserID, UserName, Password, Salt, State, DateJoined, DateLastModified from UsersLogin where UserID='$user_check'";
$result = $pdo-> query ($sql);
$login_session="";
while ($row = $result->fetch()){
    $login_session =$row['UserID'];
}
/*$sql2 = "select UserID, FirstName, LastName, Address, City, Region, Country, Postal, Phone, Email from Users";
$result2 = $pdo-> query($sql2);
while ($row = $result2->fetch()){
    $login_session .= $row['FirstName'].$row['LastName'].$row['Email'];
}*/

if(!isset($login_session)){
    $pdo = null; // Closing Connection
    header('Location: login-page.php'); 
}
?>