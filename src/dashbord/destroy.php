<?php 
session_start();
session_unset();
header('Location:../pages/login.php');
?>