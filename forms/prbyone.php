<?php 

session_start();
if(!isset($_SESSION["user"]) )
{
    header("Location: loginform.php?error=Please login your account first");
}

$name = $_POST["name"];
$code = $_POST["code"];
$class = $_POST["class"];
$total = $_POST["total"];

$jsnsres = $_POST["jsnsres"];
$jsnbenz= $_POST["jsnbenz"];

if($jsnsres =="" || $jsnsres == null)
{
    $Sresult = json_decode($jsnbenz);
}
else{
    $Sresult = json_decode($jsnsres);
}


?>
<html dir="rtl">
    
    <head>
        <title>فردی تفصیل</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="../css/css.css">
        <link rel="stylesheet" href="../css/print.css">
        <link rel="stylesheet" href="../css/all.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/earlyaccess/notonastaliqurdudraft.css">
        
    </head>
    <body id="scroll" >
        <table cellspacing="0" id="table">
                        <thead id="thead">
                        
                            <tr id="">
                                
                                <td colspan="2">
                                    <p id="p">شعبہِ نظم و انضباط</p>
                                </td>
                                <td><img src="../images/IMG-20231025-WA0018-removebg-preview.png" id="Jlogo"></td>
                               
                            </tr>
                            <tr class="thead">
                                <td colspan="3"> نام:<input type="reset" value="<?php echo $name?>">
                                 کوڈ:<input style="width: 80PX;" type="reset" value="<?php echo $code?>">
                                 کلاس:<input style="width: 100PX;" type="reset" value="<?php echo $class?>">
                                کل بےنظمی:<input style="text-align: center; width: 60PX;" type="reset" value="<?php echo $total?>"></td>

                            </tr>
                            <tr class="thead">
                                <td>تاریخ</td>
                                <td>تاریخ</td>
                                <td>بےنظمی</td>
                                <td>تفصیل</td>

                            </tr>

                        </thead>

                   
                                        <!-- Tbody -->

                        <tbody id="tbody">

                        <?php 
                           foreach($Sresult as $stu)
                            {
                        ?>
                            <tr>
                                <td><?php echo $stu->date; ?></td>
                                <td><?php echo $stu->bname; ?></td>
                                <td><?php echo $stu->detail; ?></td>
                            </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                        
                    </table>
      
    </body>
    
    <script src="../java/all.js"> </script>
    <script src="../java/prbyone.js"> </script>
    
    
</html>