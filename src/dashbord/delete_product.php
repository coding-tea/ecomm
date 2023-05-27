<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location:../pages/login.php');
}

use Opium\EcommerceWebsite\db;

require_once '../database/db.php';

if (!isset($_GET['id'])) header('Location: dashbord.php');
$flag = db::ExecQuery('DELETE FROM produit WHERE id_produit = ?', [$_GET['id']]);
header('Location: dashbord.php');
