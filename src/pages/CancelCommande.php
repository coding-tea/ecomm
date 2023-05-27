<?php
session_start();
if (!isset($_SESSION['user'])) {
  header('Location:../pages/login.php');
}

use Opium\EcommerceWebsite\db;
require_once '../database/db.php';

  if(isset($_GET["numC"])){
    $numC = $_GET["numC"];
    try {
      $stm = db::ExecQuery("delete from commande where num_commande = ?", [$numC]);
      if($stm){
        header("Location:commande.php");
      }
      else{
        echo "<script>alert('commande not cancel')</script>";
      }
    } catch (Exception $e) {
      echo 'Error : ',  $e->getMessage();
  }
  }