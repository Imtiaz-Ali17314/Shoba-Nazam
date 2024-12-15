
<?php 
session_start();
if(!isset($_SESSION["user"]) )
{
    header("Location: loginform.php?error=Please login your account first");
}

include("../php/include.php");

// Mysql queries

$sql= "SELECT b.btid,b.sid,b.date,bt.name,b.detail,b.id from benazmi b
      inner join btype bt on b.btid=bt.id";
  
    $result= mysqli_query($conn, $sql);
    
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
    
    benazmi = <?php echo $jsonbenazmi ?>;
  
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
                    <h4>تفصیلاتی فارم</h4>
                    
                    <div id="searchbyalldiv">
                        <form method="get" action="Sresult.php" id="form">
                            <input type="text" name="byall" id="byall" placeholder="تلاش کریں" style="outline: none;">
                            <input type="button" name="searchbtn" id="searchbtn">
                        </form>
                    </div>        
                
                </div>
                        <form action="prdetfor.php" method="post" id="prform">
                            <input type="hidden" name="jsnsres" id="jsnsres" >
                            <input type="hidden" name="jsnbenz" id="jsnbenz">
                            <input type="hidden" name="jsnsrcbyall" id="jsnsrcbyall" >
                          
                        </form>

                             
                                        <!-- Body of Body -->

                <div id="scroll">
                    <table cellspacing="0" id="table">
                    <form method="get" action="Sbyone.php" id="form1">

                                        <!-- Thead -->

                        <thead>

                            <tr id="searchbox">

                                        <td>
                                            <input type="date"  name="fdate" id="fdate" placeholder="شروع کی تاریخ" style="outline: none;width: 130px;">
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
                                                <select  class="classlist" name="class" id="class" style="outline: none;">
                                                <option value=""></option>
                                                <option>متوسطہ اولیٰ</option>
                                                <option>متوسطہ ثانیہ</option>
                                                <option>عامہ اولیٰ</option>
                                                <option>عامہ ثانیہ</option>
                                                </select>
                                        </td>

                                        <td>
                                            <input type="text" name="benazmi" id="benazmi" placeholder="بےنظمی تلاش کریں" style="outline: none;">
                                        </td>
                                 
                                        <td>
                                            <p id="sub" class="sub"> تلاش </p>

                                        </td>
                                        <td>
                                        <img src="../images/8396426_printer_print_machine_office_business_icon.png" id="print" >
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
                              
                                <td><?php echo $row["date"] ?></td>
                                <td><?php echo $row["sname"] ?></td>
                                <td><?php echo $row["fathername"] ?></td>
                                <td><?php echo $row["code"] ?></td>
                                <td><?php echo $row["class"] ?></td>
                                <td><?php echo $row["name"] ?></td>
                                <td><?php echo $row["detail"] ?></td>
                                
                                <td>
                                    <a href="edit.php?btid=<?php echo $row['btid'] ?> && sid=1a" >
                                    <i  class="far fa-edit" id="edit"
                                        style="height: 22px;
                                        float: right;
                                        color: #ff9000;
                                        margin: 7px 23px 0 0;" >
                                    </i>
                                    </a>

                                    <img src="../images/d1.PNG"   id="<?php echo "delete"."####".$row['btid'] ?>"
                                        style="float: left;
                                        color: #f33d3d;
                                        margin: 0 0 0px 27px;">
                                
                                </td>
                            </tr>
                            <?php 
                                }
                            ?>
                           
                 
                
                        </tbody>
                                   
                        <tfoot>
                            <tr>
                                <td>  
                                    <input type="date" name="ldate" id="ldate" placeholder="آخری تاریخ" style="outline: none; width: 130px;">
                                </td>
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
                            </tr>
                        </tfoot> 
                        </form>
                    </table>
                </div>
            </div>
        

                                        <!-- Side Bar -->
                                        <div id="sidebar">
                <ul type="none">
                <li><a href="benazmiform.php" >بےنظمی فارم</a></li>
                    <li><a href="detailsform.php"  style=" background-color: rgb(225 225 225 / 37%); box-shadow: rgb(0 0 0 / 15%) 0px -20px 40px 0px inset, rgb(0 0 0 / 0%) 0px -36px 30px 0px inset, rgb(0 0 0 / 0%) 0px -79px 40px 0px inset, rgb(0 0 0 / 0%) 0px 2px 1px, rgb(0 0 0 / 0%) 0px 4px 2px, rgb(0 0 0 / 0%) 0px 8px 4px, rgb(0 0 0 / 0%) 0px 16px 8px, rgb(0 0 0 / 0%) 0px 32px 16px;" >تفصیلاتی فارم</a></li>
                    <li><a href="studentlist.php" >کل بےنظمی فارم</a></li>
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
    
    <script src="../java/java.js"> </script>
    <script src="../java/all.js"> </script>
    <script src="../java/detailsform.js"> </script>

    
</html>