
<?php 
session_start();
if(!isset($_SESSION["user"]) )
{
    header("Location: loginform.php?error=Please login your account first");
}

include("../php/include.php");

$sid = $_GET["sid"];
$fdate = $_GET["fdate"];
$ldate = $_GET["ldate"];
$prname = $_GET["name"];
$prcode = $_GET["code"];
$prclass = $_GET["class"];
$prtotal = $_GET["total"];

if ($fdate == "" && $ldate == "")
{
    $sql= "SELECT b.btid,b.sid, b.date,s.sname,s.fathername,s.code,s.class,bt.name,b.detail,b.id from student s
    inner join benazmi b on s.id=b.sid 
    inner join btype bt on b.btid=bt.id 
    where b.sid = '$sid' order by b.date asc";

    $result=$conn->query($sql); 
    

}
else if ($fdate == "" && $ldate != "")
{
    $sql= "SELECT b.btid,b.sid, b.date,s.sname,s.fathername,s.code,s.class,bt.name,b.detail,b.id from student s
    inner join benazmi b on s.id=b.sid 
    inner join btype bt on b.btid=bt.id 
    where b.sid = '$sid' and b.date <= '$ldate' order by b.date asc ";

    $result=$conn->query($sql);  
 
}
else if ($fdate != "" && $ldate == "")
{
    $sql= "SELECT b.btid,b.sid, b.date,s.sname,s.fathername,s.code,s.class,bt.name,b.detail,b.id from student s
    inner join benazmi b on s.id=b.sid 
    inner join btype bt on b.btid=bt.id 
    where b.sid = '$sid' and b.date >= '$fdate' order by b.date asc ";

    $result=$conn->query($sql);
   
}
else
{
    $sql= "SELECT b.btid,b.sid, b.date,s.sname,s.fathername,s.code,s.class,bt.name,b.detail,b.id from student s
    inner join benazmi b on s.id=b.sid 
    inner join btype bt on b.btid=bt.id 
    where b.sid = '$sid' and b.date between '$fdate' and '$ldate' order by b.date asc ";

    $result=$conn->query($sql); 
     
}


$benazmis=array();
while($row = $result->fetch_assoc())
{  
    $benazmi =new stdClass();
    $benazmi->btid=$row["btid"];
    $benazmi->sid=$row["sid"];
    $benazmi->date=$row["date"]; 
    $benazmi->bname=$row["name"];
    $benazmi->detail=$row["detail"];
    $benazmi->bid=$row["id"];    
    array_push($benazmis,$benazmi);   
} 
$jsonbenazmi = json_encode($benazmis);  

    // For New Class
    $sql1= "SELECT * FROM student order by code asc";

    $result1=$conn->query($sql1);
  
    $students=array();
    while($row = $result1->fetch_assoc())
    {  
        $student =new stdClass();
        $student->id=$row["id"];
        $student->code=$row["code"];
        $student->name=$row["sname"];
        $student->fathername=$row["fathername"]; 
        $student->class=$row["class"]; 
        array_push($students,$student);   
    } 
    $jsonstudent = json_encode($students);




?>
<script>
students = <?php echo $jsonstudent ?>;
console.log(students);
benazmi = <?php echo $jsonbenazmi ?>;
console.log(benazmi);
</script>




