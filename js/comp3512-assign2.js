// Hide and unhide filters within browse-employees
/* Code modified from toggle Hide/Show obtained from https://www.w3schools.com/howto/howto_js_toggle_hide_show.asp */
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
/* Code modified from toggle Hide/Show obtained from https://www.w3schools.com/howto/howto_js_toggle_hide_show.asp */
function searchbar() {
    var hide = document.getElementById("searching");
    
     if (hide.style.display === "none") {
        hide.style.display = "block";
    } else {
        hide.style.display = "none";
    
 } 
}