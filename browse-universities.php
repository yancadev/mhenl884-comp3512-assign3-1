<?php
include "session.php";
require_once('config.php');
try{
    
    $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
    $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $sql = "select UniversityID, Name, Address, City, State, Zip, Longitude, Latitude, Website from Universities order by Name Limit 19";
    $sql1 = "select DISTINCT(State) from Universities order by State";
    
 
    $result=$pdo-> query($sql);
    $string="";
    while($row=$result->fetch()){
        $string .= createList($row);
    }
 
    $result1=$pdo-> query($sql1);
     $string1="";
     while($row=$result1->fetch()){
        $string1 .= createStates($row);
    }
    
    if(isset($_GET["State"]))
    {
        $sql2 = 'select UniversityID, Name, Address, City, State, Zip, Longitude, Latitude, Website from Universities where State="'.$_GET["State"].'" order by Name Limit 19';
         $result3=$pdo-> query($sql2);
            $string="";
             while($row=$result3->fetch()){
             $string .= createList($row);
        }    
    }
    
    if(!isset($_GET['UniversityID'])){
        $id = '126182';
    }else{
        $id = $_GET['UniversityID'];
    }
    
     $sql2='select UniversityID, Name, Address, City, State, Zip, Longitude, Latitude, Website from Universities where UniversityID ='.$id;
    $addressResult = $pdo -> query($sql2);
  $row =$addressResult->fetch();

//   if(isset($_GET['EmployeeID'] )){
//      $sql3='select DateBy, Status, Priority, Description from EmployeeToDo where EmployeeID ='.$_GET["EmployeeID"] . ' order by DateBy';
//     $toDoResult = $pdo -> query($sql3);
//  //$row2 = $toDoResult->fetch();
//   }
    
}
catch (PDOException $e) {
    die($e->getMessage());
}

function createStates($rows)
{
    return '<option value="'.$rows["State"].'">'.$rows["State"].'</option>';
    
}


function createList($row){
   return  "<li>
         <a href='?UniversityID=".$row['UniversityID']."'> ".$row['Name']."</a>
         </li>";
}

$pdo=null;


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Browse Universities</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.blue_grey-orange.min.css">

    <link rel="stylesheet" href="../css/styles.css">
    
    
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
                  <h2 class="mdl-card__title-text">Universities</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <ul class="demo-list-item mdl-list">

                         <?php  
                           /* programmatically loop though employees and display each
                              name as <li> element. */
                              
                              echo $string; 
                         ?>  
                         <form action="browse-universities.php" method="GET">
                         <select name="State"><option value="">Choose a state</option><?php echo $string1 ?></select>
                         <input type="submit">
                         </form>

                    </ul>
                </div>
              </div>  <!-- / mdl-cell + mdl-card -->
              
              <!-- mdl-cell + mdl-card -->
              <div class="mdl-cell mdl-cell--9-col card-lesson mdl-card  mdl-shadow--2dp">

                    <div class="mdl-card__title mdl-color--deep-purple mdl-color-text--white">
                      <h2 class="mdl-card__title-text">University Details</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
                          <div class="mdl-tabs__tab-bar">
                              <a href="#address-panel" class="mdl-tabs__tab is-active">University Details</a>
                              <a href="#todo-panel" class="mdl-tabs__tab">About the University</a>
                          </div>
                        
                          <div class="mdl-tabs__panel is-active" id="address-panel">
                              
                           <?php   
                             /* display requested employee's information */
                             
                             echo '<h2>'. $row["Name"].'</h2>';
                             echo '<p><br>' .$row["Address"];
                             echo '<br>'.$row["City"].", ".$row["State"]."  ".$row["Zip"];
                             echo '<br> Longitude: '.$row["Longitude"]." || Latitude: ".$row["Latitude"];
                             echo '<br>'.$row["Website"]."</p>"; 
                             
                           ?>
                           
         
                          </div>
                          <div class="mdl-tabs__panel" id="todo-panel">
                              
                               <?php                       
                                 /* retrieve for selected employee;
                                    if none, display message to that effect */
                                   
                               ?>                                  
                            
                                <table class="mdl-data-table  mdl-shadow--2dp">
                                  <thead>
                                    <tr>
                                      
                                      
                                    </tr>
                                  </thead>
                                  <tbody>
                                       <?php
                                       if(isset($_GET['EmployeeID']) ){
                                       foreach($toDoResult as $row2){
                                       echo '<tr><td class="mdl-data-table__cell--non-numeric">'.$row2["DateBy"].' </td>';
                                      echo '<td class="mdl-data-table__cell--non-numeric">'. $row2["Status"].'</td>';
                                      echo '<td class="mdl-data-table__cell--non-numeric">' . $row2["Priority"]; '</td>';
                                      echo '<td class="mdl-data-table__cell--non-numeric">'. $row2["Description"]; '</td></tr>';
                                      }
                                       }
                                        ?>
                                  </tbody>
                                </table>
                           
         
                          </div>
                           <div class="mdl-tabs__panel" id="messages">
                              
                               <?php                       
                                 /* retrieve for selected employee;
                                    if none, display message to that effect */
                                   
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
                                       <?php
                                       if(isset($_GET['EmployeeID']) ){
                                       foreach($toDoResult1 as $row2){
                                       echo '<tr><td class="mdl-data-table__cell--non-numeric">'.$row2["a.MessageDate"].' </td>';
                                      echo '<td class="mdl-data-table__cell--non-numeric">'. $row2["Status"].'</td>';
                                      echo '<td class="mdl-data-table__cell--non-numeric">' . $row2["Priority"]; '</td>';
                                      echo '<td class="mdl-data-table__cell--non-numeric">'. $row2["Description"]; '</td></tr>';
                                      }
                                       }
                                        ?>
                                  </tbody>
                                </table>
                           
         
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