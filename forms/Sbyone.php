
<?php
session_start();
if(!isset($_SESSION["user"]) )
{
    header("Location: loginform.php?error=Please login your account first");
}


include("../php/include.php");

$name = $_GET["name"];
$fathername = $_GET["fathername"];
$code = $_GET["code"];
$class = $_GET["class"];
$benazmi = $_GET["benazmi"];
$fdate = $_GET["fdate"];
$ldate = $_GET["ldate"];

if($class == "تمام")
{
    echo $class = "";
}


if($fdate == "" && $ldate == "")
{
    $sql2= "SELECT b.btid, b.date,s.sname,s.fathername,s.code,s.class,bt.name,b.detail from student s 
    inner join benazmi b on s.id=b.sid 
    inner join btype bt on b.btid=bt.id where s.sname like '%$name%' and s.fathername like '%$fathername%'
    and s.code like '%$code%' and s.class like '%$class%' and bt.name like '%$benazmi%'  order by b.date asc ";
    
    $result2=$conn->query($sql2);
}


if($fdate == "")
{
    $sql2= "SELECT b.btid, b.date,s.sname,s.fathername,s.code,s.class,bt.name,b.detail from student s 
    inner join benazmi b on s.id=b.sid 
    inner join btype bt on b.btid=bt.id where s.sname like '%$name%' and s.fathername like '%$fathername%'
    and s.code like '%$code%' and s.class like '%$class%' and bt.name like '%$benazmi%' and b.date <= '$ldate'  
    order by b.date asc ";
    
    $result2=$conn->query($sql2);
}

if($ldate == "")
{
    $sql2= "SELECT b.btid, b.date,s.sname,s.fathername,s.code,s.class,bt.name,b.detail from student s 
    inner join benazmi b on s.id=b.sid 
    inner join btype bt on b.btid=bt.id where s.sname like '%$name%' and s.fathername like '%$fathername%'
    and s.code like '%$code%' and s.class like '%$class%' and bt.name like '%$benazmi%' and b.date >= '$fdate'  
    order by b.date asc ";
    
    $result2=$conn->query($sql2);
}

else
{
    $sql2= "SELECT b.btid, b.date,s.sname,s.fathername,s.code,s.class,bt.name,b.detail from student s 
    inner join benazmi b on s.id=b.sid 
    inner join btype bt on b.btid=bt.id where s.sname like '%$name%' and s.fathername like '%$fathername%'
    and s.code like '%$code%' and s.class like '%$class%' and bt.name like '%$benazmi%' and b.date between '$fdate' and '$ldate'
    order by b.date asc ";
    
    $result2=$conn->query($sql2);
}


?>


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

                                        <!-- Body of Body -->

                <div id="scroll">
                    <table cellspacing="0" id="table">
                    <form method="get" action="Sbyone.php" id="form1">

                                        <!-- Thead -->

                        <thead>

                            <tr id="searchbox">
                                

                                    <td>
                                        <input type="date"  name="fdate" id="fdate" placeholder="شروع کی تاریخ" style="outline: none;width: 130px;" value="<?php echo $fdate ?>">
                                    </td>

                                    <td>
                                        <input type="text"  name="name" id="name" placeholder="نام تلاش کریں" style="outline: none;" value="<?php echo $name ?>">
                                    </td>
                                    <td>
                                        <input type="text"  name="fathername" id="fathername" placeholder="ولدیت تلاش کریں" style="outline: none;" value="<?php echo $fathername ?>">
                                    </td>
                                    <td>
                                        <input type="text"  name="code" id="code" placeholder="    کوڈ تلاش کریں" style="outline: none;" value="<?php echo $code ?>"> 
                                    </td>

                                    <td>
                                    <select  class="classlist" name="class" id="class" style="outline: none;">
                                                    <option><?php echo $class ?></option>
                                           
                                                    <option>متوسطہ اولیٰ</option>
                                                    <option>متوسطہ ثانیہ</option>
                                                    <option>عامہ اولیٰ</option>
                                                    <option>عامہ ثانیہ</option>
                                                    <option id="all">تمام</option>
                                                    <script>
                                                        $("all").onkeyup = function()
                                                        {
                                                            <?php echo $class=""; ?>
                                                        }
                                                    </script>
                                            
                                                </select>
                                    </td>

                                    <td>
                                        <input type="text" name="benazmi" id="benazmi" placeholder="بےنظمی تلاش کریں" style="outline: none;" value="<?php echo $benazmi ?>">
                                    </td>
                                        
                                    <td>
                                    <p id="sub" class="sub"> تلاش </p>
                                    </td>
                                    <td>
                                    <a href="#bottom" id="top" > 
                                        <div style="width: 35;
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

                        <tbody>
                        <?php 
                                while($row = $result2->fetch_assoc())
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

                                    <img src="../images/d1.PNG"  id="<?php echo "delete"."####".$row['btid'] ?>"
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
                                    <input type="date" name="ldate" id="ldate" placeholder="آخری تاریخ" style="outline: none;width: 130px;" value="<?php echo $ldate ?>">
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="#top" id="bottom" > 
                                        <div style="width: 35;
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
                    <li><a href="detailsform.php" style=" background-color: rgb(225 225 225 / 37%); box-shadow: rgb(0 0 0 / 15%) 0px -20px 40px 0px inset, rgb(0 0 0 / 0%) 0px -36px 30px 0px inset, rgb(0 0 0 / 0%) 0px -79px 40px 0px inset, rgb(0 0 0 / 0%) 0px 2px 1px, rgb(0 0 0 / 0%) 0px 4px 2px, rgb(0 0 0 / 0%) 0px 8px 4px, rgb(0 0 0 / 0%) 0px 16px 8px, rgb(0 0 0 / 0%) 0px 32px 16px;"  >تفصیلاتی فارم</a></li>
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
    <script src="../java/Sbyone.js"> </script>

    
</html>