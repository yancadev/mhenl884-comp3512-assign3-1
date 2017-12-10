<?php
include  'includes/book-config.inc.php';
//require __DIR__ . "/AnalyticsGateway.class.php";
include "lib/AnalyticsGateway.class.php";
//include "lib/Test.php";
try {
    echo "hello";
    $db = new AnalyticsGateway($connection);
    $pdo = new PDO(DBCONNECTION, DBUSER, DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "SELECT COUNT( * ) AS  `visits`, COUNT( DISTINCT  `CountryCode` ) AS  `uniqueCountries` FROM BookVisits WHERE  `DateViewed` >  '06/01/2017' AND  `DateViewed` <  '06/31/2017'";
        $tot = $pdo->prepare($sql);
        $tot->execute();
        $total = $tot->fetch(PDO::FETCH_ASSOC);
        $servtotal1 = json_encode($total);
        
    $sql2 = "SELECT COUNT( * ) AS  `todocount` FROM EmployeeToDo WHERE  `DateBy` >  '2017-06-01*' AND  `DateBy` <  '2017-06-31*'";
        $tot2 = $pdo->prepare($sql2);
        $tot2->execute();
        $total2 = $tot2->fetch(PDO::FETCH_ASSOC);
        $servtotal2 = json_encode($total2);

    
} catch (PDOException $e) {
    die($e->getMessage());
}

?>