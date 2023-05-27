<?php
session_start();
if(!isset($_SESSION['admin'])){
    header('Location:../pages/login.php');
}

use Opium\EcommerceWebsite\db;
require_once '../database/db.php';

if(!isset($_GET['num'])) header('Location: dashbord.php');
echo $_GET['num'];
$flag = db::ExecQuery('DELETE FROM categorie WHERE Num_categorie = ?', [$_GET['num']]);
header('Location: dashbord.php');