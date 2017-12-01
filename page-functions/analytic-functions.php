<?php
include 'includes/book-config.inc.php';
try {
    $db = new BooksVisitGateway($connection);
    $result = $db-> limitBy(30);
    
    
    // --- list employees --- //

    }
    
    $string1="";
    $string2="";
    // $string3="";
    // $string4='';
    // $string5="";
    
    // --- output employee details --- //
    $sql = "SELECT  FROM BooksVisit ";
    if (isset($_GET['id'])) {
        $result1 = $db-> runDifferentSelect($sql, "VisitID",$_GET['id'], 1);
        foreach($result1 as $row){
            $string1 .= outputCountries($row);
        }
    }
}
catch (Exception $e)
    {
        die($e -> getMessage());
    }


?>