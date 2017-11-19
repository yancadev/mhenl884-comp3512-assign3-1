<?php
if (isset($_POST['submit'])){
    echo "has logged";
} else {
header('Location: login-page.php');
}
?>