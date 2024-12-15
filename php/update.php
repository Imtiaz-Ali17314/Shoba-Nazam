<?php

include("include.php");


$benazmi= $_GET["benazmi"];
$detail= $_GET["detail"];
$date= $_GET["date"];

$btid = $_GET["btid"];
$sid = $_GET["sid"];
$fdate = $_GET["fdate"];
$ldate = $_GET["ldate"];
$prname = $_GET["name"];
$prcode = $_GET["code"];
$prclass = $_GET["class"];
$prtotal = $_GET["total"];


if ($sid == '1a')
{
    $sql = "update btype set name= '$benazmi' where id='$btid'";

    if($conn->query($sql))
    {
        $sql1 = "update benazmi set detail='$detail', date='$date' where btid='$btid'";
    
        if($conn->query($sql1))
        {
            header("Location: ../forms/detailsform.php");
        }
    }
    else
    {
        header("Location: ../forms/benazmiform.php?error= معذرت! ڈیٹا کے اندراج میں کوئی غلطی آرہی ہے جس کے باعث آپ کا ڈیٹا درج نہیں ہو سکتا۔"); 
    }   
}
else
{
    $sql = "update btype set name= '$benazmi' where id='$btid'";

    if($conn->query($sql))
    {
        $sql1 = "update benazmi set detail='$detail', date='$date' where btid='$btid'";
    
        if($conn->query($sql1))
        {
            header("Location: ../forms/detailbyone.php?sid=$sid& fdate=$fdate& ldate=$ldate?& name=$prname& code=$prcode& class=$prclass& total=$prtotal");
        }
    }
    else
    {
        header("Location: ../forms/benazmiform.php?error= معذرت! ڈیٹا کے اندراج میں کوئی غلطی آرہی ہے جس کے باعث آپ کا ڈیٹا درج نہیں ہو سکتا۔"); 
    }
} 










?>