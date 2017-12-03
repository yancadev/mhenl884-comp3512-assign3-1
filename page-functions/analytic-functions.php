<?php
include 'includes/book-config.inc.php';
try {
    $db = new AnalyticsGateway($connection);
    //$result = $db-> limitBy(30);

    $string = "";
    $sql = "Select BookVisits.VisitID, Countries.CountryName from BookVisits JOIN Countries on Countries.CountryCode = BookVisits.CountryCode";
    $result = $db->runDifferentSelect($sql);
    foreach ($result as $row){
        $string .= outputCountries($row);
    }
    

   /*   $sql2 = "select  ToDoID, EmployeeID, DateBy, Status, Priority, Description from ....";
    if(isset($_GET['id'])){
        $result2 = $db-> runDifferentSelect($sql2, "EmployeeID", $_GET['id'],20);
        foreach($result2 as $row){
            $string2 .= outputToDo($row);
        }
    }   */ 
}
catch (Exception $e){
        die($e -> getMessage());
}

function outputCountries($rows) {
    return '<option value="'.$rows['CountryName'].'">'.$rows['CountryName'].'</option>';
    
}

function outputAnalytics($rows){
    return "<tr><td class='mdl-data-table__cell--non-numeric'>". $rows['1-10']."</td><td class='mdl-data-table__cell--non-numeric'>".
    $rows['Books']."</td><td class='mdl-data-table__cell--non-numeric'>". $rows['Titles']."</td><td class='mdl-data-table__cell--non-numeric'>".
    $rows['Total Quantity']."</td></tr>";
}




?>