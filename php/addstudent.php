<?php

    include("include.php");

    $name = $_GET["name"];
    $fathername = $_GET["fathername"];
    $code = $_GET["code"];
    $class = $_GET["class"];

        $query= "insert into student values(Null , '$name' , '$fathername' , '$code' , '$class')";
        echo $query;
        
        if($conn->query($query))
        {
           header("Location:../forms/benazmiform.php?name=".$name."&code=".$code);
        }
        else
        {
            header("Location:../forms/addstudentform.php?error=معذرت! معلومات کو درست درج کریں۔");
        }
            
      
    



  

?>