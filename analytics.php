<?php 
//include "session.php";

?>

<!DOCTYPE html>
<html lang="en">
  
  <head>
    <title>Analytics</title>
    <meta charset="utf-8">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.blue_grey-orange.min.css">
    <link rel="stylesheet" href="css/styles.css">
    
    <script src="https://code.jquery.com/jquery-1.7.2.min.js" ></script>
    <script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
    
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
    <form action= "browse-employees.php" method="GET">
     <label for="filter-country">Choose a country</label>
          <select name="country"><option value=""> Choose a country </option><?php echo $string4; ?></select>
          <br>
          <br>
           <input type="submit">
    </form>  
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
