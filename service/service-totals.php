<?php
//include  'includes/book-config.inc.php';

try {
    $db = new AnalyticsGateway($connection);
    $pdo = new PDO(DBCONNECTION, DBUSER, DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "SELECT COUNT( * ) AS  `visits`, COUNT( DISTINCT  `CountryCode` ) AS  `uniqueCountries` FROM BookVisits WHERE  `DateViewed` >  '06/01/2017' AND  `DateViewed` <  '06/31/2017'";
    
        $tot = $pdo->prepare($sql);
        $tot->execute();
        $total = $tot->fetch(PDO::FETCH_ASSOC);
        //echo $total['visits'];
        echo json_encode($total);
    
    
} catch (PDOException $e) {
    die($e->getMessage());
}

?>