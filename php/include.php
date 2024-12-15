<?php

$servername ="localhost";
$username ="root";
$password ="";
$database ="shobanazam";

$conn = new mysqli ($servername ,$username ,$password,$database);

mysqli_set_charset ($conn, 'utf8');

if ($conn->connect_error)
{
    die ("connection faild :".$conn->connect_arror);
}



?>