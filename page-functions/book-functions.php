<?php

include 'includes/book-config.inc.php';
try{
    $db = new BooksGateway($connection);
    $result = $db-> limitBy(20);
    //list books
    $string = "";
    foreach ($result as $row){
       $string .= createList($row);
    }
    
    $db2 = new ImprintsGateway($connection);
    $string1 = "";
    $string2 = "";
    $sql = "select BookID, ISBN10, ISBN13, Title, CopyrightYear, TrimSize, PageCountsEditorialEst
        as PageCount, Description, CoverImage, STATUS , Subcategories.SubcategoryID, SubcategoryName, Imprints.ImprintID, Imprint, BindingType from Books
        join Statuses on (Books.ProductionStatusID = Statuses.StatusID) join Subcategories on 
        (Books.SubcategoryID = Subcategories.SubcategoryID) join Imprints using (ImprintID) join BindingTypes using (BindingTypeID)";
    
    $sql2 = "SELECT DISTINCT SubcategoryName from Subcategories ORDER BY SubcategoryName ASC";
    
    $sql3 = "SELECT DISTINCT Imprint from Imprints ORDER BY Imprint ASC";
    
    $result1 = $db2-> runDifferentSelect($sql2);
    foreach ($result1 as $row) {
        $string1 .= createSubcategories($row);
    }
    $result2= $db2-> runDifferentSelect($sql3);
    foreach ($result2 as $row) {
        $string2 .= createImprints($row);
    }
    
    if(isset($_GET['Subcategory'])){
        $result3 =  $db2->runDifferentSelect($sql, "SubcategoryName",$_GET['Subcategory'], 20);
        $string="";
        foreach($result3 as $row){
            $string .= createList($row);
        }
    }
    
    if(isset($_GET['Imprint'])){
        $result2 =  $db2->runDifferentSelect($sql,"Imprint",$_GET['Imprint'], 20);
        $string="";
        foreach($result2 as $row){
            $string .= createList($row);
        }
    }
    
    
    if(!isset($_GET['ISBN10'])){
        $isbn = '126182';
    }else{
        $isbn = $_GET['ISBN10'];
    }
    
}
catch (PDOException $e) {
    die($e->getMessage());
}

function createList($rows){
   return  "<li><a href='/singlebook.php?id=". $rows["ISBN10"] . "'>" . "<img src ='/book-images/tinysquare/" . $rows["ISBN10"]. ".jpg'>".
         " ". $rows["Title"]. " ". $rows["CopyrightYear"]. " ". $rows["SubcategoryID"]. " ". $rows["ImprintID"] . "</a></li>";
}

function createSubcategories($rows)
{
    return '<option value="'.$rows["SubcategoryName"].'">'.$rows["SubcategoryName"].'</option>';
    
}

function createImprints($rows)
{
    return '<option value="'.$rows["Imprint"].'">'.$rows["Imprint"].'</option>';
    
}

?>