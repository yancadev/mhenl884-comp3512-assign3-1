<?php 
include 'includes/book-config.inc.php';

try{
  $db = new ImprintsGateway($connection);
  $string = "";
  $string2 = "";
  $string3 = "";
  
  if(isset($_GET['id'])){
      $id = $_GET['id'];
      $sql = "select BookID, ISBN10, ISBN13, Title, CopyrightYear, TrimSize, PageCountsEditorialEst
      as PageCount, Description, STATUS , SubcategoryName, Imprint, BindingType from Books
      join Statuses on (Books.ProductionStatusID = Statuses.StatusID) join Subcategories on 
      (Books.SubcategoryID = Subcategories.SubcategoryID) join Imprints using (ImprintID) join BindingTypes using (BindingTypeID) where ISBN10 = '$id'";
      
      $sql2 = "select Authors.FirstName as FirstName,
        Authors.LastName as LastName, Authors.Institution as Institution 
        from Books join BookAuthors using (BookID) join Authors using (AuthorID)
        where BookID = '$id'"; 
        
      $sql3 = "select Universities.Name as Name, Adoptions.ContactID as ContactID, 
        Adoptions.AdoptionDate as AdoptionDate, Contacts.FirstName as FirstName, Contacts.LastName 
        as LastName, Contacts.Email as Email FROM Adoptions join Universities using (UniversityID) 
        join AdoptionBooks using (AdoptionID) join Contacts using (ContactID) where AdoptionBooks.BookID ='$id'";
    
      $result = $db-> runDifferentSelect($sql, "ISBN10", $_GET['id']);
      foreach($result as $row){
        $string .= printDetails($row);
      }
      $result2 = $db-> runDifferentSelect($sql2);
      foreach($result2 as $row){
        $string2 .= printAuthors($row);
      }
      $result3 = $db-> runDifferentSelect($sql3);
      foreach($result2 as $row){
        $string3 .= printUniversities($row);
      }
  }

  
}
catch(PDOException $e) {
    die($e->getMessage());
}

function printDetails($rows){
  return "<h3>".$rows['Title']."</h3><img src ='/book-images/medium/". $rows['ISBN10']. ".jpg'><br>ISBN10: " . $rows['ISBN10']."<br>ISBN13: " .
  $rows['ISBN13']."<br>Copyright Year: " . $rows['CopyrightYear']."<br>SubCategory: " . $rows['SubcategoryName']."<br>Imprint: ". $rows['Imprint'].
  "<br>Production Status: ".$rows[STATUS]."<br>BindingType: ".$rows['BindingType']."<br>Trim Size: ".$rows['TrimSize']."<br>Page Count: ".$rows['PageCount'].
  "<br>Description: ".$rows['Description']."<br><br>";
}

function printAuthors($rows){
  return "<li>" . $rows['FirstName']. " ". $rows['LastName'] . "</li>";
}

function printUniversities($rows){
  return "<li>" .  $rows['Name'] . "</li>";
}
/*function listItems($sql, $hello) {
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
            //echo /*'<li>' . $row['FirstName']. " ". $row['LastName'] /*. '</li>'*/;
                    
        /*}
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

//$uniClassObject = new UniversitiesDB($connection);
//$uniHelperClassObject = new UniHelper($connection,$uniClassObject);
include 'DataAccessLayer/PDOGenerator.php';
include 'AssistantFunctions/UniHelper.php';

$connection= new DBhelper();
*/
?>