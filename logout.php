<?php

session_start();

$_SESSION['username']= "";
$_SESSION['radio']= "";

header("location:index.php");
exit();
?>