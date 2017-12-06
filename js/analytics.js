/*global $*/
$(function()	{
    $("#country").hover(function()	{
var	url	= "Service/service-topCountries.php";
$("#result").html("<form> </form>")
  if (status == "success"){ 
    $.get(url,	function (data,	status)	{
    $.each(data, function (index, value){
        $("#country").append("<option value =" + 
            "value.CountryCode  >" + 
            "value.CountryName" + " </option>" )
    
        
    });
    });
  }
});       
});    
    
    
/*    
    if	(status	==	"success")	{
        var	list =	"";
//	loop	through	JSON	data	and	add	each	city	to	list-->
for	(var i=0; i	< data.length; i++)	{
    list +=	data[i].name + "<br>";
}
}
$("#results").html(list);
        });
});		
});    */