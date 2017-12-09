
<?php include  'includes/book-config.inc.php';
// this PHP will insert register form into table
session_start(); 
ini_set('display_errors','1');
ini_set('error_reporting',E_ALL);

try {
    
if (isset($_POST['submit'])) {
    
    $db = new LoginGateway($connection);
    $pdo = new PDO(DBCONNECTION, DBUSER, DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //helped with login http://thisinterestsme.com/php-user-registration-form/
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Address = $_POST['Address'];
    $City = $_POST['City'];
    $Region = $_POST['Region'];
    $Country = $_POST['Country'];
    $Postal = $_POST['Postal'];
    $Phone = $_POST['Phone'];
    $Email = $_POST['Email'];
    $pass = $_POST['pass'];
    

    $Salt = md5(microtime());
    
    $Password = md5($pass . $Salt);
    $DateJoined = date("Y-m-d H:i:s");
    $DateLastModified = date("Y-m-d H:i:s");
    
    // CHECKING IF IT EXISTS https://stackoverflow.com/questions/23305300/check-if-username-exists-pdo
    $check = "SELECT UserName AS user FROM UsersLogin WHERE UserName = :Email";
    $chck = $pdo->prepare($check);
    $chck->bindValue(':Email', $Email);
    $chck->execute();
    
    if($chck->rowCount() > 0){

       
        //"error! username already exists!"
        
        echo "error";  
        /*
        '<script>
        
								errorArea.className	=	"visible";
		</script>';
        */
        
   
        
    } else {
        
        $stmt = $pdo->prepare("INSERT INTO UsersLogin(UserName, Password, Salt, DateJoined, DateLastModified) values(:Email, :Password, :Salt, :DateJoined, :DateLastModified)");
        $stmt->execute(array(':Email'=>$Email,
        ':Password'=>$Password,
        ':Salt'=>$Salt,
        ':DateJoined'=>$DateJoined,
        ':DateLastModified'=>$DateLastModified
        ));
    
        echo "prepared";
        echo $DateJoined;
        echo "executed";
        
        //GET USERID 
        $checkid = "SELECT UserID AS id FROM UsersLogin WHERE UserName = :Email";
        $chck1 = $pdo->prepare($checkid);
        $chck1->bindValue(':Email', $Email);
        $chck1->execute();
        $uid = $chck1->fetch();
        print_r($uid);
        echo $uid['id'];
        $userid = $uid['id'];
        
        $stmt2=$pdo->prepare("INSERT INTO Users(UserID, FirstName, LastName, Address, City, Region, Country, Postal, Phone, Email) values(:id, :FirstName, :LastName, :Address, :City, :Region, :Country, :Postal, :Phone, :Email)");
        
        $stmt2->execute(array(
      ':id' => $userid,
      ':FirstName' => $FirstName, 
      ':LastName' => $LastName,
      ':Address' => $Address, 
      ':City' => $City,
      ':Region' => $Region,
      ':Country' => $Country,
      ':Postal' => $Postal,
      ':Phone' => $Phone,
      ':Email' => $Email
      ));
        echo "entered into db";
    }

} else {
    
}
 
} catch (PDOException $e){
    echo $e->getMessage();
}

?>