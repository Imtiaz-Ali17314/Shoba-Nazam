
    function $(id) 
    {
        return document.getElementById(id);    
    }

    $("searchbtn").onclick = function()
    {
        if($("byall").value == "")
        {
            $("byall").focus();                   
        }
        else
        {
            $("form").submit();
        }
    }

    $("sub").onclick = function()
    {
        if($("fdate").value=="" && $("ldate").value=="" && $("name").value=="" && $("fathername").value=="" && $("code").value=="" && $("class").value=="" && $("benazmi").value=="" )
        {                                 
            window.location="detailsform.php";                                 
        }
        else
        {
            $("form1").submit();
        }                  
    }

    document.addEventListener('click' , function (a)
    {                    
        if(a.target.id == 'true')
        {
            window.location="../php/delete.php?btid="+fullId[1]+ "&& sid=1a";
        }
        if(a.target.id == 'false')
        {
            $("alert").style.display="none";
        }                           
    });

    fullId="";
    document.addEventListener('click', function(e)
    {
        
        fullId = e.target.id.split("####") ;
        if(fullId[0] == "delete")
        {                                   
        $("alert").style.display='block';                              
        }                           
    });





