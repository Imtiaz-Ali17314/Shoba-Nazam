<?php

include("include.php");

$name= $_GET["name"];
$code= $_GET["code"];
$benazmi= $_GET["benazmi"];
$detail= $_GET["detail"];
$date= $_GET["date"];

$sql = "select * from student where code='$code'";
echo $sql;

$result = $conn->query($sql);

if($row = $result->fetch_assoc())
{
    $sid = $row["id"];

    $sql2 = "insert into btype values(Null , '$benazmi')";

    if($conn->query($sql2))
    {

        $btid = $conn->insert_id;

        $sql3= "insert into benazmi values(Null , '$sid' , '$btid', '$detail' , '$date')";

       if($conn->query($sql3))
       {
        
        header("Location: ../forms/benazmiform.php?msg= آپ کا ڈیٹا محفوظ ہو گیا ہے۔");
        
       }
       else
       {
        header("Location: ../forms/benazmiform.php?error= معذرت! ڈیٹا کے اندراج میں کوئی غلطی آرہی ہے جس کے باعث آپ کا ڈیٹا درج نہیں ہو سکتا۔");
        
       }
    }
    else
    {
        header("Location: ../forms/benazmiform.php?error= معذرت! ڈیٹا کے اندراج میں کوئی غلطی آرہی ہے ۔"); 
    }
  
}
else
{
    header("Location:../forms/benazmiform.php?error=معذرت!اس طالب علم کی معلومات پہلے درج کریں۔");
}










?>