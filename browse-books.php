<?php 
include "session.php";
require_once('config.php');
try{
    
    $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
    $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $sql = "select BookID, ISBN10, Title, CopyrightYear, SubcategoryID, ImprintID, CoverImage from Books order by Title limit 0, 20";
    $sql1 = "select BookID, ISBN10, ISBN13, Title, CopyrightYear, TrimSize, PageCountsEditorialEst
        as PageCount, Description, STATUS , SubcategoryName, Imprint, BindingType from Books
        join Statuses on ( Books.ProductionStatusID = Statuses.StatusID ) join Subcategories on 
        ( Books.SubcategoryID = Subcategories.SubcategoryID ) join Imprints using ( ImprintID ) join BindingTypes using (BindingTypeID)";
 
    $result=$pdo-> query($sql);
    $string="";
    while($row=$result->fetch()){
        $string .= createList($row);
    }
 
    $result1=$pdo-> query($sql1);
     $string1="";
     while($row=$result1->fetch()){
        $string1 .= createSubcategories($row);
    }
    
    $result2=$pdo-> query($sql1);
     $string2="";
     while($row=$result2->fetch()){
        $string2 .= createImprints($row);
    }
    
    if(isset($_GET["Subcategory"]))
    {
        $sql2 = 'select BookID, ISBN10, ISBN13, Title, CopyrightYear, TrimSize, PageCountsEditorialEst
        as PageCount, Description, STATUS , SubcategoryName, Imprint, BindingType from Books
        join Statuses on ( Books.ProductionStatusID = Statuses.StatusID ) join Subcategories on 
         $result3=$pdo-> query($sql2);
            $string="";
             while($row=$result3->fetch()){
             $string .= createList($row);
        }    
        // if(!createList.Items.Contains(new createList($row)))
        // {
        //     createList.Items.Add($row);
        // }
        
    }
    
    if(isset($_GET["Imprint"]))
    {
        $sql3 = 'select BookID, ISBN10, ISBN13, Title, CopyrightYear, TrimSize, PageCountsEditorialEst
        as PageCount, Description, STATUS , SubcategoryName, Imprint, BindingType from Books
        join Statuses on ( Books.ProductionStatusID = Statuses.StatusID ) join Subcategories on 
        ( Books.SubcategoryID = Subcategories.SubcategoryID ) join Imprints using ( ImprintID ) join BindingTypes using (BindingTypeID) where Imprint="'.$_GET["Imprint"].'" order by Title Limit 0, 20';
         $result4=$pdo-> query($sql3);
            $string="";
             while($row=$result4->fetch()){
             $string .= createList($row);
        }    
    }
    
    if(!isset($_GET['ISBN10'])){
        $isbn = '126182';
    }else{
        $isbn = $_GET['ISBN10'];
    }
    
    /*$sql2='select UniversityID, Name, Address, City, State, Zip, Longitude, Latitude, Website from Universities where UniversityID ='.$id;
    $addressResult = $pdo -> query($sql2);
    $row =$addressResult->fetch();*/


    
}
catch (PDOException $e) {
    die($e->getMessage());
}

function createList($row){
   return  "<li>
         <a href='/single‐book.php?book=".$row['ISBN10']."'> "."<img src ='/book-images/tinysquare/". $row['ISBN10']. ".jpg'>".
         " ". $row['Title']. " ". $row['CopyrightYear']. " ". $row['SubcategoryID']. " ". $row['ImprintID'] . "</a>
         </li>";
}

function createSubcategories($rows)
{
    return '<option value="'.$rows["SubcategoryName"].'">'.$rows["SubcategoryName"].'</option>';
    
}

function createImprints($rows)
{
    return '<option value="'.$rows["Imprint"].'">'.$rows["Imprint"].'</option>';
    
}


$pdo=null;

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