
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
        if($("fdate").value=="" && $("ldate").value=="" && $("name").value=="" && $("fathername").value=="" && $("code").value=="" && $("class").value=="" )
        {                       
            $("fdate").focus();                
        }
        else
        {
            $("form1").submit();
        }                  
    }