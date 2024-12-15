
<?php

$iId = $conn->insert_id;
$class= $_GET['class'];
$name= $_GET['name'];
$number= $_GET['number'];
$code= $_GET['code'];
$item= $_GET['item'];
$model= $_GET['model'];
$model= $_GET['comp'];
$time= date("Y-m-d",$t);
$desc= $_GET['desc'];
$comp= $_GET['comp'];
$class= $_GET['class'];

$sql = "INSERT INTO student (sname, scode, sclass, sphone)
VALUES ('$name', '$code', '$class', '$number')";
if (mysqli_query($conn, $sql))
 {
  $sId = $conn->insert_id;
  $sql2 = "INSERT INTO items (iname, imodel, icompony, idescription, itime)
  VALUES ('$item', '$model', '$comp', '$desc', '$time')";
  if (mysqli_query($conn, $sql2)) {

    $iId = $conn->insert_id;
    

  }
  else 
  {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
} 

else 
{
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}






$sql = "INSERT INTO tranzation (sid, iid)
VALUES ('$sId', '$iId')";
if (mysqli_query($conn, $sql))
{

echo "insert successfully ";

}
else 
{
echo "Error: ";
}


?>