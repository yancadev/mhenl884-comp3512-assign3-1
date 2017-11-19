// Hide and unhide filters within browse-employees
function switchFunction() {
     /*global x*/
     var hide = document.getElementById("filter");
     
    if (hide.style.display === "none") {
        hide.style.display = "block";
    } else {
        hide.style.display = "none";
    
 } 
}

// Hide and unhide filters within header navigation.
function searchbar() {
    var x = document.getElementById("searching");
    
     if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    
 } 
}