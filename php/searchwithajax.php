
<?php

    include("include.php");

    $fdate = $_GET["fdate"];
    $ldate = $_GET["ldate"];
    $sid = $_GET["sid"];


    if($fdate == "" && $ldate == "")
    {
        $sql= "SELECT b.btid,b.sid, b.date,s.sname,s.fathername,s.code,s.class,bt.name,b.detail,b.id from student s
        inner join benazmi b on s.id=b.sid 
        inner join btype bt on b.btid=bt.id 
        where b.sid = '$sid' ";
 
        $result=$conn->query($sql);
    }
    
    else if($fdate == "")
    {
        $sql= "SELECT b.btid,b.sid, b.date,s.sname,s.fathername,s.code,s.class,bt.name,b.detail,b.id from student s
        inner join benazmi b on s.id=b.sid 
        inner join btype bt on b.btid=bt.id 
        where b.sid = '$sid' and b.date <= '$ldate' ";
       
        $result=$conn->query($sql);
    }
    else if($ldate == "")
    {
        $sql= "SELECT b.btid,b.sid, b.date,s.sname,s.fathername,s.code,s.class,bt.name,b.detail,b.id from student s
        inner join benazmi b on s.id=b.sid 
        inner join btype bt on b.btid=bt.id 
        where b.sid = '$sid' and b.date >= '$fdate' ";
    
        $result=$conn->query($sql);

    }
    else
    {
        $sql= "SELECT b.btid,b.sid, b.date,s.sname,s.fathername,s.code,s.class,bt.name,b.detail,b.id from student s
        inner join benazmi b on s.id=b.sid 
        inner join btype bt on b.btid=bt.id 
        where b.sid = '$sid' and b.date between '$fdate' and '$ldate' ";
 
        $result=$conn->query($sql);
    }

    $arr= array();

    while($row = $result->fetch_assoc())
    {

        $obj =new stdClass();
        $obj->date =  $row["date"];
        $obj->name =  $row["sname"];
        $obj->fathername =  $row["fathername"];
        $obj->code =  $row["code"];
        $obj->class =  $row["class"];
        $obj->benazmi =  $row["name"];
        $obj->detail =  $row["detail"];
        $obj->btid = $row["btid"];
        $obj->sid = $row["sid"];
        array_push($arr,$obj);

    }

    echo json_encode($arr);



?>