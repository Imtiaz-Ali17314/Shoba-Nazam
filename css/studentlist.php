<?php 
/*
session_start();
if(!isset($_SESSION["user"]) )
{
    header("Location: loginform.php?error=Please sign in yor account first");
}

include("../php/include.php");
include("../php/includesql.php");

// Sql queries
$tsql = "select * from VStudentInfo";  
$Sresult = sqlsrv_query($connsql, $tsql);
$students=array();

while( $row = sqlsrv_fetch_array( $Sresult, SQLSRV_FETCH_NUMERIC))  
{  
    $student =new stdClass();
    $student->code=$row[0];
    $student->name=$row[1];
    $student->fathername=$row[2]; 
    $student->class=$row[5];
    $student->adress=$row[3];  
    array_push($students,$student);   
} 
$jsonstudent = json_encode($students);  

// Mysql queries


$sql= "SELECT b.id,b.btid,b.date, b.sid ,min(date) as startDate,
max(date) as endDate, COUNT(b.sid) as total FROM benazmi b
group by b.sid order by total desc";
  
    $result= mysqli_query($conn, $sql);
    
    $benazmis=array();
    while($row = $result->fetch_assoc())
    {  
        $benazmi =new stdClass();
        $benazmi->btid=$row["btid"];
        $benazmi->sid=$row["sid"];
        $benazmi->date=$row["date"];
        $benazmi->fdate=$row["startDate"];
        $benazmi->ldate=$row["endDate"];  
        $benazmi->bid=$row["id"]; 
        $benazmi->total=$row["total"];    
        array_push($benazmis,$benazmi);   
    } 
    $jsonbenazmi = json_encode($benazmis);  

        // For New Class

        $sql= "SELECT * from student";
      
  
        $result= mysqli_query($conn, $sql);
        
        $Stuclass=array();
        while($row = $result->fetch_assoc())
        {  
            $stuclas =new stdClass();
            $stuclas->stuid=$row["id"];
            $stuclas->stuclass=$row["class"];
            $stuclas->stucode=$row["code"];     
            array_push($Stuclass,$stuclas);   
        } 
    $jsonstuclas = json_encode($Stuclass); 


*/
?>
<script>
  /*  students = <?php echo $jsonstudent ?>;
    benazmi = <?php echo $jsonbenazmi ?>;
    stuclass = <?php echo $jsonstuclas ?>; 
    */
  
</script>

