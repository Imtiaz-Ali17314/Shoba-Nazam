
/*
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

    document.addEventListener('click' , function (a)
    {        
        if(a.target.id == 'true')
        {
            window.location="../php/deletestu.php?btid="+fullId[1]+"&& sid="+fullId[2];
        }
        if(a.target.id == 'false')
        {
            $("alert").style.display="none";
        }                            
    });

    */

    function $(id) 
    {
        return document.getElementById(id);    
    }
   
    //      Add new Class in Student Array



    
   //  Both Tables benazmi and student, are connected

benazmi.forEach((e)=> {
   console.log("🚀 ~ benazmi.forEach ~ benazmi:", benazmi)
   
    cs = students.filter(m=> m.id==e.sid )
    console.log("🚀 ~ benazmi.forEach ~  students:",  students)
  
    
    
    if(cs.length>0)
    {
        e.code=cs[0].code;
        e.name=cs[0].name;
        e.fathername=cs[0].fathername;
        e.class=cs[0].class;
        console.log("🚀 ~ benazmi.forEach ~  e.class:",  e.class)
    }


});
    console.log("🚀 ~ benazmi.forEach ~ cs:", cs)


// Insert HTML

htmlData="";
$("tbody").innerHTML ="";
benazmi.forEach((a)=> {
    if(a.fdate == "" || a.fdate==null)
    {
        a.fdate = "-";
    }
    if(a.ldate == "" || a.ldate==null)
    {
        a.ldate = "-";
    }
    if(a.name == "" || a.name==null)
    {
        a.name = "-";
    }
    if(a.fathername == "" || a.fathername==null)
    {
        a.fathername = "-" ;
    }
    if(a.code == "" || a.code==null)
    {
        a.code = "-";

    }
    if(a.class == "" || a.class==null)
    {
        a.class = "-";
    }
    if(a.total == "" || a.total==null)
    {
        a.total = "-";
    }
    
    htmlData = htmlData + "<tr><td>"+ a.fdate +"/"+a.ldate+ "</td><td>" + a.name + "</td><td>" + a.fathername +"</td><td>" + a.code +"</td><td>" + a.class +"</td><td>" + a.total +"</td><td><a href='detailbyone.php?sid="+a.sid+"&code="+a.code+"&name="+a.name+"&class="+a.class+"&total="+a.total+"&fdate="+a.fdate+"&ldate="+a.ldate+"'><button type='button'>تفصیل</button></a></td</tr>";
    jsnbenz = JSON.stringify(benazmi);
    $("jsnbenz").value = jsnbenz;
    $("jsnsrcbyall").value ="";
    $("jsnsres").value ="";
});
console.log(benazmi);

$("tbody").innerHTML =htmlData;

// search data by all
Sresult ="";
jsnsrcbyall="";
$("byall").onkeyup= function()
{
    $("name").value ="" ;
    $("fathername").value = "";
    $("code").value = "";
    $("class").value ="";
    $("fdate").value ="";
    $("ldate").value ="";
    if( $("byall").value=="" )
    {
        $("tbody").innerHTML =htmlData;
    }

    htmlbyall = "";
    Sbyall = $("byall").value;
    Sresult =  benazmi.filter((e)=> e.name.indexOf(Sbyall) >= 0 || e.sid == Sbyall || e.fathername.indexOf(Sbyall) >= 0|| e.class.indexOf(Sbyall) >= 0  );
    Sresult.forEach(e => {
    htmlbyall= htmlbyall +"<tr><td>"+ e.fdate +"/"+e.ldate+ "</td><td>" + e.name + "</td><td>" + e.fathername +"</td><td>" + e.code +"</td><td>" + e.class +"</td><td>" + e.total +"</td><td><a href='detailbyone.php?sid="+e.sid+"&code="+e.code+"&name="+e.name+"&class="+e.class+"&total="+e.total+"'><button type='button'>تفصیل</button></a></td</tr>";

       
    });
    $("tbody").innerHTML =htmlbyall;
   
    jsnsrcbyall = JSON.stringify(Sresult);
    $("jsnsrcbyall").value = jsnsrcbyall;
    $("jsnbenz").value = "";
    $("jsnsres").value ="";
    
}


// search data by one
srhresult="";
jsnsres="";
$("sub").onclick = function()
{
    $("byall").value="";
    if( $("name").value=="" && $("fathername").value=="" && $("code").value=="" && $("class").value==""&& $("fdate").value==""&& $("ldate").value=="" )
    {
        $("tbody").innerHTML =htmlData;
    }
    else
    {
        
        htmlbyone="";
        htmlbyall="";
        sname = $("name").value ;
        sfathername =$("fathername").value;
        scode= $("code").value;
        sclass= $("class").value;
        sfdate= $("fdate").value;
        sldate= $("ldate").value;
        if (sfdate =="")
        {
            sfdate = '1900-04-01';
        }
        if (sldate =="")
        {
            sldate = '3030-04-01';
            
        }
        srhresult = benazmi.filter((e)=> e.name.indexOf(sname) >= 0 && e.fathername.indexOf(sfathername) >= 0 && e.class.indexOf(sclass) >= 0 && e.sid.indexOf(scode) >= 0 && e.date >= sfdate && e.date <= sldate);
        console.log(srhresult);
        srhresult.forEach(e => {
            htmlbyone= htmlbyone +"<tr><td>"+ e.fdate +"/"+e.ldate+ "</td><td>" + e.name + "</td><td>" + e.fathername +"</td><td>" + e.code +"</td><td>" + e.class +"</td><td>" + e.total +"</td><td><a href='detailbyone.php?sid="+e.sid+"&code="+e.code+"&name="+e.name+"&class="+e.class+"&total="+e.total+"&fdate="+e.fdate+"&ldate="+e.ldate+"'><button type='button'>تفصیل</button></a></td</tr>";

        });
        $("tbody").innerHTML= htmlbyone;
        jsnsres = JSON.stringify(srhresult);
        $("jsnsres").value = jsnsres;
    }  
    
   
    $("jsnbenz").value = "";
    $("jsnsrcbyall").value ="";
  
}



$("print").onclick = function()
{
     $("prform").submit();
}


