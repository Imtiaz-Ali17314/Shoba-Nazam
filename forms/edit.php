
<?php
session_start();
if(!isset($_SESSION["user"]) )
{
    header("Location: loginform.php?error=Please login your account first");
}

include("../php/include.php");

$btid = $_GET["btid"];
$sid = $_GET["sid"];
$fdate = $_GET["fdate"];
$ldate = $_GET["ldate"];
$prname = $_GET["name"];
$prcode = $_GET["code"];
$prclass = $_GET["class"];
$prtotal = $_GET["total"];



$sql1="SELECT s.sname, s.code, bt.name, b.detail, b.date from student s left join benazmi b on s.id=b.sid
left join btype bt on b.btid = bt.id where b.btid = '$btid'";


$result1 = $conn->query($sql1);
while($row = $result1->fetch_assoc())
{
    $editobject = new \stdClass();
    $editobject->sname = $row["sname"];
    $editobject->code = $row["code"];
    $editobject->name = $row["name"];
    $editobject->detail = $row["detail"];
    $editobject->date = $row["date"];
    
}
?>
<html dir="rtl">
    
    <head>
        <title>بےنظمی فارم</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="../css/css.css">
        <link rel="stylesheet" href="../css/Bform.css">
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

                                        <!-- Form -->
                
                <div id="d">
                    <form method="get" action="../php/update.php" id="form">

                                        <!-- Error Box -->

                        <?php
                            if(isset($_GET["error"]))
                            {
                        ?>
                                <span id="msgbox" class="magbox" style="display: block" >

                                    <img src="https://img.icons8.com/external-flatart-icons-flat-flatarticons/30/000000/external-alert-web-security-flatart-icons-flat-flatarticons.png"/>
                                    <p><?php echo  $_GET["error"]; ?></p>
                                </span>    
                        <?php
                            }
                        ?>
                 
                                        
                                        <!-- Alert Form  -->


           
                                <span id="alert" class="magbox" style="display: none;" >

                                    <img src="https://img.icons8.com/external-flatart-icons-flat-flatarticons/30/000000/external-alert-web-security-flatart-icons-flat-flatarticons.png"/ >
                        <p>کیا آپ ترمیم کو محفوظ کرنا چاہتے ہیں؟</p>
    
                        <div id="alertbuttons">
                            
                            <input type="button" id="true" class="true" value="جی ہاں">
                            <input type="button" id="false" class="false" value="نہیں">
                        </div>
                    </span>
                     
                        
                            
                                        <!-- Message Box -->

                        <?php
                        if(isset($_GET["msg"]))
                        {
                    ?>
                            <span id="msgbox" class="magbox" style="display: block" >
                                <img src="../images/email.png" >
                                <p><?php echo  $_GET["msg"]; ?></p>
                            </span>     
                    <?php
                        }
                    ?>
   
                                        <!-- Form Header  -->

                        <div id="fheader">
                            بےنظمی میں ترمیم
                        </div>
                        <div id="fd1">
                            <div class="a">
                                <ul type="none">
                                    <span> کوڈ :<br></span>
                                    <li><input type="reset" name="code" id="code" value="<?php echo $editobject->code ?>" style="text-align: right;"></li>
                                </ul>
                           
                            </div>
                            <div class="b">
                                <ul type="none">
                                    <span> طالب علم :<br></span>
                                    <li><input type="reset" name="name" id="name" value="<?php echo $editobject->sname ?>"style="text-align: right;"><br></li>
                                </ul>
                       
                            </div>
                        </div>
                        <div id="fd2">
                            <div class="a">
                                <ul type="none">
                                    <span>بےنظمی :<br></span> 
                                    <li><input type="text" name="benazmi" id="benazmi" value="<?php echo $editobject->name ?>"></li>
                                </ul>
                            </div>
                            <div  id="detaildiv">
                                <ul type="none">
                                    <span>تفصیل :<br></span>
                                    <li><textarea name="detail" id="detail" ><?php echo $editobject->detail ?></textarea></li>
                                </ul>
                            </div>     
                        </div>
                        <div id="fd3">
                            <div class="a">
                                <ul type="none">
                                    <span>تاریخ :<br></span> 
                                    <li><input type="date" name="date" id="date" value="<?php echo $editobject->date ?>"></li>
                                </ul>
                            </div>
                        </div>

                                        <!-- Submit Button -->

                            <div id="fd4">
                                <input type="button" name="save" id="save" value="محفوظ کریں">
                                <input type="hidden" name="btid" value="<?php echo $btid ?>">
                                <input type="hidden" name="sid" value="<?php echo $sid ?>">
                                <input type="hidden" name="fdate" value="<?php echo $fdate ?>">
                                <input type="hidden" name="ldate" value="<?php echo $ldate ?>">
                                <input type="hidden" name="name" value="<?php echo $prname ?>">
                                <input type="hidden" name="code" value="<?php echo $prcode ?>">
                                <input type="hidden" name="class" value="<?php echo $prclass ?>">
                                <input type="hidden" name="total" value="<?php echo $prtotal ?>">
                            </div>
                
                    </form>
                
                </div>   
            </div>

                                        <!-- Side Bar -->

                                        <div id="sidebar">
                <ul type="none">
                    <li><a href="benazmiform.php" style=" background-color: rgb(225 225 225 / 37%); box-shadow: rgb(0 0 0 / 15%) 0px -20px 40px 0px inset, rgb(0 0 0 / 0%) 0px -36px 30px 0px inset, rgb(0 0 0 / 0%) 0px -79px 40px 0px inset, rgb(0 0 0 / 0%) 0px 2px 1px, rgb(0 0 0 / 0%) 0px 4px 2px, rgb(0 0 0 / 0%) 0px 8px 4px, rgb(0 0 0 / 0%) 0px 16px 8px, rgb(0 0 0 / 0%) 0px 32px 16px;"  >بےنظمی فارم</a></li>
                    <li><a href="detailsform.php" >تفصیلاتی فارم</a></li>
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
    <script src="../java/edit.js"> </script>

    
</html>
