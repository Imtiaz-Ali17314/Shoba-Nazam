

<?php 
session_start();
if(!isset($_SESSION["user"]) )
{
    header("Location: loginform.php?error=Please login your account first");
}

include("../php/include.php");


$sql= "SELECT * FROM student order by code asc";
  
  $result=$conn->query($sql);

  $students=array();
  while($row = $result->fetch_assoc())
  {  
      $student =new stdClass();
      $student->code=$row["code"];
      $student->name=$row["sname"];
      $student->fathername=$row["fathername"]; 
      $student->class=$row["class"]; 
      array_push($students,$student);   
  } 
  $jsonData = json_encode($students);
 
?>
<script>     
     student = <?php echo $jsonData ?>; 
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
                    <h4>بے نظم طلاب کی فہرست</h4>
                    
                    <div id="searchbyalldiv">
                        <form method="get" action="stubyall.php" id="form">
                            <input type="text" name="byall" id="byall" placeholder="تلاش کریں" style="outline: none;">
                            <input type="button" name="searchbtn" id="searchbtn">
                        </form>
                    </div>        
                
                </div>
                <form action="studataprint.php" method="post" id="prform">
                    <input type="hidden" name="jsnsres" id="jsnsres" >
                    <input type="hidden" name="jsnstu" id="jsnstu">
                    <input type="hidden" name="jsnsrcbyall" id="jsnsrcbyall" >
                        
                          
                        </form>

                                        <!-- Body of Body -->

                <div id="scroll">
                    <table cellspacing="0" id="table">
                        <form method="get" action="stubyone.php" id="form1">

                                       <!-- Thead -->

                        <thead>

                                <tr id="searchbox">
                                        <td>
                                        
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
                                        <p id="sub" class="sub"> تلاش </p>
                                        </td>
                                        <td>
                                    <img src="../images/8396426_printer_print_machine_office_business_icon.png" id="print" >
                                    <a href="#bottom" id="top" >  
                                    <div style="width: 35;
                                                height: 35;
                                                border-radius: 50px;
                                                margin: 0 40px 0 0;
                                                background: #00ffff9e;
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
                                    </a>
                                </td>

                            </tr>
                        
                            <tr class="thead">
                                
                                <td>نمبر شمار</td>
                                <td>نام</td>
                                <td>ولدیت</td>
                                <td>کوڈ</td>
                                <td>کلاس</td>
                                <td></td>
                                <td></td>
 

                            </tr>
                   
                        </thead>
                                                                 <!-- Alert Form  -->


           
                                         <span id="alert" class="msgbox" style="display: none;" >

                                            <img src="https://img.icons8.com/external-flatart-icons-flat-flatarticons/30/000000/external-alert-web-security-flatart-icons-flat-flatarticons.png" >
                                <p>کیا آپ معلومات مٹانا چاہتے ہیں؟</p>
            
                                <div id="alertbuttons">
                                    
                                    <input type="button" id="true" class="true" value="جی ہاں">
                                    <input type="button" id="false" class="false" value="نہیں">
                                </div>
                                </span>
                   
                                        <!-- Tbody -->

                        <tbody id="tbody">
                         
                        </tbody>
                        <tfoot>
                            <tr>
                              
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
                                                margin: 0 40px 0 0;
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
                    <li><a href="studentlist.php" >کل بےنظمی فارم</a></li>
                    <li><a href="studata.php" style=" background-color: rgb(225 225 225 / 37%); box-shadow: rgb(0 0 0 / 15%) 0px -20px 40px 0px inset, rgb(0 0 0 / 0%) 0px -36px 30px 0px inset, rgb(0 0 0 / 0%) 0px -79px 40px 0px inset, rgb(0 0 0 / 0%) 0px 2px 1px, rgb(0 0 0 / 0%) 0px 4px 2px, rgb(0 0 0 / 0%) 0px 8px 4px, rgb(0 0 0 / 0%) 0px 16px 8px, rgb(0 0 0 / 0%) 0px 32px 16px;" >طلاب فہرست</a></li>
                </ul>
                <img src="../images/IMG-20231025-WA0018-removebg-preview.png" id="Jlogo">
            </div>
                                        <!-- Footer -->

            <div id="footer">
            مدرسہ دارالعلوم حجتیہ نگر خاص گلگت
            </div>
        </div>
    </body>
    
    <script  src="../java/studata.js"> </script>
    <script src="../java/java.js"> </script>
    <script src="../java/all.js"> </script>
    
    
</html>