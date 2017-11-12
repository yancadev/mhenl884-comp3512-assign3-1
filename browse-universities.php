<?php
//include "session.php";
//require_once('config.php');
include 'includes/book-config.inc.php';

try{
    $db = new UniversitiesGateway($connection);
    $result = $db-> limitBy(20);
    
    //list universities
    $string = "";
    foreach ($result as $row){
       $string .= createList($row);
    }
    
    //list States
    $db2=new StatesGateway($connection);
    $string1="";
    $result1 = $db2->findAll();
    foreach ($result1 as $row){
        $string1.= createStates($row);
    }
    
    $sql = "select UniversityID, Name, Address, City, State, Zip, Longitude, Latitude, Website from Universities where State='". $_GET['id'] . "' order by Name limit 0,20";
    if(isset($_GET['id'])){
        $result2 = $db-> runDifferentSelect($sql);
        $string="";
        foreach($result2 as $row){
             $string .= createList($row);
        }    
    }
    
    if(!isset($_GET['UniversityID'])){
        $id = '126182';
    }else{
        $id = $_GET['UniversityID'];
    }
    
    /*$sql2='select UniversityID, Name, Address, City, State, Zip, Longitude, Latitude, Website from Universities where UniversityID ='.$id;
    $addressResult = $pdo -> query($sql2);
    $row =$addressResult->fetch();*/


    
}
catch (PDOException $e) {
    die($e->getMessage());
}

function createStates($rows)
{
    return '<option value="'.$rows['StateName'].'">'.$rows['StateName'].'</option>';
    
}

function createList($rows){
   return  "<li><a href='?id=".$rows['UniversityID']."'> ".$rows['Name']."</a></li>";
}


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
                        <form action="browse-universities.php" method="GET">
                         <select name="id"><option value="">Choose a state</option><?php echo $string1 ?></select>
                         <input type="submit">
                         </form>
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
                             /* display requested universities information */
                            $string3 = "";
                            $string3 = $db-> outputDetails($_GET['id']);
                            /*$result3 = $db->findById($_GET["id"]);
                            foreach ($result3 as $row){
                                $string3 = $db-> outputDetails($row);
                            }*/
                           ?>
                           
         
                          </div>
                          <div class="mdl-tabs__panel" id="todo-panel">
                              
                               <?php                       
                                 
                                   
                               ?>                                  
                            
                                <table class="mdl-data-table  mdl-shadow--2dp">
                                  <thead>
                                    <tr>
                                      
                                      
                                    </tr>
                                  </thead>
                                  <tbody>
                                       
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