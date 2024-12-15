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
    if($("fdate").value=="" && $("ldate").value=="" && $("name").value=="" && $("fathername").value=="" && $("code").value=="" && $("class").value=="" && $("benazmi").value=="" )
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
        
       window.location="../php/delete.php?btid="+fullId[1]+"&& sid=1a";
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
                                        
});*/


function $(id) 
{
    return document.getElementById(id);    
}



benazmi.forEach((e)=> {
   
    cs = students.filter(m=> m.id==e.sid )
  
    
    
    if(cs.length>0)
    {
        e.code=cs[0].code;
        e.name=cs[0].name;
        e.fathername=cs[0].fathername;
        e.class=cs[0].class;
    }


});

// Insert HTML

htmlData="";
$("tbody").innerHTML ="";
benazmi.forEach((a)=> {
    if(a.date == "" || a.date==null)
    {
        a.date = "-";
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
    if(a.bname == "" || a.bname==null)
    {
        a.bname = "-";
    }
    if(a.detail == "" || a.detail==null)
    {
        a.detail = "-";
    }

    htmlData = htmlData + "<tr><td>"+ a.date + "</td><td>" + a.name + "</td><td>" + a.fathername +"</td><td>" + a.code +"</td><td>" + a.class +"</td><td>" + a.bname +"</td><td>" + a.detail +"</td><td><img src='../images/e1.PNG' id='edit' name="+a.btid+ "><img src='../images/d1.PNG' id='delete' name="+a.btid+ "></td</tr>";
    jsnbenz = JSON.stringify(benazmi);
    $("jsnbenz").value = jsnbenz;
    $("jsnsrcbyall").value ="";
    $("jsnsres").value ="";
});
$("tbody").innerHTML =htmlData;

// search data by all

$("byall").onkeyup= function()
{
    $("name").value ="" ;
    $("fathername").value = "";
    $("code").value = "";
    $("class").value ="";
    $("benazmi").value ="";
    $("fdate").value ="";
    $("ldate").value ="";
    htmlbyall = "";
    Sbyall = $("byall").value;
   
    Sresult =  benazmi.filter((e)=> e.name.indexOf(Sbyall) >= 0 || e.sid == Sbyall || e.fathername.indexOf(Sbyall) >= 0|| e.class.indexOf(Sbyall) >= 0 || e.bname.indexOf(Sbyall) >= 0 );
    Sresult.forEach(e => {
        htmlbyall= htmlbyall +"<tr><td>"+ e.date + "</td><td>" + e.name + "</td><td>" + e.fathername +"</td><td>" + e.sid +"</td><td>" + e.class +"</td><td>" + e.bname +"</td><td>" + e.detail +"</td><td><img src='../images/e1.PNG' id='edit' name="+e.btid+ "><img src='../images/d1.PNG' id='delete' name="+e.btid+ " ></td</tr>";
       
       
    });
    $("tbody").innerHTML =htmlbyall;
    jsnsrcbyall = JSON.stringify(Sresult);
    $("jsnsrcbyall").value = jsnsrcbyall;
    $("jsnbenz").value = "";
    $("jsnsres").value ="";
    
}


// search data by one

$("sub").onclick = function()
{
    $("byall").value="";
    if( $("name").value=="" && $("fathername").value=="" && $("code").value=="" && $("class").value==""&& $("benazmi").value==""&& $("fdate").value==""&& $("ldate").value=="" )
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
        sbenazmi= $("benazmi").value;
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

        srhresult = benazmi.filter((e)=> e.name.indexOf(sname) >= 0 && e.fathername.indexOf(sfathername) >= 0 && e.class.indexOf(sclass) >= 0 && e.sid.indexOf(scode) >= 0 && e.bname.indexOf(sbenazmi) >= 0 && e.date >= sfdate && e.date <= sldate );
        console.log(srhresult);
        
        srhresult.forEach(e => {
            htmlbyone= htmlbyone +"<tr><td>"+ e.date + "</td><td>" + e.name + "</td><td>" + e.fathername +"</td><td>" + e.sid +"</td><td>" + e.class +"</td><td>" + e.bname +"</td><td>" + e.detail +"</td><td><img src='../images/e1.PNG' id='edit' name="+e.btid+ "><img src='../images/d1.PNG' id='delete' name="+e.btid+ "></td</tr>";
      
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

$("tbody").addEventListener('click', function(x){
    if(x.target.id == "edit")
    {
       
        benazmi.forEach((b)=>{
           
            if(b.btid == x.target.name)
            {
               window.location="../forms/edit.php?btid="+b.btid+"&& sid=1a";
            }
        });
    }
});
$("tbody").addEventListener('click', function(x){
    if(x.target.id == "delete")
    {
        scode=x.target.name;
        $("alert").style.display='block';  

    }
});

document.addEventListener('click' , function (a)
{                                 
    if(a.target.id == 'true')
    {

        benazmi.forEach((b)=>{
           
            if(b.btid == scode)
            {
               window.location="../php/delete.php?btid="+b.btid+"&& sid=1a";
            }
        });
    }
    if(a.target.id == 'false')
    {
        $("alert").style.display="none";
    }                                         
});
