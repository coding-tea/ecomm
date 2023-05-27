<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location:../pages/login.php');
}

use Opium\EcommerceWebsite\db;

require_once '../database/db.php';

if (!isset($_GET['num'])) header('Location: dashbord.php');
$flag = db::ExecQuery('DELETE FROM users WHERE Num_user = ?', [$_GET['num']]);
header('Location: dashbord.php');
