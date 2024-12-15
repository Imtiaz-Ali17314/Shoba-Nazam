
    window.print();

    function $(id) 
    {
        return document.getElementById(id);    
    }

   //  Both Tables benazmi and student, are connected

/*benazmi.forEach((e)=> {
    
    cs = students.filter(m=> m.code==e.sid )
    if(cs.length>0)
    {
        console.log(cs);
        e.name=cs[0].name;
        e.fathername=cs[0].fathername;
        e.class=cs[0].class;
    }


});


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
    if(a.sid == "" || a.sid==null)
    {
        a.sid = "-";

    }
    if(a.class == "" || a.class==null)
    {
        a.class = "-";
    }
    if(a.total == "" || a.total==null)
    {
        a.total = "-";
    }


    htmlData = htmlData + "<tr><td>" + a.name + "</td><td>" + a.fathername +"</td><td>" + a.sid +"</td><td>" + a.class +"</td><td>" + a.total +"</td></tr>";
    
});
$("tbody").innerHTML =htmlData;



*/