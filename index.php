<?php
 include "session.php";
?>
<!DOCTYPE html>
<html>
<!--Browse	
// Universities,	Browse	Books,	Browse	Employees,	and	About	with	links	to	the	appropriate	pages.	
// It	might	be	nice	to	make	the	cards	include	an	image.	

<!-- <head>
  <script src="https://storage.googleapis.com/code.getmdl.io/1.0.2/material.min.js"></script>
  <link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.2/material.blue-orange.min.css">
  <!-- Material Design icon font -->
 <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head> --> 
<html>


<head>
  <!-- test test -->
  
   <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.blue_grey-orange.min.css">

    
    
    
   <script src="https://storage.googleapis.com/code.getmdl.io/1.0.2/material.min.js"></script>
   <link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.2/material.blue-orange.min.css">
   <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
   <link rel="stylesheet" type="text/css" href="index-design.css">
    
    <script src="https://code.jquery.com/jquery-1.7.2.min.js" ></script>
    <script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
    <link rel="stylesheet" href="../css/styles2.css">

</head>

<body>
  
  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header">
            
    <?php include 'includes/header.inc.php'; ?>
    <?php include 'includes/left-nav.inc.php'; ?>
              
              
    <main class="mdl-layout__content mdl-color--grey-50">
     <section class="page-content">
  <!-- 	Browse Universities Card -->
  <div class="mdl-card mdl-shadow--2dp demo-card-square" >
    <div class="mdl-card__title mdl-card--expand">
     <img src="../images/university.jpg" alt="Browse Universities">
    </div>
    <div class="mdl-card__supporting-text">
    
    </div>
    <div class="mdl-card__actions mdl-card--border">
      <a class="mdl-button mdl-button--accent mdl-js-button mdl-js-ripple-effect" href="/browse-universities.php">
          Browse Universities
        </a>
    </div>
  </div>
  <!-- Browse Books Card -->
  <div class="mdl-card mdl-shadow--2dp demo-card-square">
    <div class="mdl-card__title mdl-card__accent mdl-card--expand">
      <img src="../images/books.jpg" alt="Browse books">
    </div>
    <div class="mdl-card__supporting-text">
     
    </div>
    <div class="mdl-card__actions mdl-card--border">
      <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="/browse-books.php">
          Browse Books
        </a>
    </div>
  </div>
  <!-- Browse Employees card -->
  <div class="mdl-card mdl-shadow--2dp demo-card-square">
    <div class="mdl-card__title mdl-card--expand">
      <img src="../images/employee.jpg" alt="Browse employee"> 
    </div>
    <div class="mdl-card__supporting-text">
         </div>
    <div class="mdl-card__actions mdl-card--border">
      <a class="mdl-button mdl-button--accent mdl-js-button mdl-js-ripple-effect" href="/browse-employees.php">
         Browse Employees 
        </a>
    </div>
  </div>
  <!-- About Card -->
  <div class="mdl-card mdl-shadow--2dp demo-card-square">
    <div class="mdl-card__title mdl-card--expand">
       <img src="../images/about.JPG" alt="About">
    </div>
    <div class="mdl-card__supporting-text">
     
    </div>
    <div class="mdl-card__actions mdl-card--border">
      <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="/aboutus.php">
          About 
        </a>
        
    </div>
    </div>
  </section>
  </main>
  </div>    <!-- / mdl-layout --> 
  </body>
  <!-- Square card 
  <div class="mdl-card mdl-shadow--2dp demo-card-square">
    <div class="mdl-card__title mdl-card--expand">
      <h2 class="mdl-card__title-text">Card 5</h2>
    </div>
    <div class="mdl-card__supporting-text">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenan convallis.
    </div>
    <div class="mdl-card__actions mdl-card--border">
      <a class="mdl-button mdl-button--accent mdl-js-button mdl-js-ripple-effect">
          Action
        </a>
    </div>
  </div>
  <!-- Square card 
  <div class="mdl-card mdl-shadow--2dp demo-card-square">
    <div class="mdl-card__title mdl-card--expand">
      <h2 class="mdl-card__title-text">Card 6</h2>
    </div>
    <div class="mdl-card__supporting-text">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenan convallis.
    </div>
    <div class="mdl-card__actions mdl-card--border">
      <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
          Action
        </a>
    </div>
  </div>
</body>-->

</html> 
