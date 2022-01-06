<?php 
session_start();
$_SESSION["adminEMAIL"];
unset($_SESSION["adminEMAIL"]);

session_unset();
session_destroy();
header("location:login.php");
?>