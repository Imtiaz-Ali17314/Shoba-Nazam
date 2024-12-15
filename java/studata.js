

    function $(id) 
    {
        return document.getElementById(id);    
    }
  

                        // Insert HTML
    jsnstu ="";
    htmlD="";
    no=1;
   $("tbody").innerHTML="";
    student.forEach(e => {
        
        if(e.name == "" || e.name==null)
        {
            e.name = "-";
        }
        if(e.fathername == "" || e.fathername==null)
        {
            e.fathername = "-" ;
        }
        if(e.code == "" || e.code==null)
        {
            e.code = "-";

        }
        if(e.class == "" || e.class==null)
        {
            e.class = "-";
        }

        htmlD= htmlD+ "<tr><td>" + no + "</td><td>" + e.name + "</td><td>" + e.fathername + "</td><td>" + e.code + "</td><td>"+ e.class + "</td><td></td><td></td></tr>";
       no++;
       jsnstu = JSON.stringify(student);
       $("jsnstu").value = jsnstu;
       $("jsnsrcbyall").value ="";
       $("jsnsres").value ="";
    
      
    });
    
    $("tbody").innerHTML =htmlD;


                        // search data by one
    srhresult="";
    jsnsres="";
    $("sub").onclick = function()
    {
        no=1;
        console.log($("class").value);
        if( $("name").value=="" && $("fathername").value=="" && $("code").value=="" && $("class").value=="" )
        {
            $("tbody").innerHTML =htmlD;
        }
        else
        {
            htmlbyone="";
            htmlbyall="";
            sname = $("name").value ;
            sfathername =$("fathername").value;
            scode= $("code").value;
            sclass= $("class").value;

            srhresult = student.filter((e)=> e.name.indexOf(sname) >= 0 && e.fathername.indexOf(sfathername) >= 0 && e.class.indexOf(sclass) >= 0 && e.code.indexOf(scode) >= 0);

            srhresult.forEach(e => {
               htmlbyone= htmlbyone + "<tr><td>" + no + "</td><td>" + e.name + "</td><td>" + e.fathername + "</td><td>" + e.code + "</td><td>"+ e.class + "</td><td></td><td></td></tr>";
               no++;
            });
            $("tbody").innerHTML= htmlbyone;
            jsnsres = JSON.stringify(srhresult);
            $("jsnsres").value = jsnsres;
        }   
        $("jsnstu").value = "";
        $("jsnsrcbyall").value ="";         
    }

    htmlData='';
                              // search data by all
    
    Sresult ="";
    jsnsrcbyall="";
    $("byall").onkeyup= function()
    {
        no=1;
        $("name").value ="" ;
        $("fathername").value = "";
        $("code").value = "";
        $("class").value ="";
        htmlbyall = "";
        Sbyall = $("byall").value;
       
        Sresult =  student.filter((e)=> e.name.indexOf(Sbyall) >= 0 || e.code == Sbyall || e.fathername.indexOf(Sbyall) >= 0|| e.class.indexOf(Sbyall) >= 0 );
        Sresult.forEach(e => {
            htmlbyall= htmlbyall + "<tr><td>" + no + "</td><td>" + e.name + "</td><td>" + e.fathername + "</td><td>" + e.code + "</td><td>"+ e.class + "</td><td></td><td></td></tr>";
            no++;
           
        });
        $("tbody").innerHTML =htmlbyall;
        jsnsrcbyall = JSON.stringify(Sresult);
        $("jsnsrcbyall").value = jsnsrcbyall;
        $("jsnstu").value = "";
        $("jsnsres").value ="";
       // $("byall").value = "";
    }


    $("print").onclick = function()
    {
     $("prform").submit();
    }