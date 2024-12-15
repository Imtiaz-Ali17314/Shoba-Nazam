
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

$("code").onkeyup = function()
{
    $("name").value ="";
    code = $("code").value;
    sdata = student.filter((e)=> e.code == code);
    sdata.forEach(e => {
        $("name").value = e.name;
    });
}

        
$("save").onclick= function()
{
                                    
    if($("code").value=="")
    {
        $("code").focus();
        $("code").style.outlineColor="red";
    }
    else if($("benazmi").value=="")
    {
        $("benazmi").focus();
        $("benazmi").style.outlineColor="red";
    }
    else if($("detail").value=="")
    {
        $("detail").focus();
        $("detail").style.outlineColor="red";
    }
    else if($("date").value=="")
    {
        $("date").focus();
        $("date").style.outlineColor="red";
    }
    else
    {
        $("alert").style.display="block";
    }                             
}

                           
