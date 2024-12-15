
<?php

session_start();
if(!isset($_SESSION["user"]) )
{
    header("Location: ../forms/loginform.php?msg= Please Login first");
}

?>