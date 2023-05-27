<?php
session_start();
if (!isset($_SESSION['user'])) {
  header('Location:.login.php');
}

use Opium\EcommerceWebsite\db;

require_once '../database/db.php';

if (isset($_GET["numC"])) {
  $numC = $_GET["numC"];
  try {
    $stm = db::ExecQuery("delete from lignecommande where num_commande = ?", [$numC]);
    $stm = db::ExecQuery("delete from commande where num_commande = ?", [$numC]);
    if ($stm) {
      header("Location:commande.php");
    } else {
      "<script>alert('commande not verifier')</script>";
    }
  } catch (Exception $e) {
    echo 'Error : ',  $e->getMessage();
  }
}
