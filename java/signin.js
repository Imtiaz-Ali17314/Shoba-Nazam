function $(id) 
{
    return document.getElementById(id);    
}
$("password").value ="";
$("username").value ="";
/*$("body").addEventListener('click', function(x){
    if(x.target.id == "interface")
    {
        $("msgbox").style.display="none";
    }

});
*/
$("interface").onclick= function()
{
    $("msgbox").style.display="none";
  
    
}
$("password").onclick=function()
{
    $("error").style.display="none";
}
$("username").onclick=function()
{
    $("error").style.display="none";
}