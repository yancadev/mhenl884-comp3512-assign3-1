<link rel="stylesheet" href="css/styles.css">
<script type="text/javascript" src="js/comp3512-assign2.js"></script>
 <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
     <h1 class="mdl-layout-title"><span>CRM</span> Admin</h1>
 

     
      <div class="mdl-layout-spacer"></div>
      
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
                  mdl-textfield--floating-label mdl-textfield--align-right">
                  
    <label id="tt1" class="material-icons mdl-badge mdl-badge--overlap"><a href="logout.php">power_settings_new</a></label>  
    <div class="mdl-tooltip" for="tt1">Logout</div> 

    <label id="tt2" class="material-icons mdl-badge mdl-badge--overlap" data-badge="5">account_box</label>  
    <div class="mdl-tooltip" for="tt2">Messages</div>                     
                 
    <label id="tt3" class="material-icons mdl-badge mdl-badge--overlap" data-badge="4">notifications</label> 
    <div class="mdl-tooltip" for="tt3">Notifications</div>           
    
    
    
    <button onclick="searchbar()" id="searchbutt" style="absolute">
    <label id="tt3" class="material-icons mdl-badge mdl-badge--overlap" >search</label> </button>
    <div class="mdl-tooltip" for="tt3">Search</div>       
    
    </div>
                
<!-- SEARCH BAR -->
<!-- trying to make the javascript hide/unhide underneath -->

    
        <div class="mdl-textfield__expandable-holder">
            <br/><br/>
            <div id="searching" class="searchb" style="display:none; position: relative; right: 250px; top: 30px;">
            <br/><br/>
          <form action="browse-employees.php?" method="GET">
                <input type="text" name="last-name" placeholder="search employee..."><br/>
                <input type="submit" name="search"> 
                
          </form>
         </div>
    </div>
        
    </div>
<!--    <script>
function searchbar() {
    var x = document.getElementById("searching");
    
     if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    
 } 
}
</script>-->
    
  </header>