<?php 
require_once('config.php');

    
function listItems($sql, $hello) {
   try{
        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //$sql = "select UniversityID, Name, Address, City, State, Zip, Website, Longitude, Latitude from Universities where State = :state order by Name limit 0, 20";
        $statement = $pdo-> prepare($sql);
        if ($hello != ''){
            $statement->bindValue(1, $hello);
        }
        $statement -> execute();
        $return = array();
		    while	($row =	$statement->fetch())	{
			    array_push($return,$row);		      
        }
        return $return;
        $pdo = null;    
    }
    catch (PDOException $e) {
      die( $e->getMessage() );
   }
}

function printDetails(){
  try {
    $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(isset($_GET['book'])){
      $book = $_GET['book'];
    }
    $sql = "select BookID, ISBN10, ISBN13, Title, CopyrightYear, TrimSize, PageCountsEditorialEst
    as PageCount, Description, STATUS , SubcategoryName, Imprint, BindingType from Books
    join Statuses on ( Books.ProductionStatusID = Statuses.StatusID ) join Subcategories on 
    ( Books.SubcategoryID = Subcategories.SubcategoryID ) join Imprints using ( ImprintID ) join BindingTypes using (BindingTypeID) where ISBN10 = '$book'";
    $result = $pdo-> query ($sql);
    while ($row = $result->fetch()) {
      if (isset($_GET['book']) && $_GET['book'] == $row['ISBN10']) echo 'active';
        echo $row['Title'];
        echo "<img src ='/book-images/medium/". $row['ISBN10']. ".jpg'>" . "<br>";
        echo "ISBN10: " . $row['ISBN10']."<br>";
        echo "ISBN13: " . $row['ISBN13']."<br>";
        echo "Copyright Year: " . $row['CopyrightYear']."<br>";
        echo "SubCategory: " . $row['SubcategoryName']."<br>";
        echo "Imprint: ". $row['Imprint']."<br>";
        echo "Production Status: ".$row[STATUS]."<br>";
        echo "BindingType: ".$row['BindingType']."<br>";
        echo "Trim Size: ".$row['TrimSize']."<br>";
        echo "Page Count: ".$row['PageCount']."<br>";
        echo "Description: ".$row['Description']."<br>";
        echo '<br>';
      }
    $pdo = null;
  }
  catch (PDOException $e) {
    die( $e->getMessage() );
  }
}

function listAuthors(){
    try {
        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="select Authors.FirstName as FirstName,
        Authors.LastName as LastName, Authors.Institution as Institution 
        from Books join BookAuthors using (BookID) join Authors using (AuthorID)
        where BookID = '$book'";
        $result = $pdo-> query ($sql);
        while ($row = $result->fetch()) {
          //if (isset($_GET['book']) && $_GET['book'] == $row['BookID']) echo 'active';
            echo '<li>' .  $row['FirstName']. " ". $row['LastName'] . '</li>';
                    
        }
        $pdo = null;
   }
   catch (PDOException $e) {
      die( $e->getMessage() );
   }
}

function listUniversities(){
  try {
        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(isset($_GET['book'])){
          $book = $_GET['book'];
        }
        $sql = "select Universities.Name as Name, Adoptions.ContactID as ContactID, 
        Adoptions.AdoptionDate as AdoptionDate, Contacts.FirstName as FirstName, Contacts.LastName 
        as LastName, Contacts.Email as Email FROM Adoptions join Universities using (UniversityID) 
        join AdoptionBooks using (AdoptionID) join Contacts using (ContactID) where AdoptionBooks.BookID ='$book'";
        $result = $pdo-> query ($sql);
        while ($row = $result->fetch()) {
          if (isset($_GET['book']) && $_GET['book'] == $row['BookID']) echo 'active';
            echo '<li>' .  $row['Name'] . '</li>';
                    
        }
        $pdo = null;
   }
   catch (PDOException $e) {
      die( $e->getMessage() );
   }
}

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Single Book</title>
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
              <div class="mdl-cell mdl-cell--3-col card-lesson mdl-card  mdl-shadow--2dp">
                <div class="mdl-card__title mdl-color--orange">
                  <h2 class="mdl-card__title-text"><?php echo $_GET['book']; ?></h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <ul class="demo-list-item mdl-list">

                         <?php  
                              printDetails();
                         ?>            

                    </ul>
                </div>
              </div>  <!-- / mdl-cell + mdl-card -->
              <!-- mdl-cell + mdl-card -->
              <div class="mdl-cell mdl-cell--4-col card-lesson mdl-card  mdl-shadow--2dp">
                <div class="mdl-card__title mdl-color--orange">
                  <h2 class="mdl-card__title-text">Authors</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <ul class="demo-list-item mdl-list">

                         <?php  
                             /*if(isset($_GET['book'])){
                                $b = $_GET['book'];
                              }
                             $authors = listItems("select Authors.FirstName as FirstName,
                            Authors.LastName as LastName, Authors.Institution as Institution 
                            from Books join BookAuthors using (BookID) join Authors using (AuthorID)
                            where BookID = '$book'", "");
                            $b = $authors[0];
                            foreach ($authors as $a) {
                              echo '<li>' .  $a['FirstName']. " ". $a['LastName'] . '</li>';
                            }*/
                            listAuthors();
                         ?>            

                    </ul>
                </div>
              </div>  <!-- / mdl-cell + mdl-card -->
              <!-- mdl-cell + mdl-card -->
              <div class="mdl-cell mdl-cell--5-col card-lesson mdl-card  mdl-shadow--2dp">
                <div class="mdl-card__title mdl-color--orange">
                  <h2 class="mdl-card__title-text">Universities Adopting</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <ul class="demo-list-item mdl-list">

                         <?php  
                              listUniversities();
                         ?>            

                    </ul>
                </div>
              </div>  <!-- / mdl-cell + mdl-card -->
              
            </div>  <!-- / mdl-grid -->    

        </section>
    </main>    
</div>    <!-- / mdl-layout --> 
  </body>
    
</html>