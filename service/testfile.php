<script src="css/styles.css"></script>

<?php 
include 'includes/book-config.inc.php';

/** 
* Runs all the methods and objects for the browse-single-book.php page.
*/
try{
  $db = new ImprintsGateway($connection);
  $string = "";
  $string2 = "";
  $string3 = "";
  $string4 = "";
  $getisb ="";
  
  // ----- print single book info ----- // 
  if(isset($_GET['id'])){
      $id = $_GET['id'];
      // --- SQL --- //
      $sql = "select BookID, ISBN10, ISBN13, Title, CopyrightYear, TrimSize, PageCountsEditorialEst
      as PageCount, Description, Subcategories.SubcategoryID, SubcategoryName, ImprintID, Imprint, BindingType from Books join Subcategories on 
      (Books.SubcategoryID = Subcategories.SubcategoryID) join Imprints using (ImprintID) join BindingTypes using (BindingTypeID) where ISBN10 = '$id'";
        
      $sql2="select au.AuthorID, FirstName, LastName, ISBN10 from Books bk, BookAuthors ba, Authors au 
        where bk.BookID = ba.BookId AND ba.AuthorId = au.AuthorID AND ISBN10 = '$id'";
        
      $sql3="select un.UniversityID, Name from Universities un, Adoptions ad, AdoptionBooks ab, Books bk
         WHERE bk.BookID = ab.BookID 
         AND ab.AdoptionID = ad.AdoptionID
         AND ad.UniversityID = un.UniversityID
         AND ISBN10= '$id' order by Name";
                      
      $sql4="select ISBN10 from Books where ISBN10 = '$id'";              
      
      // --- Running Queries --- //  
      $result = $db-> runDifferentSelect($sql, "ISBN10", $_GET['id']);
      foreach($result as $row){
        $string .= printDetails($row);
      }
      $result2 = $db-> runDifferentSelect($sql2, "ISBN10", $_GET['id']);
      foreach($result2 as $row){
        $string2 .= printAuthors($row);
      }
      $result3 = $db-> runDifferentSelect($sql3, "ISBN10", $_GET['id']);
      foreach($result3 as $row){
        $string3 .= printUniversities($row);
      }
      $result4 = $db ->runDifferentSelect($sql4, "ISBN10", $_GET['id']);
      foreach($result4 as $row){
      $getisb .= getisbn($row);
        
      }
  }

  
}
catch(PDOException $e) {
    die($e->getMessage());
}

// ----- Functions for printing authors and universities ----- //
function getisbn($rows){
  return $rows['ISBN10'] . ".jpg";
}

/** 
* Prints different types of lists on the main singlebook.php page.
* @return      details, author, ToDo, and universities.
* @param       rows
*/
function printDetails($rows){
  return "<h3>".$rows['Title']."</h3>" . "<img src ='/book-images/small/" . $rows['ISBN10']. ".jpg'id='imgg' onclick='imgEnlarge()'> <br> ISBN10: " . $rows['ISBN10']."<br>ISBN13: " .
  $rows['ISBN13']."<br>Copyright Year: " . $rows['CopyrightYear']."<br><a href ='browse-books.php?Subcategory=" . $rows['SubcategoryName'] .
  "'>SubCategory: " . $rows['SubcategoryName']."</a><br><a href='browse-books.php?Imprint=" . $rows['Imprint'] . "'>Imprint: ". $rows['Imprint'].
  "</a><br>BindingType: ".$rows['BindingType']."<br>Trim Size: ".$rows['TrimSize']."<br>Page Count: ".$rows['PageCount'].
  "<br>Description: ".$rows['Description']."<br><br>";
}

function printAuthors($rows){
  return "<li>" . $rows['FirstName']. " ". $rows['LastName'] . "</li>";
}

function printUniversities($rows){
  return "<li><a href='browse-universities.php?id=" . $rows['UniversityID'] . "'>" .  $rows['Name'] . "</a></li>";
}

?>

<!-- JAVASCRIPT -->

<script type="text/javascript">

function imgEnlarge(){
  var mod = document.getElementById('imgzoom');
  var imgurl = document.getElementById('imgg').getAttribute('src');
  //var close = document.getElementsByClassName("close")[0];
  mod.style.display ="block";
  //document.getElementById('imgid').innerHTML = "<img src ='" + imgurl + "'/>";
  
  
  var isb = "<?php echo $getisb ?>";
  document.getElementById('imgid').innerHTML = "<img src ='/book-images/large/" + isb + "' id='imglrg'/>";
  
}

function closeimg() {
  var mod = document.getElementById('imgzoom');
  mod.style.display ="none";
}

</script>




