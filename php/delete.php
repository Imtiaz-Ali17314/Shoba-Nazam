
<?php

include("include.php");



$btid = $_GET["btid"];
$sid = $_GET["sid"];

echo $btid;
echo $sid;


if($sid == '1a')
{
    $sql1 = "delete from btype where id='$btid'";
    if($conn->query($sql1))
    {
        $sql2 = "delete from benazmi where btid='$btid'"; 
        if($conn->query($sql2))
        {
            header("Location: ../forms/detailsform.php");
        } 
    }

}
else
{
    $sql1 = "delete from btype where id='$btid'";
    if($conn->query($sql1))
    {
        $sql2 = "delete from benazmi where btid='$btid'"; 
        if($conn->query($sql2))
        {
           header("Location: ../forms/detailbyone.php?sid=$sid& fdate=& ldate=");
        } 
    }
}

?>