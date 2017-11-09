<?php
require_once('config.php');
$pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$sql=mysql_query("select UserID, UserName, Password, Salt, State, DateJoined, DateLastModified
from UsersLogin where UserName='$user_check'");
$result = $pdo-> query ($sql);
while ($row = $result->fetch()){
    $login_session =$row['UserName'];
}

if(!isset($login_session)){
    $pdo = null; // Closing Connection
    header('Location: login-page.php'); 
}
?>