<html dir="rtl">
    
    <head>
        <title>بے نظم طلاب کی فہرست</title>
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
                    <h4>طلاب کی کل بےنظمیاں</h4>
                    
                    <div id="searchbyalldiv">
                        <form method="get" action="stubyall.php" id="form">
                            <input type="text" name="byall" id="byall" placeholder="تلاش کریں" style="outline: none;">
                            <input type="button" name="searchbtn" id="searchbtn">
                        </form>
                    </div>        
                
                </div>
                        <form action="printtotal.php" method="post" id="prform">
                            <input type="hidden" name="jsnsres" id="jsnsres" >
                            <input type="hidden" name="jsnbenz" id="jsnbenz">
                            <input type="hidden" name="jsnSres" id="jsnSres" >
                          
                        </form>
                                        <!-- Body of Body -->

                <div id="scroll">
                    <table cellspacing="0" id="table">
                        <form method="get" action="stubyone.php" id="form1">

                                       <!-- Thead -->

                        <thead>

                                <tr id="searchbox">
                                        <td>
                                            <input type="date"  name="fdate" id="fdate" placeholder="شروع کی تاریخ" style="outline: none;width: 165px;">
                                        </td>

                                        <td>
                                            <input type="text"  name="name" id="name" placeholder="نام تلاش کریں" style="outline: none;">
                                        </td>
                                        <td>
                                            <input type="text"  name="fathername" id="fathername" placeholder="ولدیت تلاش کریں" style="outline: none;">
                                        </td>
                                        <td>
                                            <input type="text"  name="code" id="code" placeholder="    کوڈ تلاش کریں" style="outline: none;"> 
                                        </td>
                                        <td>
                                            <select name="class" class='class' id="class" > 
                                                <option disabled selected>کلاس تلاش کریں</option>                                    
                                                <option></option>
                                                <option >تمہیدیہ</option>
                                                <option >کلاس ششم</option>
                                                <option >کلاس ہفتم</option>
                                                <option >کلاس ہشتم</option>
                                                <option >کلاس نہم سائنس</option>
                                                <option >کلاس نہم آرٹس</option>
                                                <option >کلاس دہم سائنس</option>
                                                <option >کلاس دہم آرٹس</option>
                                                <option >سال اول</option>
                                                <option >سال دوم</option>
                                                <option >سال سوم</option>
                                                <option >سال چہارم</option>
                                                <option >سال پہجم</option>
                                            </select>
                                        </td>

                                        <td>
                                        <p id="sub" class="sub"> تلاش </p>
                                        </td>
                                <td>
                                    <img src="../images/8396426_printer_print_machine_office_business_icon.png" id="print" >
                                    <a href="#bottom" id="top" > 
                                        <div  style="width: 47PX; 
                                                height: 45px;
                                                border-radius: 50px;
                                                margin: 0 37% 0 0;
                                                background: #00ffff8f;
                                                box-shadow: rgb(0 0 0 / 21%) 0px -15px 25px 0px inset, 
                                                rgb(0 0 0 / 2%) 0px -36px 30px 0px inset, 
                                                rgb(0 0 0 / 10%) 0px -79px 40px 0px inset, 
                                                rgb(0 0 0 / 6%) 0px 2px 1px, rgb(0 0 0 / 9%) 0px 4px 2px, 
                                                rgb(0 0 0 / 0%) 0px 8px 4px, rgb(0 0 0 / 0%) 0px 16px 8px, 
                                                rgb(0 0 0 / 0%) 0px 2px 0px;">
                                            <i class="fa-solid fa-angles-down"
                                                style="/* width: 25; */
                                                        height: 70%;
                                                        color: magenta;
                                                        margin-top: 7px;"
                                            >
                                            </i>
                                        </div>
                                    </a>
                                </td>

                            </tr>
                        
                            <tr class="thead">
                                
                                <td>تاریخ</td>
                                <td>نام</td>
                                <td>ولدیت</td>
                                <td>کوڈ</td>
                                <td>کلاس</td>
                                <td>کل بے نظمی</td>
                                <td>تفصیلات</td>

                            </tr>
                   
                        </thead>

                   
                                        <!-- Tbody -->

                        <tbody id="tbody">

                        </tbody>
                        <tfoot>
                            <tr>
                                <td>  
                                    <input type="date" name="ldate" id="ldate" placeholder="آخری تاریخ" style="outline: none;width:165px;">
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                <a href="#top" id="bottom" > 
                                        <div  style="width: 47PX;
                                                height: 45PX;
                                                border-radius: 50px;
                                                margin: 0 40% 0 0;
                                                background: #00ffff9e;
                                                box-shadow: rgb(0 0 0 / 21%) 0px -15px 25px 0px inset, 
                                                rgb(0 0 0 / 2%) 0px -36px 30px 0px inset, 
                                                rgb(0 0 0 / 10%) 0px -79px 40px 0px inset, 
                                                rgb(0 0 0 / 6%) 0px 2px 1px, rgb(0 0 0 / 9%) 0px 4px 2px, 
                                                rgb(0 0 0 / 0%) 0px 8px 4px, rgb(0 0 0 / 0%) 0px 16px 8px, 
                                                rgb(0 0 0 / 0%) 0px 2px 0px;">
                                            <i class="fa-solid fa-angles-up"
                                                style="/*width: 25*/;
                                                height: 70%;
                                                color: magenta;
                                                margin-top: 7px;">
                                            </i>
                                        </div>
                                    </a>
                                </td>
                            </tr>
                        </tfoot> 
                    </form>
                    </table>
                </div>
            </div>
        

                                        <!-- Side Bar -->
            <div id="sidebar">
                <ul type="none">
                    <li><a href="addstudentform.php" >تصدیق کریں</a></li>
                    <li><a href="benazmiform.php" >بےنظمی فارم</a></li>
                    <li><a href="detailsform.php" >تفصیلاتی فارم</a></li>
                    <li><a href="studentlist.php" style=" background-color: rgb(225 225 225 / 37%); box-shadow: rgb(0 0 0 / 15%) 0px -20px 40px 0px inset, rgb(0 0 0 / 0%) 0px -36px 30px 0px inset, rgb(0 0 0 / 0%) 0px -79px 40px 0px inset, rgb(0 0 0 / 0%) 0px 2px 1px, rgb(0 0 0 / 0%) 0px 4px 2px, rgb(0 0 0 / 0%) 0px 8px 4px, rgb(0 0 0 / 0%) 0px 16px 8px, rgb(0 0 0 / 0%) 0px 32px 16px;" >کل بےنظمیاں</a></li>
                    <li><a href="studata.php" >طلاب فہرست</a></li>
                    
                </ul>
                <img src="../images/logo-removebg-preview.png" id="Jlogo">
            </div>
                                        <!-- Footer -->

            <div id="footer">
                جامعہ عروۃ الوثقیٰ لاہور
            </div>
        </div>
    </body>
    
    <script src="../java/studentlist.js"> </script>
    <script src="../java/all.js"> </script>
    
    
</html>