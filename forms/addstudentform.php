<?php

session_start();
if(!isset($_SESSION["user"]) )
{
    header("Location: loginform.php?error=Please login your account first");
}


?>
<html dir="rtl">
    
    <head>
        <title>صفحہ اصلی</title>
       <meta charset="utf-8"/>
        <link rel="stylesheet" href="../css/css.css">
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
                                 <form method="get" action="../php/addstudent.php" id="form">

                        <!-- Error Form -->

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
                    <p>کیا آپ معلومات محفوظ کرنا چاہتے ہیں؟</p>

                    <div id="alertbuttons">
                        
                        <input type="button" id="true" class="true" value="جی ہاں">
                        <input type="button" id="false" class="false" value="نہیں">
                    </div>

                    </span>


                        <!-- Form Header  -->
                
                        <div id="d0">
                        طالب علم کی معلومات درج کریں 
                        </div>

                        <!-- Form body -->

                        <div  id="d1">
                            <ul type="none">
                                <span> ولدیت: <br></span>
                                <li><input type="text" name="fathername" id="fathername" ><br></li>
                                <span> کلاس: <br></span>
                                <li><select class="select" name="class" id="class">
                                                          
                                            <option value=""></option>
                                            <option>متوسطہ اولیٰ</option>
                                            <option>متوسطہ ثانیہ</option>
                                            <option>عامہ اولیٰ</option>
                                            <option>عامہ ثانیہ</option>
                                            <option>خاصہ اولیٰ</option>

                                </select><br></li>

                               
                            </ul>
                        </div>
                        <div id="d2">

                            <ul type="none">
                                
                                <span> طالب علم :<br></span>
                                <li><input type="text" name="name" id="name"><br></li>
                                <span> کوڈ :<br></span>
                                <li><input type="text" name="code" id="code"><br></li>
                            </ul> 
    
                      
                        </div>

                            <!-- Submit Button -->

                        <div id="d3">
                            <input type="button" name="save" id="save" value="محفوظ کریں">
                        </div>
                    </form>
                
                </div>   
            </div>

                <!-- Side Bar -->

            <div id="sidebar">
                <ul type="none">
                    <li><a href="addstudentform.php" style=" background-color: rgb(225 225 225 / 37%); box-shadow: rgb(0 0 0 / 15%) 0px -20px 40px 0px inset, rgb(0 0 0 / 0%) 0px -36px 30px 0px inset, rgb(0 0 0 / 0%) 0px -79px 40px 0px inset, rgb(0 0 0 / 0%) 0px 2px 1px, rgb(0 0 0 / 0%) 0px 4px 2px, rgb(0 0 0 / 0%) 0px 8px 4px, rgb(0 0 0 / 0%) 0px 16px 8px, rgb(0 0 0 / 0%) 0px 32px 16px;" >صفحہ اصلی</a></li>
                    <li><a href="benazmiform.php" >بےنظمی فارم</a></li>
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
    <script src="../java/addstudentform.js"> </script>
</html>