<?php
include "session.php";
require_once('config.php');


function outputFullNames() {
   try {
            // $db = new EmployeesGateway($connection );
            //$result = $db ->getAll();
            $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "select FirstName, LastName, EmployeeID from Employees order by LastName limit 0, 30";
            $result = $pdo-> query ($sql);
    while ($row = $result->fetch()) {
             echo '<a href="' . $SERVER["SCRIPT_NAME"] . '?emp=' . $row['EmployeeID'] . '" class="';
        if (isset($_GET['emp']) && $_GET['emp'] == $row['EmployeeID']) echo 'acitve';
            echo 'item">';
            echo $row['FirstName']." ".$row['LastName'] . '</a>';
            echo '<br>';
            echo '<br>';
         }
         $pdo = null;
   }
   catch (PDOException $e) {
      die( $e->getMessage() );
   }
}
function outputAddresses() {
  try {
      if (isset($_GET['emp']) && $_GET['emp'] > 0) {   
         $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql= 'select FirstName, LastName ,EmployeeID, Address, City, Region, Country, Postal, Email from Employees where EmployeeId=:emp';
        $employ = $_GET['emp'];
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':emp', $employ);
        $statement->execute();
       
			while	($row = $statement->fetch())	{
                outputSingleAddress($row); 
         }
         $pdo = null;
      }
  }
  catch (PDOException $e) {
      die( $e->getMessage() );
  }
}

function outputSingleAddress($row) {
echo '<br>';
echo "<font size='7 pt'>" . $row['FirstName']." ".$row['LastName']. "</font size>";
echo '<br>';
echo '<br>';
echo $row['Address']; 
echo '<br>';
echo $row['City'] . " ";
echo $row['Region'] . '<br>';
echo $row['Country'] . " ";
echo $row['Postal'] . '<br>';
echo $row['Email'];
 }




function outputEmployeeToDo() {
  			try	{
				if (isset($_GET['emp']) && $_GET['emp'] > 0) {   
             $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
             $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             
             
             $sql = 'select  DateBy, Status, Priority, Description from EmployeeToDo where EmployeeID=:emp order by DateBy ';
             $employ = $_GET['emp'];
             $statement= $pdo-> prepare($sql);
             $statement-> bindValue(':emp', $employ);
             $statement-> execute();
			        
			        while	($row = $statement->fetch())	{
                        outputEmployeeInfo($row); 	
                
			                }
			    $pdo = null;
			}
		}
			catch	(PDOException	$e)	{
						die($e->getMessage());
			}
			
			
}

function outputEmployeeInfo($row) {

 echo '<tr>';
 echo '<td class="mdl-data-table__cell--non-numeric">';
 echo $row['DateBy'];
 echo '</td>';
  

  echo '<td class="mdl-data-table__cell--non-numeric">';
  echo $row['Status'];
  echo '</td>';
 

 echo '<td class="mdl-data-table__cell--non-numeric">';
 echo $row['Priority'];
 echo '</td>';

 echo '<td class="mdl-data-table__cell--non-numeric">';
 echo $row['Description'];
 echo '</td>';
  
echo '</tr>';
}
 
 
function generateMessages() {
  			try	{
				if (isset($_GET['emp']) && $_GET['emp'] > 0) {   
             $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
             $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             
             
             $sql = 'select  employ.EmployeeID, message.EmployeeID, message.MessageDate, message.Category, message.Content, message.ContactID, contact.ContactID from Employees employ, EmployeeMessages message, Contacts contact where employ.EmployeeID = message.EmployeeID and message.ContactID=contact.ContactID and employ.EmployeeID=:emp';
             $employ = $_GET['emp'];
             $statement= $pdo-> prepare($sql);
             $statement-> bindValue(':emp', $employ);
             $statement-> execute();
			        
			        while	($row = $statement->fetch())	{
                        message($row); 	
                
			                }
			    $pdo = null;
			}
		}
			catch	(PDOException	$e)	{
						die($e->getMessage());
			}
			
			
}

