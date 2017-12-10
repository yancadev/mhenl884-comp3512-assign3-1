<?php
include  'includes/book-config.inc.php';
//require __DIR__ . "/AnalyticsGateway.class.php";
include "lib/AnalyticsGateway.class.php";
//include "lib/Test.php";
try {
    //echo "hello";
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

    $sql3 = "SELECT COUNT( * ) AS  `messagescount` FROM EmployeeMessages WHERE  `MessageDate` >  '2017-06-01*' AND  `MessageDate` <  '2017-06-31*'";
        $tot3 = $pdo->prepare($sql3);
        $tot3->execute();
        $total3 = $tot3->fetch(PDO::FETCH_ASSOC);
        $servtotal3 = json_encode($total3);
        
    $sql4 = "select distinct COUNT(a.AdoptionID), ab.BookID, Quantity, ISBN10, Title, CoverImage From AdoptionBooks AS ab JOIN Books AS b ON (ab.BookID= b.BookID) JOIN Adoptions AS a ON (a.AdoptionID=ab.AdoptionID) GROUP BY a.AdoptionID ORDER BY COUNT(a.AdoptionID) DESC LIMIT 10";
        $tot4 = $pdo->prepare($sql4);
        $tot4->execute();
        $total4 = $tot4->fetch(PDO::FETCH_ASSOC);
        $servtotal4 = json_encode($total4);
    
} catch (PDOException $e) {
    die($e->getMessage());
}

?>