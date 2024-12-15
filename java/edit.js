
function $(id) 
{
    return document.getElementById(id);    
}

$("interface").addEventListener('click' , function (e)
{
    $("msgbox").style.display="none";
});

document.addEventListener('click' , function (a)
{                 
    if(a.target.id == 'true')
    {
        $("form").submit();
    }
    if(a.target.id == 'false')
    {
        $("alert").style.display="none";
    }
});

$("interface").addEventListener('click' , function (e)
{
    $("msgbox").style.display="none";
});

$("save").onclick= function()
{                         
    if($("code").value=="")
    {
        $("code").focus();
        $("code").style.outline="none";
    }
    else if($("benazmi").value=="")
    {
        $("benazmi").focus();
        $("benazmi").style.outline="none";
    }
    else if($("detail").value=="")
    {
        $("detail").focus();
        $("detail").style.outline="none";
    }
    else if($("date").value=="")
    {
        $("date").focus();
        $("date").style.outline="none";
    }
    else
    {
        $("alert").style.display="block";
    }                             
}