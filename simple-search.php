<?php
function getSearchResult(){
    require_once('config.php');
    $searchValue = $_POST['search'];
    $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql= "select FirstName, LastName from Employees where FirstName like '%$searchValue%' or LastName like '%$searchValue%'";
    $result = $pdo-> query ($sql);

    while($result = $result->fetch()){
        return $row;
    }
}
?>