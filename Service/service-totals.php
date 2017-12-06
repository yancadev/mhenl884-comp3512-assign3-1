<?php

include 'includes/book-config.inc.php';

header('content-type:application/json');
$db = new AnalyticsGateway($connection);
$sql = "Select distinct VisitID, CountryName from BookVisits JOIN Countries on Countries.CountryCode = BookVisits.CountryCode GROUP BY BookVisits.CountryCode";
$countries = $db->runDifferentSelect($sql);
if(!is_null($countries)){
    echo json_encode($countries);
    
}else{
    echo "{'error'}";
}
 
$string2 = "";
    $string3 = "";
    $sql2 = "SELECT COUNT( * ) AS  `visits`, COUNT( DISTINCT  `CountryCode` ) AS  `uniqueCountries` FROM BookVisits WHERE  `DateViewed` >  '06/01/2017' AND  `DateViewed` <  '06/31/2017'";
    $result2 = $db->runDifferentSelect($sql2);
    foreach($result2 as $row){
        $string2 .= $row['visits'];
        $string3 .= $row['uniqueCountries'];
    }
if(!is_null($countries)){
    echo json_encode($countries);
}else{
    echo "{'error'}";
}

?>