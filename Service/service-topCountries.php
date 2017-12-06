<?php

include 'includes/book-config.inc.php';
header('content-type:application/json');
$db = new AnalyticsGateway($connection);
//$arr = json_ecode($string, true);
$sql = "Select distinct VisitID, CountryName, CountryCode from BookVisits JOIN Countries on Countries.CountryCode = BookVisits.CountryCode group by  BookVisits.CountryCode LIMIT 15";
//$db = "Select distinct VisitID, CountryName from BookVisits JOIN Countries on Countries.CountryCode = BookVisits.CountryCode group by  BookVisits.CountryCode";
$countries = $db->runDifferentSelect($sql);
if(!is_null($countries)){
    echo json_encode($countries);
     //print_r($arr);        
    //echo $arr[0]["CountryName"];
    
    //$obj = json_encode($string);
  //print_r($obj);      // Dump all data of the Object
  //echo $obj[0]->CountryName;
}else{
    echo "{'error'}";
}

?>