function message($row) {

 echo '<tr>';
 echo '<td class="mdl-data-table__cell--non-numeric">';
 echo $row['MessageDate'];
 echo '</td>';
  

 echo '<td class="mdl-data-table__cell--non-numeric">';
 echo $row['Category'];
 echo '</td>';
 

 echo '<td class="mdl-data-table__cell--non-numeric">';
 echo $row['employ.FirstName'];
//echo $row['LastName'];
 echo '</td>';

 echo '<td class="mdl-data-table__cell--non-numeric">';
 echo $row['Content'];
 echo '</td>';
  
echo '</tr>';
}  	    
	
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Assignment 1</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.blue_grey-orange.min.css">

    <link rel="stylesheet" href="css/styles.css">
    
    
    <script   src="https://code.jquery.com/jquery-1.7.2.min.js" ></script>
       
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
                  <h2 class="mdl-card__title-text">Employees</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <ul class="demo-list-item mdl-list">

                         <?php  
                           /* programmatically loop though employees and display each
                              name as <li> element. */
                              outputFullNames();
                         ?>            

                    </ul>
                </div>
              </div>  <!-- / mdl-cell + mdl-card -->
              
              <!-- mdl-cell + mdl-card -->
              <div class="mdl-cell mdl-cell--9-col card-lesson mdl-card  mdl-shadow--2dp">

                    <div class="mdl-card__title mdl-color--deep-purple mdl-color-text--white">
                      <h2 class="mdl-card__title-text">Employee Details</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
                          <div class="mdl-tabs__tab-bar">
                              <a href="#address-panel" class="mdl-tabs__tab is-active">Address</a>
                              <a href="#todo-panel" class="mdl-tabs__tab">To Do</a>
                              <a href="#messages-panel" class="mdl-tabs__tab">Messages</a>
                          </div>
                        
                          <div class="mdl-tabs__panel is-active" id="address-panel">
                              
                           <?php   
                             /* display requested employee's information */
                             outputAddresses();
                           ?>
                           
         
                          </div>
                          <div class="mdl-tabs__panel" id="todo-panel">
                              
                               <?php                       
                                 /* retrieve for selected employee;
                                    if none, display message to that effect */
                                    //outputEmployeeToDo();
                                    
                               ?>                                  
                            
                                <table class="mdl-data-table  mdl-shadow--2dp">
                                  <thead>
                                    <tr>
                                      <th class="mdl-data-table__cell--non-numeric">Date</th>
                                      <th class="mdl-data-table__cell--non-numeric">Status</th>
                                      <th class="mdl-data-table__cell--non-numeric">Priority</th>
                                      <th class="mdl-data-table__cell--non-numeric">Content</th>
                                    </tr>
                                  </thead>
                                  
                                  
                                  <tbody>
                                   
                                    <?php /*  display TODOs  */ 
                                        outputEmployeeToDo();
                                    
                                    ?>
                            
                                  </tbody>
                              
                                  
                                </table>
                                
                               </div >
                                 <div class="mdl-tabs__panel" id="messages-panel">
                                <table class="mdl-data-table  mdl-shadow--2dp">
                                     <thead>
                                    <tr>
                                      <th class="mdl-data-table__cell--non-numeric">Date</th>
                                      <th class="mdl-data-table__cell--non-numeric">Category</th>
                                      <th class="mdl-data-table__cell--non-numeric">From</th>
                                      <th class="mdl-data-table__cell--non-numeric">Messages</th>
                                    </tr>
                                  </thead>
                                  
                                  
                                  <tbody>
                                   
                                    <?php /*  display TODOs  */ 
                                        //outputEmployeeToDo();
                                         generateMessages();
                                    
                                    ?>
                            
                                  </tbody>
                                    
                                </table>
                               </div>
         
                          </div>
                        </div>                         
                    </div>    
  
                 
              </div>  <!-- / mdl-cell + mdl-card -->   
            </div>  <!-- / mdl-grid -->    

        </section>
    </main>    
</div>    <!-- / mdl-layout --> 
          
</body>
</html>