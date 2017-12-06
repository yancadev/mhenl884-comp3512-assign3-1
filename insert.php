
<?php include  'includes/book-config.inc.php';
// this PHP will insert register form into table
session_start(); 

try {
    echo "submitted";
    
if (isset($_POST['submit'])) {
    echo "inside insert";


echo "passed";

    $pdo = new PDO(DBCONNECTION, DBUSER, DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "getting there";
    
    $FirstName = $_POST['FirstName'];
$LastName = $_POST['LastName'];
$Address = $_POST['Address'];
$City = $_POST['City'];
$Region = $_POST['Region'];
$Country = $_POST['Country'];
$Postal = $_POST['Postal'];
$Phone = $_POST['Phone'];
$Email = $_POST['Email'];
    
  $statement=$pdo->prepare("INSERT INTO Users (NULL, FirstName, LastName, Address, City, Region, Country, Postal, Phone, Email, NULL) values (NULL, :FirstName, :LastName, :Address, :City, :Region, :Country, :Postal, :Phone, :Email, NULL)");
  echo "prepared";
  echo "hey";
  $statement->execute(array(NULL, ':FirstName'=>$FirstName, ':LastName'=> $LastName, ':Address'=> $Address,':City'=> $City,':Region'=> $Region,':Country'=> $Country,':Postal'=> $Postal,':Phone'=> $Phone,':Email'=> $Email, NULL));
  

  echo "recorded";
  
} else {
    echo "hi";
}
 
} catch (PDOException $e){
    echo "error";
}

?>