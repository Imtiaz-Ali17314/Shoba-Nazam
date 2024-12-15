

<?php 
session_start();
if(!isset($_SESSION["user"]) )
{
    header("Location: loginform.php?error=Please login your account first");
}

include("../php/include.php");

$search= $_GET["byall"];


$sql= "SELECT s.sname , s.fathername ,s.code ,s.class,b.sid,min(date) as startDate,
max(date) as endDate, COUNT(b.sid) as total  
FROM student s left join `benazmi` b on s.id=b.sid
where s.sname like '%$search%' or s.fathername like '%$search%'
or s.code = '$search' or s.class like '%$search%'
group by b.sid order by total desc" ;


  $result=$conn->query($sql);

  $sql1 = "SELECT * from benazmi";

  $result1=$conn->query($sql1);
  
  $benazmi = array();
  while($row = $result1->fetch_assoc())
  {
      $benazmiobject = new \stdClass();
      $benazmiobject->sid = $row["sid"];
      $benazmiobject->date = $row["date"];
  
      array_push($benazmi,$benazmiobject);
      $jsonbenz = json_encode($benazmi);
  }
   
  ?>
  <script>
      benazmi = <?php echo $jsonbenz ?>;
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
                    <h4>تفصیلاتی فارم</h4>
                    
                    <div id="searchbyalldiv">
                        <form method="get" action="stubyall.php" id="form">
                            <input type="text" name="byall" id="byall" placeholder="تلاش کریں" style="outline: none;">
                            <input type="button" name="searchbtn" id="searchbtn">
                        </form>
                    </div>        
                
                </div>

                                        <!-- Body of Body -->

                <div id="scroll">
                    <table cellspacing="0" id="table">
                    <form method="get" action="stubyone.php" id="form1">

                                        <!-- Thead -->

                        <thead>

                            <tr id="searchbox">
                               
                                        <td style="text-align: right;">
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
                                        <select  class="classlist" name="class" id="class" style="outline: none;">
                                           
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
                                <td>کل بے نظمی</td>
                                <td>اقدام</td>
                                
                           
                            
                            </tr>
                   
                        </thead>
                   
                                        <!-- Tbody -->

                        <tbody>
                            <?php 
                                while($row = $result->fetch_assoc())
                                {

                                
                            ?>
                            <tr>
                                <td>
                                    <?php echo $row["startDate"]," / " ?>
                                    <?php echo $row["endDate"] ?>
                                </td>
                                <td><?php echo $row["sname"] ?></td>
                                <td><?php echo $row["fathername"] ?></td>
                                <td><?php echo $row["code"] ?></td>
                                <td><?php echo $row["class"] ?></td>
                                <td><?php echo $row["total"] ?></td>
                                <td><a href="detailbyone.php?sid=<?php echo $row['sid'] ?>&fdate=& ldate="><button type="button">تفصیل</button></a></td>
                             
                              
                            </tr>
                            <?php 
                                }
                            ?>
                           
                 
                
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>  
                                    <input type="date" name="ldate" id="ldate" placeholder="آخری تاریخ" style="outline: none;">
                                </td>
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
                    <li><a href="detailsform.php" >تفصیلاتی فارم</a></li>
                    <li><a href="studentlist.php" style=" background-color: rgb(225 225 225 / 37%); box-shadow: rgb(0 0 0 / 15%) 0px -20px 40px 0px inset, rgb(0 0 0 / 0%) 0px -36px 30px 0px inset, rgb(0 0 0 / 0%) 0px -79px 40px 0px inset, rgb(0 0 0 / 0%) 0px 2px 1px, rgb(0 0 0 / 0%) 0px 4px 2px, rgb(0 0 0 / 0%) 0px 8px 4px, rgb(0 0 0 / 0%) 0px 16px 8px, rgb(0 0 0 / 0%) 0px 32px 16px;" >کل بےنظمی فارم</a></li>
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
    <script src="../java/stubyall.js"> </script>
    
</html>