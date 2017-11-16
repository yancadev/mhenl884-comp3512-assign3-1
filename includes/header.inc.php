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
                  
             







<!-- trying to make the javascript hide/unhide underneath -->

<label class="mdl-button mdl-js-button mdl-button--icon"
               for="fixed-header-drawer-exp">
          <button onclick="searchbar()"><i class="material-icons">search</i></button>
        </label>
        
        <div class="mdl-textfield__expandable-holder">
          <form action="browse-employees.php?" method="GET">
             
  
                 <div id="searching">
                <input type="text" name="last-name">
                <input type="submit" name="search"> 
                </div>
          </form>
          
           <script>
function searchbar() {
    console.log("doesn't work");
    
    var x = document.getElementById("searching");
    
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}
</script>



        </div>
        
      </div>
    </div>
  </header>