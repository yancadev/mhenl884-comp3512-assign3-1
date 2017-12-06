<?php
include 'includes/book-config.inc.php';

header('Content-Type: application/json charset=utf-8');
 $string = "";
    $sql = "Select distinct VisitID, CountryName from BookVisits JOIN Countries on Countries.CountryCode = BookVisits.CountryCode group by  BookVisits.CountryCode";
    // $sql = "Select distinct  VisitID, CountryName from BookVisits INNER JOIN Countries on Countries.CountryCode = BookVisits.CountryCode";
    $result = $db->runDifferentSelect($sql);
    var_dump($result);
    foreach ($result as $row){
        $string .= outputCountries($row);
    }

echo json_encode($result, JSON_FORCE_OBJECT);


?>