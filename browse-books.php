<?php 
//include "session.php";
//require_once('config.php');
include 'includes/book-config.inc.php';
try{
    $db = new BooksGateway($connection);
    $result = $db-> limitBy(20);
    //list books
    $string = "";
    foreach ($result as $row){
       $string .= createList($row);
    }
    
    //$db2= new ImprintsGateway($conection);
    $db2 = new ImprintsGateway($connection);
    $string1 = "";
    $string2 = "";
    $sql = "select BookID, ISBN10, ISBN13, Title, CopyrightYear, TrimSize, PageCountsEditorialEst
        as PageCount, Description, CoverImage, STATUS , Subcategories.SubcategoryID, SubcategoryName, Imprints.ImprintID, Imprint, BindingType from Books
        join Statuses on (Books.ProductionStatusID = Statuses.StatusID) join Subcategories on 
        (Books.SubcategoryID = Subcategories.SubcategoryID) join Imprints using (ImprintID) join BindingTypes using (BindingTypeID)";
    $result1 = $db2-> findAll();
    foreach ($result1 as $row) {
        $string1 .= createSubcategories($row);
        $string2 .= createImprints($row);
    }
    
    //FILTERS DONT WORK YET
    if(isset($_GET['Subcategory'])){
        $result2 =  $db2->runDifferentSelect($sql, "SubcategoryName",$_GET['Subcategory'], 20);
        $string="";
        foreach($result2 as $row){
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
   return  "<li><a href='/single‐book.php?id=". $rows["ISBN10"] . "'>" . "<img src ='/book-images/tinysquare/" . $rows["ISBN10"]. ".jpg'>".
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

<!DOCTYPE html>
<html>
  <head>
    <title>Browse Books</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.blue_grey-orange.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://code.jquery.com/jquery-1.7.2.min.js" ></script>
    <script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
  </head>
  <body>
      <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header">
              <?php include 'includes/header.inc.php'; ?>
              <?php include 'includes/left-nav.inc.php'; ?>
   
    
    <main class="mdl-layout__content mdl-color--grey-50">
        <section class="page-content">

            <div class="mdl-grid">

              <!-- mdl-cell + mdl-card -->
              <div class="mdl-cell mdl-cell--3-col card-lesson mdl-card  mdl-shadow--2dp" style="width:auto;">
                <div class="mdl-card__title mdl-color--orange">
                  <h2 class="mdl-card__title-text">Books</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <ul class="demo-list-item mdl-list">

                         <?php  
                              echo $string; 
                              //outputBooks();
                         ?>            
                
                    </ul>
                </div>
              </div>  <!-- / mdl-cell + mdl-card -->
              <div class="mdl-cell mdl-cell--9-col card-lesson mdl-card  mdl-shadow--2dp"style="width:300px;">

                    <div class="mdl-card__title mdl-color--deep-purple mdl-color-text--white">
                      <h2 class="mdl-card__title-text">Filter by Subcategory</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
                          <form action="browse-books.php" method="GET">
                         <select name="Subcategory"><option value="">All Subcategories</option><?php echo $string1 ?></select>
                         <input type="submit">
                         </form>
                          
                        </div>                         
                    </div>    
              </div>  <!-- / mdl-cell + mdl-card -->   
              <div class="mdl-cell mdl-cell--9-col card-lesson mdl-card  mdl-shadow--2dp"style="width:300px;">

                    <div class="mdl-card__title mdl-color--deep-purple mdl-color-text--white">
                      <h2 class="mdl-card__title-text">Filter by Imprint</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
                          <form action="browse-books.php" method="GET">
                         <select name="Imprint"><option value="">All Imprints</option><?php echo $string2 ?></select>
                         <input type="submit">
                         </form>
                          
                        </div>                         
                    </div>    
              </div>  <!-- / mdl-cell + mdl-card -->   
            </div>  <!-- / mdl-grid -->    

        </section>
    </main>    
</div>    <!-- / mdl-layout --> 
  </body>
    
</html>