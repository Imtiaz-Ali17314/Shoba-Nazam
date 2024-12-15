
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
            window.location="studentlist.php";            
        }
        else
        {
            $("form1").submit();
        }                  
    }