<?php

include("include.php");

$name= $_GET["name"];
$pass= $_GET["pass"];

$query="select * from user where name='$name' and password='$pass'";
echo $query;
$result= $conn->query($query);

if ($row = $result->fetch_assoc())
{
    session_start();
    $_SESSION["username"]=$row["name"];
    header("Location: ../forms/addstudentform.php");
}
else
{
    header("Location: ../form/loginform.php?msg=Wrong user name or password");
}

?>