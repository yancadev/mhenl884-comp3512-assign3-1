<?php
//include "session.php";
//require_once('config.php');
include 'includes/book-config.inc.php';

try {
    $db = new EmployeesGateway($connection);
    $result = $db-> limitBy(30);
    
    //list employees
    $string = "";
    foreach ($result as $row){
       $string .= createEmployeeList($row);
    }
    
    //output address DOESNT WORK
    $string1="";
    $string2="";
    $string3="";
    $sql = "SELECT EmployeeID, FirstName, LastName, Address, City, Region, Country, Postal, Email FROM Employees ";
    if (isset($_GET['id'])) {
        $result1 = $db-> runDifferentSelect($sql, "EmployeeID",$_GET['id'], 1);
        foreach($result1 as $row){
            $string1 .= outputAddresses($row);
        }
        
    }
    $sql2 = "select  ToDoID, EmployeeID, DateBy, Status, Priority, Description from EmployeeToDo";
    if(isset($_GET['id'])){
        $result2 = $db-> runDifferentSelect($sql2, "EmployeeID", $_GET['id'],20);
        foreach($result2 as $row){
            $string2 .= outputToDo($row);
        }
    }
    
    /*if(isset($_GET['id'])){        
        $db2 = new MessagesGateway($connection);
        $result3 = $db2->findAll();
        foreach($result3 as $row){
            $string3.=outputMessages($row);
        }
    }*/
}
catch (Exception $e) {
    die( $e->getMessage() );
}

function createEmployeeList($rows){
    return  "<li><a href='?id=".$rows['EmployeeID']."'> ".$rows['FirstName']." ".$rows['LastName'] ."</a></li>";
}

function outputAddresses($rows){
    return "<br><font size='7 pt'>" . $rows['FirstName']." ".$rows['LastName']. "<br></font size><br>".$rows['Address']."<br>".
    $rows['City'] . " ". $rows['Region'] . "<br>".$rows['Country'] . " ". $rows['Postal'] . "<br>".$rows['Email'];
}

function outputToDo($rows){
    return "<tr><td class='mdl-data-table__cell--non-numeric'>". $rows['DateBy']."</td><td class='mdl-data-table__cell--non-numeric'>".
    $rows['Status']."</td><td class='mdl-data-table__cell--non-numeric'>". $rows['Priority']."</td><td class='mdl-data-table__cell--non-numeric'>".
    $rows['Description']."</td></tr>";
}

function outputMessages($rows){
     return "<tr><td class='mdl-data-table__cell--non-numeric'>".$rows['MessageDate']."</td><td class='mdl-data-table__cell--non-numeric'>".$rows['Category']."</td>
     <td class='mdl-data-table__cell--non-numeric'>".$rows['employ.FirstName']."</td><td class='mdl-data-table__cell--non-numeric'>".$rows['Content']."</td></tr>";
}
	
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Browse Employees</title>
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
                              echo $string;
                             
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
                             echo $string1;
                           ?>
                           
                    <button onclick="myFunction()">Filter</button>
                    <div id="filter">
                    -Filter will go in here-
                    </div>

                    <script>
                    function myFunction() {
                        var x = document.getElementById("filter");
                    if (x.style.display === "none") {
                    x.style.display = "block";
                     } else {
                 x.style.display = "none";
              }
            }
                </script>
         
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
                                        echo $string2;
                                    
                                    ?>
                            
                                  </tbody>
                              
                                  
                                  <tbody>
                                   
                                    <?php /*  display messages  */ 
                                        echo $string3;
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