<html dir="rtl">
    
    <head>
        <title>تفصیلاتی فارم</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="../css/css.css">
        <link rel="stylesheet" href="../css/detailsform.css">
        <link rel="stylesheet" href="../css/all.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/earlyaccess/notonastaliqurdudraft.css">
        
    </head>
    <body id="interface" >
        <div id="wreaper">

                                        <!-- Body header  -->

            <div id="header">
                <h1>شعبہِ نظم</h1>
            </div>


                                        <!-- Body of Body -->

            <div id="body">
                
                <div id="head">
                    <h4>فردی تفصیل</h4>
                </div>
                        <form action="prbyone.php" method="post" id="prform">
                            <input type="hidden" name="jsnsres" id="jsnsres" >
                            <input type="hidden" name="jsnbenz" id="jsnbenz">
                            <input type="hidden" name="name" value="<?php echo $prname?>">
                            <input type="hidden" name="code" value="<?php echo $prcode?>">
                            <input type="hidden" name="class" value="<?php echo $prclass?>">
                            <input type="hidden" name="total" id="total">

                        </form>

                             
                                        <!-- Body of Body -->

                <div id="scroll">
                    <table cellspacing="0" id="table">

                                        <!-- Thead -->

                        <thead>

                            <tr id="searchbox">
                                <form method="get" action="Sbyone.php" id="form1">
                    
                                        <td colspan="2">  
                                            <input type="date" name="fdate" id="fdate" placeholder="شروع کی تاریخ"  style="outline: none;width: 200px; margin-left: 20px;">
                                        </td>

                                        <td colspan="2">
                                            <input type="date"  name="ldate" id="ldate" placeholder="آخری تاریخ" style="outline: none;width: 200px; margin-left: 20px;">
                                        </td>
                                      
                                        <td>
                                            <p id="sub" class="sub" style="margin: 0;"> تلاش </p>
                                            <input type="hidden" name="hidsid" id="hidsid" value="<?php echo $sid ?>"> 
                                        </td>

                                        <td>
                                        <img src="../images/8396426_printer_print_machine_office_business_icon.png" id="print" style="" >
                                        </td>
                                        <td>
                                            کل بےنظمی<input type="reset"  name="totalb" id="totalb" value="<?php echo $prtotal ?>" style="outline: none;width: 35px;">
                                        </td>
                                        <td>
                                        <a href="#bottom" id="top" > 
                                        <div  style="width: 35; 
                                                height: 35;
                                                border-radius: 50px;
                                                margin: 0 35px 0 0;
                                                background: #00ffff8f;
                                                box-shadow: rgb(0 0 0 / 21%) 0px -15px 25px 0px inset, 
                                                rgb(0 0 0 / 2%) 0px -36px 30px 0px inset, 
                                                rgb(0 0 0 / 10%) 0px -79px 40px 0px inset, 
                                                rgb(0 0 0 / 6%) 0px 2px 1px, rgb(0 0 0 / 9%) 0px 4px 2px, 
                                                rgb(0 0 0 / 0%) 0px 8px 4px, rgb(0 0 0 / 0%) 0px 16px 8px, 
                                                rgb(0 0 0 / 0%) 0px 2px 0px;">
                                            <i class="fa-solid fa-angles-down"
                                                style="width: 25;
                                                height: 25;
                                                color: magenta;
                                                margin-top: 7px;">
                                            </i>
                                        </div>
                                    </a>
                                </td>
                                        
                                     
                                </form>
                        
                            </tr>
                        
                            <tr class="thead">
                                <td>تاریخ</td>
                                <td>نام</td>
                                <td>ولدیت</td>
                                <td>کوڈ</td>
                                <td>کلاس</td>
                                <td>بےنظمی</td>
                                <td>تفصیل</td>
                                <td>اقدامات</td>
                            </tr>
                   
                        </thead>
                                         <!-- Alert Form  -->


           
                                         <span id="alert" class="msgbox" style="display: none;" >

                                            <img src="https://img.icons8.com/external-flatart-icons-flat-flatarticons/30/000000/external-alert-web-security-flatart-icons-flat-flatarticons.png"/ >
                                <p>کیا آپ معلومات مٹانا چاہتے ہیں؟</p>
            
                                <div id="alertbuttons">
                                    
                                    <input type="button" id="true" class="true" value="جی ہاں">
                                    <input type="button" id="false" class="false" value="نہیں">
                                </div>
  
                                </span>
                  
                                        <!-- Tbody -->

                        <tbody id="tbody">
                            <?php 
                                while($row = $result->fetch_assoc())
                                {

                                
                            ?>
                            <tr>
                                
                               
                                </td>
                                <td>
                                    <a href="edit.php?btid=<?php echo $row['btid'] ?> && sid=<?php echo $row['sid'] ?> && name=<?php echo $prname?>  && code=<?php echo $prcode?>  && class=<?php echo $prclass?> && totle=<?php echo $prtotal?>" >
                                    <i  class="far fa-edit" id="edit"
                                        style="height: 22px;
                                        float: right;
                                        color: #ff9000;
                                        margin: 7px 23px 0 0;" >
                                    </i>
                                    </a>
                                    <img src="../images/d1.PNG"  id="<?php echo "delete"."##".$row['btid']."##".$row['sid'] ?>"
                                        style="float: left;
                                        color: #f33d3d;
                                        margin: 0 0 0px 27px;">
                                    </i>
                                  
                                    
                            
                                </td>
                            </tr>
                            <?php 
                                }
                            ?>
                           
                 
                
                        </tbody>
                        <tfoot>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a href="#top" id="bottom" > 
                                    <div  style="width: 35;
                                            height: 35;
                                            border-radius: 50px;
                                            margin: 0 35px 0 0;
                                            background: #00ffff9e;
                                            box-shadow: rgb(0 0 0 / 21%) 0px -15px 25px 0px inset, 
                                            rgb(0 0 0 / 2%) 0px -36px 30px 0px inset, 
                                            rgb(0 0 0 / 10%) 0px -79px 40px 0px inset, 
                                            rgb(0 0 0 / 6%) 0px 2px 1px, rgb(0 0 0 / 9%) 0px 4px 2px, 
                                            rgb(0 0 0 / 0%) 0px 8px 4px, rgb(0 0 0 / 0%) 0px 16px 8px, 
                                            rgb(0 0 0 / 0%) 0px 2px 0px;">
                                        <i class="fa-solid fa-angles-up"
                                            style="width: 25;
                                            height: 25;
                                            color: magenta;
                                            margin-top: 7px;">
                                        </i>
                                    </div>
                                </a>
                            </td>

                        </tfoot>
               
                    </table>
                </div>
            </div>
        

                                        <!-- Side Bar -->
                                        <div id="sidebar">
                <ul type="none">
                    <li><a href="benazmiform.php" >بےنظمی فارم</a></li>
                    <li><a href="detailsform.php" >تفصیلاتی فارم</a></li>
                    <li><a href="studentlist.php"style=" background-color: rgb(225 225 225 / 37%); box-shadow: rgb(0 0 0 / 15%) 0px -20px 40px 0px inset, rgb(0 0 0 / 0%) 0px -36px 30px 0px inset, rgb(0 0 0 / 0%) 0px -79px 40px 0px inset, rgb(0 0 0 / 0%) 0px 2px 1px, rgb(0 0 0 / 0%) 0px 4px 2px, rgb(0 0 0 / 0%) 0px 8px 4px, rgb(0 0 0 / 0%) 0px 16px 8px, rgb(0 0 0 / 0%) 0px 32px 16px;"  >کل بےنظمی فارم</a></li>
                    <li><a href="studata.php" >طلاب فہرست</a></li>
                </ul>
                <img src="../images/IMG-20231025-WA0018-removebg-preview.png" id="Jlogo">
            </div>
                                        <!-- Footer -->

            <div id="footer">
            مدرسہ دارالعلوم حجتیہ نگر خاص گلگت
            </div>
        </div>
    </body>

    <script src="../java/all.js"> </script>
    <script src="../java/detailbyone.js"> </script>
</html>