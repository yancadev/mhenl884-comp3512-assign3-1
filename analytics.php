<?php 
//include 'includes/book-config.inc.php';
//include "session.php";
//include "Service/service-totals.php";
?>

<!DOCTYPE html>
<html lang="en">
  
  <head>
    <title>Analytics</title>
  
   <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.blue_grey-orange.min.css">

    
    
    
   <script src="https://storage.googleapis.com/code.getmdl.io/1.0.2/material.min.js"></script>
   <link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.2/material.blue-orange.min.css">
   <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
   <link rel="stylesheet" type="text/css" href="index-design.css">
    
    <script src="https://code.jquery.com/jquery-1.7.2.min.js" ></script>
    <script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
    <script type="text/javascript" src="js/analytics.js"></script>
    <link rel="stylesheet" href="../css/styles2.css">
    
<body>
  
  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header">
            
    <?php include 'includes/header.inc.php'; ?>
    <?php include 'includes/left-nav.inc.php'; ?>
              
              
    <main class="mdl-layout__content mdl-color--grey-50">
     <section class="page-content">
    
        <div class="mdl-grid">
            
  <!-- 	Analytic country card -->
  <div class="mdl-cell mdl-cell--2-col card-lesson mdl-card  mdl-shadow--2dp">
  <div class="mdl-card__title mdl-color--purple">
    <h2 class="mdl-card__title-text">Top Views</h2>
  </div>
  <div class="mdl-card__supporting-text">
  
       <form action= "analytics.php" method="GET">
         <!--<label for="filter-country"></label>-->
          <select id="country" name="country"><option id="opt" value=" 
          

          ">Choose a country</option></select>
          
           <script>
           
        $(function(){
            
        	var url = "service/service-topCountries.php";
        	console.log("in func");
        	
        	    $.get(url, function(data, status){
        	    
        	    console.log("in get");
	        	//var list = "";
	        	//loop
	        	for (var i=0; i < data.length; i++){
	        	 $('select').append('<option value='+i+'>'+ data[i].CountryName +'</option>');    
	        	}    
	        	//list += data[i].CountryName + "<br>";
	        	
	        	//$("option").html(list);
	        	});
	        	
	        	console.log("done");
	        
        });
           
           
        
            
        </script>
        </form>
        <span id = "result"><span>
       
       
       
    </div>
     
    </div>
    
    
    <?php 
    //VARIABLE DECLARATION
    include 'service/service-totals.php';
    //$total1 = "";
    $string2 = "";
    $string3 = "";
    $string4 = "";
    $string5 = "";
    ?>

    <!--will put into separate horizontal boxes in a bit-->
   <div class="mdl-cell mdl-cell--9-col card-lesson mdl-card  mdl-shadow--2dp">
                <div class="mdl-card__title mdl-color--purple">
                  <h2 class="mdl-card__title-text">Country Statistics</h2>
                </div>
                <div class="mdl-card__supporting-text">
                <ul class="demo-list-item mdl-list" style="height:125px; ">
             
                  
 
             <table class="mdl-data-table  mdl-shadow--2dp">
                                  <thead>
                                    <tr>
                                      <th class="mdl-data-table__cell--non-numeric"><i class="material-icons">people_outline</i> Total Visits in June 
                                         <div class="mdl-card__supporting-text"><?php echo $servtotal1;    ?></div>
                                       </th>   
                                       
                                      <th class="mdl-data-table__cell--non-numeric"><i class="material-icons">public</i> Number of countries
                                      <div class="mdl-card__supporting-text"><?php echo $servtotal2;   ?></div>
                                      </th>
                                      
                                      <th class="mdl-data-table__cell--non-numeric"><i class="material-icons">format_list_numbered</i> Total ToDos
                                      <div class="mdl-card__supporting-text"><?php  echo $servtotal3  ?></div>
                                      </th>
                                      
                                      <th class="mdl-data-table__cell--non-numeric"><i class="material-icons">mail_outline</i> Total Messages
                                      <div class="mdl-card__supporting-text"><?php  echo $servtotal4  ?></div>
                                      </th>
                                    </tr>
                                  </thead>
                                  
                                  
                                  <tbody>
                                   
                                    <?php /*  display TODOs  */ 
                                        echo $string5;
                                    
                                    ?>
                            
                                  </tbody>
                                  </table>

     
                    
                </ul>
                </div>
              </div>  <!-- / mdl-cell + mdl-card --> 
    
  <div class="mdl-cell mdl-cell--11-col card-lesson mdl-card  mdl-shadow--2dp">
                <div class="mdl-card__title mdl-color--orange">
                  <h2 class="mdl-card__title-text">Top 10 Adopted Books</h2>
                </div>
                <div class="mdl-card__supporting-text"> 
                
                 <table class="mdl-data-table  mdl-shadow--2dp">
                                  <thead>
                                    <tr>
                                      <th class="mdl-data-table__cell--non-numeric">Books</th>
                                      <th class="mdl-data-table__cell--non-numeric">Titles</th>
                                      <th class="mdl-data-table__cell--non-numeric">Total Quantity</th>
                                    </tr>
                                  </thead>
                                  
                                  
                                  <tbody>
                                   
                                    <?php /*  display TODOs  */ 
                                        echo $string5;
                                    
                                    ?>
                            
                                  </tbody>
                                  </table>
                                  
                
                
                </div>     
                 <?php  
                    //include 'page-functions/analytic-functions.php';
                    
                 ?>
  </section>
  </main>
  </div>    <!-- / mdl-layout --> 
  </body>


</html> 
