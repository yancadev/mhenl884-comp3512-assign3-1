<?php

//include  'includes/book-config.inc.php';

try {
$db = new AnalyticsGateway($connection);

$pdo = new PDO(DBCONNECTION, DBUSER, DBPASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

echo "connected";

header('content-type:application/json');

//$result = $db->runDifferentSelect($db);
//$string = "";
//    foreach ($result as $row){
//       $string .= createList($row);
//}


$serv="";
//$arr = json_ecode($string, true);
$sql = "Select distinct VisitID, CountryName, bv.CountryCode from BookVisits AS bv JOIN Countries on Countries.CountryCode = bv.CountryCode group by  bv.CountryCode LIMIT 15";

$countries = $db->runDifferentSelect($sql);
echo "countries";
print_r("hello");
foreach ($countries as $row) {
        $serv .= displayArr($row);
    }
    
    echo "test";
    

    echo json_encode($serv);
    print_r($countries);

} catch (PDOException $e) {
    die($e->getMessage());
}

function displayArr($rows){
    return $rows["CountryName"]; 
}

?>