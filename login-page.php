<?php
include('login.php'); 

if(isset($_SESSION['login_user'])){
header("location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.blue_grey-orange.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <script   src="https://code.jquery.com/jquery-1.7.2.min.js" ></script>
    <script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
</head>
<body>
    <div id="main">
        <h1>Login</h1>
        <div id="login">
            <h2>Login Form</h2>
            <form action="" method="post">
                <label>UserName :</label>
                <input id="name" name="username" placeholder="username" type="text">
                <label>Password :</label>
                <input id="password" name="password" placeholder="**********" type="password">
                <input name="submit" type="submit" value=" Login ">
                <span><?php echo $error; ?></span>
            </form>
        </div>
    </div>
</body>
</html>