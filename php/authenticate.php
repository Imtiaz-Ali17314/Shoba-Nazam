<?php

include("include.php");


$username= $_GET["email"];
$password= $_GET["password"];

$query="select * from user where username='$username' and password='$password'";
echo $query;
$result= $conn->query($query);

if ($row = $result->fetch_assoc())
{
    session_start();
    $_SESSION["user"]=$row["username"];

   header("Location: ../forms/detailsform.php");
}
else
{
    header("Location: ../forms/loginform.php?error=Invalid user username or password");
}

?>