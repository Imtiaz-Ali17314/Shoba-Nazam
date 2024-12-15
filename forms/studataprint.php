 <?php 

session_start();
if(!isset($_SESSION["user"]) )
{
    header("Location: loginform.php?error=Please login your account first");
}

$jsnsrcbyall = $_POST["jsnsrcbyall"];
$jsnsres = $_POST["jsnsres"];
$jsnstu= $_POST["jsnstu"];



if($jsnsrcbyall !="" || $jsnsrcbyall != null)
{
    $Sresult = json_decode($jsnsrcbyall);
}
elseif($jsnsres !="" || $jsnsres != null){
    $Sresult = json_decode($jsnsres);
}
elseif( $jsnstu !="" || $jsnstu != null )
{
    $Sresult = json_decode($jsnstu);
}
else
{
    header("Location:../forms/studentlist.php");
}


?>
<html dir="rtl">
    
    <head>
        <title>مدرسہ دارالعلوم حجتیہ</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="../css/css.css">
        <link rel="stylesheet" href="../css/studataprint.css">
        <link rel="stylesheet" href="../css/all.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/earlyaccess/notonastaliqurdudraft.css">
        
    </head>
    <body id="scroll" >
    
        <table cellspacing="0" id="table">
                        <thead id="thead">
                        
                            <tr id="">
                                
                                <td colspan="3">
                                    <p id="p" class="studatap">طلاب جامعہ کی فہرست</p>
                                </td>
                                <td colspan="2"><img src="../images/IMG-20231025-WA0018-removebg-preview.png" id="Jlogo"></td>
                            </tr>
                            <tr class="thead">
                              
                                <td>نام</td>
                                <td>ولدیت</td>
                                <td>کوڈ</td>
                                <td>کلاس</td>
                                
                            </tr>
                        </thead>

                   
                                        <!-- Tbody -->

                        <tbody id="tbody">

                        <?php 
                           foreach($Sresult as $stu)
                            {
                        ?>
                            <tr>
                                <td><?php echo $stu->name; ?></td>
                                <td><?php echo $stu->fathername; ?></td>
                                <td><?php echo $stu->code; ?></td>
                                <td><?php echo $stu->class; ?></td>
                                
                            </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                        
                    </table>
                   
    </body>
    
    <script src="../java/printtotal.js"> </script>
    <script src="../java/all.js"> </script>
    
    
</html>