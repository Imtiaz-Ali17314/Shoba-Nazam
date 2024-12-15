/*function $(id) 
{
    return document.getElementById(id);    
}

arr=0;

$("sub").onclick = function()
{
        var sid = $("hidsid").value;
        var fdate = $("fdate").value;
        var ldate = $("ldate").value;
        var xhttp = new XMLHttpRequest();
        //location.href ="../php/searchwithajax.php?fdate="+fdate+"&ldate="+ldate+"& sid="+sid;
        xhttp.open("GET", "../php/searchwithajax.php?fdate="+fdate+"&ldate="+ldate+"& sid="+sid, true);
        xhttp.send();
        xhttp.onreadystatechange = function()
        {
            if(xhttp.readyState == 4 && xhttp.status == 200 )
            {
                arr = JSON.parse(xhttp.responseText);
                $("tbody").innerHTML = "";
                str="";
                arr.forEach(e => 
                {
                    str  += "<tr><td>"+e.date+"</td><td>"+e.name+"</td><td>"+e.fathername+"</td><td>"+e.code+"</td><td>"+e.class+"</td><td>"+e.benazmi+"</td><td>"+e.detail+"</td><td><img src='../images/e1.PNG' id='edit##"+e.btid+"##"+e.sid+"' style= 'float: right; color:#ff9000; margin: 0px 20px 0 0;'><img src='../images/d1.PNG' id='delete##"+e.btid+"##"+e.sid+"' style='float: left; color:#f33d3d; margin: 0 0 0px 27px;'></td></tr>";
                });
                $("tbody").innerHTML =str;
            }
        }
    
}



fullId="";
btid="";
sid="";


$("tbody").addEventListener("click", function(e){
    fullId = e.target.id.split("##") ;
        if(fullId[0] == 'edit')
        {  
            location.href="edit.php?btid="+fullId[1]+"&sid="+fullId[2];
        }
        if(fullId[0] == 'delete')
        {
            $("alert").style.display='block';
            btid=fullId[1];
            sid=fullId[2];
        }
        });
        
        
        
document.addEventListener('click' , function (a)
{
                                     
    if(a.target.id == 'true')
    {
        window.location="../php/delete.php?btid="+fullId[1]+"&sid="+fullId[2];
    }
    if(a.target.id == 'false')
    {
        $("alert").style.display="none";
    }
                                       
                                            
});
*/

function $(id) {
  return document.getElementById(id);
}

//  Both Tables benazmi and student, are connected

benazmi.forEach((e) => {
  cs = students.filter((m) => m.id == e.sid);

  if (cs.length > 0) {
    e.code = cs[0].code;
    e.name = cs[0].name;
    e.fathername = cs[0].fathername;
    e.class = cs[0].class;
  }
});

// Insert HTML
$("total").value = "";
fdate = $("fdate").value;
ldate = $("ldate").value;
fdate = "";
ldate = "";
tb = 0;
htmlData = "";
$("tbody").innerHTML = "";
benazmi.forEach((a) => {
  if (a.date == "" || a.date == null) {
    a.date = "-";
  }
  tb += 1;
  htmlData =
    htmlData +
    "<tr><td>" +
    a.date +
    "</td><td>" +
    a.name +
    "</td><td>" +
    a.fathername +
    "</td><td>" +
    a.code +
    "</td><td>" +
    a.class +
    "</td><td>" +
    a.bname +
    "</td><td>" +
    a.detail +
    "</td><td><img src='../images/e1.PNG' id='edit' name=" +
    a.btid +
    "><img src='../images/d1.PNG' id='delete' name=" +
    a.btid +
    "></td</tr>";
  $("total").value = tb;
});
$("tbody").innerHTML = htmlData;

// search data by one
srhresult = "";
jsnsres = "";
count = 0;

$("sub").onclick = function () {
  $("total").value = "";
  $("totalb").value = "";

  if ($("fdate").value == "" && $("ldate").value == "") {
    $("total").value = tb;
    $("totalb").value = tb;
    $("tbody").innerHTML = htmlData;
  } else {
    $("total").value = "";
    $("totalb").value = "";
    count = 0;
    htmlbyone = "";
    fdate = $("fdate").value;
    ldate = $("ldate").value;
    if (fdate == "") {
      fdate = "1900-04-01";
    }
    if (ldate == "") {
      ldate = "3030-04-01";
    }
    srhresult = benazmi.filter((e) => e.date >= fdate && e.date <= ldate);

    srhresult.forEach((e) => {
      count += 1;
      htmlbyone =
        htmlbyone +
        "<tr><td>" +
        e.date +
        "</td><td>" +
        e.name +
        "</td><td>" +
        e.fathername +
        "</td><td>" +
        e.sid +
        "</td><td>" +
        e.class +
        "</td><td>" +
        e.bname +
        "</td><td>" +
        e.detail +
        "</td><td><img src='../images/e1.PNG' id='edit' name=" +
        e.btid +
        "><img src='../images/d1.PNG' id='delete' name=" +
        e.btid +
        "></td</tr>";
    });

    $("total").value = count;
    $("totalb").value = count;
    $("tbody").innerHTML = htmlbyone;
  }

  //print

  jsnsres = JSON.stringify(srhresult);
  $("jsnsres").value = jsnsres;
};

jsnbenz = JSON.stringify(benazmi);
$("jsnbenz").value = jsnbenz;

$("print").onclick = function () {
  $("prform").submit();
};

//  Edit

$("tbody").addEventListener("click", function (x) {
  if (x.target.id == "edit") {
    benazmi.forEach((b) => {
      if (b.btid == x.target.name) {
        window.location =
          "../forms/edit.php?btid=" +
          b.btid +
          "&& sid=" +
          b.sid +
          "&& name=" +
          b.name +
          "&& code=" +
          b.code +
          "&& class=" +
          b.class +
          "&& total=" +
          tb +
          "&& fdate=" +
          fdate +
          "&& ldate=" +
          ldate;
      }
    });
  }
});

//  Delete

$("tbody").addEventListener("click", function (x) {
  if (x.target.id == "delete") {
    scode = x.target.name;
    $("alert").style.display = "block";
  }
});

document.addEventListener("click", function (a) {
  if (a.target.id == "true") {
    benazmi.forEach((b) => {
      if (b.btid == scode) {
        window.location =
          "../php/delete.php?btid=" + b.btid + "&& sid=" + b.sid;
      }
    });
  }
  if (a.target.id == "false") {
    $("alert").style.display = "none";
  }
});
