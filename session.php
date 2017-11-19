<?php
// i only get the previous page (which is login) //
session_start();



//$_SESSION['2last_url'] = isset($_SESSION['last_url']) ? $_SESSION['last_url'] : null;
//$_SESSION['last_url'] = $_SERVER['HTTP_REFERER'];
$prev = $_SERVER['REQUEST_URI'];
//$_SESSION['url'] = $_SERVER['REQUEST_URI']; 
//$prev = $_SESSION['url'];
//echo $_SESSION['url'];

if (isset($_POST['submit'])){
    echo "has logged";
    //WHEN I PUT THE REDIRECTION IN HERE I LAUGHED CAUSE BOTH PAGES REDIRECT TO EACH OTHER
    // SESSION.PHP REDIRECTS TO LOGIN AND LOGIN REDIRECTS TO SESSION AHAHAHHAHAAHHAHA
    //i tried LOL trying to logic it out
    ///ohhhhhh gotcha
} else {
//header('Location: login-page.php');
}


?>