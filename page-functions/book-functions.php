<?php
include 'includes/book-config.inc.php';

/** 
* Runs all the methods and objects for the browse-book.php page.
*/
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
    $sql = "SELECT BookID, ISBN10, ISBN13, Title, CopyrightYear, TrimSize, PageCountsEditorialEst
        as PageCount, Description, CoverImage, Status, Subcategories.SubcategoryID, SubcategoryName, Imprints.ImprintID, Imprint, BindingType FROM Books
        JOIN Statuses ON (Books.ProductionStatusID = Statuses.StatusID) JOIN Subcategories ON 
        (Books.SubcategoryID = Subcategories.SubcategoryID) JOIN Imprints USING (ImprintID) JOIN BindingTypes USING (BindingTypeID)";
    
    $sql2 = "SELECT DISTINCT SubcategoryName FROM Subcategories ORDER BY SubcategoryName ASC";
    
    $sql3 = "SELECT DISTINCT Imprint FROM Imprints ORDER BY Imprint ASC";
    
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

/** 
* Creates list of books on the main book page.
* @return      book list
* @param       rows
*/
function createList($rows){
   return  "<li><a href='/singlebook.php?id=". $rows["ISBN10"] . "'>" . "<img src ='/book-images/tinysquare/" . $rows["ISBN10"]. ".jpg'>".
         " ". $rows["Title"]. " ". $rows["CopyrightYear"]. " ". $rows["SubcategoryID"]. " ". $rows["ImprintID"] . "</a></li>";
}

/** 
* Creates list of Subcategories on the main book page.
* @return      subcategories
* @param       rows
*/
function createSubcategories($rows)
{
    return '<option value="'.$rows["SubcategoryName"].'">'.$rows["SubcategoryName"].'</option>';
    
}

/** 
* Creates list of Subcategories on the main book page.
* @return      imprints
* @param       rows
*/
function createImprints($rows)
{
    return '<option value="'.$rows["Imprint"].'">'.$rows["Imprint"].'</option>';
    
}

?>